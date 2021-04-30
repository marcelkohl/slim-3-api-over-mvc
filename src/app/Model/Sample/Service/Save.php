<?php
declare(strict_types = 1);

namespace App\Model\Sample\Service;

use App\Model\Exception\MissingModelValueException;
use App\Model\Sample\SampleInterface as SampleModelInterface;
use App\Model\Sample\Dbo\SampleInterface as SampleDboInterface;

class Save
{
    public function __construct(
        private SampleDboInterface $dbo,
    ) {}

    public function withModel(SampleModelInterface $model)
    {
        if ($model->getDescription() === null) {
            throw new MissingModelValueException();
        }

        $savedId = $this->dbo->save($model->getFields());

        if ($model->getId() === null) {
            $model->setId($savedId);
        }

        return $model;
    }
}
