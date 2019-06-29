<?php

namespace App\Controller;

use App\Entity\Movie;
use App\Entity\Person;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\PersonRepository;
use App\Repository\MovieRepository;

class MovieController extends AbstractController
{
    /**
     * @Route("/movie", name="movie")
     */
    public function index()
    {
        return $this->render('movie/index.html.twig', [
            'controller_name' => 'MovieController',
        ]);
    }

    /**
     * @Route("/add_movie", name="add_movie")
     */
    public function add_movie(Request $Request, MovieRepository $movieRepository)
    {
        

        $movieRepository->add($Request->get('title'));

        return $this->redirectToRoute("main");
    }
    



}
