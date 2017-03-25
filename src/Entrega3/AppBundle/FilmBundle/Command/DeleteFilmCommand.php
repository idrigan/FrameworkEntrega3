<?php


namespace Entrega3\AppBundle\FilmBundle\Command;


use Entrega3\Component\Application\Film\UseCase\DeleteFilmUseCase;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class DeleteFilmCommand extends ContainerAwareCommand
{
    private $deleteFilmUseCase;

    public function __construct(DeleteFilmUseCase $deleteFilmUseCase, $name = null)
    {
        parent::__construct($name);

        $this->deleteFilmUseCase = $deleteFilmUseCase;
    }

    public function configure()
    {
        $this
            ->setName("film:delete")
            ->setDescription("Delete a film")
            ->addArgument(
                "filmId", InputArgument::REQUIRED, "Id film"
            );
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $em = $this->getContainer()->get('doctrine.orm.entity_manager');

        $output->writeln(["Delete film"]);

        $filmId = $input->getArgument("filmId");

        $this->deleteFilmUseCase->execute($filmId);

        $em->flush();

        $output->writeln("Actor deleted");
    }
}