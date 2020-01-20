<?php

namespace App\Repository;

use App\Entity\Datetime;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Datetime|null find($id, $lockMode = null, $lockVersion = null)
 * @method Datetime|null findOneBy(array $criteria, array $orderBy = null)
 * @method Datetime[]    findAll()
 * @method Datetime[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DatetimeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Datetime::class);
    }

    // /**
    //  * @return Datetime[] Returns an array of Datetime objects
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
    public function findOneBySomeField($value): ?Datetime
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
