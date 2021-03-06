<?php
/**
 * Created by PhpStorm.
 * User: cesar
 * Date: 11/07/17
 * Time: 16:17
 */

use Doctrine\ORM\EntityManager;
use Report\Entity\Colunas;
use Report\Entity\Formatos;
use Report\Entity\Parametros;
use Report\Entity\Queries;
use Report\Entity\Tabelas;
use Report\Entity\Run;
use Report\Helpers\ParametrosHelper;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

$app->mount('/api', require __DIR__ . '/routes/api.php');
$app->mount('/relatorio', require __DIR__ . '/routes/relatorio.php');

$app->get('/', function () use ($app) {

    $relatorios = $app['relatorios.repository']->findAll();

    return $app['twig']->render('index.html.twig', ['relatorios' => $relatorios]);

})->bind('home');

$app->get('/log', function () use ($app) {

    $relatorios = $app['run.repository']->findBy([], ['runAt' => 'DESC']);

    return $app['twig']->render('log.html.twig', ['logs' => $relatorios]);

})->bind('log');

$app->get('/tables', function () use ($app) {

    $tables = $app['tables.repository']->findBy([], ['nome' => 'ASC']);

    return $app['twig']->render('tabelas.html.twig', ['tables' => $tables]);

})->bind('tabelas');

$app->post('/tabela/add', function (Request $request) use ($app) {

    try {

        $nome = $request->request->get('nome');
        $schema = $request->request->get('schema');

        $hasTable = $app['information.schema.repository']->hasTableSchema($nome, $schema);

        if (!$hasTable) {
            throw new Exception("Esta Tabela não existe em nenhum banco de dados configurado.", 404);
        }

        $tables = $app['tables.repository']->findOneBy(['nome' => $nome, 'schema' => $schema]);

        if (!empty($tables)) {
            throw new Exception("Tabela já existe para esse Banco de Dados.", 404);
        }

        $tabela = new Tabelas();
        $tabela->setNome($nome);
        $tabela->setSchema($schema);
        $tabela->setAtivo(true);

        $app['tables.repository']->save($tabela);

        return $app->redirect('/tabela/' . $tabela->getNome());

    } catch (Exception $e) {
        throw $e;
    }


})->bind('tabela_adicionar');

$app->get('/tabela/{id}/{nome}/colunas/import-from-schema/{schema}', function ($id, $nome, $schema, Request $request) use ($app) {

    try {

        $colunas = $app['information.schema.repository']->findColumnsTable($id, $nome, $schema);

        $tabela = $app['tables.repository']->find($id);

        foreach ($colunas as $item) {

            if ($app['columns.repository']->findOneBy(['tabela' => $tabela, 'nome' => $item['nome']])) {
                continue;
            }

            $coluna = new Colunas();
            $coluna->setNome($item['nome']);
            $coluna->setTipo($item['tipo']);
            $coluna->setTabela($tabela);
            $coluna->setChavePrimaria($item['chave_primaria']);
            $coluna->setLabel(false);
            $coluna->setVisualizar(true);

            $app['columns.repository']->save($coluna);
        }

        return $app->redirect('/tabela/'.$nome);

    } catch (Exception $e) {
        return new \Symfony\Component\HttpFoundation\Response($e->getMessage());
    }


})->bind('importar_colunas');

$app->get('/tabela/{nome}', function ($nome, Request $request) use ($app) {

    /**
     * @var Tabelas $table
     */
    $table = $app['tables.repository']->findOneBy(['nome' => $nome]);
    $columns = $app['columns.repository']->findBy(['tabela' => $table]);
    $queries = $app['queries.repository']->findBy(['tabela' => $table]);

    $tablesUnion = $app['columns.repository']->findBy(['tabelaRef' => $table]);

    $tablesUnion = array_filter($tablesUnion, function ($item) use ($table) {
        return $item !== $table;
    });

    $update = false;

    if (empty($table->getUpdatedAt()) || (!empty($table->getUpdatedAt()) && $table->getUpdatedAt()->diff(new DateTime('now'))->days > $app['valor.padrao.verificacao.registros'])) {
        //$update = true;
    }

    if ($update) {
        $result = $app['db']->fetchColumn("SELECT COUNT(*) FROM {$table->getSchema()}.{$table->getNome()}");
        $table->setUpdatedAt(new DateTime('now'));
        $table->setRows((int)$result);
        $app['tables.repository']->save($table);
    }


    $tables = $app['tables.repository']->findBy([], ['nome' => 'ASC']);

    return $app['twig']->render('table.html.twig', [
        'queries' => $queries,
        'columns' => $columns,
        'table' => $table,
        'tables' => $tables,
        'union' => $tablesUnion
    ]);

})->bind('tabela');

$app->get('/tabela/{nome}/execute', function ($nome, Request $request) use ($app) {

    /**
     * @var Tabelas $table
     */
    $table = $app['tables.repository']->findOneBy(['nome' => $nome]);

    $log = $result = $colunas = [];
    $arrayResult = $colunas = [];

    try {

        $string = " SELECT * FROM {$table->getSchema()}.{$table->getNome()} ";

        $result = $app['db']->fetchAll($string);

        foreach ($result as $cols) {
            foreach ($cols as $key => $col) {
                $colunas[] = isset($col['nome']) ? $col['nome'] : $key;
            }
            break;
        }

        $colunas = array_map(function ($coluna) {
            return ucwords(str_replace('_', ' ', $coluna));
        }, $colunas);


    } catch (Exception $e) {
        $log = ['classe' => 'danger', 'msg' => $e->getMessage()];
    }

    return $app['twig']->render('execute.html.twig',
        [
            'result' => $result,
            'columns' => $colunas,
            'log' => $log,
            'query' => [],
            'dados' => [],
            'parametros' => [],
            'parametrosR' => [],
            'params' => [],
            'table' => $table->getNome(),
        ]);

})->bind('tabela_execute');

