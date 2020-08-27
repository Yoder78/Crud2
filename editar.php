<?php
    include("conexion.php");
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "SELECT * FROM clientes WHERE id =$id";
        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows($result)==1){
            $row = mysqli_fetch_array($result);
            $nombres = $row['nombres'];
            $apellidos = $row['apellidos'];
            $telefono = $row['telefono'];
            $direcion = $row['direcion'];
            
        }
    }
    if(isset($_POST['update'])){
        
        $id= $_GET['id'];
        $nombres = $_POST['nombres'];
        $apellidos = $_POST['apellidos'];
        $telefono = $_POST['telefono'];
        $direcion = $_POST['direcion'];

        $query = "UPDATE clientes set nombres = '$nombres', apellidos = '$apellidos', telefono = '$telefono', direcion = '$direcion' WHERE id = $id";
        mysqli_query($conn, $query);

        $_SESSION['message'] = 'Datos Actualizados Correctamente';
        $_SESSION['message_type']="danger";
        header("Location: insertar.php");

    }
?>
<?php include("includes/header.php")?>
<div class ="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="editar.php?id=<?php echo $_GET['id']; ?>"method="POST">
                    <div class="form-group">
                        <input type="text" name="nombres" value="<?php echo $nombres; ?>"
                        class="form-control" placeholder="Actualizar Nombre">
                    </div>
                    <div class="form-group">
                        <input type="text" name="apellidos" value="<?php echo $apellidos; ?>"
                        class="form-control" placeholder="Actualizar Apellido">
                    </div>
                    <div class="form-group">
                        <input type="text" name="telefono" value="<?php echo $telefono; ?>"
                        class="form-control" placeholder="Actualizar Telefono">
                    </div>
                    <div class="form-group">
                        <input type="text" name="direcion" value="<?php echo $direcion; ?>"
                        class="form-control" placeholder="Actualizar Direccion">
                    </div>

                    <button class="btn btn-success" name="update">
                        Actualizar
                    </button>    
                </form>

            </div>

        </div>

    </div>

</div>

<?php include("includes/footer.php")?>