<?php

namespace App\Repository;

use App\Entity\UsersCompagnies;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method UsersCompagnies|null find($id, $lockMode = null, $lockVersion = null)
 * @method UsersCompagnies|null findOneBy(array $criteria, array $orderBy = null)
 * @method UsersCompagnies[]    findAll()
 * @method UsersCompagnies[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UsersCompagniesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UsersCompagnies::class);
    }

    // /**
    //  * @return UsersCompagnies[] Returns an array of UsersCompagnies objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?UsersCompagnies
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
