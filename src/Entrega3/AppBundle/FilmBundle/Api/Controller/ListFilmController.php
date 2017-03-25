<?php

namespace Entrega3\AppBundle\FilmBundle\Api\Controller;

use Entrega3\Component\Domain\Entity\Film;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class ListFilmController extends Controller
{
    public function execute(){

        $listFilmUseCase = $this->get('entrega3.film.usecase.listfilm');

        $films = $listFilmUseCase->execute();

        $filmsAsArray = array_map(function (Film $f) {
            return $this->filmToArray($f);
        }, $films);

        return new Response(json_encode($filmsAsArray), 201);
    }

    private function filmToArray(Film $film)
    {
        return [
            'id' => $film->getId(),
            'name' => $film->getName(),
            'description' => $film->getDescription(),
            'actor' => $film->getActor(),
        ];
    }
}