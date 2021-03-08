<?php

class BookProduct extends BaseProduct
{
    private $weight; //properties set to private to follow encapsulation implementation

    public function __construct($arr,$db)
    {
        parent::__construct(
            $db->queryDef($arr['data']['sku']),
            $db->queryDef($arr['data']['name']),
            $db->queryDef($arr['data']['price'])
        );
        $this->weight = $db->queryDef($arr['data']['descriptionBook']);
    }

    protected function productDescriptionValidation()
    {
        if ($this->weight != null and
            is_numeric($this->weight)) {
            return true;
        }
    }

    public function isValidProduct()
    {
        if ($this->productSelfValidation() and $this->productDescriptionValidation()) {
            return true;
        }
    }

    public function getBookDescription($str)
    {
        return $this->weight . $str;
    }

    public function preparedSqlStatement()
    {
        return "INSERT INTO products SET sku='{$this->getSku()}', name='{$this->getName()}', price='{$this->getPrice()}' , capacity='{$this->getBookDescription('KG')}'";
    }


}