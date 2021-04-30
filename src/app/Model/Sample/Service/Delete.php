<?php
declare(strict_types = 1);

namespace App\Model\Sample\Service;

use App\Model\Sample\Dbo\SampleInterface as SampleDboInterface;

class Delete
{
    public function __construct(
        private SampleDboInterface $dbo,
    ) {}

    public function byId(int $id): bool
    {
        return $this->dbo->deleteById($id);
    }
}
