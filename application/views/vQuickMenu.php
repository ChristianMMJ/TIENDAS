<div class="col-12">
    <div id="MnuBlock" class="col-12 row justify-content-center mt-2" align="center">
        <?php
        if ($this->session->Tipo === 'ADMINISTRADOR') {
            ?>
            <div class="card special-card  m-3" onclick="onLoadMenu(0)"> 
                <div class="card-body ">
                    <span class="fa fa-wrench fa-2x mt-5 mt-5"></span>  
                </div>
                <div class="card-footer special-card-footer bg-transparent">CATÁLOGOS</div>
            </div>
            <?php
        }

        if (in_array($this->session->Tipo, array("ADMINISTRADOR", "GERENTE", "CAJERO", "VENDEDOR"))) {
            ?>
            <div class="card special-card m-3" onclick="onLoadMenu(1)">
                <div class="card-body ">
                    <span class="fa fa-hand-holding-usd fa-2x mt-5"></span>  
                </div>
                <div class="card-footer special-card-footer bg-transparent">VENTAS</div>
            </div>
            <?php
        }
        if (in_array($this->session->Tipo, array("ADMINISTRADOR", "GERENTE"))) {
            ?>
            <div class="card special-card m-3" onclick="onLoadMenu(2)">
                <div class="card-body ">
                    <span class="fa fa-cut fa-2x mt-5"></span>  
                </div>
                <div class="card-footer special-card-footer bg-transparent">CAJA</div>
            </div>

            <div class="card special-card m-3" onclick="onLoadMenu(3)">
                <div class="card-body ">
                    <span class="fa fa-external-link-alt fa-2x mt-5"></span>  
                </div>
                <div class="card-footer special-card-footer bg-transparent">GASTOS</div>
            </div>

            <div class="card special-card m-3" onclick="onLoadMenu(4)">
                <div class="card-body ">
                    <span class="fa fa-shopping-cart fa-2x mt-5"></span>  
                </div>
                <div class="card-footer special-card-footer bg-transparent">COMPRAS</div>
            </div>

            <div class="card special-card m-3" onclick="onLoadMenu(5)">
                <div class="card-body ">
                    <span class="fa fa-cube fa-2x mt-5"></span>  
                </div>
                <div class="card-footer special-card-footer bg-transparent">INVENTARIOS</div>
            </div>

            <div class="card special-card  m-3" onclick="onLoadMenu(6)">

                <div class="card-body ">
                    <span class="fa fa-dollar-sign fa-2x mt-5"></span>  
                </div>
                <div class="card-footer special-card-footer bg-transparent">NOMINA</div>
            </div> 
            <?php
        }
        ?>
        <div class="card special-card  m-3" onclick="onAcceso()">
            <div class="card-body ">
                <span class="fa fa-clock fa-2x mt-5"></span>  
            </div>
            <div class="card-footer special-card-footer bg-transparent">ACCESO</div>
        </div> 

    </div>
</div>

