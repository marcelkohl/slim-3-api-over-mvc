<?php
declare(strict_types = 1);

namespace Tests\Model\Sample\Service;

use Tests\Slim3TestCase;
use App\Model\Sample\Service\Select;
use App\Model\Sample\Dbo\SampleInterface as SampleDboInterface;

class SelectTest extends Slim3TestCase
{
    public function testSelectAll()
    {
        $dbo = $this->createMock(SampleDboInterface::class);
        $dbo->method("getAll")->willReturn([
            [
                "id" => rand(),
                "description" => "dolor"
            ]
        ]);

        $models = (new Select($dbo))->all();

        $this->assertNotEmpty($models);
    }
}
