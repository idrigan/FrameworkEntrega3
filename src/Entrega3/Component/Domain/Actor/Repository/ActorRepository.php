<?php

namespace Entrega3\Component\Domain\Actor\Repository;

use Entrega3\Component\Domain\Entity\Actor;

interface ActorRepository
{
    public function getAll();
    public function create(Actor $actor);
    public function delete(Actor $actor);
    public function getById($idActor);
}