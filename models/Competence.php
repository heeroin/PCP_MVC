<?php

namespace Models;

class Competence extends \Spot\Entity
{
    protected static $table = 'competence_MVC';

    public static function fields()
    {
      return [
        'id'        => ['type' => 'integer', 'primary' => true, 'autoincrement' => true],
        'Code'      => ['type' => 'string', 'required' => true],
        'Lib'     => ['type' => 'string', 'required' => true],
      ];
    }
}