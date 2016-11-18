<?php

/**
 * @package     ${NAMESPACE}
 * @subpackage
 *
 * @copyright   A copyright
 * @license     A "Slug" license name e.g. GPL2
 */
class SqliteConnectorTest extends PDOExt
{
    protected $config;

    protected function setUp()
    {
        $this->config = [
            "path" => "./lara.db",
            "version" => "3"
        ];
    }

    public function testConnector()
    {
        $this->assertInstanceOf(\PDO::class, (new \Octopus\Database\Connectors\SqliteConnector())->connect($this->config));
    }

    protected function tearDown()
    {
        unlink($this->config['path']);
    }
}
