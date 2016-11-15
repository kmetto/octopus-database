<?php
/**
 * @package     Octopus\Database\Connectors
 * @subpackage
 *
 * @copyright   A copyright
 * @license     A "Slug" license name e.g. GPL2
 */

namespace Octopus\Database;


class ConnectionDriverResolver
{
    private $resolved = [];

    private $resolvers = [];

    public function register($driver, \Closure $closure)
    {
        $this->resolvers[$driver] = $closure;
    }

    public function resolve($driver)
    {
        if (isset($this->resolved[$driver])) {
            return $this->resolved[$driver];
        }

        if (isset($this->resolvers[$driver])) {
            return $this->resolved[$driver] = call_user_func($this->resolvers[$driver]);
        }

        throw new \InvalidArgumentException("Driver {$driver} not exists");
    }
}