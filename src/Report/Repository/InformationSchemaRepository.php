<?php
/**
 * Created by PhpStorm.
 * User: cesar
 * Date: 16/09/17
 * Time: 10:45
 */

namespace Report\Repository;


use Doctrine\DBAL\Connection;
use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;

class InformationSchemaRepository
{
    /**
     * @var Connection
     */
    private $connection;

    /**
     * InformationSchemaRepository constructor.
     * @param Connection $connection
     */
    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    /**
     * @param $table
     * @param $schema
     * @return bool
     */
    public function hasTableSchema($table, $schema)
    {
        $sql = "
          SELECT EXISTS(SELECT *
            FROM INFORMATION_SCHEMA.TABLES
            WHERE TABLE_SCHEMA = '{$schema}'
            AND  TABLE_NAME = '{$table}') as existe;
        ";

        return !empty($this->connection->fetchColumn($sql));
    }

    public function findColumnsTable($tableId, $tableName, $schema)
    {
        $sql = "
          SELECT
              {$tableId}                        tabela_id,
              COLUMN_NAME                     nome,
              DATA_TYPE                       tipo,
              IF(COLUMN_KEY = 'PRI', 1, 0) AS chave_primaria
            FROM
              information_schema.COLUMNS
            WHERE TABLE_SCHEMA = '{$schema}' AND TABLE_NAME = '{$tableName}';
        ";

        return $this->connection->fetchAll($sql);
    }
}