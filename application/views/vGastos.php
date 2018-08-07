<div class="card border-0" id="pnlTablero">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-3 float-left">
                <legend class="float-left">Gestión de Gastos</legend>
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
        <div id="Registros" class="row">
            <table id="tblRegistros" class="table table-sm" style="width:100%">
                <thead>
                    <tr>
                        <th >ID</th>
                        <th >Documento</th>
                        <th >Tienda</th>
                        <th >Fecha</th>
                        <th >Importe</th>
                        <th >Usuario</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!--GUARDAR-->
<div class="d-none" id="pnlDatos">
    <div class="card border-0">
        <div class="card-body text-dark customBackground" >
            <div class="row">
                <div class="col-md-8 float-left">
                    <h5>GASTOS</h5>
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
                        <div class="col-sm-1">
                            <label for="TipoDoc">RF*</label>
                            <input type="text"  class="form-control form-control-sm " maxlength="1" id="TipoDoc" name="TipoDoc" required >
                        </div>
                        <div class="col-sm-2">
                            <label for="FechaMov">Fecha Mov.</label>
                            <input type="text" class="form-control form-control-sm required" id="FechaMov" name="FechaMov"  placeholder="XX/XX/XXXX" data-provide="datepicker" data-date-format="dd/mm/yyyy" readonly="">
                        </div>

                        <div class="col-sm-2">
                            <label for="DocMov">Docto.*</label>
                            <input type="text" class="form-control form-control-sm numbersOnly " maxlength="10" name="DocMov" required >
                        </div>
                    </div>
                </form>
            </div>
            <!--CONTROLES AGREGAR DETALLE-->
            <div id="pnlControlesDetalle">

                <div class="row">
                    <div class="col-sm-3">
                        <label for="Concepto">Concepto</label>
                        <input type="text" class="form-control form-control-sm " maxlength="350" id="Concepto" name="Concepto" >
                    </div>
                    <div class="col-sm-3">
                        <label for="Categoria">Categoría</label>
                        <select class="form-control form-control-sm required"  name="Categoria">
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="col-sm-1">
                        <label for="Precio">Precio</label>
                        <input type="text" class="form-control form-control-sm numbersOnly" maxlength="9" name="Precio" >
                    </div>
                    <div class="col-sm-1">
                        <label for="Cantidad">Cantidad</label>
                        <input type="text" class="form-control form-control-sm numbersOnly" maxlength="5" name="Cantidad" >
                    </div>
                    <div class="col-12 col-md-1 col-sm-1">
                        <br>
                        <button  class="btn btn-primary btn-sm" id="btnAgregarDetalle" data-toggle="tooltip" data-placement="top" title="Agregar Producto" >
                            <i class="fa fa-plus"></i>
                        </button>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>


<!--DETALLE-->
<div class="card-body d-none" id="pnlDatosDetalle">
    <hr>
    <div class="row ">
        <table id="tblDetalle" class="table table-sm" width="100%">
            <thead>
                <tr>
                    <th >Concepto</th>
                    <th >Cantidad</th>
                    <th >Precio</th>
                    <th >SubTotal</th>
                    <th  class="d-none">IDR</th>
                    <th  class="d-none">Orden</th>
                    <th  class="d-none">CatID</th>
                    <th  class="">Categoría</th>
                    <th  ></th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>



    <div class="col-12 mt-4" align="center" style="background-color: #fff ">
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-2 text-info">
                Subtotal<br>
                <div id="SubTotal"><strong>$0.0</strong></div>
            </div>
            <div class="col-sm-2 text-warning">
                I.V.A<br>
                <div id="IVA" ><strong>$0.0</strong></div>
            </div>
            <div class="col-sm-2 text-success">
                Total<br>
                <div id="Total" ><strong>$0.0</strong></div>
            </div>
        </div>
    </div>


</div>
<!--FIN DETALLE-->

