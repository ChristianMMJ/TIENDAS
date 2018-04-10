<div class="card " id="pnlTablero">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6 float-left">
                <legend class="float-left">Gestión de Compras</legend>
            </div>
            <div class="col-sm-6 float-right" align="right">
                <button type="button" class="btn btn-primary" id="btnNuevo"><span class="fa fa-plus"></span><br>AGREGAR</button>
            </div>
        </div>
        <div class="card-block">
            <div id="tblRegistros"></div>
        </div>
    </div>
</div>
<!--GUARDAR-->
<div class="container-fluid d-none" id="pnlDatos">
    <br>
    <div class="card border-dark">
        <div class="card-header ">
            <div class="row">
                <div class="col-md-8 float-left">
                    <strong>Compras</strong>
                </div>
                <div class="col-md-2 float-right">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="AfecInv" checked="">
                        <label class="custom-control-label" for="AfecInv">Afecta Inv. Tienda</label>
                    </div>
                </div>
                <div class="col-md-2 float-right" align="right">
                    <button type="button" class="btn btn-default" id="btnCancelar">CANCELAR</button>
                    <button type="button" class="btn btn-primary" id="btnGuardar">GUARDAR</button>
                </div>
            </div>
        </div>
        <div class="card-body text-dark"> 
            <form id="frmNuevo">
                <div class="row">
                    <div class="d-none">
                        <input type="text" class="" id="ID" name="ID"  >
                    </div>
                    <div class="col-sm-4">
                        <label for="Tienda">Tienda*</label>
                        <select class="form-control form-control-sm required"  name="Tienda"> 
                            <option value=""></option>  
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <label for="Proveedor">Proveedor*</label>
                        <select class="form-control form-control-sm required"  name="Proveedor"> 
                            <option value=""></option>  
                        </select>
                    </div>
                    <div class="col-sm-1">
                        <label for="TipoDoc">Tipo*</label>  
                        <input type="text" class="form-control form-control-sm numbersOnly" maxlength="1" name="TipoDoc" required >
                    </div>
                    <div class="col-sm-2">
                        <label for="FechaMov">Fecha Mov.</label>  
                        <input type="text" class="form-control form-control-sm required" id="FechaMov" name="FechaMov"  placeholder="XX/XX/XXXX" data-provide="datepicker" data-date-format="dd/mm/yyyy" readonly="">
                    </div>
                    <div class="col-sm-2">
                        <label for="DocMov">Docto.*</label>  
                        <input type="text" class="form-control form-control-sm numbersOnly " maxlength="10" name="DocMov" required >
                    </div>
                </div>
            </form>
        </div> 
    </div> 
    <br>
