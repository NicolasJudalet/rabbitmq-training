<?php

namespace App\Processor;

use Swarrot\Broker\Message;
use Swarrot\Processor\ProcessorInterface;

class SendEmailProcessor implements ProcessorInterface
{
    public function process(Message $message, array $options)
    {
        $messageBody = json_decode($message->getBody(), true);
        
        var_dump(sprintf('Sent confirmation email for transaction with id %s',
            $messageBody['transaction_id']
        ));
    }
}
