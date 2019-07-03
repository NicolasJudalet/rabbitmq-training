<?php

namespace App\Command;

use Swarrot\Broker\Message;
use Swarrot\SwarrotBundle\Broker\Publisher;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class PublishChargeCardSucceededCommand extends Command
{
    /** @var Publisher $publisher */
    private $publisher;

    public function __construct(Publisher $publisher)
    {
        $this->publisher = $publisher;
        parent::__construct();
    }

    public function configure()
    {
        $this
            ->setName('publish')
            ->setDescription('Publishes a new event charge.card.succeeded');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);

        $transactionId = rand(1, 1000);
        $io->success(sprintf('New card charge succeeded ! Transaction id : %s', $transactionId));

        $message = new Message(json_encode(['transaction_id' => $transactionId]));
        $this->publisher->publish('charge_card_succeeded', $message);
    }
}
