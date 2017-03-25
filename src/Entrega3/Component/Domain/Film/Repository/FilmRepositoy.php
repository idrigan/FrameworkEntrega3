<?php


namespace Entrega3\Component\Domain\Film\Repository;


use Entrega3\Component\Domain\Entity\Actor;
use Entrega3\Component\Domain\Entity\Film;

interface FilmRepositoy
{
    public function getAll();
    public function create(Film $film);
    public function delete(Film $film);
    public function update(Film $film,$name,$description,Actor $actor);
    public function getById($filmId);
}