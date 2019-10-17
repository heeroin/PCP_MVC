<?php

namespace Controllers;

use Models\Users;


class CompetenceController extends Controller
{
   public function index($params)
    {
        echo "Hello ";
        echo $params;
    }
   public function list()
    {
      $competenceMapper = spot()->mapper('Models\Competence');
      $competenceMapper->migrate();
      $competenceList = $competenceMapper->all();
      
      echo $this->twig->render('list.html',
        [
          "competenceList" => $competenceList,
          "quantity" => count($competenceList)
        ]
      );
    }
  
  public function create($params)
    {
      $CompetenceMapper = spot()->mapper('Models\Competence');
      $CompetenceMapper->migrate();
    }
}