<div class="card border-0">
    <div class="card-body text-dark customBackground" >
        <div class="row">
            <div class="col-md-6 float-left">
                <h5>REIMPRESIÓN DE ETIQUETAS <?php echo $this->session->userdata('TIENDA_NOMBRE') ?></h5>
            </div>
            <div class="col-md-6 float-right" align="right">
                <button type="button"  class="btn btn-info btn-sm" id="btnImprimitEtiquetas"><span class="fa fa-barcode"></span> IMPRIMIR ETIQUETAS</button>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-3" >
                <label for="Estilo">Estilo*</label>
                <select class="form-control form-control-sm required"  name="Estilo">
                    <option value=""></option>
                </select>
            </div>
            <div class="col-sm-3" >
                <label for="Color">Color*</label>
                <select class="form-control form-control-sm required"  name="Combinacion">
                    <option value=""></option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <label for="">Introduce la cantidad de etiquetas que deseas imprimir por punto</label>
                <table id="tblTallas" class="table Tallas" style="overflow-x:auto; white-space: nowrap;">
                    <thead></thead>
                    <tbody>
                        <tr>
                            <td><input type="text" style="width: 35px;" class="numbersOnly" disabled="" name="T1"></td>
                            <td><input type="text" style="width: 35px;" class="numbersOnly" disabled="" name="T2"></td>
                            <td><input type="text" style="width: 35px;" class="numbersOnly" disabled="" name="T3"></td>
                            <td><input type="text" style="width: 35px;" class="numbersOnly" disabled="" name="T4"></td>
                            <td><input type="text" style="width: 35px;" class="numbersOnly" disabled="" name="T5"></td>
                            <td><input type="text" style="width: 35px;" class="numbersOnly" disabled="" name="T6"></td>
                            <td><input type="text" style="width: 35px;" class="numbersOnly" disabled="" name="T7"></td>
                            <td><input type="text" style="width: 35px;" class="numbersOnly" disabled="" name="T8"></td>
                            <td><input type="text" style="width: 35px;" class="numbersOnly" disabled="" name="T9"></td>
                            <td><input type="text" style="width: 35px;" class="numbersOnly" disabled="" name="T10"></td>
                            <td><input type="text" style="width: 35px;" class="numbersOnly" disabled="" name="T11"></td>
                            <td><input type="text" style="width: 35px;" class="numbersOnly" disabled="" name="T12"></td>
                            <td><input type="text" style="width: 35px;" class="numbersOnly" disabled="" name="T13"></td>
                            <td><input type="text" style="width: 35px;" class="numbersOnly" disabled="" name="T14"></td>
                            <td><input type="text" style="width: 35px;" class="numbersOnly" disabled="" name="T15"></td>
                            <td><input type="text" style="width: 35px;" class="numbersOnly" disabled="" name="T16"></td>
                            <td><input type="text" style="width: 35px;" class="numbersOnly" disabled="" name="T17"></td>
                            <td><input type="text" style="width: 35px;" class="numbersOnly" disabled="" name="T18"></td>
                            <td><input type="text" style="width: 35px;" class="numbersOnly" disabled="" name="T19"></td>
                            <td><input type="text" style="width: 35px;" class="numbersOnly" disabled="" name="T20"></td>
                            <td><input type="text" style="width: 35px;" class="numbersOnly" disabled="" name="T21"></td>
                            <td><input type="text" style="width: 35px;" class="numbersOnly" disabled="" name="T22"></td>
                        </tr>
                        <tr class="" id="rCantidades">
                            <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex1"></td>
                            <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex2"></td>
                            <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex3"></td>
                            <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex4"></td>
                            <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex5"></td>
                            <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex6"></td>
                            <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex7"></td>
                            <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex8"></td>
                            <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex9"></td>
                            <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex10"></td>
                            <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex11"></td>
                            <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex12"></td>
                            <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex13"></td>
                            <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex14"></td>
                            <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex15"></td>
                            <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex16"></td>
                            <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex17"></td>
                            <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex18"></td>
                            <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex19"></td>
                            <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex20"></td>
                            <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex21"></td>
                            <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex22"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <label for="">Foto del Artículo</label>
                <div id="VistaPrevia" >
                    <img src="<?php echo base_url(); ?>img/camera.png" class="img-thumbnail img-fluid"/>
                </div>

            </div>
        </div>
    </div>
</div>

