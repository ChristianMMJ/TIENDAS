<div class="card border-0" id="pnlTablero">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-8 float-left">
                <legend class="float-left">Existencias</legend>
            </div>
            <div class="col-sm-4" >
                <?php
                if (in_array($this->session->userdata["Tipo"], array("SISTEMAS", "ADMINISTRADOR"))) {
                    ?>
                    <label for="Tienda">Tienda*</label>
                    <select class="form-control form-control-sm required"  name="Tienda">
                        <option value=""></option>
                        <option value="TODAS">TODAS</option>
                    </select>
                <?php } ?>
            </div>
        </div>
        <div class="card-block">
            <div class="table-responsive" id="tblRegistros"></div>
        </div>
    </div>
</div>


<!--SCRIPT-->
<script>
    var master_url = base_url + 'index.php/Existencias/';
    var pnlTablero = $("#pnlTablero");

    var tableOptionsE = {
        "dom": 'Bfrti',
        buttons: buttons,
        language: lang,
        "autoWidth": true,
        "colReorder": true,
        "displayLength": 500,
        "bStateSave": true,
        "scrollY": 380,
        "scrollX": true,
        "bLengthChange": false,
        "deferRender": true,
        "scrollCollapse": true,
        "bSort": true,
        "columnDefs": [
            {
                "targets": [2],
                "width": "280px"
            },
            {
                "targets": [3],
                "width": "200px"
            },
            {
                "targets": [4],
                "width": "360px"
            }
        ]
    };

    $(document).ready(function () {
        $("[name='Tienda']").change(function () {
            getExistenciasByTienda($(this).val());
        });
        getExistenciasByTienda("<?php echo $this->session->userdata('TIENDA'); ?>");
        getTiendasConExistencias();
        handleEnter();
    });

    function getEncabezadoSerieXEstilo(Estilo) {
        $.ajax({
            url: master_url + 'getEncabezadoSerieXEstilo',
            type: "POST",
            dataType: "JSON",
            data: {
                Estilo: Estilo
            }
        }).done(function (data, x, jq) {
            $('#tblExistencias thead th:not(:nth-child(1)):not(:nth-child(2)):not(:nth-child(3)):not(:nth-child(4)):not(:nth-child(5))').each(function () {
                $(this).removeClass("d-none");
            });
            var thead = $('#tblExistencias thead th');
            thead.eq(2).text('Tienda');
            thead.eq(3).text('Estilo');
            thead.eq(4).text('Color');
            var cont = 5;
            $.each(data[0], function (k, v) {
                if (parseInt(v) <= 0) {
                    thead.eq(cont).text('');
                } else {
                    thead.eq(cont).text(v);
                }
                cont++;
            });
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
        });
    }

    function getExistenciasByTienda(Tienda) {
        temp = 0;
        HoldOn.open({
            theme: "sk-bounce",
            message: "CARGANDO DATOS..."
        });
        $.ajax({
            url: master_url + 'getExistenciasByTienda',
            type: "POST",
            dataType: "JSON",
            data: {
                Tienda: Tienda
            }
        }).done(function (data, x, jq) {
            if (data.length > 0) {
                $("#tblRegistros").html(getTable('tblExistencias', data));
                $('#tblExistencias tfoot th').each(function () {
                    $(this).addClass('d-none');
                });

//                $('#tblExistencias tfoot th').each(function () {
//                    var title = $(this).text();
//                    $(this).html('<div  style="overflow-x:auto; "><div class="form-group "><input type="text" placeholder="Buscar por ' + title + '" class="form-control form-control-sm" style="width: 100%;"/></div></div>');
//                });

                var thead = $('#tblExistencias thead th');
                var tfoot = $('#tblExistencias tfoot th');
                thead.eq(0).addClass("d-none");
                tfoot.eq(0).addClass("d-none");
                thead.eq(1).addClass("d-none");
                tfoot.eq(1).addClass("d-none");
                $.each($.find('#tblExistencias tbody tr'), function (k, v) {
                    var td = $(v).find("td");
                    td.eq(0).addClass("d-none");
                    td.eq(1).addClass("d-none");
                });
                var tblSelected = $('#tblExistencias').DataTable(tableOptionsE);
                $('#tblExistencias_filter input[type=search]').focus();

                $.each($('#tblExistencias tbody tr td:not(:nth-child(1)):not(:nth-child(2)):not(:nth-child(3)):not(:nth-child(4)):not(:nth-child(5))'), function (k, v) {
                    if (parseFloat($(this).text()) === 0) {
                        $(this).text('-');

                    } else if (parseFloat($(this).text()) > 0) {
                        $(this).addClass('exists');
                    }
                });

                var cellEstilo;
                $("#tblRegistros").find('#tblExistencias tbody').on('click', 'tr', function () {
                    $("#tblExistencias tbody tr").removeClass("success");
                    $(this).addClass("success");
                    var cells = $(this).find("td");
                    cellEstilo = cells.eq(1).text();
                    getEncabezadoSerieXEstilo(cellEstilo);

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

    function getSerieXEstilo(Estilo) {
        HoldOn.open({theme: 'sk-bounce', message: 'ESPERE...'});
        $.ajax({
            url: master_url + 'getSerieXEstilo',
            type: "POST",
            dataType: "JSON",
            data: {
                Estilo: Estilo
            }
        }).done(function (data, x, jq) {
            $.each(data[0], function (k, v) {
                $('#mdlInfoExistencia').find("[name='" + k + "']").val(v);
            });
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }

    function getTiendasConExistencias() {
        HoldOn.open({theme: 'sk-bounce', message: 'ESPERE...'});
        $.ajax({
            url: master_url + 'getTiendasConExistencias',
            type: "POST",
            dataType: "JSON"
        }).done(function (data, x, jq) {
            $.each(data, function (k, v) {
                $("[name='Tienda']")[0].selectize.addOption({text: v.Tienda, value: v.ID});
            });
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }

</script>
<style>
    .Stock{
        font-weight: bold;
        color: #78a864;
    }
    .NoStock {
        font-weight: bold;
        color: #ff0000;
    }
</style>