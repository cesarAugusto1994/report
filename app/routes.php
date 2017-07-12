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

    return $app['twig']->render('table.html.twig', ['tables' => $columns]);

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

$app->get('/execute/{id}', function ($id) use ($app) {

    if (!$id) {
        throw new InvalidArgumentException("FATAL ERROR", 501);
    }

    /**
     * @var Queries $query
     */
    $query = $app['queries.repository']->find($id);

    $columns = $app['columns.repository']->findBy(['tabela' => $query->getTabela()]);

    $log = $result = [];

    try {
        $result = $app['db']->fetchAll($query->getQuery());
    } catch (Exception $e) {
        $log = $e->getMessage();
    }

    $colunas = [];

    if ($result) {
        $colunas = array_keys(current($result));
    }

    return $app['twig']->render('execute.html.twig', ['result' => $result, 'columns' => $colunas, 'log' => $log, 'query' => $query]);

});

return $app;