<div class="card " id="pnlTablero">
    <div class="card-body">
        <legend class="float-left">Gestión de Vendedores</legend>
        <div align="right">
            <button type="button" class="btn btn-primary" id="btnNuevo"><span class="fa fa-plus"></span><br>AGREGAR</button>
            <button type="button" class="btn btn-primary" id="btnRefrescar"><span class="fa fa-refresh"></span><br>REFRESCAR</button>
            <button type="button" class="btn btn-primary" id="btnConfirmarEliminar"><span class="fa fa-trash"></span><br>ELIMINAR</button>
        </div>

        <div class="card-block">
            <div id="tblRegistros"></div>
        </div>
    </div>
</div>
<!--MODALES--> 
<!--Confirmacion-->
<div class="modal" id="mdlConfirmar" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirmar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Deseas eliminar el registro?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">CANCELAR</button>
                <button type="button" class="btn btn-raised btn-primary" id="btnEliminar">ACEPTAR</button>
            </div>
        </div>
    </div>
</div>

<!--GUARDAR-->
<div id="" class="container-fluid">
    <div class="card border-0  d-none" id="pnlNuevo">
        <div class="card-body text-dark"> 
            <form id="frmNuevo">

                <div class="row">
                    <div class="col-md-2 float-left">
                        <legend class="float-left">Nuevo</legend>
                    </div>
                    <div class="col-md-7 float-right">

                    </div>
                    <div class="col-md-3 float-right" align="right">
                        <button type="button" class="btn btn-default" id="btnCancelar"><span class="fa fa-undo"></span><br>CANCELAR</button>
                        <button type="button" class="btn btn-primary" id="btnGuardar"><span class="fa fa-check"></span><br>GUARDAR</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <label for="Tienda">Tienda*</label>
                        <select class="form-control form-control-sm "  name="Tienda" required=""> 
                            <option value=""></option>  
                        </select>
                    </div>
                </div> 
                <div class="row">

                    <div class="col-sm">
                        <label for="ApellidoP">Apellido P*</label>  
                        <input type="text" class=" form-control form-control-sm " maxlength="50" name="ApellidoP" required >
                    </div>
                    <div class="col-sm">
                        <label for="ApellidoM">Apellido M*</label>  
                        <input type="text" class=" form-control form-control-sm" maxlength="50"  name="ApellidoM" required >
                    </div>
                    <div class="col-sm">
                        <label for="PrimerNombre">Nombre 1*</label>  
                        <input type="text" class="form-control form-control-sm"  maxlength="50" name="PrimerNombre" required >
                    </div>
                    <div class="col-sm">
                        <label for="SegundoNombre">Nombre 2*</label>  
                        <input type="text" class="form-control form-control-sm"  maxlength="50"  name="SegundoNombre"  >
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm">
                        <label for="RFC">RFC*</label>  
                        <input type="text" class="form-control form-control-sm"  maxlength="15"  name="RFC" required >
                    </div>
                    <div class="col-sm">
                        <label for="Direccion">Dirección*</label>  
                        <input type="text" class="form-control form-control-sm"  maxlength="150" name="Direccion" required >
                    </div>
                    <div class="col-sm">
                        <label for="NoExt">Num. Ext*</label>  
                        <input type="text" class="form-control form-control-sm" maxlength="10"   name="NoExt"  required>
                    </div>
                    <div class="col-sm">
                        <label for="NoInt">Num. Int.</label>  
                        <input type="text" class="form-control form-control-sm"  maxlength="10"  name="NoInt"  >
                    </div>

                </div> 
                <div class="row">

                    <div class="col-sm">
                        <label for="Colonia">Colonia</label>  
                        <input type="text" class="form-control form-control-sm"  maxlength="60" name="Colonia" required >
                    </div>
                    <div class="col-sm">
                        <label for="Ciudad">Ciudad</label>  
                        <input type="text" class="form-control form-control-sm"  maxlength="60"  name="Ciudad" required >
                    </div>
                    <div class="col-sm">
                        <label for="Estado">Estado</label>  
                        <input type="text" class="form-control form-control-sm" maxlength="60"  name="Estado" required >
                    </div>
                    <div class="col-sm">
                        <label for="CP">Código Postal</label>  
                        <input type="text" class="form-control form-control-sm numbersOnly"  maxlength="8"  name="CP"  required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-3">
                        <label for="Telefono">Teléfono</label>  
                        <input type="text" class="form-control form-control-sm numbersOnly"  maxlength="15"   name="Telefono"  >
                    </div>
                    <div class="col-sm-3">
                        <label for="Celular">Celular</label>  
                        <input type="text" class="form-control form-control-sm numbersOnly"  maxlength="15"   name="Celular"  >
                    </div>
                    <div class="col-sm-3">
                        <label for="EstadoCivil">Estado Civil*</label>
                        <select class="form-control form-control-sm"  name="EstadoCivil" > 
                            <option value=""></option>  
                            <option>SOLTERO</option>
                            <option>CASADO</option> 
                            <option>COMPROMETIDO</option> 
                            <option>DIVORCIADO</option> 
                            <option>VIUDO</option> 
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <label for="Genero">Género</label>
                        <select class="form-control form-control-sm"  name="Genero" > 
                            <option value=""></option>  
                            <option>MASCULINO</option>
                            <option>FEMENINO</option> 
                        </select>
                    </div>
                </div> 

                <div class="row">
                    <div class="col-sm">
                        <label for="FechaIngreo">Fecha Ingreso</label>  
                        <input type="text" class="form-control form-control-sm" name="FechaIngreo"  placeholder="XX/XX/XXXX" data-provide="datepicker" data-date-format="dd/mm/yyyy" readonly="">
                    </div>
                    <div class="col-sm">
                        <label for="FechaNacimiento">Fecha Nacimiento</label>  
                        <input type="text" class="form-control form-control-sm" name="FechaNacimiento"  placeholder="XX/XX/XXXX" data-provide="datepicker" data-date-format="dd/mm/yyyy" readonly="">
                    </div>
                    <div class="col-sm">
                        <label for="NoIMSS">No. IMSS</label>  
                        <input type="text" class="form-control form-control-sm"  maxlength="12"   name="NoIMSS"  >
                    </div>
                    <div class="col-sm">
                        <label for="CtaBancaria">Cta o Tarjeta</label>  
                        <input type="text" class="form-control form-control-sm numbersOnly"  maxlength="16"   name="CtaBancaria"  >
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm">
                        <label for="TipoSalario">Tipo de Sueldo*</label>
                        <select class="form-control form-control-sm"  name="TipoSalario" required=""> 
                            <option value=""></option>  
                            <option value="1">1 - FIJO</option>
                            <option value="2">2 - VENTA</option> 
                            <option value="3">3 - AMBAS</option> 
                        </select> 
                    </div>
                    <div class="col-sm">
                        <label for="FormaPagoNomina">Forma Pago Nómina*</label>
                        <select class="form-control form-control-sm"  name="FormaPagoNomina" required=""> 
                            <option value=""></option>  
                            <option value="1">1 - TARJETA</option>
                            <option value="2">2 - SIN TARJETA</option> 
                        </select> 
                    </div>

                </div>
                <br>
                <div class="card border-primary mb-3">

                    <div class="card-header">Conceptos Fijos</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm">
                                <label for="SalarioDiario">Sueldo Diario</label>  
                                <input type="text" class="form-control form-control-sm numbersOnly"  maxlength="10" name="SalarioDiario"  >
                            </div>
                            <div class="col-sm">
                                <label for="SalarioFiscal">Sueldo Fiscal</label>  
                                <input type="text" class="form-control form-control-sm numbersOnly"  maxlength="10" name="SalarioFiscal"  >
                            </div>

                            <div class="col-sm">
                                <label for="PorcentajeVtaSem">% Vta Sem Per</label>  
                                <input type="text" class="form-control form-control-sm numbersOnly"  maxlength="10" name="PorcentajeVtaSem"  >
                            </div>
                            <div class="col-sm">
                                <label for="PorcentajeVtaSemGlobal">% Vta Sem Glo</label>  
                                <input type="text" class="form-control form-control-sm numbersOnly"  maxlength="10" name="PorcentajeVtaSemGlobal"  >
                            </div>
                            <div class="col-sm">
                                <label for="PorcentajeVtaMens">% Vta Men Per</label>  
                                <input type="text" class="form-control form-control-sm numbersOnly"  maxlength="10" name="PorcentajeVtaMens"  >
                            </div>
                            <div class="col-sm">
                                <label for="PorcentajeVtaMensGlobal">% Vta Men Glo</label>  
                                <input type="text" class="form-control form-control-sm numbersOnly"  maxlength="10" name="PorcentajeVtaMensGlobal"  >
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm">
                                <label for="DescIMSS">IMSS</label>  
                                <input type="text" class="form-control form-control-sm numbersOnly"  maxlength="10" name="DescIMSS"  >
                            </div>
                            <div class="col-sm">
                                <label for="DescImpuesto">Impuesto</label>  
                                <input type="text" class="form-control form-control-sm numbersOnly"  maxlength="10" name="DescImpuesto"  >
                            </div>
                            <div class="col-sm">
                                <label for="DescInfonavit">Infonavit</label>  
                                <input type="text" class="form-control form-control-sm numbersOnly"  maxlength="10" name="DescInfonavit"  >
                            </div>
                            <div class="col-sm">
                                <label for="Fonacot">Fonacot</label>  
                                <input type="text" class="form-control form-control-sm numbersOnly"  maxlength="10" name="Fonacot"  >
                            </div>
                            <div class="col-sm">
                                <label for="Ahorro">Ahorro</label>  
                                <input type="text" class="form-control form-control-sm numbersOnly"  maxlength="10" name="Ahorro"  >
                            </div>
                            <div class="col-sm">
                                <label for="PrimaDominical">Pri. Dominical</label>  
                                <input type="text" class="form-control form-control-sm numbersOnly"  maxlength="10" name="PrimaDominical"  >
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                                <label for="NoFiscal">No. Fiscal</label>  
                                <input type="text" class="form-control form-control-sm numbersOnly"  maxlength="10" name="NoFiscal"  >
                            </div>
                            <div class="col-sm-2">
                                <label for="Prestamo">Préstamo</label>  
                                <input type="text" class="form-control form-control-sm numbersOnly"  maxlength="10" name="Prestamo"  >
                            </div>
                            <div class="col-sm-2">
                                <label for="AbonoPrestamo">Abono Préstamo</label>  
                                <input type="text" class="form-control form-control-sm numbersOnly"  maxlength="10" name="AbonoPrestamo"  >
                            </div>
                            <div class="col-sm-2">
                                <label for="SaldoPrestamo">Saldo Préstamo</label>  
                                <input type="text" class="form-control form-control-sm numbersOnly"  maxlength="10" name="SaldoPrestamo"  >
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                                <label for="Beneficiario">Beneficiario</label>  
                                <input type="text" class="form-control form-control-sm "  maxlength="80" name="Beneficiario"  >
                            </div>
                            <div class="col-sm-2">
                                <label for="ParentescoBeneficiario">Parentesco</label>  
                                <input type="text" class="form-control form-control-sm "  maxlength="50" name="ParentescoBeneficiario"  >
                            </div>
                            <div class="col-sm-2">
                                <label for="PorcentajeBeneficio">% Porcentaje Beneficio</label>  
                                <input type="text" class="form-control form-control-sm numbersOnly"  maxlength="10" name="PorcentajeBeneficio"  >
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                                <label for="ZapTiendaVendedor">Zap. Vend.</label>  
                                <input type="text" class="form-control form-control-sm numbersOnly"  maxlength="10" name="ZapTiendaVendedor"  >
                            </div>
                            <div class="col-sm-2">
                                <label for="ZapTiendaVendedorPagos">Zap. Vend. Pago</label>  
                                <input type="text" class="form-control form-control-sm numbersOnly"  maxlength="10" name="ZapTiendaVendedorPagos"  >
                            </div>
                            <div class="col-sm-2">
                                <label for="ZapTiendaVendedorSaldo">Zap. Vend. Saldo</label>  
                                <input type="text" class="form-control form-control-sm numbersOnly"  maxlength="10" name="ZapTiendaVendedorSaldo"  >
                            </div>

                        </div>
                    </div>
                </div>



                <div class="row">
                    <div class="col-sm">
                        <label for="Estatus">Estatus*</label>
                        <select class="form-control form-control-sm"  name="Estatus" required=""> 
                            <option value=""></option>  
                            <option>ACTIVO</option>
                            <option>INACTIVO</option> 
                        </select>
                    </div>
                </div> 

            </form>
        </div> 
    </div> 
