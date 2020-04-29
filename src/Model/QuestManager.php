<?php

namespace App\Model;

class QuestManager extends AbstractManager
{
    const TABLE = "quest";

    public function __construct()
    {
        parent::__construct(self::TABLE);
    }
}
