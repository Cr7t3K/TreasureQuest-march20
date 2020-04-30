<?php

namespace App\Model;

class QuestManager extends AbstractManager
{
    const TABLE = "quest";

    public function __construct()
    {
        parent::__construct(self::TABLE);
    }

    public function clueLocation(int $id)
    {
        $statement = $this->pdo->prepare("
            SELECT quest_validation FROM quest
            WHERE quest_id = :id;
            ");
        $statement->bindValue('id', $id, \PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetch();
    }
}
