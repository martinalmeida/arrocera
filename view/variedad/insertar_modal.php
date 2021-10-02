<div class="modal fade" id="insert" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="exampleModalLabel">Insertar Variedad de Arroz</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formulario_insert" method="POST">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label"><strong>Nombre de Variedad de Arroz:</strong></label>
                        <input type="text" class="form-control" placeholder="Ingresa el nombre de la variedad" id="nombre" name="nombre" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label"><strong>Periodo Vegetativo (Dias):</strong></label>
                        <input type="number" class="form-control" id="periodo_vegetal" name="periodo_vegetal" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label"><strong>Rendimiento:</strong></label>
                        <input type="number" class="form-control" id="rendimiento" name="rendimiento" required>
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