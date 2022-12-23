<?php 
require("../../../config.php");
require("../../../models/db.php");
require("../../../models/products.php");

if(isset($_GET['id'])){
    $id = intval($_GET['id']) ;
}

$Products = new Products;
$deleteProducts = $Products->deleteProducts($id);

header('location: products.php');
?>