<?php

use Models\Users;

namespace Controllers;

class TacheController extends Controller
{
       public function index($params)
    {
        echo "Hello ";
        echo $params;
    } 
    public function create($params)
    {
      $TacheMapper = spot()->mapper('Models\Tache');
      $TacheMapper->migrate();
    }
   public function list()
    {
      $TacheMapper = spot()->mapper('Models\Tache');
      $TacheMapper->migrate();
      $TacheList = $TacheMapper->all();
      
      echo $this->twig->render('list.html',
        [
          "tacheList" => $TacheList,
          "quantity" => count($TacheList)
        ]
      );
    }
}