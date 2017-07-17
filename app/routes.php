<?php
/**
 * Created by PhpStorm.
 * User: cesar
 * Date: 11/07/17
 * Time: 16:17
 */

use Doctrine\ORM\EntityManager;
use Report\Entity\Colunas;
use Report\Entity\Queries;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

$app->get('/', function () use ($app) {

    $tables = $app['tables.repository']->findBy([], ['nome' => 'ASC']);

    return $app['twig']->render('index.html.twig', ['tables' => $tables]);

});

$app->get('/api/tabelas', function () use ($app) {

    $tables = $app['tables.repository']->findBy([], ['nome' => 'ASC']);

    $retorno = [];

    foreach ($tables as $table) {
        $retorno[$table->getId()] = $table->getNomeFormatado();
    }

    return new JsonResponse($retorno);
});

$app->get('/api/tabela/{id}/colunas', function ($id) use ($app) {

    $table = $app['tables.repository']->find($id);
    $columns = $app['columns.repository']->findBy(['tabela' => $table]);

    $retorno = [];

    foreach ($columns as $column) {
        $retorno[] = [
            'id' => $column->getId(),
            'nome' => $column->getNomeFormatado(),
        ];
    }

    return new JsonResponse($retorno);
});

$app->post('/api/remover-vinculo-coluna-tabela', function (Request $request) use ($app) {

    $coluna = $request->request->get('coluna');

    try {
        /**
         * @var Colunas $column
         */
        $column = $app['columns.repository']->find($coluna);

        $column->setTabelaRef(null);

        $app['columns.repository']->save($column);

        return $app->json([
            'classe' => 'sucesso',
            'mensagem' => 'Tabela Desvinculada com Sucesso.'
        ], JsonResponse::HTTP_CREATED);

    } catch (Exception $e) {

        return $app->json([
            'classe' => 'erro',
            'mensagem' => $e->getMessage()
        ], JsonResponse::HTTP_NOT_ACCEPTABLE);

    }
});


$app->post('/api/vincular-coluna-tabela', function (Request $request) use ($app) {

    $tabela = $request->request->get('tabela');
    $coluna = $request->request->get('coluna');

    try {

        $table = $app['tables.repository']->find($tabela);

        /**
         * @var Colunas $column
         */
        $column = $app['columns.repository']->find($coluna);

        $column->setTabelaRef($table);

        $app['columns.repository']->save($column);

        return $app->json([
            'classe' => 'sucesso',
            'mensagem' => 'Tabela Vinculada com Sucesso.'
        ], JsonResponse::HTTP_CREATED);

    } catch (Exception $e) {

        return $app->json([
            'classe' => 'erro',
            'mensagem' => $e->getMessage()
        ], JsonResponse::HTTP_NOT_ACCEPTABLE);

    }

});

$app->post('/api/adicionar-identificador-coluna', function (Request $request) use ($app) {

    $coluna = $request->request->get('coluna');
    $identificador = $request->request->get('identificador');

    try {
        /**
         * @var Colunas $column
         */
        $column = $app['columns.repository']->find($coluna);
        $column->setIdentificador($identificador);
        $app['columns.repository']->save($column);

        return $app->json([
            'classe' => 'sucesso',
            'mensagem' => 'Identificador Adicionado com Sucesso.'
        ], JsonResponse::HTTP_CREATED);

    } catch (Exception $e) {

        return $app->json([
            'classe' => 'erro',
            'mensagem' => $e->getMessage()
        ], JsonResponse::HTTP_NOT_ACCEPTABLE);

    }
});

$app->post('/api/tratar-mostrar-coluna', function (Request $request) use ($app) {

    $coluna = $request->request->get('coluna');

    try {
        /**
         * @var Colunas $column
         */
        $column = $app['columns.repository']->find($coluna);
        $column->setVisualizar(!$column->isVisualizar());
        $app['columns.repository']->save($column);

        return $app->json([
            'classe' => 'sucesso',
            'mensagem' => 'Coluna Tratada com Sucesso.'
        ], JsonResponse::HTTP_CREATED);

    } catch (Exception $e) {

        return $app->json([
            'classe' => 'erro',
            'mensagem' => $e->getMessage()
        ], JsonResponse::HTTP_NOT_ACCEPTABLE);

    }
});

