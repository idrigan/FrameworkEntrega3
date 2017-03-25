<?php

namespace Entrega3\AppBundle\ActorBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Entrega3\Component\Domain\Actor\Repository\ActorRepository;
use Entrega3\Component\Domain\Entity\Actor;

class ActorRepositoryImpl extends EntityRepository implements ActorRepository
{

    public function getAll()
    {
        return $this->findAll();
    }

    public function create(Actor $actor){
        return $this->getEntityManager()->persist($actor);
    }

    public function delete(Actor $actor)
    {
        return $this->getEntityManager()->remove($actor);
    }

    public function getById($idActor)
    {
        return $this->find($idActor);
    }
}