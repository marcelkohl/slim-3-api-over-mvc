<?php
declare(strict_types = 1);

namespace App\Model\Sample;

class Sample implements SampleInterface
{
    public function __construct(
        private ?string $description = null,
        private ?int $id = null,
    ) {}

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @return array an associative array key=>value of the instance fields
     */
    public function getFields(): array
    {
        return [
            "id" => $this->getId(),
            "description" => $this->getDescription(),
        ];
    }
}
