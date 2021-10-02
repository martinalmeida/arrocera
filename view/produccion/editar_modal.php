<div class="modal fade" id="update_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title text-white" id="exampleModalLabel">Editar Produccion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formulario_update" method="POST">
                    <div class="mb-3">
                        <input type="hidden" name="id_up" id="id_up" value="">
                         <label for="exampleInputPassword1" class="form-label"><strong>Nombre de Socio:</strong></label>
                        <select class="form-select" aria-label="Default select example" id="fk_socio_up" name="fk_socio_up" required>
                            <option selected>Seleccione la Vereda</option>
                            <?php
                            $result = $crud->select();
                            foreach ($result as $ver) :
                                echo "<option  value='$ver[id_socios]'> $ver[nombre_apellido]</option>";
                            endforeach
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label"><strong>Area Sembrado:</strong></label>
                        <input type="text" class="form-control" id="area_sembrado_up" name="area_sembrado_up" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label"><strong>Fecha:</strong></label>
                        <input type="date" class="form-control" id="fecha_up" name="fecha_up" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label"><strong>Variedad de Arroz:</strong></label>
                        <select class="form-select" aria-label="Default select example" id="fk_variedad_up" name="fk_variedad_up" required>
                            <option selected>Seleccione la Vereda</option>
                            <?php
                            $result = $crud->select2();
                            foreach ($result as $ver2) :
                                echo "<option  value='$ver2[id_variedad]'> $ver2[nombre]</option>";
                            endforeach
                            ?>
                        </select>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar <i class="fas fa-times"></i></button>
                <button type="submit" class="btn btn-success">Guardar <i class="fas fa-save"></i></button>
                </form>
            </div>
        </div>
    </div>
</div>