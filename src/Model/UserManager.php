<?php

namespace App\Model;

class UserManager extends AbstractManager
{
    const TABLE = "user";

    public function __construct()
    {
        parent::__construct(self::TABLE);
    }

    public function selectHighScores(): array
    {
        return $this->pdo->query('SELECT * FROM ' . self::TABLE . 'ORDER BY user_score DESC')->fetchAll();
    }
}
