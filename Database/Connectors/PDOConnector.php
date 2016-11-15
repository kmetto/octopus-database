<?php
namespace Octopus\Database\Connectors;

class PDOConnector implements PDOConnectorInterface
{

    public function make($dsn, $username = null, $password = null, array $options = [])
    {
        try {

            return new \PDO(
                $dsn,
                $username,
                $password,
                $options
            );
        } catch (\PDOException $e) {
            die($e->getMessage().' '.$dsn);
        }
    }
}

