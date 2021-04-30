<?php
declare(strict_types = 1);

namespace App\Model\Sample\Dbo;

class Sample implements SampleInterface
{
    public function __construct(
        private $connection
    ) {}

    /**
     * @param  array $fields an associative array key=>value
     * @return int|null      the created model id or null if failed
     */
    public function save(array $fields): ?int
    {
        $id = $fields['id'];
        $description = $fields['description'];

        if ($id !== null) {
            $sql = "UPDATE sample SET description = :description WHERE id = :id";
        } else {
            $sql = "INSERT INTO sample (description) VALUES (:description)";
        }

        $statement = $this->connection->prepare($sql);

        if ($id !== null) {
            $statement->bindValue(':id', $id, \PDO::PARAM_INT);
        }

        $statement->bindValue(':description', $description, \PDO::PARAM_STR);

        $executionStatus = $statement->execute();

        if ($executionStatus === false) {
            return null;
        }

        return (int) $this->connection->lastInsertId();
    }

    public function deleteById($id): bool
    {
        $sql = "UPDATE sample SET deleted = 1 WHERE id = :id";

        $statement = $this->connection->prepare($sql);
        $statement->bindValue(':id', $id, \PDO::PARAM_INT);

        $executionStatus = $statement->execute();

        return $executionStatus === false ? false : true;
    }

    /**
    * @return array an associative array key=>value returned by the database
    */
    public function getById(int $id): array
    {
        $sql = "SELECT * FROM sample WHERE id = :id AND deleted = 0 LIMIT 1";

        $statement = $this->connection->prepare($sql);
        $statement->bindParam(':id', $id, \PDO::PARAM_INT);
        $statement->execute();

        $result = $statement->fetch();

        return $result === false ? [] : $result;
    }

    /**
    * @return array array of values returned by the database
    */
    public function getAll(): array
    {
        $sql = "SELECT * FROM sample WHERE deleted = 0";

        $statement = $this->connection->prepare($sql);
        $statement->execute();

        return $statement->fetchAll();
    }
}
