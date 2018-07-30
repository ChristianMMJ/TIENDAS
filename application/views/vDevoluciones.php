<!--MODAL DEVOLUCIONES -->
<div class="card animated fadeIn" id="pnlTablero">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6 float-left">
                <legend class="float-left">Gestión de devoluciones</legend>
            </div>
            <div class="col-sm-6 float-right" align="right">
                <button type="button" class="btn btn-primary" id="btnNuevo"><span class="fa fa-plus"></span><br></button>
                <button type="button" class="btn btn-primary" id="btnConfirmarEliminar"><span class="fa fa-trash"></span><br></button>
            </div>
        </div>
        <div class="card-block">
            <div id="DevolucionesCancelar" class="table-responsive">
                <table id="tblDevolucionesACancelar" class="table table-bordered table-striped table-hover display row-border hover order-column" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th> 
                            <th>TIENDA</th>
                            <th>FOLIO</th> 
                            <th>CLIENTE</th> 
                            <th>FECHA DE CREACION</th> 
                            <th>IMPORTE</th> 
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div id="" class="container-fluid ">
    <div class="card border-0 animated fadeIn d-none" id="pnlDatos"> 
        <div id="accordion">
            <div class="card">
                <div class="card-header mt-3" id="headingOne">
                    <div class="row">
                        <div class="col-12 col-sm-1 col-md-1 col-lg-1 col-xl-1">
                            <button type='button' class="btn btn-danger btn-sm" id='btnCancelarAtras'><span class="fa fa-arrow-left "></span> CANCELAR</button>
                        </div>
                        <div class="col-12 col-sm-10 col-md-10 col-lg-10 col-xl-10" align="center">
                            <h5 class="mb-0">Buscar Venta</h5>
                        </div>
                        <div class="col-12 col-sm-1 col-md-1 col-lg-1 col-xl-1">
                            <button type='button' class="btn btn-primary btn-sm d-none" id='btnFinalizar'><span class="fa fa-check"></span> FINALIZAR</button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 d-none" >
                            <input type="text" id="Venta" name="Venta" readonly="" class="form-control">
                        </div>
                    </div>
                    <!--SUBTOTAL DETALLE VENTA-->
                    <div id="ResumenDevolucionesDetalle" class="row">
                        <div class="col-7 col-sm-7 col-md-7 col-lg-8 col-xl-8" class="">
                            <input type="text" id="NumeroDeVenta" name="NumeroDeVenta" class="form-control form-control-sm" placeholder="# de venta"> 
                        </div>
                        <div class="col-2 col-sm-2 col-md-2 col-lg-1 col-xl-1" class="">
                            <button type="button" class="btn btn-primary btn-sm" id="btnBuscarVenta">
                                <span class="fa fa-search"></span>
                            </button>
                        </div>
                        <div class="col-3 col-sm-2 col-md-2 col-lg-1 col-xl-1" align="left" >
                            <div class="custom-control custom-checkbox" >
                                <input type="checkbox" class="custom-control-input " style="cursor: pointer;" id="Todos" name="Todos" onchange="onSeleccionarTodos(this)">
                                <label class="custom-control-label" for="Todos" style="cursor: pointer;">Todos</label>
                            </div>
                        </div>
                        <div class="w-100"><br></div>
                        <div id="SubtotalEncabezado" align='center' class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <h1 class="text-success">$0.0</h1>
                        </div>
                    </div>
                    <div id="DevolucionesDetalle" class="table-responsive table-sm d-none">
                        <table id="tblDevolucionesDetalle" class="table table-bordered table-striped table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>ID</th> 
                                    <th>ESTILO</th>
                                    <th>COLOR</th> 
                                    <th>TALLA</th> 
                                    <th>CANTIDAD</th> 
                                    <th>PRECIO</th> 
                                    <th>DESCUENTO</th> 
                                    <th>SUBTOTAL</th> 
                                    <th>ACCION</th> 
                                    <th>ESTILO_ID</th> 
                                    <th>COLOR_ID</th> 
                                    <th>CANTIDAD_VENTA</th>
                                    <th>CANTIDAD_DEVOLUCION</th> 
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                    <!--FIN SUBTOTAL DETALLE VENTA--> 
                </div>  
            </div>
            <div class="card border-dark">
                <div class="card-header" id="headingTwo"  align="center">
                    <h5 class="mb-0">
                        Finalizar Devolucion 
                    </h5>
                </div> 
                <div class="card-body">
                    <!--ARTICULOS A ESCOGER-->
                    <div id="ResumenDetalleParaIntercambio" class="row">

                        <div class="col-2 d-none" align="center">
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input type="checkbox" autocomplete="off" id="btnActivarCodigoDevolucion" name="btnActivarCodigoDevolucion" class="form-control">
                                    <br><strong>Código de barras</strong>
                                </label>
                            </div>
                        </div>
                        <div class="col-8 d-none">
                            <input type="text" id="CodigoBarrasDevolucion" name="CodigoBarrasDevolucion" class="form-control" placeholder="000123456">
                        </div>
                        <div class="col-2 d-none">     
                            <button type='button' class="btn btn-primary btn-sm mt-1" id='btnBuscarCodigoDevolucion'><span class="fa fa-search"></span> BUSCAR CÓDIGO</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="w-100 d-none d-md-block"></div>
                        <div class="col-12 col-sm-12 col-md-4 col-lg-3 col-xl-3">
                            <strong for="Estilo">Estilo</strong>
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
                        </div>
                        <div class="col-12 col-sm-12 col-md-4 col-lg-2 col-xl-2">
                            <strong for="Combinacion">Color*</strong>
                            <select class="form-control form-control-sm "  name="Combinacion">
                                <option value=""></option>
                            </select>
                        </div>
                        <div class="col-12 col-sm-12 col-md-4 col-lg-2 col-xl-2">
                            <strong for="Talla">Talla</strong>
                            <input type="text" class="form-control form-control-sm numbersOnly" maxlength="4" name="Talla" >
                        </div> 
                        <div class="col-12 col-sm-12 col-md-4 col-lg-2 col-xl-2"> 
                            <strong for="Talla">Cantidad</strong>
                            <input type="text" class="form-control form-control-sm numbersOnly" name="Cantidad">
                        </div> 
                        <div class="col-12 col-sm-12 col-md-4 col-lg-2 col-xl-2"> 
                            <strong for="Precio">Precio</strong>
                            <input type="text" class="form-control form-control-sm numbersOnly" id="Precio" maxlength="8" name="Precio" >
                        </div>
                        <div class="col-12 col-sm-12 col-md-4 col-lg-1 col-xl-1">
                            <br>
                            <button  class="btn btn-primary btn-sm" id="btnAgregarADevolucion" data-toggle="tooltip" data-placement="top" title="Agregar Producto" >
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                        <div class="col-sm-12" align="center">
                            <h5> <span class="badge badge-pill badge-primary">* Tallas y Existencias *</span></h5>
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
                                        <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex1" readonly=""></td>
                                        <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex2" readonly=""></td>
                                        <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex3" readonly=""></td>
                                        <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex4" readonly=""></td>
                                        <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex5" readonly=""></td>
                                        <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex6" readonly=""></td>
                                        <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex7" readonly=""></td>
                                        <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex8" readonly=""></td>
                                        <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex9" readonly=""></td>
                                        <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex10" readonly=""></td>
                                        <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex11" readonly=""></td>
                                        <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex12" readonly=""></td>
                                        <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex13" readonly=""></td>
                                        <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex14" readonly=""></td>
                                        <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex15" readonly=""></td>
                                        <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex16" readonly=""></td>
                                        <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex17" readonly=""></td>
                                        <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex18" readonly=""></td>
                                        <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex19" readonly=""></td>
                                        <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex20" readonly=""></td>
                                        <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex21" readonly=""></td>
                                        <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex22" readonly=""></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div id="TieneTP" class="col-12" align="center">
                            <input type="text" id="VentaTP" name="VentaTP" class="form-control d-none" readonly="">
                            <strong class="text-danger">*Movimientos con I.V.A*</strong>
                        </div>
                    </div>
                    <div id="DetalleParaIntercambio" class="table-responsive ">
                        <table id="tblDetalleParaIntercambio" class="table table-bordered table-striped table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>ESTILOID</th> 
                                    <th>ESTILO</th>
                                    <th>COLORID</th> 
                                    <th>COLOR</th> 
                                    <th>TALLA</th> 
                                    <th>CANTIDAD</th> 
                                    <th>PRECIO</th>  
                                    <th>SUBTOTAL</th> 
                                    <th>ACCION</th> 
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                    <!--TOTALES-->
                    <div id="ResumenDetalleParaIntercambioTotales" class="row">
                        <div id="SubtotaPie" class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3" align="center">
                            <h5><strong class="badge badge-danger">* Monto devolución *</strong></h5><br>
                            <strong class="text-dark">$ 0.0</strong>
                        </div>
                        <div id="TotalCubierto" class="col-12 col-sm-6 col-md-2 col-lg-2 col-xl-2" align="center">
                            <h5><strong class="badge badge-info">* Subtotal *</strong></h5><br>
                            <strong class="text-dark">$ 0.0</strong>
                        </div>
                        <div id="TotalCubiertoIVA" class="col-12 col-sm-6 col-md-2 col-lg-2 col-xl-2" align="center">
                            <h5><strong class="badge badge-warning">* I. V. A. *</strong></h5><br>
                            <strong class="text-dark">$ 0.0</strong>
                        </div>
                        <div id="TotalCubiertoTotal" class="col-12 col-sm-6 col-md-2 col-lg-2 col-xl-2" align="center">
                            <h5><strong class="badge badge-primary">* Total *</strong></h5><br>
                            <strong class="text-dark">$ 0.0</strong>
                        </div>
                        <div id="TotalDiferencia" class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3" align="center">
                            <h5><strong class="badge badge-success">* Diferencia a cobrar *</strong></h5><br>
                            <strong class="text-dark">$ 0.0</strong>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-12" align="center"><br>
                            <h3 class="text-info" id="ImporteEnLetraDevolucion"></h3>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <h5><strong class="badge badge-pill badge-danger">* Metodo de pago *</strong></h5>
                            <select class="form-control form-control-sm required" id="MetodoPago"  name="MetodoPago">
                                <option value=""></option>
                            </select>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6" align="">
                            <h5><strong class="badge badge-pill badge-dark">* Su Pago *</strong></h5>
                            <input type="text" id="SuPagoDevolucion" name="SuPagoDevolucion" class="form-control form-control-sm  numbersOnly text-success input-lg money" placeholder="0.0">
                        </div>
                        <div class="col-12"> 
                            <div class="col-12 text-center">
                                <h5><strong class="badge badge-warning">* Cambio *</strong></h5>
                                <strong><legend for="TOTAL" class="text-dark" id="CambioDevolucion">$ 0.00</legend></strong>
                            </div> 
                        </div>
                        <div class="w-100"></div>
                        <div class="col-12" align="center"><br>
                            <h3 class="text-info" id="CambioEnLetraDevolucion"></h3>
                        </div>
                    </div>
                    <!--FIN TOTALES--> 
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var pnlTablero = $("#pnlTablero");
    var pnlDatos = $("#pnlDatos");
    var btnNuevo = $("#btnNuevo");
    var btnCancelarAtras = pnlDatos.find("#btnCancelarAtras");
    var btnSiguiente = pnlDatos.find("#btnSiguiente");
    var paso = 1;
    var btnFinalizarDevolucion = pnlDatos.find("#btnFinalizar");
    var btnCancelarAtrasHead = pnlDatos.find("#btnCancelarAtrasHead");
    var btnTicket = $("#btnTicket");
    var agregar_a_devolucion = false;
    var devolucion_cancelar = 0;
    var devoluciones_url = base_url + 'index.php/Devoluciones/';
    var btnCancelarDevolucion = pnlTablero.find("#btnConfirmarEliminar");
    var mdlCancelarDevolucion = $("#mdlCancelarDevolucion");
    var btnCancelar = pnlDatos.find("#btnCancelar");
    var btnBuscarVenta = pnlDatos.find("#btnBuscarVenta");

    $(document).ready(function () {
        getRecords();
        getMetodosPago();
        getEstilos();
        handleEnter();

        pnlDatos.find("#NumeroDeVenta").keyup(function (e) {
            if (e.keyCode === 13) {
                btnBuscarVenta.trigger('click');
            }
        });

        btnBuscarVenta.click(function () {
            var NumeroDeVenta = pnlDatos.find("#NumeroDeVenta").val();
            if (NumeroDeVenta !== '') {
                pnlDatos.find("#Venta").val(NumeroDeVenta);
                getVentaXID(NumeroDeVenta);
            } else {
                onBeep(2);
                swal('ATENCIÓN', 'INTRODUCE UN NÚMERO DE VENTA VÁLIDO', 'warning').then((willDelete) => {
                    if (willDelete) {
                        pnlDatos.find("#NumeroDeVenta").focus();
                    }
                });
            }
        });

        btnCancelar.click(function () {
            pnlTablero.removeClass("d-none");
            pnlDatos.addClass("d-none");
        });

        /*NUEVO*/
        btnNuevo.click(function () {
            pnlDatos.find("#tblTallas input").val('');
            pnlTablero.addClass("d-none");
            pnlDatos.removeClass("d-none");
            pnlDatos.find("#NumeroDeVenta").focus();
            if ($.fn.DataTable.isDataTable('#tblDetalleParaIntercambio')) {
                pnlDatos.find('#tblDetalleParaIntercambio').DataTable().destroy();
            }
            pnlDatos.find("[name='Estilo']").val('');
            pnlDatos.find("[name='Combinacion']").val('');
            pnlDatos.find("[name='Estilo']")[0].selectize.clear(true);
            pnlDatos.find("[name='Combinacion']")[0].selectize.clear(true);
            pnlDatos.find("[name='Talla']").val('');
            pnlDatos.find("[name='Cantidad']").val('');
            pnlDatos.find("[name='Precio']").val('');
            pnlDatos.find("#DevolucionesDetalle").addClass("d-none");
            pnlDatos.find("#DetalleParaIntercambio").removeClass("d-none");
            pnlDatos.find("#ResumenDetalleParaIntercambio").removeClass("d-none");
            pnlDatos.find("#ResumenDetalleParaIntercambioTotales").removeClass("d-none");
            pnlDatos.find("#btnFinalizar").removeClass("d-none");
            btnSiguiente.addClass("d-none");
            /*pnlDatos.find("#Pasos div").eq(0).addClass('d-none');*/
            pnlDatos.find("#btnCancelarDevolucion").addClass("d-none");
            /*pnlDatos.find("#Pasos div.d-none").eq(2).removeClass('d-none');
             pnlDatos.find("#Pasos div").eq(2).addClass('d-none');*/
            paso = 3;
            tblDetalleParaIntercambio = pnlDatos.find('#tblDetalleParaIntercambio').DataTable({
                "dom": 'frt',
                "autoWidth": false,
                "colReorder": true,
                "displayLength": 500,
                "bLengthChange": false,
                "deferRender": true,
                "scrollCollapse": false,
                "bSort": true,
                "aaSorting": [
                    [0, 'desc']/*ID*/
                ],
                "columnDefs": [
                    {
                        "targets": [0],
                        "visible": false,
                        "searchable": false
                    },
                    {
                        "targets": [2],
                        "visible": false,
                        "searchable": false
                    }],
                language: lang
            });
            tblDetalleParaIntercambio.clear().draw();
        });

        btnCancelarDevolucion.click(function () {
            if (temp !== 0 && temp !== undefined && temp > 0) {
                swal({
                    title: "Confirmar",
                    text: "Deseas cancelar la devolucion?",
                    icon: "warning",
                    buttons: ["Cancelar", "Aceptar"],
                    dangerMode: true
                }).then((willDelete) => {
                    if (willDelete) {
                        swal('ATENCIÓN', 'SE HA CANCELADO LA DEVOLUCIÓN ' + temp, 'success');
                        onBeep(1);
                    }
                });
            } else {
                onBeep(2);
                swal('ATENCIÓN', 'DEBE DE ELEGIR UN REGISTRO ', 'warning');
            }
        });

        pnlDatos.find("#CodigoBarrasDevolucion").blur(function () {
            EstiloCB = $(this).val().slice(0, 5).replace(/^0+/, '');
            ColorCB = $(this).val().slice(5, 7).replace(/^0+/, '');
            TallaCB = $(this).val().slice(7, 12).replace(/^0+/, '');
            if (EstiloCB > 0 && ColorCB > 0 && TallaCB > 0) {
                HoldOn.open({theme: 'sk-bounce', message: 'ESPERE...'});
                $.getJSON(base_url + 'index.php/Devolucion/getExistenciasXEstiloXCombinacion',
                        {Estilo: EstiloCB, Combinacion: ColorCB}
                ).done(function (data, x, jq) {
                    if (data.length > 0) {
                        var dt = data[0];
                        /*AGREGAR A LA TABLA*/
                        tblDetalleParaIntercambio.row.add([
                            dt.ESTILO_ID/*0*/,
                            dt.ESTILO/*1*/,
                            dt.COLOR_ID/*2*/,
                            dt.COLOR/*3*/,
                            TallaCB/*4*/,
                            "$" + $.number(dt.PRECIO, 2, '.', ',')/*6*/,
                            "$" + $.number(dt.PRECIO * 1, 2, '.', ',')/*7*/,
                            '<button type="button" class="btn btn-outline-danger" onclick="onRemoverElegido(this)">' +
                                    '<span class="fa fa-trash fa-2x"></span>' +
                                    '</button>'/*8*/
                        ]).draw(false);
                        /*FIN AGREGAR A LA TABLA*/
                        pnlDatos.find("#CodigoBarrasDevolucion").val('');
                        pnlDatos.find("#CodigoBarrasDevolucion").focus();
                    } else {
                        swal('ATENCIÓN', 'NO EXISTE INFORMACIÓN PARA EL PRODUCTO', 'warning');
                        onBeep(2);
                    }
                }).fail(function (x, y, z) {
                    console.log(x, y, z);
                }).always(function () {
                    HoldOn.close();
                });
            }
        });

        pnlDatos.find("#SuPagoDevolucion").keyup(function () {
            var SuPago = parseFloat(getNumberFloat($(this).val()));
            var Cambio = 0.0;
            if (SuPago > 0) {
                var TotalDiferencia = parseFloat(getNumber(pnlDatos.find("#TotalDiferencia strong.text-dark").text()));
                Cambio = ((TotalDiferencia - SuPago) >= 0) ? (TotalDiferencia - SuPago) : ((TotalDiferencia - SuPago) * -1);
            }
            var cambio_final = (SuPago > TotalDiferencia) ? Cambio : 0;
            pnlDatos.find("#CambioDevolucion").text('$' + $.number(cambio_final, 2, '.', ','));
            pnlDatos.find('#CambioEnLetraDevolucion').text('(' + NumeroALetras(cambio_final) + ')');
        });

        //Eventos en el select de estilo para traer las tallas y los colores
        pnlDatos.find("[name='Combinacion']").change(function () {
            console.log(pnlDatos.find("[name='Estilo']").val());
            HoldOn.open({theme: 'sk-bounce', message: 'ESPERE...'});
            $.ajax({
                url: devoluciones_url + 'getExistenciasXEstiloXCombinacion',
                type: "POST",
                dataType: "JSON",
                data: {
                    Estilo: pnlDatos.find("[name='Estilo']").val(),
                    Combinacion: $(this).val()
                }
            }).done(function (data, x, jq) {
                if (data.length > 0) {
                    var existencias = data[0];
                    pnlDatos.find("[name='Precio']").val(existencias.PrecioMenudeo);
                    $.each(data[0], function (k, v) {
                        if (parseInt(v) <= 0) {
                            pnlDatos.find("[name='" + k + "']").addClass('NoStock');
                            pnlDatos.find("[name='" + k + "']").removeClass('Stock');
                            pnlDatos.find("[name='" + k + "']").val('0');
                        } else if (parseInt(v) > 0) {
                            pnlDatos.find("[name='" + k + "']").addClass('Stock');
                            pnlDatos.find("[name='" + k + "']").removeClass('NoStock');
                            pnlDatos.find("[name='" + k + "']").val(v);
                        }
                    });
                } else {
                    pnlDatos.find('#rExistencias').find("input").val("0");
                    pnlDatos.find('#rExistencias').find("input").addClass('NoStock').val("0");
                    pnlDatos.find("[name='Precio']").val("");
                }
            }).fail(function (x, y, z) {
                console.log(x, y, z);
            }).always(function () {
                HoldOn.close();
            });
        });
        //Eventos en el select de estilo para traer las tallas y los colores
        pnlDatos.find("[name='Estilo']").change(function () {

            pnlDatos.find("[name='Combinacion']")[0].selectize.clear(true);
            pnlDatos.find("[name='Combinacion']")[0].selectize.clearOptions();
            var EstiloID = $(this).val();
            HoldOn.open({theme: 'sk-bounce', message: 'ESPERE...'});
            $.ajax({
                url: devoluciones_url + 'getCombinacionesXEstilo',
                type: "POST",
                dataType: "JSON",
                data: {
                    Estilo: EstiloID
                }
            }).done(function (data, x, jq) {
                $.each(data, function (k, v) {
                    pnlDatos.find("[name='Combinacion']")[0].selectize.addOption({text: v.Descripcion, value: v.ID});
                });
                pnlDatos.find("[name='Combinacion']")[0].selectize.open();
            }).fail(function (x, y, z) {
                console.log(x, y, z);
            }).always(function () {
                $.ajax({
                    url: devoluciones_url + 'getSerieXEstilo',
                    type: "POST",
                    dataType: "JSON",
                    data: {
                        Estilo: EstiloID
                    }
                }).done(function (data, x, jq) {
                    $.each(data[0], function (k, v) {
                        pnlDatos.find("[name='" + k + "']").val(v);
                    });
                }).fail(function (x, y, z) {
                    console.log(x, y, z);
                }).always(function () {
                    HoldOn.close();
                });
//            getSerieXEstilo($(this).val());
            });
        });

        //Validacion de existencias en cantidad devolucion
        pnlDatos.find("[name='Cantidad']").change(function () {
            var CantidadCaptura = $(this).val();
            var TallaCapturada = pnlDatos.find("[name='Talla']").val();
            var CantidadValida = false;
            var tallas = pnlDatos.find("#tblTallas > tbody > tr").eq(0);
            var existencias = pnlDatos.find("#tblTallas > tbody > tr").eq(1);
            var existenciaReal = 0;
            $.each(tallas.find("input.numbersOnly"), function () {
                if (parseFloat(TallaCapturada) === parseFloat($(this).val())) {
                    existenciaReal = existencias.find('td').eq($(this).parent().index()).find("input").val();
                    console.log(existenciaReal, '=>', CantidadCaptura, ',', parseFloat(existenciaReal) >= parseFloat(CantidadCaptura), ',Cant Real ' + $.isNumeric(existenciaReal), 'Capturada ' + $.isNumeric(CantidadCaptura));
                    if (parseFloat(existenciaReal) >= parseFloat(CantidadCaptura)) {
                        CantidadValida = true;
                        agregar_a_devolucion = true;
                        console.log('CANTIDAD VALIDA');
                        return false;
                    } else {
                        console.log('CANTIDAD INVALIDA');
                        CantidadValida = false;
                        return false;
                    }
                }
            });
            console.log('CANTIDAD VALIDA/INVALIDA', CantidadValida);
            if (!CantidadValida) {
                onBeep(2);
                swal({
                    title: 'INFO',
                    text: 'No tiene existencias suficientes en esta talla, cant',
                    icon: 'warning'
                }).then((result) => {
                    if (result) {
                        agregar_a_devolucion = false;
                        pnlDatos.find("[name='Talla']").val('');
                        pnlDatos.find("[name='Cantidad']").val('');
                        pnlDatos.find("[name='Talla']").focus();
                    }
                });
            }
        });

        pnlDatos.find("#btnAgregarADevolucion").click(function () {
            var CantidadCaptura = pnlDatos.find("[name='Cantidad']").val();
            var TallaCapturada = pnlDatos.find("[name='Talla']").val();
            var CantidadValida = false;
            var tallas = pnlDatos.find("#tblTallas > tbody > tr").eq(0);
            var existencias = pnlDatos.find("#tblTallas > tbody > tr").eq(1);
            var existenciaReal = 0;
            $.each(tallas.find("input.numbersOnly"), function () {
                if (parseFloat(TallaCapturada) === parseFloat($(this).val())) {
                    existenciaReal = existencias.find('td').eq($(this).parent().index()).find("input").val();
                    if (parseFloat(existenciaReal) >= parseFloat(CantidadCaptura)) {
                        CantidadValida = true;
                        agregar_a_devolucion = true;
                    } else {
                        CantidadValida = false;
                    }
                }
            });
            if (!CantidadValida) {
                onBeep(2);
                swal({
                    title: 'INFO',
                    text: 'No tiene existencias suficientes en esta talla, btn',
                    icon: 'warning'
                }).then((result) => {
                    if (result) {
                        agregar_a_devolucion = false;
                        pnlDatos.find("[name='Talla']").val('');
                        pnlDatos.find("[name='Cantidad']").val('');
                        pnlDatos.find("[name='Talla']").focus();
                    }
                });
            }
            if (agregar_a_devolucion) {
                /*REVISAR SI YA FUE AGREGADO EL PRODUCTO*/
                $.each(pnlDatos.find("#tblDetalleParaIntercambio > tbody > tr"), function () {
                    var r = tblDetalleParaIntercambio.row($(this)).data();
                    if (r !== undefined) {
                        console.log(r);
                        var Estilo = parseInt(r[0]);
                        var Combinacion = parseInt(r[2]);
                        var Talla = $.isNumeric(r[4]) ? parseFloat(r[4]) : r[4];
                        var str_talla = $.isNumeric(pnlDatos.find("[name='Talla']").val()) ? parseFloat(pnlDatos.find("[name='Talla']").val()) : pnlDatos.find("[name='Talla']").val();
                        console.log("\n TALLA : " + Talla + ", " + pnlDatos.find("[name='Talla']").val() + " = " + (Talla === str_talla));
                        if (Estilo === parseInt(pnlDatos.find("[name='Estilo']").val()) &&
                                Combinacion === parseInt(pnlDatos.find("[name='Combinacion']").val())
                                && Talla === str_talla) {
                            agregar_a_devolucion = false;
                            return false;
                        } else {
                            agregar_a_devolucion = true;
                        }
                    } else {
                        agregar_a_devolucion = true;
                    }
                });
                console.log('* AGREGARLO * ');
                console.log(agregar_a_devolucion);



                if (agregar_a_devolucion && pnlDatos.find("[name='Estilo']").val() !== '' && pnlDatos.find("[name='Combinacion']").val() !== '') {

                    var Precio = parseFloat(pnlDatos.find("[name='Precio']").val());
                    var Cantidad = parseFloat(pnlDatos.find("[name='Cantidad']").val());
                    var subtotal = Precio * Cantidad;
                    /*VERIFICAR MONTOS*/
                    var total_cubierto = 0.0;
                    $.each(tblDetalleParaIntercambio.rows().data(), function () {
                        total_cubierto += getNumberFloat($(this)[7]);
                    });
                    total_cubierto += subtotal;
//            if (total_cubierto >= monto_a_cubrir) {
                    tblDetalleParaIntercambio.row.add([
                        pnlDatos.find("[name='Estilo']").val()/*0*/,
                        pnlDatos.find("[name='Estilo']").text()/*1*/,
                        pnlDatos.find("[name='Combinacion']").val()/*2*/,
                        pnlDatos.find("[name='Combinacion']").text()/*3*/,
                        pnlDatos.find("[name='Talla']").val()/*4*/,
                        Cantidad/*5*/,
                        "$" + $.number(Precio, 2, '.', ',')/*6*/,
                        "$" + $.number(subtotal, 2, '.', ',')/*7*/,
                        '<button type="button" class="btn btn-outline-danger" onclick="onRemoverElegido(this)"><span class="fa fa-trash fa-2x"></span></button>'/*8*/
                    ]).draw(false);
                    onBeep(1);
                    onCalcularMontos();
//
//                    pnlDatos.find("#tblTallas input").val('');
//                    total_cubierto = 0;
//                    $.each(tblDetalleParaIntercambio.rows().data(), function () {
//                        total_cubierto += getNumberFloat($(this)[7]);
//                    });
//                    var tf = '$' + $.number(total_cubierto, 2, '.', ',');
//                    var diff_total = (monto_a_cubrir - total_cubierto);
//                    var diff_iva_total = (monto_a_cubrir - (total_cubierto * 1.16));
//                    var diff = '$' + $.number(((diff_total > 0) ? 0 : diff_total * -1), 2, '.', ',');
//                    pnlDatos.find("#TotalCubierto strong.text-dark").text(tf); /*SUBTOTAL*/
//
//                    if (pnlDatos.find("#VentaTP").val() === 'F') {
//                        pnlDatos.find("#TotalCubiertoIVA strong.text-dark").text('$' + $.number(total_cubierto * 0.16, 2, '.', ',')); /*I.V.A*/
//                        pnlDatos.find("#TotalCubiertoTotal strong.text-dark").text('$' + $.number(total_cubierto * 1.16, 2, '.', ',')); /*I.V.A*/
//                        var total_diferencia = ((diff_iva_total > 0) ? 0 : diff_iva_total * -1);
//                        pnlDatos.find("#TotalDiferencia strong.text-dark").text('$' + $.number(total_diferencia, 2, '.', ','));
//                        pnlDatos.find('#ImporteEnLetraDevolucion').text('(' + NumeroALetras(total_diferencia) + ')');
//                    } else {
//                        pnlDatos.find('#ImporteEnLetraDevolucion').text('(' + NumeroALetras(getNumberFloat(diff)) + ')');
//                        pnlDatos.find("#TotalDiferencia strong.text-dark").text(diff);
//                        pnlDatos.find("#TotalCubiertoIVA strong.text-dark").text('$' + $.number(0, 2, '.', ',')); /*I.V.A*/
//                        pnlDatos.find("#TotalCubiertoTotal strong.text-dark").text('$' + $.number(total_cubierto, 2, '.', ',')); /*I.V.A*/
//                    }
//                    pnlDatos.find("[name='Talla']").val('');
//                    pnlDatos.find("[name='Cantidad']").val('');
//                    pnlDatos.find("[name='Precio']").val('');
//                    pnlDatos.find("[name='Estilo']")[0].selectize.clear(true);
//                    pnlDatos.find("[name='Combinacion']")[0].selectize.clear(true);
//                    pnlDatos.find("[name='Estilo']")[0].selectize.focus();
//                    agregar_a_devolucion = false;
//            } else {
//                swal('ATENCIÓN', 'EL MONTO DE LA ENTREGA DEBE SER MAYOR O IGUAL A LA DEVOLUCIÓN', 'warning');
//                onBeep(2);
//            }
                } else {
                    onBeep(2);
                    swal('ATENCIÓN', 'NO TIENE EXISTENCIAS SUFICIENTES O YA HA AGREGADO ESTE PRODUCTO, ELIMINELO SI DESEA MODIFICARLO', 'warning');
                }
            } else {
                onBeep(2);
                swal('ATENCIÓN', 'No tiene existencias suficientes en esta talla', 'warning');
            }
        });


        btnFinalizarDevolucion.click(function () {
            var Metodo = pnlDatos.find("#MetodoPago").val();
            var DiferenciaACobrar = getNumberFloat(pnlDatos.find("#TotalDiferencia strong.text-dark").text());
            var SuPago = getNumberFloat(pnlDatos.find("#SuPagoDevolucion").val());
            if (Metodo !== '' && Metodo > 0) {
                if (DiferenciaACobrar <= SuPago) {
                    if (tblDetalleParaIntercambio.rows().data().length > 0) {
                        /*DETALLE DEVUELTO*/
                        var detalle_devuelto = [];
                        var dt = pnlDatos.find('#tblDevolucionesDetalle > tbody > tr ').find("td input[type='checkbox']:checked");
                        $.each(dt, function () {
                            var tr = $(this).parent().parent();
                            var cell = tblDevolucionesDetalle.row(tr).data();
                            console.log('*cell*');
                            console.log(cell);
                            console.log('*fin cell*');
                            var precio = cell[5];
                            var precio_final = getNumberFloat($(precio).text());
                            var cantidad = cell[12];
                            console.log("\n CANTIDAD ", cell[12], cantidad, parseFloat(cell[12]));
                            var cantidad_final = parseFloat(cantidad);
                            console.log("\n SUBTOTAL \n", cantidad_final, " * ", precio_final);
                            var subtotal = parseFloat(cantidad_final * precio_final);
                            if (parseFloat(cell[12]) > 0) {
                                detalle_devuelto.push({ID: cell[0],
                                    Estilo: cell[9],
                                    Color: cell[10],
                                    Talla: cell[3],
                                    Cantidad: cell[12],
                                    Precio: precio_final,
                                    SubTotal: subtotal
                                });
                            }
                        });
                        /*DETALLE SELECCIONADO*/
                        var detalle = [];
                        $.each(tblDetalleParaIntercambio.rows().data(), function () {
                            var cells = $(this);
                            console.log(cells);
                            detalle.push(
                                    {
                                        Estilo: cells[0], Color: cells[2], Talla: cells[4], Cantidad: cells[5], Precio: getNumberFloat(cells[6]), SubTotal: getNumberFloat(cells[7])
                                    }
                            );
                        });
                        console.log('* DETALLE DEVUELTO *');
                        console.log(detalle_devuelto);
                        console.log('* FIN DETALLE DEVUELTO *');
                        console.log('* DETALLE ENTREGADO *');
                        console.log(detalle);
                        console.log('* FIN DETALLE ENTREGADO *');
                        /*FINALIZAR DEVOLUCION*/
                        var f = new FormData();
                        f.append('Venta', pnlDatos.find("#Venta").val());
                        f.append('TP', pnlDatos.find("#VentaTP").val());
                        f.append('DetalleDevuelto', JSON.stringify(detalle_devuelto));
                        f.append('Detalle', JSON.stringify(detalle));
                        f.append('MontoDevolucion', getNumberFloat(pnlDatos.find("#SubtotaPie strong.text-dark").text()));
                        f.append('Subtotal', getNumberFloat(pnlDatos.find("#TotalCubierto strong.text-dark").text()));
                        f.append('IVA', getNumberFloat(pnlDatos.find("#TotalCubiertoIVA strong.text-dark").text()));
                        f.append('Total', getNumberFloat(pnlDatos.find("#TotalCubiertoTotal strong.text-dark").text()));
                        f.append('DiferenciaACobrar', DiferenciaACobrar);
                        f.append('SuPago', SuPago);
                        f.append('Cambio', getNumberFloat(pnlDatos.find("#CambioDevolucion").text()));
                        f.append('ImporteEnLetra', (pnlDatos.find("#ImporteEnLetraDevolucion").text()));
                        f.append('MetodoDePago', (pnlDatos.find("#MetodoPago").val()));
                        console.log('* FORM DATA *');
                        console.log(f);
                        $.ajax({
                            url: base_url + 'index.php/Devoluciones/onDevolucion',
                            type: "POST",
                            cache: false,
                            contentType: false,
                            processData: false,
                            data: f
                        }).done(function (data, x, jq) {
                            console.log('* LOG DEVOLUCION*');
                            console.log(data);
                            console.log('* FIN LOG DEVOLUCION*');
                            swal('ATENCIÓN', 'SE HA GENERADO UNA DEVOLUCIÓN', 'success');
                            onBeep(1);
                            pnlDatos.modal('hide');
                            /*OBTENER EL ID DEL TICKET*/
                            var dtm = JSON.parse(data);
                            $.post(devoluciones_url + 'getTicketXVenta', {ID: parseInt(dtm.ID)}).done(function (data, x, jq) {
                                console.log('* TICKET *');
                                console.log(data);
                                window.open(data, '_blank');
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
                    } else {
                        onBeep(2);
                        swal('ATENCIÓN', 'ES NECESARIO AGREGAR AL MENOS UN PRODUCTO', 'warning');
                    }
                } else {
                    onBeep(2);
                    swal('ATENCIÓN', 'POR FAVOR INTRODUZCA EL MONTO DE PAGO', 'warning').then((result) => {
                        if (result) {
                            pnlDatos.find("#SuPagoDevolucion").focus();
                        }
                    });
                }
            } else {
                onBeep(2);
                swal('ATENCIÓN', 'ES NECESARIO ESTABLECER UN METODO DE PAGO', 'warning').then((result) => {
                    if (result) {
                        pnlDatos.find("#MetodoPago")[0].selectize.focus();
                    }
                });
            }
        });

        btnSiguiente.click(function () {
            var dt = pnlDatos.find('#tblDevolucionesDetalle > tbody > tr ').find("td input[type='checkbox']:checked");
            if (dt.length > 0) {

            } else {
                swal('ATENCIÓN', 'NO HA SELECCIONADO NINGÚN REGISTRO', 'warning');
                onBeep(2);
            }
            /*getRecords()*/
            getRecords();
        });

        //Validaciones tallas
        pnlDatos.find("[name='Talla']").blur(function () {
            //Verificar que los combos de estilo y color esten llenos
            if (pnlDatos.find("[name='Estilo']").val() !== "" && pnlDatos.find("[name='Combinacion']").val() !== "") {
                var tallaCaptura = $(this).val();
                var tallaValida = false;
                $.each(pnlDatos.find("#tblTallas > tbody > tr").find("input.numbersOnly").filter(':enabled'), function () {
                    var talla = pnlDatos.find("#tblTallas > tbody > tr").find("input").eq($(this).parent().index()).val();
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
//                    onBeep(2);
//                    onNotify('<span class="fa fa-exclamation fa-lg"></span>', 'Ingresa una talla válida', 'danger');
                    pnlDatos.find("[name='Talla']").val('');
//                    pnlDatos.find("[name='Talla']").focus();
//                    swal({
//                        title: 'INFO',
//                        text: 'Introduce una talla válida',
//                        icon: 'warning'
//                    }).then((result) => {
//                        if (result) {
//                            pnlDatos.find("[name='Talla']").val('');
//                            pnlDatos.find("[name='Talla']").focus();
//                        }
//                    });
                }
            } else {
                onBeep(2);
                swal({
                    title: 'INFO',
                    text: 'Introduce un estilo y color',
                    icon: 'warning'
                }).then((result) => {
                    if (result) {
                        pnlDatos.find("[name='Talla']").val('');
                        pnlDatos.find("[name='Estilo']")[0].selectize.focus();
                    }
                });
            }

        });

        pnlDatos.find('#tblDevolucionesDetalle > tbody').on('dblclick', 'tr', function () {
            pnlDatos.find("#tblDevolucionesDetalle > tbody  tr").removeClass("success");
            $(this).addClass("success");
        });

        pnlDatos.find('#tblDevoluciones > tbody').on('click', 'tr', function () {
            pnlDatos.find("#tblDevoluciones  tbody  tr").removeClass("success");
            $(this).addClass("success");
            var row_data = tblDevoluciones.row(this).data();
        });

        pnlDatos.find('#tblDevoluciones > tbody').on('dblclick', 'tr', function () {
            pnlDatos.find("#tblDevoluciones  tbody  tr").removeClass("success");
            $(this).addClass("success");
            var row_data = tblDevoluciones.row(this).data();
        });

        btnCancelarAtras.click(function () {
            pnlTablero.removeClass("d-none");
            pnlDatos.addClass("d-none");
            pnlDatos.find("#SubtotalEncabezado h1").text('$0.00')
        });

        btnCancelarAtrasHead.click(function () {
            btnCancelarAtras.trigger('click');
        });
    });

    var tblDevoluciones;
    function getVentasDevolucion() {
        pnlDatos.find("#Devoluciones").removeClass("d-none");
        pnlDatos.find("#DevolucionesDetalle").addClass("d-none");
        if ($.fn.DataTable.isDataTable('#tblDevoluciones')) {
            pnlDatos.find('#tblDevoluciones').DataTable().destroy();
        }
        HoldOn.open({
            theme: 'sk-bounce',
            message: 'CARGANDO...'
        });
        $.getJSON(base_url + 'index.php/Devoluciones/getVentas').done(function (data) {
            var rows;
            $.each(data, function (k, v) {
                rows += '<tr>';
                rows += '<td>' + v.ID + '</td>';
                rows += '<td>' + v.TIENDA + '</td>';
                rows += '<td>' + v.FOLIO + '</td>';
                rows += '<td>' + v.CLIENTE + '</td>';
                rows += '<td>' + v["FECHA DE CREACION"] + '</td>';
                rows += '<td>' + v.IMPORTE + '</td>';
                rows += '<td>' + v.ACCIONES + '</td>';
                rows += '</tr>';
            });
            pnlDatos.find('#tblDevoluciones > tbody').html(rows);
            tblDevoluciones = pnlDatos.find('#tblDevoluciones').DataTable(tableOptions);
            tblDevoluciones.columns().every(function () {
                var that = this;
                $('input', this.footer()).on('keyup change', function () {
                    if (that.search() !== this.value) {
                        that.search(this.value).draw();
                    }
                });
            });
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }

    var tblDevolucionesDetalle;
    var tblDetalleParaIntercambio;
    function getVentaXID(ID) {
        /*        pnlDatos.find("#SubtotalEncabezado").removeClass("d-none");
         pnlDatos.find("#SubtotaPie").removeClass("d-none");
         pnlDatos.find("#Todos").parent().removeClass("d-none");
         pnlDatos.find("#Venta").val(IDVTA);
         pnlDatos.find("#ResumenDevolucionesDetalle").removeClass("d-none");
         pnlDatos.find("#btnCancelarDevolucion").addClass('d-none');*/
        HoldOn.open({
            theme: 'sk-bounce',
            message: 'CARGANDO...'
        });
        $.getJSON(base_url + 'index.php/Devoluciones/getVentaXID', {ID: ID}).done(function (data) {
            var r = data[0];
            if (data.length > 0) {
                pnlDatos.find("#btnFinalizar").removeClass('d-none');
                console.log('* VENTA TP *');
                console.log(data);
                console.log('* FIN VENTA TP *');
                pnlDatos.find("#VentaTP").val(r.TP);
                if (r.TP === 'R') {
                    pnlDatos.find("#TieneTP").addClass("d-none");
                } else {
                    pnlDatos.find("#TieneTP").removeClass("d-none");
                }
                pnlDatos.find('#DevolucionesDetalle').removeClass("d-none");
                pnlDatos.find('#FechaInicial').parent().addClass("d-none");
                pnlDatos.find('#FechaFinal').parent().addClass("d-none");
                pnlDatos.find('#Devoluciones').addClass("d-none");
                pnlDatos.find('#btnBuscarPorFechas').addClass("d-none");
                pnlDatos.find('#btnSiguiente').removeClass("d-none");
                if ($.fn.DataTable.isDataTable('#tblDevoluciones')) {
                    pnlDatos.find('#tblDevoluciones').DataTable().destroy();
                }
                if ($.fn.DataTable.isDataTable('#tblDevolucionesDetalle')) {
                    pnlDatos.find('#tblDevolucionesDetalle').DataTable().destroy();
                }
                var rows;
                $.each(data, function (k, v) {
                    rows += '<tr>';
                    rows += '<td>' + v.ID + '</td>'; /*0*/
                    rows += '<td>' + v.ESTILO + '</td>'; /*1*/
                    rows += '<td>' + v.COLOR + '</td>'; /*2*/
                    rows += '<td>' + v.TALLA + '</td>'; /*3*/
                    rows += '<td><input type="text" id="CantidadDevolucion" value="' + v.CANTIDAD + '" class="form-control form-control-sm numbersOnly" placeholder="' + v.CANTIDAD + '" onfocusout="onComprobarCantidaVacia()" onkeyup="onComprobarCantidad(this)" onchange="onComprobarCantidad(this)"></td>'; /*4*/
                    rows += '<td>' + v.PRECIO + '</td>'; /*5*/
                    rows += '<td>' + v.DESCUENTO + '</td>'; /*6*/
                    rows += '<td>' + v.SUBTOTAL + '</td>'; /*7*/
                    rows += '<td><label class="btn">' +
                            '<input type="checkbox" autocomplete="off" id="btnDevolver" name="btnDevolver" onchange="onCalcularMontoDevuelto(this)">' +
                            '<br></label></td>'; /*8*/
                    rows += '<td>' + v.ESTILO_ID + '</td>';/*9*/
                    rows += '<td>' + v.COLOR_ID + '</td>';/*10*/
                    rows += '<td>' + v.CANTIDAD + '</td>'; /*11*/
                    rows += '<td>0</td>'; /*12*/
                    rows += '</tr>';
                });
                pnlDatos.find('#tblDevolucionesDetalle > tbody').html(rows);

                tblDevolucionesDetalle = pnlDatos.find('#tblDevolucionesDetalle').DataTable({
                    "dom": 'frt',
                    "autoWidth": false,
                    "colReorder": true,
                    "displayLength": 500,
                    "bLengthChange": false,
                    "deferRender": true,
                    "scrollCollapse": false,
                    "bSort": true,
                    "aaSorting": [
                        [0, 'desc']/*ID*/
                    ],
                    "columnDefs": [
                        {
                            "targets": [0],
                            "visible": false,
                            "searchable": false
                        },
                        {
                            "targets": [9],
                            "visible": false,
                            "searchable": false
                        },
                        {
                            "targets": [10],
                            "visible": false,
                            "searchable": false
                        },
                        {
                            "targets": [11],
                            "visible": false,
                            "searchable": false
                        },
                        {
                            "targets": [12],
                            "visible": false,
                            "searchable": false
                        }],
                    language: lang
                }
                );
            } else {
                pnlDatos.find("#btnFinalizar").addClass('d-none');
                swal('ATENCIÓN', 'NO EXISTEN VENTAS CON ESTE FOLIO', 'warning');

            }
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }

    function onCalcularMontoDevuelto() {
        var total = 0.0;
        $.each($("#tblDevolucionesDetalle > tbody > tr"), function () {
            if ($(this).find("#btnDevolver")[0].checked) {
                if ($(this).find("#CantidadDevolucion").val() !== '' && parseFloat($(this).find("#CantidadDevolucion").val()) > 0) {
                    var cantidad = $(this).find("#CantidadDevolucion").val();
                    console.log(' NUEVA CANTIDAD ' + cantidad);
                    /*MODIFICA LA CELDA*/
                    tblDevolucionesDetalle.cell($(this), 12).data(parseInt(cantidad)).draw();
                    var row = tblDevolucionesDetalle.row($(this)).data();
                    var precio = getNumberFloat($(row[5]).text());
                    var descuento = getNumberFloat($(row[6]).text());
                    total += (precio * cantidad) - descuento;
                }
            }
        });
        var total_final_formato = '$' + $.number(total, 2, '.', ',');
        pnlDatos.find("#SubtotalEncabezado h1").text(total_final_formato);
        pnlDatos.find("#SubtotaPie strong.text-dark").text(total_final_formato);
        onBeep(5);
        onCalcularMontos();
//        var row = tblDevolucionesDetalle.row($(e).parents('tr')).data();
//        var dt = pnlDatos.find('#tblDevolucionesDetalle > tbody > tr ').find("td input[type='checkbox']:checked");
//        var total_devuelto = 0.0;
//        $.each(dt, function () {
//            var tr = $(this).parent().parent();
//            var str = $(e).parents('tr');
//            var xrow = tblDevolucionesDetalle.row(tr).data();
////            total_devuelto += getNumberFloat($(xrow[7]).text());
//            var ce = str.find("#CantidadDevolucion").val();
//            var descuento = getNumberFloat($(xrow[6]).text());
//            var precio = getNumberFloat($(xrow[5]).text());
//            total_devuelto += ce * precio;
//            total_devuelto = total_devuelto - descuento;
//            /*MODIFICA LA CELDA*/
//            tblDevolucionesDetalle.cell($(e).parents('tr'), 12).data(parseInt(ce)).draw();
//        });
//        var tf = '$' + $.number(total_devuelto, 2, '.', ',');
//        pnlDatos.find("#SubtotalEncabezado h1").text(tf);
//        pnlDatos.find("#SubtotaPie strong").text(tf);
//        if (total_devuelto > 0) {
//            onNotify('<span class="fa fa-check fa-lg"></span>', tf, 'success');
//        } else {
//            onNotify('<span class="fa fa-exclamation fa-lg"></span>', tf, 'danger');
//        }
    }

    function onSeleccionarTodos(e) {
        var dt = pnlDatos.find('#tblDevolucionesDetalle > tbody > tr ').find("td input[type='checkbox']");
        $.each(dt, function () {
            $(this)[0].checked = $(e)[0].checked;
            $(this).trigger('change');
        });
    }

    function onCancelarDevolucion() {
        pnlDatos.find("#Venta").val('');
        pnlDatos.find("#Todos")[0].checked = false;
        pnlDatos.find("#Todos").parent().addClass("d-none");
        pnlDatos.find('#FechaInicial').parent().removeClass("d-none");
        pnlDatos.find('#FechaFinal').parent().removeClass("d-none");
        pnlDatos.find("#Devoluciones").removeClass("d-none");
        pnlDatos.find("#btnBuscarPorFechas").removeClass("d-none");
        pnlDatos.find("#DevolucionesDetalle").addClass("d-none");
        pnlDatos.find("#DetalleParaIntercambio").addClass("d-none");
        pnlDatos.find("#btnSiguiente").addClass("d-none");
        pnlDatos.find("#SubtotalEncabezado").addClass("d-none");
        pnlDatos.find("#SubtotaPie").addClass("d-none");
        btnCancelarAtras.addClass('d-none');
        pnlDatos.find("#FechaInicial").removeClass('d-none');
        pnlDatos.find("#FechaFinal").removeClass('d-none');
        pnlDatos.find("#ResumenDevolucionesDetalle").addClass("d-none");
        pnlDatos.find("#ResumenDetalleParaIntercambio").addClass("d-none");
        pnlDatos.find("#ResumenDetalleParaIntercambioTotales").addClass("d-none");
        pnlDatos.find("#btnFinalizar").addClass("d-none");
        getVentasDevolucion();
        if ($.fn.DataTable.isDataTable('#tblDetalleParaIntercambio')) {
            tblDetalleParaIntercambio.clear().draw();
        }
        var tf = '$' + $.number(0, 2, '.', ',');
        pnlDatos.find("#SubtotaPie strong.text-dark").text(tf);
        pnlDatos.find("#TotalCubierto strong.text-dark").text(tf);
        pnlDatos.find("#TotalDiferencia strong.text-dark").text(tf);
        pnlDatos.find("#TotalCubiertoIVA strong.text-dark.text-dark").text(tf); /*I.V.A*/
        pnlDatos.find("#TotalCubiertoTotal strong.text-dark").text(tf); /*TOTAL*/

        paso = 1;
    }

    function onRemoverElegido(e) {
        var tr = $(e).parent().parent();
        var monto_a_cubrir = getNumberFloat(pnlDatos.find("#SubtotaPie strong.text-dark").text());
        tblDetalleParaIntercambio.row($(e).parents('tr')).remove().draw();
        var total_cubierto = 0;
        $.each(tblDetalleParaIntercambio.rows().data(), function () {
            total_cubierto += getNumberFloat($(this)[7]);
        });
        var tf = '$' + $.number(total_cubierto, 2, '.', ',');
        pnlDatos.find("#TotalCubierto strong.text-dark").text(tf);
        var diff_total = (monto_a_cubrir - total_cubierto);
        var diff_iva_total = (monto_a_cubrir - (total_cubierto * 1.16));
        var diff = '$' + $.number(((diff_total > 0) ? 0 : diff_total * -1), 2, '.', ',');
        console.log('* VENTA TP *');
        console.log(pnlDatos.find("#VentaTP").val());
        console.log('* FIN VENTA TP *');
        if (pnlDatos.find("#VentaTP").val() === 'F') {
            pnlDatos.find("#TotalCubiertoIVA strong.text-dark").text('$' + $.number(total_cubierto * 0.16, 2, '.', ',')); /*I.V.A*/
            pnlDatos.find("#TotalCubiertoTotal strong.text-dark").text('$' + $.number(total_cubierto * 1.16, 2, '.', ',')); /*I.V.A*/
            pnlDatos.find("#TotalDiferencia strong.text-dark").text('$' + $.number(((diff_iva_total > 0) ? 0 : diff_iva_total * -1), 2, '.', ','));
        } else {
            pnlDatos.find("#TotalDiferencia strong.text-dark").text(diff);
            pnlDatos.find("#TotalCubiertoIVA strong.text-dark").text('$' + $.number(0, 2, '.', ',')); /*I.V.A*/
            pnlDatos.find("#TotalCubiertoTotal strong.text-dark").text('$' + $.number(total_cubierto, 2, '.', ',')); /*I.V.A*/
        }
    }

    function onComprobarScaneoDevolucion() {
        var t = setTimeout(onComprobarScaneoDevolucion, 100);
        var LeerCodigoDevolucion = pnlDatos.find("#btnActivarCodigoDevolucion")[0].checked;
        if (LeerCodigoDevolucion) {
            pnlDatos.find("#CodigoBarrasDevolucion").focus();
        }
    }

    function onComprobarCantidad(e) {
        var cantida_requerida = $(e).val();
        console.log('* CANTIDAD INGRESADA: ' + cantida_requerida + ' *');
        var cantidad_disponible = parseInt(tblDevolucionesDetalle.row($(e).parents('tr')).data()[11]);
        if (cantida_requerida !== '') {
            if (cantida_requerida > 0 && cantida_requerida <= cantidad_disponible) {
                tblDevolucionesDetalle.cell($(e).parents('tr'), 12).data(cantida_requerida).draw();//MODIFICA LA CELDA
                onCalcularMontoDevuelto();
            } else {
                onBeep(2);
                swal('ATENCIÓN', 'INGRESE UNA CANTIDAD MENOR O IGUAL A LA CANTIDAD A DEVOLVER', 'warning').then((willDelete) => {
                    if (willDelete) {
                        $(e).val(cantidad_disponible);
                        $(e).focus();
                    }
                });
            }
        }
    }

    var tblDevolucionesACancelar = $("#tblDevolucionesACancelar"), DevolucionesACancelar;
    function getRecords() {
        HoldOn.open({
            theme: 'sk-cube',
            message: 'CARGANDO...'
        });
        $.fn.dataTable.ext.errMode = 'throw';
//        $.getJSON(devoluciones_url + 'getDevoluciones').done(function (data, x, jq) {
//            console.log(data);
//        }).fail(function (x, y, z) {
//            console.log(x, y, z);
//        }).always(function () {
//        });
        if ($.fn.DataTable.isDataTable('#tblDevolucionesACancelar')) {
            tblDevolucionesACancelar.DataTable().destroy();
            DevolucionesACancelar = tblDevolucionesACancelar.DataTable({
                "dom": 'Bfrtip',
                buttons: buttons,
                "ajax": {
                    "url": devoluciones_url + 'getDevoluciones',
                    "dataSrc": ""
                },
                "columns": [
                    {"data": "ID"},
                    {"data": "TIENDA"},
                    {"data": "FOLIO"},
                    {"data": "CLIENTE"},
                    {"data": "FECHA DE CREACION"},
                    {"data": "IMPORTE"}
                ],
                "columnDefs": [
                    {
                        "targets": [0],
                        "visible": false,
                        "searchable": false
                    }],
                language: lang,
                "autoWidth": true,
                "colReorder": true,
                "displayLength": 20,
                "bLengthChange": false,
                "deferRender": true,
                "scrollCollapse": false,
                keys: true,
                "bSort": true,
                "aaSorting": [
                    [0, 'desc']/*ID*/
                ]
            });

            tblDevolucionesACancelar.find('tbody').on('click', 'tr', function () {
                tblDevolucionesACancelar.find("tbody tr").removeClass("success");
                $(this).addClass("success");
                var dtm = DevolucionesACancelar.row(this).data();
                devolucion_cancelar = parseInt(dtm.ID);
            });
        }
        HoldOn.close();
    }

    function getEstilos() {
        HoldOn.open({theme: 'sk-bounce', message: 'ESPERE...'});
        $.ajax({
            url: base_url + 'index.php/Devoluciones/getEstilos',
            type: "POST",
            dataType: "JSON"
        }).done(function (data, x, jq) {
            $.each(data, function (k, v) {
                pnlDatos.find("[name='Estilo']")[0].selectize.addOption({text: v.Descripcion, value: v.ID});
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
            url: devoluciones_url + 'getMetodosPago',
            type: "POST",
            dataType: "JSON"
        }).done(function (data, x, jq) {
            $.each(data, function (k, v) {
                pnlDatos.find("[name='MetodoPago']")[0].selectize.addOption({text: v.SValue, value: v.ID});
                pnlDatos.find("#MetodoPago")[0].selectize.addOption({text: v.SValue, value: v.ID});
            });
            pnlDatos.find("[name='MetodoPago']")[0].selectize.setValue('1');
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }

    function onComprobarCantidaVacia() {

    }

    function onCalcularMontos() {
        var monto_a_cubrir = getNumberFloat(pnlDatos.find("#SubtotaPie strong.text-dark").text());
        pnlDatos.find("#tblTallas input").val('');
        var total_cubierto = 0.0;
        $.each(tblDetalleParaIntercambio.rows().data(), function () {
            total_cubierto += getNumberFloat($(this)[7]);
        });
        var tf = '$' + $.number(total_cubierto, 2, '.', ',');
        var diff_total = (monto_a_cubrir - total_cubierto);
        var diff_iva_total = (monto_a_cubrir - (total_cubierto * 1.16));
        var diff = '$' + $.number(((diff_total > 0) ? 0 : diff_total * -1), 2, '.', ',');
        pnlDatos.find("#TotalCubierto strong.text-dark").text(tf); /*SUBTOTAL*/
        if (pnlDatos.find("#VentaTP").val() === 'F') {
            console.log('F', total_cubierto);
            pnlDatos.find("#TotalCubiertoIVA strong.text-dark").text('$' + $.number(total_cubierto * 0.16, 2, '.', ',')); /*I.V.A*/
            pnlDatos.find("#TotalCubiertoTotal strong.text-dark").text('$' + $.number(total_cubierto * 1.16, 2, '.', ',')); /*I.V.A*/
            var total_diferencia = ((diff_iva_total > 0) ? 0 : diff_iva_total * -1);
            pnlDatos.find("#TotalDiferencia strong.text-dark").text('$' + $.number(total_diferencia, 2, '.', ','));
            pnlDatos.find('#ImporteEnLetraDevolucion').text('(' + NumeroALetras(total_diferencia) + ')');
        } else {
            console.log('R', total_cubierto);
            pnlDatos.find('#ImporteEnLetraDevolucion').text('(' + NumeroALetras(getNumberFloat(diff)) + ')');
            pnlDatos.find("#TotalDiferencia strong.text-dark").text(diff);
            pnlDatos.find("#TotalCubiertoIVA strong.text-dark").text('$' + $.number(0, 2, '.', ',')); /*I.V.A*/
            pnlDatos.find("#TotalCubiertoTotal strong.text-dark").text('$' + $.number(total_cubierto, 2, '.', ',')); /*I.V.A*/
        }
        pnlDatos.find("[name='Talla']").val('');
        pnlDatos.find("[name='Cantidad']").val('');
        pnlDatos.find("[name='Precio']").val('');
        pnlDatos.find("[name='Estilo']")[0].selectize.clear(true);
        pnlDatos.find("[name='Combinacion']")[0].selectize.clear(true);
        pnlDatos.find("[name='Estilo']")[0].selectize.focus();
        agregar_a_devolucion = false;
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
    .card{
        border: none;
        background-color: transparent;
    }input[type=checkbox]
    {
        /* Double-sized Checkboxes */
        -ms-transform: scale(2); /* IE */
        -moz-transform: scale(2); /* FF */
        -webkit-transform: scale(2); /* Safari and Chrome */
        -o-transform: scale(2); /* Opera */
        padding: 10px;
    }
    html{
        background-color: rgb(255, 255, 255);
    }
    body{
        background-color: rgb(255, 255, 255);
    }
    .card-body {
        background-color: rgb(255, 255, 255);
    }
</style>