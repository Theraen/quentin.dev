<?php

namespace App\Repository;

use App\Entity\DescExperience;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DescExperience|null find($id, $lockMode = null, $lockVersion = null)
 * @method DescExperience|null findOneBy(array $criteria, array $orderBy = null)
 * @method DescExperience[]    findAll()
 * @method DescExperience[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DescExperienceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DescExperience::class);
    }

    // /**
    //  * @return DescExperience[] Returns an array of DescExperience objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DescExperience
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
