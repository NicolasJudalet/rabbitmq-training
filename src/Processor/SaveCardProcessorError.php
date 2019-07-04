<?php

namespace App\Processor;

use Swarrot\Broker\Message;
use Swarrot\Processor\ProcessorInterface;

class SaveCardProcessorError implements ProcessorInterface
{
    public function process(Message $message, array $options)
    {
        $messageBody = json_decode($message->getBody(), true);

        throw new \Error(sprintf(
            'The card corresponding to transaction with id %s could not be saved',
            $messageBody['transaction_id']
        ));
    }
}
