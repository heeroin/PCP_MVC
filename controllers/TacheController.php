<?php

use Entity\Tache;
namespace Controllers;

class TacheController extends Controller
{
       public function index($params)
    {
        echo "Hello ";
        echo $params;
    } 
    public function create($get,$post,$em)
    {
//        $tache = $em->getRepository("Entity\Tache")->findAll();
//        $tache->setDescription($post["Description"]);
//        $em->flush();
//        die("plop");
      
      // you can fetch the EntityManager via $this->getDoctrine()
        // or you can add an argument to the action: createProduct(EntityManagerInterface $entityManager)
      
        $tache = $em->getRepository("Entity\Tache")->findAll();
        $tache->setDescription($post['Description']);
        $tache->setDate($post["Date"]);

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $em->persist($tache);

        // actually executes the queries (i.e. the INSERT query)
        $em->flush();

        return new Response('Saved new product with id '.$tache->getId());
    }
   
    public function new($get, $post, $em)
    {
        $competences = $em->getRepository("Entity\Competence")->findAll();
         echo $this->twig->render('form.html', array(
            "competences"=>$competences
         ));
    }
   
  
    public function list($get, $post, $em)
     {
       $Tache = $em->getRepository("Entity\Tache")->findAll();

       echo $this->twig->render('list.html',array(       
           "tache" => $Tache,
        ));
     }
}