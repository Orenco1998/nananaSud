<?php

namespace App\Repository;

use App\Entity\ParagrapheEntreprise;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method ParagrapheEntreprise|null find($id, $lockMode = null, $lockVersion = null)
 * @method ParagrapheEntreprise|null findOneBy(array $criteria, array $orderBy = null)
 * @method ParagrapheEntreprise[]    findAll()
 * @method ParagrapheEntreprise[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ParagrapheEntrepriseRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ParagrapheEntreprise::class);
    }

    // /**
    //  * @return ParagrapheEntreprise[] Returns an array of ParagrapheEntreprise objects
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
    public function findOneBySomeField($value): ?ParagrapheEntreprise
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
