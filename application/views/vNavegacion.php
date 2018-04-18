<nav class="navbar navbar-expand-lg navbar-dark bg-primary justify-content-between" id="navPrincipal">
    <a class="navbar-brand" href="<?php print base_url(); ?>">
        <img src="<?php print base_url(); ?>img/LS.png" width="30px">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse cursor-hand" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="btn btn-success my-2 my-sm-0 btnSpace" onclick="ocultarNav();" href="<?php print base_url('Ventas') ?>">
                    <i class="fa fa-hand-holding-usd"></i>  Ventas
                </a>
            </li>
            
            <li class="nav-item">
                <a class="btn btn-warning my-2 my-sm-0 btnSpace btnSpaceRight" href="<?php print base_url('Compras') ?>">
                    <i class="fa fa-shopping-cart"></i> Compras
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="btn btn-info my-2 my-sm-0 dropdown-toggle btnSpace" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-list-alt"></i> Inventarios
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="<?php print base_url('Existencias') ?>">Existencias</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php print base_url('Traspasos') ?>">Traspasos de Inventario</a>
                </div>
            </li>

            <li class="nav-item dropdown">
                <a class="btn btn-secondary my-2 my-sm-0 dropdown-toggle btnSpace" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-wrench"></i> Mantenimiento
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
                            <li><a class="dropdown-item" href="<?php print base_url('Generales/?modulo=DESCUENTOS') ?>">Descuentos</a></li>
                            <!-- 
                            <li><a class="dropdown-item" href="<?php print base_url('Generales/?modulo=BANCOS') ?>">Bancos</a></li>
                             <li><a class="dropdown-item" href="<?php print base_url('Generales/?modulo=TRASPORTES') ?>">Trasnportes</a></li>
                             <li><a class="dropdown-item" href="<?php print base_url('Generales/?modulo=DEFECTOS') ?>">Defectos</a></li>-->
                        </ul>
                    </li>
                    <li><a class="dropdown-item" href="<?php print base_url('Usuarios') ?>">Usuarios</a></li>
                    <li><a class="dropdown-item" href="<?php print base_url('Tiendas') ?>">Tiendas</a></li>
                    <li><a class="dropdown-item" href="<?php print base_url('Empleados') ?>">Empleados</a></li>
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

