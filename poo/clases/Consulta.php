<?php
class Consulta{
    //Este método muestra el listatdo de todas las películas
    public function listarProductos($bd,$productos){
        $sql = "select * from $productos";
        $query = $bd->prepare($sql);
        $query->execute();
        $productos = $query->fetchAll(PDO::FETCH_ASSOC);
        return $productos;
    }
    //Método para listar los generos, estos son usudados luego tanto en agregar como en editar películas
    public function listarUsuarios($bd,$usuarios){
        $sql = "select * from $usuarios";
        $query = $bd->prepare($sql);
        $query->execute();
        $usuarios = $query->fetchAll(PDO::FETCH_ASSOC);
        return $usuarios;
    }
    //Método para agregar una nueva película
    public function guardarProducto($bd,$productos,$usuarios){
        $sql = "insert into $productos (id,marca,categoria,talle,precio, usuarios_id) values (:id,:marca,:categoria,:talle,:precio,:usuarios_id)";
        $query = $bd->prepare($sql);
        $query->bindValue(':id',$pelicula->getId());
        $query->bindValue(':marca',$pelicula->getMarca());
        $query->bindValue(':categoria',$pelicula->getCategoria());
        $query->bindValue(':talle',$pelicula->getTalle());
        $query->bindValue(':precio',$pelicula->getPrecio());
        $query->bindValue(':usuarios_id',$pelicula->getUsuarios_id());
        $query->execute();
        header('location:index1.php');
    }
    //Este método muestra el detalle de una película selecciona de la lista por parte del usuario
    public function detalleProducto($bd,$productos,$usuarios,$id){
        $sql = "select $productos. * ,$productos.marca from $productos,$usuarios where $productos.usuarios_id LIKE $usuarios.id and $productos.id LIKE $id";
        $query = $bd->prepare($sql);
        $query->execute();
        $productos = $query->fetch(PDO::FETCH_ASSOC);
        return $productos;
    }
    //Este es el método que controla la busqueda de las películas
    public function buscarProductos($bd,$tabla,$busqueda){
        $sql = "select * from $tabla where marca like :busqueda";
        $query = $bd->prepare($sql);
        $query->bindValue(':busqueda',"%".$busqueda."%");
        $query->execute();
        $productos = $query->fetchAll(PDO::FETCH_ASSOC);
        return $productos;
    }
    //Este método controla el borrado de la película que el usuario selecione
    public function borrarProducto($bd,$productos,$id){
        $sql = "delete from $productos where id = :id";
        $query = $bd->prepare($sql);
        $query->bindvalue(':id',$id);
        $query->execute();
    }
    //Método para realizar la edición o modificación de los datos de alguna película
    public function actualizarProducto($bd,$productos,$id){
        $sql = "update $productos set marca=:marca,categoria=:categoria,talle=:talle,precio=:precio,usuarios_id=:usuarios_id where $productos.id=$id";
        $query = $bd->prepare($sql);
        $query->bindValue(':id',$pelicula->getId());
        $query->bindValue(':marca',$pelicula->getMarca());
        $query->bindValue(':categoria',$pelicula->getCategoria());
        $query->bindValue(':talle',$pelicula->getTalle());
        $query->bindValue(':precio',$pelicula->getPrecio());
        $query->bindValue(':usuarios_id',$pelicula->getUsuarios_id());
        $query->execute();
        header('location:index.php');
      }

}
