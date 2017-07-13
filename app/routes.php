<?php
/**
 * Created by PhpStorm.
 * User: cesar
 * Date: 11/07/17
 * Time: 16:17
 */

use Doctrine\ORM\EntityManager;
use Report\Entity\Queries;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

$app->get('/', function () use ($app) {

    $tables = $app['tables.repository']->findBy([], ['nome' => 'ASC']);

    return $app['twig']->render('index.html.twig', ['tables' => $tables]);

});

$app->get('/tabela/{nome}', function ($nome) use ($app) {

    /**
     * @var EntityManager $query
     */
    $table = $app['tables.repository']->findOneBy(['nome' => $nome]);
    $columns = $app['columns.repository']->findBy(['tabela' => $table]);

    return $app['twig']->render('table.html.twig', ['columns' => $columns, 'table' => $table]);

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

    foreach ($select as $item) {
        $queryString .= $arrayColumns[$item] . ', ';
    }

    $queryString = substr($queryString, 0, -2);

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

    $nome = 'Busca na Tabela ' . $table->getNome() . ' ' .date('dmYHis');

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
        throw new InvalidArgumentException("FATAL ERROR", 501);
    }

    $params = $request->query->all();
    $p = [];

    if (!empty($params)) {

        foreach ($params as $key => $param) {
            $p[$key] = $param;
        }

    }

    $query = $app['queries.repository']->find($id);

    if (!$query) {
        throw new ReportException("Query não Encontrada.");
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

    if (!empty($p) && false != $p) {
        foreach ($p as $key => $item) {
            $string = str_replace($key, $item, $string);
        }

    }

    $log = $result = $colunas = [];

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
        ['result' => $result, 'columns' => $colunas, 'log' => $log, 'query' => $query, 'parametros' => $parametros]);

});

return $app;