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
        $retorno[$table->getId()] = $table->getNome();
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

$app->get('/tabela/{nome}', function ($nome) use ($app) {

    /**
     * @var EntityManager $query
     */
    $table = $app['tables.repository']->findOneBy(['nome' => $nome]);
    $columns = $app['columns.repository']->findBy(['tabela' => $table]);

    $tables = $app['tables.repository']->findBy([], ['nome' => 'ASC']);

    return $app['twig']->render('table.html.twig', ['columns' => $columns, 'table' => $table, 'tables' => $tables]);

});

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

});

$app->post('/query/create', function (Request $request) use ($app) {

    $table = $nome = $request->request->get('table');
    $select = $nome = $request->request->get('select');
    $where = $nome = $request->request->get('where');
    $groupBy = $nome = $request->request->get('groupBy');
    $orderBy = $nome = $request->request->get('orderBy');
    $limit = $nome = $request->request->get('limit');

    $table = $app['tables.repository']->find($table);
    $columns = $app['columns.repository']->findBy(['tabela' => $table]);

    $arrayColumns = [];

    foreach ($columns as $column) {
        $arrayColumns[$column->getId()] = $column->getNome();
    }

    $queryString = " SELECT ";

    if (count($select) == count($arrayColumns)) {

        $queryString .= " * ";

    } else {

        foreach ($select as $item) {
            $queryString .= $arrayColumns[$item] . ', ';
        }

        $queryString = substr($queryString, 0, -2);

    }

    $queryString .= " FROM " . $table->getNome() . PHP_EOL;

    if (!empty($where)) {

        $queryString .= " WHERE ";

        foreach ($where as $key => $item) {

            if (0 == $key) {
                $queryString .= $arrayColumns[$item] . " = :{$arrayColumns[$item]}: " . PHP_EOL;
            } else {
                $queryString .= " AND " . $arrayColumns[$item] . " = :{$arrayColumns[$item]}: " . PHP_EOL;
            }
        }

    }

    if (!empty($groupBy)) {

        $queryString .= " GROUP BY ";

        foreach ($groupBy as $item) {
            $queryString .= $arrayColumns[$item] . ', ';
        }

        $queryString = substr($queryString, 0, -2) . PHP_EOL;
    }

    if (!empty($orderBy)) {

        $queryString .= " ORDER BY ";

        foreach ($orderBy as $item) {
            $queryString .= $arrayColumns[$item] . ', ';
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

    $app['queries.repository']->save($query);

    return $app->redirect('/queries');

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

    $app['queries.repository']->save($query);

    return $app->redirect('/queries');

});

$app->post('/query/{id}/remove', function ($id) use ($app) {

    $query = $app['queries.repository']->find($id);

    if (!$query) {
        throw new ReportException("Query não Encontrada.");
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
        throw new ReportException("Query não Encontrada.", JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
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

                        foreach ($columnsB as $cs) {

                            if ($cs->getLabel()) {

                                if (!$item) {
                                    continue;
                                }

                                $string = " SELECT {$cs->getNome()} FROM {$arrayColumns[$key]['tabelaNome']} WHERE {$key} = {$item}";
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

            echo '<pre>';

            //var_dump($arrayResult);

            foreach ($arrayResult as $cols) {
                foreach ($cols as $key => $col) {
                    $colunas[] = isset($col['nome']) ? $col['nome'] : $key;
                }
                break;
            }

            $colunas = array_map(function ($coluna) {
                return ucwords(str_replace('_', ' ', $coluna));
            }, $colunas);

            echo '</pre>';
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

});

$app->get('/execute/{tabela}/{coluna}/{valor}', function ($tabela, $coluna, $valor) use ($app) {

    $colunas = $result = $log = [];

    $string = " SELECT * FROM {$tabela} WHERE {$coluna} = {$valor} ";

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