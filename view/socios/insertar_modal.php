<?php
include_once '../../config/database.php';
include_once '../../model/objects/socios.php';

$database = new Database();
$db = $database->getConnection();
$crud = new crud($db);
?>
<div class="modal fade" id="insert" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="exampleModalLabel">Insertar Socio</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formulario_insert" method="POST">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label"><strong>Nombre y Apelidos:</strong></label>
                        <input type="text" class="form-control" placeholder="Ingresa el nombre de la asociacion" id="nombre_apellido" name="nombre_apellido" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label"><strong>Cedula:</strong></label>
                        <input type="number" class="form-control" id="cedula" name="cedula" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label"><strong>Finca:</strong></label>
                        <select class="form-select" aria-label="Default select example" id="fk_finca" name="fk_finca" required>
                            <option selected>Seleccione la Finca</option>
                            <?php
                            $result = $crud->select();
                            foreach ($result as $ver) :
                                echo "<option  value='$ver[id_finca]'> $ver[nombre_finca]</option>";
                            endforeach
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label"><strong>Telefono:</strong></label>
                        <input type="number" class="form-control" id="telefono" name="telefono" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label"><strong>Whatsapp:</strong></label>
                        <input type="number" class="form-control" id="whatsapp" name="whatsapp" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label"><strong>Correo Electronico:</strong></label>
                        <input type="email" class="form-control" aria-describedby="emailHelp" id="correo" name="correo" required>
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label"><strong>Asociacion:</strong></label>
                        <select class="form-select" aria-label="Default select example" id="fk_asociacion" name="fk_asociacion" required>
                            <option selected>Seleccione el Asociacion</option>
                            <?php
                            $result = $crud->select2();
                            foreach ($result as $ver2) :
                                echo "<option  value='$ver2[id_asociacion]'> $ver2[nombre_asoci]</option>";
                            endforeach
                            ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label"><strong>Nucleo:</strong></label>
                        <select class="form-select" aria-label="Default select example" id="fk_nucleo" name="fk_nucleo" required>
                            <option selected>Seleccione el Nucleo</option>
                            <?php
                            $result = $crud->select3();
                            foreach ($result as $ver3) :
                                echo "<option  value='$ver3[id_nucleo]'> $ver3[nombre]</option>";
                            endforeach
                            ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label"><strong>Subnucleo:</strong></label>
                        <select class="form-select" aria-label="Default select example" id="fk_sub_nucleo" name="fk_sub_nucleo" required>
                            <option selected>Seleccione el Subnucleo</option>
                            <?php
                            $result = $crud->select4();
                            foreach ($result as $ver4) :
                                echo "<option  value='$ver4[id_subnucleo]'> $ver4[nombre]</option>";
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