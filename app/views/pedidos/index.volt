{{ content() }}
{{ elements.getModelosAdicional() }}
{% include "layouts/cabecera.volt" %}
<div class="bg-blue">

    <div class="row full-width">

        <div class="col-md-8">
            {{ form('pedidos/search', 'role': 'form',  'class':'sky-form')}}
            <header><?php echo $this->view->descriptivo['cabecera']; ?></header>
            <fieldset>

                {% for element in form %}
                    {% if is_a(element, 'Phalcon\Forms\Element\Hidden') %}
                        {{ element }}
                    {% else %}
                        <section>
                            <div class="row">
                                {{ element.label(['class': 'label col col-2']) }}
                                <div class="col col-6">
                                    <label class="input">
                                        {{ element }}
                                    </label>
                                </div>
                            </div>
                        </section>
                    {% endif %}
                {% endfor %}

            </fieldset>
            <footer>
                {{ submit_button('Buscar', 'class': 'btn btn-primary') }}
                <p class="help-block">Todos los parametros descritos pueden ser utilizados para la busqueda.</p>
            </footer>
            </form>
        </div>
        {% include "layouts/pie_1.volt" %}
    </div>
    {% include "layouts/footer.volt" %}
</div>
