<?php


namespace Entrega3\AppBundle\FilmBundle\Api\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DeleteFilmController extends Controller
{
    public function execute($id){

        $em = $this->getDoctrine()->getManager();

        $deleteFilmUseCase = $this->get('entrega3.film.usecase.deletefilm');

        $deleteFilmUseCase->execute($id);

        $em->flush();

        return new Response(json_encode("ok"), 201);
    }
}