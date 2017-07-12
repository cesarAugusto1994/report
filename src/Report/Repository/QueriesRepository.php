<?php
/**
 * Created by PhpStorm.
 * User: cesar
 * Date: 10/07/17
 * Time: 15:37
 */

namespace Report\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query\ResultSetMapping;
use Report\Entity\Queries;

class QueriesRepository extends EntityRepository
{
    /**
     * @param Queries $queries
     */
    public function save(Queries $queries)
    {
        $this->_em->persist($queries);
        $this->_em->flush();
    }

}