</div>
<!--DETALLE-->
<div id="pnlDatosDetalle" class="container-fluid d-none">
    <br>
    <div class="card border-dark">
        <div class="card-header">
            <strong>Detalle de la Compra</strong>
        </div>
        <div class="card-body text-dark"> 
            <div class="row">
                <div class="col-sm-4">
                    <label for="Estilo">Estilo*</label>
                    <select class="form-control form-control-sm "  name="Estilo" required=""> 
                        <option value=""></option>  
                    </select>
                </div>
                <div class="col-sm-3">
                    <label for="Combinacion">Color*</label>
                    <select class="form-control form-control-sm "  name="Combinacion" required=""> 
                        <option value=""></option>  
                    </select>
                </div>
                <div class="col-sm-1">
                    <label for="PrecioMov">Costo*</label>  
                    <input type="text" class="form-control form-control-sm numbersOnly" maxlength="9" name="PrecioMov" required >
                </div>
                <div class="col-sm-1">
                    <label for="Clave">% Vta Men.</label> 
                    <input type="text" class="form-control form-control-sm numbersOnly disabledForms" disabled="" id="" name=""  >
                </div>
                <div class="col-sm-1">
                    <label for="Clave">% Vta May.</label> 
                    <input type="text" class="form-control form-control-sm numbersOnly disabledForms" disabled="" id="" name=""  >
                </div>
                <div class="col-sm-1">
                    <label for="Menudeo">Menudeo</label>  
                    <input type="text" class="form-control form-control-sm numbersOnly" name="Menudeo" required disabled="">
                </div>
                <div class="col-sm-1">
                    <label for="Mayoreo">Mayoreo</label>  
                    <input type="text" class="form-control form-control-sm numbersOnly" name="Mayoreo" required disabled="">
                </div>
            </div> 

            <label for="Mayoreo">Tallas</label> 
            <div class="" style="width: 1200px;" id="dSerieEncabezado">
                <input type="text" style="width: 45px;" class="numbersOnly" disabled="" name="T1">
                <input type="text" style="width: 45px;" class="numbersOnly" disabled="" name="T2">
                <input type="text" style="width: 45px;" class="numbersOnly" disabled="" name="T3">
                <input type="text" style="width: 45px;" class="numbersOnly" disabled="" name="T4">
                <input type="text" style="width: 45px;" class="numbersOnly" disabled="" name="T5">
                <input type="text" style="width: 45px;" class="numbersOnly" disabled="" name="T6">
                <input type="text" style="width: 45px;" class="numbersOnly" disabled="" name="T7">
                <input type="text" style="width: 45px;" class="numbersOnly" disabled="" name="T8">
                <input type="text" style="width: 45px;" class="numbersOnly" disabled="" name="T9">
                <input type="text" style="width: 45px;" class="numbersOnly" disabled="" name="T10">
                <input type="text" style="width: 45px;" class="numbersOnly" disabled="" name="T11">
                <input type="text" style="width: 45px;" class="numbersOnly" disabled="" name="T12">
                <input type="text" style="width: 45px;" class="numbersOnly" disabled="" name="T13">
                <input type="text" style="width: 45px;" class="numbersOnly" disabled="" name="T14">
                <input type="text" style="width: 45px;" class="numbersOnly" disabled="" name="T15">
                <input type="text" style="width: 45px;" class="numbersOnly" disabled="" name="T16">
                <input type="text" style="width: 45px;" class="numbersOnly" disabled="" name="T17">
                <input type="text" style="width: 45px;" class="numbersOnly" disabled="" name="T18">
                <input type="text" style="width: 45px;" class="numbersOnly" disabled="" name="T19">
                <input type="text" style="width: 45px;" class="numbersOnly" disabled="" name="T20">
                <input type="text" style="width: 45px;" class="numbersOnly" disabled="" name="T21">
                <input type="text" style="width: 45px;" class="numbersOnly" disabled="" name="T22">
                &nbsp;
                Pares:
            </div>
            <div class=" " style="width: 1200px;" id="dSerieEncabezadoE">
                <input type="text" style="width: 45px;" class="numbersOnly" maxlength="3"  name="T1">
                <input type="text" style="width: 45px;" class="numbersOnly" maxlength="3"  name="T1">
                <input type="text" style="width: 45px;" class="numbersOnly" maxlength="3"  name="T1">
                <input type="text" style="width: 45px;" class="numbersOnly" maxlength="3"  name="T1">
                <input type="text" style="width: 45px;" class="numbersOnly" maxlength="3"  name="T1">
                <input type="text" style="width: 45px;" class="numbersOnly" maxlength="3"  name="T1">
                <input type="text" style="width: 45px;" class="numbersOnly" maxlength="3"  name="T1">
                <input type="text" style="width: 45px;" class="numbersOnly" maxlength="3"  name="T1">
                <input type="text" style="width: 45px;" class="numbersOnly" maxlength="3"  name="T1">
                <input type="text" style="width: 45px;" class="numbersOnly" maxlength="3"  name="T1">
                <input type="text" style="width: 45px;" class="numbersOnly" maxlength="3"  name="T1">
                <input type="text" style="width: 45px;" class="numbersOnly" maxlength="3"  name="T1">
                <input type="text" style="width: 45px;" class="numbersOnly" maxlength="3"  name="T1">
                <input type="text" style="width: 45px;" class="numbersOnly" maxlength="3"  name="T1">
                <input type="text" style="width: 45px;" class="numbersOnly" maxlength="3"  name="T1">
                <input type="text" style="width: 45px;" class="numbersOnly" maxlength="3"  name="T1">
                <input type="text" style="width: 45px;" class="numbersOnly" maxlength="3"  name="T1">
                <input type="text" style="width: 45px;" class="numbersOnly" maxlength="3"  name="T1">
                <input type="text" style="width: 45px;" class="numbersOnly" maxlength="3"  name="T1">
                <input type="text" style="width: 45px;" class="numbersOnly" maxlength="3"  name="T1">
                <input type="text" style="width: 45px;" class="numbersOnly" maxlength="3"  name="T1">
                <input type="text" style="width: 45px;" class="numbersOnly" maxlength="3"  name="T1">
                &nbsp;
                <input type="text" style="width: 55px;" maxlength="4" class="numbersOnly" disabled=""  name="TPares">
            </div>
        </div>
    </div>
