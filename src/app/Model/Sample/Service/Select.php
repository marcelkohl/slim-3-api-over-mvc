<?php
declare(strict_types = 1);

namespace App\Model\Sample\Service;

use App\Model\Sample\Sample as SampleModel;
use App\Model\Sample\Dbo\SampleInterface as SampleDboInterface;

class Select
{
    public function __construct(
        private SampleDboInterface $dbo,
    ) {}

    /**
     * @return SampleModel[]
     */
    public function all(): array
    {
        $records = $this->dbo->getAll();
        $models = [];

        foreach ($this->dbo->getAll() as $record) {
            $models[] = new SampleModel(
                id: (int) $record["id"],
                description: $record["description"],
            );
        }

        return $models;
    }
}
