<?php

class Conexion {
    protected const DB_SERVER = "localhost";
    protected const DB_USER = "root";
    protected const DB_PASS = "";
    protected const DB_NAME = "tienda_comic";
    protected const DB_DSN = "mysql:host=" . self::DB_SERVER . ';dbname=' . self::DB_NAME . ';charset=utf8mb4';
    protected PDO $db;

    protected static $conexiones = 0;

    public function __construct() {
        try {
            $this->db = new PDO(self::DB_DSN, self::DB_USER, self::DB_PASS, array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
            // echo "Conexion creada";
            // echo self::$conexiones++;
        } catch (Exception $e) {
            die("No se puede conectar: " . $e->getMessage());
        }
    }

    public function getConexion() {
        return $this->db;
    }

    public function prepare($sql) {
        return $this->db->prepare($sql);
    }
}
?>
