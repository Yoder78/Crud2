<?php
include ("conexion.php");

if (isset($_POST['save_task'])){
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $telefono = $_POST['telefono'];
    $direcion = $_POST['direcion'];

    $query = "INSERT INTO clientes(nombres, apellidos, telefono, direcion)VALUES('$nombres','$apellidos','$telefono','$direcion')";
    $resultado = mysqli_query($conn, $query);

    if(!$resultado){
        die("Peticion Fallida");

    }
    $_SESSION['message']= 'Guardado Satisfactorio';
    $_SESSION['message_type']='success';
    
    header("Location: insertar.php");
}
?>