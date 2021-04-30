<?php
/** @var \Slim\App $app */
$app->get('/', 'App\Controller\IndexController:index');

$app->group('/v1', function () {
    $this->group('/sample', function () {
        $this->get('[/]', 'App\Controller\SampleApiController:showThatWorks');
        $this->post('[/]', 'App\Controller\SampleApiController:create');
        $this->get('/{id:[0-9]+}[/]', 'App\Controller\SampleApiController:fetch');
        $this->get('/list[/]', 'App\Controller\SampleApiController:list');
        $this->delete('/{id:[0-9]+}[/]', 'App\Controller\SampleApiController:delete');
        // $this->patch('/{id:[0-9]+}[/]', 'App\Controller\SampleApiController:update');
    });

    // $this->group('/other', function () {
    //     $this->get('/list[/]', 'App\Controller\GiftController:getGiftList');
    // });
});
