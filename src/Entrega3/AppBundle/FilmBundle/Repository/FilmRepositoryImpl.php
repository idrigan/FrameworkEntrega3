<?php

namespace Entrega3\AppBundle\FilmBundle\Repository;


use Doctrine\ORM\EntityRepository;
use Entrega3\Component\Domain\Entity\Actor;
use Entrega3\Component\Domain\Entity\Film;
use Entrega3\Component\Domain\Film\Repository\FilmRepositoy;

class FilmRepositoryImpl extends EntityRepository implements FilmRepositoy{

    public function getAll()
    {
        return $this->findAll();
    }

    public function create(Film $film)
    {
        return $this->getEntityManager()->persist($film);
    }

    public function delete(Film $film)
    {
        return $this->getEntityManager()->remove($film);
    }

    public function update(Film $film,$name,$description,Actor $actor)
    {
        $film->setName($name);
        $film->setDescription($description);
        $film->setActor($actor);
        return $film;
    }

    public function getById($idFilm)
    {
        return $this->find($idFilm);
    }
}