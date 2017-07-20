<?php
/**
 * Created by PhpStorm.
 * User: cesar
 * Date: 20/07/17
 * Time: 17:39
 */

namespace Report\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Formatos
 * @package Report\Entity
 * @ORM\Table(name="formatos", schema="relatorio")
 * @ORM\Entity(repositoryClass="Report\Repository\FormatosRepository")
 */
class Formatos
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer", name="id")
     * @var integer
     */
    private $id;

    /**
     * @ORM\Column(name="nome", type="string")
     * @var string
     */
    private $nome;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param string $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }
}