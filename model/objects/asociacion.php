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
    public $nombre_asoci;
    public $nit;
    public $fk_representante;
    public $fk_tesorero;
    public $fk_fiscal;
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
        $query = "SELECT * FROM " . $this->table_name . " WHERE id_asociacion  =  " . $this->data . " ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute(array());
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        echo json_encode($row);
        return $row;
    }

    //listar la tabla principal por medio del fetch
    function table()
    {
        $query = "SELECT asociacion.id_asociacion, asociacion.nombre_asoci, asociacion.nit, representante.nombre_repre, tesorero.nombre, (fiscal.nombre)nomfiscal FROM (((" . $this->table_name . " LEFT JOIN representante ON asociacion.fk_representante = representante.id_representante)LEFT JOIN tesorero ON asociacion.fk_tesorero = tesorero.id_tesorero)LEFT JOIN fiscal ON asociacion.fk_fiscal = fiscal.id_fiscal ) ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute(array());
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($row);
        return $row;
    }

    //insertar del formulario model insert
    function create()
    {
        $query = "INSERT INTO " . $this->table_name . " SET nombre_asoci=?, nit=?, fk_representante=?, fk_tesorero=?, fk_fiscal=? ";
        $stmt = $this->conn->prepare($query);
        $this->nombre_asoci = htmlspecialchars(strip_tags($this->nombre_asoci));
        $this->nit = htmlspecialchars(strip_tags($this->nit));
        $this->fk_representante = htmlspecialchars(strip_tags($this->fk_representante));
        $this->fk_tesorero = htmlspecialchars(strip_tags($this->fk_tesorero));
        $this->fk_fiscal = htmlspecialchars(strip_tags($this->fk_fiscal));
        //orden de variables preparadas
        $stmt->bindParam(1, $this->nombre_asoci);
        $stmt->bindParam(2, $this->nit);
        $stmt->bindParam(3, $this->fk_representante);
        $stmt->bindParam(4, $this->fk_tesorero);
        $stmt->bindParam(5, $this->fk_fiscal);
        //validamos la insercion
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    function makeUpdate()
    {
        $query = "UPDATE " . $this->table_name . " SET nombre_asoci=?, nit=?, fk_representante=?, fk_tesorero=?, fk_fiscal=? WHERE id_asociacion = " . $this->id . " ";
        $stmt = $this->conn->prepare($query);
        $this->nombre_asoci = htmlspecialchars(strip_tags($this->nombre_asoci));
        $this->nit = htmlspecialchars(strip_tags($this->nit));
        $this->fk_representante = htmlspecialchars(strip_tags($this->fk_representante));
        $this->fk_tesorero = htmlspecialchars(strip_tags($this->fk_tesorero));
        $this->fk_fiscal = htmlspecialchars(strip_tags($this->fk_fiscal));

        $stmt->bindParam(1, $this->nombre_asoci);
        $stmt->bindParam(2, $this->nit);
        $stmt->bindParam(3, $this->fk_representante);
        $stmt->bindParam(4, $this->fk_tesorero);
        $stmt->bindParam(5, $this->fk_fiscal);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    //eliminamos un registro por medio del id 
    function delete()
    {
        $query = "DELETE FROM " . $this->table_name . " WHERE id_asociacion =  " . $this->data . " ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
