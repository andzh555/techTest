<?php

include 'lib/ConnectDB.php';

$db = new ConnectDB();
$db->connectToDataBase();
if (isset($_POST['toDel'])) {
    $deleted = $_POST['toDel'];
    $sql = "DELETE FROM products WHERE id IN (" . implode(",", $deleted) . ")";
    $db->executeQuery($sql);
}
header('Location: http://localhost/test/productList.php');
?>