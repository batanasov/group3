<?php
namespace NapierManagementTraining\V1\Rest\Courses;

class CoursesResourceFactory
{
    public function __invoke($services)
    {
        $em = $services->get('Doctrine\ORM\EntityManager');
        $repository = $em->getRepository('Application\Entity\Courses');
        return new CoursesResource($repository);
    }
}
