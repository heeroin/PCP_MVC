<?php

use Models\Users;

namespace Controllers;

class TacheController extends Controller
{
  
    public function create($params)
    {
      $TacheMapper = spot()->mapper('Models\Tache');
      $TacheMapper->migrate();
    }
}