<?php


namespace Entrega3\Component\Application\Actor\UseCase;


use Entrega3\AppBundle\ActorBundle\Repository\ActorRepositoryImpl;

class ListActorUseCase
{

    private $actorRepository;

    public function __construct(ActorRepositoryImpl $actorRepository)
    {
        $this->actorRepository = $actorRepository;
    }

    public function execute(){

        return $this->actorRepository->getAll();
    }
}