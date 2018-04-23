/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/*******************************************************************************
 * VAR FOR TEMPORAL DATA
 *******************************************************************************/
var temp = 0;
/*******************************************************************************
 * VAR FOR VALID DATA
 *******************************************************************************/
var valido = false;
/*******************************************************************************
 * EVENT FOR CLICK ROW
 *******************************************************************************/
var selected = [];
/*******************************************************************************
 * OPTIONS FOR TABLES
 *******************************************************************************/
var tableOptions = {
    "dom": 'Bfrtip',
    buttons: [
        {
            extend: 'excelHtml5',
            text: ' <i class="fa fa-file-excel"></i>',
            titleAttr: 'Excel',
            exportOptions: {
                columns: ':visible'
            }
        }
        ,
        {

            extend: 'colvis',
            text: '<i class="fa fa-columns"></i>',
            titleAttr: 'Seleccionar Columnas',
            exportOptions: {
                modifier: {
                    page: 'current'
                },
                columns: ':visible'
            }
        }

    ],
    language: {
        processing: "Proceso en curso...",
        search: "Buscar:",
        lengthMenu: "Mostrar _MENU_ Elementos",
        info: "Mostrando  _START_ de _END_ , de _TOTAL_ Elementos.",
        infoEmpty: "Mostrando 0 de 0 A 0 Elementos.",
        infoFiltered: "(Filtrando un total _MAX_ Elementos. )",
        infoPostFix: "",
        loadingRecords: "Procesando los datos...",
        zeroRecords: "No se encontro nada.",
        emptyTable: "No existen datos en la tabla.",
        paginate: {
            first: "Primero",
            previous: "Anterior",
            next: "Siguiente",
            last: "&Uacute;ltimo"
        },
        aria: {
            sortAscending: ": Habilitado para ordenar la columna en orden ascendente",
            sortDescending: ": Habilitado para ordenar la columna en orden descendente"
        },
        buttons: {
            copyTitle: 'Registros copiados a portapapeles',
            copyKeys: 'Copiado con teclas clave.',
            copySuccess: {
                _: ' %d Registros copiados',
                1: ' 1 Registro copiado'
            }
        }
    },
    "autoWidth": true,
    "colReorder": true,
    "displayLength": 20,
    "bStateSave": true,
    "bLengthChange": false,
    "deferRender": true,
//    "scrollY": false,
//    "scrollX": true,
    "scrollCollapse": false,
    "bSort": true,
    "aaSorting": [
        [1, 'desc']
    ]
            //    ,
            //    "columnDefs": [
            //        {"width": "20%", "targets": [0]}
            //    ]
};

var tableOptionsDetalleInfinito = {
    "dom": 'frti',
    language: {
        processing: "Proceso en curso...",
        search: "Buscar:",
        lengthMenu: "Mostrar _MENU_ Elementos",
        info: "Mostrando  _START_ de _END_ , de _TOTAL_ Elementos.",
        infoEmpty: "Mostrando 0 de 0 A 0 Elementos.",
        infoFiltered: "(Filtrando un total _MAX_ Elementos. )",
        infoPostFix: "",
        loadingRecords: "Procesando los datos...",
        zeroRecords: "No se encontro nada.",
        emptyTable: "No existen datos en la tabla.",
        paginate: {
            first: "Primero",
            previous: "Anterior",
            next: "Siguiente",
            last: "&Uacute;ltimo"
        },
        aria: {
            sortAscending: ": Habilitado para ordenar la columna en orden ascendente",
            sortDescending: ": Habilitado para ordenar la columna en orden descendente"
        },
        buttons: {
            copyTitle: 'Registros copiados a portapapeles',
            copyKeys: 'Copiado con teclas clave.',
            copySuccess: {
                _: ' %d Registros copiados',
                1: ' 1 Registro copiado'
            }
        }
    },

    "autoWidth": true,
    "colReorder": true,
    "displayLength": 200,
    "bStateSave": true,
    "bLengthChange": false,
    "deferRender": true,
    "scrollY": 450,
    "scrollX": true,
    "scrollCollapse": false,
    "bSort": false
//    "aaSorting": [
//        [0, 'desc']
//    ]
            //    ,
            //    "columnDefs": [
            //        {"width": "20%", "targets": [0]}
            //    ]
};

var tableOptionsDetalle = {
    "dom": 'frt',
    language: {
        processing: "Proceso en curso...",
        search: "Buscar:",
        lengthMenu: "Mostrar _MENU_ Elementos",
        info: "Mostrando  _START_ de _END_ , de _TOTAL_ Elementos.",
        infoEmpty: "Mostrando 0 de 0 A 0 Elementos.",
        infoFiltered: "(Filtrando un total _MAX_ Elementos. )",
        infoPostFix: "",
        loadingRecords: "Procesando los datos...",
        zeroRecords: "No se encontro nada.",
        emptyTable: "No existen datos en la tabla.",
        paginate: {
            first: "Primero",
            previous: "Anterior",
            next: "Siguiente",
            last: "&Uacute;ltimo"
        },
        aria: {
            sortAscending: ": Habilitado para ordenar la columna en orden ascendente",
            sortDescending: ": Habilitado para ordenar la columna en orden descendente"
        },
        buttons: {
            copyTitle: 'Registros copiados a portapapeles',
            copyKeys: 'Copiado con teclas clave.',
            copySuccess: {
                _: ' %d Registros copiados',
                1: ' 1 Registro copiado'
            }
        }
    },

    "autoWidth": true,
    "colReorder": true,
    "bStateSave": true,
    "displayLength": 100,
    "bLengthChange": false,
    "deferRender": true,
    "scrollX": true,
    "scrollCollapse": false,
    "bSort": false
//    "aaSorting": [
//        [0, 'desc']
//    ]
            //    ,
            //    "columnDefs": [
            //        {"width": "20%", "targets": [0]}
            //    ]
};

