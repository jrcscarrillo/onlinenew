{{ content() }}
{{ elements.getModelosAdicional() }}
{% include "layouts/cabecera.volt" %}
<div class="bg-blue">
    <div class="row full-width">
        <div class="col-md-6">
            <div align="right">
                {{ link_to("contribuyente/new", "Agregar un Contribuyente", "class": "btn btn-warning") }}
            </div>
            {{ form('contribuyente/search', 'role': 'form', 'class': 'sky-form') }}
            <header><?php echo $this->view->descriptivo['cabecera']; ?></header>
            <fieldset>

                {% for element in form %}
                    {% if is_a(element, 'Phalcon\Forms\Element\Hidden') %}
                        {{ element }}
                    {% else %}
                        <section>
                            <div class="row">
                                {{ element.label(['class': 'label col col-2']) }}
                                <div class="col col-4">
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
                <p class="help-block">Se puede seleccionar a los contribuyentes por estos parametros.</p>
            </footer>
            </form>

        </div>
        {% include "layouts/pie.volt" %}
    </div>
        {% include "layouts/footer.volt" %}
</div>
