<?php
include("conexion.php");

if (isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "DELETE FROM clientes WHERE id = $id";
    $result=mysqli_query($conn, $query);
    if (!$result){
        die("Falladido");

    }

    $_SESSION['message']='Se a Eliminado correctamente';
    $_SESSION['message_type']= 'danger';
    header("Location: insertar.php");
}