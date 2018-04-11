<div class="card " id="pnlTablero">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6 float-left">
                <legend class="float-left">Gestión de Compras</legend>
            </div>
            <div class="col-sm-6 float-right" align="right">
                <button type="button" class="btn btn-primary" id="btnNuevo"><span class="fa fa-plus"></span><br></button>
            </div>
        </div>
        <div class="card-block">
            <div class="table-responsive" id="tblRegistros"></div>
        </div>
    </div>
</div>
<!--GUARDAR-->
<div class="container-fluid d-none" id="pnlDatos">
    <br>
    <div class="card border-dark">
        <div class="card-header ">
            <div class="row">
                <div class="col-md-8 float-left">
                    <strong>Compras</strong>
                </div>
                <div class="col-md-2 float-right">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="AfecInv" >
                        <label class="custom-control-label" for="AfecInv">Afecta Inv. Tienda</label>
                    </div>
                </div>
                <div class="col-md-2 float-right" align="right">
                    <button type="button" class="btn btn-default" id="btnCancelar">CANCELAR</button>
                    <button type="button" class="btn btn-primary" id="btnGuardar">GUARDAR</button>
                </div>
            </div>
        </div>
        <div class="card-body text-dark customBackground" > 
            <form id="frmNuevo">
                <div class="row">
                    <div class="d-none">
                        <input type="text" class="" id="ID" name="ID"  >
                    </div>
                    <div class="col-sm-4">
                        <label for="Tienda">Tienda*</label>
                        <select class="form-control form-control-sm required"  name="Tienda"> 
                            <option value=""></option>  
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <label for="Proveedor">Proveedor*</label>
                        <select class="form-control form-control-sm required"  name="Proveedor"> 
                            <option value=""></option>  
                        </select>
                    </div>
                    <div class="col-sm-1">
                        <label for="TipoDoc">Tp*</label>  
                        <input type="text" class="form-control form-control-sm numbersOnly" maxlength="1" name="TipoDoc" required >
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
            <!--DETALLE-->
            <div class=" d-none" id="pnlDatosDetalle">
                <div class="row">
                    <div class="col-sm-4">
                        <label for="Estilo">Estilo*</label>
                        <select class="form-control form-control-sm "  name="Estilo" required=""> 
                            <option value=""></option>  
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <label for="Combinacion">Color*</label>
                        <select class="form-control form-control-sm "  name="Combinacion" required=""> 
                            <option value=""></option>  
                        </select>
                    </div>
                    <div class="col-sm-1">
                        <label for="PrecioMov">Costo*</label>  
                        <input type="text" class="form-control form-control-sm numbersOnly" maxlength="9" name="PrecioMov" >
                    </div>
                    <div class="col-sm-1">
                        <label for="Clave">% Men.</label> 
                        <input type="text" class="form-control form-control-sm numbersOnly disabledForms" disabled="" id="" name=""  >
                    </div>
                    <div class="col-sm-1">
                        <label for="Clave">% May.</label> 
                        <input type="text" class="form-control form-control-sm numbersOnly disabledForms" disabled="" id="" name=""  >
                    </div>
                    <div class="col-sm-1">
                        <label for="Menudeo">Menudeo</label>  
                        <input type="text" class="form-control form-control-sm numbersOnly" name="Menudeo" disabled="">
                    </div>
                    <div class="col-sm-1">
                        <label for="Mayoreo">Mayoreo</label>  
                        <input type="text" class="form-control form-control-sm numbersOnly" name="Mayoreo" disabled="">
                    </div>
                </div> 

                <label for="Mayoreo">Tallas</label> 
                <div class="table-responsive">
                    <table id="tblTallas" class="table Tallas">
                        <thead></thead>
                        <tbody>
                            <tr>
                                <td><input type="text" style="width: 35px;" class="numbersOnly" disabled="" name="T1"></td>
                                <td><input type="text" style="width: 35px;" class="numbersOnly" disabled="" name="T2"></td>
                                <td><input type="text" style="width: 35px;" class="numbersOnly" disabled="" name="T3"></td>
                                <td><input type="text" style="width: 35px;" class="numbersOnly" disabled="" name="T4"></td>
                                <td><input type="text" style="width: 35px;" class="numbersOnly" disabled="" name="T5"></td>
                                <td><input type="text" style="width: 35px;" class="numbersOnly" disabled="" name="T6"></td>
                                <td><input type="text" style="width: 35px;" class="numbersOnly" disabled="" name="T7"></td>
                                <td><input type="text" style="width: 35px;" class="numbersOnly" disabled="" name="T8"></td>
                                <td><input type="text" style="width: 35px;" class="numbersOnly" disabled="" name="T9"></td>
                                <td><input type="text" style="width: 35px;" class="numbersOnly" disabled="" name="T10"></td>
                                <td><input type="text" style="width: 35px;" class="numbersOnly" disabled="" name="T11"></td>
                                <td><input type="text" style="width: 35px;" class="numbersOnly" disabled="" name="T12"></td>
                                <td><input type="text" style="width: 35px;" class="numbersOnly" disabled="" name="T13"></td>
                                <td><input type="text" style="width: 35px;" class="numbersOnly" disabled="" name="T14"></td>
                                <td><input type="text" style="width: 35px;" class="numbersOnly" disabled="" name="T15"></td>
                                <td><input type="text" style="width: 35px;" class="numbersOnly" disabled="" name="T16"></td>
                                <td><input type="text" style="width: 35px;" class="numbersOnly" disabled="" name="T17"></td>
                                <td><input type="text" style="width: 35px;" class="numbersOnly" disabled="" name="T18"></td>
                                <td><input type="text" style="width: 35px;" class="numbersOnly" disabled="" name="T19"></td>
                                <td><input type="text" style="width: 35px;" class="numbersOnly" disabled="" name="T20"></td>
                                <td><input type="text" style="width: 35px;" class="numbersOnly" disabled="" name="T21"></td>
                                <td><input type="text" style="width: 35px;" class="numbersOnly" disabled="" name="T22"></td>
                                <td>Pares</td>
                            </tr>
                            <tr>
                                <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="C1"></td>
                                <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="C2"></td>
                                <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="C3"></td>
                                <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="C4"></td>
                                <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="C5"></td>
                                <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="C6"></td>
                                <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="C7"></td>
                                <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="C8"></td>
                                <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="C9"></td>
                                <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="C10"></td>
                                <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="C11"></td>
                                <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="C12"></td>
                                <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="C13"></td>
                                <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="C14"></td>
                                <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="C15"></td>
                                <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="C16"></td>
                                <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="C17"></td>
                                <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="C18"></td>
                                <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="C19"></td>
                                <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="C20"></td>
                                <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="C21"></td>
                                <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="C22"></td>
                                <td><input type="text" style="width: 55px;" maxlength="4" class="numbersOnly" disabled=""  name="TPares"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!--DETALLE-->
                <div class="table-responsive">
                    <table id="tblDetalle" class="table table-sm" width="100%">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col" class="d-none">IDEstilo</th>
                                <th scope="col" class="d-none">IDColor</th>
                                <th scope="col">Estilo</th>
                                <th scope="col">Color</th>
                                <th scope="col">Talla</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Precio</th>
                                <th scope="col">SubTotal</th>
                                <th scope="col" class="d-none">IDR</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <div class="w-100"><br></div>
                <div class="row" align="center">
                    <div class="col-sm-4">
                    </div>
                    <div class="col-sm-2 text-danger">
                        PARES
                    </div>
                    <div class="col-sm-2 text-primary">
                        SUBTOTAL
                    </div>
                    <div class="col-sm-2 text-warning">
                        I.V.A
                    </div>
                    <div class="col-sm-2 text-success">
                        TOTAL
                    </div>
                    <div class="w-100"></div>
                    <div class="col-sm-4"></div>
                    <div id="Pares" class="col-sm-2 text-danger"><strong>0</strong></div>
                    <div id="SubTotal" class="col-sm-2 text-primary"><strong>$0.0</strong></div>
                    <div id="IVA" class="col-sm-2 text-warning"><strong>$0.0</strong></div>
                    <div id="Total" class="col-sm-2 text-success"><strong>$0.0</strong></div>
                </div>
                <!--FIN DETALLE-->
            </div>
        </div>
    </div>
