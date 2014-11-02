<?php
namespace NapierManagementTraining\V1\Rest\Titles;

class TitlesResourceFactory
{
    public function __invoke($services)
    {
        $em = $services->get('Doctrine\ORM\EntityManager');
        $repository = $em->getRepository('Application\Entity\Titles');
        return new TitlesResource($repository);
    }
}
