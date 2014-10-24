<?php
namespace NapierManagementTraining\V1\Rest\News;

class NewsResourceFactory
{
    public function __invoke($services)
    {
        $em = $services->get('Doctrine\ORM\EntityManager');
        $repository = $em->getRepository('Application\Entity\News');
        return new NewsResource($repository);
    }
}
