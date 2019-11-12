<?php

namespace App\Repository;

use App\Entity\UserSecurity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method UserSecurity|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserSecurity|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserSecurity[]    findAll()
 * @method UserSecurity[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserSecurityRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UserSecurity::class);
    }

    // /**
    //  * @return UserSecurity[] Returns an array of UserSecurity objects
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
    public function findOneBySomeField($value): ?UserSecurity
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
