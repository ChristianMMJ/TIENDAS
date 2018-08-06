<!--MODAL CERRAR VENTA-->
<div class="modal fade" id="mdlCerrarVenta" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">CERRAR VENTA</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 text-center" >
                        <h5 for="TOTAL" class="text-info">TOTAL A PAGAR:</h5>
                        <strong><legend for="TOTAL" class="text-info" id="Importe"></legend></strong>
                        <h6 for="TOTAL" class="text-info" id="ImporteLetra"></h6>
                    </div>
                </div>
                <hr>
                <br>
                <div class="row">
                    <div class="col-12 text-center">
                        <h5 for="PAGO" class="text-success">PAGO CLIENTE:</h5>
                        <input type="text" placeholder="$ 0.00" class="form-control numbersOnly text-success input-lg money" id="Pago" name="Pago" maxlength="10" >
                    </div>
                </div>
                <br>
                <hr>
                <br>
                <div class="row">
                    <div class="col-12 text-center">
                        <h5 for="CAMBIO" class="text-warning">CAMBIO:</h5>
                        <strong><legend for="TOTAL" class="text-warning" id="Cambio">$ 0.00</legend></strong>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-raised btn-primary d-none" id="btnFinVenta">ACEPTAR</button>
                <button type="button" class="btn btn-raised btn-danger" data-dismiss="modal">REGRESAR</button>
            </div>
        </div>
    </div>
</div>
<!--MODAL BUSCAR MANUAL-->
<div class="modal fade modal-fullscreen " id="mdlBuscaManual" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">SELECCIONAR ARTÍCULO</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!--AGREGAR MANUAL-->
                <div class="row">
                    <div class="col-12 col-md-4 col-sm-4">
                        <label for="Estilo">Estilo</label>
                        <div class="input-group mb-3">
                            <select class="form-control form-control-sm "  name="Estilo">
                                <option value=""></option>
                            </select>
                            <span class="input-group-prepend">
                                <span class="input-group-text text-dark" id="btnExistencias" onclick="onVerExistencias()" data-toggle="tooltip" data-placement="top" title="Existencia en Tiendas">
                                    <i class="fa fa-sitemap"></i>
                                </span>
                            </span>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 col-sm-4">
                        <label for="Combinacion">Color*</label>
                        <select class="form-control form-control-sm "  name="Combinacion">
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="col-12 col-md-1 col-sm-1">
                        <label for="Talla">Talla</label>
                        <input type="text" class="form-control form-control-sm numbersOnly" maxlength="4" name="Talla" >
                    </div>
                    <div class="col-12 col-md-1 col-sm-1">
                        <label for="Cantidad">Cant.</label>
                        <input type="text" class="form-control form-control-sm numbersOnly" name="Cantidad">
                    </div>
                    <div class="col-12 col-md-1 col-sm-1">
                        <label for="Precio">Precio</label>
                        <input type="text" class="form-control form-control-sm numbersOnly" id="Precio" maxlength="8" name="Precio" >
                    </div>
                    <div class="col-12 col-md-1 col-sm-1">
                        <br>
                        <button  class="btn btn-primary btn-sm" id="btnAgregarDetalle" data-toggle="tooltip" data-placement="top" title="Agregar Producto" >
                            <i class="fa fa-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <span class="input-group-text text-dark d-none" id="btnExistencias" onclick="onVerExistencias()" data-toggle="tooltip" data-placement="top" title="Existencia en Tiendas">
                            <i class="fa fa-search"></i>
                        </span>
                        <label for="">Tallas y Existencias (Ctrl+E para ver en otras tiendas)</label>
                        <table id="tblTallas" class="table Tallas" style="overflow-x:auto; white-space: nowrap;">
                            <thead></thead>
                            <tbody>
                                <tr id="rTallasBuscaManual">
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

            <!--            <div class="modal-footer">
                            <button type="button" class="btn btn-raised btn-primary" id="btnAceptaBusqueda">ACEPTAR</button>
                            <button type="button" class="btn btn-raised btn-danger" data-dismiss="modal">REGRESAR</button>
                        </div>-->
        </div>
    </div>
</div>
<!--MODAL EXISTENCIAS GENERALES-->
<div class="modal fade modal-fullscreen" id="mdlInfoExistencia" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Existencias en Tiendas:</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-6" >
                        <label for="Estilo">Estilo*</label>
                        <select class="form-control form-control-sm required"  name="EstiloEx">
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="col-sm-6" >
                        <label for="Color">Color*</label>
                        <select class="form-control form-control-sm required"  name="ColorEx">
                            <option value=""></option>
                        </select>
                    </div>
                </div>
                <br><hr><br>
                <div class="card-block">
                    <div class="table-responsive" id="tblRegistrosExistencias"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-raised btn-primary" data-dismiss="modal">ACEPTAR</button>
            </div>
        </div>
    </div>