</div>
<!--SCRIPT-->
<script>
    var master_url = base_url + 'index.php/Compras/';
    var pnlDatos = $("#pnlDatos");
    var pnlDatosDetalle = $("#pnlDatosDetalle");
    var pnlTablero = $("#pnlTablero");
    var btnNuevo = $("#btnNuevo");
    var btnGuardar = pnlDatos.find("#btnGuardar");
    var btnCancelar = pnlDatos.find("#btnCancelar");

    var currentDate = new Date();
    var nuevo = true;

    /*DATATABLE GLOBAL*/
    var tblDetalleCompra;
    var tblInicial = {
        "autoWidth": true,
        "colReorder": true,
        "displayLength": 20,
        "bLengthChange": false,
        "deferRender": true,
        "scrollY": 350,
        "scrollCollapse": false,
        "bSort": false,
        "columnDefs": [
            {
                "targets": [1],
                "visible": false,
                "searchable": false
            },
            {
                "targets": [2],
                "visible": false,
                "searchable": false
            },
            {
                "targets": [9],
                "visible": false,
                "searchable": false
            }],
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
        pnlDatos.find("input[name='TipoDoc']").keyup(function () {
            if (pnlDatosDetalle.find('#tblDetalle > tbody > tr').length > 0) {
                onCalcularMontos();
            }
        });
        pnlDatosDetalle.find('#tblDetalle tbody').on('click', 'tr', function () {
            pnlDatosDetalle.find("#tblDetalle tbody tr").removeClass("success");
            $(this).addClass("success");
        });
        pnlDatosDetalle.find('#tblDetalle tbody').on('dblclick', 'tr', function () {
            $.each(pnlDatosDetalle.find('#tblDetalle > tbody > tr'), function () {
                var cell = $(this).find("td").eq(4);
                var rcantidad = cell.text() !== '' ? cell.text() : cell.find("#RunCantidad").val();
                cell.html(rcantidad);
            });
            var cells = $(this).find("td");
            var cell = cells.eq(4);
            cell.html('<input type="text" class="form-control form-control-sm numbersOnly" style="width: 45px;" maxlength="3" id="RunCantidad" value="' + cell.text() + '">');
            cell.find("#RunCantidad").focusout(function () {
                cell.html($(this).val());
                var precio = parseFloat(getNumber(cells.eq(5).text()));
                cells.eq(6).html("$" + $.number((parseFloat($(this).val()) * precio), 2, '.', ','));
                onCalcularMontos();
            });
            cell.find("#RunCantidad").keyup(function (e) {
                if (e.keyCode === 13) {
                    cell.html($(this).val());
                    var precio = parseFloat(getNumber(cells.eq(5).text()));
                    cells.eq(6).html("$" + $.number((parseFloat($(this).val()) * precio), 2, '.', ','));
                    onCalcularMontos();
                }
            });
            cell.find("#RunCantidad").focus();
        });
        $.each(pnlDatosDetalle.find("#tblTallas > tbody > tr").find("input.numbersOnly"), function () {
            $(this).keyup(function (e) {
                if (e.keyCode === 13) {
                    var talla = pnlDatosDetalle.find("#tblTallas > tbody > tr").find("input").eq($(this).parent().index()).val();
                    if (talla <= 0) {
                        onAgregarFila();
                        $("[name='Estilo']")[0].selectize.focus();
                        $("[name='Estilo']")[0].selectize.clear(true);
                    }
                }
                onAutoSumarPares();
            });
        });
        pnlDatosDetalle.find("[name='Estilo']").change(function () {
            getCombinacionesXEstilo($(this).val());
            getSerieXEstilo($(this).val());
        });
        btnGuardar.click(function () {
            isValid('pnlDatos');
            if (valido) {
                var f = new FormData(pnlDatos.find("#frmNuevo")[0]);
                if (!nuevo) {
                    /*AGREGAR DETALLE*/
                    var detalle = [];
                    tblDetalleCompra.destroy();
                    pnlDatosDetalle.find("#tblDetalle > tbody > tr").each(function (k, v) {
                        var row = $(this).find("td");
                        var material = {
                            ID: row.eq(9).text().replace(/\s+/g, ''),
                            Cantidad: (row.eq(6).text().replace(/\s+/g, '') !== '') ? row.eq(6).text().replace(/\s+/g, '') : 0,
                            Subtotal: (row.eq(8).text().replace(/\s+/g, '') !== '') ? getNumberFloat(row.eq(8).text()) : 0
                        };
                        detalle.push(material);
                    });
                    f.append('Detalle', JSON.stringify(detalle));
                     
                    f.append('DetalleEliminado', JSON.stringify(detalle_eliminado));
                    $.ajax({
                        url: master_url + 'onModificar',
                        type: "POST",
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: f
                    }).done(function (data, x, jq) {
                        onNotify('<span class="fa fa-check fa-lg"></span>', 'SE HA MODIFICADO EL REGISTRO', 'success');
                        getRecords();
                    }).fail(function (x, y, z) {
                        console.log(x, y, z);
                    }).always(function () {
                        HoldOn.close();
                        tblDetalleCompra = pnlDatosDetalle.find("#tblDetalle").DataTable(tblInicial);
                        detalle_eliminado = [];
                    });

                } else {
                    /*AGREGAR DETALLE*/
                    var detalle = [];
                    tblDetalleCompra.destroy();
                    pnlDatosDetalle.find("#tblDetalle > tbody > tr").each(function (k, v) {
                        var row = $(this).find("td");
                        var material = {
                            Estilo: row.eq(1).text().replace(/\s+/g, ''),
                            Color: row.eq(2).text().replace(/\s+/g, ''),
                            Precio: row.eq(7).text().replace(/\s+/g, '').replace(/,/g, "").replace("$", ""),
                            Talla: row.eq(5).text().replace(/\s+/g, ''),
                            Cantidad: (row.eq(6).text().replace(/\s+/g, '') !== '') ? row.eq(6).text().replace(/\s+/g, '') : 0,
                            Subtotal: (row.eq(8).text().replace(/\s+/g, '') !== '') ? getNumberFloat(row.eq(8).text()) : 0
                        };
                        detalle.push(material);
                    });
                    f.append('Detalle', JSON.stringify(detalle));
                    $.ajax({
                        url: master_url + 'onAgregar',
                        type: "POST",
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: f
                    }).done(function (data, x, jq) {
                        onNotify('<span class="fa fa-check fa-lg"></span>', 'SE HA AÑADIDO UN NUEVO REGISTRO', 'success');
                        getRecords();
                    }).fail(function (x, y, z) {
                        console.log(x, y, z);
                    }).always(function () {
                        HoldOn.close();
                        tblDetalleCompra = pnlDatosDetalle.find("#tblDetalle").DataTable(tblInicial);
                    });
                }
            } else {
                onNotify('<span class="fa fa-times fa-lg"></span>', '* DEBE DE COMPLETAR LOS CAMPOS REQUERIDOS *', 'danger');
            }
        });
        
        btnNuevo.click(function () {
            if ($.fn.DataTable.isDataTable('#tblDetalle')) {
                tblDetalleCompra.destroy();
                pnlDatosDetalle.find("#tblDetalle > tbody").html("");
            }
            tblDetalleCompra = pnlDatosDetalle.find("#tblDetalle").DataTable(tblInicial);
            pnlTablero.addClass("d-none");
            pnlDatos.removeClass('d-none');
            pnlDatosDetalle.removeClass('d-none');
            pnlDatos.find("input").val("");
            pnlDatos.find("#FechaMov").datepicker("setDate", currentDate);
            pnlDatos.find('#AfecInv').prop('checked', false);
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
        getRecords();
        getEstilos();
        getTiendas();
        getProveedores();
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
                $("#tblRegistros").html(getTable('tblCompras', data));
                $('#tblCompras tfoot th').each(function () {
                    $(this).html('');
                });
                var thead = $('#tblCompras thead th');
                var tfoot = $('#tblCompras tfoot th');
                thead.eq(0).addClass("d-none");
                tfoot.eq(0).addClass("d-none");
                $.each($.find('#tblCompras tbody tr'), function (k, v) {
                    var td = $(v).find("td");
                    td.eq(0).addClass("d-none");
                });
                var tblSelected = $('#tblCompras').DataTable(tableOptions);
                $('#tblCompras_filter input[type=search]').focus();

                $('#tblCompras tbody').on('click', 'tr', function () {

                    $("#tblCompras tbody tr").removeClass("success");
                    $(this).addClass("success");
                    var dtm = tblSelected.row(this).data();
                    temp = parseInt(dtm[0]);
                });

                $('#tblCompras tbody').on('dblclick', 'tr', function () {
                    $("#tblCompras tbody tr").removeClass("success");
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
                            url: master_url + 'getCompraByID',
                            type: "POST",
                            dataType: "JSON",
                            data: {
                                ID: temp
                            }
                        }).done(function (data, x, jq) {
                            pnlDatos.find("input").val("");
                            $.each(pnlDatos.find("select"), function (k, v) {
                                pnlDatos.find("select")[k].selectize.clear(true);
                            });
                            pnlDatos.find('#AfecInv').prop('checked', false);
                            $.each(data[0], function (k, v) {
                                pnlDatos.find("[name='" + k + "']").val(v);
                                if (pnlDatos.find("[name='" + k + "']").is('select')) {
                                    pnlDatos.find("[name='" + k + "']")[0].selectize.setValue(v);
                                }
                            });

                            if ($.fn.DataTable.isDataTable('#tblDetalle')) {
                                tblDetalleCompra.destroy();
                                pnlDatosDetalle.find("#tblDetalle > tbody").html("");
                            }
                            tblDetalleCompra = pnlDatosDetalle.find("#tblDetalle").DataTable(tblInicial);

                            /*DETALLE*/
                            $.getJSON(master_url + 'getCompraDetalleByID', {ID: temp}).done(function (data, x, jq) {
                                $.each(data, function (k, v) { 
                                    tblDetalleCompra.row.add(['<span class="fa fa-trash fa-2x" onclick="onEliminarFila(this)"></span>',
                                        v.IdEstilo,
                                        v.IdColor,
                                        v.Estilo,
                                        v.Color,
                                        v.Talla,
                                        v.Cantidad,
                                        "$" + $.number(v.Precio, 2, '.', ','),
                                        "$" + $.number(v.SubTotal, 2, '.', ','),
                                        v.ID
                                    ]).draw(false);
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
                            $(':input:text:enabled:visible:first').focus();
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
            }
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
                pnlDatos.find("[name='Tienda']")[0].selectize.addOption({text: v.Tienda, value: v.ID});
            });
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }

    function getSerieXEstilo(Estilo) {
        HoldOn.open({theme: 'sk-bounce', message: 'ESPERE...'});
        $.ajax({
            url: master_url + 'getSerieXEstilo',
            type: "POST",
            dataType: "JSON",
            data: {
                Estilo: Estilo
            }
        }).done(function (data, x, jq) {
            $.each(data[0], function (k, v) {
                pnlDatosDetalle.find("[name='" + k + "']").val(v);
            });
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }

    function getCombinacionesXEstilo(Estilo) {
        HoldOn.open({theme: 'sk-bounce', message: 'ESPERE...'});
        $.ajax({
            url: master_url + 'getCombinacionesXEstilo',
            type: "POST",
            dataType: "JSON",
            data: {
                Estilo: Estilo
            }
        }).done(function (data, x, jq) {
            pnlDatosDetalle.find("[name='Combinacion']")[0].selectize.clearOptions();
            $.each(data, function (k, v) {
                pnlDatosDetalle.find("[name='Combinacion']")[0].selectize.addOption({text: v.Descripcion, value: v.ID});
            });
            pnlDatosDetalle.find("[name='Combinacion']")[0].selectize.open();
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }

    function getEstilos() {
        HoldOn.open({theme: 'sk-bounce', message: 'ESPERE...'});
        $.ajax({
            url: master_url + 'getEstilos',
            type: "POST",
            dataType: "JSON"
        }).done(function (data, x, jq) {
            $.each(data, function (k, v) {
                pnlDatosDetalle.find("[name='Estilo']")[0].selectize.addOption({text: v.Descripcion, value: v.ID});
            });
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }

    function getProveedores() {
        HoldOn.open({theme: 'sk-bounce', message: 'ESPERE...'});
        $.ajax({
            url: master_url + 'getProveedores',
            type: "POST",
            dataType: "JSON"
        }).done(function (data, x, jq) {
            $.each(data, function (k, v) {
                pnlDatos.find("[name='Proveedor']")[0].selectize.addOption({text: v.Nombre, value: v.ID});
            });
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }
    /*AUTOSUMAR PARES*/
    function onAutoSumarPares() {
        var rows = pnlDatosDetalle.find("#tblTallas > tbody > tr");
        var pares = 0;
        $.each(rows.find("input.numbersOnly:enabled"), function () {
            if (rows.find("input").eq($(this).parent().index()).val() > 0) {
                var par = parseInt($(this).val());
                if (par > 0) {
                    pares += par;
                }
            } else {
                $(this).val('');
            }
        });
        pnlDatosDetalle.find("input[name='TPares']").val(pares);
    }
    /*FIN AUTOSUMAR PARES*/
    /*AGREGAR ESTILO-COLOR*/
    function onAgregarFila() {
        var rows = pnlDatosDetalle.find("#tblTallas > tbody > tr");
        var Estilo = pnlDatosDetalle.find("[name='Estilo']");
        var Combinacion = pnlDatosDetalle.find("[name='Combinacion']");
        var Costo = pnlDatosDetalle.find("[name='PrecioMov']");
        if (pnlDatos.find("input[name='TipoDoc']").val() > 0) {
            if (Costo.val() !== '' && parseFloat(Costo.val()) > 0) {
                /*COMPROBAR ESTILO Y COMBINACION*/
                var estilo_combinacion_existen = false;
                $.each(pnlDatosDetalle.find("#tblDetalle > tbody > tr"), function () {
                    var cells = $(this).find("td");
                    if (cells.eq(1).text() === Estilo.val() && cells.eq(2).text() === Combinacion.val()) {
                        estilo_combinacion_existen = true;
                        return false;
                    }
                });
                /*FIN COMPROBAR ESTILO Y COMBINACION*/
                /*VALIDAR ESTILO Y COMBINACION*/
                if (!estilo_combinacion_existen) {
                    $.each(rows.find("input.numbersOnly:enabled"), function () {
                        var talla = rows.find("input").eq($(this).parent().index()).val();
                        if (talla > 0) {
                            var par = parseInt($(this).val());
                            if (par > 0) {
                                tblDetalleCompra.row.add(['<span class="fa fa-trash fa-2x" onclick="onEliminarFila(this)"></span>',
                                    Estilo.val(),
                                    Combinacion.val(),
                                    Estilo.find("option:selected").text(),
                                    Combinacion.find("option:selected").text(),
                                    talla,
                                    $(this).val(),
                                    "$" + $.number(Costo.val(), 2, '.', ','),
                                    "$" + $.number((par * Costo.val()), 2, '.', ','), 0
                                ]).draw(false);
                                $(this).val('');
                            }
                        }
                    });
                    onNotify('<span class="fa fa-check fa-lg"></span>', 'REGISTROS AGREGADOS', 'success');
                    onCalcularMontos();
                } else {
                    onNotify('<span class="fa fa-times fa-lg"></span>', 'YA SE HA AGREGADO ESTA COMBINACIÓN', 'danger');
                }
                /*VALIDAR ESTILO Y COMBINACION*/
            } else {
                onNotify('<span class="fa fa-times fa-lg"></span>', 'DEBE DE ESTABLECER UN COSTO', 'danger');
                pnlDatos.find("input[name='PrecioMov']").focus();
            }
        } else {
            onNotify('<span class="fa fa-times fa-lg"></span>', 'DEBE DE ESTABLECER UN TIPO', 'danger');
            pnlDatos.find("input[name='TipoDoc']").focus();
        }
    }
    var detalle_eliminado = [];
    function onEliminarFila(e) {
        onNotify('<span class="fa fa-times fa-lg"></span>', 'TALLA ELIMINADA', 'danger');           
        detalle_eliminado.push({ID: $(tblDetalleCompra.row($(e).parent().parent()).data()).eq(9)[0]});
        tblDetalleCompra.row($(e).parent().parent()).remove().draw();
        onCalcularMontos(); 
    }

    function onCalcularMontos() {
        var pares = 0;
        var total = 0.0;
        $.each(pnlDatosDetalle.find("#tblDetalle > tbody > tr"), function () {
            var cells = $(this).find("td");
            pares += parseInt(cells.eq(4).text());
            total += getNumberFloat(cells.eq(6).text());
        });
        if (pnlDatosDetalle.find("#tblDetalle > tbody > tr").length > 1) {
            pnlDatosDetalle.find("#Pares").find("strong").text(pares);
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

</script>