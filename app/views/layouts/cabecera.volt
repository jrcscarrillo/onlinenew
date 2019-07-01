<body>
    <div class="bg-blue w-100">
        <div class="container-fluid">
            <nav class="navbar navbar-light navbar-expand-md justify-content-center" style="background-color: #F3BE25;">
                <a class="navbar-brand" href="#">
                    <img src="https://carrillosteam.com/public/img/aurora.png?text=Logo" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsingNavbar3">
                    <span class="navbar-toggler-icon"></span>
                </button>
                {{ elements.getMenu() }}
            </nav>   
        </div>
        <div class="container-fluid">
            {{ flash.output() }}
        </div>
    </div>
