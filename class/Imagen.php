<?php
class Imagen {
    public function subirImagen($imagen, string $directorio): ?string
    {
        if (is_array($imagen) && !empty($imagen["tmp_name"])) {
            $name = uniqid() . "-" . basename($imagen["name"]);
            $targetFilePath = rtrim($directorio, '/') . '/' . $name;

            if (!is_dir($directorio) || !is_writable($directorio)) {
                throw new Exception("El directorio no existe o no tiene permisos de escritura.");
            }

            if (move_uploaded_file($imagen["tmp_name"], $targetFilePath)) {
                return $name;
            } else {
                throw new Exception("No se pudo subir la imagen.");
            }
        }

        return null;
    }

    public function borrarImagen(string $filename): bool
    {
        if (file_exists($filename)) {
            if (unlink($filename)) {
                return true;
            } else {
                throw new Exception("No se pudo borrar la imagen.");
            }
        }

        return true;
    }
}