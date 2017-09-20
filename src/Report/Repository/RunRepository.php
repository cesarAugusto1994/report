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
use Report\Entity\Run;

class RunRepository extends EntityRepository
{
    /**
     * @param Run $run
     */
    public function save(Run $run)
    {
        $this->_em->persist($run);
        $this->_em->flush();
    }

    /**
     * @param Run $run
     */
    public function remove(Run $run)
    {
        $this->_em->remove($run);
        $this->_em->flush();
    }

}