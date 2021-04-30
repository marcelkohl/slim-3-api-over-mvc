<?php
declare(strict_types = 1);

namespace App\Controller;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Container\ContainerInterface;

class ApiBaseController extends BaseController
{
    public function getFromQuery(Request $request, string $attributeName)
    {
        $attributes = $request->getQueryParams();

        return array_key_exists($attributeName, $attributes) ? $attributes[$attributeName] : null;
    }

    public function getFromBody(Request $request, string $attributeName)
    {
        $attributes = $request->getParsedBody() ?? [];

        return array_key_exists($attributeName, $attributes) ? $attributes[$attributeName] : null;
    }

    public function getFromArgs(?array $args, string $attributeName)
    {
        return array_key_exists($attributeName, $args) ? $args[$attributeName] : null;
    }
}
