<?php

abstract class BaseProduct 
{
    private $sku;
    private $name;
    private $price; 

    public function __construct($sku, $name, $price)
    {
        $this->sku = $sku;
        $this->name = $name;
        $this->price = $price;
    }

    abstract protected function productDescriptionValidation();

    abstract  public function preparedSqlStatement();

    abstract public function isValidProduct();

    public function getSku()
    {
        return $this->sku;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPrice()
    {
        return $this->price;
    }

    protected function productSelfValidation()
    {
        if ($this->sku !== null and
            $this->name !== null and
            $this->price !== null and
            is_numeric($this->price)) {
            return true;
        }
    }


}
