<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="<?php print base_url(''); ?>"><span class="fa fa-wrench"></span> Catálogos</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" onclick="openNav()" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav mr-auto"> 
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="Generales" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="fa fa-cog"></span>  Generales
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="<?php print base_url('Generales/?modulo=REGIMENES FISCALES') ?>"><span class="fa fa-angle-right"></span> Regimenes fiscales</a>
                    <a class="dropdown-item" href="<?php print base_url('Generales/?modulo=TEMPORADAS') ?>"><span class="fa fa-angle-right"></span> Temporadas</a>
                    <a class="dropdown-item" href="<?php print base_url('Generales/?modulo=TIPOS ESTILO') ?>"><span class="fa fa-angle-right"></span> Tipos de estilo</a>
                    <a class="dropdown-item" href="<?php print base_url('Generales/?modulo=MARCAS') ?>"><span class="fa fa-angle-right"></span> Marcas</a>
                    <a class="dropdown-item" href="<?php print base_url('Generales/?modulo=METODOS PAGO') ?>"><span class="fa fa-angle-right"></span> Métodos de pago</a>
                    <a class="dropdown-item" href="<?php print base_url('Generales/?modulo=CONDICIONES DE PAGO') ?>"><span class="fa fa-angle-right"></span> Condiciones de pago</a>
                    <a class="dropdown-item" href="<?php print base_url('Generales/?modulo=UNIDADES') ?>"><span class="fa fa-angle-right"></span> Unidades</a>
                    <a class="dropdown-item" href="<?php print base_url('Generales/?modulo=MONEDAS') ?>"><span class="fa fa-angle-right"></span> Monedas</a>
                    <a class="dropdown-item" href="<?php print base_url('Generales/?modulo=ZONAS') ?>"><span class="fa fa-angle-right"></span> Zonas</a>
                    <a class="dropdown-item" href="<?php print base_url('Generales/?modulo=CATEGORIAS GASTOS') ?>"><span class="fa fa-angle-right"></span> Categorías gastos</a>
                    <a class="dropdown-item" href="<?php print base_url('Generales/?modulo=GENEROS') ?>"><span class="fa fa-angle-right"></span> Géneros</a>

                </div>
            </li>
            <?php
            if (in_array($this->session->Tipo, array('ADMINISTRADOR'))) {
                ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="Nomina" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="fa fa-coins"></span>  Nomina
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?php print base_url('Semanas') ?>"><span class="fa fa-angle-right"></span> Semanas de nomina</a>
                        <a class="dropdown-item" href="<?php print base_url('ConceptosNomina') ?>"><span class="fa fa-angle-right"></span> Conceptos de nomina</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?php print base_url('Empleados') ?>"><span class="fa fa-angle-right"></span> Empleados</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php print base_url('Usuarios') ?>"> <span class="fa fa-user-shield"></span>  Usuarios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php print base_url('Empresas') ?>"> <span class="fa fa-industry"></span>  Empresas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php print base_url('Tiendas') ?>"> <span class="fa fa-store"></span>  Tiendas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php print base_url('Clientes') ?>"> <span class="fa fa-users"></span>  Clientes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php print base_url('Proveedores') ?>"> <span class="fa fa-truck"></span>  Proveedores</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php print base_url('Estilos') ?>"> <span class="fa fa-paint-brush"></span>  Estilos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php print base_url('Lineas') ?>"> <span class="fa fa-sliders-h"></span>  Lineas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php print base_url('Combinaciones') ?>"> <span class="fa fa-palette"></span>  Colores</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php print base_url('Series') ?>"> <span class="fa fa-ellipsis-h"></span>  Series</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php print base_url('Descuentos') ?>"> <span class="fa fa-wallet"></span>  Descuentos</a>
                </li>
                <?php
            }
            ?>
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