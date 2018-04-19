<div class="card border-0">
    <div class="card-body text-dark" > 
        <!--ENCABEZADO-->
        <div id="pnlDatos" >
            <!--ACCIONES-->
            <div class="row">
                <div class="col-md-1">
                    <img src="<?php print base_url(); ?>img/LS.png" width="30px" >
                </div>
                <div class="col-md-4 float-left">
                    <h5>VENTAS: <?php echo $this->session->userdata('TIENDA_NOMBRE') ?></h5>
                </div>
                <div class="col-md-7 float-right" align="right">
                    <button type="button" class="btn btn-danger" id="btnCancelar"><span class="fa fa-window-close"></span> SALIR</button>
                    <button type="button" class="btn btn-secondary" id="btnClientes"><span class="fa fa-users"></span> CLIENTES</button>
                    <button type="button" class="btn btn-info" id="btnExistencias"><span class="fa fa-table"></span> EXISTENCIAS</button>
                    <button type="button" class="btn btn-warning" id="btnCancelarVenta"><span class="fa fa-ban"></span> CANCELAR</button>
                    <button type="button" class="btn btn-primary" id="btnGuardar"><span class="fa fa-save"></span> GUARDAR</button>
                    <button type="button" class="btn btn-success" id="btnCerrar"><span class="fa fa-dollar-sign"></span> CERRAR VENTA(F2)</button>
                </div>
            </div>
            <hr>
            <!--DATOS VENTA-->
            <div id="Encabezado">
                <form id="frmNuevo">
                    <div class="row">
                        <div class="d-none">
                            <input type="text" class="" id="ID" name="ID"  >
                        </div>
                        <div class="col-12 col-md-1">
                            <label for="TipoDoc">Tp*</label>  
                            <input type="text" class="form-control form-control-sm numbersOnly" id="TipoDoc" maxlength="1" name="TipoDoc" required >
                        </div>
                        <div class="col-12 col-md-1">
                            <label for="DocMov">No.*</label>  
                            <input type="text" class="form-control form-control-sm numbersOnly " maxlength="10" name="DocMov" disabled="">
                        </div>
                        <div class="col-12 col-md-3">
                            <label for="Cliente">Cliente*</label>
                            <select class="form-control form-control-sm required"  name="Cliente"> 
                                <option value=""></option>  
                            </select>
                        </div>
                        <div class="col-12 col-md-3">
                            <label for="Vendedor">Vendedor*</label>
                            <select class="form-control form-control-sm required"  name="Vendedor"> 
                                <option value=""></option>  
                            </select>
                        </div>
                        <div class="col-12 col-md-2">
                            <label for="FechaMov">Fecha</label>  
                            <input type="text" class="form-control form-control-sm required" id="FechaMov" name="FechaMov"  placeholder="XX/XX/XXXX" data-provide="datepicker" data-date-format="dd/mm/yyyy" readonly="">
                        </div>

                        <div class="col-12 col-md-2">
                            <label for="MetodoPago">Método de Pago*</label>
                            <select class="form-control form-control-sm required"  name="MetodoPago"> 
                                <option value=""></option>  
                            </select>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!--CONTROLES PARA AGREGAR A LA VENTA-->
        <div id="pnlControlesDetalle">
            <div class="row">
                <div class="col-sm-2">
                    <label for="Estilo">Descuento</label>
                    <select class="form-control form-control-sm "  name="Descuento" > 
                        <option value=""></option>  
                    </select>
                </div>
                <div class="col-sm-2">
                    <label for="CodigoBarras">Código Barras</label>  
                    <input type="text" class="form-control form-control-sm numbersOnly " maxlength="10" name="CodigoBarras"  >
                </div>
                <div class="col-sm-2">
                    <label for="Estilo">Estilo</label>
                    <select class="form-control form-control-sm "  name="Estilo"> 
                        <option value=""></option>  
                    </select>
                </div>
                <div class="col-sm-2">
                    <label for="Combinacion">Color*</label>
                    <select class="form-control form-control-sm "  name="Combinacion"> 
                        <option value=""></option>  
                    </select>
                </div>
                <div class="col-sm-1">
                    <label for="Talla">Talla</label>  
                    <input type="text" class="form-control form-control-sm numbersOnly" maxlength="4" name="Talla" >
                </div>
                <div class="col-sm-1">
                    <label for="Cantidad">Cant.</label>  
                    <input type="text" class="form-control form-control-sm numbersOnly" name="Cantidad">
                </div>
                <div class="col-sm-1">
                    <label for="Precio">Precio</label>  
                    <input type="text" class="form-control form-control-sm numbersOnly" id="Precio" maxlength="8" name="Precio" >
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <label for="">Tallas y Existencias</label> 
                    <table id="tblTallas" class="table Tallas" style="overflow-x:auto; white-space: nowrap;">
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
                            </tr>
                            <tr class="disabledForms" id="rExistencias">
                                <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex1"></td>
                                <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex2"></td>
                                <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex3"></td>
                                <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex4"></td>
                                <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex5"></td>
                                <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex6"></td>
                                <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex7"></td>
                                <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex8"></td>
                                <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex9"></td>
                                <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex10"></td>
                                <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex11"></td>
                                <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex12"></td>
                                <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex13"></td>
                                <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex14"></td>
                                <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex15"></td>
                                <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex16"></td>
                                <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex17"></td>
                                <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex18"></td>
                                <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex19"></td>
                                <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex20"></td>
                                <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex21"></td>
                                <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex22"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--DETALLE-->
        <div class="" id="pnlDatosDetalle">
            <!--DETALLE-->
            <div class="row">
                <div class=" col-md-9 datatable-wide">
                    <div class="table-responsive ">
                        <table id="tblDetalle" class="table table-sm" width="100%">
                            <thead>
                                <tr>
                                    <th scope="col" class="d-none">IDEstilo</th>
                                    <th scope="col" class="d-none">IDColor</th>
                                    <th scope="col">Estilo</th>
                                    <th scope="col">Color</th>
                                    <th scope="col">Talla</th>
                                    <th scope="col">Cantidad</th>
                                    <th scope="col">Precio</th>
                                    <th scope="col">SubTotal</th>
                                    <th scope="col" class="d-none">IDR</th>
                                    <th scope="col" class="d-none">Orden</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <div class="" align="center" style="background-color: #fff ">
                        <div class="row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-2 text-dark">
                                Pares<br>
                                <div id="Pares"><strong>0</strong></div>
                            </div>
                            <div class="col-sm-2 text-info">
                                Subtotal<br>
                                <div id="SubTotal"><strong>$0.0</strong></div>
                            </div>
                            <div class="col-sm-2 text-danger">
                                Desc.<br>
                                <div id="Descuento" ><strong>$0.0</strong></div>
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
                <div class="col-md-3">
                    <label for="">Foto del Artículo</label> 
                    <div id="VistaPrevia" >
                        <img src="<?php echo base_url(); ?>img/camera.png" class="img-thumbnail img-fluid"/>
                    </div>

                </div>

            </div>
            <!--FIN DETALLE-->
        </div>
    </div>
