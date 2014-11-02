<?php
namespace NapierManagementTrainingAdmin\V1\Rest\News;

use ZF\ApiProblem\ApiProblem;
use ZF\Rest\AbstractResourceListener;
use Application\Repository\NewsRepository;
use ZF\ContentNegotiation\ViewModel;
use DateTime;
class NewsResource extends AbstractResourceListener
{
    /**
     *
     * @var NewsRepository 
     */
    private $repository;
    private $em;
    /**
     * 
     * @param NewsRepository $repository
     */
    public function __construct($em, NewsRepository $repository)
    {
        $this->repository = $repository;
        $this->em = $em;
    }
    
    /**
     * Create a resource
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function create($data)
    {
        return new ApiProblem(405, 'The POST method has not been defined');
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
        /** @var $news \Application\Entity\News */
        $news = $this->repository->find($id);
        $properties = array_keys(get_object_vars($data));
        foreach ($properties as $property) {
            $setterName = 'set'.ucfirst($property);
            if (method_exists($news, $setterName)) {
                $news->$setterName($data->$property);
            }
        }
        $news->setDate(new DateTime());
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
