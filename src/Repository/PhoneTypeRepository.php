<?php

namespace App\Repository;

use App\Entity\PhoneType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method PhoneType|null find($id, $lockMode = null, $lockVersion = null)
 * @method PhoneType|null findOneBy(array $criteria, array $orderBy = null)
 * @method PhoneType[]    findAll()
 * @method PhoneType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PhoneTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PhoneType::class);
    }

    // /**
    //  * @return PhoneType[] Returns an array of PhoneType objects
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
    public function findOneBySomeField($value): ?PhoneType
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
