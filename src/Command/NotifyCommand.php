<?php

namespace App\Command;

use App\Message\MyNotification;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Messenger\MessageBusInterface;

class NotifyCommand extends Command
{
    protected static $defaultName = 'app:notify';
    private $messageBus;

    public function __construct(MessageBusInterface $messageBus)
    {
        parent::__construct();

        $this->messageBus = $messageBus;
    }

    protected function configure()
    {
        $this
            ->setDescription('Dispatch a message')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $this->messageBus->dispatch(new MyNotification('Hello '.rand()));
        $this->messageBus->dispatch(new MyNotification('Bonjour '.rand()));
        $io->success('Dispatched.');

        return 0;
    }
}
