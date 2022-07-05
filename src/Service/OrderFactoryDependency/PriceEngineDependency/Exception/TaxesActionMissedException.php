<?php

namespace Cinema\Service\OrderFactoryDependency\PriceEngineDependency\Exception;

class TaxesActionMissedException extends PriceEngineException
{
    protected $message = 'You forgot to execute [\Cinema\Service\OrderFactoryDependency\PriceEngineDependency\Action\Taxes] action before current one';
}