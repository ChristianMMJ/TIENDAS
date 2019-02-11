<div class="card border-0" id="pnlTablero">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6 float-left">
                <legend class="float-left">Gestión de Series</legend>
            </div>
            <div class="col-sm-6 float-right" align="right">
                <button type="button" class="btn btn-primary" id="btnNuevo" data-toggle="tooltip" data-placement="left" title="Agregar"><span class="fa fa-plus"></span><br></button>
            </div>
        </div> 
        <div class="card-block">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div id="Series" class="table-responsive">
                    <table id="tblSeries" class="table table-hover table-sm compact" style="width:100%">
                        <thead>
                            <tr> 
                                <th scope="col">ID</th>
                                <th scope="col">Clave</th>
                                <th scope="col">Numeración</th> 
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!--GUARDAR-->
<div  class="container-fluid">
    <div class="card border-0  d-none" id="pnlDatos">
        <div class="card-body text-dark">
            <form id="frmNuevo">

                <div class="row">
                    <div class="col-md-2 float-left">
                        <legend class="float-left">Series</legend>
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
                        <input type="text" class="" id="ID" name="ID" >
                    </div>
                    <div class="col-sm">
                        <label for="Clave">Clave*</label>
                        <input type="text" class="form-control form-control-sm" id="Clave" name="Clave" required >
                    </div>
                    <div class="col-sm">
                        <label for="PuntoInicial">Punto Inicial*</label>
                        <input type="text" class="form-control form-control-sm numbersOnly" maxlength="4" id="PuntoInicial" name="PuntoInicial" required >
                    </div>
                    <div class="col-sm">
                        <label for="PuntoFinal">Punto Final*</label>
                        <input type="text"  class="form-control form-control-sm numbersOnly" maxlength="4" id="PuntoFinal" name="PuntoFinal" required >
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="MediosPuntos" checked="">
                            <label class="custom-control-label" for="MediosPuntos">Medios Puntos</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <br>
                </div>
                <div class=" " style="width: 1200px;" id="dSerie">
                    <input type="text" style="width: 45px;" maxlength="4" class="numbersOnly"   name="T1">
                    <input type="text" style="width: 45px;" maxlength="4" class="numbersOnly"   name="T2">
                    <input type="text" style="width: 45px;" maxlength="4" class="numbersOnly"   name="T3">
                    <input type="text" style="width: 45px;" maxlength="4" class="numbersOnly"   name="T4">
                    <input type="text" style="width: 45px;" maxlength="4" class="numbersOnly"   name="T5">
                    <input type="text" style="width: 45px;" maxlength="4" class="numbersOnly"   name="T6">
                    <input type="text" style="width: 45px;" maxlength="4" class="numbersOnly"   name="T7">
                    <input type="text" style="width: 45px;" maxlength="4" class="numbersOnly"   name="T8">
                    <input type="text" style="width: 45px;" maxlength="4" class="numbersOnly"   name="T9">
                    <input type="text" style="width: 45px;" maxlength="4" class="numbersOnly"   name="T10">
                    <input type="text" style="width: 45px;" maxlength="4" class="numbersOnly"   name="T11">
                    <input type="text" style="width: 45px;" maxlength="4" class="numbersOnly"   name="T12">
                    <input type="text" style="width: 45px;" maxlength="4" class="numbersOnly"   name="T13">
                    <input type="text" style="width: 45px;" maxlength="4" class="numbersOnly"   name="T14">
                    <input type="text" style="width: 45px;" maxlength="4" class="numbersOnly"   name="T15">
                    <input type="text" style="width: 45px;" maxlength="4" class="numbersOnly"   name="T16">
                    <input type="text" style="width: 45px;" maxlength="4" class="numbersOnly"   name="T17">
                    <input type="text" style="width: 45px;" maxlength="4" class="numbersOnly"   name="T18">
                    <input type="text" style="width: 45px;" maxlength="4" class="numbersOnly"   name="T19">
                    <input type="text" style="width: 45px;" maxlength="4" class="numbersOnly"   name="T20">
                    <input type="text" style="width: 45px;" maxlength="4" class="numbersOnly"   name="T21">
                    <input type="text" style="width: 45px;" maxlength="4" class="numbersOnly"   name="T22">

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

