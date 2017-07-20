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
use Report\Entity\Relatorios;

class RelatoriosRepository extends EntityRepository
{
    /**
     * @param Relatorios $relatorios
     */
    public function save(Relatorios $relatorios)
    {
        $this->_em->persist($relatorios);
        $this->_em->flush();
    }

    /**
     * @param Relatorios $relatorios
     */
    public function remove(Relatorios $relatorios)
    {
        $this->_em->remove($relatorios);
        $this->_em->flush();
    }

}