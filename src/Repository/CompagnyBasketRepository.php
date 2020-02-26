<?php

namespace App\Repository;

use App\Entity\CompagnyBasket;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method CompagnyBasket|null find($id, $lockMode = null, $lockVersion = null)
 * @method CompagnyBasket|null findOneBy(array $criteria, array $orderBy = null)
 * @method CompagnyBasket[]    findAll()
 * @method CompagnyBasket[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CompagnyBasketRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CompagnyBasket::class);
    }

    // /**
    //  * @return CompagnyBasket[] Returns an array of CompagnyBasket objects
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
    public function findOneBySomeField($value): ?CompagnyBasket
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
