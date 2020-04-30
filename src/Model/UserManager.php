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
        return $this->pdo->query('SELECT * FROM user ORDER BY user_score DESC')->fetchAll();
    }

    public function insertScore(string $username, int $score)
    {
        $request = $this->pdo->prepare("INSERT INTO user (user_name, user_score) VALUES (:username, :score)");
        $request->bindValue('username', $username, \PDO::PARAM_STR);
        $request->bindValue('score', $score, \PDO::PARAM_STR);
        $request->execute();
        $lastId = $this->pdo->lastInsertId();
        return $lastId;
    }
}
