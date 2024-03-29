<?php
  require_once('loader.php');
  require_once('controladores/funciones.php');
  require_once("clases/Consulta.php");
  //Esta condición la cree para controlar si debo listar las películas en función de lo que usuario quiere ver por medio de consultar o simplemente cuando carga la página
  if ($_GET && !empty(trim('busqueda'))){
    $productos = $consulta->buscarProductos($bd,'productos',$_GET['busqueda']);
  }else{
    $productos = $consulta->listarProductos($bd,'productos');
  }

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Productos</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/master.css">
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
</head>
<body>
    <?php require 'parciales/header.php' ?>
    <div class="spacer"></div>
    <h2 class="text-center">Listado de Productos!!!</h2>
    <div>
      <!--Este es formulario para que el usuario busque la película quje desee-->
      <form action="" method="get">
        <input type="submit" value="Buscar"><input type="text" name="busqueda">
      </form>
    </div>
    <div class="spacer">
      <table class="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Marca</th>
            <th>Ver</th>
            <th>Editar</th>
            <th>Eliminar</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($productos as $key => $value) :?>
            <tr>
              <td><?=$value['id'];?></td>
              <td><?=$value['marca'];?></td>
              <td><a href="detalleProducto.php?id=<?=$value['id'];?>"><ion-icon name="eye"></ion-icon></a></td>
              <td><a href="editarProducto.php?id=<?=$value['id'];?>"><ion-icon name="create"></ion-icon></a></td>
              <td><a href="borrarProducto.php?id=<?=$value['id'];?>"><ion-icon name="trash"></ion-icon></td></a>
            </tr>

          <?php endforeach;?>
          <tr>

          </tr>
        </tbody>
      </table>
    </div>
<?php require 'parciales/footer.php' ?>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>
