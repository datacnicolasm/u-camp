<div class="modal fade show" id="modal-create-actividad" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form class="form-create-lesson" method="POST" action="{{ route('create-assignment') }}">
                @csrf <!-- Token CSRF para protección -->
                <div class="modal-header">
                    <h5 class="m-0 font-weight-bold">Crear actividad</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Para crear una actividad debes diligenciar la siguiente información:</p>

                    <div class="form-group">
                        <label class="mb-2">Tipo de actividad</label>
                        <select class="form-control form-control-sm" id="tipo_actividad" name="tipo_actividad">
                            <option value="dian">DIAN</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="mb-2">Grupo</label>
                        <select class="form-control form-control-sm" id="grupo_id" name="grupo_id">
                            <!-- Listado de grupos -->
                            <?php $list_groups = \App\Models\Group::getGroupsUser(Auth::user()); ?>
                            @if ($list_groups)
                                @foreach ($list_groups as $group)
                                    <option value="{{ $group->id }}">{{ $group->name }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="mb-2">Titulo de la actividad</label>
                        <input type="text" class="form-control form-control-sm" id="titulo_actividad" name="titulo_actividad" placeholder="Titulo de la actividad" required>
                    </div>

                    <div class="form-group">
                        <label class="mb-2">Orden</label>
                        <input type="number" class="form-control form-control-sm" id="orden_actividad" name="orden" placeholder="0">
                        <span class="text-muted form-text text-sm mt-1">Este es el orden en el que aparece la actividad
                            en el grupo de estudiantes.</span>
                    </div>

                    <div class="form-group">
                        <label class="mb-2">Puntos XP</label>
                        <input type="number" class="form-control form-control-sm" id="puntos_actividad" name="puntos_xp" placeholder="0">
                        <span class="text-muted form-text text-sm mt-1">La cantidad de puntos que obtiene el estudiante
                            por aprobar la actividad.</span>
                    </div>

                    <div class="form-group">
                        <label>Vencimiento:</label>
                        <div class="form-group">
                            <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                                <input type="text" class="form-control form-control-sm datetimepicker-input" id="vencimiento_actividad" name="vencimiento" data-target="#datetimepicker1"/>
                                <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                            <span class="text-muted form-text text-sm mt-1">Seleccione la fecha y hora de vencimiento para la actividad.</span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" id="btn-create-lesson" class="btn btn-sm btn-ucamp">Crear actividad</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

