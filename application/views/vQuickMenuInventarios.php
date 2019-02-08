<div class="col-12">
    <div id="MnuBlock" class="col-12 row justify-content-center mt-2" align="center">
        <!--EXISTENCIAS-->
        <div class="card special-card m-3" onclick="onLoadMenuOption('Existencias')">
            <div class="card-body ">
                <span class="fa fa-expand fa-2x mt-5"></span>  
            </div>
            <div class="card-footer special-card-footer bg-transparent">EXISTENCIAS</div>
        </div>
        <!--TRASPASO DE INVENTARIO-->
        <div class="card special-card m-3" onclick="onLoadMenuOption('Traspasos')">
            <div class="card-body ">
                <span class="fa fa-expand-arrows-alt fa-2x mt-5"></span>  
            </div>
            <div class="card-footer special-card-footer bg-transparent">TRASPASO DE INVENTARIO</div>
        </div>
        <!--CAPTURA DE INVENTARIO FÍSICO-->
        <div class="card special-card m-3" onclick="onLoadMenuOption('CapturaInventarios')">
            <div class="card-body ">
                <span class="fa fa-keyboard fa-2x mt-5"></span>  
            </div>
            <div class="card-footer special-card-footer bg-transparent">CAPTURA DE INVENTARIO FÍSICO</div>
        </div>
        <!--REPORTES-->
        <div class="card special-card m-3" onclick="onLoadMenuOption('Ubicaciones')">
            <div class="card-body ">
                <span class="fa fa-map-marker-alt fa-2x mt-5"></span>  
            </div>
            <div class="card-footer special-card-footer bg-transparent">UBICACIONES EN TIENDA</div>
        </div>
        <!--REPORTES-->
        <div class="card special-card m-3" onclick="onLoadMenuOption('ReportesInventarios')">
            <div class="card-body ">
                <span class="fa fa-file fa-2x mt-5"></span>  
            </div>
            <div class="card-footer special-card-footer bg-transparent">REPORTES INVENTARIOS</div>
        </div>
        <!--REPORTES-->
        <div class="card special-card m-3" onclick="onLoadMenuOption('Reimpresion')">
            <div class="card-body ">
                <span class="fa fa-file-pdf fa-2x mt-5"></span>  
            </div>
            <div class="card-footer special-card-footer bg-transparent">REIMPRESIÓN ETIQUETAS</div>
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