$app->get('/queries', function () use ($app) {

    $queries = $app['queries.repository']->findAll();

    return $app['twig']->render('queries.html.twig', ['queries' => $queries]);

})->bind('queries');

$app->get('/query/add', function () use ($app) {

    $tables = $app['tables.repository']->findBy([], ['nome' => 'ASC']);
    $relatorios = $app['relatorios.repository']->findBy([], ['nome' => 'ASC']);

    return $app['twig']->render('query-add.html.twig', ['tables' => $tables, 'relatorios' => $relatorios]);

})->bind('query_adicionar');

$app->get('/query/edit/{id}', function ($id) use ($app) {

    $tables = $app['tables.repository']->findBy([], ['nome' => 'ASC']);
    $relatorios = $app['relatorios.repository']->findBy([], ['nome' => 'ASC']);
    $query = $app['queries.repository']->find($id);

    if (!$query) {
        throw new Exception("Query não Encontrada");
    }

    return $app['twig']->render('query-edit.html.twig',
        ['tables' => $tables, 'query' => $query, 'relatorios' => $relatorios]);

})->bind('query_editar');

$app->post('/query/create', function (Request $request) use ($app) {

    $table = $nome = $request->request->get('table');
    $select = $nome = $request->request->get('select');
    $crud = $nome = $request->request->get('crud');
    $inner = $nome = $request->request->get('inner');
    $where = $nome = $request->request->get('where');
    $groupBy = $nome = $request->request->get('groupBy');
    $orderBy = $nome = $request->request->get('orderBy');
    $limit = $nome = $request->request->get('limit');

    $table = $app['tables.repository']->find($table);
    $columns = $app['columns.repository']->findBy(['tabela' => $table]);

    $alias = $table->getNome();

    $arrayColumns = [];

    foreach ($columns as $column) {
        $arrayColumns[$column->getId()] = $column->getNome();
    }

    if ($crud == 'select') {

        $queryString = " SELECT ";

        if (!empty($inner)) {

            $queryString .= " * ";

        } elseif (count($select) == count($arrayColumns)) {

            $queryString .= $alias . ".* ";

        } else {

            foreach ($select as $item) {
                $queryString .= $alias . '.' . $arrayColumns[$item] . ', ' . PHP_EOL;
            }

            $queryString = substr($queryString, 0, -3);

            $queryString .= PHP_EOL;
        }

        $queryString .= " FROM {$table->getSchema()}.{$table->getNome()} {$alias}" . PHP_EOL;

        if (!empty($inner)) {

            foreach ($inner as $key => $item) {

                $coluna = $app['columns.repository']->find($item);
                $table = $app['tables.repository']->find($coluna->getTabela());

                $queryString .= " INNER JOIN " . $table->getNome() . " " . $table->getNome(
                    ) . " USING (" . $coluna->getNome() . ")" . PHP_EOL;
            }

        }

        $queryString .= PHP_EOL;

        if (!empty($where)) {

            $stmt = " WHERE ";

            if (count($where) > 1) {
                $queryString .= " {$stmt} 1 = 1 " . PHP_EOL;
            }

            foreach ($where as $key => $item) {

                if (0 == $key && 1 < count($where)) {
                    $stmt = " AND ";
                }

                $valor = $arrayColumns[$item];

                if (is_array($valor)) {
                    $valor = implode(',', $arrayColumns[$item]);
                }

                /**
                 * @var Colunas $coluna
                 */
                $coluna = $app['columns.repository']->findOneBy(['tabela' => $table, 'nome' => $arrayColumns[$item]]);

                $isInteiro = false;

                if ($coluna->getTabelaRef()) {
                    /**
                     * @var Colunas $colunaRef
                     */
                    $colunaRef = $app['columns.repository']->findOneBy(
                        ['tabela' => $coluna->getTabelaRef(), 'chavePrimaria' => true]
                    );
                    if ($colunaRef) {
                        $isInteiro = true;
                    }
                }

                if ($coluna->getFormato() && $coluna->getFormato()->getNome() == Colunas::TIPO_DATA_HORA) {
                    $queryString .= " {$stmt} " . $alias . '.' . $arrayColumns[$item] . " BETWEEN ':{$valor}: 00:00:00' AND ':{$valor}: 23:59:59 '" . PHP_EOL;
                } elseif ($coluna->getFormato() && $coluna->getFormato()->getNome() == Colunas::TIPO_DATA) {
                    $queryString .= " {$stmt} " . $alias . '.' . $arrayColumns[$item] . " BETWEEN ':{$valor}:' AND ':{$valor}:'" . PHP_EOL;
                } elseif ($isInteiro ||
                    $coluna->isChavePrimaria() ||
                    $coluna->isLabel() && !is_numeric($valor) ||
                    $coluna->getTipo() == Colunas::DATA_TYPE_INT ||
                    $coluna->getFormato() && in_array(
                        $coluna->getFormato()->getNome(),
                        [Colunas::TIPO_BOOLEAN, Colunas::TIPO_BOLEAN_ATIVO_INATIVO]
                    )
                ) {
                    $queryString .= " {$stmt}  {$alias}.{$arrayColumns[$item]} IN (:{$valor}:)" . PHP_EOL;
                } else {
                    $queryString .= " {$stmt}  {$alias}.{$arrayColumns[$item]} IN (':" . $valor . ":')" . PHP_EOL;
                }

            }

        }

        if (!empty($groupBy)) {

            $queryString .= " GROUP BY ";

            foreach ($groupBy as $item) {
                $queryString .= $alias . '.' . $arrayColumns[$item] . ', ';
            }

            $queryString = substr($queryString, 0, -2) . PHP_EOL;
        }

        if (!empty($orderBy)) {

            $queryString .= " ORDER BY ";

            foreach ($orderBy as $item) {
                $queryString .= $alias . '.' . $arrayColumns[$item] . ', ';
            }

            $queryString = substr($queryString, 0, -2) . PHP_EOL;

        }

        if (!empty($limit)) {
            $queryString .= " LIMIT " . $limit;
        }

    }

    else if ($crud == 'insert') {

        $queryString = " INSERT INTO {$table->getSchema()}.{$table->getNome()} SET ";

        foreach ($select as $item) {

            /**
             * @var Colunas $coluna
             */
            $coluna = $app['columns.repository']->findOneBy(['tabela' => $table, 'nome' => $arrayColumns[$item]]);

            if ($coluna->isChavePrimaria()) {
                continue;
            }

            $queryString .=  "{$arrayColumns[$item]} = ':{$arrayColumns[$item]}:', ";
        }

        $queryString = substr($queryString, 0, -2);
    }

    else {

        $queryString = " UPDATE {$table->getSchema()}.{$table->getNome()} SET ";

        foreach ($select as $item) {

            /**
             * @var Colunas $coluna
             */
            $coluna = $app['columns.repository']->findOneBy(['tabela' => $table, 'nome' => $arrayColumns[$item]]);

            $queryString .=  "{$arrayColumns[$item]} = ':{$arrayColumns[$item]}:', ";
        }

        $queryString = substr($queryString, 0, -2);

        if (!empty($where)) {

            $stmt = " WHERE ";

            if (1 == count($where)) {
                //$queryString .= " {$stmt} 1 = 1 " . PHP_EOL;
            }

            foreach ($where as $key => $item) {

                if (0 > $key && 1 < count($where)) {
                    $stmt = " AND ";
                }

                $valor = $arrayColumns[$item];

                if (is_array($valor)) {
                    $valor = implode(',', $arrayColumns[$item]);
                }

                /**
                 * @var Colunas $coluna
                 */
                $coluna = $app['columns.repository']->findOneBy(['tabela' => $table, 'nome' => $arrayColumns[$item]]);

                $isInteiro = false;

                if ($coluna->getTabelaRef()) {
                    /**
                     * @var Colunas $colunaRef
                     */
                    $colunaRef = $app['columns.repository']->findOneBy(
                        ['tabela' => $coluna->getTabelaRef(), 'chavePrimaria' => true]
                    );
                    if ($colunaRef) {
                        $isInteiro = true;
                    }
                }

                if ($coluna->getFormato() && $coluna->getFormato()->getNome() == Colunas::TIPO_DATA_HORA) {
                    $queryString .= " {$stmt} " . $arrayColumns[$item] . " BETWEEN ':{$valor}: 00:00:00' AND ':{$valor}: 23:59:59 '" . PHP_EOL;
                } elseif ($coluna->getFormato() && $coluna->getFormato()->getNome() == Colunas::TIPO_DATA) {
                    $queryString .= " {$stmt} " . $arrayColumns[$item] . " BETWEEN ':{$valor}:' AND ':{$valor}:'" . PHP_EOL;
                } elseif ($isInteiro ||
                    $coluna->isChavePrimaria() ||
                    $coluna->isLabel() && !is_numeric($valor) ||
                    $coluna->getTipo() == Colunas::DATA_TYPE_INT ||
                    $coluna->getFormato() && in_array(
                        $coluna->getFormato()->getNome(),
                        [Colunas::TIPO_BOOLEAN, Colunas::TIPO_BOLEAN_ATIVO_INATIVO]
                    )
                ) {
                    $queryString .= " {$stmt}  {$arrayColumns[$item]} IN (:{$valor}:)" . PHP_EOL;
                } else {
                    $queryString .= " {$stmt}  {$arrayColumns[$item]} IN (':" . $valor . ":')" . PHP_EOL;
                }

            }

        }

    }

    $nome = $table->getNomeFormatado() . ' ' . strtoupper($crud) . ' v' . date('dmYHis');

    $query = new Queries();
    $query->setNome($nome);
    $query->setTabela($table);
    $query->setQuery($queryString);
    $query->setTipo($crud);
    $query->setQueryString(false);

    $app['queries.repository']->save($query);

    if ($crud == 'update' || $crud == 'insert') {

        if (!empty($select)) {

        foreach ($select as $key => $item) {

            $tipo = 'text';

            $parametro = new Parametros();
            $parametro->setNome($arrayColumns[$item]);

            $cols = array_map(function ($col) {
                return $col->toArray();
            }, $columns);

            if ($cols) {
                $array = array_filter($cols, function ($col) use ($arrayColumns, $item) {
                    return $col['nome'] == $arrayColumns[$item];
                });

                if ($array) {
                    $array = current($array);
                }

                $col = $app['columns.repository']->find($array['id']);
                $parametro->setColuna($col);

                if ($array['chavePrimaria'] == true) {
                    $tipo = 'text';

                    if ($crud == 'insert') {
                        continue;
                    }

                    /**
                     * @var Tabelas $tabela
                     */
                    //$tabela = $app['tables.repository']->findOneBy(['nome' => $array['tabela']]);
                    //$parametro->setQueryString("SELECT * FROM {$tabela->getSchema()}.{$tabela->getNome()}");
                    //$parametro->setTabela($tabela);
                } elseif (!empty($array['tabelaRef'])) {
                    $tipo = 'Entidade';
                    $tabela = $app['tables.repository']->findOneBy(['nome' => $array['tabelaRef']]);
                    $parametro->setQueryString("SELECT * FROM {$tabela->getSchema()}.{$tabela->getNome()}");
                    $parametro->setTabela($tabela);
                } elseif (!empty($array['formato']) && $array['formato'] == Formatos::TIPO_ENUM) {
                    $tipo = 'Entidade';
                    $tabela = $app['tables.repository']->findOneBy(['nome' => $array['tabela']]);
                    $parametro->setQueryString("SELECT DISTINCT {$arrayColumns[$item]} FROM {$tabela->getSchema()}.{$tabela->getNome()}");
                    $parametro->setTabela($tabela);
                } elseif (!empty($array['formato'])) {
                    $tipo = $array['formato'];
                }
            }

            $parametro->setTipo($tipo);
            $parametro->setQuery($query);
            $parametro->setQueryParametro($arrayColumns[$item]);

            $app['parametros.repository']->save($parametro);
        }
    }

    }

    if (!empty($where)) {

        foreach ($where as $key => $item) {

            $tipo = 'text';

            $parametro = new Parametros();
            $parametro->setNome($arrayColumns[$item]);

            $cols = array_map(function ($col) {
                return $col->toArray();
            }, $columns);

            if ($cols) {
                $array = array_filter($cols, function ($col) use ($arrayColumns, $item) {
                    return $col['nome'] == $arrayColumns[$item];
                });

                if ($array) {
                    $array = current($array);
                }

                $col = $app['columns.repository']->find($array['id']);
                $parametro->setColuna($col);

                if ($array['chavePrimaria'] == true) {
                    $tipo = 'text';
                    /**
                     * @var Tabelas $tabela
                     */
                    //$tabela = $app['tables.repository']->findOneBy(['nome' => $array['tabela']]);
                    //$parametro->setQueryString("SELECT * FROM {$tabela->getSchema()}.{$tabela->getNome()}");
                    //$parametro->setTabela($tabela);
                } elseif (!empty($array['tabelaRef'])) {
                    $tipo = 'Entidade';
                    $tabela = $app['tables.repository']->findOneBy(['nome' => $array['tabelaRef']]);
                    $parametro->setQueryString("SELECT * FROM {$tabela->getSchema()}.{$tabela->getNome()}");
                    $parametro->setTabela($tabela);
                } elseif (!empty($array['formato']) && $array['formato'] == Formatos::TIPO_ENUM) {
                    $tipo = 'Entidade';
                    $tabela = $app['tables.repository']->findOneBy(['nome' => $array['tabela']]);
                    $parametro->setQueryString("SELECT DISTINCT {$arrayColumns[$item]} FROM {$tabela->getSchema()}.{$tabela->getNome()}");
                    $parametro->setTabela($tabela);
                } elseif (!empty($array['formato'])) {
                    $tipo = $array['formato'];
                }
            }

            $parametro->setTipo($tipo);
            $parametro->setQuery($query);
            $parametro->setQueryParametro($arrayColumns[$item]);

            $app['parametros.repository']->save($parametro);
        }
    }

    return $app->redirect('/execute/' . $query->getId());

});

