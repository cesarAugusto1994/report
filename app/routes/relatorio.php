<?php
/**
 * Created by PhpStorm.
 * User: cesar
 * Date: 20/07/17
 * Time: 11:24
 */

use Report\Entity\Relatorios;
use Symfony\Component\HttpFoundation\Request;

$relatorio = $app['controllers_factory'];

$relatorio->get('/{nome}', function ($nome) use ($app) {

    $relatorio = $app['relatorios.repository']->findOneBy(['nome' => $nome]);

    return $app['twig']->render('relatorio.html.twig', ['relatorio' => $relatorio]);

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

return $relatorio;