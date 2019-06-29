<?php

namespace App\Controller;

use App\Repository\PersonRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PersonController extends AbstractController
{
    /**
     * @Route("/actor", name="actor")
     */
    
    public function index(PersonRepository $PersonRepository)
    {   
        $tmp = $PersonRepository->findAll();

        return $this->render('Person/index.html.twig', [
            'persons' => $tmp
        ]);
    }

    /**
     * @Route("/add_actor", name="add_actor")
     */
    public function add_actor(Request $Request, PersonRepository $personRepository)
    {
        $personRepository->add($Request->get('name'));
        
        return $this->redirectToRoute("actor");
    }
}
