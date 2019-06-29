<?php

namespace App\Controller;

use App\Entity\Movie;
use App\Entity\Person;
use App\Repository\MovieRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Validator\Constraints\DateTime;
use App\Repository\CastingRepository;
use App\Repository\PersonRepository;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="main")
     */
    public function show(MovieRepository $MovieRepository)
    {
        $tmp = $MovieRepository->findAll();

        return $this->render('main/index.html.twig', [
            'movies' => $tmp
        ]);
    }
    /**
     * @Route("/add", name="main_add")
     */
    public function add(EntityManagerInterface $em){


        for ($i=0; $i < 10; $i++) {
            $movie = new Movie();
            $movie->setTitle('Movie'. $i);
            $movie->setCreatedAt(new \DateTime());
            $movie->setUpdatedAt(new \DateTime());

            $person = new Person();
            $person->setName('Acteur', $i);
            $person->setCreatedAt(new \DateTime());
            $person->setUpdatedAt(new \DateTime());
            $em->persist($movie);
            $em->persist($person);

        }

        $em->flush();


        return $this->redirectToRoute("main");
    }
    /**
     * @Route("/show/{id}", name="one_movie")
     */
    public function show_one($id, MovieRepository $movieRepository)
    {
        $movie = $movieRepository->find($id);

        return $this->render("main/show_one.html.twig", [
            'movie' => $movie
        ]);
    }


    /**
     * @Route("/cast", name="cast")
     */
    public function cast(CastingRepository $castingRepository)
    {
        $castingRepository->add("titre", ["name", "ggg", "dddd"]);

        return $this->redirectToRoute("main");
    }

}
