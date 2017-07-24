<?php
/**
 * Created by PhpStorm.
 * User: cesar
 * Date: 12/07/17
 * Time: 11:55
 */

namespace Report\Repository;


use Doctrine\ORM\EntityRepository;
use Report\Entity\Tabelas;

class TabelasRepository extends EntityRepository
{
    /**
     * @param Tabelas $tabelas
     */
    public function save(Tabelas $tabelas)
    {
        $this->_em->persist($tabelas);
        $this->_em->flush();
    }

    /**
     * @param Tabelas $tabelas
     */
    public function remove(Tabelas $tabelas)
    {
        $this->_em->remove($tabelas);
        $this->_em->flush();
    }
}