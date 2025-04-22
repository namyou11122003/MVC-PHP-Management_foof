<?php
require_once __DIR__ . "/../../controller/productController.php";
$deleteproduct = new Productcontroller();
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $deleteproduct->deleteProduct($id);
    header("location: ../admin/product.php");
}

?>