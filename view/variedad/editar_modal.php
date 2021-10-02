<div class="modal fade" id="update_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title text-white" id="exampleModalLabel">Editar Variedad de Arroz</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formulario_update" method="POST">
                    <div class="mb-3">
                        <input type="hidden" name="id_up" id="id_up" value="">
                        <label for="exampleInputEmail1" class="form-label"><strong>Nombre de Variedad de Arroz:</strong></label>
                        <input type="text" class="form-control" placeholder="Ingresa el nombre de la variedad" id="nombre_up" name="nombre_up" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label"><strong>Periodo Vegetativo (Dias):</strong></label>
                        <input type="number" class="form-control" id="periodo_vegetal_up" name="periodo_vegetal_up" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label"><strong>Rendimiento:</strong></label>
                        <input type="number" class="form-control" id="rendimiento_up" name="rendimiento_up" required>
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