<?php
namespace NapierManagementTrainingAdmin\V1\Rest\Sessions;

class SessionsResourceFactory
{
    public function __invoke($services)
    {
        $em = $services->get('Doctrine\ORM\EntityManager');
        $repository = $em->getRepository('Application\Entity\Sessions');
        return new SessionsResource($em, $repository);
    }
}