</div>
<!--VENTA PRINCIPAL-->
<div class="card border-0">
    <div class="card-body text-dark" >
        <!--ENCABEZADO-->
        <div id="pnlDatos" >
            <!--ACCIONES-->
            <div class="row">
                <div class="col-md-5 float-left">
                    <span class="badge badge-primary" style="font-size:16px ;">VENTAS: <?php echo $this->session->userdata('TIENDA_NOMBRE') ?></span>
                </div>
                <div class="col-md-2 text-center">
                    <span class="badge badge-danger d-none" id="lCancelada" style="font-size:16px ;">CANCELADA</span>
                </div>
                <div class="col-md-5 float-right" align="right">
                    <button type="button" class="btn btn-danger btn-sm" id="btnSalir"><span class="fa fa-window-close"></span> SALIR (ESC)</button>
                    <button type="button" class="btn btn-warning btn-sm d-none" id="btnTicket"><span class="fa fa-ticket-alt"></span> TICKET (SHIFT+T)</button>
                    <button type="button" class="btn btn-primary btn-sm" id="btnDevolucion"><span class="fa fa-arrow-left"></span> DEVOLUCIÓN</button>
                    <button type="button" class="btn btn-info btn-sm" id="btnBuscar"><span class="fa fa-search"></span> BUSCAR (F2)</button>
                    <button type="button" class="btn btn-warning btn-sm d-none" id="btnCancelarVenta"><span class="fa fa-ban"></span> CANCELAR</button>
                    <button type="button" class="btn btn-primary d-none btn-sm" id="btnGuardar"><span class="fa fa-save "></span> GUARDAR</button>
                    <a href="<?php print base_url('CortesCaja') ?>" target="_blank" class="btn btn-secondary btn-sm" id="btnCorteCaja"><span class="fa fa-cut"></span> (F7)CORTE</a>
                    <button type="button" class="btn btn-success " id="btnCerrarVenta"><span class="fa fa-dollar-sign"></span> VENTA (F1)</button>
                </div>
            </div>
            <hr>
            <!--DATOS VENTA-->
            <div id="Encabezado">
                <form id="frmNuevo">
                    <div class="row" >
                        <div class="d-none">
                            <input type="text" class="" id="ID" name="ID"  >
                        </div>
                        <div class="col-12 col-md-1">
                            <label for="TipoDoc">RF*</label>
                            <input type="text"  class="form-control form-control-sm " maxlength="1" id="TipoDoc" name="TipoDoc" required >
                        </div>
                        <div class="col-12 col-md-1">
                            <label for="FolioTienda">No.*</label>
                            <input type="text" class="form-control form-control-sm numbersOnly " maxlength="10" id="FolioTienda" name="FolioTienda" disabled="">
                        </div>
                        <div class="col-12 col-md-3">
                            <label for="Cliente">Cliente* (F9) Actualizar</label>
                            <div class="input-group mb-3">
                                <select class="form-control form-control-sm required NotOpenDropDown" id="Cliente" name="Cliente">
                                    <option value=""></option>
                                </select>
                                <div class="input-group-prepend">
                                    <a href="<?php print base_url('Clientes') ?>" target="_blank" class="input-group-text text-dark" data-toggle="tooltip" data-placement="top" title="Ver Clientes">
                                        <i class="fa fa-users"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-2">
                            <label for="FechaMov">Fecha</label>
                            <input type="text" class="form-control form-control-sm required notEnter maskDateTime" id="FechaMov" name="FechaMov" >
                        </div>
                        <div class="col-12 col-md-2">
                            <label for="MetodoPago">Método de Pago*</label>
                            <select class="form-control form-control-sm required NotOpenDropDown" id="MetodoPago"  name="MetodoPago">
                                <option value=""></option>
                            </select>
                        </div>
                        <div class="col-12 col-md-3">
                            <label for="Vendedor">Vendedor</label>
                            <select class="form-control form-control-sm required" id="Vendedor"  name="Vendedor" required>
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
                <div class="col-12 col-md-2 col-sm-2 d-none" id="dDescuento">
                    <label for="Descuento" class="text-danger">Descuentos</label>
                    <select class="form-control form-control-sm NotOpenDropDown"  name="Descuento">
                        <option value=""></option>
                    </select>
                </div>
                <div class="col-sm-2">
                    <label for="CodigoBarras">Código (Ctrl+E para ver Existencias en otras Tiendas)</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control form-control-sm numbersOnly" placeholder="CÓDIGO DEL ARTÍCULO" name="CodigoBarras"  >
                        <span class="input-group-prepend">
                            <span class="input-group-text text-dark" id="btnBuscarManual" onclick="onBusquedaManual()" data-toggle="tooltip" data-placement="top" title="Buscar por Estilo">
                                <i class="fa fa-search"></i>
                            </span>
                        </span>
                    </div>
                </div>
            </div>

        </div>
        <hr>
        <!--DETALLE-->
        <div class="" id="pnlDatosDetalle">
            <!--DETALLE-->
            <div class="row">
                <div class=" col-md-9 ">
                    <div class="row">
                        <div class="table-responsive" id="RegistrosDetalle">
                            <div class="container-fluid">
                                <table id="tblRegistrosDetalle" class="table table-sm" width="100%">
                                    <thead>
                                        <tr>
                                            <th scope="col">Artículo</th>
                                            <th scope="col">Talla</th>
                                            <th scope="col">Cantidad</th>
                                            <th scope="col">Precio</th>
                                            <th scope="col">Desc</th>
                                            <th scope="col">Sub</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
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
    var btnSalir = pnlDatos.find("#btnSalir");
    var btnExistencias = $("#btnExistencias");
    var btnCerrarVenta = $("#btnCerrarVenta");
    var btnBuscar = $("#btnBuscar");
    var btnTicket = $("#btnTicket");
    var btnCorteCaja = $("#btnCorteCaja");
    var btnCancelarVenta = $("#btnCancelarVenta");
    var mdlCerrarVenta = $("#mdlCerrarVenta");
    var btnFinVenta = mdlCerrarVenta.find("#btnFinVenta");
    var btnDevolucion = pnlDatos.find("#btnDevolucion");
    var currentDate = new Date();
    var nuevo = true;
    var IdMov = 0;
    var AddCodigoBarras = false;
    var EstiloCB = 0;
    var ColorCB = 0;
    var TallaCB = 0;
    var PrecioCB = 0;
    /*DATATABLE GLOBAL*/
    var tblDetalleVenta;
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
            [0, 'desc']/*ID*/
        ]
    };
    var tblExistencias = {
        "dom": 'frt',
        "autoWidth": false,
        "displayLength": 500,
        "colReorder": true,
        "bLengthChange": false,
        "deferRender": true,
        "scrollY": 220,
        "scrollCollapse": false,
        "bSort": false,
        language: {
            search: "Buscar:"
        }
    };

    function getInicial() {
        HoldOn.open({theme: "sk-bounce", message: "CARGANDO DATOS..."});
        getNuevoFolio();
        getClientes();
        getDescuentos();
        getMetodosPago();
        getVendedores();
        HoldOn.close();
    }

    var ValidaPantallaCompleta = "<?php echo $this->session->userdata('Ventas'); ?>";
    $(document).ready(function () {
        btnDevolucion.click(function () {
            location.href = base_url + 'Devoluciones';
        });
        btnTicket.click(function () {
            var Venta = parseInt(pnlDatos.find("#ID").val());
            if (Venta > 0) {
                $.post(master_url + 'getTicketXVenta', {ID: Venta}).done(function (data, x, jq) {
                    console.log('* TICKET *');
                    console.log(data);
                    window.open(data, '_blank');
                }).fail(function (x, y, z) {
                    console.log(x, y, z);
                }).always(function () {
                    HoldOn.close();
                });
            } else {
                onBeep(2);
                swal('ATENCIÓN', 'NO HA ESTABLECIDO UN FOLIO PARA LA VENTA', 'warning');
            }
        });
        shortcut.add("F1", function () {
            btnCerrarVenta.trigger('click');
        });
        shortcut.add("F7", function () {
            btnCorteCaja.trigger('click');
        });
        shortcut.add("Shift+T", function () {
            btnTicket.trigger('click');
        });
        shortcut.add("F2", function () {
            btnBuscar.trigger('click');
        });
        shortcut.add("F5", function () {
            location.reload();
        });
        shortcut.add("F9", function () {
            getClientes();
        });
        shortcut.add("ESC", function () {
            btnSalir.trigger('click');
        });
        shortcut.add("Ctrl+E", function () {
            onVerExistencias();
        });

        //Inicializar Componentes
        pnlDatos.find("input").val("");
        pnlDatos.find('#TipoDoc').val('R');
        console.log(getTodayWithTime());
        pnlDatos.find('.maskDateTime').val(getTodayWithTime());
        $('#Encabezado').removeClass('disabledForms');
        pnlControlesDetalle.removeClass('disabledForms');

        nuevo = true;
        getInicial();
        handleEnter();
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
            onCalcularMontos();
        });
        //Cuando pierde el foco despues de buscar
        pnlDatos.find("input[name='FolioTienda']").focusout(function () {
            pnlDatos.find("input[name='FolioTienda']").prop("disabled", true);
        });
        pnlDatos.find("input[name='FolioTienda']").keydown(function (e) {
            if (e.keyCode === 13) {
                var FolioTienda = $(this).val();
                var TipoDoc = pnlDatos.find("input[name='TipoDoc']").val();
                if (FolioTienda !== "" && TipoDoc !== "") {
                    nuevo = false;
                    HoldOn.open({theme: "sk-bounce", message: "CARGANDO DATOS..."});
                    $.ajax({
                        url: master_url + 'getVentaByFolioTiendaByTipoDocByTienda',
                        type: "POST",
                        dataType: "JSON",
                        data: {
                            FolioTienda: FolioTienda,
                            TipoDoc: TipoDoc
                        }
                    }).done(function (data, x, jq) {
                        console.log('* FOLIO CONSULTADO *');
                        console.log(data);
                        if (data.length > 0) {
                            IdMov = data[0].ID;
                            pnlDatos.find("input").val("");
                            $.each(pnlDatos.find("select"), function (k, v) {
                                pnlDatos.find("select")[k].selectize.clear(true);
                            });
                            $.each(data[0], function (k, v) {
                                pnlDatos.find("[name='" + k + "']").val(v);
                                if (pnlDatos.find("[name='" + k + "']").is('select')) {
                                    pnlDatos.find("[name='" + k + "']")[0].selectize.setValue(v);
                                }
                            });
                            if (data[0].Estatus === 'BORRADOR') {
                                $('#Encabezado').remove('disabledForms');
                                pnlControlesDetalle.removeClass('disabledForms');
                                btnCerrarVenta.removeClass('d-none');
                                btnCancelarVenta.removeClass('d-none');
                                btnTicket.addClass("d-none");
                                pnlControlesDetalle.find("[name='CodigoBarras']").focus();
                                /*DETALLE*/
                                getDetallebyID(data[0].ID);
                                /*FIN DETALLE*/
                            } else {
                                btnTicket.removeClass("d-none");
                                btnCerrarVenta.addClass('d-none');
                                btnCancelarVenta.addClass('d-none');
                                $('#Encabezado').addClass('disabledForms');
                                pnlControlesDetalle.addClass('disabledForms');
                                /*DETALLE*/
                                getDetalleDisabledbyID(data[0].ID);
                                /*FIN DETALLE*/
                            }
                        } else {
                            swal('INFO', 'NO EXISTE EL FOLIO', 'info');
                        }
                    }).fail(function (x, y, z) {
                        console.log(x, y, z);
                    }).always(function () {
                        HoldOn.close();
                    });
                } else {
                    onNotify('<span class="fa fa-exclamation fa-lg"></span>', 'ASEGURATE DE LLENAR EL TP', 'danger');
                }
            }
        });
        //Agrega con codigo barras
        pnlControlesDetalle.find("[name='CodigoBarras']").blur(function () {
            EstiloCB = $(this).val().slice(0, 5).replace(/^0+/, '');
            ColorCB = $(this).val().slice(5, 10).replace(/^0+/, '');
            TallaCB = $(this).val().slice(7, 14).replace(/^0+/, '');
            if (EstiloCB > 0 && ColorCB > 0 && TallaCB > 0) {
                $.ajax({
                    url: master_url + 'getExistenciasXEstiloXCombinacion',
                    type: "POST",
                    dataType: "JSON",
                    data: {
                        Estilo: EstiloCB,
                        Combinacion: ColorCB
                    }
                }).done(function (data, x, jq) {
                    if (data.length > 0) {
                        var existencias = data[0];
                        PrecioCB = existencias.PrecioMenudeo;
                        AddCodigoBarras = true;
                        btnGuardar.trigger('click');
                        $("[name='CodigoBarras']").val('');
                        $("[name='CodigoBarras']").focus();
                    } else {
                    }
                }).fail(function (x, y, z) {
                    console.log(x, y, z);
                }).always(function () {
                    HoldOn.close();
                });
            }
        });
        //Inserta Detalle y guarda el movimiento
        $('#mdlBuscaManual').find("#btnAgregarDetalle").click(function () {
            isValid('pnlDatos');
            if (valido) {
                var Estilo = $('#mdlBuscaManual').find("[name='Estilo']");
                var Color = $('#mdlBuscaManual').find("[name='Combinacion']");
                var Talla = $('#mdlBuscaManual').find("[name='Talla']");
                var Precio = $('#mdlBuscaManual').find("[name='Precio']");
                var Cantidad = $('#mdlBuscaManual').find("[name='Cantidad']");
                if (Estilo.val() !== '' && Color.val() !== '' && Talla.val() !== '' && Precio.val() !== ''
                        && Cantidad.val() !== '' && Cantidad.val() > 0 && Precio.val() > 0)
                {
                    AddCodigoBarras = false;
                    //Guarda Movimiento
                    btnGuardar.trigger('click');
                    $('#mdlBuscaManual').modal('hide');
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
            } else {
                onNotify('<span class="fa fa-times fa-lg"></span>', '* DEBE DE COMPLETAR LOS CAMPOS REQUERIDOS *', 'danger');
            }
        });
        //Validaciones tallas
        $('#mdlBuscaManual').find("[name='Talla']").blur(function () {
            //Verificar que los combos de estilo y color esten llenos
            if ($('#mdlBuscaManual').find("[name='Estilo']").val() !== "" && $('#mdlBuscaManual').find("[name='Combinacion']").val() !== "") {
                var tallaCaptura = $(this).val();
                var tallaValida = false;
                $.each($('#mdlBuscaManual').find("#tblTallas > tbody > tr").find("input.numbersOnly").filter(':enabled'), function () {
                    var talla = $('#mdlBuscaManual').find("#tblTallas > tbody > tr").find("input").eq($(this).parent().index()).val();
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
                    $('#mdlBuscaManual').find("[name='Talla']").val('');
//                    pnlControlesDetalle.find("[name='Talla']").focus();
//                    swal({
//                        title: 'INFO',
//                        text: 'Introduce una talla válida',
//                        icon: 'warning'
//                    }).then((result) => {
//                        if (result) {
//                            pnlControlesDetalle.find("[name='Talla']").val('');
//                            pnlControlesDetalle.find("[name='Talla']").focus();
//                        }
//                    });
                }
            } else {
                swal({
                    title: 'INFO',
                    text: 'Introduce un estilo y color',
                    icon: 'warning'
                }).then((result) => {
                    if (result) {
                        $('#mdlBuscaManual').find("[name='Talla']").val('');
                        $('#mdlBuscaManual').find("[name='Estilo']")[0].selectize.focus();
                    }
                });
            }
        });
        //Validacion de existencias en cantidad
        $('#mdlBuscaManual').find("[name='Cantidad']").change(function () {
            var CantidadCaptura = $(this).val();
            var TallaCapturada = $('#mdlBuscaManual').find("[name='Talla']").val();
            var CantidadValida = false;
            var tallas = $('#mdlBuscaManual').find("#tblTallas > tbody > tr").eq(0);
            var existencias = $('#mdlBuscaManual').find("#tblTallas > tbody > tr").eq(1);
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
                $('#mdlBuscaManual').find("[name='Cantidad']").val('');
                $('#mdlBuscaManual').find("[name='Cantidad']").focus();
                swal({
                    title: 'INFO',
                    text: 'No tiene existencias suficientes en esta talla',
                    icon: 'warning',
                    closeOnEsc: false,
                    closeOnClickOutside: false
                }).then((result) => {
                    if (result) {
                        $('#mdlBuscaManual').find("[name='Cantidad']").val('');
                        $('#mdlBuscaManual').find("[name='Cantidad']").focus();
                    }
                });
            }
        });
        //Evento que controla la insercion de filas a la tabla cuando se termina de capturar
        $('#mdlBuscaManual').find("[name='Precio']").blur(function () {
            $('#mdlBuscaManual').find("#btnAgregarDetalle").trigger('click');
        });
        //Eventos en el select de estilo para traer las tallas y los colores
        $('#mdlBuscaManual').find("[name='Estilo']").change(function () {
            $('#mdlBuscaManual').find("[name='Combinacion']")[0].selectize.clear(true);
            $('#mdlBuscaManual').find("[name='Combinacion']")[0].selectize.clearOptions();
            getCombinacionesXEstilo($(this).val());
            getSerieXEstilo($(this).val());
            getFotoXEstilo($(this).val());
        });
        //Obtiene las existencias del inventario
        $('#mdlBuscaManual').find("[name='Combinacion']").change(function () {
            getExistenciasXEstiloXCombinacion($('#mdlBuscaManual').find("[name='Estilo']").val(), $('#mdlBuscaManual').find("[name='Combinacion']").val());
        });
        //Evento para traer colores en modal de existencias
        $('#mdlInfoExistencia').find("[name='EstiloEx']").change(function () {
            $('#mdlInfoExistencia').find("input").val("");
            $('#mdlInfoExistencia').find("[name='ColorEx']")[0].selectize.clear(true);
            $('#mdlInfoExistencia').find("[name='ColorEx']")[0].selectize.clearOptions();
            getCombinacionesXEstiloExt($(this).val());
            getEncabezadoSerieXEstilo($(this).val());
            getExistenciasByEstiloByColor($(this).val(), '');
        });
        $('#mdlInfoExistencia').find("[name='ColorEx']").change(function () {
            var EstiloEx = $('#mdlInfoExistencia').find("[name='EstiloEx']")[0].selectize.getValue();
            getExistenciasByEstiloByColor(EstiloEx, $(this).val());
            $('#tblExistencias input[type=search]').focus();
        });
        //Evento modales para inicializar el foco
        $('#mdlInfoExistencia').on('shown.bs.modal', function () {
            $(':input:text:enabled:visible:first').focus();
        });
        //Evento modales para inicializar el foco
        $('#mdlBuscaManual').on('shown.bs.modal', function () {
            $(':input:text:enabled:visible:first').focus();
        });
        //Evento modal para inicializar el foco
        $('#mdlCerrarVenta').on('shown.bs.modal', function () {
            $('#mdlCerrarVenta').find('#Pago').focus();
        });
        //Validar pago cliente
        $('#mdlCerrarVenta').find("#Pago").keyup(function () {
            var Precio = getNumberFloat($(this).val());
            if ($(this).val() !== '' && Precio >= ImporteTotal) {
                var Cambio = Precio - ImporteTotal;
                $('#mdlCerrarVenta').find("#btnFinVenta").removeClass('d-none');
                $('#mdlCerrarVenta').find('#Cambio').text('$ ' + $.number(Cambio, 2, '.', ','));
            } else {
                $('#mdlCerrarVenta').find("#btnFinVenta").addClass('d-none');
                $('#mdlCerrarVenta').find('#Cambio').text('$ ' + $.number(0, 2, '.', ','));
            }
        });
        //Evento botones
        btnBuscar.click(function () {
            pnlDatos.find("input[name='FolioTienda']").prop("disabled", false);
            pnlDatos.find("input[name='FolioTienda']").focus();
            pnlDatos.find("input[name='FolioTienda']").select();
        });
        btnGuardar.click(function () {
            HoldOn.open({
                theme: "sk-bounce",
                message: "GUARDANDO DATOS..."
            });

            var f = new FormData(pnlDatos.find("#frmNuevo")[0]);
            if (!nuevo) {
                $.ajax({
                    url: master_url + 'onModificar',
                    type: "POST",
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: f
                }).done(function (data, x, jq) {
                    onNotify('<span class="fa fa-check fa-lg"></span>', 'SE HA MODIFICADO EL REGISTRO', 'success');
                    //Agregar renglon Detalle
                    if (AddCodigoBarras) {
                        onAgregarFilaCB(IdMov, EstiloCB, ColorCB, TallaCB, PrecioCB);
                        onSacarExistenciasInventarioCB(EstiloCB, ColorCB, TallaCB);
                    } else {
                        onAgregarFila(IdMov);
                        onSacarExistenciasInventario();
                    }
                    //Limpiar los campos del detalle
                    limpiarCampos();
                }).fail(function (x, y, z) {
                    console.log(x, y, z);
                }).always(function () {
                    HoldOn.close();
                });
            } else {
                $.ajax({
                    url: master_url + 'onAgregar',
                    type: "POST",
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: f
                }).done(function (data, x, jq) {
                    var Folios = JSON.parse(data);
                    IdMov = parseInt(Folios.ID);
                    nuevo = false;
                    btnCancelarVenta.removeClass('d-none');
                    pnlDatos.find('#ID').val(Folios.ID);
                    pnlDatos.find('#FolioTienda').val(Folios.FolioTienda);
                    onNotify('<span class="fa fa-check fa-lg"></span>', 'SE HA AÑADIDO UN NUEVO REGISTRO', 'success');
                    //Agregar renglon Detalle
                    if (AddCodigoBarras) {
                        onAgregarFilaCB(IdMov, EstiloCB, ColorCB, TallaCB, PrecioCB);
                        onSacarExistenciasInventarioCB(EstiloCB, ColorCB, TallaCB);
                    } else {
                        onAgregarFila(IdMov);
                        onSacarExistenciasInventario();
                    }
                    //Limpiar los campos del detalle
                    limpiarCampos();
                }).fail(function (x, y, z) {
                    console.log(x, y, z);
                }).always(function () {
                    HoldOn.close();
                });
            }
        });
        btnSalir.click(function () {
            HoldOn.open({theme: "sk-bounce", message: "CARGANDO DATOS..."});
            $.ajax({
                url: master_url + 'onConsultarAcceso',
                type: "POST"
            }).done(function (data, x, jq) {
                $(location).attr('href', base_url);
                HoldOn.close();
            }).fail(function (x, y, z) {
                console.log(x, y, z);
            }).always(function () {
            });
        });
        btnCerrarVenta.click(function () {
            if (IdMov !== 0 && IdMov !== undefined && IdMov > 0) {
                $('#mdlCerrarVenta').modal('show');
                $('#mdlCerrarVenta').find('#Importe').text('$' + $.number(ImporteTotal, 2, '.', ','));
                $('#mdlCerrarVenta').find('#ImporteLetra').text('(' + NumeroALetras(ImporteTotal) + ')');
            } else {
                swal('INFO', 'NO EXISTE LA VENTA', 'info');
            }
        });
        btnFinVenta.click(function () {
            $.ajax({
                url: master_url + 'onModificarEstatus',
                type: "POST",
                data: {
                    ID: IdMov,
                    Estatus: 'CERRADA',
                    SuPago: mdlCerrarVenta.find("#Pago").val(),
                    Cambio: getNumberFloat(mdlCerrarVenta.find("#Cambio").text()),
                    ImporteEnLetra: mdlCerrarVenta.find("#ImporteLetra h6").text()
                }
            }).done(function (data, x, jq) {
                $('#mdlCerrarVenta').modal('hide');
                location.reload();
            }).fail(function (x, y, z) {
                console.log(x, y, z);
            }).always(function () {
                HoldOn.close();
            });
        });
        btnCancelarVenta.click(function () {
            if (IdMov !== 0 && IdMov !== undefined && IdMov > 0) {
                swal({
                    title: "Confirmar",
                    text: "Deseas cancelar la venta?",
                    icon: "warning",
                    buttons: ["Cancelar", "Aceptar"],
                    dangerMode: true
                }).then((willDelete) => {
                    if (willDelete) {
                        HoldOn.open({
                            theme: "sk-bounce",
                            message: "CANCELANDO..."
                        });
                        var detalle = [];
                        /*OBTENER TODAS LAS FILAS*/
                        $.each(tblDetalleVenta.rows().data(), function () {
                            /*ID 0| IdEstilo 1| IdColor 2| Estilo 3| Color 4| Talla 5| Cantidad 6| Precio 7| Desc 8| Sub 9| PorDesc 10| Eliminar 11*/
                            var row = $(this);
                            detalle.push({
                                ID: row[0],
                                Estilo: row[1],
                                Color: row[2],
                                Talla: row[5],
                                Cantidad: row[6]
                            });
                        });
                        var f = new FormData();
                        f.append('ID', pnlDatos.find("#ID").val());
                        f.append('Detalle', JSON.stringify(detalle));
                        $.ajax({
                            url: master_url + 'onCancelarVenta',
                            type: "POST",
                            cache: false,
                            contentType: false,
                            processData: false,
                            data: f
                        }).done(function (data, x, jq) {
                            pnlDatos.find('#dAfecInv').addClass('disabledForms');
                            pnlDatos.find('#Encabezado').addClass('disabledForms');
                            pnlDatos.find('#ControlesDetalle').addClass('disabledForms');
                            btnCancelarVenta.addClass("d-none");
                            btnCerrarVenta.addClass("d-none");
                            HoldOn.close();
                            swal({
                                title: "INFO",
                                text: "SE HA CANCELADO LA VENTA",
                                icon: "success"
                            }).then((action) => {
                                location.reload();
                            });
                        }).fail(function (x, y, z) {
                            console.log(x, y, z);
                        }).always(function () {
                            HoldOn.close();
                        });
                    }
                }); /*FIN SWAL*/
            } else {
                swal("INFO", "LA VENTA NO EXISTE", 'warning');
            }
        });
    });
    function onBusquedaManual() {
        getEstilos();
        $('#mdlBuscaManual').modal('show');
    }
    function onVerExistencias() {
        getEstilosExt();
        $('#mdlInfoExistencia').modal('show');
    }
    function limpiarCampos() {
        $("[name='CodigoBarras']").focus();
        $("[name='Estilo']")[0].selectize.clear(true);
        $("[name='Combinacion']")[0].selectize.clear(true);
        $("[name='Combinacion']")[0].selectize.clearOptions();
        $.each(pnlControlesDetalle.find("input"), function () {
            $(this).val('');
        });
    }
    /*AGREGAR DETALLE NORMAL*/
    function onAgregarFila(MovID) {
        var Estilo = $('#mdlBuscaManual').find("[name='Estilo']");
        var Combinacion = $('#mdlBuscaManual').find("[name='Combinacion']");
        var Costo = $('#mdlBuscaManual').find("[name='Precio']");
        var Desc = pnlControlesDetalle.find("[name='Descuento']");
        var Talla = $('#mdlBuscaManual').find("[name='Talla']");
        var Cantidad = $('#mdlBuscaManual').find("[name='Cantidad']");
        if (pnlDatos.find("input[name='TipoDoc']").val() !== '') {
            /*COMPROBAR ESTILO, COMBINACION Y TALLA*/
            var estilo_combinacion_existen = false;
            if (pnlDatosDetalle.find("#tblRegistrosDetalle tbody tr").length > 0) {
                $.each(pnlDatosDetalle.find("#tblRegistrosDetalle tbody tr"), function () {
                    var idDetalle = $(this).find("td").eq(0).text();
                    var estilo = $(this).find("td").eq(1).text();
                    var combinacion = $(this).find("td").eq(2).text();
                    var talla = $(this).find("td").eq(5).text();
                    var CantidadActual = $(this).find("td").eq(6).text();
                    var Precio = $(this).find("td").eq(7).text();
                    var PorcenDesc = $(this).find("td").eq(10).text();
                    if (parseFloat(estilo) === parseFloat(Estilo.val()) && parseFloat(combinacion) === parseFloat(Combinacion.val()) && parseFloat(talla) === parseFloat(Talla.val())) {
                        estilo_combinacion_existen = true;
                        //Actualizar Cantidad
                        var CantidadNueva = parseFloat(Cantidad.val()) + parseFloat(CantidadActual);
                        var DescuentoNuevo = (parseFloat(Precio) * (PorcenDesc / 100)) * CantidadNueva;
                        var SubtotalNueva = parseFloat(Precio) * parseFloat(CantidadNueva) - DescuentoNuevo;
                        $.ajax({
                            url: master_url + 'onModificarDetalle',
                            type: "POST",
                            data: {
                                ID: idDetalle,
                                Cantidad: CantidadNueva,
                                Descuento: DescuentoNuevo,
                                Subtotal: SubtotalNueva
                            }
                        }).done(function (data, x, jq) {
                            getDetallebyID(MovID);
                        }).fail(function (x, y, z) {
                            console.log(x, y, z);
                        }).always(function () {
                            HoldOn.close();
                        });
                        return false;
                    }
                });
            }
            /*VALIDAR QUE EXISTA*/
            if (!estilo_combinacion_existen) {
                var descuentoCalculado = 0;
                descuentoCalculado = (Costo.val() * (Desc.val() / 100)) * Cantidad.val();
                var frm = new FormData();
                frm.append('Venta', MovID);
                frm.append('Estilo', Estilo.val());
                frm.append('Color', Combinacion.val());
                frm.append('Talla', Talla.val());
                frm.append('Cantidad', Cantidad.val());
                frm.append('Precio', Costo.val());
                frm.append('Descuento', descuentoCalculado);
                frm.append('Subtotal', ((Cantidad.val() * Costo.val()) - descuentoCalculado));
                frm.append('PorcentajeDesc', Desc.val());
                $.ajax({
                    url: master_url + 'onAgregarDetalle',
                    type: "POST",
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: frm
                }).done(function (data, x, jq) {
                    getDetallebyID(MovID);
                    HoldOn.close();
                }).fail(function (x, y, z) {
                    console.log(x, y, z);
                }).always(function () {
                    HoldOn.close();
                });
            }
        } else {
            onNotify('<span class="fa fa-times fa-lg"></span>', 'DEBE DE ESTABLECER UN TIPO', 'danger');
            pnlDatos.find("input[name='TipoDoc']").focus();
        }
    }
    /*AGREGAR DETALLE CB*/
    function onAgregarFilaCB(MovID, Estilo, Combinacion, Talla, Costo) {
        var Estilo = Estilo;
        var Combinacion = Combinacion;
        var Costo = Costo;
        var Desc = pnlControlesDetalle.find("[name='Descuento']");
        var Talla = Talla;
        var Cantidad = 1;
        if (pnlDatos.find("input[name='TipoDoc']").val() !== '') {
            /*COMPROBAR ESTILO, COMBINACION Y TALLA*/
            var estilo_combinacion_existen = false;
            if (pnlDatosDetalle.find("#tblRegistrosDetalle tbody tr").length > 0) {
                $.each(pnlDatosDetalle.find("#tblRegistrosDetalle tbody tr"), function () {
                    var idDetalle = $(this).find("td").eq(0).text();
                    var estilo = $(this).find("td").eq(1).text();
                    var combinacion = $(this).find("td").eq(2).text();
                    var talla = $(this).find("td").eq(5).text();
                    var CantidadActual = $(this).find("td").eq(6).text();
                    var Precio = $(this).find("td").eq(7).text();
                    var PorcenDesc = $(this).find("td").eq(10).text();
                    if (parseFloat(estilo) === parseFloat(Estilo) && parseFloat(combinacion) === parseFloat(Combinacion) && parseFloat(talla) === parseFloat(Talla)) {
                        estilo_combinacion_existen = true;
                        //Actualizar Cantidad
                        var CantidadNueva = parseFloat(Cantidad) + parseFloat(CantidadActual);
                        var DescuentoNuevo = (parseFloat(Precio) * (PorcenDesc / 100)) * CantidadNueva;
                        var SubtotalNueva = parseFloat(Precio) * parseFloat(CantidadNueva) - DescuentoNuevo;
                        $.ajax({
                            url: master_url + 'onModificarDetalle',
                            type: "POST",
                            data: {
                                ID: idDetalle,
                                Cantidad: CantidadNueva,
                                Descuento: DescuentoNuevo,
                                Subtotal: SubtotalNueva
                            }
                        }).done(function (data, x, jq) {
                            getDetallebyID(MovID);
                        }).fail(function (x, y, z) {
                            console.log(x, y, z);
                        }).always(function () {
                            HoldOn.close();
                        });
                        return false;
                    }
                });
            }
            /*VALIDAR QUE EXISTA*/
            if (!estilo_combinacion_existen) {
                var descuentoCalculado = 0;
                descuentoCalculado = (Costo * (Desc.val() / 100)) * Cantidad;
                var frm = new FormData();
                frm.append('Venta', MovID);
                frm.append('Estilo', Estilo);
                frm.append('Color', Combinacion);
                frm.append('Talla', Talla);
                frm.append('Cantidad', Cantidad);
                frm.append('Precio', Costo);
                frm.append('Descuento', descuentoCalculado);
                frm.append('Subtotal', ((Cantidad * Costo) - descuentoCalculado));
                frm.append('PorcentajeDesc', Desc.val());
                $.ajax({
                    url: master_url + 'onAgregarDetalle',
                    type: "POST",
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: frm
                }).done(function (data, x, jq) {
                    getDetallebyID(MovID);
                    HoldOn.close();
                }).fail(function (x, y, z) {
                    console.log(x, y, z);
                }).always(function () {
                    HoldOn.close();
                });
            }
        } else {
            onNotify('<span class="fa fa-times fa-lg"></span>', 'DEBE DE ESTABLECER UN TIPO', 'danger');
            pnlDatos.find("input[name='TipoDoc']").focus();
        }
    }
    function getDetallebyID(IDX) {
        $.ajax({
            url: master_url + 'getDetallebyID',
            type: "POST",
            dataType: "JSON",
            data: {
                ID: IDX
            }
        }).done(function (data, x, jq) {
            if (data.length > 0) {
                pnlDatosDetalle.find("#RegistrosDetalle").html(getTable('tblRegistrosDetalle', data));
                $('#tblRegistrosDetalle tfoot th').each(function () {
                    $(this).addClass('d-none');
                });
                var thead = $('#tblRegistrosDetalle thead th');
                var tfoot = $('#tblRegistrosDetalle tfoot th');
                thead.eq(0).addClass("d-none");
                tfoot.eq(0).addClass("d-none");
                thead.eq(1).addClass("d-none");
                tfoot.eq(1).addClass("d-none");
                thead.eq(2).addClass("d-none");
                tfoot.eq(2).addClass("d-none");
                thead.eq(3).addClass("d-none");
                tfoot.eq(3).addClass("d-none");
                thead.eq(10).addClass("d-none");
                tfoot.eq(10).addClass("d-none");
                $.each($('#tblRegistrosDetalle tbody tr'), function (k, v) {
                    var td = $(v).find("td");
                    td.eq(0).addClass("d-none");
                    td.eq(1).addClass("d-none");
                    td.eq(2).addClass("d-none");
                    td.eq(3).addClass("d-none");
                    td.eq(10).addClass("d-none");
                });
                tblDetalleVenta = pnlDatosDetalle.find("#tblRegistrosDetalle").DataTable(tblInicial);
                //Sombreado de la fila
                pnlDatosDetalle.find('#tblRegistrosDetalle tbody tr').on('click', 'td:not(:eq(11))', function () {
                    $("#tblRegistrosDetalle tbody tr").removeClass("success");
                    $(this).parent().addClass("success");
                    var cells = $(this).parent().find("td");
                    var cellEstilo = cells.eq(1).text();
                    var cellCombinacion = cells.eq(2).text();
                    getFotoXEstilo(parseInt(cellEstilo));
                    getSerieXEstilo(parseInt(cellEstilo));
                    getExistenciasXEstiloXCombinacion(parseInt(cellEstilo), parseInt(cellCombinacion));
                });
                //Boton de borrar
                pnlDatosDetalle.find('#tblRegistrosDetalle tbody tr').on('click', 'td:eq(11)', function () {
                    $("#tblRegistrosDetalle tbody tr").removeClass("success");
                    $(this).parent().addClass("success");
                    var cells = $(this).parent().find("td");
                    var IDX = cells.eq(0).text();
                    var cellEstilo = cells.eq(1).text();
                    var cellCombinacion = cells.eq(2).text();
                    var cellTalla = cells.eq(5).text();
                    var cellCantidad = cells.eq(6).text();
                    getFotoXEstilo(parseInt(cellEstilo));
                    getSerieXEstilo(parseInt(cellEstilo));
                    swal({
                        buttons: ["Cancelar", "Aceptar"],
                        title: 'Estas Seguro?',
                        text: "Esta acción no se puede revertir",
                        icon: "warning",
                        dangerMode: true
                    }).then((result) => {
                        if (result) {
                            getExistenciasXEstiloXCombinacionBorrar(parseInt(cellEstilo), parseInt(cellCombinacion), cellTalla, cellCantidad);
                            $.ajax({
                                url: master_url + 'onEliminarDetalle',
                                type: "POST",
                                data: {
                                    ID: IDX
                                }
                            }).done(function (data, x, jq) {
                                getDetallebyID(IdMov);
                                onCalcularMontos();
                            }).fail(function (x, y, z) {
                                console.log(x, y, z);
                            }).always(function () {
                            });
                        }
                    });
                });
                //Evento Doble Click Editar precio
                pnlDatosDetalle.find('#tblRegistrosDetalle tbody').on('dblclick', 'tr', function () {
                    var cells = $(this).find("td");
                    var cell = cells.eq(7);
                    cell.html('<input type="text" class="form-control form-control-sm numbersOnly"  maxlength="6" id="Precio" value="' + cell.text() + '">');
                    cell.find("#Precio").focusout(function () {
                        var Cantidad = parseFloat(getNumber(cells.eq(6).text()));
                        var PorcenDesc = parseFloat(getNumber(cells.eq(10).text()));
                        var idDetalle = parseInt(cells.eq(0).text());
                        var DescuentoNuevo = (parseFloat($(this).val()) * (PorcenDesc / 100)) * Cantidad;
                        var SubtotalNuevo = (parseFloat($(this).val()) * Cantidad) - DescuentoNuevo;
                        $.ajax({
                            url: master_url + 'onModificarDetalle',
                            type: "POST",
                            data: {
                                ID: idDetalle,
                                Precio: $(this).val(),
                                Descuento: DescuentoNuevo,
                                Subtotal: SubtotalNuevo
                            }
                        }).done(function (data, x, jq) {
                            getDetallebyID(IDX);
                        }).fail(function (x, y, z) {
                            console.log(x, y, z);
                        }).always(function () {
                            HoldOn.close();
                        });
                        onCalcularMontos();
                    });
                    cell.find("#Precio").keyup(function (e) {
                        if (e.keyCode === 13) {
                            var Cantidad = parseFloat(getNumber(cells.eq(6).text()));
                            var PorcenDesc = parseFloat(getNumber(cells.eq(10).text()));
                            var idDetalle = parseInt(cells.eq(0).text());
                            var DescuentoNuevo = (parseFloat($(this).val()) * (PorcenDesc / 100)) * Cantidad;
                            var SubtotalNuevo = (parseFloat($(this).val()) * Cantidad) - DescuentoNuevo;
                            $.ajax({
                                url: master_url + 'onModificarDetalle',
                                type: "POST",
                                data: {
                                    ID: idDetalle,
                                    Precio: $(this).val(),
                                    Descuento: DescuentoNuevo,
                                    Subtotal: SubtotalNuevo
                                }
                            }).done(function (data, x, jq) {
                                getDetallebyID(IDX);
                            }).fail(function (x, y, z) {
                                console.log(x, y, z);
                            }).always(function () {
                                HoldOn.close();
                            });
                            onCalcularMontos();
                        }
                    });
                    cell.find("#RunCantidad").focus();
                });
                onCalcularMontos();
            } else {
                pnlDatosDetalle.find("#RegistrosDetalle").html("");
            }
            HoldOn.close();
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
        });
    }
    function getDetalleDisabledbyID(IDX) {
        $.ajax({
            url: master_url + 'getDetallebyID',
            type: "POST",
            dataType: "JSON",
            data: {
                ID: IDX
            }
        }).done(function (data, x, jq) {
            if (data.length > 0) {
                pnlDatosDetalle.find("#RegistrosDetalle").html(getTable('tblRegistrosDetalle', data));
                $('#tblRegistrosDetalle tfoot th').each(function () {
                    $(this).addClass('d-none');
                });
                var thead = $('#tblRegistrosDetalle thead th');
                var tfoot = $('#tblRegistrosDetalle tfoot th');
                thead.eq(0).addClass("d-none");
                tfoot.eq(0).addClass("d-none");
                thead.eq(1).addClass("d-none");
                tfoot.eq(1).addClass("d-none");
                thead.eq(2).addClass("d-none");
                tfoot.eq(2).addClass("d-none");
                thead.eq(3).addClass("d-none");
                tfoot.eq(3).addClass("d-none");
                thead.eq(10).addClass("d-none");
                tfoot.eq(10).addClass("d-none");
                thead.eq(11).addClass("d-none");
                tfoot.eq(11).addClass("d-none");
                $.each($('#tblRegistrosDetalle tbody tr'), function (k, v) {
                    var td = $(v).find("td");
                    td.eq(0).addClass("d-none");
                    td.eq(1).addClass("d-none");
                    td.eq(2).addClass("d-none");
                    td.eq(3).addClass("d-none");
                    td.eq(10).addClass("d-none");
                    td.eq(11).addClass("d-none");
                });
                pnlDatosDetalle.find("#tblRegistrosDetalle").DataTable(tblInicial);
                //Sombreado de la fila
                pnlDatosDetalle.find('#tblRegistrosDetalle tbody').on('click', 'tr', function () {
                    $("#tblRegistrosDetalle tbody tr").removeClass("success");
                    $(this).addClass("success");
                    var cells = $(this).find("td");
                    var cellEstilo = cells.eq(1).text();
                    var cellCombinacion = cells.eq(2).text();
                    getFotoXEstilo(parseInt(cellEstilo));
                    getSerieXEstilo(parseInt(cellEstilo));
                    getExistenciasXEstiloXCombinacion(parseInt(cellEstilo), parseInt(cellCombinacion));
                });
                //Evento Doble Click Editar precio
                onCalcularMontos();
            } else {
                pnlDatosDetalle.find("#RegistrosDetalle").html("");
            }
            HoldOn.close();
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
        });
    }
    function onRegresarExistenciasInventario(Estilo, Color, Talla, Cantidad) {
        var tallas = $('#mdlBuscaManual').find("#tblTallas > tbody > tr").eq(0);
        var existencias = $('#mdlBuscaManual').find("#tblTallas > tbody > tr").eq(1);
        var existenciaFinal = 0;
        var existenciaActual = 0;
        var PosicionActualiza = "";
        $.each(tallas.find("input.numbersOnly"), function () {
            if (parseFloat(Talla) === parseFloat($(this).val())) {
                existenciaActual = existencias.find('td').eq($(this).parent().index()).find("input").val();
                PosicionActualiza = existencias.find('td').eq($(this).parent().index()).find("input").attr("name");
                existenciaFinal = parseFloat(existenciaActual) + parseFloat(Cantidad);
                $.ajax({
                    url: master_url + 'onModifcarExistenciaXEstiloXColorXTienda',
                    type: "POST",
                    data: {
                        Estilo: Estilo,
                        Color: Color,
                        Posicion: PosicionActualiza,
                        ExistenciaNueva: existenciaFinal
                    }
                }).done(function (data, x, jq) {
                    limpiarCampos();
                }).fail(function (x, y, z) {
                    console.log(x, y, z);
                }).always(function () {
                    HoldOn.close();
                });
            }
        });
    }
    function onSacarExistenciasInventario() {
        var Estilo = $('#mdlBuscaManual').find("[name='Estilo']");
        var Color = $('#mdlBuscaManual').find("[name='Combinacion']");
        var CantidadCaptura = $('#mdlBuscaManual').find("[name='Cantidad']").val(); //Cantidad a descontar
        var TallaCapturada = $('#mdlBuscaManual').find("[name='Talla']").val(); //Verificar que talla
        var tallas = $('#mdlBuscaManual').find("#tblTallas > tbody > tr").eq(0);
        var existencias = $('#mdlBuscaManual').find("#tblTallas > tbody > tr").eq(1);
        var existenciaFinal = 0;
        var existenciaActual = 0;
        var PosicionActualiza = "";
        $.each(tallas.find("input.numbersOnly"), function () {
            if (parseFloat(TallaCapturada) === parseFloat($(this).val())) {
                existenciaActual = existencias.find('td').eq($(this).parent().index()).find("input").val();
                PosicionActualiza = existencias.find('td').eq($(this).parent().index()).find("input").attr("name");
                existenciaFinal = parseFloat(existenciaActual) - parseFloat(CantidadCaptura);
                $.ajax({
                    url: master_url + 'onModifcarExistenciaXEstiloXColorXTienda',
                    type: "POST",
                    data: {
                        Estilo: Estilo.val(),
                        Color: Color.val(),
                        Posicion: PosicionActualiza,
                        ExistenciaNueva: existenciaFinal
                    }
                }).done(function (data, x, jq) {
                }).fail(function (x, y, z) {
                    console.log(x, y, z);
                }).always(function () {
                    HoldOn.close();
                });
            }
        });
    }
    function onSacarExistenciasInventarioCB(Estilo, Color, Talla) {
        var Estilo = Estilo;
        var Color = Color;
        var Talla = Talla;
        //Traemos la serie por estilo
        $.ajax({
            url: master_url + 'getSerieXEstilo',
            type: "POST",
            dataType: "JSON",
            data: {
                Estilo: Estilo
            }
        }).done(function (data, x, jq) {
            $.each(data[0], function (k, v) {
                $('#mdlBuscaManual').find("[name='" + k + "']").val(v);
            });
            //Traemos la existencia si es que existe
            $.ajax({
                url: master_url + 'getExistenciasXEstiloXCombinacion',
                type: "POST",
                dataType: "JSON",
                data: {
                    Estilo: Estilo,
                    Combinacion: Color
                }
            }).done(function (data, x, jq) {
                if (data.length > 0) {
                    $.each(data[0], function (k, v) {
                        $('#mdlBuscaManual').find("[name='" + k + "']").val(v);
                    });
                    var tallas = $('#mdlBuscaManual').find("#tblTallas > tbody > tr").eq(0);
                    var existencias = $('#mdlBuscaManual').find("#tblTallas > tbody > tr").eq(1);
                    var existenciaFinal = 0;
                    var existenciaActual = 0;
                    var PosicionActualiza = "";
                    $.each(tallas.find("input.numbersOnly"), function () {
                        if (parseFloat(Talla) === parseFloat($(this).val())) {
                            existenciaActual = existencias.find('td').eq($(this).parent().index()).find("input").val();
                            PosicionActualiza = existencias.find('td').eq($(this).parent().index()).find("input").attr("name");
                            existenciaFinal = parseFloat(existenciaActual) - 1;
                            $.ajax({
                                url: master_url + 'onModifcarExistenciaXEstiloXColorXTienda',
                                type: "POST",
                                data: {
                                    Estilo: Estilo,
                                    Color: Color,
                                    Posicion: PosicionActualiza,
                                    ExistenciaNueva: existenciaFinal
                                }
                            }).done(function (data, x, jq) {
                            }).fail(function (x, y, z) {
                                console.log(x, y, z);
                            }).always(function () {
                                HoldOn.close();
                            });
                        }
                    });
                } else {
                }
            }).fail(function (x, y, z) {
                console.log(x, y, z);
            }).always(function () {
                HoldOn.close();
            });
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }
    var ImporteTotal = 0;
    function onCalcularMontos() {
        var pares = 0;
        var descuento = 0;
        var total = 0.0;
        $.each(pnlDatosDetalle.find("#tblRegistrosDetalle tbody tr"), function () {
            pares += parseFloat(getNumber($(this).find("td").eq(6).text()));
            descuento += parseFloat(getNumber($(this).find("td").eq(8).text()));
            total += parseFloat(getNumber($(this).find("td").eq(9).text()));
        });
        //Seteamos la variableGlobalDelTotal
        ImporteTotal = total;
        onModificarImporte(IdMov, ImporteTotal);
        if (pnlDatosDetalle.find("#tblRegistrosDetalle > tbody > tr").length >= 1) {
            pnlDatosDetalle.find("#Pares").find("strong").text(pares);
            pnlDatosDetalle.find("#Descuento").find("strong").text('$' + $.number(descuento, 2, '.', ','));
            pnlDatosDetalle.find("#SubTotal").find("strong").text('$' + $.number(total, 2, '.', ','));
        }
        if (pnlDatos.find("input[name='TipoDoc']").val() === 'F') {
            pnlDatosDetalle.find("#IVA").find("strong").text('$' + $.number((total) * 0.16, 2, '.', ','));
            pnlDatosDetalle.find("#Total").find("strong").text('$' + $.number((total) * 1.16, 2, '.', ','));
        } else {
            pnlDatosDetalle.find("#IVA").find("strong").text('$' + $.number(0, 2, '.', ','));
            pnlDatosDetalle.find("#Total").find("strong").text('$' + $.number((total), 2, '.', ','));
        }
    }
    function onModificarImporte(ID, ImporteTotal) {
        $.ajax({
            url: master_url + 'onModificarImporte',
            type: "POST",
            data: {
                ID: ID,
                Importe: ImporteTotal
            }
        }).done(function (data, x, jq) {
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }
    function getSerieXEstilo(Estilo) {
        $.ajax({
            url: master_url + 'getSerieXEstilo',
            type: "POST",
            dataType: "JSON",
            data: {
                Estilo: Estilo
            }
        }).done(function (data, x, jq) {
            $.each(data[0], function (k, v) {
                $('#mdlBuscaManual').find('#rTallasBuscaManual').find("[name='" + k + "']").val(v);
            });
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }
    function getSerieXEstiloExt(Estilo) {
        $.ajax({
            url: master_url + 'getSerieXEstilo',
            type: "POST",
            dataType: "JSON",
            data: {
                Estilo: Estilo
            }
        }).done(function (data, x, jq) {
            $.each(data[0], function (k, v) {
                $('#mdlInfoExistencia').find("[name='" + k + "']").val(v);
            });
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }
    function getExistenciasXEstiloXCombinacion(Estilo, Combinacion) {
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
                $('#mdlBuscaManual').find("[name='Precio']").val(existencias.PrecioMenudeo);
                $.each(data[0], function (k, v) {
                    if (parseInt(v) <= 0) {
                        $('#mdlBuscaManual').find("[name='" + k + "']").addClass('NoStock');
                        $('#mdlBuscaManual').find("[name='" + k + "']").removeClass('Stock');
                        $('#mdlBuscaManual').find("[name='" + k + "']").val('0');
                    } else if (parseInt(v) > 0) {
                        $('#mdlBuscaManual').find("[name='" + k + "']").addClass('Stock');
                        $('#mdlBuscaManual').find("[name='" + k + "']").removeClass('NoStock');
                        $('#mdlBuscaManual').find("[name='" + k + "']").val(v);
                    }
                });
            } else {
                $('#mdlBuscaManual').find('#rExistencias').find("input").val("0");
                $('#mdlBuscaManual').find('#rExistencias').find("input").addClass('NoStock').val("0");
                $('#mdlBuscaManual').find("[name='Precio']").val("");
            }
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }
    function getExistenciasXEstiloXCombinacionBorrar(Estilo, Combinacion, Talla, Cantidad) {
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
                $('#mdlBuscaManual').find("[name='Precio']").val(existencias.PrecioMenudeo);
                $.each(data[0], function (k, v) {
                    if (parseInt(v) <= 0) {
                        $('#mdlBuscaManual').find("[name='" + k + "']").addClass('NoStock');
                        $('#mdlBuscaManual').find("[name='" + k + "']").removeClass('Stock');
                        $('#mdlBuscaManual').find("[name='" + k + "']").val('0');
                    } else if (parseInt(v) > 0) {
                        $('#mdlBuscaManual').find("[name='" + k + "']").addClass('Stock');
                        $('#mdlBuscaManual').find("[name='" + k + "']").removeClass('NoStock');
                        $('#mdlBuscaManual').find("[name='" + k + "']").val(v);
                    }
                });
            } else {
                $('#mdlBuscaManual').find('#rExistencias').find("input").val("0");
                $('#mdlBuscaManual').find('#rExistencias').find("input").addClass('NoStock').val("0");
                $('#mdlBuscaManual').find("[name='Precio']").val("");
            }
            onRegresarExistenciasInventario(Estilo, Combinacion, Talla, Cantidad);
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
        });
    }
    function getCombinacionesXEstilo(Estilo) {
        $.ajax({
            url: master_url + 'getCombinacionesXEstilo',
            type: "POST",
            dataType: "JSON",
            data: {
                Estilo: Estilo
            }
        }).done(function (data, x, jq) {
            $.each(data, function (k, v) {
                $('#mdlBuscaManual').find("[name='Combinacion']")[0].selectize.addOption({text: v.Descripcion, value: v.ID});
            });
            $('#mdlBuscaManual').find("[name='Combinacion']")[0].selectize.open();
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }
    function getCombinacionesXEstiloExt(Estilo) {
        $.ajax({
            url: master_url + 'getCombinacionesXEstilo',
            type: "POST",
            dataType: "JSON",
            data: {
                Estilo: Estilo
            }
        }).done(function (data, x, jq) {
            $.each(data, function (k, v) {
                $('#mdlInfoExistencia').find("[name='ColorEx']")[0].selectize.addOption({text: v.Descripcion, value: v.ID});
            });
            $('#mdlInfoExistencia').find("[name='ColorEx']")[0].selectize.open();
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }
    function getFotoXEstilo(Estilo) {
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
        });
    }
    function getEstilos() {
        $.ajax({
            url: master_url + 'getEstilos',
            type: "POST",
            dataType: "JSON"
        }).done(function (data, x, jq) {
            $.each(data, function (k, v) {
                $('#mdlBuscaManual').find("[name='Estilo']")[0].selectize.addOption({text: v.Descripcion, value: v.ID});
            });
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
        });
    }
    function getEstilosExt() {
        $.ajax({
            url: master_url + 'getEstilosExt',
            type: "POST",
            dataType: "JSON"
        }).done(function (data, x, jq) {
            $('#mdlInfoExistencia').find("[name='EstiloEx']")[0].selectize.clear(true);
            $.each(data, function (k, v) {
                $('#mdlInfoExistencia').find("[name='EstiloEx']")[0].selectize.addOption({text: v.Estilo, value: v.IdEstilo});
            });
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }
    function getClientes() {
        pnlDatos.find("[name='Cliente']")[0].selectize.close();
        pnlDatos.find("[name='Cliente']")[0].selectize.clear(true);
        pnlDatos.find("[name='Cliente']")[0].selectize.clearOptions();
        $.ajax({
            url: master_url + 'getClientes',
            type: "POST",
            dataType: "JSON"
        }).done(function (data, x, jq) {
            $.each(data, function (k, v) {
                pnlDatos.find("[name='Cliente']")[0].selectize.addOption({text: v.Nombre, value: v.ID});
            });
            pnlDatos.find("[name='Cliente']")[0].selectize.setValue('1');
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
        });
    }
    function getDescuentos() {
        $.ajax({
            url: master_url + 'getDescuentos',
            type: "POST",
            dataType: "JSON"
        }).done(function (data, x, jq) {
            if (data.length > 0) {
                pnlControlesDetalle.find("#dDescuento").removeClass('d-none');
                $.each(data, function (k, v) {
                    pnlControlesDetalle.find("[name='Descuento']")[0].selectize.addOption({text: v.Descripcion, value: v.Porcentaje});
                });
            } else {
                pnlControlesDetalle.find("#dDescuento").addClass('d-none');
            }
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
        });
    }
    function getMetodosPago() {
        $.ajax({
            url: master_url + 'getMetodosPago',
            type: "POST",
            dataType: "JSON"
        }).done(function (data, x, jq) {
            $.each(data, function (k, v) {
                pnlDatos.find("[name='MetodoPago']")[0].selectize.addOption({text: v.SValue, value: v.ID});
            });
            pnlDatos.find("[name='MetodoPago']")[0].selectize.setValue('1');
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
        });
    }
    function getVendedores() {
        $.ajax({
            url: master_url + 'getVendedores',
            type: "POST",
            dataType: "JSON"
        }).done(function (data, x, jq) {
            $.each(data, function (k, v) {
                pnlDatos.find("[name='Vendedor']")[0].selectize.addOption({text: v.Empleado, value: v.ID});
            });
            pnlDatos.find("[name='Vendedor']")[0].selectize.open();
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
        });
    }
    function getNuevoFolio() {
        $.ajax({
            url: master_url + 'getNuevoFolio',
            type: "POST",
            dataType: "JSON",
            data: {
                TipoDoc: pnlDatos.find("[name='TipoDoc']").val()
            }
        }).done(function (data, x, jq) {
            pnlDatos.find("[name='FolioTienda']").val(data);
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
        });
    }
    function getEncabezadoSerieXEstilo(Estilo) {
        $.ajax({
            url: master_url + 'getEncabezadoSerieXEstilo',
            type: "POST",
            dataType: "JSON",
            data: {
                Estilo: Estilo
            }
        }).done(function (data, x, jq) {
            $('#tblExistencias thead th:not(:nth-child(1))').each(function () {
                $(this).removeClass("d-none");
            });
            var thead = $('#tblExistencias thead th');
            thead.eq(1).text('Tienda');
            thead.eq(2).text('Estilo');
            var cont = 3;
            $.each(data[0], function (k, v) {
                if (parseInt(v) <= 0) {
                    thead.eq(cont).text('');
                } else {
                    thead.eq(cont).text(v);
                }
                cont++;
            });
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
        });
    }
    function getExistenciasByEstiloByColor(Estilo, Color) {
        temp = 0;
        $.ajax({
            url: master_url + 'getExistenciasByEstiloByColor',
            type: "POST",
            dataType: "JSON",
            data: {
                Estilo: Estilo,
                Color: Color
            }
        }).done(function (data, x, jq) {
            if (data.length > 0) {
                $("#tblRegistrosExistencias").html(getTable('tblExistencias', data));
                $('#tblExistencias tfoot th').each(function () {
                    $(this).addClass("d-none");
                });
                $('#tblExistencias thead th').each(function () {
                    $(this).addClass("d-none");
                });
                var thead = $('#tblExistencias thead th');
                var tfoot = $('#tblExistencias tfoot th');
                thead.eq(0).addClass("d-none");
                tfoot.eq(0).addClass("d-none");
                $.each($('#tblExistencias tbody tr'), function (k, v) {
                    var td = $(v).find("td");
                    td.eq(0).addClass("d-none");
                });
                getEncabezadoSerieXEstilo(Estilo);
                $.each($('#tblExistencias tbody tr td:not(:nth-child(1)):not(:nth-child(2)):not(:nth-child(3))'), function (k, v) {
                    if (parseFloat($(this).text()) === 0) {
                        $(this).text('-');
                    } else if (parseFloat($(this).text()) > 0) {
                        $(this).addClass('exists');
                    }
                });
                var tblSelected = $('#tblExistencias').DataTable(tblExistencias);
                var cellEstilo;
                $("#tblRegistrosExistencias").find('#tblExistencias tbody').on('click', 'tr', function () {
                    $("#tblExistencias tbody tr").removeClass("success");
                    $(this).addClass("success");
                    var cells = $(this).find("td");
                    cellEstilo = cells.eq(0).text();
                    getEncabezadoSerieXEstilo(cellEstilo);
                });
            } else {
                onNotify('<span class="fa fa-exclamation fa-lg"></span>', 'NO HAY EXISTENCIAS DE ESTE ESTILO', 'danger');
                $("#tblRegistrosExistencias").html("");
            }
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
        });
    }

</script>
<style>
    .Stock{
        font-weight: bold;
        color: #78a864;
    }
    .NoStock {
        font-weight: bold;
        color: #ff0000;
    }
</style>