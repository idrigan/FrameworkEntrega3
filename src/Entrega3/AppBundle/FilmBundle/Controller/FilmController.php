<?php

namespace Entrega3\AppBundle\FilmBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class FilmController extends Controller
{
    public function execute($id){

        $getFilmUseCase = $this->get('entrega3.film.usecase.getfilm');

        $film = $getFilmUseCase->execute($id);


        return $this->render("films/data-sheet.html.twig", ["film" => $film]);
    }


}