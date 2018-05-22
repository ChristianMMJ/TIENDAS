<!--MODAL AYUDA EN CAPTURA-->
<div class="modal fade" id="mdlCaptura" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">CAPTURA DINERO</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-6 ">
                        <input type="text" placeholder="" class="form-control numbersOnly text-success" id="Mil" name="Mil" maxlength="10" >
                    </div>
                    <div class="col-6 ">
                        <h5 for="" class="text-dark">$ 1,000.00</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 ">
                        <input type="text" placeholder="" class="form-control numbersOnly text-success" id="Quinientos" name="Quinientos" maxlength="10" >
                    </div>
                    <div class="col-6 ">
                        <h5 for="" class="text-dark">$ 500.00</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <input type="text" placeholder="" class="form-control numbersOnly text-success" id="Doscientos" name="Doscientos" maxlength="10" >
                    </div>
                    <div class="col-6">
                        <h5 for="" class="text-dark">$ 200.00</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 ">
                        <input type="text" placeholder="" class="form-control numbersOnly text-success" id="Cien" name="Cien" maxlength="10" >
                    </div>
                    <div class="col-6">
                        <h5 for="" class="text-dark">$ 100.00</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <input type="text" placeholder="" class="form-control numbersOnly text-success" id="Cincuenta" name="Cincuenta" maxlength="10" >
                    </div>
                    <div class="col-6">
                        <h5 for="" class="text-dark">$ 50.00</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <input type="text" placeholder="" class="form-control numbersOnly text-success" id="Veinte" name="Veinte" maxlength="10" >
                    </div>
                    <div class="col-6">
                        <h5 for="" class="text-dark">$ 20.00</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <input type="text" placeholder="" class="form-control numbersOnly text-success" id="Diez" name="Diez" maxlength="10" >
                    </div>
                    <div class="col-6 ">
                        <h5 for="" class="text-dark">$ 10.00</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 ">
                        <input type="text" placeholder="" class="form-control numbersOnly text-success" id="Cinco" name="Cinco" maxlength="10" >
                    </div>
                    <div class="col-6 ">
                        <h5 for="" class="text-dark">$ 5.00</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 ">
                        <input type="text" placeholder="" class="form-control numbersOnly text-success" id="Dos" name="Dos" maxlength="10" >
                    </div>
                    <div class="col-6 ">
                        <h5 for="" class="text-dark">$ 2.00</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 ">
                        <input type="text" placeholder="" class="form-control numbersOnly text-success" id="Un" name="Un" maxlength="10" >
                    </div>
                    <div class="col-6 ">
                        <h5 for="" class="text-dark">$ 1.00</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <input type="text" placeholder="" class="form-control numbersOnly text-success" id="CincuentaC" name="CincuentaC" maxlength="10" >
                    </div>
                    <div class="col-6 ">
                        <h5 for="" class="text-dark">$ 0.50</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <input type="text" placeholder="Suma de Pagos con Tarjeta" class="form-control numbersOnly text-success" id="Tarjeta" name="Tarjeta" maxlength="10" >
                    </div>
                    <div class="col-6 ">
                        <h5 for="" class="text-info">Pagos con Tarjeta</h5>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-12 text-center">
                        <legend class="text-success" id="TotalCaptura">Total: <strong>$0.00</strong></legend>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-raised btn-primary" id="btnFinCaptura">ACEPTAR</button>
                <button type="button" class="btn btn-raised btn-danger" data-dismiss="modal">CERRAR</button>
            </div>
        </div>
    </div>
