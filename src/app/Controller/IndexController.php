<?php
declare(strict_types = 1);

namespace App\Controller;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

final class IndexController extends BaseController
{
    public function index(Request $request, Response $response, array $args)
    {
        $this->getLogger()->info("Index action dispatched");
        $this->getView()->render($response, 'index.twig');

        return $response;
    }
}
