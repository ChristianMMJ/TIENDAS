<!--MODAL DEVOLUCIONES -->
<div id="mdlDevolucion" class="modal fade modal-fullscreen" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content"> 
            <div class="modal-header text-center">
                <h5 class="modal-title">NUEVA DEVOLUCION</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row d-none"> 
                    <div class="col-4" >
                        <label for="FechaInicial">Desde*</label>
                        <input type="text" class="form-control form-control-sm" id="FechaInicial" maxlength="1" name="FechaInicial" placeholder="XX/XX/XXXX" data-provide="datepicker" data-date-format="dd/mm/yyyy" readonly="" >
                    </div>
                    <div class="col-4" >
                        <label for="FechaFinal">Hasta*</label>
                        <input type="text" class="form-control form-control-sm" id="FechaFinal" maxlength="1" name="FechaFinal" placeholder="XX/XX/XXXX" data-provide="datepicker" data-date-format="dd/mm/yyyy" readonly="" >
                    </div>
                    <div class="col-4" >
                        <button type="button" class="btn btn-info btn-sm" id="btnBuscarPorFechas"><span class="fa fa-search"></span> (CTRL + D)</button>   
                    </div>
                </div>
                <div class="row">
                    <div class="col-4" > 
                    </div>
                    <div class="col-4" align="center">

                    </div>
                    <div class="col-4" align="right">
                        <button type='button' class="btn btn-success btn-sm  d-none" id='btnSiguiente'>SIGUIENTE <span class="fa fa-arrow-right"></span></button>
                    </div>
                </div>
                <!--VENTAS-->
                <div id="Devoluciones" class="table-responsive">
                    <table id="tblDevoluciones" class="table table-bordered table-striped table-hover display row-border hover order-column" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th> 
                                <th>TIENDA</th>
                                <th>FOLIO</th> 
                                <th>CLIENTE</th> 
                                <th>FECHA DE CREACION</th> 
                                <th>IMPORTE</th> 
                                <th>ACCIONES</th> 
                            </tr>
                        </thead>
                        <tbody></tbody>
                        <tfoot>
                            <tr>
                                <th>ID</th> 
                                <th>TIENDA</th>
                                <th>FOLIO</th> 
                                <th>CLIENTE</th> 
                                <th>FECHA DE CREACION</th> 
                                <th>IMPORTE</th> 
                                <th>ACCIONES</th> 
                            </tr>
                        </tfoot>
                    </table>
                </div> 
                <!--SUBTOTAL DETALLE VENTA-->

                <div id="ResumenDevolucionesDetalle" class="row">
                    <div class="col-4"></div>
                    <div id="SubtotalEncabezado" align='center' class="col-4">
                        <h1 class="text-success">$0.0</h1>
                    </div>
                    <div class="col-4" align="center">
                        <label class="btn btn-warning"><input type="checkbox" autocomplete="off" id="Todos" name="Todos" onchange="onSeleccionarTodos(this)"> <br>Todos</label>
                    </div>
                </div>
                <div id="DevolucionesDetalle" class="table-responsive d-none">
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
                            </tr>
                        </thead>
                        <tbody></tbody>
                        <tfoot>
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
                            </tr>
                        </tfoot>
                    </table>
                </div>  
                <!--FIN SUBTOTAL DETALLE VENTA--> 
                <!--ARTICULOS A ESCOGER-->
                <div id="ResumenDetalleParaIntercambio" class="row d-none">
                    <div id="SubtotaPie" class="col-6" align="center">
                        <h3><strong class="text-danger">* Monto a cubrir *</strong></h3>
                        <h1 class="text-success">$ 0.0</h1>
                    </div>
                    <div id="TotalCubierto" class="col-6" align="center">
                        <h3><strong class="text-danger">* Monto cubierto *</strong></h3>
                        <h1 class="text-success">$ 0.0</h1>
                    </div>
                    <div class="col-3">
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
                    </div>
                    <div class="col-3">
                        <label for="Combinacion">Color*</label>
                        <select class="form-control form-control-sm "  name="Combinacion">
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="col-2"> 
                        <label for="Talla">Talla</label>
                        <input type="text" class="form-control form-control-sm numbersOnly" maxlength="4" name="Talla" >
                    </div> 
                    <div class="col-2"> 
                        <label for="Talla">Cantidad</label>
                        <input type="text" class="form-control form-control-sm numbersOnly" name="Cantidad">
                    </div> 
                    <div class="col-2"> 
                        <label for="Precio">Precio</label>
                        <input type="text" class="form-control form-control-sm numbersOnly" id="Precio" maxlength="8" name="Precio" >
                    </div>

                    <div class="col-12" align="center">
                        <h3 class="text-danger">* Tallas *</h3>
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
                    </div>
                </div>
                <div id="DetalleParaIntercambio" class="table-responsive d-none">
                    <table id="tblDetalleParaIntercambio" class="table table-bordered table-striped table-hover" style="width:100%">
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
                            </tr>
                        </thead>
                        <tbody></tbody>
                        <tfoot>
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
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="modal-footer">    
                <div class="col-6">
                    <button type='button' class="btn btn-danger btn-sm d-none" id='btnCancelarAtras'><span class="fa fa-arrow-left "></span> CANCELAR</button>
                </div>
                <div class="col-6" align="right">
                    <button type='button' class="btn btn-primary btn-sm  d-none" id='btnFinalizar'>FINALIZAR <span class="fa fa-check"></span></button>
                </div>
            </div>
        </div>
    </div>
</div>
