<?php

namespace Cinema\Service\OrderFactoryDependency\PriceEngineDependency\Exception;

class SubtotalActionMissedException extends PriceEngineException
{
    protected $message = 'You forgot to execute [\Cinema\Service\OrderFactoryDependency\PriceEngineDependency\Action\Subtotal] action before current one';
}