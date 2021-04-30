<?php
declare(strict_types = 1);

use App\Model\Sample\Sample;

class SampleTest extends Slim3TestCase
{
    public function testGetFields()
    {
        $id = rand();
        $description = "summis export legam noster export " . rand();
        $sample = new Sample($description, $id);

        $fields = $sample->getFields();

        $this->assertEquals($id, $fields["id"]);
        $this->assertEquals($description, $fields["description"]);
    }
}
