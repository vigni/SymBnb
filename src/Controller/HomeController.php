<?php

namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class HomeController extends AbstractController {

    /**
     * @Route("/hello/{prenom}/age{age}", name="hello")
     * @Route("/hello/", name="hello_base")
     * @Route("/hello/{prenom}", name="hello_prenom")
     */
    public function hello($prenom = "anonyme", $age = ""){
        return $this->render("hello.html.twig", [
            'prenom' => $prenom,
            'age' => $age
        ]);
    }
    
    /**
     * @Route("/", name="homepage")
     */
    public function home(){
        return $this->render('home.html.twig', [ 
          'title' => 'ouioui',
          'age' => 31 
        ]);
    }
}

?>