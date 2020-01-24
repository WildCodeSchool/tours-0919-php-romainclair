<?php

namespace App\Repository;

use App\Entity\MeetingDate;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method MeetingDate|null find($id, $lockMode = null, $lockVersion = null)
 * @method MeetingDate|null findOneBy(array $criteria, array $orderBy = null)
 * @method MeetingDate[]    findAll()
 * @method MeetingDate[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MeetingDateRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MeetingDate::class);
    }
}
