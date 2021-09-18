<?php
include_once '../../config/database.php';
include_once '../../model/objects/fincas.php';

$database = new Database();
$db = $database->getConnection();
$crud = new crud($db);
?>
<div class="modal fade" id="insert" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="exampleModalLabel">Insertar Finca</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formulario_insert" method="POST">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label"><strong>Nombre de Finca:</strong></label>
                        <input type="text" class="form-control" placeholder="Ingresa el nombre de la finca" id="nombre_finca" name="nombre_finca" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label"><strong>Area (Hectareas):</strong></label>
                        <input type="number" class="form-control" id="area" name="area" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label"><strong>Vereda:</strong></label>
                        <select class="form-select" aria-label="Default select example" id="fk_vereda" name="fk_vereda" required>
                            <option selected>Seleccione la Vereda</option>
                            <?php
                            $result = $crud->select();
                            foreach ($result as $ver) :
                                echo "<option  value='$ver[id_vereda]'> $ver[nombre_vereda]</option>";
                            endforeach
                            ?>
                        </select>
                    </div>

                    <div id="alerta"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar <i class="fas fa-times"></i></button>
                <button type="submit" class="btn btn-primary">Guardar <i class="fas fa-save"></i></button>
                </form>
            </div>
        </div>
    </div>
</div>