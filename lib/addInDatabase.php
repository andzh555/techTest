<?php
function addInDatabase(BaseProduct $class, ConnectDB $connectDB)
{
    if ($class->isValidProduct()) {
        if ($connectDB->checkUniqSkuInDb($class->getSku())) {
            $connectDB->executeQuery($class->preparedSqlStatement());
        } else {
            return array('notUniqSKU' => "Choose another SKU");
        }
    } else {
        return array('missing' => "Please, check/fill all given data!");
    }
}