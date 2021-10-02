<?php
include_once '../../config/database.php';
include_once '../../model/objects/asociacion.php';

$database = new Database();
$db = $database->getConnection();
$crud = new crud($db);
?>
<div class="modal fade" id="insert" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="exampleModalLabel">Insertar Asociacion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formulario_insert" method="POST">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label"><strong>Nombre de Asociacion:</strong></label>
                        <input type="text" class="form-control" placeholder="Ingresa el nombre de la asociacion" id="nombre_asoci" name="nombre_asoci" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label"><strong>Nit:</strong></label>
                        <input type="number" class="form-control" id="nit" name="nit" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label"><strong>Representante:</strong></label>
                        <select class="form-select" aria-label="Default select example" id="fk_representante" name="fk_representante" required>
                            <option selected>Seleccione la Representante</option>
                            <?php
                            $result = $crud->select();
                            foreach ($result as $ver) :
                                echo "<option  value='$ver[id_representante]'> $ver[nombre_repre]</option>";
                            endforeach
                            ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label"><strong>Tesorero:</strong></label>
                        <select class="form-select" aria-label="Default select example" id="fk_tesorero" name="fk_tesorero" required>
                            <option selected>Seleccione el Tesorero</option>
                            <?php
                            $result = $crud->select2();
                            foreach ($result as $ver2) :
                                echo "<option  value='$ver2[id_tesorero]'> $ver2[nombre]</option>";
                            endforeach
                            ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label"><strong>Fiscal:</strong></label>
                        <select class="form-select" aria-label="Default select example" id="fk_fiscal" name="fk_fiscal" required>
                            <option selected>Seleccione el Fiscal</option>
                            <?php
                            $result = $crud->select3();
                            foreach ($result as $ver3) :
                                echo "<option  value='$ver3[id_fiscal]'> $ver3[nombre]</option>";
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