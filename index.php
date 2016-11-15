<?php

require_once "vendor/autoload.php";
$config = require_once "config.php";

$res = new \Octopus\Database\ConnectionDriverResolver();

$res->register("mysql", function(){
    return new \Octopus\Database\Connectors\MysqlConnector();
});

var_dump($res->resolve('mysql'));