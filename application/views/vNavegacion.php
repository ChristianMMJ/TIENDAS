<div id="myNav" class="overlay" >
    <a class="closebtn " onclick="closeNav()">&times;</a>
    <div class="overlay-content navbar">
        <ul class="navbar-nav mr-auto">
            <a href="<?php print base_url(); ?>"><img src="<?php print base_url(); ?>img/logo_mediano.png" width="180"></a>
            <br>
            <div class="dropdown-divider"></div>
            <!-------------------------------------CATALOGOS--------------------------------->
            <?php
            if (in_array($this->session->userdata["Tipo"], array("ADMINISTRADOR", "SISTEMAS"))) {
                ?>
                <li class="nav-item dropdown mb-2">
                    <a class="btn btn-primary btn-block dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-wrench"></i> Catálogos
                    </a>
                    <ul class="dropdown-menu dropdown-menu-transparent" aria-labelledby="navbarDropdownMenuLink">
                        <li class="nav-item dropdown mb-2 dropdown-submenu">
                            <a class="nav-link dropdown-toggle"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Generales
                            </a>
                            <ul class="dropdown-menu dropdown-menu-transparent" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="<?php print base_url('Generales/?modulo=REGIMENES FISCALES') ?>">Regimenes Fiscales</a></li>
                                <li><a class="dropdown-item" href="<?php print base_url('Generales/?modulo=TEMPORADAS') ?>">Temporadas</a></li>
                                <li><a class="dropdown-item" href="<?php print base_url('Generales/?modulo=TIPOS ESTILO') ?>">Tipos de Estilo</a></li>
                                <li><a class="dropdown-item" href="<?php print base_url('Generales/?modulo=MARCAS') ?>">Otras Marcas Zap</a></li>
                                <li><a class="dropdown-item" href="<?php print base_url('Generales/?modulo=METODOS PAGO') ?>">Métodos de Pago</a></li>
                                <li><a class="dropdown-item" href="<?php print base_url('Generales/?modulo=CONDICIONES DE PAGO') ?>">Cond. de Pago</a></li>
                                <li><a class="dropdown-item" href="<?php print base_url('Generales/?modulo=UNIDADES') ?>">Unidades</a></li>
                                <li><a class="dropdown-item" href="<?php print base_url('Generales/?modulo=MONEDAS') ?>">Monedas</a></li>
                                <li><a class="dropdown-item" href="<?php print base_url('Generales/?modulo=ZONAS') ?>">Zonas</a></li>
                                <li><a class="dropdown-item" href="<?php print base_url('Generales/?modulo=CATEGORIAS GASTOS') ?>">Categorías Gastos</a></li>
                                <li><a class="dropdown-item" href="<?php print base_url('Generales/?modulo=GENEROS') ?>">Géneros</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown mb-2 dropdown-submenu">
                            <a class="nav-link dropdown-toggle"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Nómina
                            </a>
                            <ul class="dropdown-menu dropdown-menu-transparent" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="<?php print base_url('Semanas') ?>">Semanas de Nómina</a></li>
                                <li><a class="dropdown-item" href="<?php print base_url('ConceptosNomina') ?>">Conceptos de Nómina</a></li>
                                <li><a class="dropdown-item" href="<?php print base_url('Empleados') ?>">Empleados</a></li>
                            </ul>
                        </li>
                        <li><a class="dropdown-item" href="<?php print base_url('Usuarios') ?>">Usuarios</a></li>
                        <li><a class="dropdown-item" href="<?php print base_url('Empresas') ?>">Empresas</a></li>
                        <li><a class="dropdown-item" href="<?php print base_url('Tiendas') ?>">Tiendas</a></li>
                        <li><a class="dropdown-item" href="<?php print base_url('Clientes') ?>">Clientes</a></li>
                        <li><a class="dropdown-item" href="<?php print base_url('Proveedores') ?>">Proveedores</a></li>
                        <div class="dropdown-divider" ></div>
                        <li><a class="dropdown-item" href="<?php print base_url('Estilos') ?>">Estilos</a></li>
                        <li><a class="dropdown-item" href="<?php print base_url('Lineas') ?>">Lineas</a></li>
                        <li><a class="dropdown-item" href="<?php print base_url('Combinaciones') ?>">Colores</a></li>
                        <li><a class="dropdown-item" href="<?php print base_url('Series') ?>">Series</a></li>
                        <li><a class="dropdown-item" href="<?php print base_url('Descuentos') ?>">Descuentos</a></li>
                    </ul>
                </li>
            <?php } ?> 
            <!------------------------------------- FIN CATALOGOS--------------------------------->
            <!-------------------------------------VENTAS--------------------------------->
            <?php
            if (in_array($this->session->userdata["Tipo"], array("ADMINISTRADOR", "GERENTE", "CAJERO", "SISTEMAS"))) {
                ?>

                <li class="nav-item dropdown mb-2">
                    <a class="btn btn-primary btn-block dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-hand-holding-usd"></i>  Ventas
                    </a>
                    <div class="dropdown-menu dropdown-menu-transparent" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?php print base_url('Ventas') ?>">Registrar Venta</a>
                        <a class="dropdown-item" href="<?php print base_url('Devoluciones') ?>">Devoluciones</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?php print base_url('ReportesVentas') ?>">Reportes</a>
                    </div>
                </li>
            <?php } ?>
            <!-------------------------------------CAJA--------------------------------->
            <?php
            if (in_array($this->session->userdata["Tipo"], array("ADMINISTRADOR", "GERENTE", "SISTEMAS"))) {
                ?>
                <li class="nav-item dropdown mb-2">
                    <a class="btn btn-primary btn-block dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-cut"></i>  Caja
                    </a>
                    <div class="dropdown-menu dropdown-menu-transparent" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?php print base_url('CortesCaja') ?>">Corte de Caja</a>
                        <a class="dropdown-item" href="<?php print base_url('Diversos') ?>">Movimientos Diversos</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?php print base_url('ReportesCaja') ?>">Reportes</a>
                    </div>
                </li>
            <?php } ?>
            <!-------------------------------------GASTOS--------------------------------->
            <?php
            if (in_array($this->session->userdata["Tipo"], array("ADMINISTRADOR", "GERENTE", "SISTEMAS"))) {
                ?>
                <li class="nav-item dropdown mb-2">
                    <a class="btn btn-primary btn-block dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-external-link-alt"></i>  Gastos
                    </a>
                    <div class="dropdown-menu dropdown-menu-transparent" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?php print base_url('Gastos') ?>">Gestion de Gastos</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?php print base_url('ReportesGastos') ?>">Reportes</a>
                    </div>
                </li>
            <?php } ?>
            <!-------------------------------------COMPRAS--------------------------------->
            <?php
            if (in_array($this->session->userdata["Tipo"], array("ADMINISTRADOR", "GERENTE", "SISTEMAS"))) {
                ?>
                <li class="nav-item dropdown mb-2">
                    <a class="btn btn-primary btn-block dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-shopping-cart"></i> Compras
                    </a>
                    <div class="dropdown-menu dropdown-menu-transparent" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?php print base_url('Compras') ?>">Gestion de Compras</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?php print base_url('ReportesCompras') ?>">Reportes</a>
                    </div>
                </li>
            <?php } ?>

            <!-------------------------------------INVENTARIOS--------------------------------->
            <?php
            if (in_array($this->session->userdata["Tipo"], array("ADMINISTRADOR", "GERENTE", "SISTEMAS"))) {
                ?>
                <li class="nav-item dropdown mb-2">
                    <a class="btn btn-primary btn-block dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-list-alt"></i> Inventarios
                    </a>
                    <div class="dropdown-menu dropdown-menu-transparent" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?php print base_url('Existencias') ?>">Existencias</a>
                        <a class="dropdown-item" href="<?php print base_url('Traspasos') ?>">Traspasos de Inventario</a>
                        <a class="dropdown-item" href="<?php print base_url('CapturaInventarios') ?>">Captura de Inv. Físico</a>
                        <a class="dropdown-item" href="<?php print base_url('Ubicaciones') ?>">Ubicaciones en Tienda</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?php print base_url('ReportesInventarios') ?>">Reportes Inventarios</a>
                        <a class="dropdown-item" href="<?php print base_url('Reimpresion') ?>">Reimpresión Etiquetas</a>
                    </div>
                </li>
            <?php } ?>

            <!-------------------------------------NOMINA--------------------------------->
            <?php
            if (in_array($this->session->userdata["Tipo"], array("ADMINISTRADOR", "GERENTE", "SISTEMAS"))) {
                ?>
                <li class="nav-item dropdown mb-2">
                    <a class="btn btn-primary btn-block dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-dollar-sign"></i> Nómina
                    </a>
                    <div class="dropdown-menu dropdown-menu-transparent" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?php print base_url('Prestamos') ?>">Préstamos</a>
                        <a class="dropdown-item" href="<?php print base_url('Asistencia') ?>">Asistencia</a>
                        <a class="dropdown-item" href="<?php print base_url('DiversosNomina') ?>">Movimientos Diversos</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?php print base_url('GenerarNomina') ?>">Generar Nómina</a>
                    </div>
                </li>
            <?php } ?>
            <div class="dropdown-divider"></div>
            <li class="nav-item dropdown mb-2">
                <a class="nav-link dropdown-toggle active"  id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php echo $this->session->userdata('USERNAME') ?>
                </a>
                <div class="dropdown-menu dropdown-menu-transparent" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#" onclick="onCambiarContrasena();">Cambiar Contraseña</a>
                    <a class="dropdown-item" href="#">Reportar un problema</a>
                    <a class="dropdown-item" data-toggle="modal"  href="#mdlTema">Temas</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php print base_url('logout'); ?>">Salir</a>
                </div>
            </li>
        </ul>

    </div>
