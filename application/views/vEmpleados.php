<div class="card border-0" id="pnlTablero">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6 float-left">
                <legend class="float-left">Gestión de Empleados</legend>
            </div>
            <div class="col-sm-6 float-right" align="right">
                <button type="button" class="btn btn-primary" id="btnNuevo" data-toggle="tooltip" data-placement="left" title="Agregar"><span class="fa fa-plus"></span><br></button>
            </div>
        </div>
        <div class="card-block">
            <div class="table-responsive" id="tblRegistros"></div>
        </div>
    </div>
</div>
<!--GUARDAR-->
<div id="" class="container-fluid">
    <div class="card border-0  d-none" id="pnlDatos">
        <div class="card-body text-dark"> 
            <form id="frmNuevo">
                <div class="row">
                    <div class="col-md-2 float-left">
                        <legend class="float-left">Empleados</legend>
                    </div>
                    <div class="col-md-7 float-right">

                    </div>
                    <div class="col-md-3 float-right" align="right">
                        <button type="button" class="btn btn-primary" id="btnGuardar">GUARDAR</button>
                        <button type="button" class="btn btn-default" id="btnCancelar">SALIR</button>
                    </div>
                </div>

                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active show" data-toggle="tab" href="#Datos1">Generales</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#Datos2">Conceptos Fijos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#Datos3">Foto</a>
                    </li>
                </ul>
                <div id="myTabContent" class="tab-content">
                    <input type="text" class="d-none"  name="ID"  >
                    <div class="tab-pane fade active show" id="Datos1">
                        <br>
                        <div class="row">
                            <div class="col-sm">
                                <label for="Tienda">Tienda*</label>
                                <select class="form-control form-control-sm required"  name="Tienda" required=""> 
                                    <option value=""></option>  
                                </select>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-sm">
                                <label for="PrimerNombre">Nombre 1*</label>  
                                <input type="text" class="form-control form-control-sm"  maxlength="50" name="PrimerNombre" required >
                            </div>
                            <div class="col-sm">
                                <label for="SegundoNombre">Nombre 2</label>  
                                <input type="text" class="form-control form-control-sm"  maxlength="50"  name="SegundoNombre"  >
                            </div>
                            <div class="col-sm">
                                <label for="ApellidoP">Apellido P*</label>  
                                <input type="text" class=" form-control form-control-sm " maxlength="50" name="ApellidoP" required >
                            </div>
                            <div class="col-sm">
                                <label for="ApellidoM">Apellido M*</label>  
                                <input type="text" class=" form-control form-control-sm" maxlength="50"  name="ApellidoM" required >
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
                                <select class="form-control form-control-sm required"  name="Estado" required=""> 
                                    <option value=""></option>
                                    <option value="Aguascalientes">Aguascalientes</option>
                                    <option value="Baja California">Baja California</option>
                                    <option value="Baja California Sur">Baja California Sur</option>
                                    <option value="Campeche">Campeche</option>
                                    <option value="Coahuila de Zaragoza">Coahuila de Zaragoza</option>
                                    <option value="Colima">Colima</option>
                                    <option value="Chiapas">Chiapas</option>
                                    <option value="Chihuahua">Chihuahua</option>
                                    <option value="Distrito Federal">Distrito Federal</option>
                                    <option value="Durango">Durango</option>
                                    <option value="Guanajuato">Guanajuato</option>
                                    <option value="Guerrero">Guerrero</option>
                                    <option value="Hidalgo">Hidalgo</option>
                                    <option value="Jalisco">Jalisco</option>
                                    <option value="México">México</option>
                                    <option value="Michoacán">Michoacán</option>
                                    <option value="Morelos">Morelos</option>
                                    <option value="Nayarit">Nayarit</option>
                                    <option value="Nuevo León">Nuevo León</option>
                                    <option value="Oaxaca">Oaxaca</option>
                                    <option value="Puebla">Puebla</option>
                                    <option value="Querétaro">Querétaro</option>
                                    <option value="Quintana Roo">Quintana Roo</option>
                                    <option value="San Luis Potosí">San Luis Potosí</option>
                                    <option value="Sinaloa">Sinaloa</option>
                                    <option value="Sonora">Sonora</option>
                                    <option value="Tabasco">Tabasco</option>
                                    <option value="Tamaulipas">Tamaulipas</option>
                                    <option value="Tlaxcala">Tlaxcala</option>
                                    <option value="Veracruz">Veracruz</option>
                                    <option value="Yucatán">Yucatán</option>
                                    <option value="Zacatecas">Zacatecas</option>
                                </select>
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
                                <label for="FechaIngreso">Fecha Ingreso</label>  
                                <input type="text" class="form-control form-control-sm" name="FechaIngreso"  placeholder="XX/XX/XXXX" data-provide="datepicker" data-date-format="dd/mm/yyyy" readonly="">
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
                                <select class="form-control form-control-sm required"  name="TipoSalario" required=""> 
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
                        <div class="row">
                            <div class="col-sm">
                                <label for="Estatus">Estatus*</label>
                                <select class="form-control form-control-sm required"  name="Estatus" required=""> 
                                    <option value=""></option>  
                                    <option>ACTIVO</option>
                                    <option>INACTIVO</option> 
                                </select>
                            </div>
                        </div> 
                    </div>
                    <div class="tab-pane fade" id="Datos2">
                        <br>
                        <div class="row">
                            <div class="col-sm-2">
                                <label for="SalarioDiario">Sueldo Diario</label>  
                                <input type="text" class="form-control form-control-sm numbersOnly"  maxlength="10" name="SalarioDiario"  >
                            </div>
                            <div class="col-sm-2">
                                <label for="SalarioFiscal">Sueldo Fiscal</label>  
                                <input type="text" class="form-control form-control-sm numbersOnly"  maxlength="10" name="SalarioFiscal"  >
                            </div>
                            <div class="col-sm-2">
                                <label for="PorcentajeVtaSem">% Vta Sem Per</label>  
                                <input type="text" class="form-control form-control-sm numbersOnly"  maxlength="10" name="PorcentajeVtaSem"  >
                            </div>
                            <div class="col-sm-2">
                                <label for="PorcentajeVtaSemGlobal">% Vta Sem Glo</label>  
                                <input type="text" class="form-control form-control-sm numbersOnly"  maxlength="10" name="PorcentajeVtaSemGlobal"  >
                            </div>
                            <div class="col-sm-2">
                                <label for="PorcentajeVtaMens">% Vta Men Per</label>  
                                <input type="text" class="form-control form-control-sm numbersOnly"  maxlength="10" name="PorcentajeVtaMens"  >
                            </div>
                            <div class="col-sm-2">
                                <label for="PorcentajeVtaMensGlobal">% Vta Men Glo</label>  
                                <input type="text" class="form-control form-control-sm numbersOnly"  maxlength="10" name="PorcentajeVtaMensGlobal"  >
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                                <label for="DescIMSS">IMSS</label>  
                                <input type="text" class="form-control form-control-sm numbersOnly"  maxlength="10" name="DescIMSS"  >
                            </div>
                            <div class="col-sm-2">
                                <label for="DescImpuesto">Impuesto</label>  
                                <input type="text" class="form-control form-control-sm numbersOnly"  maxlength="10" name="DescImpuesto"  >
                            </div>
                            <div class="col-sm-2">
                                <label for="DescInfonavit">Infonavit</label>  
                                <input type="text" class="form-control form-control-sm numbersOnly"  maxlength="10" name="DescInfonavit"  >
                            </div>
                            <div class="col-sm-2">
                                <label for="Fonacot">Fonacot</label>  
                                <input type="text" class="form-control form-control-sm numbersOnly"  maxlength="10" name="Fonacot"  >
                            </div>
                            <div class="col-sm-2">
                                <label for="Ahorro">Ahorro</label>  
                                <input type="text" class="form-control form-control-sm numbersOnly"  maxlength="10" name="Ahorro"  >
                            </div>
                            <div class="col-sm-2">
                                <label for="PrimaDominical">Pri. Dominical</label>  
                                <input type="text" class="form-control form-control-sm numbersOnly"  maxlength="10" name="PrimaDominical"  >
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                                <label for="SalarioNeto">Sueldo Neto</label>  
                                <input type="text" class="form-control form-control-sm numbersOnly"  maxlength="10" name="SalarioNeto"  >
                            </div>
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
                            <div class="col-sm-4">
                                <label for="ParentescoBeneficiario">Parentesco</label>  
                                <input type="text" class="form-control form-control-sm "  maxlength="50" name="ParentescoBeneficiario"  >
                            </div>
                            <div class="col-sm-2">
                                <label for="PorcentajeBeneficio">% Porcentaje Beneficio</label>  
                                <input type="text" class="form-control form-control-sm numbersOnly"  maxlength="4" name="PorcentajeBeneficio"  >
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                                <label for="ZapTiendaEmpleado">Zap. Vend.</label>  
                                <input type="text" class="form-control form-control-sm numbersOnly"  maxlength="10" name="ZapTiendaEmpleado"  >
                            </div>
                            <div class="col-sm-2">
                                <label for="ZapTiendaEmpleadoPagos">Zap. Vend. Pago</label>  
                                <input type="text" class="form-control form-control-sm numbersOnly"  maxlength="10" name="ZapTiendaEmpleadoPagos"  >
                            </div>
                            <div class="col-sm-2">
                                <label for="ZapTiendaEmpleadoSaldo">Zap. Vend. Saldo</label>  
                                <input type="text" class="form-control form-control-sm numbersOnly"  maxlength="10" name="ZapTiendaEmpleadoSaldo"  >
                            </div>

                        </div>
                    </div>
                    <div class="tab-pane fade" id="Datos3">
                        <br>
                        <!-- FOTO -->
                        <center>
                            <h3>Puede subir un archivo PDF, imagen (JPG,GIF,PNG) etc.</h3>
                        </center>
                        <div class="col-md-12" align="center">
                            <input type="file" id="Foto" name="Foto" class="d-none" accept="image/x-png,image/jpeg">
                            <button type="button" class="btn btn-default" id="btnArchivo" name="btnArchivo">
                                <span class="fa fa-upload fa-1x"></span> SELECCIONA EL ARCHIVO
                            </button>
                            <br><hr>
                            <div id="VistaPrevia" class="col-md-12" align="center"></div>
                        </div>
                        <!-- FIN FOTO -->
                    </div>
                </div>
        </div>
        </form>
    </div> 
