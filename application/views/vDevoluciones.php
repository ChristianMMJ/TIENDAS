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
                <div id="Pasos" class="row">
                    <div class="col-sm d-none" align="left">
                        <button type='button' class="btn btn-danger btn-sm" id='btnCancelarAtrasHead'><span class="fa fa-arrow-left "></span><br>CANCELAR</button>
                    </div>
                    <div class="col-sm d-none"> 
                        <h2>Paso 1 de 3: Seleccionar la venta</h2>
                    </div>
                    <div class="col-sm d-none"> 
                        <h2>Paso 2 de 3: Seleccionar productos a devolver</h2>
                    </div>
                    <div class="col-12 d-none" align="center"> 
                        <h2>Paso 3 de 3: Seleccionar productos a entregar</h2>
                    </div>
                    <div class="col-sm" align="right">
                        <button type='button' class="btn btn-success btn-sm  d-none" id='btnSiguiente'><span class="fa fa-arrow-right"></span><br>SIGUIENTE</button>
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
                    </table>
                </div> 
                <!--SUBTOTAL DETALLE VENTA-->
                <div id="ResumenDevolucionesDetalle" class="row">
                    <div class="col-4"></div>
                    <div id="SubtotalEncabezado" align='center' class="col-4">
                        <h1 class="text-success">$0.0</h1>
                    </div>
                    <div class="col-4" align="right">
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
                <!--ARTICULOS A ESCOGER-->
                <div id="ResumenDetalleParaIntercambio" class="row d-none">
                    <div class="col-2" align="center">
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input type="checkbox" autocomplete="off" id="btnActivarCodigoDevolucion" name="btnActivarCodigoDevolucion" class="form-control">
                                <br><strong>Código de barras</strong>
                            </label>
                        </div>
                    </div>
                    <div class="col-8">
                        <input type="text" id="CodigoBarrasDevolucion" name="CodigoBarrasDevolucion" class="form-control" placeholder="000123456">
                    </div>
                    <div class="col-2">     
                        <button type='button' class="btn btn-primary btn-sm" id='btnBuscarCodigoDevolucion'><span class="fa fa-search"></span> BUSCAR CÓDIGO</button>
                    </div>
                    <div class="w-100 d-none d-md-block"></div>
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
                    <div class="col-2">
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
                    <div class="col-1">
                        <br>
                        <button  class="btn btn-primary btn-sm" id="btnAgregarADevolucion" data-toggle="tooltip" data-placement="top" title="Agregar Producto" >
                            <i class="fa fa-plus"></i>
                        </button>
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
                    </table>
                </div>
                <!--TOTALES-->
                <div id="ResumenDetalleParaIntercambioTotales" class="row d-none">
                    <div id="SubtotaPie" class="col-3" align="center">
                        <p class="text-danger">* Monto devolución *</p>
                        <strong class="text-dark">$ 0.0</strong>
                    </div>
                    <div id="TotalCubierto" class="col-2" align="center">
                        <p class="text-info">* Subtotal *</p>
                        <strong class="text-dark">$ 0.0</strong>
                    </div>
                    <div id="TotalCubiertoIVA" class="col-2" align="center">
                        <p class="text-warning">* I.V.A *</p>
                        <strong class="text-dark">$ 0.0</strong>
                    </div>
                    <div id="TotalCubiertoTotal" class="col-2" align="center">
                        <p class="text-primary">* Total *</p>
                        <strong class="text-dark">$ 0.0</strong>
                    </div>
                    <div id="TotalDiferencia" class="col-3" align="center">
                        <p class="text-success">* Diferencia a cobrar *</p>
                        <strong class="text-dark">$ 0.0</strong>
                    </div>
                    <div class="w-100"></div>
                    <div class="col-12" align="center"><br>
                        <h3 class="text-info" id="ImporteEnLetraDevolucion"></h3>
                    </div>
                    <div class="w-100"></div>
                    <div class="col-12" align="center">
                        <h4 class="text-success">Su Pago*</h4>
                        <input type="text" id="SuPagoDevolucion" name="SuPagoDevolucion" class="form-control  numbersOnly text-success input-lg money" placeholder="0.0">
                    </div>
                    <div class="col-12"> 
                        <div class="col-12 text-center">
                            <h4 class="text-warning">CAMBIO*</h4>
                            <strong><legend for="TOTAL" class="text-warning" id="CambioDevolucion">$ 0.00</legend></strong>
                        </div> 
                    </div>
                </div>
                <!--FIN TOTALES-->
            </div>
            <div class="modal-footer">    
                <div class="col-6">
                    <button type='button' class="btn btn-danger btn-sm d-none" id='btnCancelarAtras'><span class="fa fa-arrow-left "></span><br>CANCELAR</button>
                </div>
                <div class="col-6" align="right">
                    <button type='button' class="btn btn-primary btn-sm  d-none" id='btnFinalizar'><span class="fa fa-check"></span><br> FINALIZAR</button>
                </div>
            </div>
        </div>
    </div>
</div>