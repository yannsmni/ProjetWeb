<?php

namespace App\Repository;

use App\Entity\Produit;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Produit|null find($id, $lockMode = null, $lockVersion = null)
 * @method Produit|null findOneBy(array $criteria, array $orderBy = null)
 * @method Produit[]    findAll()
 * @method Produit[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProduitRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Produit::class);
    }

    public function findClothes() {
        return $this->createQueryBuilder('a')
            ->andWhere('a.categorie_id = 1')
            ->orderBy('a.prix', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function findITProducts() {
        return $this->createQueryBuilder('a')
            ->andWhere('a.categorie_id = 3')
            ->orderBy('a.prix', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function findGoodies() {
        return $this->createQueryBuilder('a')
            ->andWhere('a.categorie_id = 2')
            ->orderBy('a.prix', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function findReductions() {
        return $this->createQueryBuilder('a')
            ->andWhere('a.categorie_id = 4')
            ->orderBy('a.prix', 'ASC')
            ->getQuery()
            ->getResult();
    }
    // /**
    //  * @return Produit[] Returns an array of Produit objects
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
    public function findOneBySomeField($value): ?Produit
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
