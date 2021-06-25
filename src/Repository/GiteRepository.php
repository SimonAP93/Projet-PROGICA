<?php

namespace App\Repository;

use App\Entity\Gite;
use App\Entity\Search;
use Doctrine\ORM\Query;
use App\Form\SearchType;
use Doctrine\ORM\Query\Expr\Join;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @method Gite|null find($id, $lockMode = null, $lockVersion = null)
 * @method Gite|null findOneBy(array $criteria, array $orderBy = null)
 * @method Gite[]    findAll()
 * @method Gite[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GiteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Gite::class);
    }

    /**
    * @return Gite[] Returns an array of Gite objects
    */
    
    public function findLatestGite()
    {
        return $this->createQueryBuilder('g')
            ->orderBy('g.createdAt', 'DESC')
            ->setMaxResults(8)
            ->getQuery()
            ->getResult()
        ;
    }
    
    public function findAdmin()
    {
        return $this->createQueryBuilder('g')
            ->orderBy('g.createdAt', 'DESC')
            ->getQuery()
            ->getResult()
        ;
    }



    /**
    * @return Query Returns an array of Gite objects
    */
    
 
    
    public function findAllSearch(Search $search): Query
    {
        $query = $this->createQueryBuilder('g');

        if($search->getminSurface()){
            $query = $query
                            ->andWhere('g.surface > :minSurface')
                            ->setParameter('minSurface', $search->getminSurface());
        }
        if($search->getMinBedrooms()){
            $query = $query
                            ->andWhere('g.rooms > :minBedrooms')
                            ->setParameter('minBedrooms', $search->getMinBedrooms());
        }
        if($search->getPostalCode()){
            $query = $query
                            ->andWhere('g.postalCode = :postalCode')
                            ->setParameter('postalCode', $search->getPostalCode());
        }
        if($search->getAnimals()){
            $query = $query
                            ->andWhere('g.animals = :animals')
                            ->setParameter('animals', $search->getAnimals());

        }
        
        if($search->getEquipements()){
            $k=0;
         foreach($search->getEquipements() as  $equipement){
             $k++;
            $query = $query
                            ->andWhere(" :equipement$k MEMBER OF g.equipements ")
                            ->setParameter("equipement$k", $equipement);
         }

        }
        return 
        $query
              ->orderBy('g.createdAt', 'DESC')
              ->getQuery();
              
    }

    /*
    public function findOneBySomeField($value): ?Gite
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