</div>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="#" onclick="openNav()"> 
        <?php echo $this->session->userdata('TIENDA_NOMBRE') ?>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav mr-auto"> 
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="Nomina" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo $this->session->userdata('USERNAME') ?>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?php print base_url() ?>"><span class="fa fa-angle-right"></span> Cambiar contraseña</a>
                        <a class="dropdown-item" href="<?php print base_url() ?>"><span class="fa fa-angle-right"></span> Reportar un problema</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?php print base_url('logout') ?>"><span class="fa fa-angle-right"></span> Salir</a>
                    </div>
                </li>
            </ul>
        </form> 
    </div>
</nav> 

<!--MODAL - ASISTENCIA-->
<div id="mdlControlDeAcceso" class="modal animated fadeIn">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title">CONTROL DE ACCESO</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row" align="center">
                    <div id="ProfilePicture" class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 mb-1" >
                        <img src="<?php print base_url('img/LOSO.png'); ?>" class="img-rounded" width="175" alt="Empleado">
                        <h1 class="display-3">0000</h1>
                    </div>
                    <div id="" class="col-12 col-sm-12 col-md-12 col-xl-8 col-lg-8">
                        <div id="ProfileName" class="col-12 col-sm-12 col-md-12 col-xl-12 col-lg-12">
                            <h1 class="display-3">-</h1>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control " id="NumeroEmpleado" placeholder="CLAVE DE EMPLEADO" autofocus="">
                                <div class="input-group-prepend">
                                    <button type="button" id="btnReset" class="input-group-text "><span class="fa fa-trash"></span></button>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <p class="text-info">*Presiona ENTER para registrar tu ENTRADA o SALIDA*</p>
                        </div>
                    </div>
                    <div id="Tiempo" class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!--MODAL - TEMAS-->
