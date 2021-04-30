<?php
error_reporting(-1);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require_once 'vendor/autoload.php';

class Slim3TestCase extends PHPUnit\Framework\TestCase
{
    protected $app;

    public function setUp(): void
    {
        $settings = require 'Tests/settings.php';
        $app = new \Slim\App($settings);

        require 'app/dependencies.php';
        require 'app/middleware.php';
        require 'app/routes.php';

        $this->app = $app;

        $this->app->getContainer()->get("db")->beginTransaction();
    }

    public function tearDown(): void
    {
        $this->app->getContainer()->get("db")->rollBack();
    }
}
