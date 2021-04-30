<?php
declare(strict_types = 1);

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Psr\Container\ContainerInterface;

class BaseController
{
    public function __construct(
        private ContainerInterface $container
    ) {}

    public function getContainer(): ContainerInterface
    {
        return $this->container;
    }

    public function getView(): object
    {
        return $this->container->view;
    }

    public function getLogger(): LoggerInterface
    {
        return $this->container->logger;
    }
}
