<?php


namespace Entrega3\AppBundle\FilmBundle\Command;


use Entrega3\Component\Application\Film\UseCase\UpdateFilmUseCase;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class UpdateFilmCommand extends ContainerAwareCommand
{
    private $updateFilmUseCase;

    public function __construct(UpdateFilmUseCase $updateFilmUseCase, $name = null)
    {
        parent::__construct($name);

        $this->updateFilmUseCase = $updateFilmUseCase;
    }

    public function configure()
    {
        $this
            ->setName("film:update")
            ->setDescription("Update a film")
            ->addArgument(
                "name",InputArgument::REQUIRED, "The name film"
            )
            ->addArgument(
                "actorId",InputArgument::REQUIRED, "Actor"
            )
            ->addArgument(
                "description", InputArgument::REQUIRED, "Description film"
            )
            ->addArgument(
                "filmId", InputArgument::REQUIRED, "Id film"
            );
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $em = $this->getContainer()->get('doctrine.orm.entity_manager');

        $output->writeln(["Update film"]);

        $name = $input->getArgument("name");
        $description = $input->getArgument("description");
        $actor = $input->getArgument("actorId");
        $filmId = $input->getArgument("filmId");

        $this->updateFilmUseCase->execute($filmId,$name,$description,$actor);

        $em->flush();

        $output->writeln("Actor updated");
    }
}