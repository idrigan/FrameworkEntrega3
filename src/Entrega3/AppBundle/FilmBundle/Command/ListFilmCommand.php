<?php


namespace Entrega3\AppBundle\FilmBundle\Command;


use Entrega3\Component\Application\Film\UseCase\ListFilmUseCase;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ListFilmCommand extends Command
{
    private $listFilmUseCase;

    public function __construct(ListFilmUseCase $listFilmUseCase, $name = null)
    {
        parent::__construct($name);

        $this->listFilmUseCase = $listFilmUseCase;
    }

    public function configure()
    {
        $this
            ->setName("film:list")
            ->setDescription("List a film");
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln(["List films"]);


        $films = $this->listFilmUseCase->execute();

        foreach ($films as $film){
            $output->writeln("Title: ".$film->getName()."  Actor: ".$film->getActor()."  Description: ".$film->getDescription());
        }

    }
}