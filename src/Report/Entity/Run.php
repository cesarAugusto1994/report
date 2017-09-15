<?php

namespace Report\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="run", schema="relatorio")
 * @ORM\Entity(repositoryClass="Report\Repository\RunRepository")
 */
class Run
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
     * @var Queries
     *
     * @ORM\ManyToOne(targetEntity="Queries")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="query_id", referencedColumnName="id")
     * })
     */
    private $query;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="run_at", type="datetime")
     */
    private $runAt;

    /**
     * @var string
     *
     * @ORM\Column(name="parameters", type="string")
     */
    private $parameters;

    /**
     * @var integer
     *
     * @ORM\Column(name="rows_returned", type="integer")
     */
    private $rowsReturned;

    /**
     * Run constructor.
     * @param Queries $query
     */
    public function __construct(Queries $query)
    {
        $this->query = $query;
        $this->runAt = new \DateTime('now');
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
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
     * @return \DateTime
     */
    public function getRunAt()
    {
        return $this->runAt;
    }

    /**
     * @param \DateTime $runAt
     */
    public function setRunAt($runAt)
    {
        $this->runAt = $runAt;
    }

    /**
     * @return string
     */
    public function getParameters()
    {
        return $this->parameters;
    }

    /**
     * @param string $parameters
     */
    public function setParameters($parameters)
    {
        $this->parameters = $parameters;
    }

    /**
     * @return int
     */
    public function getRowsReturned()
    {
        return $this->rowsReturned;
    }

    /**
     * @param int $rowsReturned
     */
    public function setRowsReturned($rowsReturned)
    {
        $this->rowsReturned = $rowsReturned;
    }
}

