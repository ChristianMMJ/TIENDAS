<div class="card border-0" id="pnlTablero">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-3 float-left">
                <legend class="float-left">Gestión de Prestamos</legend>
            </div>
            <div class="col-sm-3 float-left">
                <?php
                if (in_array($this->session->userdata["Tipo"], array("SISTEMAS", "ADMINISTRADOR"))) {
                    ?>
                    <label for="Tienda">Tienda*</label>
                    <select class="form-control form-control-sm required"  id="TiendaT">
                        <option value=""></option>
                        <option value="TODAS">TODAS</option>
                    </select>
                <?php } ?>
            </div>
            <div class="col-sm-6 float-right" align="right">
                <button type="button" class="btn btn-primary" id="btnNuevo" data-toggle="tooltip" data-placement="left" title="Agregar"><span class="fa fa-plus"></span><br></button>
                <button type="button" class="btn btn-primary" id="btnEliminar"  data-toggle="tooltip" data-placement="top" title="Eliminar""><span class="fa fa-trash"></span><br></button>
            </div>
        </div>
        <div class="row">
            <div class="table-responsive" id="Registros">
                <table id="tblRegistros" class="table table-sm display" style="width:100%">
                    <thead>
                        <tr>
                            <th>No. Empleado</th>
                            <th>Nombre</th>
                            <th>Tienda</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!--SCRIPT-->
<script>
    var master_url = base_url + 'index.php/Prestamos/';
    var pnlTablero = $("#pnlTablero");
    var nuevo = true;

    var tblRegistrosX = $("#tblRegistros"), Registros;
    $(document).ready(function () {
        pnlTablero.find("#TiendaT").change(function () {
            getRecords();
        });

        getRecords();
        getTiendas();
        handleEnter();
    });


    function getRecords() {
        HoldOn.open({theme: 'sk-cube', message: 'CARGANDO...'});
        if ($.fn.DataTable.isDataTable('#tblRegistros')) {
            tblRegistrosX.DataTable().destroy();
        }
        Registros = tblRegistrosX.DataTable({
            "dom": 'Bfrtip',
            buttons: buttons,
            "ajax": {
                "url": master_url + 'getRecords',
                "dataType": "json",
                "type": "POST",
                "dataSrc": "",
                "data": {
                    Tienda: pnlTablero.find("#TiendaT").val()
                }
            },
            "columns": [
                {"data": "NoEmp"},
                {"data": "Empleado"},
                {"data": "Tienda"}
            ],
            language: lang,
            "autoWidth": true,
            "colReorder": true,
            "displayLength": 20,
            "bLengthChange": false,
            "deferRender": true,
            "scrollCollapse": false,
            "bSort": true,
            "aaSorting": [
                [0, 'desc']/*ID*/
            ],
            initComplete: function (x, y) {
                HoldOn.close();
            }
        });

        $('#tblRegistros_filter input[type=search]').focus();

        tblRegistrosX.find('tbody').on('click', 'tr', function () {
            tblRegistrosX.find("tbody tr").removeClass("success");
            $(this).addClass("success");
            var dtm = Registros.row(this).data();
            temp = parseInt(dtm.ID);
        });

        tblRegistrosX.find('tbody').on('dblclick', 'tr', function () {
            nuevo = false;
            tblRegistrosX.find("tbody tr").removeClass("success");
            $(this).addClass("success");
            var dtm = Registros.row(this).data();
            temp = parseInt(dtm.ID);
            pnlDatos.removeClass("d-none");
            pnlTablero.addClass("d-none");
            if (temp !== 0 && temp !== undefined && temp > 0) {
                nuevo = false;
                HoldOn.open({
                    theme: "sk-bounce",
                    message: "CARGANDO DATOS..."
                });
                $.ajax({
                    url: master_url + 'getFraccionEstiloByIDEstilo',
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

                    Estilo[0].selectize.disable();

                    $.each(data[0], function (k, v) {
                        pnlDatos.find("[name='" + k + "']").val(v);
                        if (pnlDatos.find("[name='" + k + "']").is('select')) {
                            pnlDatos.find("[name='" + k + "']")[0].selectize.setValue(v);
                        }
                    });
                    pnlControlesDetalle.find("[name='Departamento']")[0].selectize.focus();
                    getFotoXEstilo(temp);
                    getFraccionesEstiloXEstiloDetalle(temp);
                    pnlTablero.addClass("d-none");
                    pnlDetalle.removeClass('d-none');
                    pnlControlesDetalle.removeClass('d-none');
                    pnlDatos.removeClass('d-none');
                }).fail(function (x, y, z) {
                    console.log(x, y, z);
                    HoldOn.close();
                });
            } else {
                onNotify('<span class="fa fa-exclamation fa-lg"></span>', 'DEBE DE ELEGIR UN REGISTRO', 'danger');
            }
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
                pnlTablero.find("#TiendaT")[0].selectize.addOption({text: v.Tienda, value: v.ID});
            });
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }


</script>