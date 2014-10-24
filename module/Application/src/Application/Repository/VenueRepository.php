<?php

namespace Application\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * VenueRepository
 */
class VenueRepository extends EntityRepository
{
    public function findWith($id)
    {
        $qb = $this->getEntityManager()->createQueryBuilder();
        $qb->select('Venue', 'Sessions', 'Course')
           ->from('Application\Entity\Venues', 'Venue')
           ->where($qb->expr()->eq('Venue.id', intval($id)))
           ->leftJoin('Venue.sessions', 'Sessions')
           ->leftJoin('Sessions.course', 'Course');
        return $qb->getQuery()->getSingleResult();
    }
}
