<?php
class crud
{

    // https://lenguajesdeprogramacion.net/diccionario/diferencia-entre-public-protected-o-private/
    // Conexión a la base de datos y nombre de la tabla
    private $conn;
    private $table_name = "registro_socios";
    private $table_fin = "fincas";
    private $table_aso = "asociacion";
    private $table_nuc = "nucleo";
    private $table_sub = "subnucleo";

    //Propiedades de los objetos
    public $id;
    public $nombre_apellido;
    public $cedula;
    //public $contrasena;
    public $fk_finca;
    public $telefono;
    public $whatsapp;
    public $fk_asociacion;
    public $fk_nucleo;
    public $fk_sub_nucleo;

    public $data;

    // Explicación sobre la función https://www.w3schools.com/php/php_oop_constructor.asp
    public function __construct($db)
    {
        $this->conn = $db;
    }

    //select del combobox finca
    function select()
    {
        $query = "SELECT * FROM " . $this->table_fin . " ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute(array());
        $row = $stmt->fetchAll(PDO::FETCH_BOTH);
        return $row;
    }

    //select del combobox asociacion
    function select2()
    {
        $query = "SELECT * FROM " . $this->table_aso . " ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute(array());
        $row = $stmt->fetchAll(PDO::FETCH_BOTH);
        return $row;
    }

    //select del combobox nucleo
    function select3()
    {
        $query = "SELECT * FROM " . $this->table_nuc . " ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute(array());
        $row = $stmt->fetchAll(PDO::FETCH_BOTH);
        return $row;
    }

    //select del combobox subnucleo
    function select4()
    {
        $query = "SELECT * FROM " . $this->table_sub . " ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute(array());
        $row = $stmt->fetchAll(PDO::FETCH_BOTH);
        return $row;
    }

    function selectupdate()
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id_socios  =  " . $this->data . " ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute(array());
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        echo json_encode($row);
        return $row;
    }

    //listar la tabla principal por medio del fetch
    function table()
    {
        $query = " SELECT registro_socios.id_socios, registro_socios.nombre_apellido, registro_socios.cedula, fincas.nombre_finca, registro_socios.telefono, registro_socios.whatsapp, registro_socios.correo, asociacion.nombre_asoci, (nucleo.nombre)nucle, (subnucleo.nombre)sub FROM (((( " . $this->table_name . " LEFT JOIN fincas ON registro_socios.fk_finca = fincas.id_finca ) LEFT JOIN asociacion ON registro_socios.fk_asociacion = asociacion.id_asociacion ) LEFT JOIN nucleo ON registro_socios.fk_nucleo = nucleo.id_nucleo ) LEFT JOIN subnucleo ON registro_socios.fk_sub_nucleo = subnucleo.id_subnucleo ) ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute(array());
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($row);
        return $row;
    }

    //insertar del formulario model insert
    function create()
    {
        $query = "INSERT INTO " . $this->table_name . " SET nombre_apellido=?, cedula=?, fk_finca=?, telefono=?, whatsapp=?, correo=?, fk_asociacion=?, fk_nucleo=?, fk_sub_nucleo=? ";
        $stmt = $this->conn->prepare($query);
        $this->nombre_apellido = htmlspecialchars(strip_tags($this->nombre_apellido));
        $this->cedula = htmlspecialchars(strip_tags($this->cedula));
        $this->fk_finca = htmlspecialchars(strip_tags($this->fk_finca));
        $this->telefono = htmlspecialchars(strip_tags($this->telefono));
        $this->whatsapp = htmlspecialchars(strip_tags($this->whatsapp));
        $this->correo = htmlspecialchars(strip_tags($this->correo));
        $this->fk_asociacion = htmlspecialchars(strip_tags($this->fk_asociacion));
        $this->fk_nucleo = htmlspecialchars(strip_tags($this->fk_nucleo));
        $this->fk_sub_nucleo = htmlspecialchars(strip_tags($this->fk_sub_nucleo));
        //orden de variables preparadas
        $stmt->bindParam(1, $this->nombre_apellido);
        $stmt->bindParam(2, $this->cedula);
        $stmt->bindParam(3, $this->fk_finca);
        $stmt->bindParam(4, $this->telefono);
        $stmt->bindParam(5, $this->whatsapp);
        $stmt->bindParam(6, $this->correo);
        $stmt->bindParam(7, $this->fk_asociacion);
        $stmt->bindParam(8, $this->fk_nucleo);
        $stmt->bindParam(9, $this->fk_sub_nucleo);
        //validamos la insercion
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    function makeUpdate()
    {
        $query = "UPDATE " . $this->table_name . " SET nombre_apellido=?, cedula=?, fk_finca=?, telefono=?, whatsapp=?, correo=?, fk_asociacion=?, fk_nucleo=?, fk_sub_nucleo=? WHERE id_socios = " . $this->id . " ";
        $stmt = $this->conn->prepare($query);
        $this->nombre_apellido = htmlspecialchars(strip_tags($this->nombre_apellido));
        $this->cedula = htmlspecialchars(strip_tags($this->cedula));
        $this->fk_finca = htmlspecialchars(strip_tags($this->fk_finca));
        $this->telefono = htmlspecialchars(strip_tags($this->telefono));
        $this->whatsapp = htmlspecialchars(strip_tags($this->whatsapp));
        $this->correo = htmlspecialchars(strip_tags($this->correo));
        $this->fk_asociacion = htmlspecialchars(strip_tags($this->fk_asociacion));
        $this->fk_nucleo = htmlspecialchars(strip_tags($this->fk_nucleo));
        $this->fk_sub_nucleo = htmlspecialchars(strip_tags($this->fk_sub_nucleo));

        $stmt->bindParam(1, $this->nombre_apellido);
        $stmt->bindParam(2, $this->cedula);
        $stmt->bindParam(3, $this->fk_finca);
        $stmt->bindParam(4, $this->telefono);
        $stmt->bindParam(5, $this->whatsapp);
        $stmt->bindParam(6, $this->correo);
        $stmt->bindParam(7, $this->fk_asociacion);
        $stmt->bindParam(8, $this->fk_nucleo);
        $stmt->bindParam(9, $this->fk_sub_nucleo);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    //eliminamos un registro por medio del id 
    function delete()
    {
        $query = "DELETE FROM " . $this->table_name . " WHERE id_socios =  " . $this->data . " ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
