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

                <label for="Mayoreo">Tallas</label> 
                <div style="overflow-x:auto; white-space: nowrap; ">
                    <input type="text" style="width: 35px;" class="numbersOnly" disabled="" name="T1">
                    <input type="text" style="width: 35px;" class="numbersOnly" disabled="" name="T2">
                    <input type="text" style="width: 35px;" class="numbersOnly" disabled="" name="T3">
                    <input type="text" style="width: 35px;" class="numbersOnly" disabled="" name="T4">
                    <input type="text" style="width: 35px;" class="numbersOnly" disabled="" name="T5">
                    <input type="text" style="width: 35px;" class="numbersOnly" disabled="" name="T6">
                    <input type="text" style="width: 35px;" class="numbersOnly" disabled="" name="T7">
                    <input type="text" style="width: 35px;" class="numbersOnly" disabled="" name="T8">
                    <input type="text" style="width: 35px;" class="numbersOnly" disabled="" name="T9">
                    <input type="text" style="width: 35px;" class="numbersOnly" disabled="" name="T10">
                    <input type="text" style="width: 35px;" class="numbersOnly" disabled="" name="T11">
                    <input type="text" style="width: 35px;" class="numbersOnly" disabled="" name="T12">
                    <input type="text" style="width: 35px;" class="numbersOnly" disabled="" name="T13">
                    <input type="text" style="width: 35px;" class="numbersOnly" disabled="" name="T14">
                    <input type="text" style="width: 35px;" class="numbersOnly" disabled="" name="T15">
                    <input type="text" style="width: 35px;" class="numbersOnly" disabled="" name="T16">
                    <input type="text" style="width: 35px;" class="numbersOnly" disabled="" name="T17">
                    <input type="text" style="width: 35px;" class="numbersOnly" disabled="" name="T18">
                    <input type="text" style="width: 35px;" class="numbersOnly" disabled="" name="T19">
                    <input type="text" style="width: 35px;" class="numbersOnly" disabled="" name="T20">
                    <input type="text" style="width: 35px;" class="numbersOnly" disabled="" name="T21">
                    <input type="text" style="width: 35px;" class="numbersOnly" disabled="" name="T22">
                    <br>
                    <span class="disabledForms">
                        <input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex1">
                        <input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex2">
                        <input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex3">
                        <input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex4">
                        <input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex5">
                        <input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex6">
                        <input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex7">
                        <input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex8">
                        <input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex9">
                        <input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex10">
                        <input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex11">
                        <input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex12">
                        <input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex13">
                        <input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex14">
                        <input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex15">
                        <input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex16">
                        <input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex17">
                        <input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex18">
                        <input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex19">
                        <input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex20">
                        <input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex21">
                        <input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex22">
                    </span>
                </div>
                <br>
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

