<div class="col-12">
    <div id="MnuBlock" class="col-12 row justify-content-center mt-2" align="center">
        <!--USUARIOS-->
        <div class="card special-card m-3" onclick="onLoadMenuOption('Usuarios')">
            <div class="card-body ">
                <span class="fa fa-user-shield fa-2x mt-5"></span>  
            </div>
            <div class="card-footer special-card-footer bg-transparent">USUARIOS</div>
        </div>
        <!--EMPRESAS-->
        <div class="card special-card m-3" onclick="onLoadMenuOption('Empresas')">
            <div class="card-body ">
                <span class="fa fa-industry fa-2x mt-5"></span>  
            </div>
            <div class="card-footer special-card-footer bg-transparent">EMPRESAS</div>
        </div>
        <!--TIENDAS-->
        <div class="card special-card m-3" onclick="onLoadMenuOption('Tiendas')">
            <div class="card-body ">
                <span class="fa fa-store fa-2x mt-5"></span>  
            </div>
            <div class="card-footer special-card-footer bg-transparent">TIENDAS</div>
        </div>
        <!--CLIENTES-->
        <div class="card special-card m-3" onclick="onLoadMenuOption('Clientes')">
            <div class="card-body ">
                <span class="fa fa-users fa-2x mt-5"></span>  
            </div>
            <div class="card-footer special-card-footer bg-transparent">CLIENTES</div>
        </div>
        <!--PROVEEDORES-->
        <div class="card special-card m-3" onclick="onLoadMenuOption('Proveedores')">
            <div class="card-body ">
                <span class="fa fa-truck fa-2x mt-5"></span>  
            </div>
            <div class="card-footer special-card-footer bg-transparent">PROVEEDORES</div>
        </div>
        <!--ESTILOS-->
        <div class="card special-card m-3" onclick="onLoadMenuOption('Estilos')">
            <div class="card-body ">
                <span class="fa fa-paint-brush fa-2x mt-5"></span>  
            </div>
            <div class="card-footer special-card-footer bg-transparent">ESTILOS</div>
        </div>
        <!--LINEAS-->
        <div class="card special-card m-3" onclick="onLoadMenuOption('Lineas')">
            <div class="card-body ">
                <span class="fa fa-sliders-h fa-2x mt-5"></span>  
            </div>
            <div class="card-footer special-card-footer bg-transparent">LINEAS</div>
        </div>
        <!--COLORES-->
        <div class="card special-card m-3" onclick="onLoadMenuOption('Combinaciones')">
            <div class="card-body ">
                <span class="fa fa-palette fa-2x mt-5"></span>  
            </div>
            <div class="card-footer special-card-footer bg-transparent">COLORES</div>
        </div>
        <!--SERIES-->
        <div class="card special-card m-3" onclick="onLoadMenuOption('Series')">
            <div class="card-body ">
                <span class="fa fa-ellipsis-h fa-2x mt-5"></span>  
            </div>
            <div class="card-footer special-card-footer bg-transparent">SERIES</div>
        </div>
        <!--DESCUENTOS-->
        <div class="card special-card m-3" onclick="onLoadMenuOption('Descuentos')">
            <div class="card-body ">
                <span class="fa fa-wallet fa-2x mt-5"></span>  
            </div>
            <div class="card-footer special-card-footer bg-transparent">DESCUENTOS</div>
        </div>
    </div>
</div>
<script>
    function onLoadMenuOption(e) {
        window.location.href = '<?php print base_url(); ?>/' + e;
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