<div class="modal" id="mdlTema">
    <div class="modal-dialog modal-lg special-modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Cambiar tema</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-12 row justify-content-center" align="center">

                    <div class="card special-card bg-light  m-3" style="max-width: 18rem;" onclick="onChangeTheme(1);">
                        <div class="card-header bg-transparent">TEMA POR DEFECTO</div>
                        <div class="card-body text-success">
                            <span class="fa fa-brush fa-4x"></span>
                        </div>
                        <div class="card-footer bg-transparent">TEMA POR DEFECTO</div>
                    </div>

                    <div class="card special-card bg-light  m-3" style="max-width: 18rem;" onclick="onChangeTheme(2);">
                        <div class="card-header bg-transparent">TEMA SANDSTONE</div>
                        <div class="card-body text-success">
                            <span class="fa fa-brush fa-4x"></span>
                        </div>
                        <div class="card-footer bg-transparent">TEMA SANDSTONE</div>
                    </div>

                    <div class="card special-card bg-light  m-3" style="min-width: 18rem; max-width: 18rem; cursor: pointer !important;" onclick="onChangeTheme(3);">
                        <div class="card-header bg-transparent">TEMA MINTY</div>
                        <div class="card-body text-success">
                            <span class="fa fa-brush fa-4x"></span>
                        </div>
                        <div class="card-footer bg-transparent">TEMA MINTY</div>
                    </div>

                    <div class="card special-card bg-light  m-3" style="min-width: 18rem; max-width: 18rem; cursor: pointer !important;" onclick="onChangeTheme(4);">
                        <div class="card-header bg-transparent">TEMA SLATE</div>
                        <div class="card-body text-success">
                            <span class="fa fa-brush fa-4x"></span>
                        </div>
                        <div class="card-footer bg-transparent">TEMA SLATE</div>
                    </div>

                    <div class="card special-card bg-light  m-3" style="min-width: 18rem; max-width: 18rem; cursor: pointer !important;" onclick="onChangeTheme(5);">
                        <div class="card-header bg-transparent">TEMA LUX</div>
                        <div class="card-body text-success">
                            <span class="fa fa-brush fa-4x"></span>
                        </div>
                        <div class="card-footer bg-transparent">TEMA LUX</div>
                    </div>

                    <div class="card special-card bg-light  m-3" style="min-width: 18rem; max-width: 18rem; cursor: pointer !important;" onclick="onChangeTheme(6);">
                        <div class="card-header bg-transparent">TEMA MATERIAL</div>
                        <div class="card-body text-success">
                            <span class="fa fa-brush fa-4x"></span>
                        </div>
                        <div class="card-footer bg-transparent">TEMA MATERIAL</div>
                    </div>

                    <div class="card special-card bg-light  m-3" style="min-width: 18rem; max-width: 18rem; cursor: pointer !important;" onclick="onChangeTheme(7);">
                        <div class="card-header bg-transparent">TEMA LITERA</div>
                        <div class="card-body text-success">
                            <span class="fa fa-brush fa-4x"></span>
                        </div>
                        <div class="card-footer bg-transparent">TEMA LITERA</div>
                    </div>

                    <div class="card special-card bg-light  m-3" style="min-width: 18rem; max-width: 18rem; cursor: pointer !important;" onclick="onChangeTheme(8);">
                        <div class="card-header bg-transparent">TEMA LUMEN</div>
                        <div class="card-body text-success">
                            <span class="fa fa-brush fa-4x"></span>
                        </div>
                        <div class="card-footer bg-transparent">TEMA LUMEN</div>
                    </div>

                    <div class="card special-card bg-light  m-3" style="min-width: 18rem; max-width: 18rem; cursor: pointer !important;" onclick="onChangeTheme(9);">
                        <div class="card-header bg-transparent">TEMA YETI</div>
                        <div class="card-body text-success">
                            <span class="fa fa-brush fa-4x"></span>
                        </div>
                        <div class="card-footer bg-transparent">TEMA YETI</div>
                    </div>

                </div>
            </div>
            <div class="modal-footer"> 
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<script>
    var mdlControlDeAcceso = $("#mdlControlDeAcceso");
    var NumeroEmpleado = mdlControlDeAcceso.find("#NumeroEmpleado");
    var Semana = 0;
    $(document).ready(function () {
        loop();
        NumeroEmpleado.keyup(function (e) {
            if (e.keyCode === 13) {
                onLogIn();
                NumeroEmpleado.val('');
            }
        });

        $('#myNav > li:not(ul)').click(function (event) {
            event.stopPropagation();
        });

        $("#btnAcceso").click(function () {
            onAcceso();
        });

        mdlControlDeAcceso.on('shown.bs.modal', function () {
            mdlControlDeAcceso.find("#NumeroEmpleado").focus();
        });
    });
    var acceso = function () {
        swal("Escriba su numero de empleado", {
            buttons: {
                cancel: "Cancelar",
                access: "Acceder"
            },
            content: "input"
        }).then((value) => {
            console.log(value);
            if (parseFloat(value) > 0) {
                $.post(base_url + 'index.php/Asistencia/onAcceder', {Numero: parseInt(value)}).done(function (data) {
                    swal('Exito', `El empleado ${value} ha ingresado correctamente`, 'success');
                    onBeep(6);
                }).fail(function (x, y, z) {
                    swal('Error', `No ha sido posible ingresar al empleado ${value}, intente de nuevo o más tarde`, 'error');
                    console.log(x, x.responseText, z);
                    console.log(x, y, z);
                });
            } else {
                if (value !== null) {
                    switch (value) {
                        case "cancel":
                            onBeep(3);
                            break;
                        default:
                            acceso();
                            onBeep(2);
                            break;
                    }
                }
            }
        });
    };


    function formattedDate(d = new Date) {
        let month = String(d.getMonth() + 1);
        let day = String(d.getDate());
        const year = String(d.getFullYear());

        if (month.length < 2)
            month = '0' + month;
        if (day.length < 2)
            day = '0' + day;

        return `${day}/${month}/${year}`;
    }

    function checkTime(i) {
        if (i < 10) {
            i = "0" + i;
        }
        return i;
    }

    function onLogIn() {
        var ne = NumeroEmpleado.val();
        console.log(ne, typed);
        if ($.isNumeric(ne)) {
            $.post(base_url + 'index.php/Asistencia/onAcceder', {Numero: parseInt(ne)}).done(function (data) {
                console.log(data);
                if (data.length > 0) {
                    var info = JSON.parse(data);
                    console.log('* DATA *', info[0]);
                    mdlControlDeAcceso.find("#ProfilePicture h1").text(ne);
                    mdlControlDeAcceso.find("#ProfilePicture > img ").attr('src', (info[0].FOTO !== null ? base_url + info[0].FOTO : base_url + 'img/LOSO.png'));
                    mdlControlDeAcceso.find("#ProfileName > h1 ").text(info[0].Empleado);
                    swal({
                        title: 'GRACIAS',
                        text: '',
                        timer: 350,
                        buttons: false,
                        closeOnEsc: true,
                        closeOnClickOutside: true
                    });
                    onBeep(6);
                } else {
                    onBeep(2);
                    swal({
                        title: 'EL EMPLEADO NO EXISTE',
                        text: '',
                        buttons: false,
                        closeOnEsc: true,
                        closeOnClickOutside: true
                    });
                }
            }).fail(function (x, y, z) {
                swal('Error', 'No ha sido posible ingresar al empleado ' + ne + ', intente de nuevo o más tarde', 'error');
                console.log(x, x.responseText, z);
                console.log(x, y, z);
            });
        } else {

        }
    }

    function onAcceso() {
        getInformacionSemana();
        mdlControlDeAcceso.find("#NumeroEmpleado").val('');
        mdlControlDeAcceso.modal('show');
    }

    function loop() {
        NumeroEmpleado.focus();
        var hora = new Date().getHours();
        mdlControlDeAcceso.find("#Tiempo").html('<div class="row"><div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6"><h1 class="text-danger">SEMANA ' + Semana + ' </h1></div><div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6"><h1 class="text-info">' + formattedDate() + '</h1></div></div><h1 class="text-default display-3 lead">' + hora + ':' + checkTime(new Date().getMinutes()) + ':' + checkTime(new Date().getSeconds()) + ' ' + (hora >= 12 ? 'pm' : 'am') + '</h1>');
        setTimeout(loop, 50);
    }

    function getInformacionSemana() {
        $.getJSON(base_url + 'index.php/Asistencia/getInformacionSemana').done(function (data) {
            console.log("\n * SEMANA * \n", data);
            Semana = data[0].SEMANA;
        }).fail(function (x, y, z) {
            console.log(x, x.responseText);
        }).always(function () {

        });
    }

    function onChangeTheme(th) {
        HoldOn.open({
            theme: 'sk-rect',
            message: 'Cambiando...'
        });
        $.post('<?php print base_url('cambio_tema'); ?>', {THEME: th}).done(function (d) {
            swal('ATENCIÓN', 'EL TEMA HA SIDO CAMBIADO', 'success').then((value) => {
                location.reload();
            });
        }).fail(function (x, y, z) {
            console.log(x, x.responseText);
        }).always(function () {
            HoldOn.close();
        });
    }
