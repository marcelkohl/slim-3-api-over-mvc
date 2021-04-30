<?php
declare(strict_types = 1);

namespace App\Model\Sample\Service;

use App\Model\Sample\SampleInterface as SampleModelInterface;
use App\Model\Sample\Sample as SampleModel;
use App\Model\Sample\Dbo\SampleInterface as SampleDboInterface;

class GetModel
{
    public function __construct(
        private SampleDboInterface $dbo,
    ) {}

    public function byId(int $id): ?SampleModelInterface
    {
        $fields = $this->dbo->getById($id);

        if (empty($fields)) {
            return null;
        }

        return new SampleModel(
            id: (int) $fields["id"],
            description: $fields["description"],
        );
    }
}
