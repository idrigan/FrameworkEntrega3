<?php


namespace Entrega3\AppBundle\ActorBundle\Api\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DeleteActorController extends Controller
{
    public function execute($id){

        $em = $this->getDoctrine()->getManager();

        $deleteActorUseCase = $this->get('entrega3.actor.usecase.deleteactor');

        $deleteActorUseCase->execute($id);

        $em->flush();

        return new Response(json_encode("ok"), 201);
    }
}