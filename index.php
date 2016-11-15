<?php

require_once "vendor/autoload.php";
$config = require_once "config.php";

use Octopus\Database\QueryBuilder;


$builder = new QueryBuilder((new \Octopus\Database\Connectors\MysqlConnector())->connect($config['database']));

print_r($builder->selectAll('todos'));