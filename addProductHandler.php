<?php

include 'lib/ConnectDB.php';
include 'lib/RequestClass.php';
include 'products/BaseProduct.php';
include 'products/CdDriveProduct.php';
include 'products/BookProduct.php';
include 'products/FurnitureProduct.php';
include 'lib/addInDatabase.php';

$db = new ConnectDB();
$db->connectToDataBase();
$request = new RequestClass();
$errors = array();
$data = array();
$product = '';

switch ($_POST['data']['selectedType']) {
    case 1:
        $product = new CdDriveProduct($_POST,$db);
        $errors = addInDatabase($product, $db);
        break;
    case 2:
        $product = new BookProduct($_POST,$db);
        $errors = addInDatabase($product, $db);
        break;
    case 3:
        $product = new FurnitureProduct($_POST,$db);
        $errors = addInDatabase($product, $db);
        break;
    case 0:
        $errors['missing'] = "Please, choose type of product and fill all fields!";
        break;
}
if ($request->isPostRequest($_POST['data'])) {
    if (!empty($errors)) {
        $data['success'] = false;
        $data['errors'] = $errors;
    } else {
        $data['success'] = true;
        $data['message'] = 'Success!';
    }
    echo json_encode($data);
}


