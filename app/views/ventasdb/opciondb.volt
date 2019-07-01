{{ content() }}
{{ elements.getModelosAdicional() }}
{% include "layouts/cabecera.volt" %}
<div class="wrapper solid-form">

    <div class="l-container w-50" id="solid-formve-container">

        <div class="l-row">
            <div class="l-col-12">
                <div class="form-body pad-0">        
                    {{ form('ventasdb/cabecera/' ~ refnumber, 'id':'consumo')}}
                    <fieldset>
                        <legend> Cliente Seleccionado </legend>
                        <div class="l-row">
                            <div class="l-col-12">
                                <div class="form-group">
                                    {{ cliente }}
                                    {{ nombre }}
                                </div>
                            </div>
                        </div>

                        <div class="l-row">
                            <div class="l-col-12">
                                <div class="form-group">
                                    {{ submit_button('Seguir', 'class': 'btn btn-default') }}
                                </div>
                            </div>
                        </div>
                    </fieldset>

                </div>

            </div>

        </div>
    </div>
</div>


