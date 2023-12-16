<?php

namespace App\Repository;

use App\Entity\UserFigure;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<UserFigure>
 *
 * @method UserFigure|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserFigure|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserFigure[]    findAll()
 * @method UserFigure[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserFigureRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UserFigure::class);
    }

//    /**
//     * @return UserFigure[] Returns an array of UserFigure objects
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

//    public function findOneBySomeField($value): ?UserFigure
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
