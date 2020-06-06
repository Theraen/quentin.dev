<?php

namespace App\Repository;

use App\Entity\TechnologyPortfolio;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TechnologyPortfolio|null find($id, $lockMode = null, $lockVersion = null)
 * @method TechnologyPortfolio|null findOneBy(array $criteria, array $orderBy = null)
 * @method TechnologyPortfolio[]    findAll()
 * @method TechnologyPortfolio[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TechnologyPortfolioRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TechnologyPortfolio::class);
    }

    // /**
    //  * @return TechnologyPortfolio[] Returns an array of TechnologyPortfolio objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TechnologyPortfolio
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
