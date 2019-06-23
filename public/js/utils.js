jquery(function ($) {
    $('#cabecera').validate({

        errorClass: "state-invalid",
        errorPlacement: function (error, element) {

            error.insertAfter(element.parents('.form-group'));

        },
        //Rules for validation

        rules: {

            tipofactura: {

                required: true

            },
            tipoguia: {

                required: true

            },
            frecuencia: {

                required: true

            },
            numerofactura: {

                required: true

            },
            numeroemisiones: {

                required: true

            },
            formapago: {

                required: true

            },
            fechaemision: {

                required: true

            },
            referencia: {

                required: true

            },
            notacomprador: {

                required: true

            },
            condiciones: {

                required: true

            }

        },
        //Messages appearing on validation

        messages: {
            tipofactura: {

                required: "Debe seleccionar una opcion"

            },
            tipoguia: {

                required: "Debe seleccionar una opcion"

            },
            frecuencia: {

                required: "Debe seleccionar una opcion"

            },
            numerofactura: {

                required: "Debe seleccionar una opcion"

            },
            numeroemisiones: {

                required: "Debe seleccionar una opcion"

            },
            formapago: {

                required: "Debe seleccionar una opcion"

            },
            fechaemision: {

                required: "Debe seleccionar una opcion"

            },
            referencia: {

                required: "Debe seleccionar una opcion"

            },
            notacomprador: {

                required: "Debe seleccionar una opcion"

            },
            condiciones: {

                required: "Debe seleccionar una opcion"

            }

        }

    })
});

