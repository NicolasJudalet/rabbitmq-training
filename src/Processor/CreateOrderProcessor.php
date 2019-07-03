<?php

namespace App\Processor;

use Swarrot\Broker\Message;
use Swarrot\Processor\ProcessorInterface;

class CreateOrderProcessor implements ProcessorInterface
{
    public function process(Message $message, array $options)
    {
        $messageBody = json_decode($message->getBody(), true);

        sleep(1);

        var_dump(sprintf('Created new order for transaction with id %s',
            $messageBody['transaction_id']
        ));
    }
}
