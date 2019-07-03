<?php

namespace App\Processor;

use Swarrot\Broker\Message;
use Swarrot\Processor\ProcessorInterface;

class SaveCardProcessor implements ProcessorInterface
{
    public function process(Message $message, array $options)
    {
        $messageBody = json_decode($message->getBody(), true);

        var_dump(sprintf('Saved card for transaction with id %s',
            $messageBody['transaction_id']
        ));
    }
}
