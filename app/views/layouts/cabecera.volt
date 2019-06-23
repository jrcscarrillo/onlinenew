<body>
    <div class="bg-blue w-100">
        <div class="container-fluid">
            <nav class="navbar navbar-light navbar-expand-md justify-content-center" style="background-color: #F3BE25;">
                <a href="/" class="navbar-brand d-flex w-50 mr-auto">Cooperativa</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsingNavbar3">
                    <span class="navbar-toggler-icon"></span>
                </button>
                {{ elements.getMenu() }}
        </div>
    </nav>   
    <div class="container">
        {{ flash.output() }}
    </div>
    </div>
