<?php
declare(strict_types = 1);

namespace Tests;

class Slim3TestCase extends \PHPUnit\Framework\TestCase
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
