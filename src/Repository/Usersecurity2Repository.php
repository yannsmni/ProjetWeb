<?php

namespace App\Repository;

use App\Entity\Usersecurity2;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Usersecurity2|null find($id, $lockMode = null, $lockVersion = null)
 * @method Usersecurity2|null findOneBy(array $criteria, array $orderBy = null)
 * @method Usersecurity2[]    findAll()
 * @method Usersecurity2[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class Usersecurity2Repository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Usersecurity2::class);
    }

    // /**
    //  * @return Usersecurity2[] Returns an array of Usersecurity2 objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Usersecurity2
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
