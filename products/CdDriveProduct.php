<?php

class CdDriveProduct extends BaseProduct
{
    private $capacity; 

    public function __construct($arr, $db)
    {
        parent::__construct(
            $db->queryDef($arr['data']['sku']),
            $db->queryDef($arr['data']['name']),
            $db->queryDef($arr['data']['price'])
        );
        $this->capacity = $db->queryDef($arr['data']['descriptionCD']);
    }

    public function isValidProduct()
    {
        if ($this->productSelfValidation() and $this->productDescriptionValidation()) {
            return true;
        }
    }

    protected function productDescriptionValidation()
    {
        if ($this->capacity != null and
            is_numeric($this->capacity)) {
            return true;
        }
    }

    public function getCdDescription($str)
    {
        return $this->capacity . $str;
    }

    public function preparedSqlStatement()
    {
        return "INSERT INTO products SET sku='{$this->getSku()}', name='{$this->getName()}', price='{$this->getPrice()}' , capacity='{$this->getCdDescription('MB')}'";
    }


}
