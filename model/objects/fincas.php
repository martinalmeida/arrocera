<?php
class crud
{

    // https://lenguajesdeprogramacion.net/diccionario/diferencia-entre-public-protected-o-private/
    // Conexión a la base de datos y nombre de la tabla
    private $conn;
    private $table_name = "fincas";
    private $table_vereda = "vereda";

    //Propiedades de los objetos
    public $id;
    public $nombre_finca;
    public $area;
    public $fk_vereda;
    public $data;

    // Explicación sobre la función https://www.w3schools.com/php/php_oop_constructor.asp
    public function __construct($db)
    {
        $this->conn = $db;
    }

    //select del combobox
    function select()
    {
        $query = "SELECT * FROM " . $this->table_vereda . " ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute(array());
        $row = $stmt->fetchAll(PDO::FETCH_BOTH);
        return $row;
    }

    function selectupdate()
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id_finca  =  " . $this->data . " ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute(array());
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        echo json_encode($row);
        return $row;
    }

    //listar la tabla principal por medio del fetch
    function table()
    {
        $query = "SELECT fincas.id_finca, fincas.nombre_finca, fincas.area, vereda.nombre_vereda FROM (" . $this->table_name . " LEFT JOIN vereda ON fincas.fk_vereda = vereda.id_vereda) ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute(array());
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($row);
        return $row;
    }

    //insertar del formulario model insert
    function create()
    {
        $query = "INSERT INTO " . $this->table_name . " SET nombre_finca=?, area=?, fk_vereda=? ";
        $stmt = $this->conn->prepare($query);
        $this->nombre_finca = htmlspecialchars(strip_tags($this->nombre_finca));
        $this->area = htmlspecialchars(strip_tags($this->area));
        $this->fk_vereda = htmlspecialchars(strip_tags($this->fk_vereda));
        //orden de variables preparadas
        $stmt->bindParam(1, $this->nombre_finca);
        $stmt->bindParam(2, $this->area);
        $stmt->bindParam(3, $this->fk_vereda);
        //validamos la insercion
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    function makeUpdate()
    {
        $query = "UPDATE " . $this->table_name . " SET nombre_finca=?, area=?, fk_vereda=?  WHERE id_finca = " . $this->id . " ";
        $stmt = $this->conn->prepare($query);
        $this->nombre_vereda = htmlspecialchars(strip_tags($this->nombre_finca));
        $this->descripcion = htmlspecialchars(strip_tags($this->area));
        $this->descripcion = htmlspecialchars(strip_tags($this->fk_vereda));

        $stmt->bindParam(1, $this->nombre_finca);
        $stmt->bindParam(2, $this->area);
        $stmt->bindParam(3, $this->fk_vereda);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    //eliminamos un registro por medio del id 
    function delete()
    {
        $query = "DELETE FROM " . $this->table_name . " WHERE id_finca =  " . $this->data . " ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