</div> 
<!--SCRIPT-->
<script>
    var master_url = base_url + 'index.php/Empleados/';
    var pnlDatos = $("#pnlDatos");
    var pnlTablero = $("#pnlTablero");
    var btnNuevo = $("#btnNuevo");
    var btnGuardar = pnlDatos.find("#btnGuardar");
    var btnCancelar = pnlDatos.find("#btnCancelar");
    var nuevo = true;

    /*DEFINIR VARIABLES PARA LA SELECCION DE ARCHIVOS*/
    var Archivo = pnlDatos.find("#Foto");
    var btnArchivo = pnlDatos.find("#btnArchivo");
    var VistaPrevia = pnlDatos.find("#VistaPrevia");

    $(document).ready(function () {
        /*NUEVO ARCHIVO*/
        btnArchivo.on("click", function () {
            Archivo.change(function () {
                HoldOn.open({theme: "sk-bounce", message: "POR FAVOR ESPERE..."});
                var imageType = /image.*/;
                if (Archivo[0].files[0] !== undefined && Archivo[0].files[0].type.match(imageType)) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        var preview = '<button type="button" class="btn btn-default" id="btnQuitarVP" name="btnQuitarVP" onclick="onRemovePreview(this)"><span class="fa fa-times fa-2x danger-icon"></span></button><br><img src="' + reader.result + '" class="img-responsive" width="400px"><div class="caption"><p>' + Archivo[0].files[0].name + '</p></div>';
                        VistaPrevia.html(preview);
                    };
                    reader.readAsDataURL(Archivo[0].files[0]);
                } else {
                    if (Archivo[0].files[0] !== undefined && Archivo[0].files[0].type.match('application/pdf')) {
                        var readerpdf = new FileReader();
                        readerpdf.onload = function (e) {
                            VistaPrevia.html('<div><button type="button" class="btn btn-default" id="btnQuitarVP" name="btnQuitarVP" onclick="onRemovePreview(this)"><span class="fa fa-times fa-2x danger-icon"></span></button><br> <embed src="' + readerpdf.result + '" type="application/pdf" width="90%" height="800px"' +
                                    ' pluginspage="http://www.adobe.com/products/acrobat/readstep2.html"></div>');
                        };
                        readerpdf.readAsDataURL(Archivo[0].files[0]);
                    } else {
                        VistaPrevia.html('EL ARCHIVO SE SUBIRÁ, PERO NO ES POSIBLE RECONOCER SI ES UN PDF O UNA IMAGEN');
                    }
                }
                HoldOn.close();
            });
            Archivo.trigger('click');
        });
        /*Validacion Sueldo*/
         pnlDatos.find("[name='TipoSalario']").change(function () {
            if ($(this).val().trim() === '2') {
                $("[name='SalarioFiscal']").addClass("disabledForms");
                $("[name='SalarioDiario']").addClass("disabledForms");
            } else {
                $("[name='SalarioFiscal']").removeClass("disabledForms");
                $("[name='SalarioDiario']").removeClass("disabledForms");
            }
        });
        //Valida RFC 
        pnlDatos.find("[name='RFC']").blur(function () {
            var rfc = $(this).val().trim(); // -Elimina los espacios que pueda tener antes o después
            var rfcCorrecto = rfcValido(rfc);   //Comprobar RFC

            if (rfcCorrecto) {
            } else {
                $("[name='RFC']").val("");
            }
        });
        btnGuardar.click(function () {
            isValid('pnlDatos');
            if (valido) {
                var frm = new FormData(pnlDatos.find("#frmNuevo")[0]);
                if (!nuevo) {
                    if (pnlDatos.find("[name='Estatus']").val() === 'INACTIVO') {
                        frm.append('FechaEgreso', formattedDate());
                        if (parseFloat(pnlDatos.find("[name='SaldoPrestamo']").val()) !== 0
                                || parseFloat(pnlDatos.find("[name='SaldoPrestamo']").val()) > 0
                                || parseFloat(pnlDatos.find("[name='ZapTiendaEmpleadoSaldo']").val()) !== 0
                                || parseFloat(pnlDatos.find("[name='ZapTiendaEmpleadoSaldo']").val()) > 0
                                )
                        {
                            $('#mdlAvisoEmpleado').modal('show');
                        }
                    }
                    $.ajax({
                        url: master_url + 'onModificar',
                        type: "POST",
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: frm
                    }).done(function (data, x, jq) {
                        onNotify('<span class="fa fa-check fa-lg"></span>', 'SE HA MODIFICADO EL REGISTRO', 'success');
                        getRecords();
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
                        data: frm
                    }).done(function (data, x, jq) {
                        nuevo = false;
                        temp = data;
                        onNotify('<span class="fa fa-check fa-lg"></span>', 'SE HA AÑADIDO UN NUEVO REGISTRO', 'success');
pnlDatos.find('#ID').val(data);
nuevo=false;
                        getRecords();
                    }).fail(function (x, y, z) {
                        console.log(x, y, z);
                    }).always(function () {
                        HoldOn.close();
                    });
                }
            }
        });
        btnNuevo.click(function () {
            pnlTablero.addClass("d-none");
            pnlDatos.removeClass('d-none');
            pnlDatos.find(".nav-tabs a").removeClass("active show");
            $(pnlDatos.find(".nav-tabs a")[0]).addClass("active show");
            pnlDatos.find("#Datos1").addClass("active show");
            pnlDatos.find("#Datos2").removeClass("active show");
            pnlDatos.find("#Datos3").removeClass("active show");
            pnlDatos.find("input").val("");
            $.each(pnlDatos.find("select"), function (k, v) {
                pnlDatos.find("select")[k].selectize.clear(true);
            });
            $(':input:text:enabled:visible:first').focus();
            nuevo = true;
        });
        btnCancelar.click(function () {
            pnlTablero.removeClass("d-none");
            pnlDatos.addClass('d-none');
            nuevo = true;
        });
        getRecords();
        getTiendas();
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
                $("#tblRegistros").html(getTable('tblEmpleados', data));
                $('#tblEmpleados tfoot th').each(function () {
                    $(this).html('');
                });
                var tblSelected = $('#tblEmpleados').DataTable(tableOptions);
                $('#tblEmpleados_filter input[type=search]').focus();

                $('#tblEmpleados tbody').on('click', 'tr', function () {

                    $("#tblEmpleados tbody tr").removeClass("success");
                    $(this).addClass("success");
                    var dtm = tblSelected.row(this).data();
                    temp = parseInt(dtm[0]);
                });

                $('#tblEmpleados tbody').on('dblclick', 'tr', function () {
                    $("#tblEmpleados tbody tr").removeClass("success");
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
                            url: master_url + 'getEmpleadoByID',
                            type: "POST",
                            dataType: "JSON",
                            data: {
                                ID: temp
                            }
                        }).done(function (data, x, jq) {
                            var dtm = data[0];
                            pnlDatos.find("input").val("");
                            $.each(pnlDatos.find("select"), function (k, v) {
                                pnlDatos.find("select")[k].selectize.clear(true);
                            });
                            pnlDatos.find(".nav-tabs a").removeClass("active show");
                            $(pnlDatos.find(".nav-tabs a")[0]).addClass("active show");
                            pnlDatos.find("#Datos1").addClass("active show");
                            pnlDatos.find("#Datos2").removeClass("active show");
                            pnlDatos.find("#Datos3").removeClass("active show");
                            $.each(data[0], function (k, v) {
                                if (k !== 'Foto') {
                                    pnlDatos.find("[name='" + k + "']").val(v);
                                    if (pnlDatos.find("[name='" + k + "']").is('select')) {
                                        pnlDatos.find("[name='" + k + "']")[0].selectize.setValue(v);
                                    }
                                }

                            });

                            if (dtm.Foto !== null && dtm.Foto !== undefined && dtm.Foto !== '') {
                                var ext = getExt(dtm.Foto);
                                if (ext === "gif" || ext === "jpg" || ext === "png" || ext === "jpeg") {
                                    pnlDatos.find("#VistaPrevia").html('<div class="col-md-8"></div><div class="col-md-4"><button type="button" class="btn btn-default" id="btnQuitarVP" name="btnQuitarVP" onclick="onRemovePreview(this)"><span class="fa fa-times fa-2x danger-icon"></span></button><br></div><img id="trtImagen" src="' + base_url + dtm.Foto + '" class ="img-responsive" width="400px"  onclick="printImg(\' ' + base_url + dtm.Foto + ' \')"  />');
                                }
                                if (ext === "PDF" || ext === "Pdf" || ext === "pdf") {
                                    pnlDatos.find("#VistaPrevia").html('<div class="col-md-8"></div> <div class="col-md-4"><button type="button" class="btn btn-default" id="btnQuitarVP" name="btnQuitarVP" onclick="onRemovePreview(this)"><span class="fa fa-times fa-2x danger-icon"></span></button><br></div><embed src="' + base_url + dtm.Foto + '" type="application/pdf" width="90%" height="800px" pluginspage="http://www.adobe.com/products/acrobat/readstep2.html">');
                                }
                                if (ext !== "gif" && ext !== "jpg" && ext !== "jpeg" && ext !== "png" && ext !== "PDF" && ext !== "Pdf" && ext !== "pdf") {
                                    pnlDatos.find("#VistaPrevia").html('<h1>NO EXISTE ARCHIVO ADJUNTO</h1>');
                                }
                            } else {
                                pnlEditar.find("#VistaPrevia").html('<h3>NO EXISTE ARCHIVO ADJUNTO</h3>');
                            }

                            pnlTablero.addClass("d-none");
                            pnlDatos.removeClass('d-none');
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
    function onRemovePreview(e) {
        $(e).parent().parent("#VistaPrevia").html("");
        $('#Foto').trigger('blur');
        $('#Foto').on('blur', function (e) {
            $('#Foto').val('');
        });
    }

</script>

