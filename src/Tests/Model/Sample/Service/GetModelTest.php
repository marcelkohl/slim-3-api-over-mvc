<?php
declare(strict_types = 1);

namespace Tests\Controller;

use Tests\Slim3TestCase;
use App\Model\Sample\Service\GetModel;
use App\Model\Sample\Dbo\SampleInterface as SampleDboInterface;

class GetModelTest extends Slim3TestCase
{
    public function testGetModelById()
    {
        $id = 123;
        $dbo = $this->createMock(SampleDboInterface::class);
        $dbo->method("getById")->willReturn([
            "id" => $id,
            "description" => "dolor quid esse magna illum",
        ]);

        $model = (new GetModel($dbo))->byId($id);

        $this->assertNotNull($model);
        $this->assertEquals($id, $model->getId());
    }
}
