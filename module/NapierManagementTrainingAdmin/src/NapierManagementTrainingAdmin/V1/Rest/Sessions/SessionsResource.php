<?php
namespace NapierManagementTrainingAdmin\V1\Rest\Sessions;

use ZF\ApiProblem\ApiProblem;
use ZF\Rest\AbstractResourceListener;
use ZF\ContentNegotiation\ViewModel;
use Application\Entity\Sessions;
use DateTime;

class SessionsResource extends AbstractResourceListener
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
        $session = new Sessions();
        $session->setVenue($this->em->getRepository('Application\Entity\Venues')->find($data->venue));
        $session->setDateStart(new DateTime($data->dateStart));
        $session->setDateEnd(new DateTime($data->dateEnd));
        $session->setCourse($this->em->getRepository('Application\Entity\Courses')->find($data->idCourse));
        $this->em->persist($session);
        $this->em->flush();
        return $session;
    }

    /**
     * Delete a resource
     *
     * @param  mixed $id
     * @return ApiProblem|mixed
     */
    public function delete($id)
    {
        return new ApiProblem(405, 'The DELETE method has not been defined for individual resources');
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
        return new ApiProblem(405, 'The GET method has not been defined for individual resources');
    }

    /**
     * Fetch all or a subset of resources
     *
     * @param  array $params
     * @return ApiProblem|mixed
     */
    public function fetchAll($params = array())
    {
        return new ApiProblem(405, 'The GET method has not been defined for collections');
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
        $session = $this->repository->find($id);
        $properties = array_keys(get_object_vars($data));
        foreach ($properties as $property) {
            $setterName = 'set'.ucfirst($property);
            if (method_exists($session, $setterName)) {
                $session->$setterName($data->$property);
            }
        }
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
