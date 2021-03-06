<?php
namespace NapierManagementTrainingAdmin\V1\Rest\Courses;

use ZF\ApiProblem\ApiProblem;
use ZF\Rest\AbstractResourceListener;
use ZF\ContentNegotiation\ViewModel;
use Application\Entity\Courses;

class CoursesResource extends AbstractResourceListener
{
    private $em;
    private $repository;
    
    public function __construct($em, $repository)
    {
        $this->em = $em;
        $this->repository = $repository;
    }
    
    /**
     * Create a resource
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function create($data)
    {
        $course = new Courses();
        $course->setTitle($data->title);
        $course->setPrice($data->price);
        if (isset($data->description)) {
            $course->setDescription($data->description);
        } else {
            $course->setDescription('No description added yet...');
        }
        $this->em->persist($course);
        $this->em->flush();
        return $course;
    }

    /**
     * Delete a resource
     *
     * @param  mixed $id
     * @return ApiProblem|mixed
     */
    public function delete($id)
    {
        $this->em->remove($this->repository->find($id));
        $this->em->flush();
        return true;
    }

    /**
     * Delete a collection, or members of a collection
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function deleteList($data)
    {
        return new ApiProblem(405, 'The DELETE method has not been defined for collections');
    }

    /**
     * Fetch a resource
     *
     * @param  mixed $id
     * @return ApiProblem|mixed
     */
    public function fetch($id)
    {
        return $this->repository->find($id);
    }

    /**
     * Fetch all or a subset of resources
     *
     * @param  array $params
     * @return ApiProblem|mixed
     */
    public function fetchAll($params = array())
    {
        if(isset($params->venue)) {
            $courses = $this->repository->findAll();
            return array_values(array_filter(array_map(
                function ($course) use ($params) {
                    foreach ($course->getSessions() as $session) {
                        if($session->getVenue()->getId() == $params->venue) {
                            return $course;
                        }
                    }
                },
                $courses
            )));
        }
        return $this->repository->findAll();
    }

    /**
     * Patch (partial in-place update) a resource
     *
     * @param  mixed $id
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function patch($id, $data)
    {
        /** @var $course \Application\Entity\Courses */
        $course = $this->repository->find($id);
        $properties = array_keys(get_object_vars($data));
        foreach ($properties as $property) {
            $setterName = 'set'.ucfirst($property);
            if (method_exists($course, $setterName)) {
                $course->$setterName($data->$property);
            }
        }
        $course->setLimit(15);
        $this->em->flush();
        return new ViewModel();
    }

    /**
     * Replace a collection or members of a collection
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function replaceList($data)
    {
        return new ApiProblem(405, 'The PUT method has not been defined for collections');
    }

    /**
     * Update a resource
     *
     * @param  mixed $id
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function update($id, $data)
    {
        return new ApiProblem(405, 'The PUT method has not been defined for individual resources');
    }
}
