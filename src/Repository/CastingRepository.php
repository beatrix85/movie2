<?php

namespace App\Repository;

use App\Entity\Casting;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
use App\Repository\MovieRepository;
use App\Entity\Movie;
use App\Entity\Person;

/**
 * @method Casting|null find($id, $lockMode = null, $lockVersion = null)
 * @method Casting|null findOneBy(array $criteria, array $orderBy = null)
 * @method Casting[]    findAll()
 * @method Casting[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CastingRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Casting::class);
    }

    // /**
    //  * @return Casting[] Returns an array of Casting objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Casting
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function add($title, $names) {
        $entityManager = $this->getEntityManager();
        $MovieRepository = $entityManager->getRepository(Movie::class);
        $PersonRepository = $entityManager->getRepository(Person::class);

        $movie = $MovieRepository->add($title);

        foreach ($names as $name) {
            $tmp =  $PersonRepository->add($name);
            $casting = new Casting();
            $casting->setPerson($tmp);
            $casting->setMovie($movie);
            $entityManager->persist($casting);
        }
        $entityManager->flush();
    }
}
