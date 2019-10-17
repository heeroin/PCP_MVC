<?php

namespace Models;

class Tache extends \Spot\Entity
{
    protected static $table = 'tache_MVC';

    public static function fields()
    {
      return [
        'id'        => ['type' => 'integer', 'primary' => true, 'autoincrement' => true],
        'Date'      => ['type' => 'date', 'required' => true],
        'Description'     => ['type' => 'string', 'required' => true],
      ];
    }
}