<?php

class Autentificacion {
    
    public function __construct() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }
    
    public function log_in($nombre_usuario, $password) {
        $usuario = (new Usuario())->filtro_usuario_nombre($nombre_usuario);
        
        if ($usuario !== null) {
            if (password_verify($password, $usuario->getPassword())) {
                $_SESSION["login"] = [
                    "nombre_usuario" => $usuario->getNombre_usuario(),
                    "nombre_completo" => $usuario->getNombre_completo(),
                    "email" => $usuario->getEmail(),
                    "roles" => $usuario->getRoles(), 
                    "usuario_id" => $usuario->getId()
                ];
                return true;
            }
        }
        
        return false;
    }
    
    public function log_out() {
        if (isset($_SESSION["login"])) {
            unset($_SESSION["login"]);
        }
    }
    
    public function verify() {
        if (isset($_SESSION["login"]) && in_array($_SESSION["login"]["roles"], ["admin", "superadmin"])) {
            return true;
        } else {
            header("Location: ../index.php");
            exit;
        }
    }
}
?>
