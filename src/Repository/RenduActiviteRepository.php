<?php

namespace App\Repository;

use App\Entity\RenduActivite;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<RenduActivite>
 */
class RenduActiviteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RenduActivite::class);
    }

    //    /**
    //     * @return RenduActivite[] Returns an array of RenduActivite objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('r')
    //            ->andWhere('r.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('r.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?RenduActivite
    //    {
    //        return $this->createQueryBuilder('r')
    //            ->andWhere('r.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
