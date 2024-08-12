<div class="modal fade" id="crear-link" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <!-- -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- -->
            <div class="modal-body">
                <div class="row">
                    <div class="py-1 px-3 col-12">
                        <h5 class="mb-3 font-weight-bold">Crear link de invitación</h5>
                        <p>Los enlaces de invitación se utilizan para que otros usuarios se puedan unir a tus grupos de
                            clase.</p>
                    </div>
                    <div class="py-1 px-3 col-12">
                        <!-- Listado de grupos -->
                        @php
                            $list_groups = \App\Models\Group::getGroupsUser(Auth::user());
                            $valid_btn = $list_groups && count($list_groups) > 0 ? 'true' : 'false';
                        @endphp

                        @if ($list_groups && count($list_groups) > 0)

                            <div class="form-group">
                                <label>Seleccione el grupo</label>

                                <select id="select-grupo" class="form-control">
                                    @foreach ($list_groups as $group)
                                        <option value="{{ $group->id }}">{{ $group->name }}</option>
                                    @endforeach
                                </select>

                            </div>
                        @else
                            <div class="callout callout-danger">
                                <p>Debes crear primero un grupo para invitar estudiantes</p>
                            </div>
                        @endif
                    </div>

                    <div class="py-1 px-3 col-12 generate-link">
                        <p>El siguiente link debe ser enviado a los estudiantes para que hagan parte del grupo de clase.</p>
                    
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-link"></i></span>
                            </div>
                            <input type="text" id="link-generate" class="form-control" value="Link" readonly>
                        </div>
                        <small class="form-text text-muted">Debe copiar este link (Ctrl + C).</small>
                    </div>
                </div>
            </div>

            <!-- -->
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Cancelar</button>
                <button data-status="{{ $valid_btn }}" id="btn-crear-link" type="button"
                    class="btn btn-sm btn-primary">
                    Crear link
                </button>
            </div>
        </div>
    </div>
</div>
