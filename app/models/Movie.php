<?php

namespace App\Model;

class Movie
{
    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }
}