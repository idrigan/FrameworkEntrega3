<?php

namespace Entrega3\Component\Application\Film\UseCase;

use Entrega3\AppBundle\ActorBundle\Repository\ActorRepositoryImpl;
use Entrega3\AppBundle\FilmBundle\Repository\FilmRepositoryImpl;
use Entrega3\Component\Domain\Entity\Film;

class NewFilmUseCase
{
    private $filmRepository;
    private $actorRepository;

    public function __construct( FilmRepositoryImpl $filmRepository,ActorRepositoryImpl $actorRepository)
    {
        $this->actorRepository = $actorRepository;
        $this->filmRepository = $filmRepository;
    }

    public function execute($name,$description,$actorId){

        $actor = $this->actorRepository->getById($actorId);

        $film = new Film($name,$description,$actor);

        return $this->filmRepository->create($film);
    }
}