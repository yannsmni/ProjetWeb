<?php

namespace App\Repository;

use App\Entity\Produit;
use App\Entity\ProduitFiltre;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\Query;

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

    /**
     * @return Query
     */

    public function findVisibleProducts(ProduitFiltre $search) : Query
    {
        $query = $this->findAll();

        if ($search->getMaxPrice()) {
            $query->andWhere('a.Prix <= :maxprice');
            $query->setParameter('maxprice', $search->getMaxPrice());
        }

        if ($search->getMinPrice()) {
            $query->andWhere('a.Prix >= :minprice');
            $query->setParameter('minprice', $search->getMinPrice());
        }

        return $query->getQuery();
    }


    public function findAll() {
        return $this->createQueryBuilder('a')
            ->orderBy('a.Prix', 'ASC');
    }

    public function findClothes(ProduitFiltre $search) {

        $query = $this->createQueryBuilder('a')
            ->andWhere('a.Categorie = 1')
            ->orderBy('a.Prix', 'ASC');

        if ($search->getMaxPrice()) {
            $query->andWhere('a.Prix <= :maxprice');
            $query->setParameter('maxprice', $search->getMaxPrice());
        }

        if ($search->getMinPrice()) {
            $query->andWhere('a.Prix >= :minprice');
            $query->setParameter('minprice', $search->getMinPrice());
        }

        return $query->getQuery();
    }

    public function findBestProducts() {

        return $this->createQueryBuilder('a')
            ->orderBy('a.Quantite_vendu', 'DESC')
            ->setMaxResults(3)
            ->getQuery()
            ->getResult();
    }

    public function findITProducts(ProduitFiltre $search) {

        $query = $this->createQueryBuilder('a')
            ->andWhere('a.Categorie = 3')
            ->orderBy('a.Prix', 'ASC');

        if ($search->getMaxPrice()) {
            $query->andWhere('a.Prix <= :maxprice');
            $query->setParameter('maxprice', $search->getMaxPrice());
        }

        if ($search->getMinPrice()) {
            $query->andWhere('a.Prix >= :minprice');
            $query->setParameter('minprice', $search->getMinPrice());
        }

        return $query->getQuery();

    }

    public function findGoodies(ProduitFiltre $search) {
        $query = $this->createQueryBuilder('a')
            ->andWhere('a.Categorie = 2')
            ->orderBy('a.Prix', 'ASC');

        if ($search->getMaxPrice()) {
            $query->andWhere('a.Prix <= :maxprice');
            $query->setParameter('maxprice', $search->getMaxPrice());
        }

        if ($search->getMinPrice()) {
            $query->andWhere('a.Prix >= :minprice');
            $query->setParameter('minprice', $search->getMinPrice());
        }

        return $query->getQuery();

    }

    public function findReductions(ProduitFiltre $search) {
        $query = $this->createQueryBuilder('a')
            ->andWhere('a.Categorie = 4')
            ->orderBy('a.Prix', 'ASC');

        if ($search->getMaxPrice()) {
            $query->andWhere('a.Prix <= :maxprice');
            $query->setParameter('maxprice', $search->getMaxPrice());
        }

        if ($search->getMinPrice()) {
            $query->andWhere('a.Prix >= :minprice');
            $query->setParameter('minprice', $search->getMinPrice());
        }

        return $query->getQuery();

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
