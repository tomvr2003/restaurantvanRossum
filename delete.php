<?php 
  require("connection.php");
  $id = $_GET['id'];
  $sql = 'DELETE FROM menu WHERE id=:id';
  $statement = $conn->prepare($sql);
  if($statement->execute([':id' => $id ])) {
    header("location:adminpanel.php");
  }
?>