<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="<?php print base_url(); ?>img/LS32X32.png">
        <meta name="theme-color" content="#ffffff">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>TRAVUKO TIENDAS v1.0</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="<?php print base_url(); ?>js/jquery-3.2.1.min.js"></script>
        <!-- Bootstrap CSS -->
        <?php
        switch ($this->session->THEME) {
            case 1:
                print '<link href="' . base_url('css/bootstrap-r.css') . '" rel="stylesheet">';
                break;
            case 2:
                print '<link href="https://stackpath.bootstrapcdn.com/bootswatch/4.2.1/sandstone/bootstrap.min.css" rel="stylesheet"  crossorigin="anonymous">';
                break;
            case 3:
                print '<link href="https://stackpath.bootstrapcdn.com/bootswatch/4.2.1/minty/bootstrap.min.css" rel="stylesheet"  crossorigin="anonymous">';
                break;
            case 4:
                print '<link href="https://stackpath.bootstrapcdn.com/bootswatch/4.2.1/slate/bootstrap.min.css" rel="stylesheet"  crossorigin="anonymous">';
                break;
            case 5:
                print '<link href="https://stackpath.bootstrapcdn.com/bootswatch/4.2.1/lux/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">';
                break;
            case 6:
                print '<link href="https://stackpath.bootstrapcdn.com/bootswatch/4.2.1/materia/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">';
                break;
            case 7:
                print '<link href="https://stackpath.bootstrapcdn.com/bootswatch/4.2.1/litera/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">';
                break;
            case 8:
                print '<link href="https://stackpath.bootstrapcdn.com/bootswatch/4.2.1/lumen/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">';
                break;
            case 9:
                print '<link href="https://stackpath.bootstrapcdn.com/bootswatch/4.2.1/yeti/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">';
                break;
            default:
                print '<link href="' . base_url('css/bootstrap-r.css') . '" rel="stylesheet">';
                break;
        }
        ?> 
        <link href="<?php print base_url('js/submenu-boostrap4/bootstrap-4-navbar.min.css') ?>" rel="stylesheet">

        <!--DataTables Plugin-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>js/tabletools/master/DataTables/datatables.min.css">
        <script src="<?php echo base_url(); ?>js/tabletools/master/DataTables/datatables.min.js"></script>

        <script src="<?php echo base_url(); ?>js/tabletools/master/DataTables/datatables.min.js"></script>
        <script src="<?php echo base_url(); ?>js/tabletools/master/DataTables/JSZip-3.1.3/jszip.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>js/tabletools/master/DataTables/Buttons-1.5.1/js/buttons.html5.min.js" type="text/javascript"></script>

        <!--selectize control-->
        <script src="<?php echo base_url(); ?>js/selectize/js/standalone/selectize.min.js"></script>
        <link href="<?php echo base_url(); ?>js/selectize/css/selectize.bootstrap.css" rel="stylesheet" />

        <!-- Validacion forms -->
        <script rel="javascript" type="text/javascript" href="<?php echo base_url(); ?>js/additional-methods.min.js"></script>
        <script src="<?php echo base_url(); ?>js/jquery.validate.min.js"></script>
        <!-- Shortcut key -->
        <script src="<?php echo base_url(); ?>js/ShortCut/shortcut.js"></script>
        <!--Font Awesome Icons-->
        <!--<script defer src="<?php print base_url(); ?>js/fontawesome-all.js"></script>-->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <link rel="stylesheet" href="<?php print base_url(); ?>css/animate.min.css">
        <!--HoldOn Stupid Accions-->
        <link href="<?php print base_url(); ?>css/HoldOn.min.css" rel="stylesheet">
        <script src="<?php print base_url(); ?>js/HoldOn.min.js"></script>
        <!--Barra superior de carga-->
        <script src="<?php print base_url(); ?>js/pace.min.js"></script>
        <link href="<?php print base_url(); ?>css/pace.css" rel="stylesheet" />
        <!--Masked number format money etc-->
        <script src="<?php print base_url(); ?>js/jquery.maskMoney.min.js"></script>

        <!--MasekdAll-->
        <script src="<?php print base_url(); ?>js/inputmask/dependencyLibs/inputmask.dependencyLib.jquery.js"></script>
        <script src="<?php print base_url(); ?>js/inputmask/jquery.inputmask.bundle.js"></script>
        <script src="<?php print base_url(); ?>js/inputmask/inputmask.js"></script>
        <script src="<?php print base_url(); ?>js/inputmask/inputmask.extensions.js"></script>
        <script src="<?php print base_url(); ?>js/inputmask/inputmask.numeric.extensions.js"></script>
        <script src="<?php print base_url(); ?>js/inputmask/inputmask.date.extensions.js"></script>
        <script src="<?php print base_url(); ?>js/inputmask/inputmask.phone.extensions.js"></script>
        <script src="<?php print base_url(); ?>js/inputmask/jquery.inputmask.min.js"></script>

        <!--Modales simplificados-->
        <script src="<?php print base_url(); ?>js/sweetalert.min.js"></script>
        <!--Notifiers-->
        <script src="<?php echo base_url(); ?>js/notify/bootstrap-notify-3.1.3/bootstrap-notify.min.js"></script>
        <!--Date picker-->
        <link href="<?php echo base_url(); ?>js/datepicker/datepicker3.css" rel="stylesheet"/>
        <script src="<?php echo base_url(); ?>js/datepicker/bootstrap-datepicker.min.js"></script>
        <!--Time picker-->
        <link href="<?php echo base_url(); ?>js/timepicker/bootstrap-timepicker.min.css" rel="stylesheet"/>
        <script src="<?php echo base_url(); ?>js/timepicker/bootstrap-timepicker.min.js"></script>
        <!--jQuery Number Format-->
        <script src="<?php echo base_url(); ?>js/jnumber/jquery.number.min.js"></script>

        <!-- Custom styles for this template -->
        <link href="<?php print base_url('css/style.css') ?>" rel="stylesheet">

        <!-- BOOTSTRAP TOUR JS -->
        <link href="<?php echo base_url(); ?>js/bootstrap-tour-master/build/css/bootstrap-tour.min.css" rel="stylesheet">
        <script src="<?php echo base_url(); ?>js/bootstrap-tour-master/build/js/bootstrap-tour.js"></script>

        <!-- Custom scripts for this template -->
        <script src="<?php echo base_url(); ?>js/scripts.js"></script>
    </head>

    <script>
        function openNav() {
            $('#myNav').width(250);
        }

        function closeNav() {
            $('#myNav').width(0);
        }

        $(window).click(function () {
            if (parseInt($('#myNav').width()) > 0) {
                closeNav();
            }
        });

        var base_url = "<?php print base_url(); ?>";
        $(function () {
            $(".maskDate").inputmask({alias: "date"});
            $(".maskDateTime").inputmask('datetime', {
                mask: "1/2/y h:s:s t\m",
                alias: "dd/mm/yyyy",
                placeholder: "dd/mm/yyyy hh:mm:ss xm",
                separator: '/',
                hourFormat: "12"
            });
            $('.money').maskMoney({prefix: '$', allowNegative: false, thousands: ',', decimal: '.', affixesStay: false});

            $('[data-toggle="tooltip"]').tooltip();
            $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
                $.fn.dataTable.tables({visible: true, api: true}).columns.adjust();
            });
            $('a[data-toggle="collapse"]').on('shown.bs.tab', function (e) {
                $.fn.dataTable.tables({visible: true, api: true}).columns.adjust();
            });
            $("select").selectize({
                hideSelected: true,
                openOnFocus: true
            });
            $("select").not('.NotOpenDropDown').not('.notSelect').selectize({
                hideSelected: true,
                openOnFocus: true
            });
            $("select").filter('.NotOpenDropDown').not('.notSelect').selectize({
                hideSelected: true,
                openOnFocus: false
            });
            //Clase que admite solo numeros y un punto decimal
            $('.numbersOnly').keypress(function (event) {
                var charCode = (event.which) ? event.which : event.keyCode;
                if (
                        (charCode !== 45 || $(this).val().indexOf('-') !== -1) && // “-” CHECK MINUS, AND ONLY ONE.
                        (charCode !== 46 || $(this).val().indexOf('.') !== -1) && // “.” CHECK DOT, AND ONLY ONE.
                        (charCode < 48 || charCode > 57))
                    return false;
                return true;
            });
            $('.modal').on('shown.bs.modal', function (e) {
                $.fn.dataTable.tables({visible: true, api: true}).columns.adjust();
            });
            //Esto se hace para que ejecute el validador de campos
            $('[data-provide="datepicker"]').on('changeDate', function (ev) {
//               $(this).valid();
            });
            $('[data-provide="datepicker"]').datepicker({
                todayBtn: true,
                autoclose: true,
                todayHighlight: true
            });

        });
        function onNotify(span, message, type) {
            $.notify({
                title: span,
                message: message
            }, {
                type: type,
                z_index: 3031,
                delay: 2000,
                placement: {
                    from: "bottom",
                    align: "right"
                },
                animate: {
                    enter: 'animated fadeInUp',
                    exit: 'animated fadeOutDown'
                }
            });
        }

        function isValid(p) {
            var inputs = $('#' + p).find("input.form-control:required").length;
            var selects = $('#' + p).find("select.required").length;
            var valid_inputs = 0;
            var valid_selects = 0;
            $.each($('#' + p).find("input.form-control:required"), function () {
                var e = $(this).parent().find("small.text-danger");
                if ($(this).val() === '' && e.length === 0) {
                    $(this).parent().find("label").after("<small class=\"text-danger\"> Este campo es obligatorio</small>");
                    $(this).css("border", "1px solid #d01010");
                    valido = false;
                } else {
                    if ($(this).val() !== '') {
                        $(this).css("border", "1px solid #ccc");
                        $(this).parent().find("small.text-danger").remove();
                        valid_inputs += 1;
                    }
                }
            });
            $.each($('#' + p).find("select.required"), function () {
                var e = $(this).parent().find("small.text-danger");
                if ($(this).val() === '' && e.length === 0) {
                    $(this).after("<small class=\"text-danger\"> Este campo es obligatorio</small>");
                    $(this).parent().find(".selectize-input").css("border", "1px solid #d01010");
                    valido = false;
                } else {
                    if ($(this).val() !== '') {
                        $(this).parent().find(".selectize-input").css("border", "1px solid #ccc");
                        $(this).parent().find("small.text-danger").remove();
                        valid_selects += 1;
                    }
                }
            });
            if (valid_inputs === inputs && valid_selects === selects) {
                valido = true;
            }
        }

        /*
         * @function onBeep
         *
         * @constructor
         *
         * @param {media} indice
         *   1 = ok
         *   2 = error
         */
        function onBeep(indice) {
            var audio = new Audio('<?php print base_url(); ?>media/' + indice + '.mp3');
            audio.play();
        }
    </script>
    <style>    
        table thead th{
            background-color: #2C3E50;
            color: #fff; 
        }

        table thead th:first-child{
            background-color: #006699;
            color: #fff;
            /*border-radius: 10px;*/
            border-top-left-radius: 10px;
        }
        table thead th:last-child{ 
            color: #fff;
            /*border-radius: 10px;*/
            border-top-right-radius: 10px;
        }
        table tbody tr:hover td{
            color: #fff;
            background-color: #0099cc;
            font-weight: bold;
        }
    </style>