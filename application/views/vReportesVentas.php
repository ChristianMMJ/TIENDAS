<div class="card border-0" id="pnlTablero">
    <div class="card-body">
        <legend class="float-left">Reportes de Ventas</legend>
        <div class="card-block">
            <div class="card-body row">
                <div class="col-sm">
                    <label for="Reporte">Selecciona el reporte que deseas visualizar*</label>
                    <select class="form-control form-control-sm" id="Reporte" name="Reporte" required>
                        <option value=""></option>
                        <option value="rVentasGeneral">VENTAS GENERAL</option>
                        <option value="rVentasDetalle">VENTAS DETALLADO</option>
                        <option value="rAcumulados">ACUMULADOS</option>
                        <option value="rUtilidad">UTILIDAD</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>
<!--MODALES-->
<!--Reporte Ventas Generales-->
<div class="modal fade modal-fullscreen" id="rVentasGeneral"  role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Imprimir Reporte</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frmParametros">
                    <div class="row">
                        <div class="col-sm-2">
                            <label for="TipoDoc">FR</label>
                            <input type="text" class="form-control form-control-sm" maxlength="1" id="TipoDoc" name="TipoDoc" >
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-12 col-md-12">
                            <label for="Tienda">Tienda</label>
                            <select class="form-control form-control-sm" id="Tienda"   name="Tienda">
                                <option value=""></option>
                                <option value="TODAS">TODAS</option>
                            </select>
                            <select class="form-control form-control-sm notSelect" id="select-repo"   name="select-repo">
                                <option value=""></option>
                            </select>
                        </div>
                        <div class="col-sm-6 col-12 col-md-12">
                            <label for="FormaPago">Forma Pago*</label>
                            <select class="form-control form-control-sm" id="MetodoPago"  name="MetodoPago">
                                <option value=""></option>
                                <option value="TODAS">TODAS</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3 col-12">
                            <label for="Sem">Fecha Inicio*</label>
                            <input type="text" class="form-control form-control-sm notEnter maskDate" id="FechaIni" name="FechaIni" required >
                        </div>
                        <div class="col-sm-3 col-12">
                            <label for="Sem">Fecha Fin*</label>
                            <input type="text" class="form-control form-control-sm notEnter maskDate" id="FechaFin" name="FechaFin" required >
                        </div>
                    </div>

                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-raised btn-primary" id="btnImprimirReporteVentasGenerales">IMPRIMIR</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">CANCELAR</button>
            </div>
        </div>
    </div>
</div>

<script>
    var master_url = base_url + 'index.php/ReportesVentas/';


    $(document).ready(function () {

        getTiendas();
        getMetodosPago();
        handleEnter();
        $(':input:text:enabled:visible:first').focus();
        $('.maskDate').val(getToday());
        $('#rVentasGeneral').on('shown.bs.modal', function () {
            $('#rVentasGeneral').find(':input:text:enabled:visible:first').focus();
        });
        //Abrir modales para filtros
        $('#Reporte').on('change', function () {
            var modal = $(this).val();
            $('#' + modal).modal('show');
        });
        $('#btnImprimirReporteVentasGenerales').on("click", function () {
            var frm = new FormData($('#rVentasGeneral').find("#frmParametros")[0]);
            $.ajax({
                url: master_url + 'onImprimirReporteVentasGenerales',
                type: "POST",
                cache: false,
                contentType: false,
                processData: false,
                data: frm
            }).done(function (data, x, jq) {
                console.log(data);
                if (data.length > 0) {
                    onNotify('<span class="fa fa-check fa-lg"></span>', 'REPORTE GENERADO', 'success');
                    window.open(data, '_blank');
                } else {
                    onNotify('<span class="fa fa-exclamation fa-lg"></span>', 'NO EXISTEN DATOS PARA EL REPORTE', 'danger');
                }
                HoldOn.close();
            }).fail(function (x, y, z) {
                console.log(x, y, z);
            }).always(function () {
            });
        });

    });



    var Selectizer = function () {

        return {
            loadOptions: function (query, callback) {

                if (query.length > 2) {
                    HoldOn.open({theme: 'sk-bounce', message: 'ESPERE...'});
                    $.ajax({
                        url: this.settings.remoteUrl,
                        type: "POST",
                        dataType: "JSON"
                        ,
                        data: {
                            Estilo: query
                        }
                    }).done(function (data, x, jq) {
                        console.log(data);
                        callback(data);
                        HoldOn.close();
                    }).fail(function (x, y, z) {
                        callback();
                        console.log(x, y, z);
                        HoldOn.close();
                    }).always(function () {
                    });

                } else {
                    return callback();
                }
            },
            renderOptions: function (data, escape) {
                return '<div class="list-group">' +
                        '<div class="d-flex w-100 justify-content-between">' +
                        '<span class="text-dark" style="font-size: 16px;"><strong>' + data.Estilo + '</strong></span>' +
                        '<p><strong>' + data.Serie + '</strong></p>' +
                        '</div>' +
                        '<span class="text-info" style="font-size: 13px;"><strong>' + data.Color + '</strong><hr></span>' +
                        '</div>';
            }
        };
    }();


    $('#select-repo').selectize({
        valueField: 'Clave',
        labelField: 'Estilo',
        searchField: ['Estilo', 'Color'],
        create: false,
        maxItems: 1,
        sortField: [
            {
                field: 'ClaveColor',
                direction: 'asc'
            }
        ],
        loadingClass: 'loading',
        render: {option: Selectizer.renderOptions},
        remoteUrl: master_url + 'getEstilosCombinacionesSerie',
        load: Selectizer.loadOptions
    });



    function getTiendas() {
        $.getJSON(master_url + 'getTiendas').done(function (data, x, jq) {
            $.each(data, function (k, v) {
                $('#rVentasGeneral').find("#Tienda")[0].selectize.addOption({text: v.Tienda, value: v.ID});
            });
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }
    function getMetodosPago() {
        $.getJSON(master_url + 'getMetodosPago').done(function (data, x, jq) {
            $.each(data, function (k, v) {
                $('#rVentasGeneral').find("#MetodoPago")[0].selectize.addOption({text: v.SValue, value: v.ID});
            });
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }





</script>