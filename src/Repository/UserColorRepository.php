<?php

namespace App\Repository;

use App\Entity\UserColor;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<UserColor>
 *
 * @method UserColor|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserColor|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserColor[]    findAll()
 * @method UserColor[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserColorRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UserColor::class);
    }

//    /**
//     * @return UserColor[] Returns an array of UserColor objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('u.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?UserColor
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
