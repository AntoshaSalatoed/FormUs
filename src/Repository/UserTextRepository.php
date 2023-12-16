<?php

namespace App\Repository;

use App\Entity\UserText;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<UserText>
 *
 * @method UserText|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserText|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserText[]    findAll()
 * @method UserText[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserTextRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UserText::class);
    }

//    /**
//     * @return UserText[] Returns an array of UserText objects
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

//    public function findOneBySomeField($value): ?UserText
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
