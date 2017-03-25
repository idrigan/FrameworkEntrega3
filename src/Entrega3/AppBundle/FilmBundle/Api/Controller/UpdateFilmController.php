<?php

namespace Entrega3\AppBundle\FilmBundle\Api\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UpdateFilmController extends Controller
{
    public function execute(Request $request,$id){

        $json = json_decode($request->getContent(), true);

        $filmId = $id;

        $name = $json['name'];

        $description = $json['description'];

        $actorId = $json['actorId'];

        $em = $this->getDoctrine()->getManager();

        $updateFilmUseCase = $this->get('entrega3.film.usecase.updatefilm');

        $updateFilmUseCase->execute($filmId,$name,$description,$actorId);

        $em->flush();

        return new Response(json_encode("ok"), 201);
    }
}