<?php
namespace App\Repository;

use App\Entity\Categories;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class CategoriesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Categories::class);
    }

    public function findByName($name){
        // SELECT * FROM category WHERE name = $name;
        // $this->createQueryBuilder('c.name') // SELECT name FROM category
        return $this->createQueryBuilder('c') // SELECT * FROM category
            ->andWhere('c.name = :name_val') // WHERE url = :url_val
            ->setParameter('name_val', $name) // ['url_val' => $url]
            ->getQuery()
            ->getResult();
    }
    
}