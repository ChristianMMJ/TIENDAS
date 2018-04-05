
<div class="card " id="pnlTablero">
    <div class="card-body">
        <legend class="float-left">Gestión de Clientes</legend>
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
                        <label for="Clave">Clave*</label>  
                        <input type="text" class=" form-control form-control-sm " maxlength="50" id="Clave" name="Clave" required >
                    </div>
                    <div class="col-sm">
                        <label for="RazonSocial">Razon Social*</label>  
                        <input type="text" class=" form-control form-control-sm" maxlength="500" id="RazonSocial" name="RazonSocial" required >
                    </div>
                    <div class="col-sm">
                        <label for="RFC">RFC*</label>  
                        <input type="text" class="form-control form-control-sm"  maxlength="15" id="RFC" name="RFC" required >
                    </div>
                </div>
                <div class="row">

                    <div class="col-sm">
                        <label for="Direccion">Dirección*</label>  
                        <input type="text" class="form-control form-control-sm"  maxlength="150"  id="Direccion" name="Direccion" required >
                    </div>
                    <div class="col-sm">
                        <label for="NoExt">Num. Ext*</label>  
                        <input type="text" class="form-control form-control-sm" maxlength="10"  id="NoExt" name="NoExt"  required>
                    </div>
                    <div class="col-sm">
                        <label for="NoInt">Num. Int.</label>  
                        <input type="text" class="form-control form-control-sm"  maxlength="10"  id="NoInt" name="NoInt"  >
                    </div>

                </div>
                <div class="row">

                    <div class="col-sm">
                        <label for="Colonia">Colonia</label>  
                        <input type="text" class="form-control form-control-sm"  maxlength="60"  id="Colonia" name="Colonia"  >
                    </div>
                    <div class="col-sm">
                        <label for="Ciudad">Ciudad</label>  
                        <input type="text" class="form-control form-control-sm"  maxlength="60"  id="Ciudad" name="Ciudad"  >
                    </div>
                    <div class="col-sm">
                        <label for="Estado">Estado</label>   
                        <select class="form-control form-control-sm "  id="Estado" name="Estado" required=""> 
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
                </div>
                <div class="row">
                    <div class="col-sm">
                        <label for="Pais">País</label>  
                        <input type="text" class="form-control form-control-sm"  maxlength="60"  id="Colonia" name="Colonia"  >
                    </div>
                    <div class="col-sm">
                        <label for="CP">Código Postal</label>  
                        <input type="text" class="form-control form-control-sm numbersOnly"  maxlength="8"  id="CP" name="CP"  >
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
                <!-- FOTO -->
                <div for="" align="center">
                    <br>
                    <h3>Puede subir un archivo PDF, imagen (JPG,GIF,PNG) etc.</h3>
                </div>
                <div class="col-md-12" align="center">
                    <input type="file" id="Foto" name="Foto" class="d-none">
                    <button type="button" class="btn btn-default" id="btnArchivo" name="btnArchivo">
                        <span class="fa fa-upload fa-1x"></span> SELECCIONA EL ARCHIVO
                    </button>
                    <br><hr>
                    <div id="VistaPrevia" class="col-md-12" align="center"></div>
                </div>
                <!-- FIN FOTO -->
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
                            <label for="Clave">Clave*</label>  
                            <input type="text" class=" form-control form-control-sm " maxlength="50" id="Clave" name="Clave" required >
                        </div>
                        <div class="col-sm">
                            <label for="RazonSocial">Razon Social*</label>  
                            <input type="text" class=" form-control form-control-sm" maxlength="500" id="RazonSocial" name="RazonSocial" required >
                        </div>
                        <div class="col-sm">
                            <label for="RFC">RFC*</label>  
                            <input type="text" class="form-control form-control-sm"  maxlength="15" id="RFC" name="RFC" required >
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-sm">
                            <label for="Direccion">Dirección*</label>  
                            <input type="text" class="form-control form-control-sm"  maxlength="150"  id="Direccion" name="Direccion" required >
                        </div>
                        <div class="col-sm">
                            <label for="NoExt">Num. Ext*</label>  
                            <input type="text" class="form-control form-control-sm" maxlength="10"  id="NoExt" name="NoExt"  required>
                        </div>
                        <div class="col-sm">
                            <label for="NoInt">Num. Int.</label>  
                            <input type="text" class="form-control form-control-sm"  maxlength="10"  id="NoInt" name="NoInt"  >
                        </div>

                    </div>
                    <div class="row">

                        <div class="col-sm">
                            <label for="Colonia">Colonia</label>  
                            <input type="text" class="form-control form-control-sm"  maxlength="60"  id="Colonia" name="Colonia"  >
                        </div>
                        <div class="col-sm">
                            <label for="Ciudad">Ciudad</label>  
                            <input type="text" class="form-control form-control-sm"  maxlength="60"  id="Ciudad" name="Ciudad"  >
                        </div>
                        <div class="col-sm">
                            <label for="Estado">Estado</label>   
                            <select class="form-control form-control-sm "  id="Estado" name="Estado" required=""> 
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
                    </div>
                    <div class="row">
                        <div class="col-sm">
                            <label for="Pais">País</label>  
                            <input type="text" class="form-control form-control-sm"  maxlength="60"  id="Colonia" name="Colonia"  >
                        </div>
                        <div class="col-sm">
                            <label for="CP">Código Postal</label>  
                            <input type="text" class="form-control form-control-sm numbersOnly"  maxlength="8"  id="CP" name="CP"  >
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

                    <!-- FOTO -->
                    <div for="" align="center">
                        <br>
                        <h3>Puede subir un archivo PDF, imagen (JPG,GIF,PNG) etc.</h3>
                    </div>
                    <div class="col-md-12" align="center">
                        <input type="file" id="Foto" name="Foto" class="d-none">
                        <button type="button" class="btn btn-default" id="btnArchivo" name="btnArchivo">
                            <span class="fa fa-upload fa-1x"></span> SELECCIONA EL ARCHIVO
                        </button>
                        <br><hr>
                        <div id="VistaPrevia" class="col-md-12" align="center"></div>
                    </div>
                    <!-- FIN FOTO -->
                </form>
            </div> 
        </div> 
    </div> 
