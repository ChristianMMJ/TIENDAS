<style>
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
    .dropdown-menu {
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
</style>


<div id="myNav" class="overlay">
    <a class="closebtn " onclick="closeNav()">&times;</a>
    <div class="overlay-content navbar ">
        <ul class="navbar-nav mr-auto">
            <img src="<?php print base_url(); ?>img/logo_mediano.png" width="160">
            <br>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle active"  id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php echo $this->session->userdata('USERNAME') ?>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#" onclick="onCambiarContrasena();">Cambiar Contraseña</a>
                    <a class="dropdown-item" href="#">Reportar un problema</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php print base_url('Login/onSalir'); ?>">Salir</a>
                </div>
            </li>
            <div class="dropdown-divider"></div>
            <!-------------------------------------VENTAS--------------------------------->
            <?php
            if (in_array($this->session->userdata["Tipo"], array("ADMINISTRADOR", "GERENTE", "CAJERO", "SISTEMAS"))) {
                ?>

                <li class="nav-item dropdown">
                    <a class="btn btn-success my-2 my-sm-0  btn-sm dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-hand-holding-usd"></i>  Ventas
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?php print base_url('Ventas') ?>">Registrar Venta</a>
                        <a class="dropdown-item" href="<?php print base_url('Devoluciones') ?>">Devoluciones</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?php print base_url('ReportesVentas') ?>">Reportes</a>
                    </div>
                </li>
            <?php } ?>
            <br>
            <!-------------------------------------CAJA--------------------------------->
            <?php
            if (in_array($this->session->userdata["Tipo"], array("ADMINISTRADOR", "GERENTE", "SISTEMAS"))) {
                ?>
                <li class="nav-item dropdown">
                    <a class="btn btn-secondary my-2 my-sm-0 dropdown-toggle  btn-sm" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-cut"></i>  Caja
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?php print base_url('CortesCaja') ?>">Corte de Caja</a>
                        <a class="dropdown-item" href="<?php print base_url('Diversos') ?>">Movimientos Diversos</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?php print base_url('ReportesCaja') ?>">Reportes</a>
                    </div>
                </li>
            <?php } ?>
            <br>
            <!-------------------------------------GASTOS--------------------------------->
            <?php
            if (in_array($this->session->userdata["Tipo"], array("ADMINISTRADOR", "GERENTE", "SISTEMAS"))) {
                ?>
                <li class="nav-item dropdown">
                    <a class="btn btn-danger my-2 my-sm-0  btn-sm dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-external-link-alt"></i>  Gastos
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?php print base_url('Gastos') ?>">Gestion de Gastos</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?php print base_url('ReportesGastos') ?>">Reportes</a>
                    </div>
                </li>
            <?php } ?>
            <br>
            <!-------------------------------------COMPRAS--------------------------------->
            <?php
            if (in_array($this->session->userdata["Tipo"], array("ADMINISTRADOR", "GERENTE", "SISTEMAS"))) {
                ?>
                <li class="nav-item dropdown">
                    <a class="btn btn-warning my-2 my-sm-0  btn-sm dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-shopping-cart"></i> Compras
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?php print base_url('Compras') ?>">Gestion de Compras</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?php print base_url('ReportesCompras') ?>">Reportes</a>
                    </div>
                </li>
            <?php } ?>
            <br>
            <!-------------------------------------INVENTARIOS--------------------------------->
            <?php
            if (in_array($this->session->userdata["Tipo"], array("ADMINISTRADOR", "GERENTE", "SISTEMAS"))) {
                ?>
                <li class="nav-item dropdown">
                    <a class="btn btn-info my-2 my-sm-0 dropdown-toggle  btn-sm" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-list-alt"></i> Inventarios
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
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
            <br>
            <!-------------------------------------NOMINA--------------------------------->
            <?php
            if (in_array($this->session->userdata["Tipo"], array("ADMINISTRADOR", "GERENTE", "SISTEMAS"))) {
                ?>
                <li class="nav-item dropdown">
                    <a class="btn btn-secondary my-2 my-sm-0 dropdown-toggle  btn-sm text-primary" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-dollar-sign"></i> Nómina
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?php print base_url('Prestamos') ?>">Préstamos</a>
                        <a class="dropdown-item" href="<?php print base_url('Asistencia') ?>">Asistencia</a>
                        <a class="dropdown-item" href="<?php print base_url('DiversosNomina') ?>">Movimientos Diversos</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?php print base_url('GenerarNomina') ?>">Generar Nómina</a>
                    </div>
                </li>
            <?php } ?>
            <div class="dropdown-divider"></div>
            <!-------------------------------------CATALOGOS--------------------------------->
            <?php
            if (in_array($this->session->userdata["Tipo"], array("ADMINISTRADOR", "SISTEMAS"))) {
                ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-wrench"></i> Catálogos
                    </a>
                    <ul class="dropdown-menu " aria-labelledby="navbarDropdownMenuLink">
                        <li class="nav-item dropdown dropdown-submenu">
                            <a class="nav-link dropdown-toggle"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Generales
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
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
                        <li class="nav-item dropdown dropdown-submenu">
                            <a class="nav-link dropdown-toggle"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Nómina
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
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
        </ul>

    </div>
</div>

<div class="container-fluid bg-primary" style="background-color: rgb(166,175,179);">
    <div class="row">
        <div class="col-6 mt-1 mb-1">
            <button class="btn btn-primary btn-sm " onclick="openNav()">
                <i class="fa fa-bars"></i> Menú
            </button>
        </div> 
        <div class="col-6 mt-1 mb-1" align="right">
            <span class="badge badge-primary ">
                <?php echo $this->session->userdata('TIENDA_NOMBRE') ?>
            </span>
            <button class="btn btn-primary btn-sm " id="btnAcceso">
                <i class="fa fa-check"></i> Acceso
            </button>
            <a  class="btn btn-primary btn-sm" href="<?php print base_url('Login/onSalir'); ?>" onclick="onRegistrarAccion('SALIÓ DEL SISTEMA');">
                <i class="fa fa-sign-out-alt"></i> Salir</a>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#myNav > li:not(ul)').click(function (event) {
            event.stopPropagation();
        });
        $("#btnAcceso").click(function () {
//            onBeep(5); 
            location.href = "<?php print base_url('Reloj'); ?>";
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
</script>