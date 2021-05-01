<?php
declare(strict_types = 1);

namespace Tests\Controller;

use Tests\Slim3TestCase;
use App\Model\Exception\MissingModelValueException;
use App\Model\Sample\Service\Save;
use App\Model\Sample\Dbo\SampleInterface as SampleDboInterface;
use App\Model\Sample\Sample as SampleModel;

class SaveTest extends Slim3TestCase
{
    public function testSaveNewWithFields()
    {
        $id = 123;
        $dbo = $this->createMock(SampleDboInterface::class);
        $dbo->method("save")->willReturn($id);

        $model = new SampleModel("duis quae quid ipsum fugiat");
        $savedModel = (new Save($dbo))->withModel($model);

        $this->assertEquals($id, $savedModel->getId());
    }

    public function testSaveExistentWithFields()
    {
        $id = 321;
        $dbo = $this->createMock(SampleDboInterface::class);
        $dbo->method("save")->willReturn($id);

        $model = new SampleModel(
            id: $id,
            description: "duis quae quid ipsum fugiat",
        );
        (new Save($dbo))->withModel($model);

        $this->assertEquals($id, $model->getId());
    }

    public function testSaveMissingFields()
    {
        $this->expectException(MissingModelValueException::class);

        $dbo = $this->createMock(SampleDboInterface::class);
        $model = new SampleModel();
        (new Save($dbo))->withModel($model);
    }
}
