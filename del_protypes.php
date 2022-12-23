<?php 
require("../../../config.php");
require("../../../models/db.php");
require("../../../models/protypes.php");

if(isset($_GET['typeid'])){
    $type_id = intval($_GET['typeid']) ;
}

$Protypes = new Protypes;   
$deleteProtypes = $Protypes->deleteProtypes($type_id);

header('location: protypes.php');
?>