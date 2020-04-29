<?php

namespace App\Model;

class UserManager extends AbstractManager
{
    const TABLE = "user";

    public function __construct()
    {
        parent::__construct(self::TABLE);
    }
}
