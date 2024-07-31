<div class="content-panel panel-tabs">
    <ul>
        <li><a href="#tabs-1">Estado de Situacion Financiera</a></li>
        <li><a href="#tabs-2">Estado de Resultados Integral</a></li>
    </ul>
    <div class="content-tab-panel" id="tabs-1">
        <p class="subtle-title text-center my-1">EMPRESAS COMERCIALES DE COLOMBIA S.A.S</p>
        <p class="subtle-title text-center my-1">Nit: 900.000.001</p>
        <p class="subtle-title text-center my-1"><strong>Estado de Situación Financiera</strong></p>
        <p class="subtle-title text-center my-1">Saldos a 31 de Diciembre de {{ $lesson->workshop->year_form }}</p>

        <table class="table financial-table">
            <thead>
                <tr>
                    <th colspan="2" class="text-right">Nota</th>
                    <th colspan="2" class="text-right">Valor (COP)</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="clase-puc" colspan="4"><strong>Activos</strong></td>
                </tr>
                @if($lesson->workshop->statements)
                    <?php $totalValue_corrientes = 0; ?>
                    @foreach($lesson->workshop->statements as $line)
                        @if($line->entry->type_eeff == "financial-position" && $line->entry->type_group == "assets" && $line->entry->sub_type_group == "current-assets")
                            <?php $totalValue_corrientes += $line->value; ?>
                            <tr class="line-item-statement">
                                <td class="name_es">{{$line->entry->name_es}}</td>
                                <td width="10%">(1)</td>
                                <td class="text-right"><?php echo number_format($line->value, 0, '', '.') ?></td>
                                <td width="20px" class="content-btn-mark-line px-0">
                                    <i class="fas fa-thumbtack"></i>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                @endif
                <tr>
                    <td class="total-eeff" colspan="2"><strong>Total Activos Corrientes</strong></td>
                    <td class="text-right"><strong><?php echo number_format($totalValue_corrientes, 0, '', '.') ?></strong></td>
                    <td width="20px" class="content-btn-mark-line px-0">
                        <i class="fas fa-thumbtack"></i>
                    </td>
                </tr>
                @if($lesson->workshop->statements)
                    <?php $totalValue_nocorrientes = 0; ?>
                    @foreach($lesson->workshop->statements as $line)
                        @if($line->entry->type_eeff == "financial-position" && $line->entry->type_group == "assets" && $line->entry->sub_type_group == "non-current-assets")
                            <?php $totalValue_nocorrientes += $line->value; ?>
                            <tr class="line-item-statement">
                                <td class="name_es">{{$line->entry->name_es}}</td>
                                <td width="10%">(1)</td>
                                <td class="text-right"><?php echo number_format($line->value, 0, '', '.') ?></td>
                                <td width="20px" class="content-btn-mark-line px-0">
                                    <i class="fas fa-thumbtack"></i>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                @endif
                <tr>
                    <td class="total-eeff" colspan="2"><strong>Total Activos No Corrientes</strong></td>
                    <td class="text-right"><strong><?php echo number_format($totalValue_nocorrientes, 0, '', '.') ?></strong></td>
                    <td width="20px" class="content-btn-mark-line px-0">
                        <i class="fas fa-thumbtack"></i>
                    </td>
                </tr>
                <tr>
                    <td class="total-eeff" colspan="2"><strong>Total Activos</strong></td>
                    <td class="text-right"><strong><?php echo number_format($totalValue_nocorrientes + $totalValue_corrientes, 0, '', '.') ?></strong></td>
                    <td width="20px" class="content-btn-mark-line px-0">
                        <i class="fas fa-thumbtack"></i>
                    </td>
                </tr>
                <tr>
                    <td class="clase-puc" colspan="4"><strong>Pasivos</strong></td>
                </tr>
                @if($lesson->workshop->statements)
                    <?php $liabilities_corrientes = 0; ?>
                    @foreach($lesson->workshop->statements as $line)
                        @if($line->entry->type_eeff == "financial-position" && $line->entry->type_group == "liabilities" && $line->entry->sub_type_group == "current-liabilities")
                            <?php $liabilities_corrientes += $line->value; ?>
                            <tr class="line-item-statement">
                                <td class="name_es">{{$line->entry->name_es}}</td>
                                <td width="10%">(1)</td>
                                <td class="text-right"><?php echo number_format($line->value, 0, '', '.') ?></td>
                                <td width="20px" class="content-btn-mark-line px-0">
                                    <i class="fas fa-thumbtack"></i>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                @endif
                <tr>
                    <td class="total-eeff" colspan="2"><strong>Total Pasivos Corrientes</strong></td>
                    <td class="text-right"><strong><?php echo number_format($liabilities_corrientes, 0, '', '.') ?></strong></td>
                    <td width="20px" class="content-btn-mark-line px-0">
                        <i class="fas fa-thumbtack"></i>
                    </td>
                </tr>
                @if($lesson->workshop->statements)
                    <?php $liabilities_nocorrientes = 0; ?>
                    @foreach($lesson->workshop->statements as $line)
                        @if($line->entry->type_eeff == "financial-position" && $line->entry->type_group == "liabilities" && $line->entry->sub_type_group == "non-current-liabilities")
                            <?php $liabilities_nocorrientes += $line->value; ?>
                            <tr class="line-item-statement">
                                <td class="name_es">{{$line->entry->name_es}}</td>
                                <td width="10%">(1)</td>
                                <td class="text-right"><?php echo number_format($line->value, 0, '', '.') ?></td>
                                <td width="20px" class="content-btn-mark-line px-0">
                                    <i class="fas fa-thumbtack"></i>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                @endif
                <tr>
                    <td class="total-eeff" colspan="2"><strong>Total Pasivos No Corrientes</strong></td>
                    <td class="text-right"><strong><?php echo number_format($liabilities_nocorrientes, 0, '', '.') ?></strong></td>
                    <td width="20px" class="content-btn-mark-line px-0">
                        <i class="fas fa-thumbtack"></i>
                    </td>
                </tr>
                <tr>
                    <td class="total-eeff" colspan="2"><strong>Total Pasivos</strong></td>
                    <td class="text-right"><strong><?php echo number_format($liabilities_nocorrientes + $liabilities_corrientes, 0, '', '.') ?></strong></td>
                    <td width="20px" class="content-btn-mark-line px-0">
                        <i class="fas fa-thumbtack"></i>
                    </td>
                </tr>
                <tr>
                    <td class="clase-puc" colspan="4"><strong>Patrimonio</strong></td>
                </tr>
                @if($lesson->workshop->statements)
                    <?php $total_equity = 0; ?>
                    @foreach($lesson->workshop->statements as $line)
                        @if($line->entry->type_eeff == "financial-position" && $line->entry->type_group == "equity")
                            <?php $total_equity += $line->value; ?>
                            <tr class="line-item-statement">
                                <td class="name_es">{{$line->entry->name_es}}</td>
                                <td width="10%">(1)</td>
                                <td class="text-right"><?php echo number_format($line->value, 0, '', '.') ?></td>
                                <td width="20px" class="content-btn-mark-line px-0">
                                    <i class="fas fa-thumbtack"></i>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                @endif
                <tr>
                    <td class="total-eeff" colspan="2"><strong>Total Patrimonio</strong></td>
                    <td class="text-right"><strong><?php echo number_format($total_equity, 0, '', '.') ?></strong></td>
                    <td width="20px" class="content-btn-mark-line px-0">
                        <i class="fas fa-thumbtack"></i>
                    </td>
                </tr>
                <tr>
                    <td class="total-eeff" colspan="2"><strong>Total Pasivos y Patrimonio</strong></td>
                    <td class="text-right"><strong><?php echo number_format($liabilities_nocorrientes + $liabilities_corrientes + $total_equity, 0, '', '.') ?></strong></td>
                    <td width="20px" class="content-btn-mark-line px-0">
                        <i class="fas fa-thumbtack"></i>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="content-tab-panel" id="tabs-2">
        <p class="subtle-title text-center my-1">EMPRESAS COMERCIALES DE COLOMBIA S.A.S</p>
        <p class="subtle-title text-center my-1">Nit: 900.000.001</p>
        <p class="subtle-title text-center my-1"><strong>Estado de Resultados Integral</strong></p>
        <p class="subtle-title text-center my-1">Saldos a 31 de Diciembre de {{ $lesson->workshop->year_form }}</p>

        <table class="table financial-table">
            <thead>
                <tr>
                    <th colspan="2" class="text-right">Nota</th>
                    <th colspan="2" class="text-right">Valor (COP)</th>
                </tr>
            </thead>
            <tbody>
                @if($lesson->workshop->statements)
                    <?php $utilidad_generada = 0 ?>
                    @foreach($lesson->workshop->statements as $line)
                        @if($line->entry->type_eeff == "comprehensive-income" && $line->entry->type_group == "gross-profit")
                            <tr class="line-item-statement">
                                <td class="name_es">{{$line->entry->name_es}}</td>
                                <td width="10%">(1)</td>
                                <td class="text-right"><?php echo number_format($line->value, 0, '', '.') ?></td>
                                <td width="20px" class="content-btn-mark-line px-0">
                                    <i class="fas fa-thumbtack"></i>
                                </td>
                            </tr>
                        @endif

                        @if($line->entry->id == 44)
                            <?php $utilidad_generada += $line->value ?>
                        @elseif($line->entry->id == 45)
                            <?php $utilidad_generada -= $line->value ?>
                        @endif

                    @endforeach
                @endif
                <tr>
                    <td class="total-eeff" colspan="2"><strong>Ganancia bruta</strong></td>
                    <td class="text-right"><strong><?php echo number_format($utilidad_generada, 0, '', '.') ?></strong></td>
                    <td width="20px" class="content-btn-mark-line px-0">
                        <i class="fas fa-thumbtack"></i>
                    </td>
                </tr>
                @if($lesson->workshop->statements)
                    @foreach($lesson->workshop->statements as $line)
                        @if($line->entry->type_eeff == "comprehensive-income" && $line->entry->type_group == "profit-operating")
                            <tr class="line-item-statement">
                                <td class="name_es">{{$line->entry->name_es}}</td>
                                <td width="10%">(1)</td>
                                <td class="text-right"><?php echo number_format($line->value, 0, '', '.') ?></td>
                                <td width="20px" class="content-btn-mark-line px-0">
                                    <i class="fas fa-thumbtack"></i>
                                </td>
                            </tr>
                        @endif

                        @if($line->entry->id == 46)
                            <?php $utilidad_generada += $line->value ?>
                        @elseif($line->entry->id == 47 || $line->entry->id == 48 || $line->entry->id == 49)
                            <?php $utilidad_generada -= $line->value ?>
                        @endif

                    @endforeach
                @endif
                <tr>
                    <td class="total-eeff" colspan="2"><strong>Ganancia (pérdida) por actividades de operación</strong></td>
                    <td class="text-right"><strong><?php echo number_format($utilidad_generada, 0, '', '.') ?></strong></td>
                    <td width="20px" class="content-btn-mark-line px-0">
                        <i class="fas fa-thumbtack"></i>
                    </td>
                </tr>
                @if($lesson->workshop->statements)
                    @foreach($lesson->workshop->statements as $line)
                        @if($line->entry->type_eeff == "comprehensive-income" && $line->entry->type_group == "profit-tax")
                            <tr class="line-item-statement">
                                <td class="name_es">{{$line->entry->name_es}}</td>
                                <td width="10%">(1)</td>
                                <td class="text-right"><?php echo number_format($line->value, 0, '', '.') ?></td>
                                <td width="20px" class="content-btn-mark-line px-0">
                                    <i class="fas fa-thumbtack"></i>
                                </td>
                            </tr>
                        @endif

                        @if($line->entry->id == 50)
                            <?php $utilidad_generada += $line->value ?>
                        @elseif($line->entry->id == 51)
                            <?php $utilidad_generada -= $line->value ?>
                        @endif

                    @endforeach
                @endif
                <tr>
                    <td class="total-eeff" colspan="2"><strong>Ganancia (pérdida), antes de impuestos</strong></td>
                    <td class="text-right"><strong><?php echo number_format($utilidad_generada, 0, '', '.') ?></strong></td>
                    <td width="20px" class="content-btn-mark-line px-0">
                        <i class="fas fa-thumbtack"></i>
                    </td>
                </tr>
                @if($lesson->workshop->statements)
                    @foreach($lesson->workshop->statements as $line)
                        @if($line->entry->type_eeff == "comprehensive-income" && $line->entry->type_group == "profit-loss")
                            <tr class="line-item-statement">
                                <td class="name_es">{{$line->entry->name_es}}</td>
                                <td width="10%">(1)</td>
                                <td class="text-right"><?php echo number_format($line->value, 0, '', '.') ?></td>
                                <td width="20px" class="content-btn-mark-line px-0">
                                    <i class="fas fa-thumbtack"></i>
                                </td>
                            </tr>
                        @endif
                        
                        @if($line->entry->id == 52)
                            <?php $utilidad_generada -= $line->value ?>
                        @endif

                    @endforeach
                @endif
                <tr>
                    <td class="total-eeff" colspan="2"><strong>Ganancia (pérdida)</strong></td>
                    <td class="text-right"><strong><?php echo number_format($utilidad_generada, 0, '', '.') ?></strong></td>
                    <td width="20px" class="content-btn-mark-line px-0">
                        <i class="fas fa-thumbtack"></i>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
