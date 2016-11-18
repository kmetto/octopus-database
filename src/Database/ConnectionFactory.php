<?php
/**
 * @package     Octopus\Database
 * @subpackage
 *
 * @copyright   A copyright
 * @license     A "Slug" license name e.g. GPL2
 */

namespace Octopus\Database;


class ConnectionFactory
{
    private $resolver;

    public function __construct(ConnectionDriverResolver $resolver)
    {
        $this->resolver = $resolver;
    }

    public function make(array $config){

    }
}