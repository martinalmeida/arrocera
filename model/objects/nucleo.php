<?php
class crud
{

    // https://lenguajesdeprogramacion.net/diccionario/diferencia-entre-public-protected-o-private/
    // Conexión a la base de datos y nombre de la tabla
    private $conn;
    private $table_name = "nucleo";
    private $table_res = "responsable";
    private $table_tri = "trilladores";

    //Propiedades de los objetos
    public $id;
    public $nombre;
    public $fk_responsable;
    public $fk_trillador;
    public $observaciones;
    public $data;

    // Explicación sobre la función https://www.w3schools.com/php/php_oop_constructor.asp
    public function __construct($db)
    {
        $this->conn = $db;
    }

    //select del combobox representante
    function select()
    {
        $query = "SELECT * FROM " . $this->table_res . " ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute(array());
        $row = $stmt->fetchAll(PDO::FETCH_BOTH);
        return $row;
    }

    //select del combobox tesorero
    function select2()
    {
        $query = "SELECT * FROM " . $this->table_tri . " ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute(array());
        $row = $stmt->fetchAll(PDO::FETCH_BOTH);
        return $row;
    }

    function selectupdate()
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id_nucleo  =  " . $this->data . " ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute(array());
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        echo json_encode($row);
        return $row;
    }

    //listar la tabla principal por medio del fetch
    function table()
    {
        $query = " SELECT nucleo.id_nucleo, nucleo.nombre, (trilladores.nombre)tri, (responsable.nombre)res, nucleo.observaciones FROM (( " . $this->table_name . " LEFT JOIN responsable ON nucleo.fk_responsable = responsable.id_responsable ) LEFT JOIN trilladores ON nucleo.fk_trillador = trilladores.id_trillador ) ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute(array());
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($row);
        return $row;
    }

    //insertar del formulario model insert
    function create()
    {
        $query = "INSERT INTO " . $this->table_name . " SET nombre=?, fk_responsable=?, fk_trillador=?, observaciones=? ";
        $stmt = $this->conn->prepare($query);
        $this->nombre = htmlspecialchars(strip_tags($this->nombre));
        $this->fk_responsable = htmlspecialchars(strip_tags($this->fk_responsable));
        $this->fk_trillador = htmlspecialchars(strip_tags($this->fk_trillador));
        $this->observaciones = htmlspecialchars(strip_tags($this->observaciones));
        //orden de variables preparadas
        $stmt->bindParam(1, $this->nombre);
        $stmt->bindParam(2, $this->fk_responsable);
        $stmt->bindParam(3, $this->fk_trillador);
        $stmt->bindParam(4, $this->observaciones);
        //validamos la insercion
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    function makeUpdate()
    {
        $query = "UPDATE " . $this->table_name . " SET nombre=?, fk_responsable=?, fk_trillador=?, observaciones=? WHERE id_nucleo = " . $this->id . " ";
        $stmt = $this->conn->prepare($query);
        $this->nombre = htmlspecialchars(strip_tags($this->nombre));
        $this->fk_responsable = htmlspecialchars(strip_tags($this->fk_responsable));
        $this->fk_trillador = htmlspecialchars(strip_tags($this->fk_trillador));
        $this->observaciones = htmlspecialchars(strip_tags($this->observaciones));

        $stmt->bindParam(1, $this->nombre);
        $stmt->bindParam(2, $this->fk_responsable);
        $stmt->bindParam(3, $this->fk_trillador);
        $stmt->bindParam(4, $this->observaciones);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    //eliminamos un registro por medio del id 
    function delete()
    {
        $query = "DELETE FROM " . $this->table_name . " WHERE id_nucleo =  " . $this->data . " ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
