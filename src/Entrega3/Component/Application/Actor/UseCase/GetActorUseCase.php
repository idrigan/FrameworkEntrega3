<?php

namespace Entrega3\Component\Application\Actor\UseCase;

use Entrega3\Component\Domain\Entity\Actor;
use Entrega3\AppBundle\ActorBundle\Repository\ActorRepositoryImpl;

class GetActorUseCase
{
    private $actorRepository;

    public function __construct(ActorRepositoryImpl $actorRepository)
    {
        $this->actorRepository = $actorRepository;
    }

    public function execute($id){

        return  $this->actorRepository->getById($id);
    }
}