<?php

require_once "../../data/prodconnect.php";

$id = $_GET['id'] ?? null;
 
if(!$id){
  header('Location: ../logined.php');
}
else{
  $deleteProd = $pdo1->prepare("DELETE FROM parts WHERE id = :id");
  $deleteProd->bindValue(":id", $id);
  $deleteProd->execute();
  header('Location: ../logined.php');
  exit();
}



?>