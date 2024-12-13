<?php

namespace App\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Event;

class EventRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Event::class);
    }

        /**
     * @return Event[]
     */
    public function findPublishedEvents(): array
    {
        return $this->createQueryBuilder('p')
            ->where('p.status = true')
            ->orderBy('p.id', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function findUpcomingEvents(): array
    {
        return $this->createQueryBuilder('e') ->where('e.status = :status') ->setParameter('status', 1) ->orderBy('e.start_date', 'ASC') ->getQuery() ->getResult();
    }
}
