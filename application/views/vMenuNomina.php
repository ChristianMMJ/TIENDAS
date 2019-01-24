<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="<?php print base_url(); ?>"><span class="fa fa-dollar-sign"></span> Nomina</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="<?php print base_url('Prestamos') ?>"><span class="fa fa-money-check-alt"></span> Prestamos </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php print base_url('Asistencia') ?>"><span class="fa fa-user-check"></span> Asistencia</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php print base_url('DiversosNomina') ?>"><span class="fa fa-random"></span> Movimientos diversos</a>
            </li> 
            <li class="nav-item">
                <a class="nav-link" href="<?php print base_url('GenerarNomina') ?>"><span class="fa fa-dollar-sign"></span> Generar nomina</a>
            </li>
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