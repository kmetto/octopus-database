<?php
/**
 * @package     Octopus\Database
 * @subpackage
 *
 * @copyright   A copyright
 * @license     A "Slug" license name e.g. GPL2
 */

namespace Octopus\Database\Connectors;


class MysqlConnector extends PDOConnector implements ConnectorInterface
{
    public function connect(array $config)
    {
        $username = $config['username'];
        $password = $config['password'];

        $dsn = $this->getHostDsn($config);

        $pdo = $this->make($dsn, $username, $password);

        $this->setCharset($pdo, $config['charset']);

        return $pdo;
    }

    private function getHostDsn(array $config)
    {
        extract($config);

        if (isset($port)) {
            return "mysql:host={$host};port={$port};dbname={$dbname}";
        }
        return "mysql:host={$host};dbname={$dbname}";
    }

    private function setCharset($pdo, $charset = 'utf8'){
        $stm = $pdo->prepare("SET NAMES :charset");
        $stm->bindParam(":charset", $charset);
        $stm->execute();
    }
}
