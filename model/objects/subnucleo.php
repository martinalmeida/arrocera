<?php
class crud
{

    // https://lenguajesdeprogramacion.net/diccionario/diferencia-entre-public-protected-o-private/
    // Conexión a la base de datos y nombre de la tabla
    private $conn;
    private $table_name = "subnucleo";
    private $table_ref = "referente_subnucleo";

    //Propiedades de los objetos
    public $id;
    public $nombre;
    public $fk_referente_sub;
    public $data;

    // Explicación sobre la función https://www.w3schools.com/php/php_oop_constructor.asp
    public function __construct($db)
    {
        $this->conn = $db;
    }

    //select del combobox representante
    function select()
    {
        $query = "SELECT * FROM " . $this->table_ref . " ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute(array());
        $row = $stmt->fetchAll(PDO::FETCH_BOTH);
        return $row;
    }

    function selectupdate()
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id_subnucleo  =  " . $this->data . " ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute(array());
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        echo json_encode($row);
        return $row;
    }

    //listar la tabla principal por medio del fetch
    function table()
    {
        $query = " SELECT subnucleo.id_subnucleo, subnucleo.nombre, (referente_subnucleo.nombre)referente FROM  ( " . $this->table_name . "  LEFT JOIN referente_subnucleo ON subnucleo.fk_referente_sub = referente_subnucleo.id_referente ) ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute(array());
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($row);
        return $row;
    }

    //insertar del formulario model insert
    function create()
    {
        $query = "INSERT INTO " . $this->table_name . " SET nombre=?, fk_referente_sub=? ";
        $stmt = $this->conn->prepare($query);
        $this->nombre = htmlspecialchars(strip_tags($this->nombre));
        $this->fk_referente_sub = htmlspecialchars(strip_tags($this->fk_referente_sub));
        //orden de variables preparadas
        $stmt->bindParam(1, $this->nombre);
        $stmt->bindParam(2, $this->fk_referente_sub);
        //validamos la insercion
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    function makeUpdate()
    {
        $query = "UPDATE " . $this->table_name . " SET nombre=?, fk_referente_sub=? WHERE id_subnucleo  = " . $this->id . " ";
        $stmt = $this->conn->prepare($query);
        $this->nombre = htmlspecialchars(strip_tags($this->nombre));
        $this->fk_referente_sub = htmlspecialchars(strip_tags($this->fk_referente_sub));

        $stmt->bindParam(1, $this->nombre);
        $stmt->bindParam(2, $this->fk_referente_sub);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    //eliminamos un registro por medio del id 
    function delete()
    {
        $query = "DELETE FROM " . $this->table_name . " WHERE id_subnucleo  =  " . $this->data . " ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
