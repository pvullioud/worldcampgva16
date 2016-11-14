<?php
namespace Wpgva;

if (!defined('ABSPATH'))
{
    exit; // Exit if accessed directly
}

class Routes
{
    public function register_routes()
    {
        new ExceptionHandler();

        $session = new Controller\Sessions();
        $session->register_routes();
    }
}