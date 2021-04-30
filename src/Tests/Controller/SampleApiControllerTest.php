<?php
declare(strict_types = 1);

use App\Controller\SampleApiController;

class SampleApiControllerTest extends Slim3TestCase
{
    public function testGetRequestReturnsSuccess()
    {
        $controller = new SampleApiController($this->app->getContainer());

        $environment = \Slim\Http\Environment::mock([
            'REQUEST_METHOD' => 'GET',
            'REQUEST_URI' => '/v1/sample',
            'QUERY_STRING'=>'']
        );
        $request = \Slim\Http\Request::createFromEnvironment($environment);
        $response = new \Slim\Http\Response();

        $response = $controller->showThatWorks($request, $response, []);

        $this->assertEquals($response->getStatusCode(), 200);
        $this->assertNotEmpty($response->getBody());
    }

    public function testCreateSuccess()
    {
        $controller = new SampleApiController($this->app->getContainer());

        $environment = \Slim\Http\Environment::mock([
            'REQUEST_METHOD' => 'POST',
            'REQUEST_URI' => '/v1/sample',
        ]);
        $request = \Slim\Http\Request::createFromEnvironment($environment);
        $response = new \Slim\Http\Response();

        $response = $controller->create(
            $request->withParsedBody([
                "description" => "illum minim sunt ipsum quis enim summis aute",
            ]),
            $response,
            []
        );

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
    }
}
