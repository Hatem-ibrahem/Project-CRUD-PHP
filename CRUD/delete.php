<?php
   require_once('../CRUD/config_DB.php');

    if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])){
        $id=$_GET['id'];
        $con=$connection->prepare("DELETE FROM users WHERE id =$id ");
        $con->execute();  
    }
    header("Location:index.php");
    exit;

?>