</script>
<style> 
    .navbar-brand {
        font-size: 14px;
    }

    .special-card{
        min-width: 18rem;
        max-width: 18rem;
        cursor: pointer !important;
    }
    .special-card:hover{
        color: #fff !important;
        background-color: #3E3F3A !important;
    }
    .special-modal-lg{
        max-width: 80%;
    } 
    .input-group-prepend, .input-group-append {
        display: -webkit-box !important;
        display: -ms-flexbox !important;
        display: flex !important;
    }

    .dropdown {
        cursor:pointer;
        font-size: 16px !important;
        color: #FAFAFA;
    }
    .dropdown-item {
        padding: 0.25rem 1rem !important;
        font-size: 14.5px !important;
        color: #A6A6A6;
    } 

    .dropdown-menu-transparent {
        background-color: transparent !important;
        border: 0px !important;
        border-radius: 0px !important;
    }

    .overlay .btn {
        width: 100%;
    }

    .overlay {
        height: 100%;
        width: 0;
        position: fixed;
        z-index: 999;
        top: 0;
        left: 0;
        background-color: rgba(13, 25, 41, 0.95);
        overflow-x: hidden;
        transition: 0.1s;
    }
    .overlay-content {
        position: relative;
        top: 5%;
        width: 100%;
        margin-top: 5px;
    }
    .overlay .closebtn {
        cursor:pointer;
        position: absolute;
        top: 0px;
        right: 20px;
        color: #fff !important;
        font-size: 30px !important;
    }
    .dropdown-item{
        transition: all 1s;
    }
    .dropdown-item:hover{
        color: #fff;
        text-decoration: none;
        background-color: #2C3E50;
        border-radius: 10px;
        text-align: center;
        font-weight: bold; 
        transition: all 0.3s;
    }
    /* width */
    ::-webkit-scrollbar {
        width: 20px;
    }

    /* Track */
    ::-webkit-scrollbar-track {
        /*background: #f1f1f1;*/ 
        background: #486071;  
    }

    /* Handle */
    ::-webkit-scrollbar-thumb {
        /*background: #888;*/ 
        background: #2C3E50;  
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
        /*background: #555;*/ 
        background: #2C3E50;  
    }
</style>