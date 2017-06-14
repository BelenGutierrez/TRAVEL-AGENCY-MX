var datosJson;
var paginaActual = 0;
var validatorAlta;
var validatorModificacion;


$(document).ready(function () {
    $("tbody").html("");
    $.ajax({
        type: "post",
        url: "../../Controller/Admin/peticiones.php",
        data: {accion: "listado"},
        dataType: "json",
        success: function (data) {

            preparaJson(data);
        }
    });

    // ALTA O INSERCION//////////////////////////////////////////

    $(document).on("click", "button#nuevaExcursion", function () {
        alta.dialog("open");
    });

    alta = $("#alta").dialog({
        autoOpen: false,
        width: 450,
        modal: true,
        buttons: {
            Aceptar: function () {
                if ($('#formularioAlta').valid()) {
                    $.ajax({
                        type: "post",
                        url: "../../Controller/Admin/peticiones.php",
                        data: {
                            accion: "insertar",
                            codigo: $("#codigoAlta").val(),
                            categoria: $("#categoriaAlta").val(),
                            nombre: $("#nombreAlta").val(),
                            precio: $("#preciotAlta").val(),
                            imagen: $("#imagenAlta").val(),
                            oferta: $("#ofertaAlta").val(),
                            novedad: $("#novedadAlta").val(),
                            detalle: $("#detalleAlta").val(),
                            fecha_publicacion: $("#fechaPubliAlta").val()
                        },
                        dataType: "json",
                        success: function (response) {
                            preparaJson(response);
                            console.log("Excursión insertada correctamente.");
                        },
                        error: function (xhr, ajaxOptions, thrownError) {
                            console.log("No se ha podido insertar la excursión. Estado: " + xhr.status + " - ERROR: " + thrownError);
                        }
                    });
                    cancelarAlta();
                    validatorAlta.resetForm(); // VALIDADOR
                }
            },
            Cancelar: function () {
                cancelarAlta();
                validatorAlta.resetForm();
            }
        }
    });

    ////// BAJA O BORRADO DE EXCURSIONES ///// 


    var codigoBaja;
    var botonEliminar;
    $(document).on("click", "button.borrado", function () {
        codigoBaja = $(this).data("excursion-code");
        botonEliminar = $(this);
        baja.dialog("open");
    });

    baja = $("#baja").dialog({
        autoOpen: false,
        height: 200,
        width: 450,
        modal: true,
        buttons: {
            Aceptar: function () {
                $.ajax({
                    type: "post",
                    url: "../../Controller/Admin/peticiones.php",
                    data: {
                        accion: "eliminar",
                        codigo: codigoBaja,
                    },
                    dataType: "json",
                    success: function (response) {
                        botonEliminar.parent().parent().find("td, span, button").fadeOut(800, function () {

                            preparaJson(response);
                            console.log("Excursión borrada correctamente.");
                        });
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        console.log("No se ha podido borrar la excursión. Estado: " + xhr.status + " - ERROR: " + thrownError);
                    }
                });
                baja.dialog("close");
            },
            Cancelar: function () {
                baja.dialog("close");
            },
        }
    });

    ////// MODIFICACION DE EXCURSIONES ///// 

    var codigoAntiguo;
    $(document).on("click", "button.modificar", function () {
        codigoModificar = $(this).data("excursion-code");
        $.ajax({
            type: "post",
            url: "../../Controller/Admin/peticiones.php",
            data: {
                accion: "detalleExcursion",
                codigo: codigoModificar,
            },
            dataType: "json",
            success: function (response) {
                codigoAntiguo = response.codigo;
                modalModificacion(response);
                console.log("Rellenando modal de modificacion con los datos encontradoss.");
            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log("No se ha podido encontrar ninguna excursión con éste código.");
            }
        });
        modificar.dialog("open");
    });

    modificar = $("#modificar").dialog({
        autoOpen: false,
        width: 450,
        modal: true,
        buttons: {
            Aceptar: function () {
                $.ajax({
                    type: "post",
                    url: "../../Controller/Admin/peticiones.php",
                    data: {
                        accion: "actualizar",
                        codigo: $("#codigoModificacion").val(),
                        categoria: $("#categoriaModificacion").val(),
                        nombre: $("#nombreModificacion").val(),
                        precio: $("#precioModificacion").val(),
                        imagen: $("#imagenModificacion").val(),
                        oferta: $("#ofertaModificacion").val(),
                        novedad: $("#novedadModificacion").val(),
                        detalle: $("#detalleModificacion").val(),
                        fecha_publicacion: $("#fechaPubliModificacion").val(),
                        codigoAntiguo: codigoAntiguo
                    },
                    dataType: "json",
                    success: function (response) {

                        preparaJson(response);
                        console.log("Excursión actualizada correctamente.");
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        console.log("No se ha podido actualizar la excursión. Estado: " + xhr.status + " - ERROR: " + thrownError);
                    }
                });
                modificar.dialog("close");
                validatorModificacion.resetForm();
            },
            Cancelar: function () {
                modificar.dialog("close");
                validatorModificacion.resetForm();
            },
        }
    });

    /////////// DATEPICKER ////////////////////////////////

    $("#fechaPubliAlta, #fechaPubliModificacion").datepicker({

        // FORMATO FECHA DESPUES DE HACER CLICK EL USUARIO //
        dateFormat: "yy/mm/dd",
    });

    var abajoArriba;
    var nombreColumnaAnterior;
    $(document).on("click", "thead th.columna", function () {
        var columna = $(this).data("column");
        if (nombreColumnaAnterior == columna) {
            abajoArriba = false;
            nombreColumnaAnterior = "";
        } else {
            abajoArriba = true;
            nombreColumnaAnterior = columna;
        }
        $.ajax({
            type: "post",
            url: "../../Controller/Admin/peticiones.php",
            data: {
                accion: "ordenaExcursiones",
                columna: columna,
                orden: abajoArriba,
            },
            dataType: "json",
            success: function (response) {
                preparaJson(response);
                console.log("Ordenado correctamente.");
            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log("No se ha podido establecer el orden deseado.");
            }
        });
    });

    var reglasValidacionAlta = {
        rules: {
            codigo: {
                required: true,
                "remote": {
                    type: 'post',
                    url: '../../Controller/Admin/peticiones.php',
                    data: {
                        accion: "validar",
                        codigo: function () {
                            // COMPRUEBA SI ESTÁ VACIO O NO  //
                            if ($("#codigoModificacion").val() == "") {
                                return $("#codigoAlta").val()
                            } else {
                                return $("#codigoModificacion").val();
                            }
                        }
                    }
                }
            },
            categoria: "required",
            nombre: "required",
            precio: "required",
            imagen: "required",
            oferta: "required",
            novedad: "required",
            detalle: "required",
            fecha_publicacion: "required",

        },
        messages: {
            codigo: "Introduce un código válido",
            categoria: "Introduce un categoría válida",
            nombre: "Introduce un nombre válido",
            precio: "Introduce un número válido",
            imagen: "Introduce un imagen válida",
            oferta: "Introduce si o no",
            novedad: "Introduce si o no",
            detalle: "Introduce un texto válido",
            fecha_publicación: "Introduce una fecha",
        }
    }

    var reglasValidacionModificacion = {
        rules: {
            codigo: "required",
            categoria: "required",
            nombre: "required",
            precio: "required",
            imagen: "required",
            oferta: "required",
            novedad: "required",
            detalle: "required",
            fecha_publicacion: "required",

        },
        messages: {
            codigo: "Introduce un código válido",
            categoria: "Introduce un categoría válida",
            nombre: "Introduce un nombre válido",
            precio: "Introduce un número válido",
            imagen: "Introduce un imagen válida",
            oferta: "Introduce si o no",
            novedad: "Introduce si o no",
            detalle: "Introduce un texto válido",
            fecha_publicación: "Introduce una fecha",
        }
    }

    validatorAlta = $("#formularioAlta").validate(reglasValidacionAlta);
    validatorModificacion = $("#formularioModificacion").validate(reglasValidacionModificacion);

    $(document).on("click", "#selectorNElementos option", function () {
        paginaActual = 0;
        preparaJson(datosJson);
    });

    $(document).on("click", "#paginaAnterior", function () {
        if (paginaActual > 0) {
            paginaActual -= 1;
        }
        preparaJson(datosJson);
    });

    $(document).on("click", "#paginaSiguiente", function () {
        var nElementos = parseInt($("#selectorNElementos").prop("value"));
        var nPaginas = datosJson.length / nElementos;

        // Se resta 1 al numero de paginas para compensar que pagina actual comienza en 0
        if (nPaginas - 1 > paginaActual) {
            paginaActual++;
        }

        preparaJson(datosJson);
    });

    // HACER CLICK EN UN ELEMENTO DEL AUTOCOMPLETE

    $(document).on("click", "div.ui-menu-item-wrapper", function () {
        var valor = $(this).text();
        console.log("REALIZANDO CONSULTA CON CATEGORIA " + valor);
        $.ajax({
            type: "post",
            url: "../../Controller/Admin/peticiones.php",
            data: {
                accion: "filtrarCategoria",
                categoria: valor
            },
            dataType: "json",
            success: function (response) {
                preparaJson(response);
            }
        });
        $("#autocomplete").blur();
    });

    //////////////////////////////////////////////////////////////////////
});

