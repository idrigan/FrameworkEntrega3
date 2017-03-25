<?php

namespace Entrega3\AppBundle\ActorBundle\Api\Controller;

use Entrega3\Component\Domain\Entity\Actor;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;


class ListActorController extends Controller
{
    public function execute(){

        $listActorUseCase = $this->get('entrega3.actor.usecase.listactor');

        $actors = $listActorUseCase->execute();

        $actorsAsArray = array_map(function (Actor $a) {
            return $this->actorToArray($a);
        }, $actors);

        return new Response(json_encode($actorsAsArray), 201);
    }

    private function actorToArray(Actor $actor)
    {
        return [
            'id' => $actor->getId(),
            'name' => $actor->getName(),
        ];
    }
}