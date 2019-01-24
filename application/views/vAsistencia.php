<div class="card border-0" id="pnlTablero">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6 float-left">
                <legend class="float-left">Gestión de asistencias</legend>
            </div>
            <div class="col-sm-6 float-right" align="right">
                <button type="button" class="btn btn-warning" id="btnRefrescar" data-toggle="tooltip" data-placement="left" title="Refrescar">
                    <span class="fa fa-sync-alt"></span><br></button>
            </div>
        </div>
        <div class="card-block">
            <div id="Asistencias" class="table-responsive">
                <table id="tblAsistencias" class="table table-sm display " style="width:100%">
                    <thead>  
                        <tr>
                            <th>ID</th>
                            <th>Usuario</th>
                            <th>Número</th>
                            <th>Fecha</th>
                            <th>Hora</th>
                            <th>Tipo</th>
                            <th>Estatus</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    var master_url = base_url + 'index.php/Asistencia/';
    var tblAsistencias = $('#tblAsistencias');
    var Asistencias;
    var current_rows = 0;
    var btnRefrescar = $("#btnRefrescar");
    $(document).ready(function () {
        btnRefrescar.click(function () {
            getRecords();
        });
        btnRefrescar.trigger('click');
    });

    function loop() {
        Asistencias.ajax.reload();
        setTimeout(loop, 2500);
        console.log('Verificando...')
    }

    function getRecords() {
        temp = 0;
        HoldOn.open({
            theme: 'sk-cube',
            message: 'CARGANDO...'
        });
        $.fn.dataTable.ext.errMode = 'throw';
        if ($.fn.DataTable.isDataTable('#tblAsistencias')) {
            tblAsistencias.DataTable().destroy();
        }
        Asistencias = tblAsistencias.DataTable({
            "dom": 'Bfrtip',
            buttons: buttons,
            "ajax": {
                "url": master_url + 'getRecords',
                "dataSrc": ""
            },
            "columns": [
                {"data": "ID"}, {"data": "Usuario"}, {"data": "Numero"}, {"data": "Fecha"}, {"data": "Hora"}, {"data": "Tipo"}, {"data": "Estatus"}
            ],
            "columnDefs": [
                {
                    "targets": [0],
                    "visible": false,
                    "searchable": false
                }
            ],
            language: lang,
            select: true,
            "autoWidth": true,
            "colReorder": true,
            "displayLength": 20,
            "bLengthChange": false,
            "deferRender": true,
            "scrollCollapse": false,
            "bSort": true,
            "aaSorting": [
                [0, 'desc']/*ID*/
            ]
        });

        $('#tblAsistencias_filter input[type=search]').focus();

        tblAsistencias.find('tbody').on('click', 'tr', function () {
            tblAsistencias.find("tbody tr").removeClass("success");
            $(this).addClass("success");
            var dtm = Asistencias.row(this).data();
            temp = parseInt(dtm.ID);
        });
        tblAsistencias.find('tbody').on('dblclick', 'tr', function () {
            nuevo = false;
            tblAsistencias.find("tbody tr").removeClass("success");
            $(this).addClass("success");
            var dtm = Asistencias.row(this).data();
            temp = parseInt(dtm.ID);
        });
        HoldOn.close();
        loop();
    }
</script>
<style>
    /*https://codepen.io/sdthornton/pen/wBZdXq*/
    .btn-warning{
        box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);
    }
    .btn-warning:hover {
        box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
    }

    div.table-responsive tbody tr:hover td{
        color: #000 !important;
        font-weight: bold !important; 
        background-color: #fff !important;
        box-shadow: inset 0 -1px 0 #0099cc; 
    }
    div.table-responsive tbody tr:hover td:hover{ 
        box-shadow: inset 0 -2px 0 #0099cc;
    }
    tbody tr.selected td{
        color: #fff !important;
        background-color: #0099cc !important;
    }
    div.table-responsive tbody tr:not(.Serie) > td:not(.HasStock){ 
        -webkit-transition: all 0.25s ease-in-out;
        transition: all 0.25s ease-in-out;  
    } 
    div.table-responsive tbody tr:not(.Serie):hover > td:not(.HasStock){
        color: #000 !important;
        font-weight: bold !important;
        box-shadow: inset 0 -2px 0 #666666;   
    } 
    div.table-responsive tbody tr:not(.Serie):hover > td:not(.HasStock):hover{
        color: #000 !important;
        background-color: #fff !important;
        font-weight: bold !important;
        box-shadow: inset 0 -3px 0 #669900 !important;   
    }    
</style>