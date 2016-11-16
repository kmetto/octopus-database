<?php
/**
 * @package     Octopus\Database\Connectors
 * @subpackage
 *
 * @copyright   A copyright
 * @license     A "Slug" license name e.g. GPL2
 */

namespace Octopus\Database\Connectors;


class SqliteConnector extends PDOConnector implements ConnectorInterface
{
    public function connect(array $config)
    {
        $path = $config['path'];

        $dsn = $this->getDsn($config);

        $pdo = $this->make($dsn);

        return $pdo;

    }

    private function getDsn(array $config){

        extract($config);

        if($version==3){
            return "sqlite:{$path}";
        } elseif ($version==2){
            return "sqlite2:{$path}";
        }
    }
}