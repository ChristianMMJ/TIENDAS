<div class="card " id="pnlTablero">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-8 float-left">
                <legend class="float-left">Existencias</legend>
            </div>
            <div class="col-sm-4" >
                <label for="Tienda">Tienda*</label>
                <select class="form-control form-control-sm required"  name="Tienda"> 
                    <option value=""></option>  
                </select>
            </div>
        </div>
        <div class="card-block">
            <div class="table-responsive" id="tblRegistros"></div>
        </div>
    </div>
</div>
<!--MODAL EXISTENCIAS--> 
<!--Confirmacion-->
<div class="modal fade modal-fullscreen" id="mdlInfoExixtencia" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Existencias</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label for="Mayoreo">Tallas</label> 
                <div style="overflow-x:auto; white-space: nowrap; ">
                    <input type="text" style="width: 35px;" class="numbersOnly" disabled="" name="T1">
                    <input type="text" style="width: 35px;" class="numbersOnly" disabled="" name="T2">
                    <input type="text" style="width: 35px;" class="numbersOnly" disabled="" name="T3">
                    <input type="text" style="width: 35px;" class="numbersOnly" disabled="" name="T4">
                    <input type="text" style="width: 35px;" class="numbersOnly" disabled="" name="T5">
                    <input type="text" style="width: 35px;" class="numbersOnly" disabled="" name="T6">
                    <input type="text" style="width: 35px;" class="numbersOnly" disabled="" name="T7">
                    <input type="text" style="width: 35px;" class="numbersOnly" disabled="" name="T8">
                    <input type="text" style="width: 35px;" class="numbersOnly" disabled="" name="T9">
                    <input type="text" style="width: 35px;" class="numbersOnly" disabled="" name="T10">
                    <input type="text" style="width: 35px;" class="numbersOnly" disabled="" name="T11">
                    <input type="text" style="width: 35px;" class="numbersOnly" disabled="" name="T12">
                    <input type="text" style="width: 35px;" class="numbersOnly" disabled="" name="T13">
                    <input type="text" style="width: 35px;" class="numbersOnly" disabled="" name="T14">
                    <input type="text" style="width: 35px;" class="numbersOnly" disabled="" name="T15">
                    <input type="text" style="width: 35px;" class="numbersOnly" disabled="" name="T16">
                    <input type="text" style="width: 35px;" class="numbersOnly" disabled="" name="T17">
                    <input type="text" style="width: 35px;" class="numbersOnly" disabled="" name="T18">
                    <input type="text" style="width: 35px;" class="numbersOnly" disabled="" name="T19">
                    <input type="text" style="width: 35px;" class="numbersOnly" disabled="" name="T20">
                    <input type="text" style="width: 35px;" class="numbersOnly" disabled="" name="T21">
                    <input type="text" style="width: 35px;" class="numbersOnly" disabled="" name="T22">
                    &nbsp;Pares
                    <br>
                    <span class="disabledForms">
                        <input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex1">
                        <input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex2">
                        <input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex3">
                        <input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex4">
                        <input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex5">
                        <input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex6">
                        <input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex7">
                        <input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex8">
                        <input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex9">
                        <input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex10">
                        <input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex11">
                        <input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex12">
                        <input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex13">
                        <input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex14">
                        <input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex15">
                        <input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex16">
                        <input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex17">
                        <input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex18">
                        <input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex19">
                        <input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex20">
                        <input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex21">
                        <input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex22">
                    </span>
                    <input type="text" style="width: 55px;" maxlength="4" class="numbersOnly" disabled=""  name="TPares">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-raised btn-primary" data-dismiss="modal">ACEPTAR</button>
            </div>
        </div>
    </div>
</div>

<!--SCRIPT-->
<script>
    var master_url = base_url + 'index.php/Existencias/';
    var pnlTablero = $("#pnlTablero");
    $(document).ready(function () {
        $("[name='Tienda']").change(function () {
            getExistenciasByTienda($(this).val());
        });
        getExistenciasByTienda("<?php echo $this->session->userdata('TIENDA'); ?>");
        getTiendas();
        handleEnter();
    });
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
                    $(this).html('');
                });

                $('#tblExistencias tfoot th').each(function () {
                    var title = $(this).text();
                    $(this).html('<div  style="overflow-x:auto; "><div class="form-group "><input type="text" placeholder="Buscar por ' + title + '" class="form-control form-control-sm" style="width: 100%;"/></div></div>');
                });
                var thead = $('#tblExistencias thead th');
                var tfoot = $('#tblExistencias tfoot th');
                thead.eq(0).addClass("d-none");
                tfoot.eq(0).addClass("d-none");
                $.each($.find('#tblExistencias tbody tr'), function (k, v) {
                    var td = $(v).find("td");
                    td.eq(0).addClass("d-none");
                });
                var tblSelected = $('#tblExistencias').DataTable(tableOptions);
                $('#tblExistencias_filter input[type=search]').focus();

                $('#tblExistencias tbody').on('click', 'tr', function () {
                    var dtm = tblSelected.row(this).data();
                    temp = parseInt(dtm[0]);

                    $("#tblExistencias tbody tr").removeClass("success");
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

                            getSerieXEstilo(data[0].Estilo);

                            $('#mdlInfoExixtencia').find("input").val("");
                            $.each(data[0], function (k, v) {
                                $('#mdlInfoExixtencia').find("[name='" + k + "']").val(v);
                            });
                            $('#mdlInfoExixtencia').modal('show');
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
                $('#mdlInfoExixtencia').find("[name='" + k + "']").val(v);
            });
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
                $("[name='Tienda']")[0].selectize.addOption({text: v.Tienda, value: v.ID});
            });
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }

</script>
