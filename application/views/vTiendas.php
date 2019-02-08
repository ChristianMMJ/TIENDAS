<div class="card border-0" id="pnlTablero">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-3 float-left">
                <legend class="float-left">Gestión de Tiendas</legend>
            </div>
            <div class="col-sm-3 float-left">
                <?php
                if (in_array($this->session->userdata["Tipo"], array("SISTEMAS", "ADMINISTRADOR"))) {
                    ?>
                    <label for="EmpresaT">Empresas*</label>
                    <select class="form-control form-control-sm required"  id="EmpresaT">
                        <option value=""></option>
                        <option value="TODAS">TODAS</option>
                    </select>
                <?php } ?>
            </div>
            <div class="col-sm-6 float-right" align="right">
                <?php
                if (in_array($this->session->userdata["Tipo"], array("SISTEMAS", "ADMINISTRADOR"))) {
                    ?>
                    <button type="button" class="btn btn-primary" id="btnNuevo" data-toggle="tooltip" data-placement="left" title="Agregar"><span class="fa fa-plus"></span><br></button>
                <?php } ?>
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
                        <legend class="float-left">Tiendas</legend>
                    </div>
                    <div class="col-md-7 float-right">
                    </div>
                    <div class="col-md-3 float-right" align="right">
                        <button type="button" class="btn btn-secondary btn-sm" id="btnCancelar"><span class="fa fa-arrow-left"></span> REGRESAR </button>
                        <button type="button" class="btn btn-primary btn-sm" id="btnGuardar"><span class="fa fa-save "></span> GUARDAR</button>
                    </div>
                </div>
                <div class="row">
                    <div class="d-none">
                        <input type="text" class="" id="ID" name="ID"  >
                    </div>
                    <div class="col-sm-2">
                        <label for="Clave">Clave*</label>
                        <input type="text" class="form-control form-control-sm" maxlength="35" id="Clave" name="Clave" required >
                    </div>
                    <div class="col-sm-4">
                        <label for="RazonSocial">Razon Social*</label>
                        <input type="text" class="form-control form-control-sm" maxlength="200" id="RazonSocial" name="RazonSocial" required >
                    </div>
                    <div class="col-sm-3">
                        <label for="RFC">RFC*</label>
                        <input type="text" class="form-control form-control-sm"  maxlength="15" id="RFC" name="RFC" required >
                    </div>
                    <div class="col-sm-3">
                        <label for="Direccion">Dirección</label>
                        <input type="text" class="form-control form-control-sm"  maxlength="150"  id="Direccion" name="Direccion" required >
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <label for="NoExt">Num. Ext*</label>
                        <input type="text" class="form-control form-control-sm" maxlength="10"  id="NoExt" name="NoExt" required >
                    </div>
                    <div class="col-sm">
                        <label for="NoInt">Num. Int.*</label>
                        <input type="text" class="form-control form-control-sm"  maxlength="10"  id="NoInt" name="NoInt"  >
                    </div>
                    <div class="col-sm">
                        <label for="Colonia">Colonia</label>
                        <input type="text" class="form-control form-control-sm"  maxlength="60"  id="Colonia" name="Colonia"  >
                    </div>
                    <div class="col-sm">
                        <label for="Ciudad">Ciudad</label>
                        <input type="text" class="form-control form-control-sm"  maxlength="60"  id="Ciudad" name="Ciudad"  >
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <label for="Estado">Estado</label>
                        <select class="form-control form-control-sm required"  id="Estado" name="Estado" required="">
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
                    <div class="col-sm-3">
                        <label for="CP">Código Postal</label>
                        <input type="text" class="form-control form-control-sm numbersOnly"  maxlength="8"  id="CP" name="CP"  >
                    </div>
                    <div class="col-sm-3">
                        <label for="Telefono">Teléfono</label>
                        <input type="tel" class="form-control form-control-sm"  maxlength="15"  id="Telefono" name="Telefono"  >
                    </div>
                    <div class="col-sm-3">
                        <label for="Empresa">Zona*</label>
                        <select class="form-control form-control-sm required"  name="Zona" required="">
                            <option value=""></option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <label for="PorMen">Menudeo</label>
                        <input type="text" class="form-control form-control-sm numbersOnly" required="" maxlength="4" name="PorMen"  >
                    </div>
                    <div class="col-sm-3">
                        <label for="PorMay">Mayoreo</label>
                        <input type="text" class="form-control form-control-sm numbersOnly" required=""  maxlength="4" name="PorMay"  >
                    </div>
                    <div class="col-sm-3">
                        <label for="Empresa">Empresa*</label>
                        <select class="form-control form-control-sm required"  name="Empresa" required="">
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <label for="Estatus">Estatus*</label>
                        <select class="form-control form-control-sm required"  name="Estatus" required="">
                            <option value=""></option>
                            <option>ACTIVO</option>
                            <option>INACTIVO</option>
                        </select>
                    </div>
                </div>
                <!-- FOTO -->
                <div for="" align="center">
                    <br>
                    <h3>Puede subir una imagen (JPG,GIF,PNG) etc.</h3>
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
<!--SCRIPT-->
<script>
    var master_url = base_url + 'index.php/Tiendas/';
    var pnlDatos = $("#pnlDatos");
    var pnlTablero = $("#pnlTablero");
    var btnNuevo = $("#btnNuevo");
    var btnGuardar = pnlDatos.find("#btnGuardar");
    var btnCancelar = pnlDatos.find("#btnCancelar");
    /*DEFINIR VARIABLES PARA LA SELECCION DE ARCHIVOS*/
    var Archivo = pnlDatos.find("#Foto");
    var btnArchivo = pnlDatos.find("#btnArchivo");
    var VistaPrevia = pnlDatos.find("#VistaPrevia");
    var nuevo = true;
    $(document).ready(function () {
        pnlTablero.find("#EmpresaT").change(function () {
            getRecords();
        });
        /*NUEVO ARCHIVO*/
        btnArchivo.on("click", function () {
            $('#Foto').attr("type", "file");
            $('#Foto').val('');
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
        //Valida RFC
        pnlDatos.find("#RFC").blur(function () {
            var rfc = $(this).val().trim(); // -Elimina los espacios que pueda tener antes o después
            var rfcCorrecto = rfcValido(rfc);   //Comprobar RFC
            if (rfcCorrecto) {
            } else {
                $("#RFC").val("");
            }
        });
        btnGuardar.click(function () {
            isValid('pnlDatos');
            if (valido) {
                var frm = new FormData(pnlDatos.find("#frmNuevo")[0]);
                if (!nuevo) {
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
                        onNotify('<span class="fa fa-check fa-lg"></span>', 'SE HA AÑADIDO UN NUEVO REGISTRO', 'success');
                        pnlDatos.find('#ID').val(data);
                        nuevo = false;
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
        getEmpresas();
        getZonas();
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
            dataType: "JSON",
            data: {
                Empresa: pnlTablero.find("#EmpresaT").val()
            }
        }).done(function (data, x, jq) {
            if (data.length > 0) {
                $("#tblRegistros").html(getTable('tblTiendas', data));
                $('#tblTiendas tfoot th').each(function () {
                    $(this).html('');
                });
                var thead = $('#tblTiendas thead th');
                var tfoot = $('#tblTiendas tfoot th');
                thead.eq(0).addClass("d-none");
                tfoot.eq(0).addClass("d-none");
                $.each($.find('#tblTiendas tbody tr'), function (k, v) {
                    var td = $(v).find("td");
                    td.eq(0).addClass("d-none");
                });
                var tblSelected = $('#tblTiendas').DataTable(tableOptions);
                $('#tblTiendas_filter input[type=search]').focus();

                $('#tblTiendas tbody').on('click', 'tr', function () {
                    $("#tblTiendas tbody tr").removeClass("success");
                    $(this).addClass("success");
                    var id = this.id;
                    var index = $.inArray(id, selected);
                    if (index === -1) {
                        selected.push(id);
                    } else {
                        selected.splice(index, 1);
                    }
                    var dtm = tblSelected.row(this).data();
                    temp = parseInt(dtm[0]);
                    if (temp !== 0 && temp !== undefined && temp > 0) {
                        nuevo = false;
                        HoldOn.open({
                            theme: "sk-bounce",
                            message: "CARGANDO DATOS..."
                        });
                        $.ajax({
                            url: master_url + 'getTiendaByID',
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
                            $.each(data[0], function (k, v) {
                                if (k !== 'Foto') {
                                    pnlDatos.find("[name='" + k + "']").val(v);
                                    if (pnlDatos.find("[name='" + k + "']").is('select')) {
                                        pnlDatos.find("[name='" + k + "']")[0].selectize.setValue(v);
                                    }
                                }
                            });
                            /*COLOCAR FOTO*/
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
                                pnlDatos.find("#VistaPrevia").html('<h3>NO EXISTE ARCHIVO ADJUNTO</h3>');
                            }
                            /*FIN COLOCAR FOTO*/
                            pnlTablero.addClass("d-none");
                            pnlDatos.removeClass('d-none');
                            $(':input:text:enabled:visible:first').focus();
                        }).fail(function (x, y, z) {
                            console.log(x, y, z);
                        }).always(function () {
                            HoldOn.close();
                        });
                    } else {
                        swal('ATENCIÓN', 'DEBE DE ELEGIR UN REGISTRO','warning');
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
                $("#tblRegistros").html();
            }

        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }
    function getEmpresas() {
        HoldOn.open({theme: 'sk-bounce', message: 'ESPERE...'});
        $.ajax({
            url: master_url + 'getEmpresas',
            type: "POST",
            dataType: "JSON"
        }).done(function (data, x, jq) {
            $.each(data, function (k, v) {
                pnlDatos.find("[name='Empresa']")[0].selectize.addOption({text: v.Empresa, value: v.ID});
                pnlTablero.find("#EmpresaT")[0].selectize.addOption({text: v.Empresa, value: v.ID});
            });
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }
    function getZonas() {
        HoldOn.open({theme: 'sk-bounce', message: 'ESPERE...'});
        $.ajax({
            url: master_url + 'getZonas',
            type: "POST",
            dataType: "JSON"
        }).done(function (data, x, jq) {
            $.each(data, function (k, v) {
                pnlDatos.find("[name='Zona']")[0].selectize.addOption({text: v.SValue, value: v.ID});
            });
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }
    function onRemovePreview(e) {
        $(e).parent().parent("#VistaPrevia").html("");
        $('#Foto').attr("type", "text");
        $('#Foto').val('N');
    }
</script>