<?php

namespace Entrega3\Component\Application\Actor\UseCase;


use Entrega3\AppBundle\ActorBundle\Repository\ActorRepositoryImpl;

class DeleteActorUseCase
{
    private $actorRepository;

    public function __construct(ActorRepositoryImpl $actorRepository)
    {
        $this->actorRepository = $actorRepository;
    }

    public function execute($actorId){

        $actor = $this->actorRepository->getById($actorId);

        return $this->actorRepository->delete($actor);
    }
}