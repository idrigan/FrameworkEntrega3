<?php

namespace Entrega3\Component\Domain\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity(repositoryClass="\Entrega3\AppBundle\FilmBundle\Repository\FilmRepositoryImpl")
 * @ORM\Table(name="film")
 */
class Film
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $name;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity="Actor", cascade={"persist"})
     * @ORM\JoinColumn(name="actor_id", referencedColumnName="id")
     */
    private $actor;

    /**
     * Actor constructor.
     * @param $name
     * @param $description
     */
    public function __construct($name, $description, Actor $actor)
    {
        $this->name = $name;
        $this->description = $description;
        $this->actor = $actor;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getActor()
    {
        return $this->actor->getName();
    }

    /**
     * @param mixed $actor
     */
    public function setActor(Actor $actor)
    {
        $this->actor = $actor;
    }
}