$app->post('/api/adicionar-label', function (Request $request) use ($app) {

    $coluna = $request->request->get('coluna');

    try {
        /**
         * @var Colunas $column
         */
        $column = $app['columns.repository']->find($coluna);
        $column->setLabel(!$column->getLabel());
        $app['columns.repository']->save($column);

        return $app->json([
            'classe' => 'sucesso',
            'mensagem' => 'Label Tratada com Sucesso.'
        ], JsonResponse::HTTP_CREATED);

    } catch (Exception $e) {

        return $app->json([
            'classe' => 'erro',
            'mensagem' => $e->getMessage()
        ], JsonResponse::HTTP_NOT_ACCEPTABLE);

    }
});

$app->get('/tabela/{nome}', function ($nome, Request $request) use ($app) {

    /**
     * @var EntityManager $query
     */
    $table = $app['tables.repository']->findOneBy(['nome' => $nome]);
    $columns = $app['columns.repository']->findBy(['tabela' => $table]);
    $queries = $app['queries.repository']->findBy(['tabela' => $table]);

    $tablesUnion = $app['columns.repository']->findBy(['tabelaRef' => $table]);

    $tablesUnion = array_filter($tablesUnion, function ($item) use ($table) {
        return $item !== $table;
    });

    $tables = $app['tables.repository']->findBy([], ['nome' => 'ASC']);

    return $app['twig']->render('table.html.twig', [
        'queries' => $queries,
        'columns' => $columns,
        'table' => $table,
        'tables' => $tables,
        'union' => $tablesUnion
    ]);

})->bind('tabela');

$app->get('/queries', function () use ($app) {

    $queries = $app['queries.repository']->findAll();

    return $app['twig']->render('queries.html.twig', ['queries' => $queries]);

});

$app->get('/query/add', function () use ($app) {

    $tables = $app['tables.repository']->findBy([], ['nome' => 'ASC']);

    return $app['twig']->render('query-add.html.twig', ['tables' => $tables]);

});

$app->get('/query/edit/{id}', function ($id) use ($app) {

    $tables = $app['tables.repository']->findBy([], ['nome' => 'ASC']);
    $query = $app['queries.repository']->find($id);

    return $app['twig']->render('query-edit.html.twig', ['tables' => $tables, 'query' => $query]);

})->bind('query_edit');

