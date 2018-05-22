<nav class="navbar navbar-expand-lg navbar-dark bg-primary justify-content-between" id="navPrincipal">
    <a class="navbar-brand" href="<?php print base_url(); ?>">
        <img src="<?php print base_url(); ?>img/LS.png" width="30px">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse cursor-hand" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <?php
            if (in_array($this->session->userdata["Tipo"], array("ADMINISTRADOR", "GERENTE", "CAJERO", "SISTEMAS"))) {
                ?>
                <li class="nav-item">
                    <a class="btn btn-success my-2 my-sm-0 btnSpace btn-sm" onclick="ocultarNav();" href="<?php print base_url('Ventas') ?>">
                        <i class="fa fa-hand-holding-usd"></i>  Ventas
                    </a>
                </li>
            <?php } ?>
            <?php
            if (in_array($this->session->userdata["Tipo"], array("ADMINISTRADOR", "GERENTE", "SISTEMAS"))) {
                ?>
                <li class="nav-item dropdown">
                    <a class="btn btn-secondary my-2 my-sm-0 dropdown-toggle btnSpace btn-sm" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-cut"></i>  Caja
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?php print base_url('CortesCaja') ?>">Corte de Caja</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?php print base_url('Diversos') ?>">Movimientos Diversos</a>
                    </div>
                </li>
            <?php } ?>
            <?php
            if (in_array($this->session->userdata["Tipo"], array("ADMINISTRADOR", "GERENTE", "SISTEMAS"))) {
                ?>
                <li class="nav-item">
                    <a class="btn btn-danger my-2 my-sm-0 btnSpace btn-sm" href="<?php print base_url('Gastos') ?>">
                        <i class="fa fa-external-link-alt"></i>  Gastos
                    </a>
                </li>
            <?php } ?>
            <?php
            if (in_array($this->session->userdata["Tipo"], array("ADMINISTRADOR", "GERENTE", "SISTEMAS"))) {
                ?>
                <li class="nav-item">
                    <a class="btn btn-warning my-2 my-sm-0 btnSpace btnSpaceRight btn-sm" href="<?php print base_url('Compras') ?>">
                        <i class="fa fa-shopping-cart"></i> Compras
                    </a>
                </li>
            <?php } ?>
            <?php
            if (in_array($this->session->userdata["Tipo"], array("ADMINISTRADOR", "GERENTE", "SISTEMAS"))) {
                ?>
                <li class="nav-item dropdown">
                    <a class="btn btn-info my-2 my-sm-0 dropdown-toggle btnSpace btn-sm" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-list-alt"></i> Inventarios
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?php print base_url('Existencias') ?>">Existencias</a>
                        <a class="dropdown-item" href="<?php print base_url('Traspasos') ?>">Traspasos de Inventario</a>
                        <a class="dropdown-item" href="<?php print base_url('CapturaInventarios') ?>">Captura de Inventario Físico</a>
                        <a class="dropdown-item" href="<?php print base_url('Ubicaciones') ?>">Ubicaciones en Tienda</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?php print base_url('Reimpresion') ?>">Reimpresión de Etiquetas</a>
                    </div>
                </li>
            <?php } ?>
            <?php
            if (in_array($this->session->userdata["Tipo"], array("ADMINISTRADOR", "GERENTE", "SISTEMAS"))) {
                ?>
                <li class="nav-item dropdown">
                    <a class="btn btn-secondary my-2 my-sm-0 dropdown-toggle btnSpace btn-sm text-primary" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-dollar-sign"></i> Nómina
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?php print base_url('Prestamos') ?>">Préstamos</a>
                        <a class="dropdown-item" href="<?php print base_url('Asistencia') ?>">Asistencia</a>
                        <a class="dropdown-item" href="<?php print base_url('DiversosNomina') ?>">Movimientos Diversos</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?php print base_url('Reimpresion') ?>">Generar Nómina</a>
                    </div>
                </li>
            <?php } ?>
            <?php
            if (in_array($this->session->userdata["Tipo"], array("ADMINISTRADOR", "SISTEMAS"))) {
                ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-wrench"></i> Catálogos
                    </a>
                    <ul class="dropdown-menu " aria-labelledby="navbarDropdownMenuLink">
                        <li class="nav-item dropdown dropdown-submenu">
                            <a class="nav-link dropdown-toggle text-dark"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Generales
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="<?php print base_url('Generales/?modulo=REGIMENES FISCALES') ?>">Regimenes Fiscales</a></li>
                                <li><a class="dropdown-item" href="<?php print base_url('Generales/?modulo=TEMPORADAS') ?>">Temporadas</a></li>
                                <li><a class="dropdown-item" href="<?php print base_url('Generales/?modulo=TIPOS ESTILO') ?>">Tipos de Estilo</a></li>
                                <li><a class="dropdown-item" href="<?php print base_url('Generales/?modulo=MARCAS') ?>">Otras Marcas Zap</a></li>
                                <li><a class="dropdown-item" href="<?php print base_url('Generales/?modulo=METODOS PAGO') ?>">Métodos de Pago</a></li>
                                <li><a class="dropdown-item" href="<?php print base_url('Generales/?modulo=CONDICIONES DE PAGO') ?>">Condiciones de Pago</a></li>
                                <li><a class="dropdown-item" href="<?php print base_url('Generales/?modulo=UNIDADES') ?>">Unidades</a></li>
                                <li><a class="dropdown-item" href="<?php print base_url('Generales/?modulo=MONEDAS') ?>">Monedas</a></li>
                                <li><a class="dropdown-item" href="<?php print base_url('Generales/?modulo=ZONAS') ?>">Zonas</a></li>
                                <li><a class="dropdown-item" href="<?php print base_url('Generales/?modulo=CATEGORIAS GASTOS') ?>">Categorías Gastos</a></li>
                                <li><a class="dropdown-item" href="<?php print base_url('Generales/?modulo=GENEROS') ?>">Géneros</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown dropdown-submenu">
                            <a class="nav-link dropdown-toggle text-dark"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
        <ul class="navbar-nav navbar-right">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Bienvenido : <?php echo $this->session->userdata('USERNAME') ?>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#" onclick="onCambiarContrasena();">Cambiar Contraseña</a>
                    <a class="dropdown-item" href="#">Reportar un problema</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php print base_url('Login/onSalir'); ?>">Salir</a>
                </div>
            </li>
        </ul>
    </div>
</nav>