function preparaJson(response) {
    datosJson = response;

    var jsonTratado = [];
    var nElementos = parseInt($("#selectorNElementos").prop("value"));
    console.log("Origen de datos tratados: ");
    console.log(response);
    for (var i = 0; i < nElementos; i++) {
        console.log("Indice: " + (paginaActual * nElementos + i));
        jsonTratado.push(response[paginaActual * nElementos + i]);
    }

    pintaTabla(jsonTratado);
}

///////////////////////////////////////////////////////

function pintaTabla(response) {

    $("tbody").html("");

    var arrayActualizado = actualizarArrayCategorias();

    $("#autocomplete").autocomplete({
        source: function (request, response) {
            var matcher = new RegExp("^" + $.ui.autocomplete.escapeRegex(request.term), "i");
            response($.grep(arrayActualizado, function (item) {
                return matcher.test(item);
            }));
        },
        change: function (event, ui) {
            if ($("#autocomplete").val() == "") {
                $.ajax({
                    type: "post",
                    url: "../../Controller/Admin/peticiones.php",
                    data: {
                        accion: "listado"
                    },
                    dataType: "json",
                    success: function (response) {
                        preparaJson(response);
                    }
                });
            }
        }
    });

    var numeroFilas = 0;

    $.each(response, function (indexInArray, valueOfElement) {
        $("tbody").append("<tr>"
                + "<td>" + response[indexInArray].codigo + "</td>"
                + "<td>" + response[indexInArray].categoria + "</td>"
                + "<td>" + response[indexInArray].nombre + "</td>"
                + "<td>" + response[indexInArray].precio + "</td>"
                + "<td>" + response[indexInArray].imagen + "</td>"
                + "<td>" + response[indexInArray].oferta + "</td>"
                + "<td>" + response[indexInArray].novedad + "</td>"
                + "<td>" + response[indexInArray].detalle + "</td>"
                + "<td>" + response[indexInArray].fechaPublicacion + "</td>"
                + "<td><button data-excursion-code='" + response[indexInArray].codigo + "' class='borrado btn btn-danger'>"
                + "<span class='glyphicon glyphicon-trash' aria-hidden='true'></span></button>"
                + "<td><button data-excursion-code='" + response[indexInArray].codigo + "' class='modificar btn btn-warning'>"
                + "<span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></button></td></tr>");

        numeroFilas++;

    });

}



