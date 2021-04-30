<?php
declare(strict_types = 1);

namespace App\Model\Sample\Dbo;

use App\Model\Sample\SampleInterface as SampleModelInterface;

interface SampleInterface
{
    public function __construct($connection);
    /**
     * @param  array $fields an associative array key=>value
     * @return int|null      the created model id or null if failed
     */
    public function save(array $fields): ?int;
    public function deleteById($id): bool;
    /**
     * @return array an associative array key=>value returned by the database
     */
    public function getById(int $id): array;
    /**
     * @return array array of values returned by the database
     */
    public function getAll(): array;
}
