<?php

namespace Entrega3\Component\Application\Film\UseCase;

use Entrega3\AppBundle\FilmBundle\Repository\FilmRepositoryImpl;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;

class GetFilmUseCase
{
    private $filmRepository;
    private $cache;

    public function __construct(FilmRepositoryImpl $filmRepository)
    {
        $this->filmRepository = $filmRepository;
        $this->cache = new FilesystemAdapter();
    }

    public function execute($filmId){
        $cacheFilm = $this->cache->getItem($filmId);
        if (!$cacheFilm->isHit()){
            $film = $this->filmRepository->getById($filmId);
            $cacheFilm->set($film);
            $this->cache->save($cacheFilm);
            return $film;
        }else{

            return $cacheFilm->get();
        }

    }
}