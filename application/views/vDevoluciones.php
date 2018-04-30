<!--MODAL DEVOLUCIONES -->
<div id="mdlDevolucion" class="modal fade modal-fullscreen" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content"> 
            <div class="modal-header">
                <h5 class="modal-title">DEVOLUCION</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row"> 
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
                        <button type='button' class="btn btn-danger btn-sm d-none" id='btnCancelarAtras'><span class="fa fa-arrow-left "></span> CANCELAR</button>
                    </div>
                    <div class="col-4" >
                        <label class="btn btn-warning"><input type="checkbox" autocomplete="off" id="Todos" name="Todos" onchange="onSeleccionarTodos()"> <br>Seleccionar</label>
                    </div>
                    <div class="col-4" align="right">
                        <button type='button' class="btn btn-success btn-sm  d-none" id='btnSiguiente'>SIGUIENTE <span class="fa fa-arrow-right"></span></button>
                    </div>
                </div>
                <hr> 
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
                <div id="SubtotalEncabezado" align='center' class="col-12 d-none">
                    <h1 class="text-success">$0.0</h1>
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
                <div id="SubtotaPie" align='center' class="col-12 d-none">
                    <h1 class="text-success">$0.0</h1>
                </div>
                <!--FIN SUBTOTAL DETALLE VENTA-->
                <!--ARTICULOS SELECCIONADOS-->
                <div id="DevolucionesDetalleSeleccionados" class="table-responsive d-none">
                    <table id="tblDevolucionesDetalleSeleccionados" class="table table-bordered table-striped table-hover" style="width:100%">
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
                <button type="button" class="btn btn-raised btn-primary d-none" id="btnGuardar">GUARDAR</button> 
            </div>
        </div>
    </div>
</div>
