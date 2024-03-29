<?php
      require_once('loader.php');
      if($_POST){
          $producto = new Producto($_POST['marca'],$_POST['categoria'],  $_POST['talle'],$_POST['precio'],$_POST['length'],$_POST['genre_id']);
          $errores = $validar->ValidadorProducto($producto);
          if (count($errores)==0){
              $consulta->guardarProducto($bd,'marca',$pelicula);
          }
      }
      $generos = $consulta->listarUsuarios($bd,'usuarios');
  ?>
  <!DOCTYPE html>
  <html lang="es">
  <head>
          <meta charset="utf-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <title>Registro de Peliculas - Daniel</title>
          <meta name="description" content="">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
          <link rel="stylesheet" href="css/master.css">

      </head>
      <body>

          <?php require 'parciales/header.php' ?>
          <?php require 'parciales/footer.php' ?>
          <div class="spacer"></div>
          <h2 class="text-center">Agregar Producto</h2>
         <div class="row mt-5">
              <div class="col-lg-8 offset-lg-2">
                  <?php if(isset($errores)):?>
                      <ul class="alert alert-danger">
                          <?php foreach ($errores as  $error) :?>
                              <li><?=$error ;?></li>
                          <?php endforeach;?>
                      </ul>
                  <?php endif; ?>
                  <form action="" method="post" enctype="multipart/formdata">
                      <div class="form-group">
                          <label for="marcaProducto">Marca</label>
                          <input type="text" class="form-control" name="marca" id="marcaProducto">
                      </div>
                      <div class="form-group">
                          <label for="categoriaProducto">Categoria</label>
                          <input type="text" class="form-control" name="categoria" id="categoriaProducto">
                      </div>
                      <div class="form-group">
                          <label for="talleProducto">Talle</label>
                          <input type="number" class="form-control" name="talle" id="talle">
                      </div>
                      <div class="form-group">
                          <label for="precioProducto">Precio</label>
                          <input type="date" class="form-control" name="precio" id="precio">
                      </div>

                      <div class="form-group">
                          <label for="usuarios">Usuarios</label>
                          <select class="form-control" name="usuario_id" id="usuarios">
                              <option value="#" disabled >Seleccione usuario...</option>
                              <?php foreach ($usuarios as $key => $value) :?>
                                  <option value="<?=$value['id'] ;?>"><?=$value['nombre'] ;?></option>
                              <?php endforeach;?>
                          </select>
                      </div>
                      <button type="submit" class="btn btn-primary">Registrar Producto</button>
                  </form>
                  <a href="index1.php" class="btn btn-danger">Volver</a>
              </div>
          </div>

          <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
          <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

      </body>
  </html>


  // class agregarProducto{
    //public function agregarProducto();
    //public function eliminarProducto();
    // public function editarProducto(); }
