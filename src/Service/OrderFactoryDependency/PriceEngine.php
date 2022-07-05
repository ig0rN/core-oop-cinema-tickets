<?php

namespace Cinema\Service\OrderFactoryDependency;

use Cinema\Model\Order;
use Cinema\Service\OrderFactoryDependency\Interface\PriceEngineInterface;
use Cinema\Service\OrderFactoryDependency\PriceEngineDependency\Exception\NoActionRegisteredException;
use Cinema\Service\OrderFactoryDependency\PriceEngineDependency\Interface\PriceActionInterface;

class PriceEngine implements PriceEngineInterface
{
    /**
     * @var PriceActionInterface[]
     */
    private array $actions = [];

    public function registerAction(PriceActionInterface $action)
    {
        $this->actions[] = $action;

        return $this;
    }

    public function processRegisteredActions(Order $order): void
    {
        $this->checkRegisteredActions();

        foreach ($this->actions as $priceAction) {
            $priceAction->makeCalculation($order);
        }
    }

    private function checkRegisteredActions(): void
    {
        if ([] === $this->actions) {
            $message = sprintf(
                'Field [%s::action] is empty. You need to call [%s::registerAction] method before [%s]',
                $this::class,
                $this::class,
                __METHOD__
            );

            throw new NoActionRegisteredException($message);
        }
    }
}
