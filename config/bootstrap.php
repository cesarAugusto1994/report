<?php
/**
 * Created by PhpStorm.
 * User: cesar
 * Date: 19/09/16
 * Time: 14:08
 */

//AutoLoader do Composer
$loader = require __DIR__.'/../vendor/autoload.php';
//vamos adicionar nossas classes ao AutoLoader

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping\Driver\AnnotationDriver;
use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\Common\Annotations\AnnotationRegistry;
//se for falso usa o APC como cache, se for true usa cache em arrays
$paths = array(__DIR__ . "/../src/Report/Entity");
$isDevMode = false;
// configura��es do banco de dados
$dbParams = array(
    'driver'   => 'pdo_mysql',
    'host' => '192.168.111.2',
    'user'     => 'webpdv',
    'password' => 'p@lerm02156',
    'dbname'   => 'relatorio',
);
$config = Setup::createConfiguration($isDevMode);
//$config->setResultCacheImpl(new \Doctrine\Common\Cache\MemcacheCache());
//$config->setMetadataCacheImpl(new \Doctrine\Common\Cache\MemcacheCache());
//leitor das annotations das entidades
$driver = new AnnotationDriver(new AnnotationReader(), $paths);
$config->setMetadataDriverImpl($driver);
//registra as annotations do Doctrine
AnnotationRegistry::registerFile(__DIR__ . '/../vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/Driver/DoctrineAnnotations.php');

$cache = new \Doctrine\Common\Cache\MemcacheCache();
$cacheRegionConfiguration = new \Doctrine\ORM\Cache\RegionsConfiguration();
$factory = new \Doctrine\ORM\Cache\DefaultCacheFactory($cacheRegionConfiguration, $cache);
$config->setSecondLevelCacheEnabled();
$config->getSecondLevelCacheConfiguration()->setCacheFactory($factory);

//cria o entityManager
$entityManager = EntityManager::create($dbParams, $config);

$entityManager->getConnection()->getDatabasePlatform()
    ->registerDoctrineTypeMapping('enum', 'string');

$entityManager->getConfiguration()->setMetadataDriverImpl(
    new \Doctrine\ORM\Mapping\Driver\DatabaseDriver(
        $entityManager->getConnection()->getSchemaManager()
    )
);

/*
$evm = $entityManager->getEventManager();
$entitySubscriber = new DoctrineNaPratica\Model\Subscriber\EntitySubscriber;
$evm->addEventSubscriber($entitySubscriber);*/