</div>

<!--SCRIPT-->
<script>
    var master_url = base_url + 'index.php/Clientes/';
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

    /*DEFINIR VARIABLES PARA LA SELECCION DE ARCHIVOS*/
    var Archivo = pnlNuevo.find("#Foto");
    var btnArchivo = pnlNuevo.find("#btnArchivo");
    var VistaPrevia = pnlNuevo.find("#VistaPrevia");
    var ModificarArchivo = pnlEditar.find("#Foto");
    var btnModificarArchivo = pnlEditar.find("#btnArchivo");
    var ModificarVistaPrevia = pnlEditar.find("#VistaPrevia");

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
        /*FIN NUEVO ARCHIVO*/

        /*MODIFICAR ARCHIVO*/
        btnModificarArchivo.on("click", function () {
            ModificarArchivo.change(function () {
                var imageType = /image.*/;
                if (ModificarArchivo[0].files[0] !== undefined && ModificarArchivo[0].files[0].type.match(imageType)) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        var preview = '<button type="button" class="btn btn-default" id="btnQuitarVP" name="btnQuitarVP" onclick="onRemovePreview(this)"><span class="fa fa-times fa-2x danger-icon"></span></button><br><img src="' + reader.result + '" class="img-responsive" width="400px"><div class="caption"><p>' + ModificarArchivo[0].files[0].name + '</p></div>';
                        ModificarVistaPrevia.html(preview);
                    };
                    reader.readAsDataURL(ModificarArchivo[0].files[0]);
                } else {
                    if (ModificarArchivo[0].files[0] !== undefined && ModificarArchivo[0].files[0].type.match('application/pdf')) {
                        var readerpdf = new FileReader();
                        readerpdf.onload = function (e) {
                            ModificarVistaPrevia.html('<div><button type="button" class="btn btn-default" id="btnQuitarVP" name="btnQuitarVP" onclick="onRemovePreview(this)"><span class="fa fa-times fa-2x danger-icon"></span></button><br> <embed src="' + readerpdf.result + '" type="application/pdf" width="90%" height="800px"' +
                                    ' pluginspage="http://www.adobe.com/products/acrobat/readstep2.html"></div>');
                        };
                        readerpdf.readAsDataURL(ModificarArchivo[0].files[0]);
                    } else {
                        ModificarVistaPrevia.html('EL ARCHIVO SE SUBIRÁ, PERO NO ES POSIBLE RECONOCER SI ES UN PDF O UNA IMAGEN');
                    }
                }
            });
            ModificarArchivo.trigger('click');
        });
        /*FIN MODIFICAR ARCHIVO*/


        //Valida RFC
        pnlNuevo.find("#RFC").blur(function () {
            var rfc = $(this).val().trim(); // -Elimina los espacios que pueda tener antes o después
            var rfcCorrecto = rfcValido(rfc);   //Comprobar RFC

            if (rfcCorrecto) {
            } else {
                $("#RFC").val("");
            }
        });
        pnlEditar.find("#RFC").blur(function () {
            var rfc = $(this).val().trim(); // -Elimina los espacios que pueda tener antes o después
            var rfcCorrecto = rfcValido(rfc);   //Comprobar RFC

            if (rfcCorrecto) {
            } else {
                $("#RFC").val("");
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
            $(':input:text:enabled:visible:first').focus();
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
                $("#tblRegistros").html(getTable('tblClientes', data));
                $('#tblClientes tfoot th').each(function () {
                    $(this).html('');
                });
                var thead = $('#tblClientes thead th');
                var tfoot = $('#tblClientes tfoot th');
                thead.eq(0).addClass("d-none");
                tfoot.eq(0).addClass("d-none");
                $.each($.find('#tblClientes tbody tr'), function (k, v) {
                    var td = $(v).find("td");
                    td.eq(0).addClass("d-none");
                });


                var tblSelected = $('#tblClientes').DataTable(tableOptions);
                $('#tblClientes_filter input[type=search]').focus();

                $('#tblClientes tbody').on('click', 'tr', function () {

                    $("#tblClientes tbody tr").removeClass("success");
                    $(this).addClass("success");
                    var dtm = tblSelected.row(this).data();
                    temp = parseInt(dtm[0]);
                });

                $('#tblClientes tbody').on('dblclick', 'tr', function () {
                    $("#tblClientes tbody tr").removeClass("success");
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
                            var dtm = data[0];
                            pnlEditar.find("input").val("");
                            pnlEditar.find("select").val("").trigger('change');
                            $.each(data[0], function (k, v) {
                                if (k !== 'Foto') {
                                    pnlEditar.find("#" + k).val(v);
                                    pnlEditar.find("[name='" + k + "']").val(v).trigger('change');
                                }
                            });
                            /*COLOCAR FOTO*/
                            if (dtm.Foto !== null && dtm.Foto !== undefined && dtm.Foto !== '') {
                                var ext = getExt(dtm.Foto);
                                if (ext === "gif" || ext === "jpg" || ext === "png" || ext === "jpeg") {
                                    pnlEditar.find("#VistaPrevia").html('<div class="col-md-8"></div><div class="col-md-4"><button type="button" class="btn btn-default" id="btnQuitarVP" name="btnQuitarVP" onclick="onRemovePreview(this)"><span class="fa fa-times fa-2x danger-icon"></span></button><br></div><img id="trtImagen" src="' + base_url + dtm.Foto + '" class ="img-responsive" width="400px"  onclick="printImg(\' ' + base_url + dtm.Foto + ' \')"  />');
                                }
                                if (ext === "PDF" || ext === "Pdf" || ext === "pdf") {
                                    pnlEditar.find("#VistaPrevia").html('<div class="col-md-8"></div> <div class="col-md-4"><button type="button" class="btn btn-default" id="btnQuitarVP" name="btnQuitarVP" onclick="onRemovePreview(this)"><span class="fa fa-times fa-2x danger-icon"></span></button><br></div><embed src="' + base_url + dtm.Foto + '" type="application/pdf" width="90%" height="800px" pluginspage="http://www.adobe.com/products/acrobat/readstep2.html">');
                                }
                                if (ext !== "gif" && ext !== "jpg" && ext !== "jpeg" && ext !== "png" && ext !== "PDF" && ext !== "Pdf" && ext !== "pdf") {
                                    pnlEditar.find("#VistaPrevia").html('<h1>NO EXISTE ARCHIVO ADJUNTO</h1>');
                                }
                            } else {
                                pnlEditar.find("#VistaPrevia").html('<h3>NO EXISTE ARCHIVO ADJUNTO</h3>');
                            }
                            /*FIN COLOCAR FOTO*/
                            pnlTablero.addClass("d-none");
                            pnlEditar.removeClass('d-none');
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

