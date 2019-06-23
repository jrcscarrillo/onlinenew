{{ content() }}
{% include "layouts/cabecera.volt" %}
<div class="jumbotron jumbotron-fluid bg-blue">
    <div class="container-fluid">
        <div class="row">
            <div class="col col-md-6">
                {{ form('session/start', 'role': 'form', 'class': 'sky-form') }}
                <header>Log in</header>
                <fieldset>
                    <section>
                        <div class="col col-md-4">
                            <label class="label">E-mail</label>
                        </div>
                        <div class="col col-md-8">
                            <label class="input">
                                {{ text_field('email', 'type': "email") }}
                            </label>
                        </div>
                    </section>
                </fieldset>
                <fieldset>
                    <section>
                        <div class="col col-md-4">
                            <label class="label">Password</label>
                        </div>
                        <div class="col col-md-8">
                            <label class="input">
                                {{ password_field('password', 'type': "password") }}
                            </label>
                        </div>
                    </section>
                </fieldset>
                <footer>
                    {{ submit_button('Login', 'class': 'btn btn-primary btn-large') }}
                    {{ link_to('register', ' Registrarse ', 'class': 'btn btn-primary btn-large') }}
                </footer>
                </form>
            </div>

            <div class="col col-md-6">

                <div class="card bg-blue">
                    <div class="card-body">
                        <h2 class="card-title">Ha creado una cuenta con nosotros?</h2>
                    </div>

                    <p>Estas son las opciones que podra realizar si se registra:</p>
                    <ul>
                        <li>Podra crear, envir y recibir mensajes.</li>
                        <li>Podra revisar el estado actual de su cuenta.</li>
                        <li>Podra bajar o imprimir uno o varios documentos electronicos</li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
</div>
{% include "layouts/footer.volt" %}

