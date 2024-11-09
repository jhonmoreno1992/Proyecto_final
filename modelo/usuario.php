<?php 

class Usuario {
    private $conn;
    public $usuario;
    public $password;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function validarUsuario() {
        $query = "SELECT * FROM usuario WHERE usuario = :usuario AND password = :password LIMIT 1"; 
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':usuario', $this->usuario);
        $stmt->bindParam(':password', $this->password);   
        $stmt->execute();            
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}