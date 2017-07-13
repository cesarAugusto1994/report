<?php

namespace Report\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Colunas
 *
 * @ORM\Table(name="colunas", indexes={@ORM\Index(name="colunas_tabelas_id_fk", columns={"tabela_id"})}, schema="relatorio")
 * @ORM\Entity
 */
class Colunas
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
     * @ORM\Column(name="nome", type="string", length=150, nullable=false)
     */
    private $nome;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo", type="string", length=30, nullable=false)
     */
    private $tipo;

    /**
     * @var boolean
     *
     * @ORM\Column(name="chave_primaria", type="boolean", nullable=true)
     */
    private $chavePrimaria = '0';

    /**
     * @var \Tabelas
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
     * @return string
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * @return bool
     */
    public function isChavePrimaria()
    {
        return $this->chavePrimaria;
    }

    /**
     * @return \Tabelas
     */
    public function getTabela()
    {
        return $this->tabela;
    }

    /**
     * @return mixed|string
     */
    public function getNomeFormatado()
    {
        return ucwords(str_replace('_', ' ', $this->nome));
    }

}
