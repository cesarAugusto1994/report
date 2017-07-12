<?php

namespace Report\Controller;

use Doctrine\ORM\EntityManager;
use Silex\Application;

class IndexController
{
    public function index(Application $app)
    {
        $tables = $app['query.repository']->findBy([], ['nome' => 'ASC']);
        return $app['twig']->render('index.twig', ['tables' => $tables]);
    }

    public function table(Application $app, $nome)
    {
        $tables = $app['query.repository']->findBy(['nome' => 'webpdv']);

        /**
         * @var EntityManager $query
         */
        $tables = $app['query.repository']->findOneBy(['nome' => $nome]);

        $entityName = str_replace('_', ' ', $tables->getNome());
        $entityName = ucwords($entityName);
        $entityName = "Report\\Entity\\" . str_replace(' ', '', $entityName);

        /**
         * @var EntityManager $con
         */
        $con = $app['orm.em'];

        $cols = $erro = [];

        try {
            $cols = $con->getClassMetadata($entityName)->getFieldNames();
        } catch (\Exception $e) {
            $erro = $e->getMessage();
        }

        return $app['twig']->render('table.twig', ['tables' => $cols, 'erro' => $erro]);
    }
}
