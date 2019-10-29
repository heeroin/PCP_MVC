<?php

namespace Controllers;
require_once "bootstrap.php";
use Models\Users;

class CompetenceController extends Controller
{
   public function index($params)
    {
        echo "Hello ";
        echo $params;
    }
   public function list($get,$post,$em)
    {
      $competences = $em->getRepository('Entity\Competence')->findAll();
      echo $this->twig->render('list.html',
        [
          "competences" => $competences,
          "quantity" => count($competences)
        ]
      );
    }
  
  public function create($params)
    {
      $CompetenceMapper = spot()->mapper('Models\Competence');
      $CompetenceMapper->migrate();
    }
}