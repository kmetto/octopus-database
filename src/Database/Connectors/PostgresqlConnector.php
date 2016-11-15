<?php
/**
 * Created by PhpStorm.
 * User: Mettochka
 * Date: 15.11.2016
 * Time: 22:42
 */

namespace Octopus\Database\Connectors;


class PostgresqlConnector extends PDOConnector implements ConnectorInterface
{
    public function connect(array $config)
    {
        $username = $config['username'];
        $password = $config['password'];

        $dsn = $this->getHostDsn($config);

        $pdo = $this->make($dsn, $username, $password);

        return $pdo;
    }

    public function getHostDsn(array $config)
    {
        extract($config);

        if (isset($port)){
            return "pgsql:host={$host};port={$port};dbname={$dbname}";
        }

        return "pgsql:host={$host};dbname={$dbname}";
    }
}