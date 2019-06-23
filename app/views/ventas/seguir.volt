{% extends "layouts/fullscreen_1.volt" %}
{% block forma %}
{% endblock %}
{% block cabecera %}

    <div class="l-container w-50" id="solid-form-container" style="border-radius: 0; margin-top: 120px;">
        <div class="l-row">
            <div class="form-body">        
                {{ form('ventas/index/', 'id':'consumo')}}
                <fieldset>
                    <legend> Seguir Vendiendo </legend>
                    <div class="l-row" style="">
                        <i class="fa fa-check-circle-o fa-absolute fa-background fa-4x"></i>
                    </div>
                 
                    <div class="l-row">
                        <div class="l-col-12">
                            <div class="form-group">
                                {{ submit_button('Seguir Vendiendo', 'class': 'btn btn-default') }}
                            </div>
                        </div>
                    </div>
                </fieldset>

            </div>

        </div>

    </div>

{% endblock %}
{% block cuerpoforma %}                            
{% endblock %}