</div>
<!--TABLERO-->
<div class="card border-0 " id="pnlTablero">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-3 float-left">
                <legend class="float-left">Gestión de Cortes de Caja</legend>
            </div>
            <div class="col-sm-3 float-left">
                <?php
                if (in_array($this->session->userdata["Tipo"], array("SISTEMAS", "ADMINISTRADOR"))) {
                    ?>
                    <label for="Tienda">Tienda*</label>
                    <select class="form-control form-control-sm required"  id="TiendaT">
                        <option value=""></option>
                        <option value="TODAS">TODAS</option>
                    </select>
                <?php } ?>

            </div>
            <div class="col-sm-6 float-right" align="right">
                <button type="button" class="btn btn-primary" id="btnNuevo" data-toggle="tooltip" data-placement="left" title="Agregar"><span class="fa fa-plus"></span><br></button>
                <button type="button" class="btn btn-primary" id="btnEliminar"  data-toggle="tooltip" data-placement="top" title="Eliminar""><span class="fa fa-trash"></span><br></button>
            </div>
        </div>
        <div class="card-block">
            <div class="table-responsive" id="tblRegistros"></div>
        </div>
    </div>
</div>
<!--GUARDAR-->
<div class="d-none" id="pnlDatos">
    <div class="card border-0">
        <div class="card-body text-dark customBackground" >
            <div class="row">
                <div class="col-md-8 float-left">
                    <h5>CORTE DE CAJA</h5>
                </div>
                <div class="col-md-2 float-right">

                </div>
                <div class="col-md-2 float-right" align="right">
                    <button type="button" class="btn btn-danger btn-sm" id="btnCancelar">SALIR</button>
                    <button type="button" class="btn btn-primary btn-sm" id="btnGuardar">GUARDAR</button>
                </div>
            </div>
            <hr>
            <!--ENCABEZADO-->
            <div id="Encabezado">
                <form id="frmNuevo">
                    <div class="row">
                        <div class="d-none">
                            <input type="text" class="" id="ID" name="ID"  >
                        </div>
                        <div class="col-sm-2">
                            <label for="DocMov">Dinero en Caja</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control form-control-sm numbersOnly " maxlength="10" name="Saldo" id="Saldo" required >
                                <span class="input-group-prepend">
                                    <span class="input-group-text text-dark" id="btnCaptura" data-toggle="tooltip" data-placement="top" title="Capturar Caja">
                                        <i class="fa fa-calculator"></i>
                                    </span>
                                </span>
                            </div>
                        </div>
                        <div class="col-sm-2" style="background-color: #fff ">
                            <label for="VentasTotales">Ventas Totales</label>
                            <legend class="text-success" id="VentasTotales"><strong>$0.00</strong></legend>
                        </div>
                        <div class="col-sm-2" style="background-color: #fff ">
                            <label for="Diferencia">Diferencia</label>
                            <legend class="text-danger" id="Diferencia"><strong>$0.00</strong></legend>
                        </div>

                    </div>
                </form>
            </div>
            <hr>
            <!--DETALLE-->
            <div class=" d-none" id="pnlDatosDetalle">
                <!--DETALLE-->
                <div class="row">
                    <div class="table-responsive">
                        <table id="tblDetalle" class="table table-sm" width="100%">
                            <thead>
                                <tr>
                                    <th scope="col">Documento</th>
                                    <th scope="col">Fecha</th>
                                    <th scope="col">Tipo</th>
                                    <th scope="col">Importe</th>
                                    <th scope="col" class="d-none">IDR</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!--FIN DETALLE-->
            </div>
        </div>
    </div>
