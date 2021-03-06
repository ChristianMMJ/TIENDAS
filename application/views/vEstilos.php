<div class="card border-0" id="pnlTablero">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6 float-left">
                <legend class="float-left">Gestión de Estilos</legend>
            </div>
            <div class="col-sm-6 float-right" align="right">
                <button type="button" class="btn btn-primary" id="btnNuevo" data-toggle="tooltip" data-placement="left" title="Agregar"><span class="fa fa-plus"></span><br></button>
            </div>
        </div>
        <div class="card-block">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div id="Estilos" class="table-responsive">
                    <table id="tblEstilos" class="table table-hover table-sm  compact" style="width:100%">
                        <thead>
                            <tr> 
                                <th scope="col">ID</th>
                                <th scope="col">Estilo</th>
                                <th scope="col">Linea</th>
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
<div id="" class="container-fluid">
    <div class="card border-0  d-none" id="pnlDatos">
        <div class="card-body text-dark">
            <form id="frmNuevo">
                <div class="row">
                    <div class="col-md-2 float-left">
                        <legend class="float-left">Estilos</legend>
                    </div>
                    <div class="col-md-7 float-right">
                    </div>
                    <div class="col-md-3 float-right" align="right">
                        <button type="button" class="btn btn-secondary btn-sm" id="btnCancelar"><span class="fa fa-arrow-left"></span> REGRESAR </button>
                        <button type="button" class="btn btn-primary btn-sm" id="btnGuardar"><span class="fa fa-save "></span> GUARDAR</button>

                    </div>
                </div>
                <div class="row"><!--START ROW-->
                    <div class="d-none">
                        <input type="text" class="" id="ID" name="ID" required >
                    </div>
                    <div class="col-md has-success">
                        <label for="Clave">Clave*</label>
                        <input type="text" class="form-control form-control-sm " placeholder="" id="Clave" name="Clave" required="">
                    </div>
                    <div class="col-md">
                        <label for="Descripción">Descripción*</label>
                        <input type="text" class="form-control form-control-sm" placeholder="" id="Descripcion" name="Descripcion" required="">
                    </div>

                    <div class="col-md">
                        <label for="Genero">Género</label>
                        <select class="form-control form-control-sm required"   name="Genero">
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="col-md">
                        <label for="Tipo">Tipo de Estilo*</label>
                        <select class="form-control form-control-sm required"   name="TipoEstilo" required="">
                            <option value=""></option>
                        </select>
                    </div>

                    <div class="w-100"></div> <!--SALTO-->
                    <div class="col-md">
                        <label for="Linea">Linea*</label>
                        <select class="form-control form-control-sm required"   name="Linea" required="">
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="col-md">
                        <label for="Serie">Serie*</label>
                        <select class="form-control form-control-sm required"  name="Serie" required="">
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="col-md">
                        <label for="Temporada">Temporada*</label>
                        <select class="form-control form-control-sm required"   name="Temporada" required="">
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="col-md">
                        <label for="Marca">Marca*</label>
                        <select class="form-control form-control-sm required"   name="Marca" required="">
                            <option value=""></option>
                        </select>
                    </div>

                    <div class="w-100"></div> <!--SALTO-->
                    <div class="col-md">
                        <label for="Ano">Año*</label>
                        <input type="text" class="form-control form-control-sm numbersOnly" min="1990" max="2090" maxlength="4" placeholder="" id="Ano" name="Ano" required="">
                    </div>

                    <div class="col-md-3">
                        <label for="Min">Mínimo*</label>
                        <input type="text" class="form-control form-control-sm numbersOnly" min="0" max="100000" maxlength="6" placeholder="" id="Min" name="Min" required="">
                    </div>
                    <div class="col-md-3">
                        <label for="Max">Máximo*</label>
                        <input type="text" class="form-control form-control-sm numbersOnly" min="0" max="100000" maxlength="6" placeholder="" id="Max" name="Max" required="">
                    </div>

                    <div class="col-md-3">
                        <label for="Estatus">Estatus*</label>
                        <select class="form-control form-control-sm required"   name="Estatus" required="">
                            <option value=""></option>
                            <option value="ACTIVO">ACTIVO</option>
                            <option value="INACTIVO">INACTIVO</option>
                        </select>
                    </div>

                </div><!--FIN ROW-->
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
    var master_url = base_url + 'index.php/Estilos/';
    var pnlDatos = $("#pnlDatos");
    var pnlTablero = $("#pnlTablero");
    var btnNuevo = $("#btnNuevo");
    var btnGuardar = pnlDatos.find("#btnGuardar");
    var btnCancelar = pnlDatos.find("#btnCancelar");
    var Archivo = $("#Foto");
    var btnArchivo = $("#btnArchivo");
    var VistaPrevia = $("#VistaPrevia");
    var nuevo = true;
    var Estilos, tblEstilos = pnlTablero.find("#tblEstilos");
    $(document).ready(function () {
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
                        console.log(data);
                        swal('ATENCIÓN', 'SE HA MODIFICADO EL REGISTRO', 'success').then((value) => {
                            btnCancelar.trigger('click');
                        });
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
                        Estilos.ajax.reload();
                    }).fail(function (x, y, z) {
                        console.log(x, y, z);
                    }).always(function () {
                        HoldOn.close();
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
            $(':input:text:enabled:visible:first').focus();
            nuevo = true;
        });
        btnCancelar.click(function () {
            pnlTablero.removeClass("d-none");
            pnlDatos.addClass('d-none');
            nuevo = true;
        });
        /*CALLS*/
        handleEnter();
        getRecordsX();
        getMarcas();
        getTiposEstilo();
        getTemporadas();
        getGeneros();
        getLineas();
        getSeries();
    });

    function getRecordsX() {
        HoldOn.open({
            theme: 'sk-rect',
            message: 'Cargando...'
        });
        Estilos = tblEstilos.DataTable({
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
                "dataSrc": "",
                "data": function (d) {
                    d.Empresa = pnlTablero.find("#EmpresaT").val();
                }
            },
            "columns": [
                {"data": "ID"}, {"data": "Estilo"},
                {"data": "Linea"}
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
            "scrollY": "500px",
            "scrollX": true,
            "aaSorting": [
                [1, 'desc']/*ID*/
            ],
            "initComplete": function (settings, json) {
                HoldOn.close();
            }
        });

        tblEstilos.find('tbody').on('dblclick', 'tr', function () {
            temp = Estilos.row($(this)).data().ID;
            if (temp) {
                nuevo = false;
                HoldOn.open({
                    theme: "sk-bounce",
                    message: "CARGANDO DATOS..."
                });
                $.ajax({
                    url: master_url + 'getEstiloByID',
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
                $("#tblRegistros").html(getTable('tblEstilos', data));

                $('#tblEstilos tfoot th').each(function () {
                    $(this).html('');
                });
                var thead = $('#tblEstilos thead th');
                var tfoot = $('#tblEstilos tfoot th');
                thead.eq(0).addClass("d-none");
                tfoot.eq(0).addClass("d-none");
                $.each($.find('#tblEstilos tbody tr'), function (k, v) {
                    var td = $(v).find("td");
                    td.eq(0).addClass("d-none");
                });
                var tblSelected = $('#tblEstilos').DataTable(tableOptions);
                $('#tblEstilos_filter input[type=search]').focus();

                $('#tblEstilos tbody').on('click', 'tr', function () {
                    $("#tblEstilos tbody tr").removeClass("success");
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
                            url: master_url + 'getEstiloByID',
                            type: "POST",
                            dataType: "JSON",
                            data: {
                                ID: temp
                            }
                        }).done(function (data, x, jq) {
                            if (data.length > 0) {
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
                                pnlTablero.addClass("d-none");
                                pnlDatos.removeClass('d-none');
                                $(':input:text:enabled:visible:first').focus();
                            }
                        }).fail(function (x, y, z) {
                            console.log(x, y, z);
                        }).always(function () {
                            HoldOn.close();
                        });
                    } else {
                        swal('ATENCIÓN', 'DEBE DE ELEGIR UN REGISTRO', 'warning');
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
                swal('ATENCIÓN', 'NO SE ENCONTRARON REGISTROS', 'warning');
            }

        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }

    function getMarcas() {
        HoldOn.open({theme: 'sk-bounce', message: 'ESPERE...'});
        $.ajax({
            url: master_url + 'getMarcas',
            type: "POST",
            dataType: "JSON"
        }).done(function (data, x, jq) {
            $.each(data, function (k, v) {
                pnlDatos.find("[name='Marca']")[0].selectize.addOption({text: v.SValue, value: v.ID});
            });
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }
    function getTemporadas() {
        HoldOn.open({theme: 'sk-bounce', message: 'ESPERE...'});
        $.ajax({
            url: master_url + 'getTemporadas',
            type: "POST",
            dataType: "JSON"
        }).done(function (data, x, jq) {
            $.each(data, function (k, v) {
                pnlDatos.find("[name='Temporada']")[0].selectize.addOption({text: v.SValue, value: v.ID});
            });
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }

    function getGeneros() {
        HoldOn.open({theme: 'sk-bounce', message: 'ESPERE...'});
        $.ajax({
            url: master_url + 'getGeneros',
            type: "POST",
            dataType: "JSON"
        }).done(function (data, x, jq) {
            $.each(data, function (k, v) {
                pnlDatos.find("[name='Genero']")[0].selectize.addOption({text: v.SValue, value: v.ID});
            });
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }

    function getTiposEstilo() {
        HoldOn.open({theme: 'sk-bounce', message: 'ESPERE...'});
        $.ajax({
            url: master_url + 'getTiposEstilo',
            type: "POST",
            dataType: "JSON"
        }).done(function (data, x, jq) {

            $.each(data, function (k, v) {
                pnlDatos.find("[name='TipoEstilo']")[0].selectize.addOption({text: v.SValue, value: v.ID});
            });
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }
    function getLineas() {
        HoldOn.open({theme: 'sk-bounce', message: 'ESPERE...'});
        $.ajax({
            url: master_url + 'getLineas',
            type: "POST",
            dataType: "JSON"
        }).done(function (data, x, jq) {

            $.each(data, function (k, v) {
                pnlDatos.find("[name='Linea']")[0].selectize.addOption({text: v.Descripcion, value: v.ID});
            });
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }
    function getSeries() {
        HoldOn.open({theme: 'sk-bounce', message: 'ESPERE...'});
        $.ajax({
            url: master_url + 'getSeries',
            type: "POST",
            dataType: "JSON"
        }).done(function (data, x, jq) {
            $.each(data, function (k, v) {
                pnlDatos.find("[name='Serie']")[0].selectize.addOption({text: v.Clave, value: v.ID});
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

    function printImg(url) {
        var win = window.open('');
        win.document.write('<img src="' + url + '" onload="window.print();window.close()" />');
        win.focus();
    }
</script>
 