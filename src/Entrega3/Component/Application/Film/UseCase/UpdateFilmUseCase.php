<?php

namespace Entrega3\Component\Application\Film\UseCase;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;

use Entrega3\AppBundle\ActorBundle\Repository\ActorRepositoryImpl;
use Entrega3\AppBundle\FilmBundle\Repository\FilmRepositoryImpl;


class UpdateFilmUseCase
{
    private $filmRepository;
    private $actorRepository;
    private $cache;

    public function __construct( FilmRepositoryImpl $filmRepository,ActorRepositoryImpl $actorRepository)
    {
        $this->actorRepository = $actorRepository;
        $this->filmRepository = $filmRepository;
        $this->cache = new FilesystemAdapter();
    }

    public function execute($idFilm,$name,$description,$actorId){
        $cacheFilm = $this->cache->getItem($idFilm);

        $actor = $this->actorRepository->getById($actorId);

        $film = $this->filmRepository->getById($idFilm);

        $film = $this->filmRepository->update($film,$name,$description,$actor);
        if ($cacheFilm->isHit()){
            $cacheFilm->set($film);
            $this->cache->save($cacheFilm);
        }

        return $film;



    }
}