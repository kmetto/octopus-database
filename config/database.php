<?php
/**
 * Created by PhpStorm.
 * User: Mettochka
 * Date: 15.11.2016
 * Time: 16:04
 */

return [
    'connections' => [
        'mysql' => [
            "host" => "127.0.0.1",
            "dbname" => "lara",
            "username" => "root",
            "password" => "",
            "port" => "3306",
            "charset" => "utf8",
            "options" => [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]
        ]
    ]
];