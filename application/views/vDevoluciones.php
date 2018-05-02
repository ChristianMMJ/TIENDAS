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
                
                <div class="row">
                    <div class="col-12 d-none" > 
                        <input type="text" id="Venta" name="Venta" readonly="" class="form-control">
                    </div>
                </div>
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
                <div class="col-sm-12" align="center">
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
                <div id="DetalleParaIntercambio" class="table-responsive d-none">
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
                        <tfoot>
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
