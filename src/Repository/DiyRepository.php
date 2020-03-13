<?php

namespace App\Repository;

use App\Entity\Diy;
use App\Entity\DiySearch;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\Query;
use Doctrine\ORM\QueryBuilder;

/**
 * @method Diy|null find($id, $lockMode = null, $lockVersion = null)
 * @method Diy|null findOneBy(array $criteria, array $orderBy = null)
 * @method Diy[]    findAll()
 * @method Diy[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DiyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Diy::class);
    }


    /**
     * @return Query
     */

    public function findAllVisible(DiySearch $search): Query
    {
        $query = $this->findVisibleQuery();
        if ($search->getTitle()) {
            $query = $query->andWhere('p.title LIKE :title');
            $query->setParameter('title', '%'.$search->getTitle().'%');
        }
        if ($search->getLink()) {
            $query = $query->andWhere('p.link LIKE :link');
            $query->setParameter('link', '%'.$search->getLink().'%');
        }
        return $query->getQuery();
    }

    private function findVisibleQuery(): QueryBuilder
    {
        return $this->createQueryBuilder('p');
    }



    // /**
    //  * @return Product[] Returns an array of Product objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Property
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