<!--MODAL - CATALOGOS-->
<div id="mdlCatalogos" class="modal">
    <div class="modal-dialog modal-lg modal-dialog-centered special-modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">CATÁLOGOS</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" align="center">
                <div class="col-12 row justify-content-center" align="center">

                    <div class="card special-card  m-3"  onclick="onSegundoNivel('mdlCatalogos', 'mdlCatalogosGenerales');">

                        <div class="card-body text-success">
                            <span class="fa fa-cog fa-5x mt-5"></span>  
                        </div>
                        <div class="card-footer special-card-footer bg-transparent">GENERALES</div>
                    </div>

                    <div class="card special-card  m-3"  onclick="$('#mdlCatalogos').modal('show');">

                        <div class="card-body text-success">
                            <span class="fa fa-dollar-sign fa-5x mt-5"></span>  
                        </div>
                        <div class="card-footer special-card-footer bg-transparent">NOMINA</div>
                    </div>

                    <div class="card special-card  m-3"  onclick="$('#mdlCatalogos').modal('show');">

                        <div class="card-body text-success">
                            <span class="fa fa-user-shield fa-5x mt-5"></span>  
                        </div>
                        <div class="card-footer special-card-footer bg-transparent">USUARIOS</div>
                    </div>

                    <div class="card special-card  m-3"  onclick="$('#mdlCatalogos').modal('show');">

                        <div class="card-body text-success">
                            <span class="fa fa-store fa-5x mt-5"></span>  
                        </div>
                        <div class="card-footer special-card-footer bg-transparent">TIENDAS</div>
                    </div>

                    <div class="card special-card  m-3"  onclick="$('#mdlCatalogos').modal('show');">

                        <div class="card-body text-success">
                            <span class="fa fa-users fa-5x mt-5"></span>  
                        </div>
                        <div class="card-footer special-card-footer bg-transparent">CLIENTES</div>
                    </div>

                    <div class="card special-card  m-3"  onclick="$('#mdlCatalogos').modal('show');">

                        <div class="card-body text-success">
                            <span class="fa fa-truck fa-5x mt-5"></span>  
                        </div>
                        <div class="card-footer special-card-footer bg-transparent">PROVEEDORES</div>
                    </div> 
                    <div class="card special-card  m-3"  onclick="$('#mdlCatalogos').modal('show');">

                        <div class="card-body text-success">
                            <span class="fa fa-paint-brush fa-5x mt-5"></span>  
                        </div>
                        <div class="card-footer special-card-footer bg-transparent">ESTILOS</div>
                    </div>

                    <div class="card special-card  m-3"  onclick="$('#mdlCatalogos').modal('show');">

                        <div class="card-body text-success">
                            <span class="fa fa-sliders-h fa-5x mt-5"></span>  
                        </div>
                        <div class="card-footer special-card-footer bg-transparent">LINEAS</div>
                    </div>

                    <div class="card special-card  m-3"  onclick="$('#mdlCatalogos').modal('show');">

                        <div class="card-body text-success">
                            <span class="fa fa-palette fa-5x mt-5"></span>  
                        </div>
                        <div class="card-footer special-card-footer bg-transparent">COLORES</div>
                    </div>

                    <div class="card special-card  m-3"  onclick="$('#mdlCatalogos').modal('show');">

                        <div class="card-body text-success">
                            <span class="fa fa-ellipsis-h fa-5x mt-5"></span>  
                        </div>
                        <div class="card-footer special-card-footer bg-transparent">SERIES</div>
                    </div>

                    <div class="card special-card  m-3"  onclick="$('#mdlCatalogos').modal('show');">

                        <div class="card-body text-success">
                            <span class="fa fa-wallet fa-5x mt-5"></span>  
                        </div>
                        <div class="card-footer special-card-footer bg-transparent">DESCUENTOS</div>
                    </div>

                </div>
            </div>
            <div class="modal-footer"> 
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!--MODAL CATALOGOS/GENERALES-->
<div id="mdlCatalogosGenerales" class="modal">
    <div class="modal-dialog modal-lg modal-dialog-centered special-modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">CATÁLOGOS / GENERALES</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" align="center">
                <div class="col-12 row justify-content-center" align="center">

                    <div class="card special-card  m-3"  onclick="onRef('<?php print base_url('Generales/?modulo=REGIMENES FISCALES') ?>');">

                        <div class="card-body text-success">
                            <span class="fa fa-cogs fa-5x mt-5"></span>  
                        </div>
                        <div class="card-footer special-card-footer bg-transparent">REGIMENES FISCALES</div>
                    </div>

                    <div class="card special-card  m-3"  onclick="onRef('<?php print base_url('Generales/?modulo=TEMPORADAS') ?>');">

                        <div class="card-body text-success">
                            <span class="fa fa-sun fa-5x mt-5"></span>  
                        </div>
                        <div class="card-footer special-card-footer bg-transparent">TEMPORADAS</div>
                    </div> 

                    <div class="card special-card  m-3"  onclick="onRef('<?php print base_url('Generales/?modulo=TIPOS ESTILO') ?>');">

                        <div class="card-body text-success">
                            <span class="fa fa-mortar-pestle fa-5x mt-5"></span>  
                        </div>
                        <div class="card-footer special-card-footer bg-transparent">TIPOS DE ESTILO</div>
                    </div> 

                    <div class="card special-card  m-3"  onclick="onRef('<?php print base_url('Generales/?modulo=MARCAS') ?>');">

                        <div class="card-body text-success">
                            <span class="fa fa-code-branch fa-5x mt-5"></span>  
                        </div>
                        <div class="card-footer special-card-footer bg-transparent">OTRAS MARCAS DE ZAPATO</div>
                    </div> 

                    <div class="card special-card  m-3"  onclick="onRef('<?php print base_url('Generales/?modulo=METODOS PAGO') ?>');">

                        <div class="card-body text-success">
                            <span class="fa fa-cash-register fa-5x mt-5"></span>  
                        </div>
                        <div class="card-footer special-card-footer bg-transparent">MÉTODOS DE PAGO</div>
                    </div>

                    <div class="card special-card  m-3"  onclick="onRef('<?php print base_url('Generales/?modulo=CONDICIONES DE PAGO') ?>');">

                        <div class="card-body text-success">
                            <span class="fa fa-credit-card fa-5x mt-5"></span>  
                        </div>
                        <div class="card-footer special-card-footer bg-transparent">CONDICIONES DE PAGO</div>
                    </div>

                    <div class="card special-card  m-3"  onclick="onRef('<?php print base_url('Generales/?modulo=UNIDADES') ?>');">

                        <div class="card-body text-success">
                            <span class="fa fa-grip-horizontal fa-5x mt-5"></span>  
                        </div>
                        <div class="card-footer special-card-footer bg-transparent">UNIDADES</div>
                    </div>

                    <div class="card special-card  m-3"  onclick="onRef('<?php print base_url('Generales/?modulo=MONEDAS') ?>');">

                        <div class="card-body text-success">
                            <span class="fa fa-coins fa-5x mt-5"></span>  
                        </div>
                        <div class="card-footer special-card-footer bg-transparent">MONEDAS</div>
                    </div>

                    <div class="card special-card  m-3"  onclick="onRef('<?php print base_url('Generales/?modulo=ZONAS') ?>');">

                        <div class="card-body text-success">
                            <span class="fa fa-globe-americas fa-5x mt-5"></span>  
                        </div>
                        <div class="card-footer special-card-footer bg-transparent">ZONAS</div>
                    </div>

                    <div class="card special-card  m-3"  onclick="onRef('<?php print base_url('Generales/?modulo=CATEGORIAS GASTOS') ?>');">

                        <div class="card-body text-success">
                            <span class="fa fa-exchange-alt fa-5x mt-5"></span>  
                        </div>
                        <div class="card-footer special-card-footer bg-transparent">CATEGORIAS GASTOS</div>
                    </div>

                    <div class="card special-card  m-3"  onclick="onRef('<?php print base_url('Generales/?modulo=GENEROS') ?>');">

                        <div class="card-body text-success">
                            <span class="fa fa-restroom fa-5x mt-5"></span>  
                        </div>
                        <div class="card-footer special-card-footer bg-transparent">GENEROS</div>
                    </div>

                </div>
            </div>
            <div class="modal-footer">  
                <div class="col-12 col-xs-6 col-sm-6"  align="left">
                    <button type="button" class="btn btn-success" onclick="onPrimerNivel('mdlCatalogos', 'mdlCatalogosGenerales')">Volver</button>
                </div>
                <div class="col-12 col-xs-6 col-sm-6" align="right">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div> 
            </div>
        </div>
    </div>
