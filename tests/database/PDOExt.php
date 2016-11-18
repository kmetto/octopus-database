<?php

/**
 * Created by PhpStorm.
 * User: konstantinmetto
 * Date: 18.11.16
 * Time: 14:47
 */
class PDOExt extends \PHPUnit\Framework\TestCase
{
    protected function setUp()
    {
        if(!extension_loaded("pdo")){
            $this->markTestSkipped("PDO extension not available");
        }
    }
}