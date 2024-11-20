<?php

class Usuario
{
    private $conn;
    public $usuario;
    public $password;
    public $table_name = "usuario";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function validarUsuario()
    {
        $query = "SELECT * FROM usuario WHERE usuario = :usuario AND password = :password LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':usuario', $this->usuario);
        $stmt->bindParam(':password', $this->password);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function obtenerRegistroPorId($id)
    {
        $query = "SELECT * FROM registro WHERE idregistro = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function actualizarRegistro($id, $datos)
    {
        try {
            $query = "UPDATE registro 
                      SET nombre = :nombre, apellido = :apellido, cedula = :cedula, direccion = :direccion, 
                          telefono = :telefono, correo = :correo, usuario = :usuario, password = :password, confirmpassword = :confirmpassword 
                      WHERE idregistro = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            foreach ($datos as $key => $value) {
                $stmt->bindValue(":$key", $value, PDO::PARAM_STR);
            }
            return $stmt->execute();
        } catch (PDOException $e) {
            die('Error en la consulta SQL: ' . $e->getMessage());
        }
    }
}
