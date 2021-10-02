<?php
class crud
{

    // https://lenguajesdeprogramacion.net/diccionario/diferencia-entre-public-protected-o-private/
    // Conexión a la base de datos y nombre de la tabla
    private $conn;
    private $table_soc = "registro_socios";
    private $table_pro = "produccion";
    //private $table_var = "variedad_arroz";

    //Propiedades de los objetos
    public $id;

    // Explicación sobre la función https://www.w3schools.com/php/php_oop_constructor.asp
    public function __construct($db)
    {
        $this->conn = $db;
    }

    //select del del socio en reportes
    function select()
    {
        $query = "SELECT * FROM " . $this->table_soc . " ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute(array());
        $row = $stmt->fetchAll(PDO::FETCH_BOTH);
        return $row;
    }

    //select de produccion en reportes
    function select2()
    {
        $query = "SELECT * FROM " . $this->table_pro . " ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute(array());
        $row = $stmt->fetchAll(PDO::FETCH_BOTH);
        return $row;
    }

    function selectreport()
    {
         $query = " SELECT registro_socios.id_socios, registro_socios.nombre_apellido, registro_socios.cedula, fincas.nombre_finca, registro_socios.telefono, registro_socios.whatsapp, registro_socios.correo, asociacion.nombre_asoci, (nucleo.nombre)nucle, (subnucleo.nombre)sub FROM (((( " . $this->table_soc . " LEFT JOIN fincas ON registro_socios.fk_finca = fincas.id_finca ) LEFT JOIN asociacion ON registro_socios.fk_asociacion = asociacion.id_asociacion ) LEFT JOIN nucleo ON registro_socios.fk_nucleo = nucleo.id_nucleo ) LEFT JOIN subnucleo ON registro_socios.fk_sub_nucleo = subnucleo.id_subnucleo ) ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute(array());
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }

   
}
