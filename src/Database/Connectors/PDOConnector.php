<?php
namespace Octopus\Database\Connectors;

class PDOConnector implements PDOConnectorInterface
{

    public function make($dsn, $username = null, $password = null, array $options = [])
    {


        return new \PDO(
            $dsn,
            $username,
            $password,
            $options
        );

    }
}

