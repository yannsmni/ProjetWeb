<?php

namespace App\Repository;

use Doctrine\ORM\Query;
use Doctrine\ORM\QueryBuilder;
use App\Entity\Evenement;
use App\Entity\EvenementFiltre;
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

    public function findVisibleEvents(): QueryBuilder
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.Visible = true')
            ->orderBy('e.Date', 'DESC')
        ;
    }

    /**
     * @return Query
     */
    public function findAllBySearch(EvenementFiltre $search): Query
    {
        $query = $this->findVisibleEvents();

        if ($search->getPrixMin()) {
            $query = $query
                ->andWhere('e.Prix >= :prixMin')
                ->setParameter('prixMin', $search->getPrixMin())
            ;
        }

        if ($search->getPrixMax()) {
            $query = $query
                ->andWhere('e.Prix <= :prixMax')
                ->setParameter('prixMax', $search->getPrixMax())
            ;
        }

        if ($search->getStatut()) {
            $query = $query
                ->andWhere('e.Statut = :statut')
                ->setParameter('statut', $search->getStatut())
            ;
        }

        return $query->getQuery();
        ;
    }

    /**
    * @return Evenement[] Returns an array of Evenement objects
    */
    public function findMonthlyEvents($formattedDate)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.Visible = true')
            ->andWhere('e.Date LIKE :val')
            ->setParameter('val', $formattedDate.'%')
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
            ->andWhere('e.Visible = true')
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
            ->andWhere('e.Visible = true')
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
            ->andWhere('e.Visible = true')
            ->andWhere('e.Date < :val')
            ->setParameter('val', $date)
            ->orderBy('e.Date', 'DESC')
            ->setMaxResults(3)
            ->getQuery()
            ->getResult()
        ;
    }

    public function findBySearch($search) {
        return $this->createQueryBuilder('a')
            ->andWhere('a.Nom LIKE :val')
            ->setParameter('val', $search)
            ->getQuery()
            ->getResult();
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
