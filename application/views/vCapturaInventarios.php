<div class="card border-0" id="pnlTablero">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6 float-left">
                <legend class="float-left">Capturas de Inventarios</legend>
            </div>
            <div class="col-sm-6 float-right" align="right">
                <button type="button" class="btn btn-primary" id="btnNuevo" data-toggle="tooltip" data-placement="left" title="Agregar"><span class="fa fa-plus"></span><br></button>
                <button type="button" class="btn btn-primary" id="btnEliminar"  data-toggle="tooltip" data-placement="top" title="Eliminar""><span class="fa fa-trash"></span><br></button>
            </div>
        </div>
        <div class="card-block">
            <div class="table-responsive" id="tblRegistros"></div>
        </div>
    </div>
</div>

<div class="card border-0 d-none" id="pnlDatos">
    <div class="card-body text-dark" >
        <!--ENCABEZADO-->
        <!--ACCIONES-->
        <div class="row">
            <div class="col-md-5 float-left">
                <h5>CAPTURA INVENTARIO: <?php echo $this->session->userdata('TIENDA_NOMBRE') ?></h5>
            </div>
            <div class="col-md-7 float-right" align="right">

                <button type="button" class="btn btn-danger btn-sm" id="btnSalir"><span class="fa fa-window-close"></span> SALIR </button>
                <button type="button"  class="btn btn-primary btn-sm d-none" id="btnFinalizar"><span class="fa fa-check "></span> FIN. CAPTURA</button>
                <button type="button" onclick="onImprimirInv()"  class="btn btn-info btn-sm d-none" id="btnImpInv"><span class="fa fa-print "></span> IMP. INVENTARIO</button>
                <button type="button" onclick="onImprimirDiferencias()" class="btn btn-warning  btn-sm d-none" id="btnImpDif"><span class="fa fa-print "></span> IMP. DIFERENCIAS</button>
                <button type="button" onclick="onActualizarInvFisAct()" class="btn btn-success  btn-sm d-none" id="btnActInvFisAct"><span class="fa fa-pencil-alt"></span> ACTUALIZAR INV. FISICO A INV. ACTUAL</button>
<!--                <button type="button" class="btn btn-primary d-none btn-sm" id="btnGuardar"><span class="fa fa-save "></span> GUARDAR</button>-->
            </div>
        </div>
        <hr>
        <!--CONTROLES PARA AGREGAR-->
        <div id="pnlControlesDetalle">
            <div class="row">
                <div class="col-12 col-md-1 col-sm-1">
                    <label for="Mes">Mes</label>
                    <input type="text" class="form-control form-control-sm numbersOnly" maxlength="2" id="Mes" name="Mes" required="">
                </div>
                <div class="col-12 col-md-1 col-sm-1">
                    <label for="Ano">Año</label>
                    <input type="text" class="form-control form-control-sm numbersOnly" maxlength="4" id="Ano" name="Ano" required="">
                </div>
                <div class="col-sm-2">
                    <label for="CodigoBarras">Código Barras</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control form-control-sm numbersOnly" id="CodigoBarras" name="CodigoBarras"  >
                        <div class="input-group-prepend">
                            <span class="input-group-text text-dark"><i class="fa fa-barcode"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-2 col-sm-2">
                    <label for="Estilo">Estilo</label>
                    <select class="form-control form-control-sm "  name="Estilo" id="Estilo">
                        <option value=""></option>
                    </select>
                </div>
                <div class="col-12 col-md-2 col-sm-2">
                    <label for="Combinacion">Color*</label>
                    <select class="form-control form-control-sm "  name="Combinacion" id="Combinacion">
                        <option value=""></option>
                    </select>
                </div>
                <div class="col-12 col-md-1 col-sm-1">
                    <label for="Talla">Talla</label>
                    <input type="text" class="form-control form-control-sm numbersOnly" maxlength="4" name="Talla" id="Talla" >
                </div>
                <div class="col-12 col-md-1 col-sm-1">
                    <label for="Cantidad">Cant.</label>
                    <input type="text" class="form-control form-control-sm numbersOnly" name="Cantidad" id="Cantidad">
                </div>
                <div class="col-12 col-md-1 col-sm-1">
                    <br>
                    <button  class="btn btn-primary btn-sm" id="btnAgregarDetalle" data-toggle="tooltip" data-placement="top" title="Agregar Producto" >
                        <i class="fa fa-plus"></i>
                    </button>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <label for="">Tallas</label>
                    <table id="tblTallas" class="table Tallas" style="overflow-x:auto; white-space: nowrap;">
                        <thead></thead>
                        <tbody>
                            <tr id="rTallas">
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
                            <tr class="disabledForms d-none" id="rExistencias">
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
        </div>
        <hr>
        <!--DETALLE-->
        <div class="" id="pnlDatosDetalle">
            <!--DETALLE-->
            <div class="row">
                <div class=" col-md-12 ">
                    <div class="row">
                        <div class="table-responsive" id="RegistrosDetalle">

                        </div>
                    </div>
                    <div class="" align="center" style="background-color: #fff ">
                        <div class="row">
                            <div class="col-sm-2">
                            </div>
                            <div class="col-sm-2 text-dark">
                                Dama<br>
                                <div id="ParesDama"><strong>0</strong></div>
                            </div>

                            <div class="col-sm-2 text-info">
                                Caballero<br>
                                <div id="ParesCaballero"><strong>0</strong></div>
                            </div>
                            <div class="col-sm-2 text-danger">

                            </div>
                            <div class="col-sm-2 text-warning">
                                Pares Totales<br>
                                <div id="Pares"><strong>0</strong></div>
                            </div>
                            <div class="col-sm-2 text-success">
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <!--FIN DETALLE-->
        </div>
    </div>
