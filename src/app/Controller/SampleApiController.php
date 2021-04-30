<?php
declare(strict_types = 1);

namespace App\Controller;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\Model\Sample\Sample as SampleModel;
use App\Model\Sample\Dbo\Sample as SampleDbo;
use App\Model\Sample\Service;

final class SampleApiController extends ApiBaseController
{
    public function showThatWorks(Request $request, Response $response, array $args): Response
    {
        return $response->withJson([
                "message" => "Sample message is working " . time(),
            ], 200);
    }

    public function create(Request $request, Response $response, array $args): Response
    {
        $description = $this->getFromBody($request, "description");

        if (!$description) {
            return $response->withJson([
                    "message" => "missing fields to create"
                ], 400);
        }

        $model = (new Service\Save(
            new SampleDbo($this->getContainer()->db)
        ))->withModel(
            new SampleModel($description)
        );

        return $response->withJson([
                "message" => "Created",
                "response" => $model->getFields(),
            ], 200);
    }

    public function fetch(Request $request, Response $response, array $args): Response
    {
        $id = (int) $this->getFromArgs($args, "id") ?? 0;

        $model = (new Service\GetModel(
            new SampleDbo($this->getContainer()->db)
        ))->byId($id);

        if (!$model) {
            return $response->withJson([
                    "message" => "model not found"
                ], 400);
        }

        return $response->withJson([
                "message" => "",
                "response" => $model->getFields(),
            ], 200);
    }

    public function list(Request $request, Response $response, array $args): Response
    {
        $models = array_map(
            fn($model) => $model->getFields(),
            (new Service\Select(
                new SampleDbo($this->getContainer()->db)
            ))->all()
        );

        return $response->withJson([
                "message" => "",
                "response" => $models,
            ], 200);
    }

    public function delete(Request $request, Response $response, array $args): Response
    {
        $id = (int) $this->getFromArgs($args, "id") ?? 0;

        $isDeleted = (new Service\Delete(
            new SampleDbo($this->getContainer()->db)
        ))->byId($id);

        if (!$isDeleted) {
            return $response->withJson([
                    "message" => "failed to delete"
                ], 400);
        }

        return $response->withJson([
                "message" => "Successfully deleted",
            ], 200);
    }
}
