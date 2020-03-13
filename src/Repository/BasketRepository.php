<?php

namespace App\Repository;

use App\Entity\Basket;
use App\Entity\ProductSearch;
use App\Entity\Users;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\Query;
use Doctrine\ORM\QueryBuilder;

/**
 * @method Basket|null find($id, $lockMode = null, $lockVersion = null)
 * @method Basket|null findOneBy(array $criteria, array $orderBy = null)
 * @method Basket[]    findAll()
 * @method Basket[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BasketRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Basket::class);
    }

    /**
     * @return Query
     */

    public function findAllVisible(): Query
    {
        $query = $this->findVisibleQuery();
        return $query->getQuery();
    }

    private function findVisibleQuery(Users $users): QueryBuilder
    {
        return $this->createQueryBuilder('b')
            ->join('b.idProduct', 'o')
            ->addSelect('o')
            ->where('b.user = :user_id')
            ->setParameter('user_id', $users)
            ->setParameter('' );
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
