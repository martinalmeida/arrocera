<?php
include_once '../../config/database.php';
include_once '../../model/objects/subnucleo.php';

$database = new Database();
$db = $database->getConnection();
$crud = new crud($db);
?>
<div class="modal fade" id="insert" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="exampleModalLabel">Insertar Subnucleo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formulario_insert" method="POST">

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label"><strong>Nombre de Subnucleo:</strong></label>
                        <input type="text" class="form-control" placeholder="Ingresa el nombre de la subnucleo" id="nombre" name="nombre" required>
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label"><strong>Responsable:</strong></label>
                        <select class="form-select" aria-label="Default select example" id="fk_referente_sub" name="fk_referente_sub" required>
                            <option selected>Seleccione la Referente</option>
                            <?php
                            $result = $crud->select();
                            foreach ($result as $ver) :
                                echo "<option  value='$ver[id_referente]'> $ver[nombre]</option>";
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