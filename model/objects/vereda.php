<?php
class crud
{

    // https://lenguajesdeprogramacion.net/diccionario/diferencia-entre-public-protected-o-private/
    // Conexión a la base de datos y nombre de la tabla
    private $conn;
    private $table_name = "vereda";

    //Propiedades de los objetos
    public $id;
    public $nombre_vereda;
    public $descripcion;
    public $data;

    // Explicación sobre la función https://www.w3schools.com/php/php_oop_constructor.asp
    public function __construct($db)
    {
        $this->conn = $db;
    }

    function selectupdate()
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id_vereda  =  " . $this->data . " ";
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
        $query = "INSERT INTO " . $this->table_name . " SET nombre_vereda=?, descripcion=? ";
        $stmt = $this->conn->prepare($query);
        $this->nombre_vereda = htmlspecialchars(strip_tags($this->nombre_vereda));
        $this->descripcion = htmlspecialchars(strip_tags($this->descripcion));
        //orden de variables preparadas
        $stmt->bindParam(1, $this->nombre_vereda);
        $stmt->bindParam(2, $this->descripcion);
        //validamos la insercion
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    function makeUpdate()
    {
        $query = "UPDATE " . $this->table_name . " SET nombre_vereda=?, descripcion=?  WHERE id_vereda = " . $this->id . " ";
        $stmt = $this->conn->prepare($query);
        $this->nombre_vereda = htmlspecialchars(strip_tags($this->nombre_vereda));
        $this->descripcion = htmlspecialchars(strip_tags($this->descripcion));

        $stmt->bindParam(1, $this->nombre_vereda);
        $stmt->bindParam(2, $this->descripcion);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    //eliminamos un registro por medio del id 
    function delete()
    {
        $query = "DELETE FROM " . $this->table_name . " WHERE id_vereda =  " . $this->data . " ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