</div>
<!--EDITAR-->
<div id="" class="container-fluid">
    <div class="card border-0  d-none" id="pnlEditar">
        <div class="card-body text-dark"> 
            <div class="card-body text-dark"> 
                <form id="frmEditar">
                    <div class="row">
                        <div class="col-md-2 float-left">
                            <legend class="float-left">Editar </legend>
                        </div>
                        <div class="col-md-7 float-right">

                        </div>
                        <div class="col-md-3 float-right" align="right">
                            <button type="button" class="btn btn-default" id="btnCancelar"><span class="fa fa-undo"></span><br>CANCELAR</button>
                            <button type="button" class="btn btn-primary" id="btnModificar"><span class="fa fa-check"></span><br>GUARDAR</button>
                        </div>
                    </div>
                    <div class="d-none">
                        <input type="text" class="form-control form-control-sm" id="ID" name="ID" required >
                    </div>



                    <div class="row">
                        <div class="col-sm">
                            <label for="Pais">País</label>  
                            <input type="text" class="form-control form-control-sm"  maxlength="60"  id="Colonia" name="Colonia"  >
                        </div>

                        <div class="col-sm">
                            <label for="Telefono">Teléfono</label>  
                            <input type="tel" class="form-control form-control-sm"  maxlength="15"  id="Telefono" name="Telefono"  >
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm">
                            <label for="Correo">Correo</label>  
                            <input type="email" class="form-control form-control-sm"  maxlength="60"  id="Correo" name="Correo"  >
                        </div>
                        <div class="col-sm">
                            <label for="LimiteCredito">Límite de Crédito</label>  
                            <input type="text" class="form-control form-control-sm numbersOnly"  maxlength="15"  id="LimiteCredito" name="LimiteCredito"  >
                        </div>
                        <div class="col-sm">
                            <label for="PlazoPagos">Plazo Pagos</label>  
                            <input type="text" class="form-control form-control-sm numbersOnly"  maxlength="15"  id="PlazoPagos" name="PlazoPagos"  >
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm">
                            <label for="RegimenFiscal">Regimen Fiscal*</label>
                            <select class="form-control form-control-sm "  name="RegimenFiscal" required=""> 
                                <option value=""></option>  
                            </select>
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-sm">
                            <label for="Estatus">Estatus*</label>
                            <select class="form-control form-control-sm"  name="Estatus" required=""> 
                                <option value=""></option>  
                                <option>ACTIVO</option>
                                <option>INACTIVO</option> 
                            </select>
                        </div>
                    </div> 

                </form>
            </div> 
        </div> 
    </div> 
