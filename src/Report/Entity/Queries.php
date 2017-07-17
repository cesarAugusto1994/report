<?php

namespace Report\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Queries
 *
 * @ORM\Table(name="queries", uniqueConstraints={@ORM\UniqueConstraint(name="queries_nome_uindex", columns={"nome"})}, indexes={@ORM\Index(name="queries_tabelas_id_fk", columns={"tabela"})}, schema="relatorio")
 * @ORM\Entity(repositoryClass="Report\Repository\QueriesRepository")
 */
class Queries
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="query", type="text", length=65535, nullable=true)
     */
    private $query;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=120, nullable=false)
     */
    private $nome;

    /**
     * @ORM\Column(name="query_string", type="boolean")
     * @var boolean
     */
    private $queryString;

    /**
     * @var \Tabelas
     *
     * @ORM\ManyToOne(targetEntity="Tabelas")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tabela", referencedColumnName="id")
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
    public function getQuery()
    {
        return $this->query;
    }

    /**
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @return \Tabelas
     */
    public function getTabela()
    {
        return $this->tabela;
    }

    /**
     * @param string $query
     */
    public function setQuery($query)
    {
        $this->query = $query;
    }

    /**
     * @param string $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * @param \Tabelas $tabela
     */
    public function setTabela($tabela)
    {
        $this->tabela = $tabela;
    }

    /**
     * @return bool
     */
    public function isQueryString()
    {
        return $this->queryString;
    }

    /**
     * @param bool $queryString
     */
    public function setQueryString($queryString)
    {
        $this->queryString = $queryString;
    }
}

