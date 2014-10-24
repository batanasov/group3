<?php
namespace NapierManagementTraining\V1\Rest\Venues;

class VenuesResourceFactory
{
    public function __invoke($services)
    {
        $em = $services->get('Doctrine\ORM\EntityManager');
        $repository = $em->getRepository('Application\Entity\Venues');
        return new VenuesResource($repository);
    }
}
