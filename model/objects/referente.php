<?php
class crud
{

    // https://lenguajesdeprogramacion.net/diccionario/diferencia-entre-public-protected-o-private/
    // Conexión a la base de datos y nombre de la tabla
    private $conn;
    private $table_name = "referente_subnucleo";

    //Propiedades de los objetos
    public $id;
    public $nombre;
    public $cedula;
    public $telefono;
    public $whatsapp;
    public $data;

    // Explicación sobre la función https://www.w3schools.com/php/php_oop_constructor.asp
    public function __construct($db)
    {
        $this->conn = $db;
    }

    function selectupdate()
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id_referente  =  " . $this->data . " ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute(array());
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        echo json_encode($row);
        return $row;
    }

    //listar la tabla principal por medio del fetch
    function table()
    {
        $query = "SELECT * FROM " . $this->table_name . " ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute(array());
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($row);
        return $row;
    }

    //insertar del formulario model insert
    function create()
    {
        $query = "INSERT INTO " . $this->table_name . " SET nombre=?, cedula=?, telefono=?, whatsapp=? ";
        $stmt = $this->conn->prepare($query);
        $this->nombre = htmlspecialchars(strip_tags($this->nombre));
        $this->cedula = htmlspecialchars(strip_tags($this->cedula));
        $this->telefono = htmlspecialchars(strip_tags($this->telefono));
        $this->whatsapp = htmlspecialchars(strip_tags($this->whatsapp));
        //orden de variables preparadas
        $stmt->bindParam(1, $this->nombre);
        $stmt->bindParam(2, $this->cedula);
        $stmt->bindParam(3, $this->telefono);
        $stmt->bindParam(4, $this->whatsapp);
        //validamos la insercion
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    function makeUpdate()
    {
        $query = "UPDATE " . $this->table_name . " SET nombre=?, cedula=?, telefono=?, whatsapp=?  WHERE id_referente = " . $this->id . " ";
        $stmt = $this->conn->prepare($query);
        $this->nombre = htmlspecialchars(strip_tags($this->nombre));
        $this->cedula = htmlspecialchars(strip_tags($this->cedula));
        $this->telefono = htmlspecialchars(strip_tags($this->telefono));
        $this->whatsapp = htmlspecialchars(strip_tags($this->whatsapp));

        $stmt->bindParam(1, $this->nombre);
        $stmt->bindParam(2, $this->cedula);
        $stmt->bindParam(3, $this->telefono);
        $stmt->bindParam(4, $this->whatsapp);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    //eliminamos un registro por medio del id 
    function delete()
    {
        $query = "DELETE FROM " . $this->table_name . " WHERE id_referente =  " . $this->data . " ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
