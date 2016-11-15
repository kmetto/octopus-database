<?php
/**
 * @package     Octopus\Database\Connectors
 * @subpackage
 *
 * @copyright   A copyright
 * @license     A "Slug" license name e.g. GPL2
 */

namespace Octopus\Database\Connectors;


interface ConnectorInterface
{
    public function connect(array $config);
}