var tableOptionsMiniTables = {
    "dom": 'frt',
    language: {
        processing: "Proceso en curso...",
        search: "Buscar:",
        lengthMenu: "Mostrar _MENU_ Elementos",
        info: "Mostrando  _START_ de _END_ , de _TOTAL_ Elementos.",
        infoEmpty: "Mostrando 0 de 0 A 0 Elementos.",
        infoFiltered: "(Filtrando un total _MAX_ Elementos. )",
        infoPostFix: "",
        loadingRecords: "Procesando los datos...",
        zeroRecords: "No se encontro nada.",
        emptyTable: "No existen datos en la tabla.",
        paginate: {
            first: "Primero",
            previous: "Anterior",
            next: "Siguiente",
            last: "&Uacute;ltimo"
        },
        aria: {
            sortAscending: ": Habilitado para ordenar la columna en orden ascendente",
            sortDescending: ": Habilitado para ordenar la columna en orden descendente"
        },
        buttons: {
            copyTitle: 'Registros copiados a portapapeles',
            copyKeys: 'Copiado con teclas clave.',
            copySuccess: {
                _: ' %d Registros copiados',
                1: ' 1 Registro copiado'
            }
        }
    },

    "autoWidth": true,
    "colReorder": true,
    "bStateSave": true,
    "bLengthChange": false,
    "deferRender": true,
    "scrollY": 200,
    scrollX: "100%",
    "scrollCollapse": false,
    "paging": false,
    "bSort": true
//    "aaSorting": [
//        [0, 'desc']
//    ]
            //    ,
            //    "columnDefs": [
            //        {"width": "20%", "targets": [0]}
            //    ]
};

function getTable(tblname, data) {
    var column = '';
    var i = 0;
    var div = "<div class=\" \">";
    div = "<table id=\"" + tblname + "\" class=\" table table-sm  \"  width=\"100%\">";
    //Create header
    div += "<thead>";
    div += "<tr class=\"\" >";
    for (var key in data[i]) {
        column += "<th>" + key + "</th>";
    }
    div += column;
    div += "</tr></thead>";
    //Create Rows
    div += "<tbody>";
    $.each(data, function (key, value) {
        div += "<tr data-toggle='tooltip' title='Haga clic para editar' >";
        $.each(value, function (key, value) {
            div += "<td>" + value + "</td>";
        });
        div += "</tr>";
    });
    div += "</tbody>";
    //Create Footer
    div += "<tfoot>";
    div += "<tr class=\"\">";
    div += column;
    div += "</tr></tfoot>";
    div += "</table>";
    div += "</div>";
    return div;
}
function getExt(filename) {
    var dot_pos = filename.lastIndexOf(".");
    if (dot_pos === -1)
        return "";
    return filename.substr(dot_pos + 1).toLowerCase();
}
function handleEnter() {
    $('input').keyup(function () {
        $(this).val($(this).val().toUpperCase());
    });
    $('body').on('keydown', 'input, select, textarea', function (e) {
        var self = $(this)
                , form = self.parents('body')
                , focusable
                , next
                ;
        if (e.keyCode === 13) {
            focusable = form.find('input,a,select,button,textarea').filter(':visible:enabled').not('.disabledForms');
            next = focusable.eq(focusable.index(this) + 1);
            if (next.length) {
                next.focus();
            }
            return false;
        }
    });
}
function formattedDate() {
    var d = new Date();
    let month = String(d.getMonth() + 1);
    let day = String(d.getDate());
    const year = String(d.getFullYear());

    if (month.length < 2)
        month = '0' + month;
    if (day.length < 2)
        day = '0' + day;

    return `${day}/${month}/${year}`;
}
function getNumber(x) {
    return x.replace(/\s+/g, '').replace(/,/g, "").replace("$", "");
}
function getNumberFloat(x) {
    return parseFloat(x.replace(/\s+/g, '').replace(/,/g, "").replace("$", ""));
}
//Función para validar un RFC
function rfcValido(rfc, aceptarGenerico = true) {
    const re = /^([A-ZÑ&]{3,4}) ?(?:- ?)?(\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])) ?(?:- ?)?([A-Z\d]{2})([A\d])$/;
    var validado = rfc.match(re);

    if (!validado)  //Coincide con el formato general del regex?
        return false;

    //Separar el dígito verificador del resto del RFC
    const digitoVerificador = validado.pop(),
            rfcSinDigito = validado.slice(1).join(''),
            len = rfcSinDigito.length,
            //Obtener el digito esperado
            diccionario = "0123456789ABCDEFGHIJKLMN&OPQRSTUVWXYZ Ñ",
            indice = len + 1;
    var suma,
            digitoEsperado;

    if (len == 12)
        suma = 0
    else
        suma = 481; //Ajuste para persona moral

    for (var i = 0; i < len; i++)
        suma += diccionario.indexOf(rfcSinDigito.charAt(i)) * (indice - i);
    digitoEsperado = 11 - suma % 11;
    if (digitoEsperado == 11)
        digitoEsperado = 0;
    else if (digitoEsperado == 10)
        digitoEsperado = "A";

    //El dígito verificador coincide con el esperado?
    // o es un RFC Genérico (ventas a público general)?
    if ((digitoVerificador != digitoEsperado)
            && (!aceptarGenerico || rfcSinDigito + digitoVerificador != "XAXX010101000"))
        return false;
    else if (!aceptarGenerico && rfcSinDigito + digitoVerificador == "XEXX010101000")
        return false;
    return rfcSinDigito + digitoVerificador;
}