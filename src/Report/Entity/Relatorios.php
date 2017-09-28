<?php
/**
 * Created by PhpStorm.
 * User: cesar
 * Date: 20/07/17
 * Time: 11:38
 */

namespace Report\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Relatorios
 * @package Report\Entity
 * @ORM\Table(name="relatorios")
 * @ORM\Entity(repositoryClass="Report\Repository\RelatoriosRepository")
 */
class Relatorios
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     * @var integer
     */
    private $id;

    /**
     * @ORM\Column(name="nome", type="string")
     * @var string
     */
    private $nome;

    /**
     * @ORM\OneToMany(targetEntity="Queries", mappedBy="relatorio")
     * @var ArrayCollection
     */
    private $queries;

    /**
     * Relatorios constructor.
     */
    public function __construct()
    {
        $this->queries = new ArrayCollection();
    }

    /**
     * @return mixed
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

    /**
     * @return ArrayCollection
     */
    public function getQueries()
    {
        return $this->queries->getValues();
    }

    /**
     * @param ArrayCollection $queries
     */
    public function setQueries($queries)
    {
        $this->queries = $queries;
    }

    public function toArray()
    {
        return [
            'id' => $this->id,
            'nome' => $this->nome
        ];
    }
}