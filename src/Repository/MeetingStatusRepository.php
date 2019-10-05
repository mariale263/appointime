<?php

namespace App\Repository;

use App\Entity\MeetingStatus;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method MeetingStatus|null find($id, $lockMode = null, $lockVersion = null)
 * @method MeetingStatus|null findOneBy(array $criteria, array $orderBy = null)
 * @method MeetingStatus[]    findAll()
 * @method MeetingStatus[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MeetingStatusRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MeetingStatus::class);
    }

    // /**
    //  * @return MeetingStatus[] Returns an array of MeetingStatus objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?MeetingStatus
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
