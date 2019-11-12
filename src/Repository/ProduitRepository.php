<?php

namespace App\Repository;

use App\Entity\Produit;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Produit|null find($id, $lockMode = null, $lockVersion = null)
 * @method Produit|null findOneBy(array $criteria, array $orderBy = null)
 * @method Produit[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProduitRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Produit::class);
    }

    public function findAll() {
        return $this->createQueryBuilder('a')
            ->orderBy('a.Prix', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /*public function findByID($id) {
        return $this->createQueryBuilder('a')
            ->andWhere('a.id = :ID')
            ->setParameter('ID', $id)
            ->getQuery()
            ->getResult();
    }*/

    public function findClothes() {
        return $this->createQueryBuilder('a')
            ->andWhere('a.Categorie = 1')
            ->orderBy('a.Prix', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function findBestProducts() {
        return $this->createQueryBuilder('a')
            ->orderBy('a.Quantite_vendu', 'DESC')
            ->setMaxResults(3)
            ->getQuery()
            ->getResult();
    }

    public function findITProducts() {
        return $this->createQueryBuilder('a')
            ->andWhere('a.Categorie = 3')
            ->orderBy('a.Prix', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function findGoodies() {
        return $this->createQueryBuilder('a')
            ->andWhere('a.Categorie = 2')
            ->orderBy('a.Prix', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function findReductions() {
        return $this->createQueryBuilder('a')
            ->andWhere('a.Categorie = 4')
            ->orderBy('a.Prix', 'ASC')
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
