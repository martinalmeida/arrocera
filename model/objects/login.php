<?php
class login
{
    // https://lenguajesdeprogramacion.net/diccionario/diferencia-entre-public-protected-o-private/
    // Conexión a la base de datos y nombre de la tabla
    private $conn;
    private $table_name = "usuarios";

    //Propiedades de los objetos
    public $correo;
    public $password;

    // Explicación sobre la función https://www.w3schools.com/php/php_oop_constructor.asp
    public function __construct($db)
    {
        $this->conn = $db;
    }

    // se utiliza $this para referenciar al objeto actual.
    function validation()
    {

        $query = "SELECT * FROM " . $this->table_name . " WHERE correo=? AND passwork=? ";
        $stmt = $this->conn->prepare($query);
        $this->correo = htmlspecialchars(strip_tags($this->correo));
        $this->password = htmlspecialchars(strip_tags($this->password));

        $stmt->bindParam(1, $this->correo);
        $stmt->bindParam(2, $this->password);
        $stmt->execute();

        if ($stmt->rowCount() >= 1) {
            return true;
        } else {
            return false;
        }
    }

    function logout()
    {
        session_start();
        unset($_SESSION["?"]);
        session_destroy();
        header("Location:../../index.php");
    }
}
