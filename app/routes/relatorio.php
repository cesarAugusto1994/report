<?php
/**
 * Created by PhpStorm.
 * User: cesar
 * Date: 20/07/17
 * Time: 11:24
 */

use Report\Entity\Relatorios;
use Report\Entity\Tabelas;
use Symfony\Component\HttpFoundation\Request;

$relatorio = $app['controllers_factory'];

$relatorio->get('/{nome}', function ($nome) use ($app) {

    $relatorio = $app['relatorios.repository']->findOneBy(['nome' => $nome]);

    $tables = $app['tables.repository']->findBy([], ['nome' => 'ASC']);
    $tabelasRelatorio = $app['tables.repository']->findBy(['relatorio' => $relatorio], ['nome' => 'ASC']);

    $retornoQueries = [];

    foreach ($tabelasRelatorio as $item) {
        $retornoQueries = array_merge($app['queries.repository']->findBy(['tabela' => $item]), $retornoQueries);
    }

    return $app['twig']->render('relatorio.html.twig', ['relatorio' => $relatorio, 'tabelas' => $tables, 'queries' => $retornoQueries]);

})->bind('relatorio');

$relatorio->post('/criar', function (Request $request) use ($app) {

    $nome = $request->request->get('nome_relatorio');

    if (empty($nome)) {
        throw new Exception('Deve Ser informado o nome do Relatório');
    }

    if ($app['relatorios.repository']->findOneBy(['nome' => $nome])) {
        throw new Exception('Já existe um Relatório com este nome');
    }

    $relatorio = new Relatorios();
    $relatorio->setNome($nome);

    $app['relatorios.repository']->save($relatorio);

    return $app->redirect($relatorio->getNome());

})->bind('relatorio_criar');

$relatorio->post('{id}/vincular-tabela', function ($id, Request $request) use ($app) {

    $tabelas = $request->request->get('tabelas');
    $relatorio = $app['relatorios.repository']->find($id);

    if (empty($relatorio)) {
        throw new Exception('Deve informar o Relatorio.');
    }

    if (empty($tabelas)) {
        throw new Exception('Deve informar as tabelas que deseja vincular ao Relatório.');
    }

    foreach ($tabelas as $tabela) {

        /**
         * @var Tabelas $tabela
         */
        $tabela = $app['tables.repository']->find($tabela);
        $tabela->setRelatorio($relatorio);
        $app['tables.repository']->save($tabela);
    }

    return $app->redirect("/relatorio/" . $relatorio->getNome());

})->bind('relatorio_vincular_tabelas');

return $relatorio;