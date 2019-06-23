{{ content() }}
{{ elements.getModelosAdicional() }}
{% include "layouts/cabecera.volt" %}
<div class="row full-width">

    <div class="col-md-6">
        {{ form('modelos/create', 'role': 'form', 'class': 'sky-form') }}
        <header><?php echo $this->view->descriptivo['cabecera']; ?></header>
        <fieldset>
            <section>
                <div class="row">
                    <label class="label col col-2">Nombre de la Pagina</label>
                    <div class="col col-4">
                        <label class="input">
                            {{ form.render('modelName', ['class': 'form-control']) }}
                        </label>
                    </div>
                </div>
            </section>
            <section>
                <div class="row">
                    <label class="label col col-2">Nombre del Proceso</label>
                    <div class="col col-4">
                        <label class="input">
                            {{ form.render('actionName', ['class': 'form-control']) }}
                        </label>
                    </div>
                </div>
            </section>
            <section>
                <div class="row">
                    <label class="label col col-2">Tipo de descripcion</label>
                    <div class="col col-4">
                        <label class="input">
                            {{ form.render('modelType', ['class': 'form-control']) }}
                        </label>
                    </div>
                </div>
            </section>
            <section>
                <div class="row">
                    <label class="label col col-2">Descripcion</label>
                    <div class="col col-4">
                        <label class="input">
                            {{ form.render('modelDes', ['class': 'form-control']) }}
                        </label>
                    </div>
                </div>
            </section>
        </fieldset>
        <footer>
            {{ submit_button('Enviar', 'class': 'btn btn-primary') }}
            <p class="help-block">Agregara una nueva descripcion.</p>
        </footer>
        </form>
    </div>
    {% include "layouts/pie.volt" %}
</div>