<!--SCRIPT-->
<script>
    var master_url = base_url + 'index.php/Series/';
    var pnlDatos = $("#pnlDatos");
    var pnlTablero = $("#pnlTablero");
    var btnNuevo = $("#btnNuevo");
    var btnGuardar = pnlDatos.find("#btnGuardar");
    var btnCancelar = pnlDatos.find("#btnCancelar");
    var btnModificar = pnlDatos.find("#btnModificar");
    var tempDetalle = 0;
    var nuevo = true;
    var Series, tblSeries = pnlTablero.find("#tblSeries");

    $(document).ready(function () {
        pnlDatos.find('#PuntoFinal').keydown(function (e) {
            if (e.keyCode === 13) {
                //Borramos los datos para evitar errores
                var contReset = 1;
                while (contReset <= 22) {
                    pnlDatos.find("[name='T" + contReset + "']").val("");
                    contReset++;
                }
                var incremento = parseFloat(pnlDatos.find('#PuntoInicial').val());
                //Se valida que no sea mas granda la talla inicial que la final
                if (parseFloat(pnlDatos.find('#PuntoFinal').val()) > parseFloat(pnlDatos.find('#PuntoInicial').val())) {

                    var cont = 1;
                    //Validamos si las tallas son con medios o sin medios puntos
                    if ($('#MediosPuntos').is(":checked"))
                    {
                        //Crear las tallas
                        while (incremento <= parseFloat(pnlDatos.find('#PuntoFinal').val())) {
                            pnlDatos.find("[name='T" + cont + "']").val(incremento);
                            incremento = incremento + 0.5;
                            cont++;
                        }
                    } else {
                        //Crear las tallas
                        while (incremento <= parseFloat(pnlDatos.find('#PuntoFinal').val())) {
                            pnlDatos.find("[name='T" + cont + "']").val(incremento);
                            incremento = incremento + 1;
                            cont++;
                        }
                    }
                    guardar = true;

                } else {
                    guardar = false;
                    swal('ATENCIÓN', 'EL PUNTO INICIAL NO DEBE SER MAYOR AL PUNTO FINAL', 'warning');
                }
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
                        swal('ATENCIÓN', 'SE HA MODIFICADO EL REGISTRO', 'success').then((value) => {
                            btnCancelar.trigger('click');
                        });
                        Series.ajax.reload();
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
                        swal('ATENCIÓN', 'SE HA AÑADIDO UN NUEVO REGISTRO', 'success');
                        pnlDatos.find('#ID').val(data);
                        nuevo = false;
                        Series.ajax.reload();
                    }).fail(function (x, y, z) {
                        console.log(x, y, z);
                    }).always(function () {
                    });
                }
            } else {
                swal('ATENCIÓN', '* DEBE DE COMPLETAR LOS CAMPOS REQUERIDOS *', 'warning');
            }



        });
        btnNuevo.click(function () {
            pnlTablero.addClass("d-none");
            pnlDatos.removeClass('d-none');
            pnlDatos.find("input").val("");
            $.each(pnlDatos.find("select"), function (k, v) {
                pnlDatos.find("select")[k].selectize.clear(true);
            });
            pnlDatos.find('#PuntoInicial').removeClass('disabledForms');
            pnlDatos.find('#PuntoFinal').removeClass('disabledForms');
            pnlDatos.find('#dSerie').removeClass('disabledForms');
            $(':input:text:enabled:visible:first').focus();
            nuevo = true;
        });
        btnCancelar.click(function () {
            pnlTablero.removeClass("d-none");
            pnlDatos.addClass('d-none');
            nuevo = true;
        });
        getRecordsX();
        handleEnter();
    });

    function getRecordsX() {
        Series = tblSeries.DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel',
                {
                    exportOptions: {
                        columns: ':visible',
                        search: 'applied',
                        order: 'applied'
                    },
                    className: 'selectNotEnter',
                    extend: 'pdfHtml5',
                    orientation: 'landscape', //portrait
                    pageSize: 'letter', //A3 , A5 , A6 , legal , letter
                    text: 'PDF',
                    titleAttr: 'PDF'
                }, 'print'
            ],
            "ajax": {
                "url": master_url + 'getRecords',
                "contentType": "application/json",
                "dataSrc": ""
            },
            "columns": [
                {"data": "ID"}, {"data": "Clave"}, {"data": "Numeracion"}
            ],
            "columnDefs": [
                {
                    "targets": [0],
                    "visible": false,
                    "searchable": false
                }
            ],
            select: {
                style: 'single'
            },
            "autoWidth": true,
            "colReorder": true,
            "displayLength": 999,
            "bLengthChange": false,
            "deferRender": true,
            "scrollCollapse": false,
            "bSort": true,
            "scrollY": "350px",
            "scrollX": true,
            "aaSorting": [
                [0, 'desc']/*ID*/
            ]
        });

        tblSeries.find('tbody').on('dblclick', 'tr', function () {
            temp = Series.row($(this)).data().ID;
            if (temp) {
                nuevo = false;
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
                swal('ATENCIÓN', 'DEBE DE ELEGIR UN REGISTRO', 'warning');
            }
        });
    }

</script> 