</div>

<!--MODAL CATALOGOS/GENERALES-->
<div id="mdlCatalogosNomina" class="modal">
    <div class="modal-dialog modal-lg modal-dialog-centered special-modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">CATÁLOGOS / NOMINA</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" align="center">
                <div class="col-12 row justify-content-center" align="center">

                    <div class="card special-card  m-3"  onclick="onRef('<?php print base_url('Generales/?modulo=REGIMENES FISCALES') ?>');">

                        <div class="card-body text-success">
                            <span class="fa fa-cogs fa-5x mt-5"></span>  
                        </div>
                        <div class="card-footer special-card-footer bg-transparent">SEMANAS DE NOMINA</div>
                    </div>

                    <div class="card special-card special-card  m-3"  onclick="onRef('<?php print base_url('Generales/?modulo=TEMPORADAS') ?>');">

                        <div class="card-body text-success">
                            <span class="fa fa-sun fa-5x mt-5"></span>  
                        </div>
                        <div class="card-footer special-card-footer bg-transparent">TEMPORADAS</div>
                    </div> 


                </div>
            </div>
            <div class="modal-footer">  
                <div class="col-12 col-xs-6 col-sm-6"  align="left">
                    <button type="button" class="btn btn-success" onclick="onPrimerNivel('mdlCatalogos', 'mdlCatalogosGenerales')">Volver</button>
                </div>
                <div class="col-12 col-xs-6 col-sm-6" align="right">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div> 
            </div>
        </div>
    </div>
</div>

<script>
    var mdlCatalogos = $('#mdlCatalogos'), mdlCatalogosGenerales = $("#mdlCatalogosGenerales");
    $(".card").addClass(" animated bounceIn");

    function onRef(e) {
        location.href = e;
    }

    function onPrimerNivel(parent, child) {
        $("#" + child).modal('hide');
        $("#" + parent).modal('show');
    }

    function onSegundoNivel(parent, child) {
        $("#" + parent).modal('hide');
        $("#" + child).modal('show');
    }
    function onLoadMenu(e) {
        window.location.href = '<?php print base_url('menu'); ?>/' + e;
    }
</script>
<style>
    .card{
        background-color: #f9f9f9;
        border-width: 1px 2px 2px;
        border-style: solid;    
        background-color: #f9f9f9;
        border-width: 1px 2px 2px;
        border-style: solid; 
        border-image: linear-gradient(to bottom, #25306B, #0099cc, rgb(0,0,0,0)) 1 100% ; 
    }
    .card:hover{
        background-color: #f9f9f9;
        border-width: 1px 2px 2px;
        border-style: solid; 
        border-image: linear-gradient(to bottom,  #2196F3, #99cc00, rgb(0,0,0,0)) 1 100% ;
    }
    .card-header{ 
        background-color: transparent;
        border-bottom: 0px;
    }
    .card:hover span { 
        background: -webkit-linear-gradient(#25306B,#25306B,#25306B ); 
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
</style>