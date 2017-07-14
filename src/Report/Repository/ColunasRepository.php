<?php
/**
 * Created by PhpStorm.
 * User: cesar
 * Date: 12/07/17
 * Time: 14:34
 */

namespace Report\Repository;

use Doctrine\ORM\EntityRepository;
use Report\Entity\Colunas;

/**
 * Class ColunasRepository
 * @package Report\Repository
 */
class ColunasRepository extends EntityRepository
{

    /**
     * @param Colunas $colunas
     */
    public function save(Colunas $colunas)
    {
        $this->_em->persist($colunas);
        $this->_em->flush();
    }

    /**
     * @param Colunas $colunas
     */
    public function remove(Colunas $colunas)
    {
        $this->_em->remove($colunas);
        $this->_em->flush();
    }
}