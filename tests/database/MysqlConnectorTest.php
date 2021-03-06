<?php

use PHPUnit\Framework\TestCase;


/**
 * Created by PhpStorm.
 * User: konstantinmetto
 * Date: 15.11.16
 * Time: 10:18
 */
class MysqlConnectorTest extends PDOExt
{
    private $config;

    protected function setUp()
    {
        parent::setUp();

        $this->config = [
            "host" => $GLOBALS['MYSQL_HOST'],
            "dbname" => $GLOBALS['MYSQL_DB_NAME'],
            "username" => $GLOBALS['MYSQL_USER'],
            "password" => $GLOBALS['MYSQL_PASS'],
            "port" => $GLOBALS['MYSQL_PORT'],
            "charset" => $GLOBALS['MYSQL_CHARSET']
        ];
    }

    public function testConnector()
    {
        $this->assertInstanceOf(\PDO::class, (new \Octopus\Database\Connectors\MysqlConnector())->connect($this->config));
    }
}