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
   public function list($get, $post, $em, $path)
    {    
      $competences = $em->getRepository('Entity\Competence')->findAll();
      echo $this->twig->render('list.html',
        [
          "competences" => $competences,
          "quantity" => count($competences),
          "path" => $path
        ]
      );
    }
}