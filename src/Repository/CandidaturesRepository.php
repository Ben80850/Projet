<?php

namespace App\Repository;

use App\Entity\Candidatures;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Candidatures|null find($id, $lockMode = null, $lockVersion = null)
 * @method Candidatures|null findOneBy(array $criteria, array $orderBy = null)
 * @method Candidatures[]    findAll()
 * @method Candidatures[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CandidaturesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Candidatures::class);
    }


}
