<div class="card border-0" id="pnlTablero">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6 float-left">
                <legend class="float-left">Gestión de Semanas Nomina</legend>
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
                        <legend class="float-left">Semanas</legend>
                    </div>
                    <div class="col-md-7 float-right">

                    </div>
                    <div class="col-md-3 float-right" align="right">
                        <button type="button" class="btn btn-danger btn-sm" id="btnCancelar">SALIR</button>
                        <button type="button" class="btn btn-primary btn-sm" id="btnGuardar">GUARDAR</button>
                    </div>
                </div>
                <div class="row">
                    <div class="d-none">
                        <input type="text" class="" id="ID" name="ID" >
                    </div>
                    <div class="col-sm-4">
                        <label for="Ano">Año*</label>
                        <input type="text" class="form-control form-control-sm numbersOnly" id="Ano" name="Ano" required >
                    </div>
                    <div class="col-sm-4">
                        <label for="Sem">Fecha Inicio*</label>
                        <input type="text" class="form-control form-control-sm notEnter" id="FechaIni" name="FechaIni" required >
                    </div>
                    <div class="col-sm-4">
                        <br>
                        <button type="button"  class="btn btn-primary btn-sm" id="btnGenerarSemanas" data-toggle="tooltip" data-placement="top" title="Generar Semanas" >
                            <i class="fa fa-plus"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!--DETALLE-->
    <div class=" d-none card-body" id="pnlDatosDetalle">
        <!--DETALLE-->
        <div class="row">
            <div class="table-responsive col-12">
                <table id="tblDetalle" class="table table-sm" width="100%">
                    <thead>
                        <tr>
                            <th scope="col">Año</th>
                            <th scope="col">Semana</th>
                            <th scope="col">Fecha Inicio</th>
                            <th scope="col">Fecha Fin</th>
                            <th scope="col" class="d-none">IDR</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
        <!--FIN DETALLE-->
    </div>
</div>
<!--SCRIPT-->
<script>
    var master_url = base_url + 'index.php/Semanas/';
    var pnlDatos = $("#pnlDatos");
    var pnlDatosDetalle = $("#pnlDatosDetalle");
    var pnlTablero = $("#pnlTablero");
    var btnNuevo = $("#btnNuevo");
    var btnGuardar = pnlDatos.find("#btnGuardar");
    var btnCancelar = pnlDatos.find("#btnCancelar");
    var nuevo = true;

    /*DATATABLE GLOBAL*/
    var tblDetalleSemanas;
    var tblInicial = {
        "dom": 'rt',
        "autoWidth": false,
        "displayLength": 500,
        "colReorder": true,
        "bLengthChange": false,
        "deferRender": true,
        "scrollY": 220,
        "scrollCollapse": true,
        "bSort": true,
        "aaSorting": [
            [4, 'desc']/*ID*/
        ],
        "columnDefs": [
            {
                "targets": [4],
                "visible": false,
                "searchable": false
            }
        ]
    };

    function convertDate(inputFormat) {
        function pad(s) {
            return (s < 10) ? '0' + s : s;
        }
        var d = new Date(inputFormat);
        return [pad(d.getDate()), pad(d.getMonth() + 1), d.getFullYear()].join('/');
    }

    var FechaIni;
    $(document).ready(function () {
        pnlDatos.find("#FechaIni").inputmask({alias: "date"});

        pnlDatos.find("#FechaIni").keydown(function (e) {
            if (e.keyCode === 13) {
                pnlDatos.find("#btnGenerarSemanas").trigger('click');
            }
        });
        pnlDatos.find("#btnGenerarSemanas").click(function () {
            if (pnlDatosDetalle.find("#tblDetalle > tbody > tr").length > 0) {
                swal('Atención', 'Ya se han generado las semanas', 'warning');
            } else {
                HoldOn.open({
                    theme: "sk-bounce",
                    message: "CARGANDO DATOS..."
                });
                var feC = pnlDatos.find("#FechaIni").val().split("/");
                var feI = new Date(feC[2], feC[1] - 1, feC[0]);
                var feF = new Date(feC[2], feC[1] - 1, feC[0]);
                var cont = 1;
                var Sem = 1;
                var esInicio = true;
                tblDetalleSemanas = pnlDatosDetalle.find("#tblDetalle").DataTable(tblInicial);

                while (cont <= 104) {
                    if (esInicio) {
                        //console.log('Sem: ' + Sem);
                        //console.log(convertDate(feI));
                        esInicio = false;
                    } else {
                        feF.setDate(feI.getDate() + 6);
                        tblDetalleSemanas.row.add([
                            pnlDatos.find("#Ano").val(),
                            Sem,
                            convertDate(feI),
                            convertDate(feF),
                            cont
                        ]).draw(false);
                        Sem++;
                        feI.setDate(feI.getDate() + 6);
                        //console.log(convertDate(feI));
                        feI.setDate(feI.getDate() + 1);
                        esInicio = true;
                    }
                    cont++;

                }
                HoldOn.close();

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
                        getRecords();
                        nuevo = false;
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
            if ($.fn.DataTable.isDataTable('#tblDetalle')) {
                tblDetalleSemanas.destroy();
                pnlDatosDetalle.find("#tblDetalle > tbody").html("");
            }
            pnlTablero.addClass("d-none");
            pnlDatos.removeClass('d-none');
            pnlDatosDetalle.removeClass('d-none');
            pnlDatos.find("input").val("");
            $.each(pnlDatos.find("select"), function (k, v) {
                pnlDatos.find("select")[k].selectize.clear(true);
            });
            $(':input:text:enabled:visible:first').focus();
            nuevo = true;
        });
        btnCancelar.click(function () {
            pnlTablero.removeClass("d-none");
            pnlDatosDetalle.addClass('d-none');
            pnlDatos.addClass('d-none');
            nuevo = true;
        });
        /*CALLS*/
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
                $("#tblRegistros").html(getTable('tblSemanas', data));
                $('#tblSemanas tfoot th').each(function () {
                    $(this).html('');
                });
                var thead = $('#tblSemanas thead th');
                var tfoot = $('#tblSemanas tfoot th');
                thead.eq(0).addClass("d-none");
                tfoot.eq(0).addClass("d-none");
                $.each($.find('#tblSemanas tbody tr'), function (k, v) {
                    var td = $(v).find("td");
                    td.eq(0).addClass("d-none");
                });
                var tblSelected = $('#tblSemanas').DataTable(tableOptions);
                $('#tblSemanas_filter input[type=search]').focus();

                $('#tblSemanas tbody').on('click', 'tr', function () {
                    $("#tblSemanas tbody tr").removeClass("success");
                    $(this).addClass("success");
                    var dtm = tblSelected.row(this).data();
                    temp = parseInt(dtm[0]);
                });

                $('#tblSemanas tbody').on('dblclick', 'tr', function () {
                    $("#tblCatalogos tbody tr").removeClass("success");
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
                            url: master_url + 'getSemanaNominaByID',
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
                            pnlTablero.addClass("d-none");
                            pnlDatos.removeClass('d-none');
                            $(':input:text:enabled:visible:first').focus();
                            $(':input:text:enabled:visible:first').select();
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
</script>




