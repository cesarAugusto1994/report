<?php
/**
 * Created by PhpStorm.
 * User: cesar
 * Date: 11/07/17
 * Time: 16:24
 */

use Report\Entity\Colunas;
use Report\Entity\Queries;
use Report\Entity\Tabelas;

$app['queries.repository'] = $app['orm.em']->getRepository(Queries::class);

$app['tables.repository'] = $app['orm.em']->getRepository(Tabelas::class);

$app['columns.repository'] = $app['orm.em']->getRepository(Colunas::class);

