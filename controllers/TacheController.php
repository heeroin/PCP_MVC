<?php

namespace Controllers;
use Entity\Tache;
use Entity\Competence;
//require_once "bootstrap.php";
require_once "Entity/Tache.php";


class TacheController extends Controller
{
       public function index($params)
    {
        echo "Hello ";
        echo $params;
    }
  
    public function create($get, $post, $em, $path)
    {
        $competence = new Competence;
        $tache = new Tache;       
        $tache->setDescription($post['Description']);
        $date = new \DateTime($post['Date']);
        $tache->setDate($date);                
        $competences=$post['competences'];
        $competenceTab=[];
      
        foreach ($competences as $competenceId) {
          $competence = $em->getRepository("Entity\Competence")->find($competenceId);
          if ($competence) {
            $competenceTab[]=$competence;
          }
        }
        $tache->addCompetences($competenceTab);         
       
        $em->persist($tache);
        $em->flush();
      
        echo $this->twig->render('created.html', array(
            "tache"=>$tache
         ));
    }
   
    public function new($get, $post, $em, $path)
    {
        $competences = $em->getRepository("Entity\Competence")->findAll();
         echo $this->twig->render('form.html', array(
            "competences" => $competences,
            "path" => $path
         ));
    }
   
  
    public function list($get, $post, $em)
     {
       $Tache = $em->getRepository("Entity\Tache")->findAll();

       echo $this->twig->render('list.html',array(       
           "taches" => $Tache,
        ));
     }
}