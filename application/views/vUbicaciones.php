<div class="card border-0" id="pnlTablero">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-12 float-left">
                <legend class="float-left">Ubicaciones dentro de la Tienda</legend>
            </div>
        </div>
        <div class="card-block">
            <div class="table-responsive" id="tblRegistros"></div>
        </div>
    </div>
</div>
<!--MODAL EXISTENCIAS-->
<!--Confirmacion-->
<div class="modal fade modal-fullscreen" id="mdlUbicaciones" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ubicación:  <strong id="DatosTienda"></strong> </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                Estilo: <strong id="DatosEstilo"></strong><br><br>
                Color: <strong id="DatosColor"></strong>

                <br><hr><br>
                <form id="frmNuevo">
                    <div class="row">
                        <div class="d-none">
                            <input type="text" class="" id="ID" name="ID" >
                        </div>
                        <div class="col-md-4">
                            <label for="Loc1">Ubicación 1</label>
                            <input type="text" class="form-control"  placeholder="EJ: Bodega 1" id="Loc1" name="Loc1" >
                        </div>

                        <div class="col-md-4">
                            <label for="Loc2">Ubicación 2</label>
                            <input type="text" class="form-control "  placeholder="EJ: Pasillo 2" id="Loc2" name="Loc2" >
                        </div>
                        <div class="col-md-4">
                            <label for="Loc3">Ubicación 3</label>
                            <input type="text" class="form-control "  placeholder="EJ: Repisa 3" id="Loc3" name="Loc3" >
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-raised btn-primary" id="btnGuardarUbicaciones">ACEPTAR</button>
            </div>
        </div>
    </div>
</div>

<!--SCRIPT-->
<script>
    var master_url = base_url + 'index.php/Ubicaciones/';
    var pnlTablero = $("#pnlTablero");
    $(document).ready(function () {

        $('#mdlUbicaciones').on('shown.bs.modal', function () {
            $('#mdlUbicaciones').find(':input:text:enabled:visible:first').focus();
        });

        $('#btnGuardarUbicaciones').on('click', function () {
            var frm = new FormData($("#frmNuevo")[0]);
            $.ajax({
                url: master_url + 'onModificar',
                type: "POST",
                cache: false,
                contentType: false,
                processData: false,
                data: frm
            }).done(function (data, x, jq) {
                $('#mdlUbicaciones').modal('hide');
                getUbicacionesByTienda();
            }).fail(function (x, y, z) {
                console.log(x, y, z);
            }).always(function () {
                HoldOn.close();
            });
        });

        getUbicacionesByTienda();
        handleEnter();
    });
    function getUbicacionesByTienda() {
        temp = 0;
        HoldOn.open({
            theme: "sk-bounce",
            message: "CARGANDO DATOS..."
        });
        $.ajax({
            url: master_url + 'getUbicacionesByTienda',
            type: "POST",
            dataType: "JSON"
        }).done(function (data, x, jq) {
            if (data.length > 0) {
                $("#tblRegistros").html(getTable('tblUbicaciones', data));

                $('#tblUbicaciones tfoot th').each(function () {
                    var title = $(this).text();
                    $(this).html('<div  style="overflow-x:auto; "><div class="form-group "><input type="text" placeholder="Buscar por ' + title + '" class="form-control form-control-sm" style="width: 100%;"/></div></div>');
                });
                var thead = $('#tblUbicaciones thead th');
                var tfoot = $('#tblUbicaciones tfoot th');
                thead.eq(0).addClass("d-none");
                tfoot.eq(0).addClass("d-none");
                $.each($.find('#tblUbicaciones tbody tr'), function (k, v) {
                    var td = $(v).find("td");
                    td.eq(0).addClass("d-none");
                });
                var tblSelected = $('#tblUbicaciones').DataTable(tableOptions);
                $('#tblUbicaciones_filter input[type=search]').focus();

                $('#tblUbicaciones tbody').on('click', 'tr', function () {
                    var dtm = tblSelected.row(this).data();
                    temp = parseInt(dtm[0]);

                    $("#tblUbicaciones tbody tr").removeClass("success");
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
                            url: master_url + 'getExistenciaByID',
                            type: "POST",
                            dataType: "JSON",
                            data: {
                                ID: temp
                            }
                        }).done(function (data, x, jq) {
                            $('#mdlUbicaciones').find("input").val("");
                            $('#mdlUbicaciones').find("#DatosTienda").text(data[0].NombreTienda);
                            $('#mdlUbicaciones').find("#DatosEstilo").text(data[0].NombreEstilo);
                            $('#mdlUbicaciones').find("#DatosColor").text(data[0].NombreColor);
                            $.each(data[0], function (k, v) {
                                if (parseInt(v) <= 0) {
                                    $('#mdlUbicaciones').find("[name='" + k + "']").prop("disabled", 'disabled');
                                    $('#mdlUbicaciones').find("[name='" + k + "']").addClass('NoStock');
                                    $('#mdlUbicaciones').find("[name='" + k + "']").removeClass('Stock');
                                    $('#mdlUbicaciones').find("[name='" + k + "']").val('0');
                                } else if (parseInt(v) > 0) {
                                    $('#mdlUbicaciones').find("[name='" + k + "']").prop("disabled", false);
                                    $('#mdlUbicaciones').find("[name='" + k + "']").addClass('Stock');
                                    $('#mdlUbicaciones').find("[name='" + k + "']").removeClass('NoStock');
                                    $('#mdlUbicaciones').find("[name='" + k + "']").val(v);
                                }
                            });
                            $('#mdlUbicaciones').modal('show');
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
                onNotify('<span class="fa fa-exclamation fa-lg"></span>', 'NO EXISTEN EXISTENCIAS EN ESTA TIENDA', 'danger');
                $("#tblRegistros").html("");
            }
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }



</script>
