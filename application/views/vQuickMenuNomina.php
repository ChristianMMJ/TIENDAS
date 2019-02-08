<div class="col-12">
    <div id="MnuBlock" class="col-12 row justify-content-center mt-2" align="center">
        <!--REGISTRAR VENTA-->
        <div class="card special-card m-3" onclick="onLoadMenuOption('Prestamos')">
            <div class="card-body ">
                <span class="fa fa-money-check-alt fa-2x mt-5"></span>  
            </div>
            <div class="card-footer special-card-footer bg-transparent">PRESTAMOS</div>
        </div>
        <!--DEVOLUCIONES-->
        <div class="card special-card m-3" onclick="onLoadMenuOption('Asistencia')">
            <div class="card-body ">
                <span class="fa fa-user-check fa-2x mt-5"></span>  
            </div>
            <div class="card-footer special-card-footer bg-transparent">ASISTENCIA</div>
        </div>
        <!--REPORTES-->
        <div class="card special-card m-3" onclick="onLoadMenuOption('DiversosNomina')">
            <div class="card-body ">
                <span class="fa fa-random fa-2x mt-5"></span>  
            </div>  
            <div class="card-footer special-card-footer bg-transparent">MOVIMIENTOS DIVERSOS</div>
        </div>
        <!--REPORTES-->
        <div class="card special-card m-3" onclick="onLoadMenuOption('GenerarNomina')">
            <div class="card-body ">
                <span class="fa fa-dollar-sign fa-2x mt-5"></span>  
            </div>
            <div class="card-footer special-card-footer bg-transparent">GENERAR NÓMINA</div>
        </div>
    </div>
</div>
<script>
    function onLoadMenuOption(e) {
        window.location.href = '<?php print base_url(); ?>' + e;
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