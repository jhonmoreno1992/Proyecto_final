<?php
require_once 'conexion.php';

class Producto
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function obtenerProductoPorId($id)
    {
        $query = "SELECT idproducto, nombreproducto, precio, imagen FROM producto WHERE idproducto = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function obtenerProductosAleatorios($limit = 8)
    {
        $query = "SELECT idproducto, nombreproducto, precio, imagen FROM producto ORDER BY RAND() LIMIT :limit";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();

        $productos = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $row['imagen'] = base64_encode($row['imagen']);
            $productos[] = $row;
        }

        return $productos;
    }

    public function obtenerProductosPorCategoria($categoria_nombre)
    {
        $query = "SELECT idproducto, nombreproducto, descripcion, precio, stock, imagen 
                  FROM producto 
                  WHERE categoria_id_categoria = :categoria_nombre";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':categoria_nombre', $categoria_nombre, PDO::PARAM_STR);
        $stmt->execute();

        $productos = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $row['imagen'] = base64_encode($row['imagen']);
            $productos[] = $row;
        }

        return $productos;
    }
}
