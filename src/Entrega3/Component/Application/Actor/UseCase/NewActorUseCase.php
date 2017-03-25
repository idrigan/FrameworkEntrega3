<?php

namespace Entrega3\Component\Application\Actor\UseCase;

use Entrega3\Component\Domain\Entity\Actor;
use Entrega3\AppBundle\ActorBundle\Repository\ActorRepositoryImpl;

class NewActorUseCase
{
    private $actorRepository;

    public function __construct(ActorRepositoryImpl $actorRepository)
    {
        $this->actorRepository = $actorRepository;
    }

    public function execute($name){

        $actor = new Actor($name);

        return $this->actorRepository->create($actor);
    }
}