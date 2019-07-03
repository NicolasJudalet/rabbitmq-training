<?php

namespace App\Processor;

use Manomano\RabbitmqBundle\Exception\RetryableException;
use Swarrot\Broker\Message;
use Swarrot\Processor\ProcessorInterface;

class SaveCardProcessorError implements ProcessorInterface
{
    public function process(Message $message, array $options)
    {
        throw new RetryableException('There was an error while saving card');
    }
}