</div>
<!--SCRIPT-->
<script>
    var master_url = base_url + 'index.php/Compras/';
    var pnlDatos = $("#pnlDatos");
    var pnlDatosDetalle = $("#pnlDatosDetalle");
    var pnlTablero = $("#pnlTablero");
    var btnNuevo = $("#btnNuevo");
    var btnGuardar = pnlDatos.find("#btnGuardar");
    var btnCancelar = pnlDatos.find("#btnCancelar");

    var currentDate = new Date();
    var nuevo = true;
    $(document).ready(function () {
        pnlDatos.find("[name='Estilo']").change(function () {
            getCombinacionesXEstilo($(this).val());
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
                        getRecords();
                    }).fail(function (x, y, z) {
                        console.log(x, y, z);
                    }).always(function () {
                        HoldOn.close();
                    });
                }
            } else {
                onNotify('<span class="fa fa-times fa-lg"></span>', '* DEBE DE COMPLETAR LOS CAMPOS REQUERIDOS *', 'danger');
            }
        });
        btnNuevo.click(function () {
            pnlTablero.addClass("d-none");
            pnlDatos.removeClass('d-none');
            pnlDatosDetalle.removeClass('d-none');
            pnlDatos.find("input").val("");
            pnlDatos.find("#FechaMov").datepicker("setDate", currentDate);
            $.each(pnlDatos.find("select"), function (k, v) {
                pnlDatos.find("select")[k].selectize.clear(true);
            });
            $(':input:text:enabled:visible:first').focus();
            nuevo = true;
        });
        btnCancelar.click(function () {
            pnlTablero.removeClass("d-none");
            pnlDatos.addClass('d-none');
            pnlDatosDetalle.addClass('d-none');
            nuevo = true;
        });
        getRecords();
        getEstilos();
        getTiendas();
        getProveedores();
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
                $("#tblRegistros").html(getTable('tblCompras', data));
                $('#tblCompras tfoot th').each(function () {
                    $(this).html('');
                });
                var thead = $('#tblCompras thead th');
                var tfoot = $('#tblCompras tfoot th');
                thead.eq(0).addClass("d-none");
                tfoot.eq(0).addClass("d-none");
                $.each($.find('#tblCompras tbody tr'), function (k, v) {
                    var td = $(v).find("td");
                    td.eq(0).addClass("d-none");
                });
                var tblSelected = $('#tblCompras').DataTable(tableOptions);
                $('#tblCompras_filter input[type=search]').focus();

                $('#tblCompras tbody').on('click', 'tr', function () {

                    $("#tblCompras tbody tr").removeClass("success");
                    $(this).addClass("success");
                    var dtm = tblSelected.row(this).data();
                    temp = parseInt(dtm[0]);
                });

                $('#tblCompras tbody').on('dblclick', 'tr', function () {
                    $("#tblCompras tbody tr").removeClass("success");
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
                            url: master_url + 'getCompraByID',
                            type: "POST",
                            dataType: "JSON",
                            data: {
                                ID: temp
                            }
                        }).done(function (data, x, jq) {
                            pnlDatos.find("input").val("");
                            $.each(pnlDatos.find("select"), function (k, v) {
                                pnlDatos.find("select")[k].selectize.clear(true);
                            });
                            $.each(data[0], function (k, v) {
                                pnlDatos.find("[name='" + k + "']").val(v);
                                if (pnlDatos.find("[name='" + k + "']").is('select')) {
                                    pnlDatos.find("[name='" + k + "']")[0].selectize.setValue(v);
                                }
                            });
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

    function getCombinacionesXEstilo(Estilo) {
        HoldOn.open({theme: 'sk-bounce', message: 'ESPERE...'});
        $.ajax({
            url: master_url + 'getCombinacionesXEstilo',
            type: "POST",
            dataType: "JSON",
            data: {
                Estilo: Estilo
            }
        }).done(function (data, x, jq) {
            pnlDatos.find("[name='Combinacion']")[0].selectize.clearOptions();
            $.each(data, function (k, v) {
                pnlDatos.find("[name='Combinacion']")[0].selectize.addOption({text: v.Descripcion, value: v.ID});
            });
            pnlDatos.find("[name='Combinacion']")[0].selectize.open();
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }

    function getEstilos() {
        HoldOn.open({theme: 'sk-bounce', message: 'ESPERE...'});
        $.ajax({
            url: master_url + 'getEstilos',
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

    function getProveedores() {
        HoldOn.open({theme: 'sk-bounce', message: 'ESPERE...'});
        $.ajax({
            url: master_url + 'getProveedores',
            type: "POST",
            dataType: "JSON"
        }).done(function (data, x, jq) {
            $.each(data, function (k, v) {
                pnlDatos.find("[name='Proveedor']")[0].selectize.addOption({text: v.Nombre, value: v.ID});
            });
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }
</script>