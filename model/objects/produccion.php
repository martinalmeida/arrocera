<?php
class crud
{

    // https://lenguajesdeprogramacion.net/diccionario/diferencia-entre-public-protected-o-private/
    // Conexión a la base de datos y nombre de la tabla
    private $conn;
    private $table_name = "produccion";
    private $table_soc = "registro_socios";
    private $table_var = "variedad_arroz";

    //Propiedades de los objetos
    public $id;
    public $fk_socio;
    public $area_sembrado;
    public $fecha;
    public $fk_variedad;
    public $data;

    // Explicación sobre la función https://www.w3schools.com/php/php_oop_constructor.asp
    public function __construct($db)
    {
        $this->conn = $db;
    }

    //select del combobox
    function select()
    {
        $query = "SELECT * FROM " . $this->table_soc . " ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute(array());
        $row = $stmt->fetchAll(PDO::FETCH_BOTH);
        return $row;
    }

    //select del combobox
    function select2()
    {
        $query = "SELECT * FROM " . $this->table_var . " ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute(array());
        $row = $stmt->fetchAll(PDO::FETCH_BOTH);
        return $row;
    }

    function selectupdate()
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id_produccion  =  " . $this->data . " ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute(array());
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        echo json_encode($row);
        return $row;
    }

    //listar la tabla principal por medio del fetch
    function table()
    {
        $query = " SELECT produccion.id_produccion, registro_socios.nombre_apellido, produccion.area_sembrado, produccion.fecha, variedad_arroz.nombre FROM (( " . $this->table_name . " LEFT JOIN registro_socios ON produccion.fk_socio = registro_socios.id_socios ) LEFT JOIN variedad_arroz ON produccion.fk_variedad = variedad_arroz.id_variedad ) ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute(array());
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($row);
        return $row;
    }

    //insertar del formulario model insert
    function create()
    {
        $query = "INSERT INTO " . $this->table_name . " SET fk_socio=?, area_sembrado=?, fecha=?, fk_variedad=? ";
        $stmt = $this->conn->prepare($query);
        $this->fk_socio = htmlspecialchars(strip_tags($this->fk_socio));
        $this->area_sembrado = htmlspecialchars(strip_tags($this->area_sembrado));
        $this->fecha = htmlspecialchars(strip_tags($this->fecha));
        $this->fk_variedad = htmlspecialchars(strip_tags($this->fk_variedad));
        //orden de variables preparadas
        $stmt->bindParam(1, $this->fk_socio);
        $stmt->bindParam(2, $this->area_sembrado);
        $stmt->bindParam(3, $this->fecha);
        $stmt->bindParam(4, $this->fk_variedad);
        //validamos la insercion
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    function makeUpdate()
    {
        $query = "UPDATE " . $this->table_name . " SET fk_socio=?, area_sembrado=?, fecha=?, fk_variedad=?  WHERE id_produccion = " . $this->id . " ";
        $stmt = $this->conn->prepare($query);
        $this->fk_socio = htmlspecialchars(strip_tags($this->fk_socio));
        $this->area_sembrado = htmlspecialchars(strip_tags($this->area_sembrado));
        $this->fecha = htmlspecialchars(strip_tags($this->fecha));
        $this->fk_variedad = htmlspecialchars(strip_tags($this->fk_variedad));

        $stmt->bindParam(1, $this->fk_socio);
        $stmt->bindParam(2, $this->area_sembrado);
        $stmt->bindParam(3, $this->fecha);
        $stmt->bindParam(4, $this->fk_variedad);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    //eliminamos un registro por medio del id 
    function delete()
    {
        $query = "DELETE FROM " . $this->table_name . " WHERE id_produccion =  " . $this->data . " ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
