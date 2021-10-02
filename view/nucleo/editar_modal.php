<div class="modal fade" id="update_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title text-white" id="exampleModalLabel">Editar Nucleo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formulario_update" method="POST">
                    <div class="mb-3">
                        <input type="hidden" name="id_up" id="id_up" value="">
                        <label for="exampleInputEmail1" class="form-label"><strong>Nombre de Nucleo:</strong></label>
                        <input type="text" class="form-control" placeholder="Ingresa el nombre de la asociacion" id="nombre_up" name="nombre_up" required>
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label"><strong>Responsable:</strong></label>
                        <select class="form-select" aria-label="Default select example" id="fk_responsable_up" name="fk_responsable_up" required>
                            <option selected>Seleccione la Responsable</option>
                            <?php
                            $result = $crud->select();
                            foreach ($result as $ver) :
                                echo "<option  value='$ver[id_responsable]'> $ver[nombre]</option>";
                            endforeach
                            ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label"><strong>Trillador:</strong></label>
                        <select class="form-select" aria-label="Default select example" id="fk_trillador_up" name="fk_trillador_up" required>
                            <option selected>Seleccione el Trillador</option>
                            <?php
                            $result = $crud->select2();
                            foreach ($result as $ver2) :
                                echo "<option  value='$ver2[id_trillador]'> $ver2[nombre]</option>";
                            endforeach
                            ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label"><strong>Observaciones:</strong></label>
                        <textarea class="form-control" name="observaciones_up" id="observaciones_up" required></textarea>
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