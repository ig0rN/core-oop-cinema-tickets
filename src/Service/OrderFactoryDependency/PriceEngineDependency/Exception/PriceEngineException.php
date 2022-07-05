<?php

namespace Cinema\Service\OrderFactoryDependency\PriceEngineDependency\Exception;

use LogicException;

class PriceEngineException extends LogicException
{
    protected $message = 'PriceEngineException';

    public function __construct(string $message = '')
    {
        $message = '' === $message ? $this->message : $message;

        parent::__construct($message, 500);
    }
}
