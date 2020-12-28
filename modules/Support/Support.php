<?php

namespace Module\Support;

/*
 * Include Classes
 */
require __DIR__ . "/vendor/autoload.php";

/**
 * Class Support
 * @package Module\Support
 */
final class Support
{

    public function __construct()
    {
    }

    public function onActivate()
    {
        $this->tables();
    }

    public function tables()
    {
        migrate("departments", dirname(__FILE__));
        migrate("tickets", dirname(__FILE__));
        migrate("ticket_messages", dirname(__FILE__));
    }
}