$app->post('/query/create', function (Request $request) use ($app) {

    $table = $nome = $request->request->get('table');
    $select = $nome = $request->request->get('select');
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

    $queryString = " SELECT ";

    if (count($select) == count($arrayColumns)) {

        $queryString .= $alias . ".* ";

    } else {

        foreach ($select as $item) {
            $queryString .= $alias . '.' . $arrayColumns[$item] . ', ';
        }

        $queryString = substr($queryString, 0, -2);

    }

    $queryString .= " FROM " . $table->getNome() . ' ' . $alias . PHP_EOL;

    if (!empty($inner)) {

        foreach ($inner as $key => $item) {

            $coluna = $app['columns.repository']->find($item);
            $table = $app['tables.repository']->find($coluna->getTabela());

            $queryString .= " INNER JOIN " . $table->getNome() . " " . $table->getNome() . " USING (" . $coluna->getNome() . ")" . PHP_EOL;
        }

    }

    if (!empty($where)) {

        $queryString .= " WHERE ";

        foreach ($where as $key => $item) {

            if (0 == $key) {
                $queryString .= $alias . '.' . $arrayColumns[$item] . " = :{$arrayColumns[$item]}: " . PHP_EOL;
            } else {
                $queryString .= " AND " . $alias . '.' . $arrayColumns[$item] . " = :{$arrayColumns[$item]}: " . PHP_EOL;
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

    $nome = 'Busca na Tabela ' . $table->getNome() . ' ' . date('dmYHis');

    $query = new Queries();
    $query->setNome($nome);
    $query->setTabela($table);
    $query->setQuery($queryString);
    $query->setQueryString(false);

    $app['queries.repository']->save($query);

    return $app->redirect('/execute/' . $query->getId());

});

$app->post('/query/save', function (Request $request) use ($app) {

    $nome = $request->request->get('nome');
    $tabela = $request->request->get('tabela');
    $queryString = $request->request->get('query');

    $tabela = $app['tables.repository']->find($tabela);

    $query = new Queries();
    $query->setNome($nome);
    $query->setTabela($tabela);
    $query->setQuery($queryString);
    $query->setQueryString(true);

    $app['queries.repository']->save($query);

    return $app->redirect('/queries');

});

$app->post('/query/{id}/remove', function ($id) use ($app) {

    $query = $app['queries.repository']->find($id);

    if (!$query) {
        throw new ReportException("Query n�o Encontrada.");
    }

    $app['queries.repository']->remove($query);

    return $app->redirect('/queries');

});

$app->post('/query/edit/save', function (Request $request) use ($app) {

    $id = $request->request->get('id');
    $nome = $request->request->get('nome');
    $tabela = $request->request->get('tabela');
    $queryString = $request->request->get('query');

    $tabela = $app['tables.repository']->find($tabela);

    $query = $app['queries.repository']->find($id);
    $query->setNome($nome);
    $query->setTabela($tabela);
    $query->setQuery($queryString);

    $app['queries.repository']->save($query);

    return $app->redirect('/queries');
});

$app->get('/execute/{id}', function ($id, Request $request) use ($app) {

    if (!$id) {
        throw new InvalidArgumentException("FATAL ERROR", JsonResponse::HTTP_BAD_REQUEST);
    }

    $paramsFromRequest = $request->query->all();
    $pR = [];

    if (!empty($paramsFromRequest)) {

        foreach ($paramsFromRequest as $key => $param) {
            $pR[$key] = $param;
        }

    }

    $query = $app['queries.repository']->find($id);

    if (!$query) {
        throw new ReportException("Query n�o Encontrada.", JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
    }

    $string = $query->getQuery();

    $parametros = [];

    $slug = strstr($string, ':');
    $key = strrpos($slug, ':');
    $resultado = substr($slug, 0, $key + 1);
    $itens = explode(',', str_replace(' ', ',', $resultado));

    foreach ($itens as $item) {

        if (strpos($item, ':') !== false) {
            $item = strstr($item, ':');
            $key = strrpos($item, ':');
            $item = substr($item, 1, $key - 1);
            $parametros[] = $item;
        }

    }

    if (!empty($pR) && false != $pR) {
        foreach ($pR as $key => $item) {
            $string = str_replace(':' . $key . ':', $item, $string);
        }
    }

    $log = $result = $colunas = [];
    $arrayResult = [];

    if ($parametros && !empty($request->query->all()) || empty($parametros)) {

        try {
            $result = $app['db']->fetchAll($string);
        } catch (Exception $e) {
            $log = $e->getMessage();
        }

        if ($query->isQueryString()) {

            $colunas = array_keys(current($result));

            $colunas = array_map(function ($coluna) {
                return ucwords(str_replace('_', ' ', $coluna));
            }, $colunas);

            return $app['twig']->render('execute.html.twig',
                [
                    'result' => $result,
                    'columns' => $colunas,
                    'log' => $log,
                    'query' => $query,
                    'parametros' => null
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

                        if (!$arrayColumns[$key]['visualizar']) {
                            continue;
                        }

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

                            if ($cs->getLabel()) {

                                if (!$item) {
                                    continue;
                                }

                                $field = $key;

                                if (!in_array($key, $nomesColunas)) {
                                    $field = $pk;
                                }

                                $string = " SELECT {$cs->getNome()} FROM {$arrayColumns[$key]['tabelaNome']} WHERE {$field} = {$item}";
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
    }

    return $app['twig']->render('execute.html.twig',
        [
            'result' => $arrayResult,
            'columns' => $colunas,
            'log' => $log,
            'query' => $query,
            'parametros' => $parametros
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

    if (empty($column)) {
        $columns = $app['columns.repository']->findBy(['tabela' => $table]);
        $col = array_filter($columns, function ($column) {
            return $column->isChavePrimaria();
        });
        $key = current($col)->getNome() ?: null;
    }

    $string = " SELECT * FROM {$tabela} WHERE {$key} = {$valor} ";

    try {
        $result = $app['db']->fetchAll($string);
    } catch (Exception $e) {
        $log = $e->getMessage();
    }

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
            'query' => null,
            'parametros' => null
        ]);

});

return $app;