<?php
declare(strict_types = 1);

namespace App\Model\Sample;

interface SampleInterface
{
    public function getId(): ?int;
    public function setId(int $id): void;
    public function getDescription(): ?string;
    /**
     * @return array an associative array key=>value of the instance fields
     */
    public function getFields(): array;
}
