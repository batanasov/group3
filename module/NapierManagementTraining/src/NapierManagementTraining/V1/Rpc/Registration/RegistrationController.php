<?php
namespace NapierManagementTraining\V1\Rpc\Registration;

use Zend\Mvc\Controller\AbstractActionController;
use ZF\ContentNegotiation\ViewModel;
use Application\Entity\Users;

class RegistrationController extends AbstractActionController
{
    private $usersRepository;
    private $sessionsRepository;
    private $titlesRepository;
    private $em;
    
    public function __construct($em, $usersRepository, $sessionsRepository, $titlesRepository) {
        $this->usersRepository = $usersRepository;
        $this->sessionsRepository = $sessionsRepository;
        $this->titlesRepository = $titlesRepository;
        $this->em = $em;
    }
    
    public function registrationAction()
    {
        try {
            $formValues = $this->bodyParams();
            $session = $this->sessionsRepository->find($formValues['session']);
            $user = new Users();
            $user->setTitle($this->titlesRepository->find($formValues['title']))
                ->setFirstname($formValues['firstname'])
                ->setLastname($formValues['lastname'])
                ->setAddress($formValues['address'])
                ->setEmail($formValues['email'])
                ->setTel($formValues['telephone'])
                ->addSession($session);
            $this->em->persist($user);
            $this->em->flush();
            return new ViewModel(array('success' => "You have been registered for \"{$session->getCourse()->getTitle()}.\""));
        } catch(\Exception $error) {
            return new ViewModel(array('error' => "An error occured. Please try again."));
        }
    }
}
