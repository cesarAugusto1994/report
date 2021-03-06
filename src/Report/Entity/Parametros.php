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
 * Class Parametros
 * @package Report\Entity
 * @ORM\Table(name="parametros")
 * @ORM\Entity(repositoryClass="Report\Repository\ParametrosRepository")
 */
class Parametros
{

    const TIPO_ENTIDADE = 'Entidade';
    const TIPO_TEXTO = 'text';

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
     * @var Queries
     *
     * @ORM\ManyToOne(targetEntity="Queries")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="query_id", referencedColumnName="id")
     * })
     */
    private $query;

    /**
     * @ORM\Column(name="tipo", type="string")
     * @var string
     */
    private $tipo;

    /**
     * @ORM\Column(name="query_string", type="string")
     * @var string
     */
    private $queryString;

    /**
     * @ORM\Column(name="query_parametro", type="string")
     * @var string
     */
    private $queryParametro;

    /**
     * @var Colunas
     *
     * @ORM\ManyToOne(targetEntity="Colunas")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="coluna_id", referencedColumnName="id")
     * })
     */
    private $coluna;

    /**
     * @var Tabelas
     *
     * @ORM\ManyToOne(targetEntity="Tabelas")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tabela_id", referencedColumnName="id")
     * })
     */
    private $tabela;

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

    /**
     * @return Queries
     */
    public function getQuery()
    {
        return $this->query;
    }

    /**
     * @param Queries $query
     */
    public function setQuery($query)
    {
        $this->query = $query;
    }

    /**
     * @return string
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * @param string $tipo
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }

    /**
     * @return string
     */
    public function getQueryString()
    {
        return $this->queryString;
    }

    /**
     * @param string $queryString
     */
    public function setQueryString($queryString)
    {
        $this->queryString = $queryString;
    }

    /**
     * @return mixed
     */
    public function getQueryParametro()
    {
        return $this->queryParametro;
    }

    /**
     * @param mixed $queryParametro
     */
    public function setQueryParametro($queryParametro)
    {
        $this->queryParametro = $queryParametro;
    }

    /**
     * @return Colunas
     */
    public function getColuna()
    {
        return $this->coluna;
    }

    /**
     * @param Colunas $coluna
     */
    public function setColuna($coluna)
    {
        $this->coluna = $coluna;
    }

    /**
     * @return Tabelas
     */
    public function getTabela()
    {
        return $this->tabela;
    }

    /**
     * @param Tabelas $tabela
     */
    public function setTabela($tabela)
    {
        $this->tabela = $tabela;
    }
}