</div>

<!--SCRIPT-->
<script>
    var master_url = base_url + 'index.php/Vendedores/';
    var pnlNuevo = $("#pnlNuevo");
    var pnlTablero = $("#pnlTablero");
    var btnNuevo = $("#btnNuevo");
    var btnGuardar = pnlNuevo.find("#btnGuardar");
    var btnCancelar = pnlNuevo.find("#btnCancelar");
    var pnlEditar = $("#pnlEditar");
    var btnModificar = pnlEditar.find("#btnModificar");
    var btnCancelarModificar = pnlEditar.find("#btnCancelar");
    var btnRefrescar = $("#btnRefrescar");
    var btnEliminar = $("#btnEliminar");
    var btnConfirmarEliminar = $("#btnConfirmarEliminar");
    var mdlConfirmar = $("#mdlConfirmar");

    $(document).ready(function () {
        $(".select2-selection").on("focus", function () {
            $(this).parent().parent().prev().select2("open");
        });
        //Valida RFC
        
        pnlNuevo.find("[name='RFC']").blur(function () {
            var rfc = $(this).val().trim(); // -Elimina los espacios que pueda tener antes o después
            var rfcCorrecto = rfcValido(rfc);   //Comprobar RFC

            if (rfcCorrecto) {
            } else {
                $("[name='RFC']").val("");
            }
        });
        pnlEditar.find("[name='RFC']").blur(function () {
            var rfc = $(this).val().trim(); // -Elimina los espacios que pueda tener antes o después
            var rfcCorrecto = rfcValido(rfc);   //Comprobar RFC

            if (rfcCorrecto) {
            } else {
                $("[name='RFC']").val("");
            }
        });
        btnModificar.click(function () {
            $.validator.setDefaults({
                ignore: []
            });
            $('#frmEditar').validate({
                errorClass: 'myErrorClass',
                errorPlacement: function (error, element) {
                    var elem = $(element);
                    error.insertAfter(element);
                },
                rules: {
                },
                // The select element, which would otherwise get the class, is hidden from
                // view.
                highlight: function (element, errorClass, validClass) {
                    var elem = $(element);
                    if (elem.hasClass("select2-offscreen")) {
                        $("#s2id_" + elem.attr("id") + " ul").addClass(errorClass);
                    } else {
                        elem.addClass(errorClass);
                    }
                },

                //When removing make the same adjustments as when adding
                unhighlight: function (element, errorClass, validClass) {
                    var elem = $(element);
                    if (elem.hasClass("select2-offscreen")) {
                        $("#s2id_" + elem.attr("id") + " ul").removeClass(errorClass);
                    } else {
                        elem.removeClass(errorClass);
                    }
                }
            });
            //Regresa si es valido para los select2
            $('select').on('change', function () {
                $(this).valid();
            });
            //Si es verdadero que hacer
            if ($('#frmEditar').valid()) {
                var frm = new FormData(pnlEditar.find("#frmEditar")[0]);
                $.ajax({
                    url: master_url + 'onModificar',
                    type: "POST",
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: frm
                }).done(function (data, x, jq) {
                    onNotify('<span class="fa fa-check fa-lg"></span>', 'SE HA MODIFICADO EL REGISTRO', 'success');
                    btnRefrescar.trigger('click');
                    pnlEditar.addClass('d-none');
                    pnlTablero.removeClass('d-none');
                }).fail(function (x, y, z) {
                    console.log(x, y, z);
                }).always(function () {
                    HoldOn.close();
                });
            }
        });
        btnGuardar.click(function () {
            $.validator.setDefaults({
                ignore: []
            });
            $('#frmNuevo').validate({
                errorClass: 'myErrorClass',
                errorPlacement: function (error, element) {
                    var elem = $(element);
                    error.insertAfter(element);
                },
                rules: {
                },
                // The select element, which would otherwise get the class, is hidden from
                // view.
                highlight: function (element, errorClass, validClass) {
                    var elem = $(element);
                    if (elem.hasClass("select2-offscreen")) {
                        $("#s2id_" + elem.attr("id") + " ul").addClass(errorClass);
                    } else {
                        elem.addClass(errorClass);
                    }
                },

                //When removing make the same adjustments as when adding
                unhighlight: function (element, errorClass, validClass) {
                    var elem = $(element);
                    if (elem.hasClass("select2-offscreen")) {
                        $("#s2id_" + elem.attr("id") + " ul").removeClass(errorClass);
                    } else {
                        elem.removeClass(errorClass);
                    }
                }
            });
            //Regresa si es valido para los select2
            $('select').on('change', function () {
                $(this).valid();
            });
            //Regresa verdadero si ya se cumplieron las reglas, si no regresa falso
            //Si es verdadero que hacer
            if ($('#frmNuevo').valid()) {
                var frm = new FormData(pnlNuevo.find("#frmNuevo")[0]);

                $.ajax({
                    url: master_url + 'onAgregar',
                    type: "POST",
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: frm
                }).done(function (data, x, jq) {
                    onNotify('<span class="fa fa-check fa-lg"></span>', 'SE HA AÑADIDO UN NUEVO REGISTRO', 'success');
                    getRecords();
                    pnlTablero.removeClass("d-none");
                    pnlNuevo.addClass('d-none');
                    console.log(data, x, jq);
                }).fail(function (x, y, z) {
                    console.log(x, y, z);
                }).always(function () {
                    HoldOn.close();
                });
            }
        });
        //Evento clic del boton confirmar borrar
        btnConfirmarEliminar.click(function () {
            if (temp !== 0 && temp !== undefined && temp > 0) {
                //Muestra el modal
                mdlConfirmar.modal('show');
            } else {
                onNotify('<span class="fa fa-exclamation fa-lg"></span>', 'DEBE DE ELEGIR UN REGISTRO', 'danger');
            }
        });
        btnEliminar.click(function () {
            if (temp !== 0 && temp !== undefined && temp > 0) {
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
                    console.log(data);
                    mdlConfirmar.modal('hide');
                    onNotify('<span class="fa fa-exclamation fa-lg"></span>', 'REIGISTRO ELIMINADO', 'danger');
                    pnlEditar.addClass("d-none");
                    pnlTablero.removeClass("d-none");
                    btnRefrescar.trigger('click');
                }).fail(function (x, y, z) {
                    console.log(x, y, z);
                }).always(function () {
                    HoldOn.close();
                });
            } else {
                onNotify('<span class="fa fa-exclamation fa-lg"></span>', 'DEBE DE ELEGIR UN REGISTRO', 'danger');
            }
        });

        btnRefrescar.click(function () {
            getRecords();
        });
        btnNuevo.click(function () {
            pnlTablero.addClass("d-none");
            pnlNuevo.removeClass('d-none');
            pnlNuevo.find("input").val("");
            pnlNuevo.find("select").val("").trigger('change');
            pnlNuevo.find("[name='Tienda']").select2('open');
        });
        btnCancelar.click(function () {
            pnlTablero.removeClass("d-none");
            pnlNuevo.addClass('d-none');
        });
        btnCancelarModificar.click(function () {
            pnlEditar.addClass("d-none");
            pnlTablero.removeClass("d-none");
        });

        getRecords();
        getRegimenesFiscales();
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
                $("#tblRegistros").html(getTable('tblVendedores', data));
                $('#tblVendedores tfoot th').each(function () {
                    $(this).html('');
                });
                var thead = $('#tblVendedores thead th');
                var tfoot = $('#tblVendedores tfoot th');
                thead.eq(0).addClass("d-none");
                tfoot.eq(0).addClass("d-none");
                $.each($.find('#tblVendedores tbody tr'), function (k, v) {
                    var td = $(v).find("td");
                    td.eq(0).addClass("d-none");
                });


                var tblSelected = $('#tblVendedores').DataTable(tableOptions);
                $('#tblVendedores_filter input[type=search]').focus();

                $('#tblVendedores tbody').on('click', 'tr', function () {

                    $("#tblVendedores tbody tr").removeClass("success");
                    $(this).addClass("success");
                    var dtm = tblSelected.row(this).data();
                    temp = parseInt(dtm[0]);
                });

                $('#tblVendedores tbody').on('dblclick', 'tr', function () {
                    $("#tblVendedores tbody tr").removeClass("success");
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
                            url: master_url + 'getClienteByID',
                            type: "POST",
                            dataType: "JSON",
                            data: {
                                ID: temp
                            }
                        }).done(function (data, x, jq) {

                            pnlEditar.find("input").val("");
                            pnlEditar.find("select").val("").trigger('change');
                            $.each(data[0], function (k, v) {
                                pnlEditar.find("[name='" + k + "']").val(v);
                                //pnlEditar.find("#" + k).val(v).trigger('change');
                                pnlEditar.find("[name='" + k + "']").val(v).trigger('change');
                            });
                            pnlTablero.addClass("d-none");
                            pnlEditar.removeClass('d-none');
                            pnlNuevo.find("[name='Tienda']").select2('open');
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

    function getRegimenesFiscales() {
        HoldOn.open({theme: 'sk-bounce', message: 'ESPERE...'});
        $.ajax({
            url: master_url + 'getRegimenesFiscales',
            type: "POST",
            dataType: "JSON"
        }).done(function (data, x, jq) {
            var options = '<option></option>';
            $.each(data, function (k, v) {
                options += '<option value="' + v.ID + '">' + v.SValue + '</option>';
            });
            pnlNuevo.find("[name='RegimenFiscal']").html(options);
            pnlEditar.find("[name='RegimenFiscal']").html(options);
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }
    //Función para validar un RFC
    function rfcValido(rfc, aceptarGenerico = true) {
        const re = /^([A-ZÑ&]{3,4}) ?(?:- ?)?(\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])) ?(?:- ?)?([A-Z\d]{2})([A\d])$/;
        var validado = rfc.match(re);

        if (!validado)  //Coincide con el formato general del regex?
            return false;

        //Separar el dígito verificador del resto del RFC
        const digitoVerificador = validado.pop(),
                rfcSinDigito = validado.slice(1).join(''),
                len = rfcSinDigito.length,
                //Obtener el digito esperado
                diccionario = "0123456789ABCDEFGHIJKLMN&OPQRSTUVWXYZ Ñ",
                indice = len + 1;
        var suma,
                digitoEsperado;

        if (len == 12)
            suma = 0
        else
            suma = 481; //Ajuste para persona moral

        for (var i = 0; i < len; i++)
            suma += diccionario.indexOf(rfcSinDigito.charAt(i)) * (indice - i);
        digitoEsperado = 11 - suma % 11;
        if (digitoEsperado == 11)
            digitoEsperado = 0;
        else if (digitoEsperado == 10)
            digitoEsperado = "A";

        //El dígito verificador coincide con el esperado?
        // o es un RFC Genérico (ventas a público general)?
        if ((digitoVerificador != digitoEsperado)
                && (!aceptarGenerico || rfcSinDigito + digitoVerificador != "XAXX010101000"))
            return false;
        else if (!aceptarGenerico && rfcSinDigito + digitoVerificador == "XEXX010101000")
            return false;
        return rfcSinDigito + digitoVerificador;
    }

</script>

