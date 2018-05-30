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
            <div id="Existencias" class="table-responsive">
                <table id="tblExistencias" class="table table-sm display " style="width:100%">
                    <thead class="d-none">
                        <tr>
                            <th>ID</th>
                            <th>IdEstilo</th>
                            <th>Tienda</th>
                            <th>Estilo</th>
                            <th>Color</th>
                            <th>	Ex1	</th>
                            <th>	Ex2	</th>
                            <th>	Ex3	</th>
                            <th>	Ex4	</th>
                            <th>	Ex5	</th>
                            <th>	Ex6	</th>
                            <th>	Ex7	</th>
                            <th>	Ex8	</th>
                            <th>	Ex9	</th>
                            <th>	Ex10	</th>
                            <th>	Ex11	</th>
                            <th>	Ex12	</th>
                            <th>	Ex13	</th>
                            <th>	Ex14	</th>
                            <th>	Ex15	</th>
                            <th>	Ex16	</th>
                            <th>	Ex17	</th>
                            <th>	Ex18	</th>
                            <th>	Ex19	</th>
                            <th>	Ex20	</th>
                            <th>	Ex21	</th>
                            <th>	Ex22	</th>
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
    var master_url = base_url + 'index.php/Existencias/';
    var pnlTablero = $("#pnlTablero");
    var Existencias, tblExistencias = $("#tblExistencias");

    $(document).ready(function () {
        $("[name='Tienda']").change(function () {
            getExistenciasByTienda($(this).val());
        });
        getExistenciasByTienda("<?php echo $this->session->userdata('TIENDA'); ?>");
        getTiendasConExistencias();
        handleEnter();
    });

    function getExistenciasByTienda(Tienda) {
        temp = 0;
        HoldOn.open({
            theme: "sk-bounce",
            message: "CARGANDO DATOS..."
        });
        $.fn.dataTable.ext.errMode = 'throw';
        if ($.fn.DataTable.isDataTable('#tblExistencias')) {
            tblExistencias.DataTable().destroy();
            Existencias = tblExistencias.DataTable(
                    {
                        "dom": 'Bfrti',
                        "columnDefs": [
                            {
                                "targets": [0],
                                "visible": false,
                                "searchable": false
                            },
                            {
                                "targets": [1],
                                "visible": false,
                                "searchable": false
                            }],
                        language: lang,
                        "autoWidth": true,
                        "displayLength": 9999,
                        "bLengthChange": false,
                        "deferRender": true,
                        "scrollCollapse": false,
                        "bSort": false,
                        keys: true,
                        "createdRow": function (row, data, index) {
                            $.each($(row).find("td"), function (k, v) {
                                if (data[0] === "") {
                                    $(v).addClass('Serie');
                                } else {
                                    $(row).find("td:eq(0),td:eq(1),td:eq(2)").addClass("zoom");
                                }
                                if ($.isNumeric($(v).text())) {
                                    if (data[0] === "" && parseFloat($(v).text()) <= 0) {
                                        $(v).addClass('Serie');
                                        $(v).text("-");
                                    } else if (parseInt(k) > 2 && parseInt(k) < 25 && parseFloat($(v).text()) > 0) {
                                        $(v).addClass('HasStock');
                                    } else if (data[0] !== "" && parseInt(k) > 2 && parseInt(k) < 25 && parseFloat($(v).text()) === 0) {
                                        $(v).addClass('NoHasStock');
                                        $(v).text("-");
                                    }
                                }
                            });
                            /*ANCHO*/
                            $(row).find("td").eq(0).css("width", "220px");
                            $(row).find("td").eq(1).css("width", "200px");
                            $(row).find("td").eq(2).css("width", "340px");
                        }
                    });
        }
        //PARA PRUEBAS
        Existencias.clear().draw();
        $.getJSON(master_url + 'getExistenciasByTienda', {Tienda: Tienda}).done(function (existencias) {
            console.log(existencias)
            var rows;
            var Estilos = [];
            var Series = [];
            console.log('*ESTILOS*')
            $.each(existencias, function (k, e) {
                if ($.inArray(e.IdEstilo, Estilos) === -1) {
                    Estilos.push(e.IdEstilo);
                    console.log('* FIN ESTILOS*')
                    $.getJSON(master_url + 'getSerieXEstiloTRG', {Estilo: e.IdEstilo}).done(function (serie) {
                        $.each(serie, function (k, s) {
                            if ($.inArray(s.ID, Series) === -1) {
                                var b = '<strong>', bc = '</strong>', bs = '<strong class="Serie">';
                                Existencias.row.add([
                                    '', '', b + 'Tienda' + bc, b + 'Estilo' + bc, b + 'Color' + bc,
                                    s["T1"], s["T2"],
                                    s["T3"], s["T4"],
                                    s["T5"], s["T6"],
                                    s["T7"], s["T8"],
                                    s["T9"], s["T10"],
                                    s["T11"], s["T12"],
                                    s["T13"], s["T14"],
                                    s["T15"], s["T16"],
                                    s["T17"], s["T18"],
                                    s["T19"], s["T20"],
                                    s["T21"], s["T22"]
                                ]).draw(false);
                                $.each(existencias, function (k, ex) {
                                    if (s.ID === ex.Serie) {
                                        Series.push(s.ID);
                                        Existencias.row.add([
                                            ex.ID, ex.IdEstilo, ex.Tienda, ex.Estilo, ex.Color,
                                            ex["Ex1"], ex["Ex2"],
                                            ex["Ex3"], ex["Ex4"],
                                            ex["Ex5"], ex["Ex6"],
                                            ex["Ex7"], ex["Ex8"],
                                            ex["Ex9"], ex["Ex10"],
                                            ex["Ex11"], ex["Ex12"],
                                            ex["Ex13"], ex["Ex14"],
                                            ex["Ex15"], ex["Ex16"],
                                            ex["Ex17"], ex["Ex18"],
                                            ex["Ex19"], ex["Ex20"],
                                            ex["Ex21"], ex["Ex22"]
                                        ]).draw(false);
                                    }
                                });
                            }
                        });
                    }).fail(function (x, y, z) {
                        console.log(x, y, z);
                    }).always(function () {
//                        $("#tblExistencias tbody").html(rows);
                    });
                }
            });
        }).fail(function (x, y, z) {
            console.log(z, y, x);
        }).always(function () {
            HoldOn.close();
        });
        $('#tblExistencias tbody')
                .on('mouseenter', 'td', function () {
                    var colIdx = Existencias.cell(this).index().column;

                    $(Existencias.cells().nodes()).removeClass('highlight');
                    $(Existencias.column(colIdx).nodes()).addClass('highlight');
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
    function onSelect(e) {
        $("#tblExistencias > tbody > tr").find("td").removeClass('SerieActive');
        $(e).addClass("SerieActive");
    }
    function onSelectStock(e) {
        $("#tblExistencias > tbody > tr").find("td").removeClass('HasStockActive');
        $(e).addClass("HasStockActive");
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
    .HasStock{
        -webkit-transition: all .2s ease-in-out;
        transition: all .2s ease-in-out;
        background-color: #669900 !important;
        color: #fff !important;
    }
    .HasStock:hover{
        -webkit-transform: scale(1.75);
        transform: scale(1.75);
        background-color: #ffff00 !important;
        color: #000 !important;
        font-weight: bold;
    }
    .HasStockActive{
        background-color: #cc0033 !important;
        color: #fff !important;
    }
    .Serie{
        -webkit-transition: all .2s ease-in-out;
        transition: all .2s ease-in-out;
        font-weight: bold;
        background-color: #333333 !important;
        color: #fff;
    }
    .Serie:hover{
        -webkit-transform: scale(1.75);
        transform: scale(1.75);
        background-color: #ffff00 !important;
        color: #000;
    }
    .SerieActive{
        background-color: #ffff00 !important;
        color: #000;
    }
    .NoHasStock{
        background-color: #fff !important;
        color: #000 !important;
    }
    .zoom{   
        -webkit-transition: all .2s ease-in-out;
        transition: all .2s ease-in-out;
    }
    .zoom:hover{ 
        font-weight: bold;
        background-color: #3498DB !important;
        color: #fff;
        -webkit-transform: scale(1.5);
        transform: scale(1.5);
        z-index: 999999;
    }
</style>