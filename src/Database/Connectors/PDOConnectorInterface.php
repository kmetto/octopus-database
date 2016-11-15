<?php
/**
 * @package     Octopus\Database
 * @subpackage
 *
 * @copyright   A copyright
 * @license     A "Slug" license name e.g. GPL2
 */

namespace Octopus\Database\Connectors;


interface PDOConnectorInterface
{
    public function make($dsn, $username, $password, array $options);
}