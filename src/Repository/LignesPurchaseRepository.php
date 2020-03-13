<?php

namespace App\Repository;

use App\Entity\LignesPurchase;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method LignesPurchase|null find($id, $lockMode = null, $lockVersion = null)
 * @method LignesPurchase|null findOneBy(array $criteria, array $orderBy = null)
 * @method LignesPurchase[]    findAll()
 * @method LignesPurchase[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LignesPurchaseRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LignesPurchase::class);
    }

    // /**
    //  * @return Basket[] Returns an array of Basket objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Basket
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
