<?php

namespace Entrega3\AppBundle\FilmBundle\Api\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CreateFilmController extends Controller
{
    public function execute(Request $request){

        $json = json_decode($request->getContent(), true);

        $name = $json['name'];

        $description = $json['description'];

        $actorId = $json['actorId'];

        $em = $this->getDoctrine()->getManager();

        $newFilmUseCase = $this->get('entrega3.film.usecase.newfilm');

        $newFilmUseCase->execute($name,$description,$actorId);

        $em->flush();

        return new Response(json_encode("ok"), 201);
    }
}