</div>
<!--SCRIPT-->
<script>
    var master_url = base_url + 'index.php/CortesCaja/';
    var pnlDatos = $("#pnlDatos");
    var pnlDatosDetalle = $("#pnlDatosDetalle");
    var pnlTablero = $("#pnlTablero");
    var btnNuevo = $("#btnNuevo");
    var btnEliminar = $("#btnEliminar");
    var btnGuardar = pnlDatos.find("#btnGuardar");
    var btnCancelar = pnlDatos.find("#btnCancelar");
    var btnCaptura = pnlDatos.find("#btnCaptura");
    var btnFinCaptura = $('#mdlCaptura').find('#btnFinCaptura');
    var currentDate = new Date();
    var nuevo = true;
    /*DATATABLE GLOBAL*/
    var tblDetalleCorteCaja;
    var tblInicial = {
        "dom": 'frt',
        "autoWidth": false,
        "displayLength": 500,
        "colReorder": true,
        "bLengthChange": false,
        "deferRender": true,
        "scrollY": 220,
        "scrollCollapse": true,
        "bSort": false,
//        "aaSorting": [
//            [0, 'asc']/*ID*/
//        ],
        "columnDefs": [
            {
                "targets": [4],
                "visible": false,
                "searchable": false
            }
        ],
        language: {
            processing: "Proceso en curso...",
            search: "Buscar:",
            lengthMenu: "Mostrar _MENU_ Elementos",
            info: "Mostrando  _START_ de _END_ , de _TOTAL_ Elementos.",
            infoEmpty: "Mostrando 0 de 0 A 0 Elementos.",
            infoFiltered: "(Filtrando un total _MAX_ Elementos. )",
            infoPostFix: "",
            loadingRecords: "Procesando los datos...",
            zeroRecords: "No se encontro nada.",
            emptyTable: "No existen datos en la tabla.",
            paginate: {
                first: "Primero",
                previous: "Anterior",
                next: "Siguiente",
                last: "&Uacute;ltimo"
            },
            aria: {
                sortAscending: ": Habilitado para ordenar la columna en orden ascendente",
                sortDescending: ": Habilitado para ordenar la columna en orden descendente"
            },
            buttons: {
                copyTitle: 'Registros copiados a portapapeles',
                copyKeys: 'Copiado con teclas clave.',
                copySuccess: {
                    _: ' %d Registros copiados',
                    1: ' 1 Registro copiado'
                }
            }
        }
    };
    $(document).ready(function () {
        pnlTablero.find("#TiendaT").change(function () {
            getRecords();
        });
        //Sombreado de la fila
        pnlDatosDetalle.find('#tblDetalle tbody').on('click', 'tr', function () {
            pnlDatosDetalle.find("#tblDetalle tbody tr").removeClass("success");
            $(this).addClass("success");
        });
        //Captura
        var Total = 0;
        var Mil = 0;
        var Quinientos = 0;
        var Doscientos = 0;
        var Cien = 0;
        var Cincuenta = 0;
        var Veinte = 0;
        var Diez = 0;
        var Cinco = 0;
        var Dos = 0;
        var Un = 0;
        var CincuentaC = 0;
        var Tarjeta = 0;
        $('#mdlCaptura').find('input').change(function () {
            if ($(this).val() !== '') {
                if ($(this).attr('id') === 'Mil') {
                    Mil = parseFloat($(this).val()) * 1000;
                }
                if ($(this).attr('id') === 'Quinientos') {
                    Quinientos = parseFloat($(this).val()) * 500;
                }
                if ($(this).attr('id') === 'Doscientos') {
                    Doscientos = parseFloat($(this).val()) * 200;
                }
                if ($(this).attr('id') === 'Cien') {
                    Cien = parseFloat($(this).val()) * 100;
                }
                if ($(this).attr('id') === 'Cincuenta') {
                    Cincuenta = parseFloat($(this).val()) * Cincuenta;
                }
                if ($(this).attr('id') === 'Veinte') {
                    Veinte = parseFloat($(this).val()) * 20;
                }
                if ($(this).attr('id') === 'Diez') {
                    Diez = parseFloat($(this).val()) * 10;
                }
                if ($(this).attr('id') === 'Cinco') {
                    Cinco = parseFloat($(this).val()) * 5;
                }
                if ($(this).attr('id') === 'Dos') {
                    Dos = parseFloat($(this).val()) * 2;
                }
                if ($(this).attr('id') === 'Un') {
                    Un = parseFloat($(this).val()) * 1;
                }
                if ($(this).attr('id') === 'CincuentaC') {
                    CincuentaC = parseFloat($(this).val()) * .5;
                }
                if ($(this).attr('id') === 'Tarjeta') {
                    Tarjeta = parseFloat($(this).val());
                }
                Total = Mil + Quinientos + Doscientos + Cien + Cincuenta + Veinte + Diez + Cinco + Dos + Un + CincuentaC + Tarjeta;
                $('#mdlCaptura').find("#TotalCaptura").find("strong").text('$' + $.number(Total, 2, '.', ','));
            }

        });
        btnFinCaptura.click(function () {
            $('#mdlCaptura').modal('hide');
            pnlDatos.find('#Saldo').val(Total);
            pnlDatos.find('#Saldo').trigger('change');
        });
        btnCaptura.click(function () {
            $('#mdlCaptura').modal('show');
        });
        $('#mdlCaptura').on('shown.bs.modal', function () {
            $(':input:text:enabled:visible:first').focus();
        });
        //Fin Captura

        pnlDatos.find('#Saldo').change(function () {
            if ($(this).val() !== '' && parseFloat($(this).val()) > 0) {
                var Diferencia = parseFloat($(this).val()) - totalCalculado;
                pnlDatos.find("#Diferencia").find("strong").text('$' + $.number(Diferencia, 2, '.', ','));
            }
        });

        btnGuardar.click(function () {
            isValid('pnlDatos');
            swal({
                buttons: ["Cancelar", "Aceptar"],
                title: 'Estas Seguro?',
                text: "Al guardar el movimiento ya no podrás realizar cambios",
                icon: "info"
            }).then((result) => {
                if (result) {
                    if (valido) {
                        HoldOn.open({
                            theme: "sk-bounce",
                            message: "GUARDANDO DATOS..."
                        });
                        var f = new FormData(pnlDatos.find("#frmNuevo")[0]);
                        if (nuevo) {
                            /*AGREGAR DETALLE*/
                            var detalle = [];
                            //Destruye la instancia de datatable
                            tblDetalleCorteCaja.destroy();
                            //Iteramos en la tabla natural
                            pnlDatosDetalle.find("#tblDetalle > tbody > tr").each(function (k, v) {
                                var row = $(this).find("td");
                                //Se declara y llena el objeto obteniendo su valor por el indice y se elimina cualquier espacio
                                var material = {
                                    ID: row.eq(4).text().replace(/\s+/g, ''),
                                    Tipo: row.eq(2).text().replace(/\s+/g, '')
                                };
                                //Se mete el objeto al arreglo
                                detalle.push(material);
                            });
                            //Convertimos a cadena el objeto en formato json
                            f.append('Detalle', JSON.stringify(detalle));
                            $.ajax({
                                url: master_url + 'onAgregar',
                                type: "POST",
                                cache: false,
                                contentType: false,
                                processData: false,
                                data: f
                            }).done(function (data, x, jq) {
                                $('#Encabezado').addClass('disabledForms');
                                btnGuardar.addClass('d-none');
                                swal('INFO', 'CORTE DE CAJA GUARDADO', 'success');
                                nuevo = false;
                                getRecords();
                            }).fail(function (x, y, z) {
                                console.log(x, y, z);
                            }).always(function () {
                                HoldOn.close();
                                tblDetalleCorteCaja = pnlDatosDetalle.find("#tblDetalle").DataTable(tblInicial);
                            });
                        }
                    } else {
                        onNotify('<span class="fa fa-times fa-lg"></span>', '* DEBE DE COMPLETAR LOS CAMPOS REQUERIDOS *', 'danger');
                    }
                }
            });


        });
        btnNuevo.click(function () {
            if ($.fn.DataTable.isDataTable('#tblDetalle')) {
                tblDetalleCorteCaja.destroy();
                pnlDatosDetalle.find("#tblDetalle > tbody").html("");
            }
            tblDetalleCorteCaja = pnlDatosDetalle.find("#tblDetalle").DataTable(tblInicial);
            pnlTablero.addClass("d-none");
            pnlDatos.removeClass('d-none');
            pnlDatosDetalle.removeClass('d-none');
            pnlDatos.find("input").val("");
            $('#Encabezado').removeClass('disabledForms');
            btnGuardar.removeClass('d-none');
            $.each(pnlDatos.find("select"), function (k, v) {
                pnlDatos.find("select")[k].selectize.clear(true);
            });
            $(':input:text:enabled:visible:first').focus();
            nuevo = true;
            //Cargar Detalle
            if ($.fn.DataTable.isDataTable('#tblDetalle')) {
                tblDetalleCorteCaja.destroy();
                pnlDatosDetalle.find("#tblDetalle > tbody").html("");
            }
            tblDetalleCorteCaja = pnlDatosDetalle.find("#tblDetalle").DataTable(tblInicial);
            /*DETALLE*/
            $.getJSON(master_url + 'getDetalleNuevo', {}).done(function (data, x, jq) {
                $.each(data, function (k, v) {
                    tblDetalleCorteCaja.row.add([
                        v.Documento,
                        v.Fecha,
                        v.Cliente,
                        "$" + $.number(v.Importe, 2, '.', ','),
                        v.ID
                    ]).draw(false);
                });
            }).fail(function (x, y, z) {
                console.log(x, y, z);
            }).always(function () {
                HoldOn.close();
                onCalcularMontos();
            });


        });
        btnCancelar.click(function () {
            pnlTablero.removeClass("d-none");
            pnlDatos.addClass('d-none');
            pnlDatosDetalle.addClass('d-none');
            nuevo = true;
        });
        btnEliminar.click(function () {
            if (temp !== 0 && temp !== undefined && temp > 0) {
                swal({
                    title: "Confirmar",
                    text: "Deseas eliminar el registro?",
                    icon: "warning",
                    buttons: ["Cancelar", "Aceptar"],
                    dangerMode: true
                }).then((willDelete) => {
                    if (willDelete) {
                        HoldOn.open({
                            theme: "sk-bounce",
                            message: "CARGANDO DATOS..."
                        });
                        $.ajax({
                            url: master_url + 'onEliminar',
                            type: "POST",
                            data: {
                                ID: temp
                            }
                        }).done(function (data, x, jq) {
                            getRecords();
                            swal("Hecho", "El registro se ha eliminado!", 'success');

                        }).fail(function (x, y, z) {
                            console.log(x, y, z);
                        }).always(function () {
                            HoldOn.close();
                        });
                    }
                });
            } else {
                onNotify('<span class="fa fa-exclamation fa-lg"></span>', 'DEBE DE ELEGIR UN REGISTRO', 'danger');
            }
        });
        getRecords();
        getTiendas();
        handleEnter();
    });

    function getTiendas() {

        HoldOn.open({theme: 'sk-bounce', message: 'ESPERE...'});
        $.ajax({
            url: master_url + 'getTiendas',
            type: "POST",
            dataType: "JSON"
        }).done(function (data, x, jq) {
            $.each(data, function (k, v) {
                pnlTablero.find("#TiendaT")[0].selectize.addOption({text: v.Tienda, value: v.ID});
            });
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }

    function getRecords() {
        temp = 0;
        HoldOn.open({
            theme: "sk-bounce",
            message: "CARGANDO DATOS..."
        });
        $.ajax({
            url: master_url + 'getRecords',
            type: "POST",
            dataType: "JSON",
            data: {
                Tienda: pnlTablero.find("#TiendaT").val()
            }
        }).done(function (data, x, jq) {
            if (data.length > 0) {
                $("#tblRegistros").html(getTable('tblCortesCaja', data));
                $('#tblCortesCaja tfoot th').each(function () {
                    $(this).html('');
                });
                var thead = $('#tblCortesCaja thead th');
                var tfoot = $('#tblCortesCaja tfoot th');
                thead.eq(0).addClass("d-none");
                tfoot.eq(0).addClass("d-none");
                $.each($.find('#tblCortesCaja tbody tr'), function (k, v) {
                    var td = $(v).find("td");
                    td.eq(0).addClass("d-none");
                });
                var tblSelected = $('#tblCortesCaja').DataTable(tableOptions);
                $('#tblCortesCaja_filter input[type=search]').focus();
                $('#tblCortesCaja tbody').on('click', 'tr', function () {

                    $("#tblCortesCaja tbody tr").removeClass("success");
                    $(this).addClass("success");
                    var dtm = tblSelected.row(this).data();
                    temp = parseInt(dtm[0]);
                });
                $('#tblCortesCaja tbody').on('dblclick', 'tr', function () {
                    $("#tblCortesCaja tbody tr").removeClass("success");
                    $(this).addClass("success");
                    var id = this.id;
                    var index = $.inArray(id, selected);
                    if (index === -1) {
                        selected.push(id);
                    } else {
                        selected.splice(index, 1);
                    }
                    var dtm = tblSelected.row(this).data();
                    if (temp !== 0 && temp !== undefined && temp > 0) {
                        nuevo = false;
                        HoldOn.open({
                            theme: "sk-bounce",
                            message: "CARGANDO DATOS..."
                        });
                        $.ajax({
                            url: master_url + 'getCorteCajaByID',
                            type: "POST",
                            dataType: "JSON",
                            data: {
                                ID: temp
                            }
                        }).done(function (data, x, jq) {
                            pnlDatos.find("input").val("");

                            btnGuardar.addClass('d-none');
                            $('#Encabezado').addClass('disabledForms');
                            $.each(pnlDatos.find("select"), function (k, v) {
                                pnlDatos.find("select")[k].selectize.clear(true);
                            });
                            $.each(data[0], function (k, v) {
                                pnlDatos.find("[name='" + k + "']").val(v);
                                if (pnlDatos.find("[name='" + k + "']").is('select')) {
                                    pnlDatos.find("[name='" + k + "']")[0].selectize.setValue(v);
                                }
                            });
                            //Cargar Detalle
                            if ($.fn.DataTable.isDataTable('#tblDetalle')) {
                                tblDetalleCorteCaja.destroy();
                                pnlDatosDetalle.find("#tblDetalle > tbody").html("");
                            }
                            var Saldo = parseFloat(data[0].Saldo);
                            tblDetalleCorteCaja = pnlDatosDetalle.find("#tblDetalle").DataTable(tblInicial);
                            /*DETALLE*/
                            var TotalTabla = 0;
                            $.getJSON(master_url + 'getDetalleByID', {ID: temp}).done(function (data, x, jq) {
                                $.each(data, function (k, v) {
                                    tblDetalleCorteCaja.row.add([
                                        v.Documento,
                                        v.Fecha,
                                        v.Cliente,
                                        "$" + $.number(v.Importe, 2, '.', ','),
                                        v.ID
                                    ]).draw(false);
                                    //Calcular Diferencia
                                    TotalTabla += parseFloat(v.Importe);
                                });
                                var Diferencia = parseFloat(Saldo) - parseFloat(TotalTabla);
                                pnlDatos.find("#Diferencia").find("strong").text('$' + $.number(Diferencia, 2, '.', ','));
                            }).fail(function (x, y, z) {
                                console.log(x, y, z);
                            }).always(function () {
                                HoldOn.close();
                                onCalcularMontos();
                            });
                            /*FIN DETALLE*/
                            /*MOSTRAR PANEL PRINCIPAL*/
                            pnlTablero.addClass("d-none");
                            pnlDatos.removeClass('d-none');
                            pnlDatosDetalle.removeClass("d-none");

                        }).fail(function (x, y, z) {
                            console.log(x, y, z);
                        }).always(function () {
                            HoldOn.close();
                        });
                    } else {
                        onNotify('<span class="fa fa-exclamation fa-lg"></span>', 'DEBE DE ELEGIR UN REGISTRO', 'danger');
                    }
                });
                // Apply the search
                tblSelected.columns().every(function () {
                    var that = this;
                    $('input', this.footer()).on('keyup change', function () {
                        if (that.search() !== this.value) {
                            that.search(this.value).draw();
                        }
                    });
                });
            } else {
                $("#tblRegistros").html('');
            }
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }
    var totalCalculado = 0.0;
    function onCalcularMontos() {
        $.each(tblDetalleCorteCaja.rows().data(), function () {
            totalCalculado += getNumberFloat($(this)[3]);
        });
        if (pnlDatosDetalle.find("#tblDetalle > tbody > tr").length > 1) {
            pnlDatos.find("#VentasTotales").find("strong").text('$' + $.number(totalCalculado, 2, '.', ','));
        }
    }

</script>

