<?php

namespace Entrega3\Component\Application\Film\UseCase;

use Entrega3\AppBundle\FilmBundle\Repository\FilmRepositoryImpl;

class ListFilmUseCase
{
    private $filmRepository;

    public function __construct(FilmRepositoryImpl $filmRepository)
    {
        $this->filmRepository = $filmRepository;
    }

    public function execute(){

        return $this->filmRepository->getAll();
    }
}