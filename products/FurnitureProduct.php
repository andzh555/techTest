<?php

class FurnitureProduct extends BaseProduct
{
    private $furnitureHeight;
    private $furnitureLength;
    private $furnitureWidth; //All properties set to private to follow encapsulation implementation

    public function __construct($arr,$db)
    {
        parent::__construct(
            $db->queryDef($arr['data']['sku']),
            $db->queryDef($arr['data']['name']),
            $db->queryDef($arr['data']['price'])
        );
        $this->furnitureHeight = $db->queryDef($arr['data']['descriptionFurHeight']);
        $this->furnitureLength = $db->queryDef($arr['data']['descriptionFurLength']);
        $this->furnitureWidth = $db->queryDef($arr['data']['descriptionFurWidth']);
    }

    protected function productDescriptionValidation()
    {

        if ($this->furnitureHeight != null and
            is_numeric($this->furnitureHeight) and
            $this->furnitureLength != null and
            is_numeric($this->furnitureLength) and
            $this->furnitureWidth != null and
            is_numeric($this->furnitureWidth)) {
            return true;
        }
    }

    public function isValidProduct()
    {
        if ($this->productSelfValidation() and $this->productDescriptionValidation()) {
            return true;
        }
    }

    public function getFurnitureDescription($str)
    {
        return $this->furnitureHeight . 'x' . $this->furnitureLength . 'x' . $this->furnitureWidth . $str;
    }

    public function preparedSqlStatement()
    {
        return "INSERT INTO products SET sku='{$this->getSku()}', name='{$this->getName()}', price='{$this->getPrice()}' , dimensions='{$this->getFurnitureDescription('CM')}'";
    }


}