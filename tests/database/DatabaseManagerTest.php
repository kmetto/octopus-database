<?php

/**
 * Created by PhpStorm.
 * User: konstantinmetto
 * Date: 18.11.16
 * Time: 13:07
 */
class Test extends PDOExt
{
    protected $defaultConnection;

    public function setUp()
    {
        $this->defaultConnection = $this->getConnection($this->config());
    }

    /**
     * @covers \Octopus\Database\DatabaseManager::__construct
     */
    public function testCreatingDatabaseManager()
    {
        $this->assertInstanceOf(\Octopus\Database\DatabaseManager::class, $this->defaultConnection);
    }

    /**
     * @covers \Octopus\Database\DatabaseManager::getDefaultConnectionName
     */
    public function testGetDefaultConnectionName()
    {
        $method = new ReflectionMethod(\Octopus\Database\DatabaseManager::class, "getDefaultConnectionName");

        $method->setAccessible(true);

        $this->assertEquals('mysql', $method->invoke($this->defaultConnection));
    }

    /**
     * @covers \Octopus\Database\DatabaseManager::getDefaultConnectionName
     */
    public function testGetDefaultConnectionNameIfIsNotSet()
    {
        $config = $this->config();

        unset($config['default.connection']);

        $connection = $this->getConnection($config);

        $method = new ReflectionMethod(\Octopus\Database\DatabaseManager::class, "getDefaultConnectionName");

        $method->setAccessible(true);

        try{
            $method->invoke($connection);
        } catch (Exception $e){
            $this->assertInstanceOf(\InvalidArgumentException::class, $e);
        }
    }

    protected function getConnection(array $config){
        $driverResolver = $this->getMockBuilder(\Octopus\Database\ConnectionDriverResolver::class)->getMock();
        $dbFactory = $this->getMockBuilder(\Octopus\Database\ConnectionFactory::class)->setConstructorArgs([$driverResolver])->getMock();
        return new \Octopus\Database\DatabaseManager($dbFactory, $config);
    }

    public function config()
    {
        return [


            'default.connection' => 'mysql',


            'connections' => [
                'mysql' => [
                    "host" => "127.0.0.1",
                    "dbname" => "lara",
                    "username" => "root",
                    "password" => "",
                    "port" => "3306",
                    "charset" => "utf8",
                    "options" => [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                    ]
                ],
                'postgresql' => [
                    "host" => "127.0.0.1",
                    "dbname" => "lara",
                    "username" => "root",
                    "password" => "",
                    "port" => "3306",
                    "charset" => "utf8",
                    "options" => [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                    ]
                ],
                'sqlite' => [
                    "path" => "/",
                    "version" => "3",
                    "dbname" => "lara",
                ]
            ]
        ];
    }
}