<script>
    var master_url = base_url + 'index.php/Reimpresion/';

    $(document).ready(function () {
        $(':input:text:enabled:visible:first').focus();

        $("[name='Estilo']").change(function () {
            $("[name='Combinacion']")[0].selectize.clear(true);
            $("[name='Combinacion']")[0].selectize.clearOptions();
            getCombinacionesXEstilo($(this).val());
            getSerieXEstilo($(this).val());
            getFotoXEstilo($(this).val());
        });

        var etiquetas = [];
        $("#btnImprimitEtiquetas").click(function () {
            var Estilo = $("[name='Estilo']");
            var Combinacion = $("[name='Combinacion']");

            var tallas = $("#tblTallas > tbody > tr").eq(0);
            var cantidades = $("#tblTallas > tbody > tr").eq(1);
            var cantidadCaptura = 0;
            var tallaCaptura = 0;

            var f = new FormData();

            $.each(tallas.find("input.numbersOnly"), function () {
                cantidadCaptura = cantidades.find('td').eq($(this).parent().index()).find("input").val();
                tallaCaptura = tallas.find('td').eq($(this).parent().index()).find("input").val();

                if (parseFloat(tallaCaptura) > 0) {
                    if (parseFloat(cantidadCaptura) > 0) {
                        var TallaF = (tallaCaptura.length <= 2) ? padLeft(tallaCaptura, 4) : tallaCaptura;
                        var EsCoTa = padLeft(Estilo.val(), 5) + '' + padLeft(Combinacion.val(), 2) + '' + TallaF;
                        var renglonEt = {
                            Estilo: Estilo.find("option:selected").text(),
                            Color: Combinacion.find("option:selected").text(),
                            Cantidad: cantidadCaptura,
                            Talla: TallaF,
                            EsCoTa: EsCoTa
                        };
                        etiquetas.push(renglonEt);

                    }
                }
            });
            f.append('Etiquetas', JSON.stringify(etiquetas));

            $.ajax({
                url: master_url + 'onImprimirEtiquetas',
                type: "POST",
                cache: false,
                contentType: false,
                processData: false,
                data: f
            }).done(function (data, x, jq) {
                console.log(data);
                if (data.length > 0) {
                    onNotify('<span class="fa fa-check fa-lg"></span>', 'REPORTE GENERADO', 'success');
                    window.open(data, '_blank');
                } else {
                    onNotify('<span class="fa fa-exclamation fa-lg"></span>', 'NO EXISTEN DATOS PARA EL REPORTE', 'danger');
                }
            }).fail(function (x, y, z) {
                console.log(x, y, z);
            }).always(function () {
                HoldOn.close();
                etiquetas = [];
            });
        });

        handleEnter();
        getEstilos();

    });

    function getEstilos() {
        HoldOn.open({theme: 'sk-bounce', message: 'ESPERE...'});
        $.ajax({
            url: master_url + 'getEstilos',
            type: "POST",
            dataType: "JSON"
        }).done(function (data, x, jq) {
            $.each(data, function (k, v) {
                $("[name='Estilo']")[0].selectize.addOption({text: v.Descripcion, value: v.ID});
            });
            $("[name='Estilo']")[0].selectize.open();
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
            $.each(data, function (k, v) {
                $("[name='Combinacion']")[0].selectize.addOption({text: v.Descripcion, value: v.ID});
            });
            $("[name='Combinacion']")[0].selectize.open();
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
            var cont = 1;
            $.each(data[0], function (k, v) {
                if (parseInt(v) <= 0) {
                    //Quita la letra T para saber la cantidad
                    var Cant = k.replace('T', '');
                    $('#tblTallas').find("[name='Ex" + Cant + "']").prop("disabled", 'disabled');
                    $('#tblTallas').find("[name='" + k + "']").val('');
                } else if (parseInt(v) > 0) {
                    $('#tblTallas').find("[name='Ex" + Cant + "']").prop("disabled", false);
                    $('#tblTallas').find("[name='" + k + "']").val(v);

                }

            });
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }

    function getFotoXEstilo(Estilo) {
        $.ajax({
            url: master_url + 'getEstiloByID',
            type: "POST",
            dataType: "JSON",
            data: {
                Estilo: Estilo
            }
        }).done(function (data, x, jq) {
            if (data.length > 0) {
                var dtm = data[0];
                if (dtm.Foto !== null && dtm.Foto !== undefined && dtm.Foto !== '') {
                    var ext = getExt(dtm.Foto);
                    if (ext === "gif" || ext === "jpg" || ext === "png" || ext === "jpeg") {
                        $("#VistaPrevia").html('<img src="' + base_url + dtm.Foto + '" class="img-thumbnail img-fluid" width="400px" />');
                    }
                    if (ext !== "gif" && ext !== "jpg" && ext !== "jpeg" && ext !== "png" && ext !== "PDF" && ext !== "Pdf" && ext !== "pdf") {
                        $("#VistaPrevia").html('<img src="' + base_url + 'img/camera.png" class="img-thumbnail img-fluid"/>');
                    }
                } else {
                    $("#VistaPrevia").html('<img src="' + base_url + 'img/camera.png" class="img-thumbnail img-fluid"/>');
                }
            }
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
        });
    }


    function padLeft(nr, n, str) {
        return Array(n - String(nr).length + 1).join(str || '0') + nr;
    }

</script>