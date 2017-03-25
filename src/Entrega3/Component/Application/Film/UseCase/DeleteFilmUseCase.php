<?php

namespace Entrega3\Component\Application\Film\UseCase;

use Entrega3\AppBundle\FilmBundle\Repository\FilmRepositoryImpl;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;

class DeleteFilmUseCase
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
        if ($cacheFilm->isHit()){
            $this->cache->deleteItem($filmId);
        }
        $film = $this->filmRepository->getById($filmId);

        return $this->filmRepository->delete($film);
    }
}