</div>
<!--SCRIPT-->
<script>
    var master_url = base_url + 'index.php/Ventas/';
    var pnlDatos = $("#pnlDatos");
    var pnlDatosDetalle = $("#pnlDatosDetalle");
    var pnlControlesDetalle = $("#pnlControlesDetalle");
    var pnlTablero = $("#pnlTablero");
    var btnGuardar = pnlDatos.find("#btnGuardar");
    var btnCancelar = pnlDatos.find("#btnCancelar");
    var btnEliminar = $("#btnEliminar");
    var currentDate = new Date();
    var nuevo = true;
    /*DATATABLE GLOBAL*/
    var tblDetalleVenta;
    var tblInicial = {
        "dom": 'frt',
        "autoWidth": false,
        "colReorder": true,
        "bLengthChange": false,
        "deferRender": true,
        "scrollY": 270,
        "scrollCollapse": false,
        "bSort": true,
        "aaSorting": [
            [9, 'desc']/*ID*/
        ],
        "columnDefs": [
            {
                "targets": [0],
                "visible": false,
                "searchable": false
            },
            {
                "targets": [1],
                "visible": false,
                "searchable": false
            },
            {
                "targets": [8],
                "visible": false,
                "searchable": false
            },
            {
                "targets": [9],
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
    //Ocultar Navegación
    $(document).ready(function () {
        //Inicializar Componentes
        if ($.fn.DataTable.isDataTable('#tblDetalle')) {
            tblDetalleVenta.destroy();
            pnlDatosDetalle.find("#tblDetalle > tbody").html("");
        }
        tblDetalleVenta = pnlDatosDetalle.find("#tblDetalle").DataTable(tblInicial);
        existencias = [];
        pnlDatos.find("input").val("");
        $.each(pnlDatos.find("select"), function (k, v) {
            pnlDatos.find("select")[k].selectize.clear(true);
        });
        $(':input:text:enabled:visible:first').focus();
        pnlDatos.find("#FechaMov").datepicker("setDate", currentDate);
        pnlDatos.find('#TipoDoc').val('2');
        $('#Encabezado').removeClass('disabledForms');
        pnlControlesDetalle.removeClass('disabledForms');
        btnGuardar.removeClass('d-none');
        nuevo = true;
        //Calula los montos si se cambia el tipo de documento fiscal o no fiscal
        pnlDatos.find("input[name='TipoDoc']").keyup(function () {
            if (pnlDatosDetalle.find('#tblDetalle > tbody > tr').length > 0) {
                onCalcularMontos();
            }
        });
        //Validaciones tallas
        pnlControlesDetalle.find("[name='Talla']").blur(function () {
            //Verificar que los combos de estilo y color esten llenos
            if (pnlControlesDetalle.find("[name='Estilo']").val() !== "" && pnlControlesDetalle.find("[name='Combinacion']").val() !== "") {
                var tallaCaptura = $(this).val();
                var tallaValida = false;
                $.each(pnlControlesDetalle.find("#tblTallas > tbody > tr").find("input.numbersOnly").filter(':enabled'), function () {
                    var talla = pnlControlesDetalle.find("#tblTallas > tbody > tr").find("input").eq($(this).parent().index()).val();
                    if (parseFloat(talla) > 0) {
                        if (parseFloat(tallaCaptura) === parseFloat(talla)) {
                            tallaValida = true;
                            return false;
                        } else {
                            tallaValida = false;
                        }
                    }
                });
                if (!tallaValida) {
                    swal({
                        title: 'INFO',
                        text: 'Introduce una talla válida',
                        icon: 'warning'
                    }).then((result) => {
                        if (result) {
                            pnlControlesDetalle.find("[name='Talla']").val('');
                            pnlControlesDetalle.find("[name='Talla']").focus();
                        }
                    });

                }
            } else {
                swal({
                    title: 'INFO',
                    text: 'Introduce un estilo y color',
                    icon: 'warning'
                }).then((result) => {
                    if (result) {
                        pnlDatosDetalle.find("[name='Talla']").val('');
                        pnlDatosDetalle.find("[name='Estilo']")[0].selectize.focus();
                    }
                });
            }

        });
        //Validacion de existencias en cantidad
        pnlControlesDetalle.find("[name='Cantidad']").change(function () {
            var CantidadCaptura = $(this).val();
            var TallaCapturada = pnlControlesDetalle.find("[name='Talla']").val();
            var CantidadValida = false;
            var tallas = pnlControlesDetalle.find("#tblTallas > tbody > tr").eq(0);
            var existencias = pnlControlesDetalle.find("#tblTallas > tbody > tr").eq(1);

            var existenciaReal = 0;
            $.each(tallas.find("input.numbersOnly"), function () {
                if (parseFloat(TallaCapturada) === parseFloat($(this).val())) {
                    existenciaReal = existencias.find('td').eq($(this).parent().index()).find("input").val();
                    if (existenciaReal >= CantidadCaptura) {
                        CantidadValida = true;
                    } else {
                        CantidadValida = false;
                    }
                }
            });
            if (!CantidadValida) {
                swal({
                    title: 'INFO',
                    text: 'No Existen existencias en esta talla',
                    icon: 'warning'
                }).then((result) => {
                    if (result) {
                        pnlControlesDetalle.find("[name='Cantidad']").val('');
                        pnlControlesDetalle.find("[name='Cantidad']").focus();
                    }
                });

            }
        });
        //Sombreado de la fila
        pnlDatosDetalle.find('#tblDetalle tbody').on('click', 'tr', function () {
            pnlDatosDetalle.find("#tblDetalle tbody tr").removeClass("success");
            $(this).addClass("success");
        });
        //Edicion de precio
        pnlDatosDetalle.find('#tblDetalle tbody').on('dblclick', 'tr', function () {
            $.each(pnlDatosDetalle.find('#tblDetalle > tbody > tr'), function () {
                var cell = $(this).find("td").eq(4);
                var rcantidad = cell.text() !== '' ? cell.text() : cell.find("#RunCantidad").val();
                cell.html(rcantidad);
            });
            var tr = this;
            var row = $(this);
            var cell = row.find("td").eq(4); 
            var index = tblDetalleVenta.row(tr).index();
            cell.html('<input type="text" class="form-control form-control-sm numbersOnly" maxlength="3" id="RunCantidad" value="' + getNumberFloat(cell.text()) + '">');
            cell.find("#RunCantidad").focusout(function () {
                var data = tblDetalleVenta.row(tr).data();
                var cantidad = parseFloat((data[5]));
                tblDetalleVenta.cell(index/*ID FILA*/, 6/*COLUMNA*/).data("$" + $.number($(this).val(), 2, '.', ','));
                tblDetalleVenta.cell(index/*ID FILA*/, 7/*COLUMNA*/).data("$" + $.number(parseFloat(getNumberFloat(data[6])) * parseFloat(cantidad), 2, '.', ','));
                onCalcularMontos();
            });
            cell.find("#RunCantidad").keyup(function (e) {
                if (e.keyCode === 13) {
                    var data = tblDetalleVenta.row(tr).data();
                    var cantidad = parseFloat((data[5]));
                    tblDetalleVenta.cell(index/*ID FILA*/, 6/*COLUMNA*/).data("$" + $.number($(this).val(), 2, '.', ','));
                    tblDetalleVenta.cell(index/*ID FILA*/, 7/*COLUMNA*/).data("$" + $.number(parseFloat(getNumberFloat(data[6])) * parseFloat(cantidad), 2, '.', ','));
                    onCalcularMontos();
                }
            });
            cell.find("#RunCantidad").focus();
        });
        //Evento que controla la insercion de filas a la tabla cuando se termina de capturar 
        pnlControlesDetalle.find("[name='Precio']").blur(function () {
            var Estilo = pnlControlesDetalle.find("[name='Estilo']");
            var Color = pnlControlesDetalle.find("[name='Combinacion']");
            var Talla = pnlControlesDetalle.find("[name='Talla']");
            var Precio = pnlControlesDetalle.find("[name='Precio']");
            var Cantidad = pnlControlesDetalle.find("[name='Cantidad']");

            if (Estilo.val() !== '' && Color.val() !== ''
                    && Talla.val() !== '' && Precio.val() !== '' && Cantidad.val() !== '')
            {
//            onAgregarExistencias();
                onAgregarFila();
                $("[name='CodigoBarras']").focus();
                $("[name='Estilo']")[0].selectize.clear(true);
                $("[name='Combinacion']")[0].selectize.clear(true);
                $("[name='Combinacion']")[0].selectize.clearOptions();
                $("[name='Precio']").val('');
                $("[name='Cantidad']").val('');
                $("[name='Talla']").val('');
            } else {
                swal({
                    title: 'INFO',
                    text: 'Completa todos los campos',
                    icon: 'warning'
                }).then((result) => {
                    if (result) {
                        $("[name='Cantidad']").focus();
                    }
                });
            }
        });
        //Evento en el select de estilo para traer las tallas y los colores
        pnlControlesDetalle.find("[name='Estilo']").change(function () {
            pnlDatosDetalle.find('#rExistencias').find("input").val("0");
            $("[name='Combinacion']")[0].selectize.clear(true);
            $("[name='Combinacion']")[0].selectize.clearOptions();
            getCombinacionesXEstilo($(this).val());
            getSerieXEstilo($(this).val());
            getFotoXEstilo($(this).val());
        });
        //Obtiene las existencias del inventario
        pnlControlesDetalle.find("[name='Combinacion']").change(function () {
            getExistenciasXEstiloXCombinacion(pnlControlesDetalle.find("[name='Estilo']").val(), pnlControlesDetalle.find("[name='Combinacion']").val());

        });
        //Evento botones
        btnGuardar.click(function () {
            swal({
                buttons: ["Cancelar", "Aceptar"],
                title: 'Estas Seguro?',
                text: "Al guardar el movimiento ya no podrás realizar cambios",
                icon: "info"
            }).then((result) => {
                if (result) {
                    isValid('pnlDatos');
                    if (valido) {
                        HoldOn.open({
                            theme: "sk-bounce",
                            message: "GUARDANDO DATOS..."
                        });
                        var f = new FormData(pnlDatos.find("#frmNuevo")[0]);
                        if (!nuevo) {
                            f.append('AfecInv', pnlDatos.find("#AfecInv")[0].checked ? 1 : 0);
                            $.ajax({
                                url: master_url + 'onModificar',
                                type: "POST",
                                cache: false,
                                contentType: false,
                                processData: false,
                                data: f
                            }).done(function (data, x, jq) {
                                if (pnlDatos.find("#AfecInv")[0].checked) {
                                    pnlDatos.find('#dAfecInv').addClass('disabledForms');
                                    $('#Encabezado').addClass('disabledForms');
                                    $('#ControlesDetalle').addClass('disabledForms');
                                    btnGuardar.addClass('d-none');
                                    swal('INFO', 'EXISTENCIAS ACTUALIZADAS', 'success');
                                }
                                onNotify('<span class="fa fa-check fa-lg"></span>', 'SE HA MODIFICADO EL REGISTRO', 'success');
                                getRecords();
                            }).fail(function (x, y, z) {
                                console.log(x, y, z);
                            }).always(function () {
                                HoldOn.close();
                            });
                        } else {
                            /*AGREGAR DETALLE*/
                            var detalle = [];
                            //Destruye la instancia de datatable
                            tblDetalleVenta.destroy();
                            //Iteramos en la tabla natural
                            pnlDatosDetalle.find("#tblDetalle > tbody > tr").each(function (k, v) {
                                var row = $(this).find("td");
                                //Se declara y llena el objeto obteniendo su valor por el indice y se elimina cualquier espacio
                                var material = {
                                    Estilo: row.eq(0).text().replace(/\s+/g, ''),
                                    Color: row.eq(1).text().replace(/\s+/g, ''),
                                    Precio: row.eq(6).text().replace(/\s+/g, '').replace(/,/g, "").replace("$", ""),
                                    Talla: row.eq(4).text().replace(/\s+/g, ''),
                                    Cantidad: (row.eq(5).text().replace(/\s+/g, '') !== '') ? row.eq(5).text().replace(/\s+/g, '') : 0,
                                    Subtotal: (row.eq(7).text().replace(/\s+/g, '') !== '') ? getNumberFloat(row.eq(7).text()) : 0
                                };
                                //Se mete el objeto al arreglo
                                detalle.push(material);
                            });
                            //Convertimos a cadena el objeto en formato json
                            f.append('Detalle', JSON.stringify(detalle));
                            f.append('Existencias', JSON.stringify(existencias));
                            f.append('AfecInv', pnlDatos.find("#AfecInv")[0].checked ? 1 : 0);
                            $.ajax({
                                url: master_url + 'onAgregar',
                                type: "POST",
                                cache: false,
                                contentType: false,
                                processData: false,
                                data: f
                            }).done(function (data, x, jq) {
                                nuevo = false;
                                pnlDatos.find('#ID').val(data);
                                if (pnlDatos.find("#AfecInv")[0].checked) {
                                    pnlDatos.find('#dAfecInv').addClass('disabledForms');
                                    $('#Encabezado').addClass('disabledForms');
                                    $('#ControlesDetalle').addClass('disabledForms');
                                    btnGuardar.addClass('d-none');
                                    swal('INFO', 'EXISTENCIAS ACTUALIZADAS', 'success');
                                }
                                onNotify('<span class="fa fa-check fa-lg"></span>', 'SE HA AÑADIDO UN NUEVO REGISTRO', 'success');
                                nuevo = false;
                                getRecords();
                            }).fail(function (x, y, z) {
                                console.log(x, y, z);
                            }).always(function () {
                                HoldOn.close();
                                tblDetalleVenta = pnlDatosDetalle.find("#tblDetalle").DataTable(tblInicial);
                            });
                        }
                    } else {
                        onNotify('<span class="fa fa-times fa-lg"></span>', '* DEBE DE COMPLETAR LOS CAMPOS REQUERIDOS *', 'danger');
                    }
                }
            });
        });
        btnCancelar.click(function () {
            $(location).attr('href', base_url);
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
                            if (data === '1') {
                                swal("Hecho", "El registro se ha eliminado!", 'success')
                                getRecords();
                            } else {
                                swal("Error al borrar registro!", "El movimiento ya afectó el inventario", "info");
                            }
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
        //getRecords();
        getEstilos();
        getClientes();
        getDescuentos();
        getMetodosPago();
        getVendedores();
        handleEnter();
    });

    /*AGREGAR ESTILO-COLOR*/
    var n = 1;
    function onAgregarFila() {
        console.log('AGREGANDO FILA...');
        n = (n > 0) ? n : 1;

        var Estilo = pnlControlesDetalle.find("[name='Estilo']");
        var Combinacion = pnlControlesDetalle.find("[name='Combinacion']");
        var Costo = pnlControlesDetalle.find("[name='Precio']");
        var Talla = pnlControlesDetalle.find("[name='Talla']");
        var Cantidad = pnlControlesDetalle.find("[name='Cantidad']");

        if (pnlDatos.find("input[name='TipoDoc']").val() > 0) {
            /*COMPROBAR ESTILO, COMBINACION Y TALLA*/
            var estilo_combinacion_existen = false;

            /*BUSCAR FILAS EN EL DATATABLE*/
            tblDetalleVenta.rows().every(function (rowIdx, tableLoop, rowLoop) {
                /*DATOS POR FILA*/
                var data = this.data();

                /*ESTILO, COMBINACION, TALLA*/
                var xEstilo = data[0];
                var xCombinacion = data[1];
                var xTalla = data[4];
                console.log("\nESTILO " + xEstilo + ", COLOR " + xCombinacion + ", TALLA " + xTalla + "\n");
                if (xEstilo === Estilo.val() && xCombinacion === Combinacion.val() && xTalla === Talla.val()) {
                    estilo_combinacion_existen = true;
                    var NuevaCantidad = parseFloat((data[5]/*CANTIDAD*/)) + parseFloat(Cantidad.val());
                    tblDetalleVenta.cell(rowIdx/*ID FILA*/, 5/*COLUMNA*/).data(NuevaCantidad);
                    tblDetalleVenta.cell(rowIdx/*ID FILA*/, 7/*COLUMNA*/).data("$" + $.number(parseFloat(getNumberFloat(data[6])) * parseFloat(NuevaCantidad), 2, '.', ','));
                    return false;
                }
            });
            /*FIN COMPROBAR ESTILO, COMBINACION Y TALLA*/

            /*VALIDAR QUE EXISTA*/
            if (!estilo_combinacion_existen) {
                tblDetalleVenta.row.add([
                    Estilo.val(),
                    Combinacion.val(),
                    Estilo.find("option:selected").text(),
                    Combinacion.find("option:selected").text(),
                    Talla.val(),
                    Cantidad.val(),
                    "$" + $.number(Costo.val(), 2, '.', ','),
                    "$" + $.number((Cantidad.val() * Costo.val()), 2, '.', ','),
                    0,
                    n
                ]).draw(false);
                n += 1;
                //Limpia la tabla de tallas y existencias
                var tallas = pnlControlesDetalle.find("#tblTallas > tbody > tr");
                $.each(tallas.find("input.numbersOnly"), function () {
                    $(this).val('');
                });
                onNotify('<span class="fa fa-check fa-lg"></span>', 'REGISTROS AGREGADOS', 'success');
                onCalcularMontos();
            }
            onCalcularMontos();

        } else {
            onNotify('<span class="fa fa-times fa-lg"></span>', 'DEBE DE ESTABLECER UN TIPO', 'danger');
            pnlDatos.find("input[name='TipoDoc']").focus();
        }
    }

    var existencias = [];
    function onAgregarExistencias() {
        var renglonExistencia = {
            Tienda: pnlDatos.find("[name='Tienda']")[0].selectize.getValue(),
            Documento: pnlDatos.find("[name='DocMov']").val(),
            Estilo: pnlDatosDetalle.find("[name='Estilo']")[0].selectize.getValue(),
            Color: pnlDatosDetalle.find("[name='Combinacion']")[0].selectize.getValue(),
            Ex1: (pnlDatosDetalle.find("[name='Ex1']").val() !== '') ? pnlDatosDetalle.find("[name='Ex1']").val() : 0,
            Ex2: (pnlDatosDetalle.find("[name='Ex2']").val() !== '') ? pnlDatosDetalle.find("[name='Ex2']").val() : 0,
            Ex3: (pnlDatosDetalle.find("[name='Ex3']").val() !== '') ? pnlDatosDetalle.find("[name='Ex3']").val() : 0,
            Ex4: (pnlDatosDetalle.find("[name='Ex4']").val() !== '') ? pnlDatosDetalle.find("[name='Ex4']").val() : 0,
            Ex5: (pnlDatosDetalle.find("[name='Ex5']").val() !== '') ? pnlDatosDetalle.find("[name='Ex5']").val() : 0,
            Ex6: (pnlDatosDetalle.find("[name='Ex6']").val() !== '') ? pnlDatosDetalle.find("[name='Ex6']").val() : 0,
            Ex7: (pnlDatosDetalle.find("[name='Ex7']").val() !== '') ? pnlDatosDetalle.find("[name='Ex7']").val() : 0,
            Ex8: (pnlDatosDetalle.find("[name='Ex8']").val() !== '') ? pnlDatosDetalle.find("[name='Ex8']").val() : 0,
            Ex9: (pnlDatosDetalle.find("[name='Ex9']").val() !== '') ? pnlDatosDetalle.find("[name='Ex9']").val() : 0,
            Ex10: (pnlDatosDetalle.find("[name='Ex10']").val() !== '') ? pnlDatosDetalle.find("[name='Ex10']").val() : 0,
            Ex11: (pnlDatosDetalle.find("[name='Ex11']").val() !== '') ? pnlDatosDetalle.find("[name='Ex11']").val() : 0,
            Ex12: (pnlDatosDetalle.find("[name='Ex12']").val() !== '') ? pnlDatosDetalle.find("[name='Ex12']").val() : 0,
            Ex13: (pnlDatosDetalle.find("[name='Ex13']").val() !== '') ? pnlDatosDetalle.find("[name='Ex13']").val() : 0,
            Ex14: (pnlDatosDetalle.find("[name='Ex14']").val() !== '') ? pnlDatosDetalle.find("[name='Ex14']").val() : 0,
            Ex15: (pnlDatosDetalle.find("[name='Ex15']").val() !== '') ? pnlDatosDetalle.find("[name='Ex15']").val() : 0,
            Ex16: (pnlDatosDetalle.find("[name='Ex16']").val() !== '') ? pnlDatosDetalle.find("[name='Ex16']").val() : 0,
            Ex17: (pnlDatosDetalle.find("[name='Ex17']").val() !== '') ? pnlDatosDetalle.find("[name='Ex17']").val() : 0,
            Ex18: (pnlDatosDetalle.find("[name='Ex18']").val() !== '') ? pnlDatosDetalle.find("[name='Ex18']").val() : 0,
            Ex19: (pnlDatosDetalle.find("[name='Ex19']").val() !== '') ? pnlDatosDetalle.find("[name='Ex19']").val() : 0,
            Ex20: (pnlDatosDetalle.find("[name='Ex20']").val() !== '') ? pnlDatosDetalle.find("[name='Ex20']").val() : 0,
            Ex21: (pnlDatosDetalle.find("[name='Ex21']").val() !== '') ? pnlDatosDetalle.find("[name='Ex21']").val() : 0,
            Ex22: (pnlDatosDetalle.find("[name='Ex22']").val() !== '') ? pnlDatosDetalle.find("[name='Ex22']").val() : 0,
            Precio: pnlDatosDetalle.find("[name='PrecioMov']").val(),
            PrecioMenudeo: pnlDatosDetalle.find("[name='Menudeo']").val(),
            PrecioMayoreo: pnlDatosDetalle.find("[name='Mayoreo']").val()
        };
        existencias.push(renglonExistencia);
    }

    function onCalcularMontos() {
        var pares = 0;
        var total = 0.0;
        $.each(tblDetalleVenta.rows().data(), function () {
            pares += parseInt($(this)[5]);
            total += getNumberFloat($(this)[7]);
        });
        if (pnlDatosDetalle.find("#tblDetalle > tbody > tr").length >= 1) {
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
                pnlControlesDetalle.find("[name='" + k + "']").val(v);
            });
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }

    function getExistenciasXEstiloXCombinacion(Estilo, Combinacion) {
        HoldOn.open({theme: 'sk-bounce', message: 'ESPERE...'});
        $.ajax({
            url: master_url + 'getExistenciasXEstiloXCombinacion',
            type: "POST",
            dataType: "JSON",
            data: {
                Estilo: Estilo,
                Combinacion: Combinacion
            }
        }).done(function (data, x, jq) {
            if (data.length > 0) {
                var existencias = data[0];
                pnlControlesDetalle.find("[name='Precio']").val(existencias.PrecioMenudeo);
                $.each(data[0], function (k, v) {
                    pnlControlesDetalle.find("[name='" + k + "']").val(v);
                });
            } else {
                pnlControlesDetalle.find('#rExistencias').find("input").val("0");
                pnlControlesDetalle.find("[name='Precio']").val("");
            }
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
            $.each(data, function (k, v) {
                pnlControlesDetalle.find("[name='Combinacion']")[0].selectize.addOption({text: v.Descripcion, value: v.ID});
            });
            pnlControlesDetalle.find("[name='Combinacion']")[0].selectize.open();
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }

    function getFotoXEstilo(Estilo) {
        HoldOn.open({
            theme: "sk-bounce",
            message: "CARGANDO DATOS..."
        });
        $.ajax({
            url: master_url + 'getEstiloByID',
            type: "POST",
            dataType: "JSON",
            data: {
                Estilo: Estilo
            }
        }).done(function (data, x, jq) {
            if (data.length > 0) {
                var dtm = data[0];
                if (dtm.Foto !== null && dtm.Foto !== undefined && dtm.Foto !== '') {
                    var ext = getExt(dtm.Foto);
                    if (ext === "gif" || ext === "jpg" || ext === "png" || ext === "jpeg") {
                        pnlDatosDetalle.find("#VistaPrevia").html('<img src="' + base_url + dtm.Foto + '" class="img-thumbnail img-fluid" width="400px" />');
                    }
                    if (ext !== "gif" && ext !== "jpg" && ext !== "jpeg" && ext !== "png" && ext !== "PDF" && ext !== "Pdf" && ext !== "pdf") {
                        pnlDatosDetalle.find("#VistaPrevia").html('<img src="' + base_url + 'img/camera.png" class="img-thumbnail img-fluid"/>');
                    }
                } else {
                    pnlDatosDetalle.find("#VistaPrevia").html('<img src="' + base_url + 'img/camera.png" class="img-thumbnail img-fluid"/>');
                }
            }
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
                pnlControlesDetalle.find("[name='Estilo']")[0].selectize.addOption({text: v.Descripcion, value: v.ID});
            });
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }

    function getClientes() {
        HoldOn.open({theme: 'sk-bounce', message: 'ESPERE...'});
        $.ajax({
            url: master_url + 'getClientes',
            type: "POST",
            dataType: "JSON"
        }).done(function (data, x, jq) {
            $.each(data, function (k, v) {
                pnlDatos.find("[name='Cliente']")[0].selectize.addOption({text: v.Nombre, value: v.ID});
            });
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }

    function getDescuentos() {
        HoldOn.open({theme: 'sk-bounce', message: 'ESPERE...'});
        $.ajax({
            url: master_url + 'getDescuentos',
            type: "POST",
            dataType: "JSON"
        }).done(function (data, x, jq) {
            $.each(data, function (k, v) {
                pnlControlesDetalle.find("[name='Descuento']")[0].selectize.addOption({text: v.SValue, value: v.ID});
            });
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }

    function getMetodosPago() {
        HoldOn.open({theme: 'sk-bounce', message: 'ESPERE...'});
        $.ajax({
            url: master_url + 'getMetodosPago',
            type: "POST",
            dataType: "JSON"
        }).done(function (data, x, jq) {
            $.each(data, function (k, v) {
                pnlDatos.find("[name='MetodoPago']")[0].selectize.addOption({text: v.SValue, value: v.ID});
            });
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }

    function getVendedores() {
        HoldOn.open({theme: 'sk-bounce', message: 'ESPERE...'});
        $.ajax({
            url: master_url + 'getVendedores',
            type: "POST",
            dataType: "JSON"
        }).done(function (data, x, jq) {
            $.each(data, function (k, v) {
                pnlDatos.find("[name='Vendedor']")[0].selectize.addOption({text: v.Empleado, value: v.ID});
            });
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }

</script>