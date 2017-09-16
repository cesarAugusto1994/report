<?php
/**
 * Created by PhpStorm.
 * User: cesar
 * Date: 11/07/17
 * Time: 16:24
 */

use Report\Entity\Colunas;
use Report\Entity\Formatos;
use Report\Entity\Parametros;
use Report\Entity\Queries;
use Report\Entity\Relatorios;
use Report\Entity\Tabelas;
use Report\Entity\Run;

$app['queries.repository'] = $app['orm.em']->getRepository(Queries::class);

$app['relatorios.repository'] = $app['orm.em']->getRepository(Relatorios::class);

$app['formatos.repository'] = $app['orm.em']->getRepository(Formatos::class);

$app['parametros.repository'] = $app['orm.em']->getRepository(Parametros::class);

$app['tables.repository'] = $app['orm.em']->getRepository(Tabelas::class);

$app['columns.repository'] = $app['orm.em']->getRepository(Colunas::class);

$app['run.repository'] = $app['orm.em']->getRepository(Run::class);

$app['information.schema.repository'] = function () use ($app) {
    return new \Report\Repository\InformationSchemaRepository($app['orm.em']->getConnection());
};

$app['valor.padrao.verificacao.registros'] = 15;
