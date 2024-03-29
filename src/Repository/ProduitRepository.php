<?php

namespace App\Repository;

use App\Entity\Produit;
use Doctrine\ORM\Query;
use App\Entity\ProduitFiltre;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

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

        if($search->getBestSales()) {
            $query->orderBy('a.quantite_vendu', 'DESC');
        }

        if($search->getAscPrice()) {
            $query->orderBy('a.Prix', 'ASC');
        }

        if($search->getDescPrice()) {
            $query->orderBy('a.Prix', 'DESC');
        }

        if ($search->getCategory()) {
            $query->andWhere('a.Categorie = :categorie');
            $query->setParameter('categorie', $search->getCategory());
        }

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

    public function findAllProducts() {
        return $this->createQueryBuilder('a')
            ->getQuery()
            ->getResult();
    }

    public function findAll() {
        return $this->createQueryBuilder('a');
    }

    public function findClothes(ProduitFiltre $search) {

        $query = $this->createQueryBuilder('a')
            ->andWhere('a.Categorie = 5');

        if($search->getAscPrice()) {
            $query->orderBy('a.Prix', 'ASC');
        }

        if($search->getDescPrice()) {
            $query->orderBy('a.Prix', 'DESC');
        }

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
            ->orderBy('a.quantite_vendu', 'DESC')
            ->setMaxResults(3)
            ->getQuery()
            ->getResult();
    }

    public function findITProducts(ProduitFiltre $search) {

        $query = $this->createQueryBuilder('a')
            ->andWhere('a.Categorie = 7');

        if ($search->getMaxPrice()) {
            $query->andWhere('a.Prix <= :maxprice');
            $query->setParameter('maxprice', $search->getMaxPrice());
        }

        if ($search->getMinPrice()) {
            $query->andWhere('a.Prix >= :minprice');
            $query->setParameter('minprice', $search->getMinPrice());
        }

        if($search->getAscPrice()) {
            $query->orderBy('a.Prix', 'ASC');
        }

        if($search->getDescPrice()) {
            $query->orderBy('a.Prix', 'DESC');
        }

        return $query->getQuery();

    }

    public function findGoodies(ProduitFiltre $search) {
        $query = $this->createQueryBuilder('a')
            ->andWhere('a.Categorie = 6');

        if ($search->getMaxPrice()) {
            $query->andWhere('a.Prix <= :maxprice');
            $query->setParameter('maxprice', $search->getMaxPrice());
        }

        if ($search->getMinPrice()) {
            $query->andWhere('a.Prix >= :minprice');
            $query->setParameter('minprice', $search->getMinPrice());
        }

        if($search->getAscPrice()) {
            $query->orderBy('a.Prix', 'ASC');
        }

        if($search->getDescPrice()) {
            $query->orderBy('a.Prix', 'DESC');
        }

        return $query->getQuery();

    }

    public function findReductions(ProduitFiltre $search) {
        $query = $this->createQueryBuilder('a')
            ->andWhere('a.Categorie = 8');

        if ($search->getMaxPrice()) {
            $query->andWhere('a.Prix <= :maxprice');
            $query->setParameter('maxprice', $search->getMaxPrice());
        }

        if ($search->getMinPrice()) {
            $query->andWhere('a.Prix >= :minprice');
            $query->setParameter('minprice', $search->getMinPrice());
        }

        if($search->getAscPrice()) {
            $query->orderBy('a.Prix', 'ASC');
        }

        if($search->getDescPrice()) {
            $query->orderBy('a.Prix', 'DESC');
        }

        return $query->getQuery();

    }

    public function findBySearch($recherche) {
        return $this->createQueryBuilder('a')
            ->andWhere('a.nom LIKE :val')
            ->setParameter('val', $recherche.'%')
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
