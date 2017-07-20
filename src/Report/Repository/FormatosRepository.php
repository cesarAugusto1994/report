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
use Report\Entity\Formatos;
use Report\Entity\Relatorios;

class FormatosRepository extends EntityRepository
{
    /**
     * @param Formatos $formatos
     */
    public function save(Formatos $formatos)
    {
        $this->_em->persist($formatos);
        $this->_em->flush();
    }

    /**
     * @param Formatos $formatos
     */
    public function remove(Formatos $formatos)
    {
        $this->_em->remove($formatos);
        $this->_em->flush();
    }

}