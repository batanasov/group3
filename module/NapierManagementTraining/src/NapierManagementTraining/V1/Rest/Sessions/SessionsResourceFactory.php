<?php
namespace NapierManagementTraining\V1\Rest\Sessions;

class SessionsResourceFactory
{
    public function __invoke($services)
    {
        return new SessionsResource();
    }
}