</div>

<script>
    var master_url = base_url + 'index.php/CapturaInventarios/';
    var pnlDatos = $("#pnlDatos");
    var pnlDatosDetalle = $("#pnlDatosDetalle");
    var pnlControlesDetalle = $("#pnlControlesDetalle");
    var pnlTablero = $("#pnlTablero");
    var btnNuevo = $("#btnNuevo");
    var btnEliminar = $("#btnEliminar");
    var btnFinalizar = pnlDatos.find("#btnFinalizar");
    var btnSalir = pnlDatos.find("#btnSalir");
    var currentDate = new Date();
    var AddCodigoBarras = true;

    var tblInicial = {
        "dom": 'frt',
        "autoWidth": true,
        "displayLength": 500,
        "colReorder": true,
        "bLengthChange": false,
        "deferRender": true,
        "scrollY": 220,
        "scrollCollapse": true,
        "bSort": true,
        "aaSorting": [
            [0, 'desc']/*ID*/
        ],
        language: {
            search: "Buscar:"
        }
    };
    var tblDetalleCaptura;
    var EstatusFinalizado = false;

    function onActualizarInvFisAct() {
        swal({
            title: "Estas Seguro?",
            text: "Esta Accion ya no se podrá revertir",
            icon: "info",
            buttons: ["Cancelar", "Aceptar"],
            dangerMode: false
        }).then((willDelete) => {
            if (willDelete) {
                HoldOn.open({theme: 'sk-bounce', message: 'ESPERE...'});
                $.ajax({
                    url: master_url + 'onActualizarInvFisAct',
                    type: "POST",
                    data: {
                        Mes: MesE,
                        Ano: AnoE
                    }
                }).done(function (data, x, jq) {
                    swal('Info', 'Existencias Actualizadas', 'success');
                    HoldOn.close();
                }).fail(function (x, y, z) {
                    console.log(x, y, z);
                }).always(function () {
                });
            }
        }); /*FIN SWAL*/



    }

    $(document).ready(function () {
        var mes = currentDate.getUTCMonth() + 1;
        var ano = currentDate.getUTCFullYear();

        //Agrega con codigo barras
        var EstiloCB = 0;
        var ColorCB = 0;
        var TallaCB = 0;
        pnlControlesDetalle.find("[name='CodigoBarras']").change(function () {
            if (!EstatusFinalizado) {
                if ($(this).val() !== "") {
                    EstiloCB = $(this).val().slice(0, 5).replace(/^0+/, '');
                    ColorCB = $(this).val().slice(5, 7).replace(/^0+/, '');
                    TallaCB = $(this).val().slice(7, 12).replace(/^0+/, '');
                    var Mes = pnlControlesDetalle.find("[name='Mes']");
                    var Ano = pnlControlesDetalle.find("[name='Ano']");
                    var Estilo = EstiloCB;
                    var Color = ColorCB;
                    var CantidadCaptura = 1;//Cantidad a actualizar
                    var TallaCapturada = TallaCB;

                    //Traemos la serie por estilo
                    $.ajax({
                        url: master_url + 'getEncabezadoSerieXEstilo',
                        type: "POST",
                        dataType: "JSON",
                        data: {
                            Estilo: EstiloCB
                        }
                    }).done(function (data, x, jq) {
                        $.each(data[0], function (k, v) {
                            pnlDatos.find("[name='" + k + "']").val(v);
                        });

                        //Traemos la existencia si es que existe
                        $.ajax({
                            url: master_url + 'getExistenciasXEstiloXCombinacion',
                            type: "POST",
                            dataType: "JSON",
                            data: {
                                Estilo: EstiloCB,
                                Combinacion: ColorCB,
                                Mes: Mes.val(),
                                Ano: Ano.val()
                            }
                        }).done(function (data, x, jq) {
                            if (data.length > 0) {
                                $.each(data[0], function (k, v) {
                                    if (parseInt(v) <= 0) {
                                        pnlControlesDetalle.find("[name='" + k + "']").val('0');
                                    } else if (parseInt(v) > 0) {
                                        pnlControlesDetalle.find("[name='" + k + "']").val(v);
                                    }
                                });
                                ExisteRegistro = true;
                            } else {
                                ExisteRegistro = false;
                                pnlControlesDetalle.find('#rExistencias').find("input").val("0");
                            }
                            var tallas = pnlControlesDetalle.find("#tblTallas > tbody > tr").eq(0);
                            var existencias = pnlControlesDetalle.find("#tblTallas > tbody > tr").eq(1);
                            var existenciaFinal = 0;
                            var existenciaActual = 0;
                            var PosicionActualiza = "";
                            $.each(tallas.find("input.numbersOnly"), function () {
                                console.log($(this).val());
                                if (parseFloat(TallaCapturada) === parseFloat($(this).val())) {
                                    existenciaActual = existencias.find('td').eq($(this).parent().index()).find("input").val();
                                    PosicionActualiza = existencias.find('td').eq($(this).parent().index()).find("input").attr("name");
                                    existenciaFinal = parseFloat(existenciaActual) + parseFloat(CantidadCaptura);
                                    if (ExisteRegistro) {
                                        console.log(PosicionActualiza, existenciaFinal);
                                        //Modificar cuando ya existe
                                        $.ajax({
                                            url: master_url + 'onModifcarExistenciasCaptura',
                                            type: "POST",
                                            data: {
                                                Mes: Mes.val(),
                                                Ano: Ano.val(),
                                                Estilo: Estilo,
                                                Color: Color,
                                                Posicion: PosicionActualiza,
                                                ExistenciaNueva: existenciaFinal
                                            }
                                        }).done(function (data, x, jq) {
                                            getExistenciasCapturaByMesByAno(Ano.val(), Mes.val());
                                        }).fail(function (x, y, z) {
                                            console.log(x, y, z);
                                        }).always(function () {
                                            HoldOn.close();
                                        });
                                    } else {
                                        console.log(PosicionActualiza, CantidadCaptura);
                                        //Cuando se agrega un nuevo registro
                                        $.ajax({
                                            url: master_url + 'onAgregarExistenciasCaptura',
                                            type: "POST",
                                            data: {
                                                Mes: Mes.val(),
                                                Ano: Ano.val(),
                                                Estilo: Estilo,
                                                Color: Color,
                                                Posicion: PosicionActualiza,
                                                Existencia: CantidadCaptura
                                            }
                                        }).done(function (data, x, jq) {
                                            getExistenciasCapturaByMesByAno(Ano.val(), Mes.val());
                                        }).fail(function (x, y, z) {
                                            console.log(x, y, z);
                                        }).always(function () {
                                            HoldOn.close();
                                        });
                                    }
                                }
                            });
                        }).fail(function (x, y, z) {
                            console.log(x, y, z);
                        }).always(function () {
                            HoldOn.close();
                        });
                    }).fail(function (x, y, z) {
                        console.log(x, y, z);
                    }).always(function () {
                        HoldOn.close();
                    });
                    //Reseteamos el foco
                    $(this).val('');
                    $(this).focus();
                    onCalcularMontos();
                    onCalcularMontosDamaCaballero(Mes.val(), Ano.val());
                }
            } else {
                swal('Info', 'El inventario de este mes ya fue capturado', 'info');
            }
        });

        //Inserta Detalle y guarda el movimiento
        pnlDatos.find("#btnAgregarDetalle").click(function () {
            if (!EstatusFinalizado) {
                var Estilo = pnlDatos.find("[name='Estilo']");
                var Color = pnlDatos.find("[name='Combinacion']");
                var Talla = pnlDatos.find("[name='Talla']");
                var Cantidad = pnlDatos.find("[name='Cantidad']");

                if (Estilo.val() !== '' && Color.val() !== '' && Talla.val() !== ''
                        && Cantidad.val() !== '' && Cantidad.val() > 0)
                {
                    AddCodigoBarras = false;
                    //Guarda Movimiento
                    onEscribirInventario();
                    limpiarCampos();

                } else {
                    swal({
                        title: 'INFO',
                        text: 'Completa todos los campos',
                        icon: 'warning'
                    }).then((result) => {
                        if (result) {
                            $("[name='Cantidad']").focus();
                        }
                    });
                }

            } else {
                swal('Info', 'El inventario de este mes ya fue capturado', 'info');
            }

        });

        //Cantidad
        pnlDatos.find("[name='Cantidad']").blur(function (e) {
            pnlDatos.find("#btnAgregarDetalle").trigger('click');
        });

        //Validaciones tallas
        pnlDatos.find("[name='Talla']").blur(function () {
            //Verificar que los combos de estilo y color esten llenos
            if (pnlDatos.find("[name='Estilo']").val() !== "" && pnlDatos.find("[name='Combinacion']").val() !== "") {
                var tallaCaptura = $(this).val();
                var tallaValida = false;
                var tallas = pnlControlesDetalle.find("#tblTallas > tbody > tr").eq(0);

                $.each(pnlDatos.find("#tblTallas > tbody > tr").find("input.numbersOnly").filter(':disabled'), function () {
                    var talla = pnlDatos.find("#tblTallas > tbody > tr").find("input").eq($(this).parent().index()).val();

                    if (parseFloat(talla) > 0) {
                        if (parseFloat(tallaCaptura) === parseFloat(talla)) {
                            tallaValida = true;
                            return false;
                        } else {
                            tallaValida = false;
                        }
                    }
                });
                if (!tallaValida) {
                    swal({
                        title: 'INFO',
                        text: 'Introduce una talla válida',
                        icon: 'warning'
                    }).then((result) => {
                        if (result) {
                            pnlDatos.find("[name='Talla']").val('');
                            pnlDatos.find("[name='Talla']").focus();
                        }
                    });
                }
            } else {
                swal({
                    title: 'INFO',
                    text: 'Introduce un estilo y color',
                    icon: 'warning'
                }).then((result) => {
                    if (result) {
                        pnlDatos.find("[name='Talla']").val('');
                        pnlDatos.find("[name='Estilo']")[0].selectize.focus();
                    }
                });
            }

        });

        pnlDatos.find("[name='Estilo']").change(function () {
            $("[name='Combinacion']")[0].selectize.clear(true);
            $("[name='Combinacion']")[0].selectize.clearOptions();
            getCombinacionesXEstilo($(this).val());
            getEncabezadoSerieXEstilo($(this).val());
        });

        pnlDatos.find("[name='Combinacion']").change(function () {

            var Mes = pnlControlesDetalle.find("[name='Mes']");
            var Ano = pnlControlesDetalle.find("[name='Ano']");
            getExistenciasXEstiloXCombinacion(pnlDatos.find("[name='Estilo']").val(), $(this).val(), Mes.val(), Ano.val());
        });

        //ACTUALIZAR ESTATUS A FINALIZADO
        btnFinalizar.click(function () {
            swal({
                title: "Confirmar",
                text: "Deseas eliminar el registro?",
                icon: "warning",
                buttons: ["Cancelar", "Aceptar"],
                dangerMode: true
            }).then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: master_url + 'onModificarEstatus',
                        type: "POST",
                        data: {
                            Mes: MesE,
                            Ano: AnoE
                        }
                    }).done(function (data, x, jq) {
                        getRecords();
                        pnlDatos.find('#btnImpInv').removeClass('d-none');
                        pnlDatos.find('#btnImpDif').removeClass('d-none');
                        pnlDatos.find('#btnActInvFisAct').removeClass('d-none');
                        pnlControlesDetalle.find('input').prop("disabled", true);
                        pnlDatos.find('#Estilo')[0].selectize.disable();
                        pnlDatos.find('#Combinacion')[0].selectize.disable();
                        btnFinalizar.addClass('d-none');
                        getExistenciasCapturaFinalizadaByMesByAno(AnoE, MesE);
                    }).fail(function (x, y, z) {
                        console.log(x, y, z);
                    }).always(function () {
                    });
                }
            });



        });
        btnNuevo.click(function () {
            pnlTablero.addClass("d-none");
            pnlDatos.removeClass('d-none');
            pnlDatos.find("input").val("");
            pnlDatos.find("#Mes").val(mes - 1);
            pnlDatos.find("#Ano").val(ano);

            pnlDatos.find('#btnFinalizar').addClass('d-none');
            pnlDatos.find('#btnImpInv').addClass('d-none');
            pnlDatos.find('#btnImpDif').addClass('d-none');
            pnlDatos.find('#btnActInvFisAct').addClass('d-none');
            pnlControlesDetalle.removeClass('disabledForms');

            pnlDatos.find('#Ano').removeClass('disabledForms');
            pnlDatos.find('#Mes').removeClass('disabledForms');

            pnlDatos.find('#Ano').prop("disabled", false);
            pnlDatos.find('#Mes').prop("disabled", false);
            pnlControlesDetalle.find('#CodigoBarras').prop("disabled", false);
            pnlControlesDetalle.find('#Talla').prop("disabled", false);
            pnlControlesDetalle.find('#Cantidad').prop("disabled", false);
            pnlControlesDetalle.find('#Estilo')[0].selectize.enable();
            pnlControlesDetalle.find('#Combinacion')[0].selectize.enable();

            $('#Encabezado').removeClass('disabledForms');
            $.each(pnlDatos.find("select"), function (k, v) {
                pnlDatos.find("select")[k].selectize.clear(true);
            });
            $('#CodigoBarras').focus();

            //Consultar inventario a capturar
            $.ajax({
                url: master_url + 'getEstatusInicial',
                type: "POST",
                data: {
                    Mes: mes - 1,
                    Ano: ano
                }
            }).done(function (data, x, jq) {
                var dtm = JSON.parse(data);
                if (dtm.length > 0) {
                    if (dtm[0].Estatus === 'FINALIZADO') {
                        EstatusFinalizado = true;
                        getExistenciasCapturaFinalizadaByMesByAno(ano, mes - 1);
                    } else {
                        EstatusFinalizado = false;
                        getExistenciasCapturaByMesByAno(ano, mes - 1);
                    }
                    onCalcularMontosDamaCaballero(mes - 1, ano);
                }
            }).fail(function (x, y, z) {
                console.log(x, y, z);
            }).always(function () {
            });



        });
        btnSalir.click(function () {
            pnlTablero.removeClass("d-none");
            pnlDatos.addClass('d-none');
            getRecords();
        });
        btnEliminar.click(function () {
            swal({
                title: "Confirmar",
                text: "Deseas eliminar el registro?",
                icon: "warning",
                buttons: ["Cancelar", "Aceptar"],
                dangerMode: true
            }).then((willDelete) => {
                if (willDelete) {
                    HoldOn.open({
                        theme: "sk-bounce",
                        message: "CARGANDO DATOS..."
                    });
                    $.ajax({
                        url: master_url + 'onEliminar',
                        type: "POST",
                        data: {
                            Mes: MesE,
                            Ano: AnoE
                        }
                    }).done(function (data, x, jq) {
                        getRecords();
                    }).fail(function (x, y, z) {
                        console.log(x, y, z);
                    }).always(function () {
                        HoldOn.close();
                    });
                }
            });

        });

        getRecords();
        getEstilos();
        handleEnter();
    });

    function onImprimirDiferencias() {
        HoldOn.open({theme: 'sk-bounce', message: 'ESPERE...'});
        $.ajax({
            url: master_url + 'onImprimirDiferencias',
            type: "POST",
            data: {
                Mes: MesE,
                Ano: AnoE
            }
        }).done(function (data, x, jq) {
            console.log(data);
            if (data.length > 0) {
                onNotify('<span class="fa fa-check fa-lg"></span>', 'REPORTE GENERADO', 'success');
                window.open(data, '_blank');
            } else {
                onNotify('<span class="fa fa-exclamation fa-lg"></span>', 'NO EXISTEN DATOS PARA EL REPORTE', 'danger');
            }
            HoldOn.close();
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
        });
    }

    function onImprimirInv() {
        HoldOn.open({theme: 'sk-bounce', message: 'ESPERE...'});
        $.ajax({
            url: master_url + 'onImprimirInv',
            type: "POST",
            data: {
                Mes: MesE,
                Ano: AnoE
            }
        }).done(function (data, x, jq) {
            console.log(data);
            if (data.length > 0) {
                onNotify('<span class="fa fa-check fa-lg"></span>', 'REPORTE GENERADO', 'success');
                window.open(data, '_blank');
            } else {
                onNotify('<span class="fa fa-exclamation fa-lg"></span>', 'NO EXISTEN DATOS PARA EL REPORTE', 'danger');
            }
            HoldOn.close();
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
        });
    }

    function onEscribirInventario() {
        isValid('pnlDatos');
        if (valido) {
            var Mes = pnlControlesDetalle.find("[name='Mes']");
            var Ano = pnlControlesDetalle.find("[name='Ano']");
            var Estilo = pnlControlesDetalle.find("[name='Estilo']");
            var Color = pnlControlesDetalle.find("[name='Combinacion']");
            var CantidadCaptura = pnlControlesDetalle.find("[name='Cantidad']").val();//Cantidad a actualizar
            var TallaCapturada = pnlControlesDetalle.find("[name='Talla']").val();//Verificar que talla
            var tallas = pnlControlesDetalle.find("#tblTallas > tbody > tr").eq(0);
            var existencias = pnlControlesDetalle.find("#tblTallas > tbody > tr").eq(1);
            var existenciaFinal = 0;
            var existenciaActual = 0;
            var PosicionActualiza = "";
            $.each(tallas.find("input.numbersOnly"), function () {
                if (parseFloat(TallaCapturada) === parseFloat($(this).val())) {
                    existenciaActual = existencias.find('td').eq($(this).parent().index()).find("input").val();
                    PosicionActualiza = existencias.find('td').eq($(this).parent().index()).find("input").attr("name");
                    existenciaFinal = parseFloat(existenciaActual) + parseFloat(CantidadCaptura);
                    if (ExisteRegistro) {
                        console.log(PosicionActualiza, existenciaFinal);
                        //Modificar cuando ya existe
                        $.ajax({
                            url: master_url + 'onModifcarExistenciasCaptura',
                            type: "POST",
                            data: {
                                Mes: Mes.val(),
                                Ano: Ano.val(),
                                Estilo: Estilo.val(),
                                Color: Color.val(),
                                Posicion: PosicionActualiza,
                                ExistenciaNueva: existenciaFinal
                            }
                        }).done(function (data, x, jq) {
                            getExistenciasCapturaByMesByAno(Ano.val(), Mes.val());
                        }).fail(function (x, y, z) {
                            console.log(x, y, z);
                        }).always(function () {
                            HoldOn.close();
                        });
                    } else {
                        console.log(PosicionActualiza, CantidadCaptura);
                        //Cuando se agrega un nuevo registro
                        $.ajax({
                            url: master_url + 'onAgregarExistenciasCaptura',
                            type: "POST",
                            data: {
                                Mes: Mes.val(),
                                Ano: Ano.val(),
                                Estilo: Estilo.val(),
                                Color: Color.val(),
                                Posicion: PosicionActualiza,
                                Existencia: CantidadCaptura
                            }
                        }).done(function (data, x, jq) {
                            getExistenciasCapturaByMesByAno(Ano.val(), Mes.val());
                        }).fail(function (x, y, z) {
                            console.log(x, y, z);
                        }).always(function () {
                            HoldOn.close();
                        });
                    }
                }
            });
        } else {
            onNotify('<span class="fa fa-times fa-lg"></span>', '* DEBE DE COMPLETAR LOS CAMPOS REQUERIDOS *', 'danger');
        }
    }

    function onCalcularMontos() {
        var pares = 0;
        $.each(pnlDatosDetalle.find("#tblRegistrosDetalle tbody tr td"), function () {
            if ($(this).index() > 3) {
                if ($(this).text() > 0 && $(this).text() !== '-') {
                    pares += getNumberFloat($(this).text());
                }
            }
        });
        if (pnlDatosDetalle.find("#tblRegistrosDetalle > tbody > tr").length >= 1) {
            pnlDatosDetalle.find("#Pares").find("strong").text(pares);
        }
    }

    function onCalcularMontosDamaCaballero(Mes, Ano) {
        //DAMA
        $.ajax({
            url: master_url + 'getTotalDama',
            type: "POST",
            data: {
                Mes: Mes,
                Ano: Ano
            }
        }).done(function (data, x, jq) {
            var dtm = JSON.parse(data);
            pnlDatosDetalle.find("#ParesDama").find("strong").text(dtm[0].TOTAL);
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
        });

        //CABALLERO
        $.ajax({
            url: master_url + 'getTotalCaballero',
            type: "POST",
            data: {
                Mes: Mes,
                Ano: Ano
            }
        }).done(function (data, x, jq) {
            var dtm = JSON.parse(data);
            pnlDatosDetalle.find("#ParesCaballero").find("strong").text(dtm[0].TOTAL);
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
        });
    }

    function limpiarCampos() {
        $("[name='Estilo']")[0].selectize.clear(true);
        $("[name='Combinacion']")[0].selectize.clear(true);
        $("[name='Combinacion']")[0].selectize.clearOptions();
        $.each(pnlControlesDetalle.find('#tblTallas').find("input"), function () {
            $(this).val('');
        });
        $("[name='Talla']").val('');
        $("[name='Cantidad']").val('');
        $("[name='CodigoBarras']").focus();
    }
    var cellEstilo = 0;
    function getExistenciasCapturaByMesByAno(Ano, Mes) {
        $.ajax({
            url: master_url + 'getExistenciasCapturaByMesByAno',
            type: "POST",
            dataType: "JSON",
            data: {
                Mes: Mes,
                Ano: Ano
            }
        }).done(function (data, x, jq) {
            if (data.length > 0) {
                pnlDatos.find('input').val('');
                pnlDatos.find("[name='Mes']").val(Mes);
                pnlDatos.find("[name='Ano']").val(Ano);
                limpiarCampos();
                pnlDatosDetalle.find("#RegistrosDetalle").html(getTable('tblRegistrosDetalle', data));
                $('#tblRegistrosDetalle tfoot th').each(function () {
                    $(this).addClass("d-none");
                });
                $('#tblRegistrosDetalle thead th').each(function () {
                    $(this).addClass("d-none");
                });
                var thead = $('#tblRegistrosDetalle thead th');
                var tfoot = $('#tblRegistrosDetalle tfoot th');
                thead.eq(0).addClass("d-none");
                tfoot.eq(0).addClass("d-none");
                thead.eq(1).addClass("d-none");
                tfoot.eq(1).addClass("d-none");
                thead.eq(2).addClass("d-none");
                tfoot.eq(2).addClass("d-none");

                $.each($('#tblRegistrosDetalle tbody tr'), function (k, v) {
                    var td = $(v).find("td");
                    td.eq(0).addClass("d-none");
                    td.eq(1).addClass("d-none");
                    td.eq(2).addClass("d-none");
                });

                $.each($('#tblRegistrosDetalle tbody tr td:not(:nth-child(1)):not(:nth-child(2)):not(:nth-child(3)):not(:nth-child(4))'), function (k, v) {
                    if (parseFloat($(this).text()) === 0) {
                        $(this).text('-');

                    } else if (parseFloat($(this).text()) > 0) {
                        $(this).addClass('exists');
                    }
                });
                tblDetalleCaptura = pnlDatosDetalle.find("#tblRegistrosDetalle").DataTable(tblInicial);
                //Sombreado de la fila
                pnlDatosDetalle.find('#tblRegistrosDetalle tbody').on('click', 'tr', function () {
                    //Recrea los encabezados, desocultando solo los necesarios
                    $('#tblRegistrosDetalle thead th:not(:nth-child(1)):not(:nth-child(2)):not(:nth-child(3))').each(function () {
                        $(this).removeClass("d-none");
                    });
                    var thead = $('#tblRegistrosDetalle thead th');
                    thead.eq(3).text('Estilo');

                    $("#tblRegistrosDetalle tbody tr").removeClass("success");
                    $(this).addClass("success");
                    var cells = $(this).find("td");
                    cellEstilo = cells.eq(1).text();


                    $.ajax({
                        url: master_url + 'getEncabezadoSerieXEstilo',
                        type: "POST",
                        dataType: "JSON",
                        data: {
                            Estilo: cellEstilo
                        }
                    }).done(function (data, x, jq) {
                        var cont = 4;
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
                        HoldOn.close();
                    });

                });

                /*MOSTRAR PANEL PRINCIPAL*/
                pnlTablero.addClass("d-none");
                pnlDatos.removeClass('d-none');
                pnlDatosDetalle.removeClass("d-none");
                $("[name='CodigoBarras']").focus();
                onCalcularMontos();
                onCalcularMontosDamaCaballero(Mes, Ano);

            } else {
                pnlDatosDetalle.find("#RegistrosDetalle").html("");
            }
            HoldOn.close();
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {

        });
    }

    function getExistenciasCapturaFinalizadaByMesByAno(Ano, Mes) {
        $.ajax({
            url: master_url + 'getExistenciasCapturaFinalizadaByMesByAno',
            type: "POST",
            dataType: "JSON",
            data: {
                Mes: Mes,
                Ano: Ano
            }
        }).done(function (data, x, jq) {
            if (data.length > 0) {
                pnlDatos.find('input').val('');
                pnlDatos.find("[name='Mes']").val(Mes);
                pnlDatos.find("[name='Ano']").val(Ano);
                limpiarCampos();
                pnlDatosDetalle.find("#RegistrosDetalle").html(getTable('tblRegistrosDetalle', data));
                $('#tblRegistrosDetalle tfoot th').each(function () {
                    $(this).addClass("d-none");
                });
                $('#tblRegistrosDetalle thead th').each(function () {
                    $(this).addClass("d-none");
                });
                var thead = $('#tblRegistrosDetalle thead th');
                var tfoot = $('#tblRegistrosDetalle tfoot th');
                thead.eq(0).addClass("d-none");
                tfoot.eq(0).addClass("d-none");
                thead.eq(1).addClass("d-none");
                tfoot.eq(1).addClass("d-none");
                thead.eq(2).addClass("d-none");
                tfoot.eq(2).addClass("d-none");

                $.each($('#tblRegistrosDetalle tbody tr'), function (k, v) {
                    var td = $(v).find("td");
                    td.eq(0).addClass("d-none");
                    td.eq(1).addClass("d-none");
                    td.eq(2).addClass("d-none");
                });

                $.each($('#tblRegistrosDetalle tbody tr td:not(:nth-child(1)):not(:nth-child(2)):not(:nth-child(3)):not(:nth-child(4))'), function (k, v) {
                    if (parseFloat($(this).text()) === 0) {
                        $(this).text('-');

                    } else if (parseFloat($(this).text()) > 0) {
                        $(this).addClass('exists');
                    }
                });
                tblDetalleCaptura = pnlDatosDetalle.find("#tblRegistrosDetalle").DataTable(tblInicial);
                //Sombreado de la fila
                pnlDatosDetalle.find('#tblRegistrosDetalle tbody').on('click', 'tr', function () {
                    //Recrea los encabezados, desocultando solo los necesarios
                    $('#tblRegistrosDetalle thead th:not(:nth-child(1)):not(:nth-child(2)):not(:nth-child(3))').each(function () {
                        $(this).removeClass("d-none");
                    });
                    var thead = $('#tblRegistrosDetalle thead th');
                    thead.eq(3).text('Estilo');

                    $("#tblRegistrosDetalle tbody tr").removeClass("success");
                    $(this).addClass("success");
                    var cells = $(this).find("td");
                    cellEstilo = cells.eq(1).text();


                    $.ajax({
                        url: master_url + 'getEncabezadoSerieXEstilo',
                        type: "POST",
                        dataType: "JSON",
                        data: {
                            Estilo: cellEstilo
                        }
                    }).done(function (data, x, jq) {
                        var cont = 4;
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
                        HoldOn.close();
                    });

                });

                /*MOSTRAR PANEL PRINCIPAL*/
                pnlTablero.addClass("d-none");
                pnlDatos.removeClass('d-none');
                pnlDatosDetalle.removeClass("d-none");
                $("[name='CodigoBarras']").focus();
                onCalcularMontos();
                onCalcularMontosDamaCaballero(Mes, Ano);

            } else {
                pnlDatosDetalle.find("#RegistrosDetalle").html("");
            }
            HoldOn.close();
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {

        });
    }

    var MesE = 0;
    var AnoE = 0;
    function getRecords() {
        var Estatus = "";
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
                $("#tblRegistros").html(getTable('tblRegistrosCaptura', data));
                $('#tblRegistrosCaptura tfoot th').each(function () {
                    $(this).html('');
                });

                var thead = $('#tblRegistrosCaptura thead th');
                var tfoot = $('#tblRegistrosCaptura tfoot th');
                thead.eq(3).addClass("d-none");
                tfoot.eq(3).addClass("d-none");

                $.each($('#tblRegistrosCaptura tbody tr'), function (k, v) {
                    var td = $(v).find("td");
                    td.eq(3).addClass("d-none");
                });

                var tblSelected = $('#tblRegistrosCaptura').DataTable(tableOptions);
                $('#tblRegistrosCaptura_filter input[type=search]').focus();
                $('#tblRegistrosCaptura tbody').on('click', 'tr', function () {

                    $("#tblRegistrosCaptura tbody tr").removeClass("success");
                    $(this).addClass("success");
                    var dtm = tblSelected.row(this).data();
                    AnoE = parseInt(dtm[0]);
                    MesE = parseInt(dtm[1]);
                    Estatus = dtm[3];

                });
                $('#tblRegistrosCaptura tbody').on('dblclick', 'tr', function () {
                    $("#tblRegistrosCaptura tbody tr").removeClass("success");
                    $(this).addClass("success");
                    var id = this.id;
                    var index = $.inArray(id, selected);
                    if (index === -1) {
                        selected.push(id);
                    } else {
                        selected.splice(index, 1);
                    }
                    var dtm = tblSelected.row(this).data();

                    //Traer detalle
                    if (Estatus === 'FINALIZADO') {
                        getExistenciasCapturaFinalizadaByMesByAno(AnoE, MesE);
                        pnlDatos.find('#btnFinalizar').addClass('d-none');
                        pnlDatos.find('#btnImpInv').removeClass('d-none');
                        pnlDatos.find('#btnImpDif').removeClass('d-none');
                        pnlDatos.find('#btnActInvFisAct').removeClass('d-none');
                        pnlControlesDetalle.find('input').prop("disabled", true);
                        pnlDatos.find('#Estilo')[0].selectize.disable();
                        pnlDatos.find('#Combinacion')[0].selectize.disable();

                    } else {
                        getExistenciasCapturaByMesByAno(AnoE, MesE);
                        pnlDatos.find('#btnFinalizar').removeClass('d-none');
                        pnlDatos.find('#btnImpInv').addClass('d-none');
                        pnlDatos.find('#btnImpDif').addClass('d-none');
                        pnlDatos.find('#btnActInvFisAct').addClass('d-none');
                        pnlDatos.find('#Ano').addClass('disabledForms');
                        pnlDatos.find('#Mes').addClass('disabledForms');

                        pnlControlesDetalle.find('#CodigoBarras').prop("disabled", false);
                        pnlControlesDetalle.find('#Talla').prop("disabled", false);
                        pnlControlesDetalle.find('#Cantidad').prop("disabled", false);
                        pnlDatos.find('#Estilo')[0].selectize.enable();
                        pnlDatos.find('#Combinacion')[0].selectize.enable();
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
                $("#tblRegistros").html('');
            }
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }

    function getEstilos() {
        HoldOn.open({theme: 'sk-bounce', message: 'ESPERE...'});
        $.ajax({
            url: master_url + 'getEstilos',
            type: "POST",
            dataType: "JSON"
        }).done(function (data, x, jq) {
            $.each(data, function (k, v) {
                pnlDatos.find("[name='Estilo']")[0].selectize.addOption({text: v.Descripcion, value: v.ID});
            });
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
                pnlDatos.find("[name='Combinacion']")[0].selectize.addOption({text: v.Descripcion, value: v.ID});
            });
            pnlDatos.find("[name='Combinacion']")[0].selectize.open();
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }

    function getEncabezadoSerieXEstilo(Estilo) {
        HoldOn.open({theme: 'sk-bounce', message: 'ESPERE...'});
        $.ajax({
            url: master_url + 'getEncabezadoSerieXEstilo',
            type: "POST",
            dataType: "JSON",
            data: {
                Estilo: Estilo
            }
        }).done(function (data, x, jq) {
            $('#tblRegistrosDetalle thead th:not(:nth-child(1)):not(:nth-child(2)):not(:nth-child(3))').each(function () {
                $(this).removeClass("d-none");
            });
            var thead = $('#tblRegistrosDetalle thead th');
            thead.eq(3).text('Estilo');
            var cont = 4;
            $.each(data[0], function (k, v) {

                var Cant = k.replace('T', 'Ex');

                pnlDatos.find("[name='" + k + "']").val(v);

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
            HoldOn.close();
        });
    }

    var ExisteRegistro = false;
    function getExistenciasXEstiloXCombinacion(Estilo, Combinacion, Mes, Ano) {
        HoldOn.open({theme: 'sk-bounce', message: 'ESPERE...'});
        $.ajax({
            url: master_url + 'getExistenciasXEstiloXCombinacion',
            type: "POST",
            dataType: "JSON",
            data: {
                Estilo: Estilo,
                Combinacion: Combinacion,
                Mes: Mes,
                Ano: Ano
            }
        }).done(function (data, x, jq) {
            if (data.length > 0) {
                $.each(data[0], function (k, v) {
                    if (parseInt(v) <= 0) {
                        pnlControlesDetalle.find("[name='" + k + "']").val('0');
                    } else if (parseInt(v) > 0) {
                        pnlControlesDetalle.find("[name='" + k + "']").val(v);
                    }
                });
                ExisteRegistro = true;
            } else {
                ExisteRegistro = false;
                pnlControlesDetalle.find('#rExistencias').find("input").val("0");
            }
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }

    function onEliminarRegistro(IDX) {
        //DAMA
        $.ajax({
            url: master_url + 'onEliminarRegistro',
            type: "POST",
            data: {
                ID: IDX
            }
        }).done(function (data, x, jq) {
            getExistenciasCapturaByMesByAno(AnoE, MesE);
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
        });

    }


</script>
