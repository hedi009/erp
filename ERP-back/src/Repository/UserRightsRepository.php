<?php

namespace App\Repository;

use App\Entity\UserRights;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * @extends ServiceEntityRepository<UserRights>
 *
 * @method UserRights|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserRights|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserRights[]    findAll()
 * @method UserRights[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserRightsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UserRights::class);
    }

    public function add(UserRights $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(UserRights $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }
    public function addUserRight($user, $rights): UserRights
    {
        $entityManager = $this->getEntityManager();

        $userRight = new UserRights();
        $userRight->setUser($user);
        $userRight->setRights($rights);

        $entityManager->persist($userRight);
        $entityManager->flush();

        return $userRight;
    }


    public function findRightsByUserId(string $userId)
    {
        return $this->createQueryBuilder('ur')
            ->leftJoin('ur.user', 'u')
            ->leftJoin('ur.rights', 'r')
            ->andWhere('u.id = :userId')
            ->setParameter('userId', $userId)
            ->getQuery()
            ->getResult();
    }

    public function getUserRightByUserId(string $userId, UserRightsRepository $userRightsRepository): array
    {
       return $userRightsRepository->findBy(['user' => $userId]);
    }

//    /**
//     * @return UserRights[] Returns an array of UserRights objects
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

//    public function findOneBySomeField($value): ?UserRights
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