<div class="card border-0">
    <div class="card-body text-dark" > 
        <!--ENCABEZADO-->
        <div id="pnlDatos" >
            <!--ACCIONES-->
            <div class="row">
                <div class="col-md-5 float-left">
                    <h5>VENTAS: <?php echo $this->session->userdata('TIENDA_NOMBRE') ?></h5>
                </div>
                <div class="col-md-7 float-right" align="right">
                    <button type="button" class="btn btn-danger btn-sm" id="btnSalir"><span class="fa fa-window-close"></span> SALIR</button>
                    <button type="button" class="btn btn-info btn-sm" id="btnBuscar"><span class="fa fa-search"></span> BUSCAR (F2)</button>
                    <!--<button type="button" class="btn btn-info" ><span class="fa fa-table"></span> EXISTENCIAS</button>-->
                    <button type="button" class="btn btn-warning btn-sm d-none" id="btnCancelarVenta"><span class="fa fa-ban"></span> CANCELAR</button>
                    <button type="button" class="btn btn-primary d-none btn-sm" id="btnGuardar"><span class="fa fa-save "></span> GUARDAR</button>
                    <button type="button" class="btn btn-success btn-sm" id="btnCerrar"><span class="fa fa-dollar-sign"></span> CERRAR VENTA (F11)</button>
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
                        <div class="col-12 col-md-1"
                             <label for="TipoDoc">Tp*</label>  
                            <input type="text" class="form-control form-control-sm numbersOnly" id="TipoDoc" maxlength="1" name="TipoDoc" required >
                        </div>
                        <div class="col-12 col-md-1">
                            <label for="FolioTienda">No.*</label>  
                            <input type="text" class="form-control form-control-sm numbersOnly " maxlength="10" id="FolioTienda" name="FolioTienda" disabled="">
                        </div>
                        <div class="col-12 col-md-3">
                            <label for="Cliente">Cliente* (F9) Actualizar</label>
                            <div class="input-group mb-3">
                                <select class="form-control form-control-sm required"  name="Cliente"> 
                                    <option value=""></option>  
                                </select>
                                <div class="input-group-prepend">
                                    <a href="<?php print base_url('Clientes') ?>" target="_blank" class="input-group-text text-dark" data-toggle="tooltip" data-placement="top" title="Ver Clientes"><i class="fa fa-users"></i></a>
                                </div>
                            </div>
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
                            <select class="form-control form-control-sm required" id="MetodoPago"  name="MetodoPago"> 
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
                    <label for="CodigoBarras">Código Barras</label> 
                    <div class="input-group mb-3">
                        <input type="text" class="form-control form-control-sm numbersOnly"  name="CodigoBarras"  >
                        <div class="input-group-prepend">
                            <span class="input-group-text text-dark"><i class="fa fa-barcode"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-2 col-sm-2">
                    <label for="Estilo">Estilo</label>
                    <div class="input-group mb-3">
                        <select class="form-control form-control-sm "  name="Estilo"> 
                            <option value=""></option>  
                        </select>
                        <span class="input-group-prepend">
                            <span class="input-group-text text-dark" id="btnExistencias" data-toggle="tooltip" data-placement="top" title="Existencia en Tiendas">
                                <i class="fa fa-search"></i>
                            </span>
                        </span>
                    </div>
                    <!-- <label for="Estilo">Estilo</label>
                                        <select class="form-control form-control-sm "  name="Estilo"> 
                                            <option value=""></option>  
                                        </select>-->
                </div>
                <div class="col-12 col-md-2 col-sm-2">
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
                    <button  class="btn btn-primary btn-sm" id="btnAgregarDetalle" data-toggle="tooltip" data-placement="top" title="Agregar Producto" >
                        <i class="fa fa-plus"></i>
                    </button>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <label for="">Tallas y Existencias (Ctrl+E para ver en otras tiendas)</label> 
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
                <div class=" col-md-9 ">
                    <div class="row">
                        <div class="table-responsive" id="RegistrosDetalle">

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
    var btnCerrar = $("#btnCerrar");
    var btnBuscar = $("#btnBuscar");
    var btnCancelarVenta = $("#btnCancelarVenta");
    var currentDate = new Date();
    var nuevo = true;
    var IdMov = 0;

    /*DATATABLE GLOBAL*/
    var tblDetalleVenta;
    var tblInicial = {
        "dom": 'frt',
        "autoWidth": false,
        "colReorder": true,
        "bLengthChange": false,
        "deferRender": true,
        "scrollY": 220,
        "scrollCollapse": false,
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
        "bSort": true
    };

    $(document).ready(function () {
        //Aqui devolver existencias y mandarle dialogo de confimacion
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
            btnExistencias.trigger('click');
        });

        //Inicializar Componentes
        pnlDatos.find("input").val("");
        $.each(pnlDatos.find("select"), function (k, v) {
            pnlDatos.find("select")[k].selectize.clear(true);
        });
        $(':input:text:enabled:visible:first').focus();
        pnlDatos.find("#FechaMov").datepicker("setDate", currentDate);
        pnlDatos.find('#TipoDoc').val('2');
        $('#Encabezado').removeClass('disabledForms');
        pnlControlesDetalle.removeClass('disabledForms');
        nuevo = true;
        //getRecords();
        getNuevoFolio();
        getEstilos();
        getClientes();
        getDescuentos();
        getMetodosPago();
        getVendedores();
        handleEnter();
        //Inserta Detalle y guarda el movimiento
        pnlControlesDetalle.find("#btnAgregarDetalle").click(function () {
            var Estilo = pnlControlesDetalle.find("[name='Estilo']");
            var Color = pnlControlesDetalle.find("[name='Combinacion']");
            var Talla = pnlControlesDetalle.find("[name='Talla']");
            var Precio = pnlControlesDetalle.find("[name='Precio']");
            var Cantidad = pnlControlesDetalle.find("[name='Cantidad']");

            if (Estilo.val() !== '' && Color.val() !== '' && Talla.val() !== '' && Precio.val() !== ''
                    && Cantidad.val() !== '' && Cantidad.val() > 0 && Precio.val() > 0
                    )
            {
                //Agregar renglon Detalle
                onAgregarFila(IdMov);
                onSacarExistenciasInventario();
                //Limpiar los campos del detalle
                limpiarCampos();

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
        //Campo que guarda el movimiento para que pueda guardarse el detalle
        pnlDatos.find("#MetodoPago").change(function () {
            btnGuardar.trigger('click');
        });
        //Calula los montos si se cambia el tipo de documento fiscal o no fiscal
        pnlDatos.find("input[name='TipoDoc']").keyup(function () {
            if (pnlDatosDetalle.find("#tblRegistrosDetalle tbody tr").length > 0) {
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
                        pnlControlesDetalle.find("[name='Talla']").val('');
                        pnlControlesDetalle.find("[name='Estilo']")[0].selectize.focus();
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
                    text: 'No existen existencias en esta talla',
                    icon: 'warning'
                }).then((result) => {
                    if (result) {
                        pnlControlesDetalle.find("[name='Cantidad']").val('');
                        pnlControlesDetalle.find("[name='Cantidad']").focus();
                    }
                });

            }
        });
        //Evento que controla la insercion de filas a la tabla cuando se termina de capturar 
        pnlControlesDetalle.find("[name='Precio']").blur(function () {
            pnlControlesDetalle.find("#btnAgregarDetalle").trigger('click');
        });
        //Eventos en el select de estilo para traer las tallas y los colores
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
        //Evento para traer colores en modal de existencias
        $('#mdlInfoExistencia').find("[name='EstiloEx']").change(function () {
            $('#mdlInfoExistencia').find("input").val("");
            $('#mdlInfoExistencia').find("[name='ColorEx']")[0].selectize.clear(true);
            $('#mdlInfoExistencia').find("[name='ColorEx']")[0].selectize.clearOptions();
            getCombinacionesXEstiloExt($(this).val());
            getExistenciasByEstiloByColor($(this).val(), '');
        });
        $('#mdlInfoExistencia').find("[name='ColorEx']").change(function () {
            var EstiloEx = $('#mdlInfoExistencia').find("[name='EstiloEx']")[0].selectize.getValue();
            getExistenciasByEstiloByColor(EstiloEx, $(this).val());
            $('#tblExistencias input[type=search]').focus();
        });
        //Evento modal para inicializar el foco
        $('#mdlInfoExistencia').on('shown.bs.modal', function () {
            $(':input:text:enabled:visible:first').focus();
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
                    HoldOn.open({
                        theme: "sk-bounce",
                        message: "CARGANDO DATOS..."
                    });
                    $.ajax({
                        url: master_url + 'getVentaByFolioTiendaByTipoDocByTienda',
                        type: "POST",
                        dataType: "JSON",
                        data: {
                            FolioTienda: FolioTienda,
                            TipoDoc: TipoDoc
                        }
                    }).done(function (data, x, jq) {
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
                            btnCerrar.removeClass('d-none');
                            btnCancelarVenta.removeClass('d-none');
                            /*DETALLE*/
                            getDetallebyID(data[0].ID);
                            /*FIN DETALLE*/
                        } else {
                            btnCerrar.addClass('d-none');
                            btnCancelarVenta.addClass('d-none');
                            $('#Encabezado').addClass('disabledForms');
                            pnlControlesDetalle.addClass('disabledForms');
                            /*DETALLE*/
                            getDetalleDisabledbyID(data[0].ID);
                            /*FIN DETALLE*/
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
        //Evento botones
        btnBuscar.click(function () {
            pnlDatos.find("input[name='FolioTienda']").prop("disabled", false);
            pnlDatos.find("input[name='FolioTienda']").focus();
        });
        btnGuardar.click(function () {
            isValid('pnlDatos');
            if (valido) {
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
                    }).fail(function (x, y, z) {
                        console.log(x, y, z);
                    }).always(function () {
                        HoldOn.close();
                    });
                }
            } else {
                onNotify('<span class="fa fa-times fa-lg"></span>', '* DEBE DE COMPLETAR LOS CAMPOS REQUERIDOS *', 'danger');
            }

        });
        btnSalir.click(function () {
            $(location).attr('href', base_url);
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
                            message: "CARGANDO DATOS..."
                        });
                        $.ajax({
                            url: master_url + 'onEliminar',
                            type: "POST",
                            data: {
                                ID: temp
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
                swal("INFO", "LA VENTA NO EXISTE", 'warning');
            }
        });
        btnExistencias.click(function () {
            getEstilosExt();
            $('#mdlInfoExistencia').modal('show');

        });

    });

    function limpiarCampos() {
        $("[name='CodigoBarras']").focus();
        $("[name='Estilo']")[0].selectize.clear(true);
        $("[name='Combinacion']")[0].selectize.clear(true);
        $("[name='Combinacion']")[0].selectize.clearOptions();
        $("[name='Precio']").val('');
        $("[name='Cantidad']").val('');
        $("[name='Talla']").val('');
        var tallas = pnlControlesDetalle.find("#tblTallas > tbody > tr");
        $.each(tallas.find("input.numbersOnly"), function () {
            $(this).val('');
        });
    }
    /*AGREGAR ESTILO-COLOR*/
    function onAgregarFila(MovID) {
        var Estilo = pnlControlesDetalle.find("[name='Estilo']");
        var Combinacion = pnlControlesDetalle.find("[name='Combinacion']");
        var Costo = pnlControlesDetalle.find("[name='Precio']");
        var Desc = pnlControlesDetalle.find("[name='Descuento']");
        var Talla = pnlControlesDetalle.find("[name='Talla']");
        var Cantidad = pnlControlesDetalle.find("[name='Cantidad']");
        if (pnlDatos.find("input[name='TipoDoc']").val() > 0) {
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

    function getDetallebyID(IDX) {
        HoldOn.open({theme: "sk-bounce", message: "CARGANDO DATOS..."});
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
                    $(this).html('');
                });
                var thead = $('#tblRegistrosDetalle thead th');
                var tfoot = $('#tblRegistrosDetalle tfoot th');
                thead.eq(0).addClass("d-none");
                tfoot.eq(0).addClass("d-none");
                thead.eq(1).addClass("d-none");
                tfoot.eq(1).addClass("d-none");
                thead.eq(2).addClass("d-none");
                tfoot.eq(2).addClass("d-none");
                thead.eq(10).addClass("d-none");
                tfoot.eq(10).addClass("d-none");
                $.each($('#tblRegistrosDetalle tbody tr'), function (k, v) {
                    var td = $(v).find("td");
                    td.eq(0).addClass("d-none");
                    td.eq(1).addClass("d-none");
                    td.eq(2).addClass("d-none");
                    td.eq(10).addClass("d-none");

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

//                pnlDatosDetalle.find('#tblRegistrosDetalle tbody tr').on('click', 'td:eq(11)', function () {
//                    var cells = $(this).parent().find("td");
//                    var cellEstilo = cells.eq(1).text();
//                    var cellCombinacion = cells.eq(2).text();
//                    var cellTalla = cells.eq(5).text();
//                    var cellCantidad = cells.eq(6).text();
//
//
//                    getFotoXEstilo(parseInt(cellEstilo));
//                    getSerieXEstilo(parseInt(cellEstilo));
//                    getExistenciasXEstiloXCombinacionBorrar(parseInt(cellEstilo), parseInt(cellCombinacion),cellTalla,cellCantidad);
//
//
////                    $(document).ajaxComplete(function () {
////                        onRegresarExistenciasInventario(cellEstilo, cellCombinacion, cellTalla, cellCantidad);
////                    });
//
//                    
//                });

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
        HoldOn.open({theme: "sk-bounce", message: "CARGANDO DATOS..."});
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
                    $(this).html('');
                });
                var thead = $('#tblRegistrosDetalle thead th');
                var tfoot = $('#tblRegistrosDetalle tfoot th');
                thead.eq(0).addClass("d-none");
                tfoot.eq(0).addClass("d-none");
                thead.eq(1).addClass("d-none");
                tfoot.eq(1).addClass("d-none");
                thead.eq(2).addClass("d-none");
                tfoot.eq(2).addClass("d-none");
                thead.eq(10).addClass("d-none");
                tfoot.eq(10).addClass("d-none");
                thead.eq(11).addClass("d-none");
                tfoot.eq(11).addClass("d-none");
                $.each($('#tblRegistrosDetalle tbody tr'), function (k, v) {
                    var td = $(v).find("td");
                    td.eq(0).addClass("d-none");
                    td.eq(1).addClass("d-none");
                    td.eq(2).addClass("d-none");
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

        var tallas = pnlControlesDetalle.find("#tblTallas > tbody > tr").eq(0);
        var existencias = pnlControlesDetalle.find("#tblTallas > tbody > tr").eq(1);
        var existenciaFinal = 0;
        var existenciaActual = 0;
        var PosicionActualiza = "";
        $.each(tallas.find("input.numbersOnly"), function () {

            if (parseFloat(Talla) === parseFloat($(this).val())) {
                existenciaActual = existencias.find('td').eq($(this).parent().index()).find("input").val();
                PosicionActualiza = existencias.find('td').eq($(this).parent().index()).find("input").attr("name");
                existenciaFinal = parseFloat(existenciaActual) + parseFloat(Cantidad);


                console.log('ac' + existenciaActual + 'pos' + PosicionActualiza + 'can' + existenciaFinal);

//                $.ajax({
//                    url: master_url + 'onModifcarExistenciaXEstiloXColorXTienda',
//                    type: "POST",
//                    data: {
//                        Estilo: Estilo,
//                        Color: Color,
//                        Posicion: PosicionActualiza,
//                        ExistenciaNueva: existenciaFinal
//                    }
//                }).done(function (data, x, jq) {
//                    existencias.find('td').eq($(this).parent().index()).find("input").val(existenciaFinal);
//                }).fail(function (x, y, z) {
//                    console.log(x, y, z);
//                }).always(function () {
//                    HoldOn.close();
//                });
            }
        });
    }

    function onSacarExistenciasInventario() {
        var Estilo = pnlControlesDetalle.find("[name='Estilo']");
        var Color = pnlControlesDetalle.find("[name='Combinacion']");
        var CantidadCaptura = pnlControlesDetalle.find("[name='Cantidad']").val();//Cantidad a descontar
        var TallaCapturada = pnlControlesDetalle.find("[name='Talla']").val();//Verificar que talla
        var tallas = pnlControlesDetalle.find("#tblTallas > tbody > tr").eq(0);
        var existencias = pnlControlesDetalle.find("#tblTallas > tbody > tr").eq(1);
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
                    existencias.find('td').eq($(this).parent().index()).find("input").val(existenciaFinal);
                }).fail(function (x, y, z) {
                    console.log(x, y, z);
                }).always(function () {
                    HoldOn.close();
                });


            }
        });
    }

    function onEliminarDetalle(IDX, ID, Estilo, Color, Talla, Cantidad) {

        //getSerieXEstilo(parseInt(Estilo));
        //getExistenciasXEstiloXCombinacion(parseInt(Estilo), parseInt(Color));

//        swal({
//            buttons: ["Cancelar", "Aceptar"],
//            title: 'Estas Seguro?',
//            text: "Esta acción no se puede revertir",
//            icon: "warning",
//            dangerMode: true
//        }).then((result) => {
//            if (result) {
//                HoldOn.open({
//                    theme: "sk-bounce",
//                    message: "ELIMINANDO REGISTRO..."
//                });
//                $.ajax({
//                    url: master_url + 'onEliminarDetalle',
//                    type: "POST",
//                    data: {
//                        ID: IDX
//                    }
//                }).done(function (data, x, jq) {
//                    getDetallebyID(ID);
//                    onCalcularMontos();
//                }).fail(function (x, y, z) {
//                    console.log(x, y, z);
//                }).always(function () {
//                    HoldOn.close();
//                });
//            }
//        });
    }


    function onCalcularMontos() {
        var pares = 0;
        var descuento = 0;
        var total = 0.0;
        $.each(pnlDatosDetalle.find("#tblRegistrosDetalle tbody tr"), function () {
            pares += parseFloat(getNumber($(this).find("td").eq(6).text()));
            descuento += parseFloat(getNumber($(this).find("td").eq(8).text()));
            total += parseFloat(getNumber($(this).find("td").eq(9).text()));
        });
        if (pnlDatosDetalle.find("#tblRegistrosDetalle > tbody > tr").length >= 1) {
            pnlDatosDetalle.find("#Pares").find("strong").text(pares);
            pnlDatosDetalle.find("#Descuento").find("strong").text('$' + $.number(descuento, 2, '.', ','));
            pnlDatosDetalle.find("#SubTotal").find("strong").text('$' + $.number(total, 2, '.', ','));
        }
        if (parseInt(pnlDatos.find("input[name='TipoDoc']").val()) === 1) {
            pnlDatosDetalle.find("#IVA").find("strong").text('$' + $.number((total) * 0.16, 2, '.', ','));
            pnlDatosDetalle.find("#Total").find("strong").text('$' + $.number((total) * 1.16, 2, '.', ','));
        } else {
            pnlDatosDetalle.find("#IVA").find("strong").text('$' + $.number(0, 2, '.', ','));
            pnlDatosDetalle.find("#Total").find("strong").text('$' + $.number((total), 2, '.', ','));
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

    function getSerieXEstiloExt(Estilo) {
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
                $('#mdlInfoExistencia').find("[name='" + k + "']").val(v);
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
                    if (parseInt(v) <= 0) {
                        pnlControlesDetalle.find("[name='" + k + "']").addClass('NoStock');
                        pnlControlesDetalle.find("[name='" + k + "']").removeClass('Stock');
                        pnlControlesDetalle.find("[name='" + k + "']").val('0');
                    } else if (parseInt(v) > 0) {
                        pnlControlesDetalle.find("[name='" + k + "']").addClass('Stock');
                        pnlControlesDetalle.find("[name='" + k + "']").removeClass('NoStock');
                        pnlControlesDetalle.find("[name='" + k + "']").val(v);
                    }
                });
            } else {
                pnlControlesDetalle.find('#rExistencias').find("input").val("0");
                pnlControlesDetalle.find('#rExistencias').find("input").addClass('NoStock').val("0");
                pnlControlesDetalle.find("[name='Precio']").val("");
            }
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }
    
     function getExistenciasXEstiloXCombinacionBorrar(Estilo, Combinacion,Talla, Cantidad) {
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
                    if (parseInt(v) <= 0) {
                        pnlControlesDetalle.find("[name='" + k + "']").addClass('NoStock');
                        pnlControlesDetalle.find("[name='" + k + "']").removeClass('Stock');
                        pnlControlesDetalle.find("[name='" + k + "']").val('0');
                    } else if (parseInt(v) > 0) {
                        pnlControlesDetalle.find("[name='" + k + "']").addClass('Stock');
                        pnlControlesDetalle.find("[name='" + k + "']").removeClass('NoStock');
                        pnlControlesDetalle.find("[name='" + k + "']").val(v);
                    }
                });
            } else {
                pnlControlesDetalle.find('#rExistencias').find("input").val("0");
                pnlControlesDetalle.find('#rExistencias').find("input").addClass('NoStock').val("0");
                pnlControlesDetalle.find("[name='Precio']").val("");
            }
            onRegresarExistenciasInventario(Estilo, Combinacion, Talla, Cantidad);
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

    function getCombinacionesXEstiloExt(Estilo) {
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

    function getEstilosExt() {
        HoldOn.open({theme: 'sk-bounce', message: 'ESPERE...'});
        $.ajax({
            url: master_url + 'getEstilos',
            type: "POST",
            dataType: "JSON"
        }).done(function (data, x, jq) {
            $('#mdlInfoExistencia').find("[name='EstiloEx']")[0].selectize.clear(true);
            $.each(data, function (k, v) {
                $('#mdlInfoExistencia').find("[name='EstiloEx']")[0].selectize.addOption({text: v.Descripcion, value: v.ID});
            });
            $('#mdlInfoExistencia').find("[name='EstiloEx']")[0].selectize.focus();
            $('#mdlInfoExistencia').find("[name='EstiloEx']")[0].selectize.close();
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

    function getNuevoFolio() {
        HoldOn.open({theme: 'sk-bounce', message: 'ESPERE...'});
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
            HoldOn.close();
        });
    }

    function getExistenciasByEstiloByColor(Estilo, Color) {
        temp = 0;
        HoldOn.open({
            theme: "sk-bounce",
            message: "CARGANDO DATOS..."
        });
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
                    $(this).html('');
                });
                var thead = $('#tblExistencias thead th');
                var tfoot = $('#tblExistencias tfoot th');
                thead.eq(0).addClass("d-none");
                tfoot.eq(0).addClass("d-none");
                $.each($.find('#tblExistencias tbody tr'), function (k, v) {
                    var td = $(v).find("td");
                    td.eq(0).addClass("d-none");
                });
                var tblSelected = $('#tblExistencias').DataTable(tblExistencias);
                $('#tblExistencias input[type=search]').focus();
                $('#tblExistencias tbody').on('click', 'tr', function () {
                    var dtm = tblSelected.row(this).data();
                    temp = parseInt(dtm[0]);

                    $("#tblExistencias tbody tr").removeClass("success");
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
                        HoldOn.open({
                            theme: "sk-bounce",
                            message: "CARGANDO DATOS..."
                        });
                        $.ajax({
                            url: master_url + 'getExistenciaByID',
                            type: "POST",
                            dataType: "JSON",
                            data: {
                                ID: temp
                            }
                        }).done(function (data, x, jq) {
                            getSerieXEstiloExt(data[0].Estilo);
                            $('#mdlInfoExistencia').find("input").val("");
                            $.each(data[0], function (k, v) {
                                if (parseInt(v) <= 0) {
                                    $('#mdlInfoExistencia').find("[name='" + k + "']").prop("disabled", 'disabled');
                                    $('#mdlInfoExistencia').find("[name='" + k + "']").addClass('NoStock');
                                    $('#mdlInfoExistencia').find("[name='" + k + "']").removeClass('Stock');
                                    $('#mdlInfoExistencia').find("[name='" + k + "']").val('0');
                                } else if (parseInt(v) > 0) {
                                    $('#mdlInfoExistencia').find("[name='" + k + "']").prop("disabled", false);
                                    $('#mdlInfoExistencia').find("[name='" + k + "']").addClass('Stock');
                                    $('#mdlInfoExistencia').find("[name='" + k + "']").removeClass('NoStock');
                                    $('#mdlInfoExistencia').find("[name='" + k + "']").val(v);
                                }
                            });
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
                onNotify('<span class="fa fa-exclamation fa-lg"></span>', 'NO EXISTEN EXISTENCIAS DE ESTE ESTILO', 'danger');
                $("#tblRegistrosExistencias").html("");
            }
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
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