<?php

namespace App\Repository;

use App\Entity\ConvivesMaximum;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ConvivesMaximum>
 *
 * @method ConvivesMaximum|null find($id, $lockMode = null, $lockVersion = null)
 * @method ConvivesMaximum|null findOneBy(array $criteria, array $orderBy = null)
 * @method ConvivesMaximum[]    findAll()
 * @method ConvivesMaximum[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ConvivesMaximumRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ConvivesMaximum::class);
    }

    public function save(ConvivesMaximum $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(ConvivesMaximum $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return ConvivesMaximum[] Returns an array of ConvivesMaximum objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ConvivesMaximum
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
