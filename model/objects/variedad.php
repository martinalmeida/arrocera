<?php
class crud
{

    // https://lenguajesdeprogramacion.net/diccionario/diferencia-entre-public-protected-o-private/
    // Conexión a la base de datos y nombre de la tabla
    private $conn;
    private $table_name = "variedad_arroz";

    //Propiedades de los objetos
    public $id;
    public $nombre;
    public $periodo_vegetal;
    public $rendimiento;
    public $data;

    // Explicación sobre la función https://www.w3schools.com/php/php_oop_constructor.asp
    public function __construct($db)
    {
        $this->conn = $db;
    }

    function selectupdate()
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id_variedad  =  " . $this->data . " ";
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
        $query = "INSERT INTO " . $this->table_name . " SET nombre=?, periodo_vegetal=?, rendimiento=? ";
        $stmt = $this->conn->prepare($query);
        $this->nombre = htmlspecialchars(strip_tags($this->nombre));
        $this->periodo_vegetal = htmlspecialchars(strip_tags($this->periodo_vegetal));
        $this->rendimiento = htmlspecialchars(strip_tags($this->rendimiento));
        //orden de variables preparadas
        $stmt->bindParam(1, $this->nombre);
        $stmt->bindParam(2, $this->periodo_vegetal);
        $stmt->bindParam(3, $this->rendimiento);
        //validamos la insercion
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    function makeUpdate()
    {
        $query = "UPDATE " . $this->table_name . " SET nombre=?, periodo_vegetal=?, rendimiento=?  WHERE id_variedad = " . $this->id . " ";
        $stmt = $this->conn->prepare($query);
        $this->nombre = htmlspecialchars(strip_tags($this->nombre));
        $this->periodo_vegetal = htmlspecialchars(strip_tags($this->periodo_vegetal));
        $this->rendimiento = htmlspecialchars(strip_tags($this->rendimiento));

        $stmt->bindParam(1, $this->nombre);
        $stmt->bindParam(2, $this->periodo_vegetal);
        $stmt->bindParam(3, $this->rendimiento);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    //eliminamos un registro por medio del id 
    function delete()
    {
        $query = "DELETE FROM " . $this->table_name . " WHERE id_variedad =  " . $this->data . " ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