/////////////////////////////////////////////////////////////////////////




function modalModificacion(response) {
    $("#codigoModificacion").val(response.codigo);
    $("#categoriaModificacion").val(response.categoria);
    $("#nombreModificacion").val(response.nombre);
    $("#precioModificacion").val(response.precio);
    $("#imagenModificacion").val(response.imagen);
    $("#ofertaModificacion").val(response.oferta);
    $("#novedadModificacion").val(response.novedad);
    $("#detalleModificacion").val(response.detalle);
    $("#fechaPubliModificacion").val(response.fecha_publicacion);

}


function cancelarAlta() {

    // CERRAR MODAL //
    alta.dialog("close");

    // LIMPIEZA DE FORMULARIO MODAL //

    $("#codigoAlta").val("");
    $("#categoriaAlta").val("");
    $("#nombreAlta").val("");
    $("#preciotAlta").val("");
    $("#imagenAlta").val("");
    $("#ofertaAlta").val("");
    $("#novedadAlta").val("");
    $("#detalleAlta").val("");
    $("#fechaPubliAlta").val("");
}

function actualizarArrayCategorias() {
    arrayCategorias = [];

    $.each(datosJson, function (indexInArray, valueOfElement) {
        if ($.inArray(datosJson[indexInArray].categoria, arrayCategorias) == -1) {
            arrayCategorias.push(datosJson[indexInArray].categoria);
        }
    });

    return arrayCategorias;
}


