<?php

namespace App\Repository;

use App\Entity\Evenement;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @method Evenement|null find($id, $lockMode = null, $lockVersion = null)
 * @method Evenement|null findOneBy(array $criteria, array $orderBy = null)
 * @method Evenement[]    findAll()
 * @method Evenement[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EvenementRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Evenement::class);
    }

    /**
    * @return Evenement[] Returns an array of Evenement objects
    */
    public function findMonthlyEvents($formattedDate)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.Date LIKE :val')
            ->setParameter('val', $formattedDate)
            ->orderBy('e.Date', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }

    /**
    * @return Evenement[] Returns an array of Evenement objects
    */
    public function findUpcommingEvents($date)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.Date > :val')
            ->setParameter('val', $date)
            ->orderBy('e.Date', 'ASC')
            ->setMaxResults(5)
            ->getQuery()
            ->getResult()
        ;
    }

    /**
    * @return Evenement[] Returns an array of Evenement objects
    */
    public function findBestEvents()
    {
        return $this->createQueryBuilder('e')
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(5)
            ->getQuery()
            ->getResult()
        ;
    }

    /**
    * @return Evenement[] Returns an array of Evenement objects
    */
    public function findLatestEvents($date)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.Date < :val')
            ->setParameter('val', $date)
            ->orderBy('e.Date', 'DESC')
            ->setMaxResults(5)
            ->getQuery()
            ->getResult()
        ;
    }

    /*
    public function findOneBySomeField($value): ?Evenement
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
