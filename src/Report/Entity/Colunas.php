<?php

namespace Report\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Colunas
 *
 * @ORM\Table(name="colunas", indexes={@ORM\Index(name="colunas_tabelas_id_fk", columns={"tabela_id"})}, schema="relatorio")
 * @ORM\Entity(repositoryClass="Report\Repository\ColunasRepository")
 */
class Colunas
{
    const TIPO_MESCLADO = 'MESCLADO';
    const TIPO_DATA = 'Data';
    const TIPO_DATA_HORA = 'Data e Hora';

    const DATA_TYPE_INT = 'int';

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
     * @var Tabelas
     *
     * @ORM\ManyToOne(targetEntity="Tabelas")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tabela_id", referencedColumnName="id")
     * })
     */
    private $tabela;

    /**
     * @var Tabelas
     *
     * @ORM\ManyToOne(targetEntity="Tabelas")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tabela_ref", referencedColumnName="id")
     * })
     */
    private $tabelaRef;

    /**
     * @ORM\Column(name="label", type="boolean")
     * @var boolean
     */
    private $label;

    /**
     * @ORM\Column(name="identificador", type="string")
     * @var string
     */
    private $identificador;

    /**
     * @var Formatos
     *
     * @ORM\ManyToOne(targetEntity="Formatos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="formato", referencedColumnName="id")
     * })
     */
    private $formato;

    /**
     * @ORM\Column(name="visualizar", type="boolean")
     * @var boolean
     */
    private $visualizar = 1;

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
     * @return Tabelas
     */
    public function getTabela()
    {
        return $this->tabela;
    }

    /**
     * @param string $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * @param string $tipo
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }

    /**
     * @param bool $chavePrimaria
     */
    public function setChavePrimaria($chavePrimaria)
    {
        $this->chavePrimaria = $chavePrimaria;
    }

    /**
     * @param Tabelas $tabela
     */
    public function setTabela($tabela)
    {
        $this->tabela = $tabela;
    }

    /**
     * @return Tabelas
     */
    public function getTabelaRef()
    {
        return $this->tabelaRef;
    }

    /**
     * @param Tabelas $tabelaRef
     */
    public function setTabelaRef($tabelaRef)
    {
        $this->tabelaRef = $tabelaRef;
    }

    /**
     * @return bool
     */
    public function isLabel()
    {
        return $this->label;
    }

    /**
     * @param bool $label
     */
    public function setLabel($label)
    {
        $this->label = $label;
    }

    /**
     * @param string $identificador
     */
    public function setIdentificador($identificador)
    {
        $this->identificador = $identificador;
    }

    /**
     * @return string
     */
    public function getIdentificador()
    {
        return $this->identificador;
    }

    /**
     * @return bool
     */
    public function isVisualizar()
    {
        return $this->visualizar;
    }

    /**
     * @return mixed
     */
    public function getFormato()
    {
        return $this->formato;
    }

    /**
     * @param mixed $formato
     */
    public function setFormato($formato)
    {
        $this->formato = $formato;
    }

    /**
     * @param bool $visualizar
     */
    public function setVisualizar($visualizar)
    {
        $this->visualizar = $visualizar;
    }

    /**
     * @return mixed|string
     */
    public function getNomeFormatado()
    {
        if ($this->identificador) {
            return $this->identificador;
        }

        return ucwords(str_replace('_', ' ', $this->nome));
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'id' => $this->id,
            'nome' => $this->nome,
            'tipo' => $this->tipo,
            'chavePrimaria' => $this->chavePrimaria,
            'formato' => $this->formato ? $this->formato->getNome() : null,
            'tabelaRef' => $this->tabelaRef ? $this->tabelaRef->getNome() : null,
            'tabela' => $this->tabela ? $this->tabela->getNome() : null,
        ];
    }

}