<!--SCRIPT-->
<script>
    var master_url = base_url + 'index.php/Gastos/';
    var pnlDatos = $("#pnlDatos");
    var pnlDatosDetalle = $("#pnlDatosDetalle");
    var pnlControlesDetalle = $("#pnlControlesDetalle");
    var pnlTablero = $("#pnlTablero");
    var btnNuevo = $("#btnNuevo");
    var btnEliminar = $("#btnEliminar");
    var btnGuardar = pnlDatos.find("#btnGuardar");
    var btnCancelar = pnlDatos.find("#btnCancelar");
    var currentDate = new Date();
    var nuevo = true;
    var btnAgregarDetalle = pnlControlesDetalle.find('#btnAgregarDetalle');
    /*DATATABLE GLOBAL*/
    var tblRegistrosX = $("#tblRegistros"), Registros;



    var tblInicial = {
        "dom": 'rt',
        "autoWidth": true,
        "displayLength": 500,
        "colReorder": true,
        "bLengthChange": false,
        "deferRender": true,
        "scrollY": 220,
        "scrollX": true,
        "scrollCollapse": true,
        "bSort": true,
        "aaSorting": [
            [5, 'desc']/*ID*/
        ],
        "columnDefs": [
            {
                "targets": [4],
                "visible": false,
                "searchable": false
            },
            {
                "targets": [5],
                "visible": false,
                "searchable": false
            },
            {
                "targets": [6],
                "visible": false,
                "searchable": false
            }
        ],
        language: lang
    };


    $(document).ready(function () {
        pnlTablero.find("#TiendaT").change(function () {
            getRecords();
        });

        //Calula los montos si se cambia el tipo de documento fiscal o no fiscal
        pnlDatos.find("input[name='TipoDoc']").keyup(function (e) {
            if (e.keyCode === 82)/*Solo R*/
            {
                pnlDatos.find("input[name='TipoDoc']").val('R');
                if (pnlDatosDetalle.find('#tblDetalle > tbody > tr').length > 0) {
                    onCalcularMontos();
                }
            } else if (e.keyCode === 70)/*Solo R*/
            {
                pnlDatos.find("input[name='TipoDoc']").val('F');
                if (pnlDatosDetalle.find('#tblDetalle > tbody > tr').length > 0) {
                    onCalcularMontos();
                }
            } else {
                pnlDatos.find("input[name='TipoDoc']").val('R');
                if (pnlDatosDetalle.find('#tblDetalle > tbody > tr').length > 0) {
                    onCalcularMontos();
                }
            }
        });

        //Evento en el control de costo para traer los porcentajes de venta y agregarselos al costo
        pnlControlesDetalle.find("[name='Cantidad']").blur(function () {
            if ($(this).val().length > 0) {
                btnAgregarDetalle.trigger('click');
            } else {
                swal('INFO', 'DEBES DE CAPTURAR UN CANTIDAD', 'info');
            }
        });

        //Evento de botones
        btnAgregarDetalle.click(function () {
            onAgregarFila();
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
                            tblDetalleGasto.destroy();
                            //Iteramos en la tabla natural
                            pnlDatosDetalle.find("#tblDetalle > tbody > tr").each(function (k, v) {
                                var row = $(this).find("td");
                                console.log(row);
                                //Se declara y llena el objeto obteniendo su valor por el indice y se elimina cualquier espacio
                                var material = {
                                    Concepto: row.eq(0).text().replace(/\s+/g, ''),
                                    Cantidad: (row.eq(1).text().replace(/\s+/g, '') !== '') ? row.eq(1).text().replace(/\s+/g, '') : 0,
                                    Precio: row.eq(2).text().replace(/\s+/g, '').replace(/,/g, "").replace("$", ""),
                                    Subtotal: (row.eq(3).text().replace(/\s+/g, '') !== '') ? getNumberFloat(row.eq(3).text()) : 0,
                                    Categoria: (row.eq(6).text().replace(/\s+/g, '') !== '') ? (row.eq(6).text()) : 0
                                };
                                //Se mete el objeto al arreglo
                                detalle.push(material);
                            });
                            //Convertimos a cadena el objeto en formato json
                            f.append('Detalle', JSON.stringify(detalle));
                            f.append('Importe', ImporteTotal);
                            $.ajax({
                                url: master_url + 'onAgregar',
                                type: "POST",
                                cache: false,
                                contentType: false,
                                processData: false,
                                data: f
                            }).done(function (data, x, jq) {
                                $('#Encabezado').addClass('disabledForms');
                                pnlControlesDetalle.addClass('disabledForms');
                                btnGuardar.addClass('d-none');
                                swal('INFO', 'MOVIMIENTO GUARDADO', 'success');
                                nuevo = false;
                            }).fail(function (x, y, z) {
                                console.log(x, y, z);
                            }).always(function () {
                                HoldOn.close();
                                tblDetalleGasto = pnlDatosDetalle.find("#tblDetalle").DataTable(tblInicial);
                                detalle_eliminado = [];
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
                tblDetalleGasto.destroy();
                pnlDatosDetalle.find("#tblDetalle > tbody").html("");
            }
            tblDetalleGasto = pnlDatosDetalle.find("#tblDetalle").DataTable(tblInicial);
            pnlTablero.addClass("d-none");
            pnlDatos.removeClass('d-none');
            pnlDatosDetalle.removeClass('d-none');
            pnlDatos.find("input").val("");
            pnlDatos.find("#FechaMov").datepicker("setDate", currentDate);
            pnlDatos.find('#TipoDoc').val('R');
            $('#Encabezado').removeClass('disabledForms');
            $('#ControlesDetalle').removeClass('disabledForms');
            pnlControlesDetalle.removeClass('d-none');
            $('#Encabezado').removeClass('disabledForms');
            btnGuardar.removeClass('d-none');
            $.each(pnlDatos.find("select"), function (k, v) {
                pnlDatos.find("select")[k].selectize.clear(true);
            });
            $(':input:text:enabled:visible:first').focus();
            $(':input:text:enabled:visible:first').select();
            nuevo = true;
        });
        btnCancelar.click(function () {
            pnlTablero.removeClass("d-none");
            pnlDatos.addClass('d-none');
            pnlDatosDetalle.addClass('d-none');
            nuevo = true;
            Registros.ajax.reload();
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
                            Registros.ajax.reload();
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
        getCategoriasGastos();
        handleEnter();
    });

    IdMovimiento = 0;
    function getRecords() {
        HoldOn.open({theme: 'sk-cube', message: 'CARGANDO...'});
        $.fn.dataTable.ext.errMode = 'throw';
        if ($.fn.DataTable.isDataTable('#tblRegistros')) {
            tblRegistrosX.DataTable().destroy();
        }
        Registros = tblRegistrosX.DataTable({
            "dom": 'Bfrtip',
            buttons: buttons,
            "ajax": {
                "url": master_url + 'getRecords',
                "dataType": "json",
                "type": "POST",
                "dataSrc": "",
                data: {
                    Tienda: pnlTablero.find("#TiendaT").val()
                }
            },
            "columns": [
                {"data": "ID"},
                {"data": "Documento"},
                {"data": "Tienda"},
                {"data": "FechaMovimiento"},
                {"data": "Importe"},
                {"data": "Usuario"}

            ],
            language: lang,
            "autoWidth": true,
            "bStateSave": true,
            "colReorder": true,
            "scrollX": true,
            "displayLength": 20,
            "bLengthChange": false,
            "deferRender": true,
            "scrollCollapse": false,
            "bSort": true,
            "aaSorting": [
                [0, 'desc']/*ID*/
            ],
            "initComplete": function (settings, json) {
                HoldOn.close();
            }
        });
        $('#tblRegistros_filter input[type=search]').focus();

        tblRegistrosX.find('tbody').on('click', 'tr', function () {
            var dtm = Registros.row(this).data();
            temp = parseInt(dtm.ID);
            tblRegistrosX.find("tbody tr").removeClass("success");
            $(this).addClass("success");
        });


        tblRegistrosX.find('tbody').on('dblclick', 'tr', function () {
            nuevo = false;
            if (temp !== 0 && temp !== undefined && temp > 0) {
                nuevo = false;
                HoldOn.open({
                    theme: "sk-bounce",
                    message: "CARGANDO DATOS..."
                });
                $.ajax({
                    url: master_url + 'getGastoByID',
                    type: "POST",
                    dataType: "JSON",
                    data: {
                        ID: temp
                    }
                }).done(function (data, x, jq) {
                    pnlDatos.find("input").val("");
                    btnGuardar.addClass('d-none');
                    pnlControlesDetalle.addClass('d-none');
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
                        tblDetalleGasto.destroy();
                        pnlDatosDetalle.find("#tblDetalle > tbody").html("");
                    }
                    tblDetalleGasto = pnlDatosDetalle.find("#tblDetalle").DataTable(tblInicial);
                    n = 1;
                    /*DETALLE*/
                    $.getJSON(master_url + 'getGastoDetalleByID', {ID: temp}).done(function (data, x, jq) {
                        $.each(data, function (k, v) {
                            tblDetalleGasto.row.add([
                                v.Concepto,
                                v.Cantidad,
                                "$" + $.number(v.Precio, 2, '.', ','),
                                "$" + $.number(v.SubTotal, 2, '.', ','),
                                v.ID,
                                n,
                                v.Categoria,
                                v.CatNombre,
                                ''
                            ]).draw(false);
                            n += 1;
                        });
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
    }

    function getCategoriasGastos() {
        HoldOn.open({theme: 'sk-bounce', message: 'ESPERE...'});
        $.ajax({
            url: master_url + 'getCategoriasGastos',
            type: "POST",
            dataType: "JSON"
        }).done(function (data, x, jq) {
            $.each(data, function (k, v) {
                pnlDatos.find("[name='Categoria']")[0].selectize.addOption({text: v.SValue, value: v.ID});
            });
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }
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

    var n = 1;
    function onAgregarFila() {
        n = (n > 0) ? n : 1;
        var Concepto = pnlControlesDetalle.find("[name='Concepto']");
        var Cantidad = pnlControlesDetalle.find("[name='Cantidad']");
        var Precio = pnlControlesDetalle.find("[name='Precio']");
        var Categoria = pnlControlesDetalle.find("[name='Categoria']");

        if (pnlDatos.find("input[name='TipoDoc']").val() !== '') {
            if (Precio.val() !== '' && parseFloat(Precio.val()) > 0) {

                tblDetalleGasto.row.add([
                    Concepto.val(),
                    Cantidad.val(),
                    "$" + $.number((Precio.val()), 2, '.', ','),
                    "$" + $.number((Cantidad.val() * Precio.val()), 2, '.', ','),
                    0,
                    n,
                    Categoria.val(),
                    Categoria.find("option:selected").text(),
                    '<span class="fa fa-trash" onclick="onEliminarFila(this)"></span>'
                ]).draw(false);
                n += 1;
                onNotify('<span class="fa fa-check fa-lg"></span>', 'REGISTROS AGREGADOS', 'success');
                onCalcularMontos();
                onLimpiarCampos();
                /*VALIDAR ESTILO Y COMBINACION*/
            } else {
                onNotify('<span class="fa fa-times fa-lg"></span>', 'DEBE DE ESTABLECER UN PRECIO', 'danger');
                pnlDatos.find("input[name='PrecioMov']").focus();
            }
        } else {
            onNotify('<span class="fa fa-times fa-lg"></span>', 'DEBE DE ESTABLECER UN TIPO', 'danger');
            pnlDatos.find("input[name='TipoDoc']").focus();
        }
    }

    function onLimpiarCampos() {
        pnlControlesDetalle.find('input').val('');
        pnlControlesDetalle.find('#Concepto').focus();
    }

    var ImporteTotal = 0;
    function onCalcularMontos() {
        var total = 0.0;
        $.each(tblDetalleGasto.rows().data(), function () {
            total += getNumberFloat($(this)[3]);
        });
        //Seteamos la variableGlobalDelTotal
        ImporteTotal = total;
        if (pnlDatosDetalle.find("#tblDetalle > tbody > tr").length >= 1) {
            pnlDatosDetalle.find("#SubTotal").find("strong").text('$' + $.number(total, 2, '.', ','));
        }
        if (pnlDatos.find("input[name='TipoDoc']").val() === 'F') {
            pnlDatosDetalle.find("#IVA").find("strong").text('$' + $.number(total * 0.16, 2, '.', ','));
            pnlDatosDetalle.find("#Total").find("strong").text('$' + $.number(total * 1.16, 2, '.', ','));
        } else {
            pnlDatosDetalle.find("#IVA").find("strong").text('$' + $.number(0, 2, '.', ','));
            pnlDatosDetalle.find("#Total").find("strong").text('$' + $.number(total, 2, '.', ','));
        }
    }

    var detalle_eliminado = [];
    function onEliminarFila(e) {
        tblDetalleGasto.row($(e).parent().parent()).remove().draw();
        onCalcularMontos();
    }

</script>