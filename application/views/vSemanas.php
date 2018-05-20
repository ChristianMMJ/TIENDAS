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
                        <legend class="float-left">Semanas <strong id="lAno"></strong></legend>
                    </div>
                    <div class="col-md-7 float-right">

                    </div>
                    <div class="col-md-3 float-right" align="right">
                        <button type="button" class="btn btn-danger btn-sm" id="btnCancelar">SALIR</button>
                        <button type="button" class="btn btn-primary btn-sm" id="btnGuardar">GUARDAR</button>
                    </div>
                </div>
                <div class="row" id="ControlesEncabezado">
                    <div class="d-none">
                        <input type="text" class="" id="ID" name="ID" >
                    </div>
                    <div class="col-sm-4">
                        <label for="Ano">Año*</label>
                        <input type="text" class="form-control form-control-sm numbersOnly" maxlength="4" id="Ano" name="Ano" required >
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
        <!--DETALLE NUEVO-->
        <div class="table-responsive col-12" id="RegistrosDetalle">
            <div class="row">
                <table id="tblDetalle" class="table table-sm" width="100%">
                    <thead>
                        <tr>
                            <th scope="col">Año</th>
                            <th scope="col">Semana</th>
                            <th scope="col">Fecha Inicio</th>
                            <th scope="col">Fecha Fin</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>

            </div>

        </div>
        <!--FIN DETALLE NUEVO-->
        <!--DETALLE EDITAR-->
        <div class="row">
            <div class="table-responsive col-12 " id="RegistrosDetalleE">
            </div>
        </div>
        <!--FIN DETALLE EDITAR-->
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
        var AnoI;
        /*DATATABLE GLOBAL*/
        var tblDetalleSemanas;
        var tblInicial = {
            "dom": 'rt',
            "autoWidth": false,
            "displayLength": 500,
            "colReorder": true,
            "bLengthChange": false,
            "deferRender": true,
            "scrollY": 320,
            "scrollCollapse": true,
            "bSort": true,
            "aaSorting": [
                [1, 'asc']/*ID*/
            ]
        };
        var tblEdicion = {
            "dom": 'rt',
            "autoWidth": true,
            "displayLength": 500,
            "colReorder": true,
            "bLengthChange": false,
            "deferRender": true,
            "scrollY": 390,
            "scrollCollapse": true,
            "bSort": true,
            "aaSorting": [
                [0, 'asc']/*ID*/
            ],
            "columnDefs": [
                {
                    "targets": [0],
                    "width": "10%"
                }
            ]
        };


        var FechaIni;
        $(document).ready(function () {
            pnlDatos.find("#Ano").change(function () {
                if ($(this).val().length < 4) {
                    swal({
                        title: "ATENCIÓN",
                        text: "AÑO INCORRECTO",
                        icon: "warning"
                    }).then((action) => {
                        pnlDatos.find("#Ano").focus();
                        pnlDatos.find("#Ano").select();
                    });
                } else {
                    $.ajax({
                        url: master_url + 'onValidarExisteAno',
                        type: "POST",
                        dataType: "JSON",
                        data: {
                            Ano: $(this).val()
                        }
                    }).done(function (data, x, jq) {
                        if (parseInt(data[0].EXISTE) > 0) {
                            pnlDatos.find("#Ano").val('');
                            swal({
                                title: "ATENCIÓN",
                                text: "LAS SEMANAS DE ESTE AÑO YA HAN SIDO GENERADAS",
                                icon: "warning"
                            }).then((action) => {
                                pnlDatos.find("#Ano").focus();
                            });
                        }
                    }).fail(function (x, y, z) {
                        console.log(x, y, z);
                    }).always(function () {
                    });
                }

            });
            pnlDatos.find("#FechaIni").inputmask({alias: "date"});
            pnlDatos.find("#FechaIni").keydown(function (e) {
                if (pnlDatos.find("#Ano").val() !== '') {
                    if (e.keyCode === 13) {
                        pnlDatos.find("#btnGenerarSemanas").trigger('click');
                    }
                } else {
                    swal({
                        title: "ATENCIÓN",
                        text: "DEBES INGRESAR UN AÑO",
                        icon: "warning"
                    }).then((action) => {
                        pnlDatos.find("#Ano").focus();
                    });
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
                            tblDetalleSemanas.row.add([
                                pnlDatos.find("#Ano").val(),
                                Sem,
                                convertDate(feI),
                                convertDate(feI.setDate(feI.getDate() + 6))
                            ]).draw(false);
                            Sem++;
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

                AnoI = pnlDatos.find("#Ano").val();
                isValid('pnlDatos');
                if (valido) {

                    if (!nuevo) {

                    } else {
                        var frm = new FormData(pnlDatos.find("#frmNuevo")[0]);
                        /*AGREGAR DETALLE*/
                        var detalle = [];
                        //Destruye la instancia de datatable
                        tblDetalleSemanas.destroy();
                        //Iteramos en la tabla natural
                        pnlDatosDetalle.find("#tblDetalle > tbody > tr").each(function (k, v) {
                            var row = $(this).find("td");
                            console.log(row);
                            //Se declara y llena el objeto obteniendo su valor por el indice y se elimina cualquier espacio
                            var Semanas = {
                                Ano: row.eq(0).text().replace(/\s+/g, ''),
                                Sem: row.eq(1).text().replace(/\s+/g, ''),
                                FechaIni: row.eq(2).text().replace(/\s+/g, ''),
                                FechaFin: row.eq(3).text().replace(/\s+/g, '')
                            };
                            //Se mete el objeto al arreglo
                            detalle.push(Semanas);
                        });
                        //Convertimos a cadena el objeto en formato json
                        frm.append('Detalle', JSON.stringify(detalle));
                        $.ajax({
                            url: master_url + 'onAgregar',
                            type: "POST",
                            cache: false,
                            contentType: false,
                            processData: false,
                            data: frm
                        }).done(function (data, x, jq) {
                            swal('INFO', 'SE HAN GENERADO LAS SEMANAS DE ESTE AÑO', 'success');
                            getRecords();
                            nuevo = false;
                            pnlDatos.find('#lAno').text(AnoI);
                            getSemanasNominaByAno(AnoI);
                            $('#ControlesEncabezado').addClass("d-none");
                            $('#RegistrosDetalle').addClass("d-none");
                            $('#RegistrosDetalleE').removeClass("d-none");
                            btnGuardar.addClass("d-none");
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
                btnGuardar.removeClass("d-none");
                pnlDatos.find('#lAno').text('');
                $('#ControlesEncabezado').removeClass("d-none");
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

        function validate(event, val) {
            if (((event.which !== 46 || (event.which === 46 && val === '')) || val.indexOf('.') !== -1) && (event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }
        }

        function onModificarSemanaXID(value, IDX) {
            $.ajax({
                url: master_url + 'onModificar',
                type: "POST",
                data: {
                    ID: IDX,
                    Sem: value === '' || value === null ? 0 : value
                }
            }).done(function (data, x, jq) {
                getSemanasNominaByAno(temp);
            }).fail(function (x, y, z) {
                console.log(x, y, z);
            }).always(function () {
                HoldOn.close();
            });
        }

        function convertDate(inputFormat) {
            function pad(s) {
                return (s < 10) ? '0' + s : s;
            }
            var d = new Date(inputFormat);
            return [pad(d.getDate()), pad(d.getMonth() + 1), d.getFullYear()].join('/');
        }

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
                        $(this).addClass('d-none');
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
                                url: master_url + 'getSemanaNominaByAno',
                                type: "POST",
                                dataType: "JSON",
                                data: {
                                    Ano: temp
                                }
                            }).done(function (data, x, jq) {
                                var dtm = data[0];
                                pnlDatos.find("input").val("");
                                pnlDatos.find('#lAno').text(dtm.Ano);
                                getSemanasNominaByAno(temp);
                                pnlDatosDetalle.removeClass('d-none');
                                $('#ControlesEncabezado').addClass("d-none");
                                $('#RegistrosDetalle').addClass("d-none");
                                $('#RegistrosDetalleE').removeClass("d-none");
                                pnlTablero.addClass("d-none");
                                pnlDatos.removeClass('d-none');
                                btnGuardar.addClass("d-none");
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

        function getSemanasNominaByAno(Ano) {
            $.ajax({
                url: master_url + 'getSemanasNominaByAno',
                type: "POST",
                dataType: "JSON",
                data: {
                    Ano: Ano
                }
            }).done(function (data, x, jq) {
                if (data.length > 0) {
                    pnlDatosDetalle.find("#RegistrosDetalleE").html(getTable('tblDetalleE', data));
                    $('#tblDetalleE tfoot th').each(function () {
                        $(this).addClass("d-none");
                    });
                    pnlDatosDetalle.find("#tblDetalleE").DataTable(tblEdicion);
                    //Sombreado de la fila
                    pnlDatosDetalle.find('#tblDetalleE tbody').on('click', 'tr', function () {
                        $("#tblDetalleE tbody tr").removeClass("success");
                        $(this).addClass("success");
                    });
                } else {
                    pnlDatosDetalle.find("#RegistrosDetalleE").html("");
                }
                HoldOn.close();
            }).fail(function (x, y, z) {
                console.log(x, y, z);
            }).always(function () {

            });
        }

    </script>



