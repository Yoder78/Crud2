<?php include("conexion.php")?>

<?php include("includes/header.php")?>

<div class="container p-4">
    <div class ="row">
        <div class="col-md-4">
            <?php if (isset($_SESSION['message'])){?>
                <div class="alert alert-<?=$_SESSION['message_type'];?> alert-dismissible fade show" role="alert">
                    <?=$_SESSION['message']?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                 </div>

            <?php session_unset();}?>

        <div class="card card-body">
            <form action="guardarformulario.php"method="POST">
                <div class="form-grup">
                    <input type="text" name="nombres" class="form-control"
                    placeholder="nombres" autofocus>
                </div>
                <br>
                <div class="form-grup">
                    <input type="text" name="apellidos" class="form-control"
                    placeholder="apellidos" autofocus>
                </div>
                <br>
                <div class="form-grup">
                    <input type="text" name="telefono" class="form-control"
                    placeholder="telefono" autofocus>
                </div>
                <br>
                <div class="form-grup">
                    <input type="text" name="direcion" class="form-control"
                    placeholder="direcion" autofocus>
                </div>
                <br>
                
                <input type="submit" class="btn btn-success btn-block"
                name="save_task" value="Save Task">
            </form>
        </div>
        <div class="col-md-8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nombres</th>
                        <th>Apelliods</th>
                        <th>Telefono</th>
                        <th>Direccion</th>
                        <th>Crear</th>
                        <th>Actions</th>
                    </tr>
                </thead>   
                <tbody>
                    <?php
                    $query = "SELECT * FROM clientes";
                    $result_tasks= mysqli_query($conn, $query);

                    while($row = mysqli_fetch_array($result_tasks)) {?>
                        <tr>
                            <td><?php echo $row['nombres'] ?> </td>
                            <td><?php echo $row['apellidos'] ?> </td>
                            <td><?php echo $row['telefono'] ?> </td>
                            <td><?php echo $row['direcion'] ?> </td>
                            <td><?php echo $row['created_at'] ?> </td>
                            <td>
                                <a href="editar.php?id=<?php echo $row['id']?>"class="btn btn-secondary">
                                <i class="fas fa-marker"></i>
                                </a>
                                <a href="eliminar.php?id=<?php echo $row['id']?>"class="btn btn-danger">
                                <i class="far fa-trash-alt"></i>
                                </a>
                                
                            </td>
                        </tr>

                    <?php } ?>
                </tbody> 

            </table>

            </div>

        </div>
        <li><a href="index.php">REGRESAR</a>
          
        </li>
    </div>   

</div>

    

<?php include ("includes/footer.php")?>