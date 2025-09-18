<!-- Modal -->
<div class="modal fade" id="modalUpdate" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="formUpdate" method="post">
        @csrf
        <input type="hidden" id="method_field" name="_method">
        <div class="modal-header">
          <h4 class="modal-title fs-5" id="modalTitle">Nuevo registro</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row">

            <div class="col-lg-6">
              <div class="form-group mb-3">
                <label for="documento_tipo_codigo" class="form-label">Documento Tipo<span class="text-danger">*</span></label>
                <select name="documento_tipo_codigo" id="documento_tipo_codigo" class="form-select" required></select>
                <div class="invalid-feedback"></div>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="form-group mb-3">
                <label for="numero_documento" class="form-label">Numero de Documento <span class="text-danger">*</span></label>
                <input type="text" id="numero_documento" name="numero_documento" class="form-control" required>
                <div class="invalid-feedback"></div>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="form-group mb-3">
                <label for="razon_social" class="form-label">Razon Social <span class="text-danger">*</span></label>
                <input type="text" id="razon_social" name="razon_social" class="form-control" required>
                <div class="invalid-feedback"></div>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="form-group mb-3">
                <label for="direccion" class="form-label">Direccion</label>
                <input type="text" id="direccion" name="direccion" class="form-control">
                <div class="invalid-feedback"></div>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="form-group mb-3">
                <label for="telefono" class="form-label">Telefono</label>
                <input type="text" id="telefono" name="telefono" class="form-control">
                <div class="invalid-feedback"></div>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="form-group mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" id="email" name="email" class="form-control">
                <div class="invalid-feedback"></div>
              </div>
            </div>

          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" id="btnSubmit" class="btn btn-primary">Enviar</button>
        </div>
      </form>
    </div>
  </div>
</div>