<?php

namespace Entrega3\AppBundle\ActorBundle\Api\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CreateActorController extends Controller
{
    public function execute(Request $request){

        $json = json_decode($request->getContent(), true);

        $name = $json['name'];

        $em = $this->getDoctrine()->getManager();

        $newActorUseCase = $this->get('entrega3.actor.usecase.newactor');

        $newActorUseCase->execute($name);

        $em->flush();

        return new Response(json_encode("ok"), 201);
    }
}