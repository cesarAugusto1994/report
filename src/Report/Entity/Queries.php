<?php

namespace Report\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Queries
 *
 * @ORM\Table(name="queries", uniqueConstraints={@ORM\UniqueConstraint(name="queries_nome_uindex", columns={"nome"})}, indexes={@ORM\Index(name="queries_tabelas_id_fk", columns={"tabela"})})
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
     * @var Tabelas
     *
     * @ORM\ManyToOne(targetEntity="Tabelas")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tabela", referencedColumnName="id")
     * })
     */
    private $tabela;

    /**
     * @var Relatorios
     *
     * @ORM\ManyToOne(targetEntity="Relatorios")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="relatorio_id", referencedColumnName="id")
     * })
     */
    private $relatorio;

    /**
     * @ORM\Column(name="tipo", type="text")
     * @var string
     */
    private $tipo;

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
     * @return Tabelas
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
     * @param Tabelas $tabela
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

    /**
     * @return Relatorios
     */
    public function getRelatorio()
    {
        return $this->relatorio;
    }

    /**
     * @param Relatorios $relatorio
     */
    public function setRelatorio($relatorio)
    {
        $this->relatorio = $relatorio;
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

    public function getLinkNome()
    {
        return "<a href='/query/edit/".$this->id."'>{$this->nome}</a>";
    }

    public function getLinkExecute()
    {
        return "<a class=\"btn btn-success btn-xs execute\" href=\"/execute/{$this->id}\">RUN ></a>   ";
    }

    public function getLinkDelete()
    {
        return "<a class='remove-query btn btn-danger btn-xs' href='/query/{$this->id}/remove' data-id='{$this->id}'>Remover</a>";
    }

    public function getBtnsOpcoes()
    {
        return $this->getLinkExecute() . $this->getLinkDelete();
    }

    public function toArray()
    {
        return [
            'nome' => $this->getLinkNome(),
            'execute' => $this->getBtnsOpcoes(),
        ];
    }
}