$app->post('/query/save', function (Request $request) use ($app) {

    $nome = $request->request->get('nome');
    $tabela = $request->request->get('tabela');
    $relatorio = $request->request->get('relatorio');
    $queryString = $request->request->get('query');

    $table = null;

    if (!$nome) {
        $nome = 'Busca_v' . date('dmYHis');
    }

    $queryExiste = $app['queries.repository']->findOneBy(['nome' => $nome]);

    if ($queryExiste) {
        $nome = $nome . '_v'. date('dmYHis');
    }

    if ($tabela) {
        $table = $app['tables.repository']->find($tabela);
    }

    if (!empty($relatorio)) {
        $relatorio = $app['relatorios.repository']->find($relatorio);
    }

    $query = new Queries();
    $query->setNome($nome);
    $query->setTabela($table);
    $query->setRelatorio($relatorio);
    $query->setQuery($queryString);
    $query->setQueryString(true);

    $tipo = 'select';

    preg_match('/^update|UPDATE$/', $queryString, $found);

    if (!empty($found)) {
        $tipo = 'update';
    }

    $query->setTipo($tipo);
    $app['queries.repository']->save($query);

    $string = $queryString;

    $parametros = $dados = [];

    $slug = strstr($string, ':');
    $key = strrpos($slug, ':');
    $resultado = substr($slug, 0, $key + 1);
    $itens = explode(',', str_replace(' ', ',', $resultado));

    $parametrosCadastrados = [];

    foreach ($itens as $item) {

        if (strpos($item, ':') !== false) {
            $item = strstr($item, ':');
            $key = strrpos($item, ':');
            $item = substr($item, 1, $key - 1);

            $queryParametro = $item;

            if (in_array($item, $parametrosCadastrados)) {
                continue;
            }

            $parametros[$item]['tipo'] = 'text';
            $parametros[$item]['valor'] = $item;

            $parametro = new Parametros();
            $parametro->setQueryParametro($queryParametro);

            if (strpos($item, 'Data') !== false) {
                $parametros[$item]['tipo'] = 'Data';
                $newKey = strrpos($item, '-');
                $parametros[$item]['valor'] = substr($item, 0, $newKey);
            } elseif (strpos($item, 'Boolean') !== false) {
                $parametros[$item]['tipo'] = 'Boolean';
                $newKey = strrpos($item, '-');
                $parametros[$item]['valor'] = substr($item, 0, $newKey);
            } elseif (strpos($item, 'Entity') !== false) {

                $parametros[$item]['tipo'] = 'Entidade';
                $newKey = strrpos($item, '-');
                $valor = substr($item, 0, $newKey);

                $parametros[$item]['valor'] = $valor;

                $coluna = $tabela = strstr($item, '%');
                $newKey2 = strrpos($tabela, '|');

                if (!$newKey2) {
                    $newKey2 = strrpos($tabela, '%');
                }
                $nomeTabela = substr($tabela, 1, $newKey2 - 1);

                $coluna = strstr($coluna, '|');
                $newKey1 = strrpos($coluna, '%');
                $nomeColuna = substr($coluna, 1, $newKey1 - 1);

                $coluna = $app['columns.repository']->findOneBy(['nome' => $nomeColuna]);
                $parametro->setColuna($coluna);

                if (!$tabela) {
                    throw new Exception("É necessário informar a qual tabela a entidade está vinculada.");
                }

                $tabela = $app['tables.repository']->findOneBy(['nome' => $nomeTabela]);

                $select = null;

                if ($tabela) {
                    $parametro->setTabela($tabela);
                    $select = "SELECT * FROM {$nomeTabela}";
                }

                $parametro->setQueryString($select);
            }

            $parametro->setNome($parametros[$item]['valor']);
            $parametro->setTipo($parametros[$item]['tipo']);
            $parametro->setQuery($query);
            $app['parametros.repository']->save($parametro);

            array_push($parametrosCadastrados, $parametro->getQueryParametro());
        }
    }

    //exit;

    return $app->redirect('/queries');

})->bind('query_salvar');

