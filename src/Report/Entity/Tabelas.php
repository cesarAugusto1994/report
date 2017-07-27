<?php

namespace Report\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tabelas
 *
 * @ORM\Table(name="tabelas", schema="relatorio")
 * @ORM\Entity(repositoryClass="Report\Repository\TabelasRepository")
 */
class Tabelas
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
     * @ORM\Column(name="nome", type="string", length=255, nullable=false)
     */
    private $nome;

    /**
     * @var boolean
     *
     * @ORM\Column(name="ativo", type="boolean", nullable=false)
     */
    private $ativo = '1';

    /**
     * @var string
     *
     * @ORM\Column(name="banco", type="string", length=60, nullable=true)
     */
    private $schema;

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
     * @return bool
     */
    public function isAtivo()
    {
        return $this->ativo;
    }

    /**
     * @return string
     */
    public function getSchema()
    {
        return $this->schema;
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
     * @return mixed|string
     */
    public function getNomeFormatado()
    {
        return ucwords(str_replace('_', ' ', $this->nome));
    }

    public function getLinkNome()
    {
        return "<a href='/tabela/".$this->nome."'>{$this->getNomeFormatado()}</a>";
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'nome' => $this->getLinkNome(),
            'banco' => $this->schema,
        ];
    }

}

