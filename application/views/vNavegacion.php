


<nav class="navbar navbar-expand-lg navbar-dark bg-primary justify-content-between">
    <a class="navbar-brand" href="<?php print base_url(); ?>">
        <img src="<?php print base_url(); ?>img/LS.png" width="30px">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse cursor-hand" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle " role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Mantenimiento
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

                            <li><a class="dropdown-item" href="<?php print base_url('Generales/?modulo=UNIDADES') ?>">Unidades</a></li>
                            <li><a class="dropdown-item" href="<?php print base_url('Generales/?modulo=MONEDAS') ?>">Monedas</a></li>
                            <!-- <li><a class="dropdown-item" href="<?php print base_url('Generales/?modulo=METODOS PAGO') ?>">Métodos de Pago</a></li>
                            <li><a class="dropdown-item" href="<?php print base_url('Generales/?modulo=CONDICIONES PAGO') ?>">Condiciones de Pago</a></li>
                            <li><a class="dropdown-item" href="<?php print base_url('Generales/?modulo=BANCOS') ?>">Bancos</a></li>
                             <li><a class="dropdown-item" href="<?php print base_url('Generales/?modulo=TRASPORTES') ?>">Trasnportes</a></li>
                            <li><a class="dropdown-item" href="<?php print base_url('Generales/?modulo=RUTAS') ?>">Rutas</a></li>
                            <li><a class="dropdown-item" href="<?php print base_url('Generales/?modulo=ZONAS') ?>">Zonas</a></li>
                            <li><a class="dropdown-item" href="<?php print base_url('Generales/?modulo=DEFECTOS') ?>">Defectos</a></li>-->
                        </ul>
                    </li>

                    <li><a class="dropdown-item" href="<?php print base_url('Usuarios') ?>">Usuarios</a></li>
                    <li><a class="dropdown-item" href="<?php print base_url('Tiendas') ?>">Tiendas</a></li>
                    <li><a class="dropdown-item" href="<?php print base_url('Vendedores') ?>">Vendedores</a></li>
                    <li><a class="dropdown-item" href="<?php print base_url('Clientes') ?>">Clientes</a></li>
                    <li><a class="dropdown-item" href="<?php print base_url('Proveedores') ?>">Proveedores</a></li>
                    <div class="dropdown-divider" ></div>
                    <li><a class="dropdown-item" href="<?php print base_url('Estilos') ?>">Estilos</a></li>
                    <li><a class="dropdown-item" href="<?php print base_url('Lineas') ?>">Lineas</a></li>                           
                    <li><a class="dropdown-item" href="<?php print base_url('Combinaciones') ?>">Colores</a></li>
                    <li><a class="dropdown-item" href="<?php print base_url('Series') ?>">Series</a></li>

                    <!--                    <li><a class="dropdown-item" href="#">Almacenes</a></li> -->






                </ul>
            </li>


        </ul>


        <ul class="navbar-nav navbar-right">

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Bienvenido : <?php echo $this->session->userdata('USERNAME') ?>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" onclick="onCambiarContrasena();">Cambiar Contraseña</a>
                    <a class="dropdown-item" >Reportar un problema</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php print base_url('Login/onSalir'); ?>">Salir</a>
                </div>

            </li>
        </ul>





    </div>
</nav>