<?php
class crud
{

    // https://lenguajesdeprogramacion.net/diccionario/diferencia-entre-public-protected-o-private/
    // Conexión a la base de datos y nombre de la tabla
    private $conn;
    private $table_name = "asociacion";
    private $table_repre = "representante";
    private $table_teso = "tesorero";
    private $table_fis = "fiscal";

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

    //select del combobox representante
    function select()
    {
        $query = "SELECT * FROM " . $this->table_repre . " ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute(array());
        $row = $stmt->fetchAll(PDO::FETCH_BOTH);
        return $row;
    }

    //select del combobox tesorero
    function select2()
    {
        $query = "SELECT * FROM " . $this->table_teso . " ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute(array());
        $row = $stmt->fetchAll(PDO::FETCH_BOTH);
        return $row;
    }

    //select del combobox fiscal
    function select3()
    {
        $query = "SELECT * FROM " . $this->table_fis . " ";
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
        $query = "SELECT asociacion.id_asociacion, asociacion.nombre_asoci, asociacion.nit, representante.nombre_repre, tesorero.nombre, fiscal.nombre FROM (((" . $this->table_name . " LEFT JOIN representante ON asociacion.fk_representante = representante.id_representante)LEFT JOIN tesorero ON asociacion.fk_tesorero = tesorero.id_tesorero)LEFT JOIN fiscal ON asociacion.fk_fiscal = fiscal.id_fiscal ) ";
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