$app->match('/query/{id}/remove', function ($id) use ($app) {

    $query = $app['queries.repository']->find($id);

    if (!$query) {
        throw new ReportException("Query não Encontrada.");
    }

    $parametros = $app['parametros.repository']->findBy(['query' => $query]);
    $run = $app['run.repository']->findBy(['query' => $query]);

    foreach ($parametros as $parametro) {
        $app['parametros.repository']->remove($parametro);
    }

    foreach ($run as $item) {
        $app['run.repository']->remove($item);
    }

    $app['queries.repository']->remove($query);

    return $app->redirect('/queries');

})->bind('query_remover');

$app->post('/query/edit/save', function (Request $request) use ($app) {

    $id = $request->request->get('id');
    $nome = $request->request->get('nome');
    $tabela = $request->request->get('tabela');
    $relatorio = $request->request->get('relatorio');
    $queryString = $request->request->get('query');

    $tabela = $app['tables.repository']->find($tabela);
    $query = $app['queries.repository']->find($id);
    $relatorio = $app['relatorios.repository']->find($relatorio);

    $query->setNome($nome);
    $query->setTabela($tabela);
    $query->setRelatorio($relatorio);
    $query->setQuery($queryString);

    $app['queries.repository']->save($query);

    return $app->redirect('/queries');
});

