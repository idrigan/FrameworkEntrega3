<?php


namespace Entrega3\AppBundle\FilmBundle\Command;


use Entrega3\Component\Application\Film\UseCase\NewFilmUseCase;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreateFilmCommand extends ContainerAwareCommand
{
    private $newFilmUseCase;

    public function __construct(NewFilmUseCase $newFilmUseCase, $name = null)
    {
        parent::__construct($name);

        $this->newFilmUseCase = $newFilmUseCase;
    }

    public function configure()
    {
        $this
            ->setName("film:create")
            ->setDescription("Create a film")
            ->addArgument(
                "name",InputArgument::REQUIRED, "The name film"
            )
            ->addArgument(
                "actorId",InputArgument::REQUIRED, "Actor"
            )
            ->addArgument(
                "description", InputArgument::REQUIRED, "Description film"
            );
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $em = $this->getContainer()->get('doctrine.orm.entity_manager');

        $output->writeln(["Create film"]);
        $title = $input->getArgument("name");
        $description = $input->getArgument("description");
        $actor = $input->getArgument("actorId");
        $output->writeln("Title: ".$title);
        $output->writeln("Actor: ".$actor);
        $output->writeln("Descrition: ".$description);
        $this->newFilmUseCase->execute($title,$description,$actor);

        $em->flush();

        $output->writeln("Actor create");
    }
}