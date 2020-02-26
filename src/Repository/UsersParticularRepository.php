<?php

namespace App\Repository;

use App\Entity\UsersParticular;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method UsersParticular|null find($id, $lockMode = null, $lockVersion = null)
 * @method UsersParticular|null findOneBy(array $criteria, array $orderBy = null)
 * @method UsersParticular[]    findAll()
 * @method UsersParticular[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UsersParticularRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UsersParticular::class);
    }

    // /**
    //  * @return UsersParticular[] Returns an array of UsersParticular objects
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
    public function findOneBySomeField($value): ?UsersParticular
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
