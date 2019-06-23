{{ content() }}
{{ elements.getModelosAdicional() }}
{% include "layouts/cabecera.volt" %}
<ul class="pager">
    <li class="previous pull-left">
        {{ link_to("modelos/index", "&larr; Atras") }}
    </li>
</ul>
<div class="row full-width">
    <div class="col-md-6">
        {{ form('modelos/save', 'role': 'form', 'class': 'sky-form') }}
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
            {{ submit_button("Guardar", "class": "btn btn-success") }}
            <p class="help-block">Guardar los cambios realizados.</p>
        </footer>
        </form>
    </div>
    {% include "layouts/pie.volt" %}
</div>