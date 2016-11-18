<?php
/**
 * Created by PhpStorm.
 * User: konstantinmetto
 * Date: 18.11.16
 * Time: 12:21
 */

namespace Octopus\Database;


class DatabaseManager
{
    protected $factory;

    protected $connections;

    protected $config;

    public function __construct(ConnectionFactory $factory, array $config)
    {
        $this->factory = $factory;
        $this->config = $config;
    }

    public function makeConnection($name = null)
    {
        $this->getConnectionConfig($name);

    }

    protected function getConnectionConfig($name = null)
    {
        $name = isset($name)? $name : $this->getDefaultConnectionName();
    }

    protected function getDefaultConnectionName(){
        if(isset($this->config['default.connection']))
        return $this->config['default.connection'];
        throw new \InvalidArgumentException('Default connection not set');
    }

}