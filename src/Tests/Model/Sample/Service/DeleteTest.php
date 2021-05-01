<?php
declare(strict_types = 1);

namespace Tests\Controller;

use Tests\Slim3TestCase;
use App\Model\Sample\Service\Delete;
use App\Model\Sample\Dbo\SampleInterface as SampleDboInterface;

class DeleteTest extends Slim3TestCase
{
    public function testDeleteById()
    {
        $dbo = $this->createMock(SampleDboInterface::class);
        $dbo->method("deleteById")->willReturn(true);

        $isDeleted = (new Delete($dbo))->byId(123);

        $this->assertTrue($isDeleted);
    }
}
