<div class="card " id="pnlTablero">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6 float-left">
                <legend class="float-left">Gestión de Gastos</legend>
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
                    <h5>GASTOS</h5>
                </div>
                <div class="col-md-2 float-right">

                </div>
                <div class="col-md-2 float-right" align="right">
                    <button type="button" class="btn btn-default" id="btnCancelar">SALIR</button>
                    <button type="button" class="btn btn-primary" id="btnGuardar">GUARDAR</button>
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
                            <label for="TipoDoc">Tp*</label>
                            <input type="text" class="form-control form-control-sm numbersOnly" maxlength="1" id="TipoDoc" name="TipoDoc" required >
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
            <hr>
            <!--DETALLE-->
            <div class=" d-none" id="pnlDatosDetalle">
                <!--DETALLE-->
                <div class="row">
                    <div class="table-responsive">
                        <table id="tblDetalle" class="table table-sm" width="100%">
                            <thead>
                                <tr>
                                    <th scope="col">Concepto</th>
                                    <th scope="col">Cantidad</th>
                                    <th scope="col">Precio</th>
                                    <th scope="col">SubTotal</th>
                                    <th scope="col" class="d-none">IDR</th>
                                    <th scope="col" class="d-none">Orden</th>
                                    <th scope="col" class="d-none">CatID</th>
                                    <th scope="col" class="">Categoría</th>
                                    <th scope="col" ></th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="w-100"><br></div>
                <div class="row">
                    <div class="col-md-2">

                    </div>
                    <div class="col-md-12" align="center" style="background-color: #fff ">
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

                    <div class="col-md-2">

                    </div>
                </div>
                <!--FIN DETALLE-->
            </div>
        </div>
    </div>
</div>
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
    var tblDetalleGasto;
    var tblInicial = {
        "dom": 'rt',
        "autoWidth": false,
        "displayLength": 500,
        "colReorder": true,
        "bLengthChange": false,
        "deferRender": true,
        "scrollY": 220,
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
        //Calula los montos si se cambia el tipo de documento fiscal o no fiscal
        pnlDatos.find("input[name='TipoDoc']").keyup(function () {
            if (pnlDatosDetalle.find('#tblDetalle > tbody > tr').length > 0) {
                onCalcularMontos();
            }
        });
        //Sombreado de la fila
        pnlDatosDetalle.find('#tblDetalle tbody').on('click', 'tr', function () {
            pnlDatosDetalle.find("#tblDetalle tbody tr").removeClass("success");
            $(this).addClass("success");
        });

        //Evento en el control de costo para traer los porcentajes de venta y agregarselos al costo
        pnlControlesDetalle.find("[name='Cantidad']").blur(function () {
            if ($(this).val().length > 0) {
                btnAgregarDetalle.trigger('click');
            } else {
                swal('INFO', 'DEBES DE CAPTURAR UN PRECIO', 'info');
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
                                getRecords();
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
            pnlDatos.find('#TipoDoc').val('2');
            $('#Encabezado').removeClass('disabledForms');
            $('#ControlesDetalle').removeClass('disabledForms');
            pnlControlesDetalle.removeClass('d-none');
            $('#Encabezado').removeClass('disabledForms');
            btnGuardar.removeClass('d-none');
            $.each(pnlDatos.find("select"), function (k, v) {
                pnlDatos.find("select")[k].selectize.clear(true);
            });
            $(':input:text:enabled:visible:first').focus();
            nuevo = true;
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
        getCategoriasGastos();
        handleEnter();
    });

    function getRecords() {
        temp = 0;
        HoldOn.open({
            theme: "sk-bounce",
            message: "CARGANDO DATOS..."
        });
        $.ajax({
            url: master_url + 'getRecords',
            type: "POST",
            dataType: "JSON"
        }).done(function (data, x, jq) {
            if (data.length > 0) {
                $("#tblRegistros").html(getTable('tblGastos', data));
                $('#tblGastos tfoot th').each(function () {
                    $(this).html('');
                });
                var thead = $('#tblGastos thead th');
                var tfoot = $('#tblGastos tfoot th');
                thead.eq(0).addClass("d-none");
                tfoot.eq(0).addClass("d-none");
                $.each($.find('#tblGastos tbody tr'), function (k, v) {
                    var td = $(v).find("td");
                    td.eq(0).addClass("d-none");
                });
                var tblSelected = $('#tblGastos').DataTable(tableOptions);
                $('#tblGastos_filter input[type=search]').focus();
                $('#tblGastos tbody').on('click', 'tr', function () {

                    $("#tblGastos tbody tr").removeClass("success");
                    $(this).addClass("success");
                    var dtm = tblSelected.row(this).data();
                    temp = parseInt(dtm[0]);
                });
                $('#tblGastos tbody').on('dblclick', 'tr', function () {
                    $("#tblGastos tbody tr").removeClass("success");
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

    var n = 1;
    function onAgregarFila() {
        n = (n > 0) ? n : 1;
        var Concepto = pnlControlesDetalle.find("[name='Concepto']");
        var Cantidad = pnlControlesDetalle.find("[name='Cantidad']");
        var Precio = pnlControlesDetalle.find("[name='Precio']");
        var Categoria = pnlControlesDetalle.find("[name='Categoria']");

        if (pnlDatos.find("input[name='TipoDoc']").val() > 0) {
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
        if (pnlDatosDetalle.find("#tblDetalle > tbody > tr").length > 1) {
            pnlDatosDetalle.find("#SubTotal").find("strong").text('$' + $.number(total, 2, '.', ','));
        }
        if (parseInt(pnlDatos.find("input[name='TipoDoc']").val()) === 1) {
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