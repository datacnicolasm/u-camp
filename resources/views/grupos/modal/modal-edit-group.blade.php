<div class="modal fade" data-idgroup="0" id="edit-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="m-0 font-weight-bold">Editar grupo de clase</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label>Nombre del grupo</label>
                            <input id="name"type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-12">
                        <label>Color del grupo</label>
                        <div class="my-2 content-colors">
                            <div class="color-circle">
                                <div class="color" data-hexcolor="#009fff" style="background-color: #009fff"></div>
                            </div>
                            <div class="color-circle">
                                <div class="color" data-hexcolor="#00ff58" style="background-color: #00ff58"></div>
                            </div>
                            <div class="color-circle">
                                <div class="color" data-hexcolor="#ff6000" style="background-color: #ff6000"></div>
                            </div>
                            <div class="color-circle">
                                <div class="color" data-hexcolor="#ff1818" style="background-color: #ff1818"></div>
                            </div>
                            <div class="color-circle">
                                <div class="color" data-hexcolor="#ff5ecf" style="background-color: #ff5ecf"></div>
                            </div>
                            <div class="color-circle">
                                <div class="color" data-hexcolor="#b531ff" style="background-color: #b531ff"></div>
                            </div>
                        </div>
                        <input id="color-group" type="text" class="form-control" style="display: none;">
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Cancelar</button>
                <button id="save-modal" type="button" class="btn btn-sm btn-primary">Guardar
                    cambios</button>
            </div>
        </div>
    </div>
</div>
