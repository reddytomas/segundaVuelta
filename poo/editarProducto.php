<?php
  require_once("loader.php");
  if($_POST){
    //Esto se ejecuta univcamente cuando el usuario acciona el boton de Actualizar Película
    $producto = new Producto($_POST['marca'],$_POST['categoria'],$_POST['talle'],$_POST['precio']);
    $errores = $validar->ValidadorProducto($producto);
    //Les recuerdo que el método de validación de errores no está completo, sería bueno que ustdes culminen la validación de todos los campos

    if(count($errores) == 0){
      $consulta->actualizarProducto($bd,'productos',$producto,$_GET['id']);
    }
  }
  //Aquí genero el listado de los generos, para luego usarlos en el select - option del formulario y de esa forma lograr mostrar los generos para que el usuario seleccione el que desee
  $usuarios = $consulta->listarUsuarios($bd,'usuarios');
  //En la variable $movie incorporo los datos de la película que el usuario desea modificar
  $producto = $consulta->detalleProducto($bd,'productos','usuarios',$_GET['id']);

?>

<!DOCTYPE html>
<html lang="es">
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Registro de Productos</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="css/master.css">

    </head>
    <body>

        <?php require 'parciales/header.php' ?>

        <div class="spacer"></div>
        <h2 class="text-center">Editar Producto</h2>
       <div class="row mt-5">
            <div class="col-lg-8 offset-lg-2">
                <form action="" method="post" enctype="multipart/formdata">
                    <div class="form-group">
                        <label for="marcaProducto">Marca</label>
                        <input type="text" class="form-control" name="marca" id="marcaProducto" value="<?= $producto['marca']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="categoriaProducto">Categoria</label>
                        <input type="text" class="form-control" name="categoria" id="categoriaProducto" value="<?= $producto['categoria']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="talle">Talle</label>
                        <input type="number" class="form-control" name="talle" id="talle" value="<?= $producto['talle']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="precioProducto">Precio</label>
                        <input type="number" class="form-control" name="precio" id="precioProducto" value="<?= $producto['precio']; ?>">
                    </div>
                    <button type="submit" class="btn btn-primary">Actualizar Producto</button>
                </form>
                <a href="crud.php" class="btn btn-danger">Volver</a>
            </div>
        </div>
        <br>

        <?php require 'parciales/footer.php' ?>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/7968cc1663.js" crossorigin="anonymous"></script>
    </body>
</html>
