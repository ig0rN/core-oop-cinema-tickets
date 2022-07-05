<?php
namespace Cinema;

class CinemaPriceEngine
{
    /**
     * Contains all test data
     * @see `data/data.php`
     *
     * @var array
     */
    private array $data;

    /**
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function getOrderBill(array $orderData): string
    {
        //@todo: codeme
        return json_encode($orderData, JSON_PRETTY_PRINT);
    }
}