$app->get('/execute/{id}', function ($id, Request $request) use ($app) {

    if (!$id) {
        throw new Exception("A query não foi encontrada.", JsonResponse::HTTP_BAD_REQUEST);
    }

    $paramsFromRequest = $request->query->all();
    $pR = [];

    if (!empty($paramsFromRequest)) {

        foreach ($paramsFromRequest as $key => $param) {
            $pR[$key] = $param;
        }

    }

    /**
     * @var Query $query
     */
    $query = $app['queries.repository']->find($id);

    if (!$query) {
        throw new Exception("Query nao Encontrada.", JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
    }

    $string = $query->getQuery();

    $parametros = $dados = [];

    $slug = strstr($string, ':');
    $key = strrpos($slug, ':');
    $resultado = substr($slug, 0, $key + 1);
    $itens = explode(',', str_replace(' ', ',', $resultado));

    $parametrosQuery = $app['parametros.repository']->findBy(['query' => $query]);
    $parametrosR = new ParametrosHelper($parametrosQuery, $request);
    $parametrosR = $parametrosR->render($app);

    foreach ($itens as $item) {

        if (strpos($item, ':') !== false) {
            $item = strstr($item, ':');
            $key = strrpos($item, ':');
            $item = substr($item, 1, $key - 1);

            $parametros[$item]['tipo'] = 'text';

            if (strpos($item, 'Data') !== false) {
                $parametros[$item]['tipo'] = 'date';
            }

            $parametros[$item]['valor'] = $item;
        }

    }

    if ($pR) {

        $parametrosE = $app['parametros.repository']->findBy(['query' => $query]);

        $arrParametros = [];

        foreach ($parametrosE as $param) {
            $arrParametros[] = array_merge(
                [
                    'nome' => $param->getNome(),
                    'tipo' => $param->getTipo(),
                    'nomeQuery' => $param->getQueryParametro(),
                    'valor' => $param->getQueryParametro()
                ], $arrParametros);
        }

        foreach ($pR as $key => $item) {

            $valor = null;

            foreach ($arrParametros as $arrParametro) {

                if ($arrParametro['nome'] != $key) {
                    continue;
                }

                if ($arrParametro['tipo'] == 'Data') {

                    if (strpos($arrParametro['nome'], '-inicio') !== false) {
                        //TODO
                    }

                    if (strpos($arrParametro['nome'], '-fim') !== false) {
                        //TODO
                    }

                }

                $valor = $arrParametro['nomeQuery'];

            }

            if (is_array($item)) {
                $item = implode(',', $item);
            }

            $string = str_replace(':' . $valor . ':', $item, $string);
        }
    }

    $log = $result = $colunas = [];
    $arrayResult = $colunas = [];

    if ($parametros && !empty($request->query->all()) || empty($parametros)) {

        try {
            $result = $app['db']->fetchAll($string);

            $run = new Run($query);
            $run->setParameters($request->getQueryString());
            $run->setRowsReturned(count($result));
            $app['run.repository']->save($run);

        } catch (Exception $e) {
            $log = ['classe' => 'danger', 'msg' => $e->getMessage()];
        }

        if ($query->getTipo() == 'select') {

            if ($query->isQueryString()) {

                if ($result) {

                    $colunas = array_keys(current($result));

                    $colunas = array_map(function ($coluna) {
                        return ucwords(str_replace('_', ' ', $coluna));
                    }, $colunas);

                }

                return $app['twig']->render('execute.html.twig',
                    [
                        'result' => $result,
                        'columns' => $colunas,
                        'log' => $log,
                        'query' => $query,
                        'parametros' => null,
                        'parametrosR' => $parametrosR,
                        'params' => $pR,
                        'table' => $query->getTabela(),
                    ]);
            }

            if ($result) {

            $arrayColumns = [];

            $table = $query->getTabela();
            $columns = $app['columns.repository']->findBy(['tabela' => $table]);

            foreach ($columns as $key => $column) {
                $arrayColumns[$column->getNome()]['id'] = $column->getId();
                $arrayColumns[$column->getNome()]['visualizar'] = $column->isVisualizar();
                $arrayColumns[$column->getNome()]['nome'] = $column->getNome();
                $arrayColumns[$column->getNome()]['identificador'] = $column->getIdentificador();
                $arrayColumns[$column->getNome()]['formato'] = $column->getFormato() ? $column->getFormato()->getNome() : null;
                $arrayColumns[$column->getNome()]['tabelaNome'] = $column->getTabelaRef() ? $column->getTabelaRef()->getNome() : null;
            }

            $retorno = [];

            foreach ($result as $itens) {

                foreach ($itens as $key => $item) {

                    if (empty($item)) {
                        $item = null;
                    }

                    if (isset($arrayColumns[$key]) && !$arrayColumns[$key]['visualizar']) {
                        unset($itens[$key]);
                    }

                    if (!isset($arrayColumns[$key])) {
                        continue;
                    }

                    if (!empty($arrayColumns[$key]['formato'])) {

                        switch ($arrayColumns[$key]['formato']) {

                            case Formatos::TIPO_DATA :

                                if (empty($item)) {
                                    break;
                                }

                                $data = DateTime::createFromFormat('Ymd', $item);

                                if (!$data instanceof DateTime) {
                                    break;
                                }

                                $item = $data->format('d/m/Y');
                                break;

                            case Formatos::TIPO_DATA_HORA :

                                if (empty($item)) {
                                    break;
                                }

                                $data = DateTime::createFromFormat('Y-m-d H:i:s', $item);

                                if (!$data instanceof DateTime) {
                                    break;
                                }

                                $item = $data->format('d/m/Y H:i:s');
                                break;

                            case Formatos::TIPO_BOOLEAN :
                                $item = $item ? 'Sim' : 'Nao';
                                break;

                            case Formatos::TIPO_BOOLEAN_ATIVO_INATIVO :
                                $item = $item ? 'Ativo' : 'Inativo';
                                break;

                            case Formatos::TIPO_MOEDA :
                                $item = number_format($item, 2);
                                break;
                        }

                    }

                    if ($key == $arrayColumns[$key]['nome'] && !empty($arrayColumns[$key]['visualizar'])) {
                        $retorno[$key] = [
                            'valor' => !is_null($item) ? $item : null,
                            'coluna' => $key,
                            'tabela' => null,
                            'label' => null,
                            'nome' => $arrayColumns[$key]['identificador'] ?: $arrayColumns[$key]['nome'],
                        ];
                    }

                    if ($key == $arrayColumns[$key]['nome'] && !empty($arrayColumns[$key]['tabelaNome'])) {

                        if (!$arrayColumns[$key]['visualizar']) {
                            continue;
                        }

                        $table = $app['tables.repository']->findOneBy(['nome' => $arrayColumns[$key]['tabelaNome']]);
                        $columnsB = $app['columns.repository']->findBy(['tabela' => $table]);

                        $retorno[$key] = [
                            'valor' => !is_null($item) ? $item : null,
                            'coluna' => $key,
                            'tabela' => $arrayColumns[$key]['tabelaNome'],
                            'label' => $item,
                            'nome' => $arrayColumns[$key]['identificador'] ?: $arrayColumns[$key]['nome'],
                        ];

                        $nomesColunas = array_map(function ($coluna) {
                            return $coluna->getNome();
                        }, $columnsB);

                        $chavePrimaria = array_filter($columnsB, function ($coluna) {
                            return $coluna->isChavePrimaria();
                        });

                        $pk = !empty($chavePrimaria) ? current($chavePrimaria)->getNome() : null;

                        foreach ($columnsB as $cs) {

                            /**
                             * @var Colunas $cs
                             */
                            if ($cs->isLabel()) {

                                if (!$item) {
                                    continue;
                                }

                                $field = $key;

                                if (!in_array($key, $nomesColunas)) {
                                    $field = $pk;
                                }

                                $table = $app['tables.repository']->findOneBy(['nome' => $arrayColumns[$key]['tabelaNome']]);

                                $string = " SELECT {$cs->getNome()} FROM {$table->getSchema()}.{$table->getNome()} WHERE {$field} = {$item}";
                                $strColumn = $app['db']->fetchColumn($string);
                                $retorno[$key]['label'] = $strColumn;
                            }

                            if ($cs->getIdentificador() && $cs->getNome() == $arrayColumns[$key]['nome']) {
                                $retorno[$key]['nome'] = $arrayColumns[$key]['identificador'];
                            }

                        }
                    }
                }
                $arrayResult[] = $retorno;
            }

            foreach ($arrayResult as $cols) {
                foreach ($cols as $key => $col) {
                    $colunas[] = isset($col['nome']) ? $col['nome'] : $key;
                }
                break;
            }

            $colunas = array_map(function ($coluna) {
                return ucwords(str_replace('_', ' ', $coluna));
            }, $colunas);

        }

        } else {
            $log = ['classe' => 'success', 'msg' => 'A Atualização foi executada com Sucesso'];
        }
    }

    return $app['twig']->render('execute.html.twig',
        [
            'result' => $arrayResult,
            'columns' => $colunas,
            'log' => $log,
            'query' => $query,
            'dados' => $dados,
            'parametros' => $parametros,
            'parametrosR' => $parametrosR,
            'params' => $pR,
            'table' => $query->getTabela(),
            'queryString' => $string
        ]);

})->bind('query_execute');

$app->get('/query/new', function () use ($app) {

    $tables = $app['tables.repository']->findBy([], ['nome' => 'ASC']);

    /**
     * @var EntityManager $query
     */
    $table = $app['tables.repository']->find(1);
    $columns = $app['columns.repository']->findBy(['tabela' => $table]);

    return $app['twig']->render('query-new.html.twig', ['tables' => $tables, 'columns' => $columns, 'table' => $table]);

});

$app->get('/execute/{tabela}/{coluna}/{valor}', function ($tabela, $coluna, $valor) use ($app) {

    $colunas = $result = $log = [];

    $table = $app['tables.repository']->findOneBy(['nome' => $tabela]);
    $column = $app['columns.repository']->findOneBy(['nome' => $coluna, 'tabela' => $table]);
    $key = !empty($column) ? $column->getNome() : null;

    if (!$column) {
        $col = $app['columns.repository']->findOneBy(['tabela' => $table, 'chavePrimaria' => true]);
        if ($col) {
            $key = $col->getNome();
        }
    }

    $tableColumns = $app['columns.repository']->findBy(['tabela' => $table, 'visualizar' => true]);

    $strColumns = "";

    foreach ($tableColumns as $tableColumn) {
        $strColumns .= $tableColumn->getNome() . ", ";
    }

    $strColumns = substr($strColumns, 0, -2);

    $string = "SELECT {$strColumns} FROM {$table->getSchema()}.{$tabela} WHERE {$key} = {$valor}";

    try {
        $result = $app['db']->fetchAll($string);
    } catch (Exception $e) {
        $log = $e->getMessage();
    }

    $arrayResult = [];

    $retorno = [];

    if ($result) {

        $arrayColumns = [];

        $columns = $app['columns.repository']->findBy(['tabela' => $table, 'visualizar' => true]);

        foreach ($columns as $key => $column) {
            $arrayColumns[$column->getNome()]['id'] = $column->getId();
            $arrayColumns[$column->getNome()]['visualizar'] = $column->isVisualizar();
            $arrayColumns[$column->getNome()]['nome'] = $column->getNome();
            $arrayColumns[$column->getNome()]['identificador'] = $column->getIdentificador();
            $arrayColumns[$column->getNome()]['formato'] = $column->getFormato() ? $column->getFormato()->getNome() : null;
            $arrayColumns[$column->getNome()]['tabelaNome'] = $column->getTabelaRef() ? $column->getTabelaRef()->getNome() : null;
        }

        foreach ($result as $itens) {

            foreach ($itens as $key => $item) {

                if (empty($item)) {
                    $item = null;
                }

                if (isset($arrayColumns[$key]) && !$arrayColumns[$key]['visualizar']) {
                    unset($itens[$key]);
                }

                if (!isset($arrayColumns[$key])) {
                    continue;
                }

                if (!empty($arrayColumns[$key]['formato'])) {

                    switch ($arrayColumns[$key]['formato']) {

                        case 'Data' :

                            if (empty($item)) {
                                break;
                            }

                            $data = DateTime::createFromFormat('Ymd', $item);

                            if (!$data instanceof DateTime) {
                                break;
                            }

                            $item = $data->format('d/m/Y');
                            break;

                        case 'Data e Hora' :

                            if (empty($item)) {
                                break;
                            }

                            $data = DateTime::createFromFormat('Y-m-d H:i:s', $item);

                            if (!$data instanceof DateTime) {
                                break;
                            }

                            $item = $data->format('d/m/Y H:i:s');
                            break;

                        case 'Boolean' :
                            $item = $item ? 'Sim' : 'Nao';
                            break;

                        case 'Moeda' :
                            $item = number_format($item, 2);
                            break;
                    }

                }

                if ($key == $arrayColumns[$key]['nome'] && !empty($arrayColumns[$key]['visualizar'])) {
                    $retorno[$key] = [
                        'valor' => !empty($item) ? $item : null,
                        'coluna' => $key,
                        'tabela' => null,
                        'label' => null,
                        'nome' => $arrayColumns[$key]['identificador'] ?: $arrayColumns[$key]['nome'],
                    ];
                }

                if ($key == $arrayColumns[$key]['nome'] && !empty($arrayColumns[$key]['tabelaNome'])) {

                    $table = $app['tables.repository']->findOneBy(['nome' => $arrayColumns[$key]['tabelaNome']]);
                    $columnsB = $app['columns.repository']->findBy(['tabela' => $table]);

                    $retorno[$key] = [
                        'valor' => !empty($item) ? $item : null,
                        'coluna' => $key,
                        'tabela' => $arrayColumns[$key]['tabelaNome'],
                        'label' => $item,
                        'nome' => $arrayColumns[$key]['identificador'] ?: $arrayColumns[$key]['nome'],
                    ];

                    $nomesColunas = array_map(function ($coluna) {
                        return $coluna->getNome();
                    }, $columnsB);

                    $chavePrimaria = array_filter($columnsB, function ($coluna) {
                        return $coluna->isChavePrimaria();
                    });

                    $pk = !empty($chavePrimaria) ? current($chavePrimaria)->getNome() : null;

                    foreach ($columnsB as $cs) {

                        if ($cs->isLabel()) {

                            if (!$item) {
                                continue;
                            }

                            $field = $key;

                            if ($pk) {
                                $field = $pk;
                            }

                            if (!in_array($key, $nomesColunas)) {
                                $colunasTabela = $app['columns.repository']->findBy(['nome' => $arrayColumns[$key]['tabelaNome']]);
                                $chavePrimaria = array_filter($colunasTabela, function ($coluna) {
                                    return $coluna->isChavePrimaria();
                                });
                                $chaveLabel = array_filter($colunasTabela, function ($coluna) {
                                    return $coluna->isLabel();
                                });
                                if ($chaveLabel) {
                                    $field = current($chaveLabel)->getNome();
                                } elseif ($chavePrimaria) {
                                    $field = current($chavePrimaria)->getNome();
                                }
                            }

                            $table = $app['tables.repository']->findOneBy(['nome' => $arrayColumns[$key]['tabelaNome']]);

                            $string = "SELECT {$cs->getNome()} FROM {$table->getSchema()}.{$arrayColumns[$key]['tabelaNome']} WHERE {$field} = {$item}";
                            $strColumn = $app['db']->fetchColumn($string);
                            $retorno[$key]['label'] = $strColumn;
                        }

                        if ($cs->getIdentificador() && $cs->getNome() == $arrayColumns[$key]['nome']) {
                            $retorno[$key]['nome'] = $arrayColumns[$key]['identificador'];
                        }

                    }
                }
            }
            $arrayResult[] = $retorno;
        }

        foreach ($arrayResult as $cols) {
            foreach ($cols as $key => $col) {
                $colunas[] = isset($col['nome']) ? $col['nome'] : $key;
            }
            break;
        }

        $colunas = array_map(function ($coluna) {
            return ucwords(str_replace('_', ' ', $coluna));
        }, $colunas);

    }

    return $app['twig']->render('execute.html.twig',
        [
            'result' => $arrayResult,
            'columns' => $colunas,
            'log' => $log,
            'query' => null,
            'parametros' => null,
            'table' => $tabela
        ]);

});

$app->post('tabela/{id}/mesclar-colunas', function ($id, Request $request) use ($app) {

    $table = $app['tables.repository']->find($id);
    $columns = $app['columns.repository']->findBy(['tabela' => $table]);

    $colunasTabela = array_map(function ($column) {
        return $column->toArray();
    }, $columns);

    $colunas = $request->request->get('colunas');

    if (count($colunas) == 1) {
        throw new Exception("Informe mais de uma coluna para mescla-las.");
    }

    $colunaNome = "";

    foreach ($colunas as $coluna) {

        $item = array_filter($colunasTabela, function ($col) use ($coluna) {
            return $col['id'] == $coluna;
        });

        if (!$item) {
            throw new Exception("Coluna não encotrada na tabela " . $table->getNome());
        }

        $item = current($item)['nome'];
        $colunaNome .= ucwords(str_replace('_', ' ', $item)) . " - ";

    }

    $colunaNome = substr($colunaNome, 0, -3);

    $colunaA = new Colunas();
    $colunaA->setNome($colunaNome);
    $colunaA->setTipo(Colunas::TIPO_MESCLADO);
    $colunaA->setLabel(false);
    $colunaA->setTabela($table);

    $app['columns.repository']->save($colunaA);

    return $app->redirect('/');

})->bind('mesclar_colunas');

$app->get('/search', function (Request $request) use ($app) {

   $search = $request->get('q');

    $tabelas = $app['tables.repository']->findBy(['nome' => $search]);
    $colunas = $app['columns.repository']->findBy(['nome' => $search]);
    $queries = $app['queries.repository']->findBy(['nome' => $search]);

});

$app->get('/importar-tabelas', function (Request $request) use ($app) {

    $schemas = [
        'webpdv',
        'sqldados',
        'sqlpdv',
        'ecf',
        'foxpaf',
        'curriculos',
        'relatorio',
    ];

    return $app['twig']->render('importar-tabelas.html.twig',
        ['schemas' => $schemas]);


})->bind('import');

$app->get('/importar-tabelas/{schema}', function ($schema, Request $request) use ($app) {

    $tabelas = $app['tables.repository']->findBy(['schema' => $schema]);

    $tabelas = array_map(
        function ($tabela) {
            return (string)$tabela->getNome();
        },
        $tabelas
    );

    $stmt = null;

    foreach ($tabelas as $tabela) {

        $stmt .= " '{$tabela}', ";

    }

    $stmt = substr($stmt, 0, -2);

    $query = "SELECT * FROM information_schema.TABLES where TABLE_SCHEMA = '{$schema}' AND TABLE_NAME NOT IN({$stmt})";

    $result = $app['db']->fetchAll($query);

    return $app['twig']->render(
        'importar-tabelas-schema.html.twig',
        ['result' => $result, 'schema' => $schema]
    );

})->bind('import-from-schema');

$app->get('/importar-tabelas/{schema}/{tabela}/add', function ($schema, $tabela, Request $request) use ($app) {

    try {

        $nome = $tabela;

        $hasTable = $app['information.schema.repository']->hasTableSchema($nome, $schema);

        if (!$hasTable) {
            throw new Exception("Esta Tabela não existe em nenhum banco de dados configurado.", 404);
        }

        $tables = $app['tables.repository']->findOneBy(['nome' => $nome, 'schema' => $schema]);

        if (!empty($tables)) {
            throw new Exception("Tabela já existe para esse Banco de Dados.", 404);
        }

        $tabela = new Tabelas();
        $tabela->setNome($nome);
        $tabela->setSchema($schema);
        $tabela->setAtivo(true);

        $app['tables.repository']->save($tabela);

        return $app->redirect('/tabela/' . $tabela->getNome());

    } catch (Exception $e) {
        throw $e;
    }


})->bind('import-table');

/*
$app->error(function (\Exception $e, \Symfony\Component\HttpFoundation\Request $request, $code) use ($app) {
    switch ($code) {
        case 400 :
            $message = 'Ocorreu um erro na m&aacute;quina local.';
            break;
        case 403 :
            $message = 'Acesso negado, Você não tem permissão para acessar esta página.';
            break;
        case 404 :
            $message = 'Página não encontrada.';
            break;
        case 500 :
            $message = 'Um erro ocorreu no servidor.';
            break;
        case 504 :
            $message = 'Erro interno no servidor.';
            break;
        default :
            $message = 'Um erro ocorreu.';
            break;
    }
    return $app['twig']->render('errors/error.html.twig', ['code' => $code, 'message' => $message, 'erro' => $e->getMessage()]);
});
*/
return $app;