<?php
/**
 * @copyright Aliakbar Soleimani 2020
 * Database Connection Provider
 */

use Illuminate\Database\Capsule\Manager;

$connection = new Manager;
$connection->addConnection(config("database"));
$connection->setAsGlobal();
$connection->bootEloquent();

if (env("DEBUG", false))
    Manager::enableQueryLog();
