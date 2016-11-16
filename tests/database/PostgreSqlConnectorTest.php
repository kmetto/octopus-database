<?php
use PHPUnit\Framework\TestCase;
/**
 * Created by PhpStorm.
 * User: Mettochka
 * Date: 15.11.2016
 * Time: 22:54
 */
class PostgresqlConnectorTest extends TestCase
{
    private $config;

    protected function setUp()
    {
        $this->config = [
            "host" => $GLOBALS['PGSQL_HOST'],
            "username" => $GLOBALS['PGSQL_USER'],
            "password" => $GLOBALS['PGSQL_PASS'],
            "dbname" => $GLOBALS['PGSQL_DB_NAME'],
            "port" => $GLOBALS['PGSQL_PORT']
        ];
    }

    public function testConnector()
    {
        try{
            (new \Octopus\Database\Connectors\PostgresqlConnector())->connect($this->config);
        } catch (Exception $e){
            $this->assertInstanceOf(\PDOException::class, $e);
        }
    }
}