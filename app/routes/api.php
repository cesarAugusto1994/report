<?php
/**
 * Created by PhpStorm.
 * User: cesar
 * Date: 20/07/17
 * Time: 08:33
 */

use Report\Entity\Colunas;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

$api = $app['controllers_factory'];

$api->get('/queries', function (Request $request) use ($app) {

    $queries = $app['queries.repository']->findBy([], ['nome' => 'ASC']);

    $retorno = [];

    foreach ($queries as $query) {
        $retorno[] = $query->toArray();
    }

    return new JsonResponse($retorno);
});

$api->get('/query', function (Request $request) use ($app) {

    $queries = $app['queries.repository']->findBy([], ['nome' => 'ASC']);

    $retorno = [];

    foreach ($queries as $query) {
        $retorno[] = [
            'id' => $query->getId(),
            'nome' => $query->getNome()
        ];
    }

    return new JsonResponse($retorno);
});


$api->get('/relatorios', function (Request $request) use ($app) {

    $relatorios = $app['relatorios.repository']->findBy([], ['nome' => 'ASC']);

    $retorno = [];

    foreach ($relatorios as $relatorio) {
        $retorno[] = $relatorio->toArray();
    }

    return new JsonResponse($retorno);
});

$api->get('/tabela/{id}/colunas', function ($id) use ($app) {

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

$api->post('/remover-vinculo-coluna-tabela', function (Request $request) use ($app) {

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

$api->post('/vincular-coluna-tabela', function (Request $request) use ($app) {

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

$api->post('/adicionar-identificador-coluna', function (Request $request) use ($app) {

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

$api->post('/adicionar-formato-coluna', function (Request $request) use ($app) {

    $coluna = $request->request->get('coluna');
    $formato = $request->request->get('formato');

    try {
        /**
         * @var Colunas $column
         */
        $column = $app['columns.repository']->find($coluna);
        $formato = $app['formatos.repository']->find($formato);
        $column->setFormato($formato);
        $app['columns.repository']->save($column);

        return $app->json([
            'classe' => 'sucesso',
            'mensagem' => 'Formato Adicionado com Sucesso.'
        ], JsonResponse::HTTP_CREATED);

    } catch (Exception $e) {

        return $app->json([
            'classe' => 'erro',
            'mensagem' => $e->getMessage()
        ], JsonResponse::HTTP_NOT_ACCEPTABLE);

    }
});

$api->post('/tratar-mostrar-coluna', function (Request $request) use ($app) {

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

$api->post('/adicionar-label', function (Request $request) use ($app) {

    $coluna = $request->request->get('coluna');

    try {
        /**
         * @var Colunas $column
         */
        $column = $app['columns.repository']->find($coluna);
        $column->setLabel(!$column->isLabel());
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

$api->get('/tabelas', function () use ($app) {

    $tables = $app['tables.repository']->findBy([], ['nome' => 'ASC']);

    $retorno = [];

    foreach ($tables as $table) {
        $retorno[$table->getId()] = $table->getNomeFormatado() . ' - ' . $table->getSchema();
    }

    return new JsonResponse($retorno);
});

$api->get('/tables', function () use ($app) {

    $tables = $app['tables.repository']->findBy([], ['nome' => 'ASC']);

    $retorno = [];

    foreach ($tables as $table) {
        $retorno[] = [
            'id' => $table->getId(),
            'nome' => $table->getNome(),
            'nomeFormatado' => $table->getNomeFormatado(),
            'schema' => $table->getSchema(),
        ];
    }

    return new JsonResponse($retorno);
});

$api->get('/tabelas/from-grid', function () use ($app) {

    $tables = $app['tables.repository']->findBy([], ['nome' => 'ASC']);

    $retorno = [];

    foreach ($tables as $table) {
        $retorno[] = $table->toArray();
    }

    return new JsonResponse($retorno);
});

$api->get('/formatos', function () use ($app) {

    $formatos = $app['formatos.repository']->findBy([], ['nome' => 'ASC']);

    $retorno = [];

    foreach ($formatos as $formato) {
        $retorno[$formato->getId()] = $formato->getNome();
    }

    return new JsonResponse($retorno);
});

return $api;