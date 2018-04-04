<div class="card " id="pnlTablero">
    <div class="card-body">
        <legend class="float-left">Gestión de Series</legend>
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
<div  class="container-fluid">
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
                        <input type="text" class="form-control form-control-sm" id="Clave" name="Clave" required >
                    </div>
                    <div class="col-sm">
                        <label for="PuntoInicial">Punto Inicial*</label>  
                        <input type="number" class="form-control form-control-sm" id="PuntoInicial" name="PuntoInicial" required >
                    </div>
                    <div class="col-sm">
                        <label for="PuntoFinal">Punto Final*</label>  
                        <input type="number"  class="form-control form-control-sm" id="PuntoFinal" name="PuntoFinal" required >
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="MediosPuntos" checked="">
                            <label class="custom-control-label" for="MediosPuntos">Medios Puntos</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <br>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="row">
                            <div class="col-md-2">&nbsp;&nbsp;&nbsp;1<br>
                                <input type="text" style="width: 56.3px;" class="numbersOnly"   name="T1"></div>
                            <div class="col-md-2">&nbsp;&nbsp;&nbsp;2<br>
                                <input type="text" style="width: 56.3px;" class="numbersOnly"   name="T2"></div>
                            <div class="col-md-2">&nbsp;&nbsp;&nbsp;3<br>
                                <input type="text" style="width: 56.3px;" class="numbersOnly"   name="T3"></div>
                            <div class="col-md-2">&nbsp;&nbsp;&nbsp;4<br>
                                <input type="text" style="width: 56.3px;" class="numbersOnly"   name="T4"></div>
                            <div class="col-md-2">&nbsp;&nbsp;&nbsp;5<br>
                                <input type="text" style="width: 56.3px;" class="numbersOnly"   name="T5"></div>
                            <div class="col-md-2">&nbsp;&nbsp;&nbsp;6<br>
                                <input type="text" style="width: 56.3px;" class="numbersOnly"   name="T6"></div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="row">
                            <div class="col-md-2">&nbsp;&nbsp;&nbsp;7<br>
                                <input type="text" style="width: 56.3px;" class="numbersOnly"   name="T7"></div>
                            <div class="col-md-2">&nbsp;&nbsp;&nbsp;8<br>
                                <input type="text" style="width: 56.3px;" class="numbersOnly"   name="T8"></div>
                            <div class="col-md-2">&nbsp;9<br>
                                <input type="text" style="width: 56.3px;" class="numbersOnly"   name="T9"></div>
                            <div class="col-md-2">&nbsp;10<br>
                                <input type="text" style="width: 56.3px;" class="numbersOnly"   name="T10"></div>
                            <div class="col-md-2">&nbsp;11<br>
                                <input type="text" style="width: 56.3px;" class="numbersOnly"   name="T11"></div>
                            <div class="col-md-2">&nbsp;12<br>
                                <input type="text" style="width: 56.3px;" class="numbersOnly"   name="T12"></div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="row">
                            <div class="col-md-2">&nbsp;13<br>
                                <input type="text" style="width: 56.3px;" class="numbersOnly"   name="T13"></div>
                            <div class="col-md-2">&nbsp;14<br>
                                <input type="text" style="width: 56.3px;" class="numbersOnly"   name="T14"></div>
                            <div class="col-md-2">&nbsp;15<br>
                                <input type="text" style="width: 56.3px;" class="numbersOnly"   name="T15"></div>
                            <div class="col-md-2">&nbsp;16<br>
                                <input type="text" style="width: 56.3px;" class="numbersOnly"   name="T16"></div>
                            <div class="col-md-2">&nbsp;17<br>
                                <input type="text" style="width: 56.3px;" class="numbersOnly"   name="T17"></div>
                            <div class="col-md-2">&nbsp;18<br>
                                <input type="text" style="width: 56.3px;" class="numbersOnly"   name="T18"></div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="row">
                            <div class="col-md-2">&nbsp;19<br>
                                <input type="text" style="width: 56.3px;" class="numbersOnly"   name="T19"></div>
                            <div class="col-md-2">&nbsp;20<br>
                                <input type="text" style="width: 56.3px;" class="numbersOnly"   name="T20"></div>
                            <div class="col-md-2">&nbsp;21<br>
                                <input type="text" style="width: 56.3px;" class="numbersOnly"   name="T21"></div>
                            <div class="col-md-2">&nbsp;22<br>
                                <input type="text" style="width: 56.3px;" class="numbersOnly"   name="T22"></div>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm">
                        <label for="Estatus">Estatus*</label>
                        <select class="form-control form-control-sm "  name="Estatus"> 
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
<div  class="container-fluid">
    <div class="card border-0  d-none" id="pnlEditar">
        <div class="card-body text-dark"> 
            <div class="card-body text-dark"> 
                <form id="frmEditar">
                    <div class="row">
                        <div class="col-md-2 float-left">
                            <legend class="float-left">Editar</legend>
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
                            <input type="text" class="form-control form-control-sm" id="Clave" name="Clave" required >
                        </div>
                        <div class="col-sm">
                            <label for="PuntoInicial">Punto Inicial*</label>  
                            <input type="number" class="form-control form-control-sm" id="PuntoInicial" name="PuntoInicial" required >
                        </div>
                        <div class="col-sm">
                            <label for="PuntoFinal">Punto Final*</label>  
                            <input type="number" class="form-control form-control-sm" id="PuntoFinal" name="PuntoFinal" required >
                        </div>
                    </div>

                    <div class="row">
                        <br>
                    </div>

                    <div class="row disabledForms">
                        <div class="col-sm-3">
                            <div class="row">
                                <div class="col-md-2">&nbsp;&nbsp;&nbsp;1<br>
                                    <input type="text" style="width: 56.3px;" class="numbersOnly"   name="T1"></div>
                                <div class="col-md-2">&nbsp;&nbsp;&nbsp;2<br>
                                    <input type="text" style="width: 56.3px;" class="numbersOnly"   name="T2"></div>
                                <div class="col-md-2">&nbsp;&nbsp;&nbsp;3<br>
                                    <input type="text" style="width: 56.3px;" class="numbersOnly"   name="T3"></div>
                                <div class="col-md-2">&nbsp;&nbsp;&nbsp;4<br>
                                    <input type="text" style="width: 56.3px;" class="numbersOnly"   name="T4"></div>
                                <div class="col-md-2">&nbsp;&nbsp;&nbsp;5<br>
                                    <input type="text" style="width: 56.3px;" class="numbersOnly"   name="T5"></div>
                                <div class="col-md-2">&nbsp;&nbsp;&nbsp;6<br>
                                    <input type="text" style="width: 56.3px;" class="numbersOnly"   name="T6"></div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="row">
                                <div class="col-md-2">&nbsp;&nbsp;&nbsp;7<br>
                                    <input type="text" style="width: 56.3px;" class="numbersOnly"   name="T7"></div>
                                <div class="col-md-2">&nbsp;&nbsp;&nbsp;8<br>
                                    <input type="text" style="width: 56.3px;" class="numbersOnly"   name="T8"></div>
                                <div class="col-md-2">&nbsp;9<br>
                                    <input type="text" style="width: 56.3px;" class="numbersOnly"   name="T9"></div>
                                <div class="col-md-2">&nbsp;10<br>
                                    <input type="text" style="width: 56.3px;" class="numbersOnly"   name="T10"></div>
                                <div class="col-md-2">&nbsp;11<br>
                                    <input type="text" style="width: 56.3px;" class="numbersOnly"   name="T11"></div>
                                <div class="col-md-2">&nbsp;12<br>
                                    <input type="text" style="width: 56.3px;" class="numbersOnly"   name="T12"></div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="row">
                                <div class="col-md-2">&nbsp;13<br>
                                    <input type="text" style="width: 56.3px;" class="numbersOnly"   name="T13"></div>
                                <div class="col-md-2">&nbsp;14<br>
                                    <input type="text" style="width: 56.3px;" class="numbersOnly"   name="T14"></div>
                                <div class="col-md-2">&nbsp;15<br>
                                    <input type="text" style="width: 56.3px;" class="numbersOnly"   name="T15"></div>
                                <div class="col-md-2">&nbsp;16<br>
                                    <input type="text" style="width: 56.3px;" class="numbersOnly"   name="T16"></div>
                                <div class="col-md-2">&nbsp;17<br>
                                    <input type="text" style="width: 56.3px;" class="numbersOnly"   name="T17"></div>
                                <div class="col-md-2">&nbsp;18<br>
                                    <input type="text" style="width: 56.3px;" class="numbersOnly"   name="T18"></div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="row">
                                <div class="col-md-2">&nbsp;19<br>
                                    <input type="text" style="width: 56.3px;" class="numbersOnly"   name="T19"></div>
                                <div class="col-md-2">&nbsp;20<br>
                                    <input type="text" style="width: 56.3px;" class="numbersOnly"   name="T20"></div>
                                <div class="col-md-2">&nbsp;21<br>
                                    <input type="text" style="width: 56.3px;" class="numbersOnly"   name="T21"></div>
                                <div class="col-md-2">&nbsp;22<br>
                                    <input type="text" style="width: 56.3px;" class="numbersOnly"   name="T22"></div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm">
                            <label for="Estatus">Estatus*</label>
                            <select class="form-control form-control-sm " id="Estatus" name="Estatus"> 
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
    var master_url = base_url + 'index.php/Series/';
    var pnlNuevo = $("#pnlNuevo");
    var pnlTablero = $("#pnlTablero");
    var pnlDetalle = $("#pnlDetalle");
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
    var tempDetalle = 0;
    var guardar = false;

    $(document).ready(function () {
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
                    Clave: 'required',
                    Estatus: 'required'
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
                /*REMOVER EL INPUT ACTIVO*/
                $.each(pnlDetalle.find('#tblRegistrosDetalle tbody tr'), function (k, v) {
                    var cell = $(this).find("td").eq(3);
                    if (cell.find("#Cantidad").val() === '') {
                        cell.html(0);
                    } else {
                        cell.html(cell.find("#Cantidad").val());
                    }
                });


                var f = new FormData(pnlEditar.find("#frmEditar")[0]);
                console.log(pnlEditar.find('table tbody tr'));
                var tallas = [];
                pnlDetalle.find('#tblRegistrosDetalle > tbody  > tr').each(function (k, v) {
                    var row = $(this).find("td");
                    var material = {
                        ID: row.eq(0).text().replace(/\s+/g, ''),
                        Serie_ID: row.eq(1).text().replace(/\s+/g, ''),
                        Talla: row.eq(2).text().replace(/\s+/g, '')
                    };
                    tallas.push(material);
                });
                f.append('Tallas', JSON.stringify(tallas));
                $.ajax({
                    url: master_url + 'onModificar',
                    type: "POST",
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: f
                }).done(function (data, x, jq) {
                    onNotify('<span class="fa fa-check fa-lg"></span>', 'SE HA MODIFICADO EL REGISTRO', 'success');
                    btnRefrescar.trigger('click');
                    pnlEditar.addClass('d-none');
                    pnlDetalle.addClass('d-none');
                    pnlTablero.removeClass('d-none');
                }).fail(function (x, y, z) {
                    console.log(x, y, z);
                }).always(function () {
                    HoldOn.close();
                });
            }
        });


        pnlNuevo.find('#PuntoFinal').keydown(function (e) {
            if (e.keyCode === 13) {
                //Borramos los datos para evitar errores
                var contReset = 1;
                while (contReset <= 22) {
                    pnlNuevo.find("[name='T" + contReset + "']").val("");
                    contReset++;
                }

                var incremento = parseFloat(pnlNuevo.find('#PuntoInicial').val());
                //Se valida que no sea mas granda la talla inicial que la final
                if (parseFloat(pnlNuevo.find('#PuntoFinal').val()) > parseFloat(pnlNuevo.find('#PuntoInicial').val())) {

                    var cont = 1;
                    //Validamos si las tallas son con medios o sin medios puntos
                    if ($('#MediosPuntos').is(":checked"))
                    {
                        //Crear las tallas
                        while (incremento <= parseFloat(pnlNuevo.find('#PuntoFinal').val())) {
                            pnlNuevo.find("[name='T" + cont + "']").val(incremento);
                            incremento = incremento + 0.5;
                            cont++;
                        }

                    } else {
                        //Crear las tallas
                        while (incremento <= parseFloat(pnlNuevo.find('#PuntoFinal').val())) {
                            pnlNuevo.find("[name='T" + cont + "']").val(incremento);
                            incremento = incremento + 1;
                            cont++;
                        }
                    }
                    guardar = true;

                } else {
                    guardar = false;
                    onNotify('<span class="fa fa-exclamation fa-lg"></span>', 'EL PUNTO INICIAL NO DEBE SER MAYOR AL PUNTO FINAL', 'danger');
                }
            }

        });

        btnGuardar.click(function () {
            if (guardar) {
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
                        Clave: 'required',
                        Estatus: 'required'
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

                        //Regresar al tablero
                        pnlNuevo.addClass('d-none');
                        pnlTablero.removeClass('d-none');
                        getRecords();
                        onNotify('<span class="fa fa-check fa-lg"></span>', 'SE HA AÑADIDO UN NUEVO REGISTRO', 'success');
                    }).fail(function (x, y, z) {
                        console.log(x, y, z);
                    }).always(function () {
                    });

                }
            } else {
                onNotify('<span class="fa fa-exclamation fa-lg"></span>', 'EL PUNTO INICIAL NO DEBE SER MAYOR AL PUNTO FINAL', 'danger');
            }



        });
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
            pnlDetalle.addClass('d-none');
            pnlTablero.removeClass("d-none");
        });
        getRecords();
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
                $("#tblRegistros").html(getTable('tblSeries', data));
                $('#tblSeries tfoot th').each(function () {
                    $(this).html('');
                });
                var thead = $('#tblSeries thead th');
                var tfoot = $('#tblSeries tfoot th');
                thead.eq(0).addClass("d-none");
                tfoot.eq(0).addClass("d-none");
                $.each($.find('#tblSeries tbody tr'), function (k, v) {
                    var td = $(v).find("td");
                    td.eq(0).addClass("d-none");
                });
                var tblSelected = $('#tblSeries').DataTable(tableOptions);
                $('#tblSeries_filter input[type=search]').focus();
                $('#tblSeries tbody').on('click', 'tr', function () {

                    $("#tblSeries tbody tr").removeClass("success");
                    $(this).addClass("success");
                    var dtm = tblSelected.row(this).data();
                    temp = parseInt(dtm[0]);
                });
                $('#tblSeries tbody').on('dblclick', 'tr', function () {
                    $("#tblSeries tbody tr").removeClass("success");
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
                            url: master_url + 'getSerieByID',
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
                                pnlEditar.find("#" + k).val(v).trigger('change');
                            });
                            pnlTablero.addClass("d-none");
                            pnlEditar.removeClass('d-none');
                            pnlDetalle.removeClass('d-none');
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

            } else {


            }

        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }

</script>