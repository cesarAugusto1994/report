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
use Report\Entity\Parametros;
use Report\Entity\Relatorios;

class ParametrosRepository extends EntityRepository
{
    /**
     * @param Parametros $parametros
     */
    public function save(Parametros $parametros)
    {
        $this->_em->persist($parametros);
        $this->_em->flush();
    }

    /**
     * @param Parametros $parametros
     */
    public function remove(Parametros $parametros)
    {
        $this->_em->remove($parametros);
        $this->_em->flush();
    }

}