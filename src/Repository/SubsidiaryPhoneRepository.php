<?php

namespace App\Repository;

use App\Entity\SubsidiaryPhone;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method SubsidiaryPhone|null find($id, $lockMode = null, $lockVersion = null)
 * @method SubsidiaryPhone|null findOneBy(array $criteria, array $orderBy = null)
 * @method SubsidiaryPhone[]    findAll()
 * @method SubsidiaryPhone[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SubsidiaryPhoneRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SubsidiaryPhone::class);
    }

    // /**
    //  * @return SubsidiaryPhone[] Returns an array of SubsidiaryPhone objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SubsidiaryPhone
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
