<?php


namespace Entrega3\AppBundle\ActorBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class ActorController extends Controller
{
    public function execute($id)
    {


        $getActorUseCase = $this->get('entrega3.actor.usecase.getactor');

        $actor = $getActorUseCase->execute($id);


        return $this->render("actors/data-sheet.html.twig", ["actor" => $actor]);
    }
}