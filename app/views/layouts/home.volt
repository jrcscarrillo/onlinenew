<!DOCTYPE html>
<html>
    <head>

        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.2" />
        <meta name="format-detection" content="telephone=no" />
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        {{ get_title() }}
        <!--slider revolution-->
        <link rel="stylesheet" type="text/css" href="https://carrillosteam.com/public/coop/rs-plugin/css/settings.css">
        <!--style-->
        <link href='//fonts.googleapis.com/css?family=Raleway:300,400,500&amp;subset=latin-ext' rel='stylesheet' type='text/css'>
        <link href='//fonts.googleapis.com/css?family=Lato:300,400,700,900&amp;subset=latin-ext' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">    
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
        <link rel="stylesheet" href="https://carrillosteam.com/public/css/demo.css">
        <link rel="stylesheet" href="https://carrillosteam.com/public/css/sky-forms-ie8.css">
        <link rel="stylesheet" href="https://carrillosteam.com/public/css/sky-forms-blue.css">
        <link rel="stylesheet" href="https://carrillosteam.com/public/css/sky-forms-orange.css">
        <link rel="stylesheet" href="https://carrillosteam.com/public/css/sky-forms-green.css">
        <link rel="stylesheet" href="https://carrillosteam.com/public/css/sky-forms-coqueiro.css">
        <link rel="stylesheet" href="https://carrillosteam.com/public/css/sky-forms.css">
        <link rel="stylesheet" href="https://carrillosteam.com/public/css/formas/module-form.css">
        <link rel="stylesheet" href="https://carrillosteam.com/public/css/impresora.css"        
              <link rel="stylesheet" type="text/css" href="https://carrillosteam.com/public/coop/style/reset.css">
        <link rel="stylesheet" type="text/css" href="https://carrillosteam.com/public/coop/style/superfish.css">
        <link rel="stylesheet" type="text/css" href="https://carrillosteam.com/public/coop/style/prettyPhoto.css">
        <link rel="stylesheet" type="text/css" href="https://carrillosteam.com/public/coop/style/jquery.qtip.css">
        <link rel="stylesheet" type="text/css" href="https://carrillosteam.com/public/coop/style/style.css">
        <link rel="stylesheet" type="text/css" href="https://carrillosteam.com/public/coop/style/social.css">
        <link rel="stylesheet" type="text/css" href="https://carrillosteam.com/public/coop/style/animations.css">
        <link rel="stylesheet" type="text/css" href="https://carrillosteam.com/public/coop/style/responsive.css">
        <link rel="stylesheet" type="text/css" href="https://carrillosteam.com/public/coop/style/odometer-theme-default.css">
        <!--fonts-->
        <link rel="stylesheet" type="text/css" href="https://carrillosteam.com/public/coop/fonts/features/style.css">
        <link rel="stylesheet" type="text/css" href="https://carrillosteam.com/public/coop/fonts/template/style.css">
        <link rel="stylesheet" type="text/css" href="https://carrillosteam.com/public/coop/fonts/social/style.css">
        <link rel="shortcut icon" href="https://carrillosteam.com/public/coop/images/favicon.ico">
    </head>
    <body>
        <div class="site-container">
            <div class="transparent-header-container height-auto">
                <div class="header-top-bar-container clearfix">
                    <div class="header-top-bar">

                    </div>
                </div>
                <div class="header-container sticky">
                    <div class="header clearfix">
                        <div class="menu-container first-menu clearfix">
                            {{ elements.getMenu() }}
                            {{ flash.output() }}

                        </div>
                    </div>
                </div>


            {% block cuerpo %}{% endblock %}
            <!-- Slider Revolution -->
            <div class="revolution-slider-container">
                <div class="revolution-slider" data-version="5.4.5">
                    <ul>
                        <!-- SLIDE 1 -->
                        <li data-transition="fade" data-masterspeed="500" data-slotamount="1" data-delay="6000">
                            <!-- MAIN IMAGE -->
                            <img src="https://carrillosteam.com/public/coop/images/slider/placeholder.jpg" alt="slidebg1" data-bgfit="cover">
                            <!-- LAYERS -->
                            <!-- LAYER 01 -->
                            <div class="tp-caption" data-frames='[{"delay":500,"speed":1500,"from":"y:-40;o:0;","ease":"easeInOutExpo"},{"delay":"wait","speed":500,"to":"o:0;","ease":"easeInOutExpo"}]' data-x="center" data-y="['211', '257', '160', '218']">
                                <h4>Simple. Facil de usar. Estupendo.</h4>
                            </div>
                            <!-- LAYER 02 -->
                            <div class="tp-caption" data-frames='[{"delay":900,"speed":2000,"from":"y:40;o:0;","ease":"easeInOutExpo"},{"delay":"wait","speed":500,"to":"o:0;","ease":"easeInOutExpo"}]' data-x="center" data-y="['273', '313', '200', '260']">
                                <h2><a href="service_calculator.html" title="Estimate Total Costs">REVISE SUS OPCIONES</a></h2>
                            </div>
                            <!-- LAYER 03 -->
                            <div class="tp-caption" data-frames='[{"delay":1100,"speed":2000,"from":"y:40;o:0;","ease":"easeInOutExpo"},{"delay":"wait","speed":500,"to":"o:0;","ease":"easeInOutExpo"}]' data-x="center" data-y="['345', '368', '236', '290']">
                                <h2 class="slider-subtitle"><strong>DE PRESTAMOS</strong></h2>
                            </div>
                            <!-- LAYER 04 -->
                            <div class="tp-caption" data-frames='[{"delay":1500,"speed":1500,"from":"y:40;o:0;","ease":"easeInOutExpo"},{"delay":"wait","speed":500,"to":"o:0;","ease":"easeInOutExpo"}]' data-x="center" data-y="['476', '478', '304', '353']">
                                <div class="align-center">
                                    <a class="more" href="service_calculator.html" title="Service calculator">Calculador de Prestamos</a>
                                </div>
                            </div>
                            <!-- / -->
                        </li>
                        <!-- SLIDE 2 -->
                        <li data-transition="fade" data-masterspeed="500" data-slotamount="1" data-delay="6000">
                            <!-- MAIN IMAGE -->
                            <img src="https://carrillosteam.com/public/coop/images/slider/1920x1080_coop8.jpg" alt="slidebg2" data-bgfit="cover">
                            <!-- LAYERS -->
                            <!-- LAYER 01 -->
                            <div class="tp-caption customin customout" data-frames='[{"delay":500,"speed":1500,"from":"y:-40;o:0;","ease":"easeInOutExpo"},{"delay":"wait","speed":500,"to":"o:0;","ease":"easeInOutExpo"}]' data-x="center" data-y="['211', '257', '160', '218']">
                                <h4>Administracion confiable</h4>
                            </div>
                            <!-- LAYER 02 -->
                            <div class="tp-caption customin customout" data-frames='[{"delay":900,"speed":2000,"from":"y:40;o:0;","ease":"easeInOutExpo"},{"delay":"wait","speed":500,"to":"o:0;","ease":"easeInOutExpo"}]' data-x="center" data-y="['273', '313', '200', '260']">
                                <h2><a href="service_calculator.html" title="Estimate Total Costs">NUESTRA COOPERATIVA LO MEJOR</a></h2>
                            </div>
                            <!-- LAYER 03 -->
                            <div class="tp-caption customin customout" data-frames='[{"delay":1100,"speed":2000,"from":"y:40;o:0;","ease":"easeInOutExpo"},{"delay":"wait","speed":500,"to":"o:0;","ease":"easeInOutExpo"}]' data-x="center" data-y="['345', '368', '236', '290']">
                                <h2 class="slider-subtitle"><strong>RECURSOS INVALUABLES</strong></h2>
                            </div>
                            <!-- LAYER 04 -->
                            <div class="tp-caption customin customout" data-frames='[{"delay":1500,"speed":1500,"from":"y:40;o:0;","ease":"easeInOutExpo"},{"delay":"wait","speed":500,"to":"o:0;","ease":"easeInOutExpo"}]' data-x="center" data-y="['476', '478', '304', '353']">
                                <div class="align-center">
                                    <a class="more" href="service_calculator.html" title="Service calculator">Calculador de Prestamos</a>
                                </div>
                            </div>
                            <!-- / -->
                        </li>

                        <!-- SLIDE 3 -->
                        <li data-transition="fade" data-masterspeed="500" data-slotamount="1" data-delay="6000">
                            <!-- MAIN IMAGE -->
                            <img src="https://carrillosteam.com/public/coop/images/slider/1920x1080_coop5.jpg" alt="slidebg3" data-bgfit="cover">
                            <!-- LAYERS -->
                            <!-- LAYER 01 -->
                            <div class="tp-caption customin customout" data-frames='[{"delay":500,"speed":1500,"from":"y:-40;o:0;","ease":"easeInOutExpo"},{"delay":"wait","speed":500,"to":"o:0;","ease":"easeInOutExpo"}]' data-x="center" data-y="['211', '257', '160', '218']">
                                <h4>Nos enfocamos en sus necesidades</h4>
                            </div>
                            <!-- LAYER 02 -->
                            <div class="tp-caption customin customout" data-frames='[{"delay":900,"speed":2000,"from":"y:40;o:0;","ease":"easeInOutExpo"},{"delay":"wait","speed":500,"to":"o:0;","ease":"easeInOutExpo"}]' data-x="center" data-y="['273', '313', '200', '260']">
                                <h2><a href="service_calculator.html" title="Estimate Total Costs">Mejoramiento Continuo</a></h2>
                            </div>
                            <!-- LAYER 03 -->
                            <div class="tp-caption customin customout" data-frames='[{"delay":1100,"speed":2000,"from":"y:40;o:0;","ease":"easeInOutExpo"},{"delay":"wait","speed":500,"to":"o:0;","ease":"easeInOutExpo"}]' data-x="center" data-y="['345', '368', '236', '290']">
                                <h2 class="slider-subtitle"><strong>POR LA EXCELENCIA</strong></h2>
                            </div>
                            <!-- LAYER 04 -->
                            <div class="tp-caption customin customout" data-frames='[{"delay":1500,"speed":1500,"from":"y:40;o:0;","ease":"easeInOutExpo"},{"delay":"wait","speed":500,"to":"o:0;","ease":"easeInOutExpo"}]' data-x="center" data-y="['476', '478', '304', '353']">
                                <div class="align-center">
                                    <a class="more" href="service_calculator.html" title="Service calculator">Calculador de Prestamos</a>
                                </div>
                            </div>
                            <!-- / -->
                        </li>
                    </ul>
                </div>
            </div>
            <!--/-->
            <div class="theme-page">
                <div class="clearfix">
                    <div class="row margin-top-89">
                        <div class="row">
                            <h2 class="box-header">NOSOTROS SOMOS</h2>
                            <p class="description align-center">La confianza engendra confianza. Servicios traen satisfacción. <br>La cooperación demuestra la calidad del liderazgo.</p>
                            <div class="row page-margin-top">
                                <div class="column column-1-4">
                                    <ul class="features-list align-right margin-top-30">
                                        <li>
                                            <div class="icon features-diamond"></div>
                                            <h4>DISCIPLINA</h4>
                                            <p>La disciplina es más poderosa que el número, y la disciplina, esto es, la perfecta cooperación, es un atributo de la civilización.</p>
                                        </li>
                                        <li>
                                            <div class="icon features-umbrella"></div>
                                            <h4>HACIA EL CAMBIO</h4>
                                            <p>No tengas miedo de cambiar tu vida; las claves son: trabajo en equipo, concentración, fuerza de voluntad y el poder de la interdisciplinariedad.</p>
                                        </li>
                                    </ul>
                                </div>
                                <div class="column column-1-2 align-center">
                                    <div class="image-wrapper">
                                        <img src="https://carrillosteam.com/public/coop/images/samples/480x480/480x480_coop1.jpg" alt="" class="radius border">
                                    </div>
                                </div>
                                <div class="column column-1-4">
                                    <ul class="features-list margin-top-30">
                                        <li>
                                            <div class="icon features-eco"></div>
                                            <h4>NOSOTROS</h4>
                                            <p>Gracias a la cooperación de la mano, de los órganos del lenguaje y del cerebro, no sólo en cada individuo, sino también en la sociedad, los hombres fueron aprendiendo a ejecutar operaciones cada vez más complicadas, a plantearse y a alcanzar objetivos cada vez más elevados..</p>
                                        </li>
                                        <li>
                                            <div class="icon features-maid"></div>
                                            <h4>GRANDES</h4>
                                            <p>Los hombres no viven juntos porque sí, sino para acometer juntos grandes empresas.</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="align-center margin-top-65 padding-bottom-16">
                                <a class="more" href="about.html" title="Learn more">Learn more</a>
                            </div>
                        </div>
                    </div>
                    <div class="row full-width padding-top-89 padding-bottom-96 page-margin-top-section parallax parallax-1 overlay">
                        <div class="row">
                            <h2 class="box-header white">NADA ES MAS IMPORTANTE</h2>
                            <p class="description align-center white">Damos prioridad a.</p>
                            <div class="tabs white no-scroll margin-top-27 clearfix">
                                <ul class="tabs-navigation clearfix">
                                    <li>
                                        <a href="#our-customers" title="Our Customers" class="features-team">
                                            NUESTROS SOCIOS
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#the-environment" title="The Environment" class="features-leaf">
                                            EL MEDIO AMBIENTE
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#communication" title="Communication" class="features-megaphone">
                                            COMUNICACION
                                        </a>
                                    </li>
                                </ul>
                                <div id="our-customers">
                                    <p>La gente que construyó Silicon Valley eran ingenieros. Aprendieron sobre negocios, aprendieron un montón de cosas diferentes, pero tenían una creencia real de que los seres humanos, si trabajaban duro junto a otras personas creativas, inteligentes, podían resolver la mayoría de los problemas de la humanidad. Estoy muy de acuerdo con eso.</p>
                                </div>
                                <div id="the-environment">
                                    <p>La gente que construyó Silicon Valley eran ingenieros. Aprendieron sobre negocios, aprendieron un montón de cosas diferentes, pero tenían una creencia real de que los seres humanos, si trabajaban duro junto a otras personas creativas, inteligentes, podían resolver la mayoría de los problemas de la humanidad. Estoy muy de acuerdo con eso.</p>
                                </div>
                                <div id="communication">
                                    <p>La gente que construyó Silicon Valley eran ingenieros. Aprendieron sobre negocios, aprendieron un montón de cosas diferentes, pero tenían una creencia real de que los seres humanos, si trabajaban duro junto a otras personas creativas, inteligentes, podían resolver la mayoría de los problemas de la humanidad. Estoy muy de acuerdo con eso.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row full-width gray padding-top-89 padding-bottom-96">
                        <div class="row">
                            <h2 class="box-header">NUESTROS SERVICIOS</h2>
                            <p class="description align-center">Amo escuchar un coro. Me gusta el trabajo en equipo. Me hace sentir optimista sobre la raza humana cuando los veo cooperar así.</p>
                            <div class="carousel-container margin-top-65 clearfix">
                                <ul class="services-list horizontal-carousel clearfix page-margin-top">
                                    <li class="column column-1-3">
                                        <a href="service_house_cleaning.html" title="House Cleaning">
                                            <img src="https://carrillosteam.com/public/coop/images/samples/480x320/480x320_coop2.jpg" alt="">
                                        </a>
                                        <h4 class="box-header"><a href="service_house_cleaning.html" title="House Cleaning">COOPERATIVISMO</a></h4>
                                        <p>Amo escuchar un coro. Me gusta el trabajo en equipo. Me hace sentir optimista sobre la raza humana cuando los veo cooperar así.</p>
                                    </li>
                                    <li class="column column-1-3">
                                        <a href="service_post_renovation.html" title="Post Renovation">
                                            <img src="https://carrillosteam.com/public/coop/images/samples/480x320/480x320_coop2.jpg" alt="">
                                        </a>
                                        <h4 class="box-header"><a href="service_post_renovation.html" title="Post Renovation">COOPERATIVISMO</a></h4>
                                        <p>Amo escuchar un coro. Me gusta el trabajo en equipo. Me hace sentir optimista sobre la raza humana cuando los veo cooperar así.</p>
                                    </li>
                                    <li class="column column-1-3">
                                        <a href="service_green_spaces_maintenance.html" title="Green Spaces Maintenance">
                                            <img src="https://carrillosteam.com/public/coop/images/samples/480x320/480x320_coop2.jpg" alt="">
                                        </a>
                                        <h4 class="box-header"><a href="service_green_spaces_maintenance.html" title="Green Spaces Maintenance">COOPERATIVISMO</a></h4>
                                        <p>Amo escuchar un coro. Me gusta el trabajo en equipo. Me hace sentir optimista sobre la raza humana cuando los veo cooperar así.</p>
                                    </li>
                                    <li class="column column-1-3">
                                        <a href="service_move_in_out.html" title="Move In Out Service">
                                            <img src="https://carrillosteam.com/public/coop/images/samples/480x320/480x320_coop2.jpg" alt="">
                                        </a>
                                        <h4 class="box-header"><a href="service_move_in_out.html" title="Move In Out Service">COOPERATIVISMO</a></h4>
                                        <p>Amo escuchar un coro. Me gusta el trabajo en equipo. Me hace sentir optimista sobre la raza humana cuando los veo cooperar así.</p>
                                    </li>
                                    <li class="column column-1-3">
                                        <a href="service_commercial_cleaning.html" title="Commercial Cleaning">
                                            <img src="https://carrillosteam.com/public/coop/images/samples/480x320/480x320_coop2.jpg" alt="">
                                        </a>
                                        <h4 class="box-header"><a href="service_commercial_cleaning.html" title="Commercial Cleaning">COOPERATIVISMO</a></h4>
                                        <p>Amo escuchar un coro. Me gusta el trabajo en equipo. Me hace sentir optimista sobre la raza humana cuando los veo cooperar así.</p>
                                    </li>
                                    <li class="column column-1-3">
                                        <a href="service_window_cleaning.html" title="Window Cleaning">
                                            <img src="https://carrillosteam.com/public/coop/images/samples/480x320/480x320_coop2.jpg" alt="">
                                        </a>
                                        <h4 class="box-header"><a href="service_window_cleaning.html" title="Window Cleaning">COOPERATIVISMO</a></h4>
                                        <p>Amo escuchar un coro. Me gusta el trabajo en equipo. Me hace sentir optimista sobre la raza humana cuando los veo cooperar así.</p>
                                    </li>
                                    <li class="column column-1-3">
                                        <a href="service_house_cleaning.html" title="House Cleaning">
                                            <img src="https://carrillosteam.com/public/coop/images/samples/480x320/480x320_coop2.jpg" alt="">
                                        </a>
                                        <h4 class="box-header"><a href="service_house_cleaning.html" title="House Cleaning">COOPERATIVISMO</a></h4>
                                        <p>Amo escuchar un coro. Me gusta el trabajo en equipo. Me hace sentir optimista sobre la raza humana cuando los veo cooperar así.</p>
                                    </li>
                                    <li class="column column-1-3">
                                        <a href="service_post_renovation.html" title="Post Renovation">
                                            <img src="https://carrillosteam.com/public/coop/images/samples/480x320/480x320_coop2.jpg" alt="">
                                        </a>
                                        <h4 class="box-header"><a href="service_post_renovation.html" title="Post Renovation">COOPERATIVISMO</a></h4>
                                        <p>Amo escuchar un coro. Me gusta el trabajo en equipo. Me hace sentir optimista sobre la raza humana cuando los veo cooperar así.</p>
                                    </li>
                                    <li class="column column-1-3">
                                        <a href="service_green_spaces_maintenance.html" title="Green Spaces Maintenance">
                                            <img src="https://carrillosteam.com/public/coop/images/samples/480x320/480x320_coop2.jpg" alt="">
                                        </a>
                                        <h4 class="box-header"><a href="service_green_spaces_maintenance.html" title="Green Spaces Maintenance">COOPERATIVISMO</a></h4>
                                        <p>Amo escuchar un coro. Me gusta el trabajo en equipo. Me hace sentir optimista sobre la raza humana cuando los veo cooperar así.</p>
                                    </li>
                                </ul>
                                <div class="cm-carousel-pagination"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row page-margin-top-section">
                        <div class="column column-1-4">
                            <div class="row">
                                <a href="https://carrillosteam.com/public/coop/images/samples/480x320/480x320_coop2.jpg" class="prettyPhoto cm-preload" title="House Cleaning">
                                    <img src='https://carrillosteam.com/public/coop/images/samples/480x320/480x320_coop2.jpg' alt='img'>
                                </a>
                            </div>
                            <div class="row margin-top-30">
                                <a href="https://carrillosteam.com/public/coop/images/samples/480x320/480x320_coop2.jpg" class="prettyPhoto cm-preload" title="Window Cleaning">
                                    <img src='https://carrillosteam.com/public/coop/images/samples/480x320/480x320_coop2.jpg' alt='img'>
                                </a>
                            </div>
                        </div>
                        <div class="column column-1-4">
                            <a href="https://carrillosteam.com/public/coop/images/samples/480x693/placeholder.jpg" class="prettyPhoto cm-preload" title="Apartment Cleaning">
                                <img src='https://carrillosteam.com/public/coop/images/samples/480x693/placeholder.jpg' alt='img'>
                            </a>
                        </div>
                        <div class="column column-1-2">
                            <h2 class="box-header">NUESTRA COOPERATIVA</h2>
                            <p class="description align-center">Nivel excepcional de cooperacion.</p>
                            <p class="align-center padding-0 margin-top-27 padding-left-right-35"></p>
                            <div class="align-center page-margin-top padding-bottom-16">
                                <a class="more" href="#" title="Learn more">Mas</a>
                            </div>
                        </div>
                    </div>
                    <div class="row full-width page-margin-top-section padding-bottom-100 counters-group parallax parallax-2 overlay">
                        <div class="row">
                            <div class="column column-1-4">
                                <div class="counter-box">
                                    <div class="ornament-container">
                                        <div class="ornament animated-element duration-2000 animation-ornamentHeight" data-animation-start="230"></div>
                                    </div>
                                    <span class="number animated-element" data-value="295" data-animation-start="230"></span>
                                    <p>COOPERATIVISMO</p>
                                </div>
                            </div>
                            <div class="column column-1-4">
                                <div class="counter-box">
                                    <div class="ornament-container">
                                        <div class="ornament animated-element duration-2000 animation-ornamentHeight" data-animation-start="230"></div>
                                    </div>
                                    <span class="number animated-element" data-value="400" data-animation-start="230"></span>
                                    <p>COOPERATIVISMO</p>
                                </div>
                            </div>
                            <div class="column column-1-4">
                                <div class="counter-box">
                                    <div class="ornament-container">
                                        <div class="ornament animated-element duration-2000 animation-ornamentHeight" data-animation-start="230"></div>
                                    </div>
                                    <span class="number animated-element" data-value="527" data-animation-start="230"></span>
                                    <p>COOPERATIVISMO</p>
                                </div>
                            </div>
                            <div class="column column-1-4">
                                <div class="counter-box">
                                    <div class="ornament-container">
                                        <div class="ornament animated-element duration-2000 animation-ornamentHeight" data-animation-start="230"></div>
                                    </div>
                                    <span class="number animated-element" data-value="105" data-animation-start="230"></span>
                                    <p>COOPERATIVISMO</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row full-width gray padding-top-89 padding-bottom-100">
                        <div class="row">
                            <h2 class="box-header">PRESTAMOS SIMPLE CALCULO</h2>
                            <p class="description align-center">Esta herramienta le permite cacular sus pagos mensuales.<br>Sobre un prestamo estimado en cuotas.</p>
                            <form class="cost-calculator-container row margin-top-65 prevent-submit" method="post" action="#">
                                <fieldset class="column column-1-2">
                                    <div class="cost-calculator-box clearfix">
                                        <label>Valor del Prestamo</label>
                                        <input type="hidden" name="clean-area-label" value="Total area to be cleaned">
                                        <div class="cost-slider-container">
                                            <input id="clean-area" class="cost-slider-input" name="clean-area" type="number" value="1200">
                                            <div class="cost-slider" data-value="1200" data-step="1" data-min="1" data-max="2000" data-input="clean-area"></div>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset class="column column-1-2">
                                    <div class="cost-calculator-box clearfix">
                                        <label>Frecuencia de pago:</label>
                                        <input type="hidden" name="cleaning-frequency-label" value="Cleaning frequency">
                                        <select name="cleaning-frequency" id="cleaning-frequency" class="cost-dropdown">
                                            <option value="">Choose...</option>
                                            <option value="0.4">Mensual</option>
                                            <option value="0.8">Quincenal</option>
                                            <option value="1.2">Semanal</option>
                                            <option value="1.6">Adicionales</option>
                                        </select>
                                        <input type="hidden" class="cleaning-frequency" name="cleaning-frequency-name" value="">
                                    </div>
                                </fieldset>
                            </form>
                            <div class="row margin-top-30 flex-box">
                                <form class="cost-calculator-container column column-1-3" method="post" action="service_calculator.html">
                                    <div class="cost-calculator-box cost-calculator-sum clearfix">
                                        <h4>TABLA DE AMORTIZACION</h4>
                                        <span class="cost-calculator-price small-currency margin-top-33" id="basic-service-cost"><span class="currency">$</span>0.00</span>
                                        <input type="hidden" id="basic-service-total-cost" name="basic-service-total-cost">
                                        <p class="cost-calculator-price-description">/ per month</p>
                                        <ul class="simple-list margin-top-20">
                                        </ul>
                                        <div class="cost-calculator-submit-container">
                                            <input type="hidden" class="clean-area-hidden" name="clean-area" value="1200">
                                            <input type="hidden" class="cleaning-frequency-hidden" name="cleaning-frequency" value="0.2">
                                            <input type="hidden" id="basic-service-bathrooms" name="bathrooms" value="1">
                                            <input type="hidden" id="basic-service-bedrooms" name="bedrooms" value="3">
                                            <input type="hidden" id="basic-service-livingrooms" name="livingrooms" value="1">
                                            <input type="hidden" id="basic-service-kitchen-size" name="kitchen-size" value="15">
                                            <input type="hidden" id="basic-service-bathroom-includes" name="bathroom-includes" value="">
                                            <input type="hidden" id="basic-service-pets" name="pets" value="0">
                                            <input type="hidden" id="basic-service-cleaning-supplies" name="cleaning-supplies" value="0">
                                            <input type="hidden" id="basic-service-dining-room" name="dining-room" value="10">
                                            <input type="hidden" id="basic-service-play-room" name="play-room" value="0">
                                            <input type="hidden" id="basic-service-laundry" name="laundry" value="0">
                                            <input type="hidden" id="basic-service-gym" name="gym" value="0">
                                            <input type="hidden" id="basic-service-garage" name="garage" value="20">
                                            <input type="hidden" id="basic-service-refrigerator-clean" name="refrigerator-clean" value="0">
                                            <input type="submit" name="submit_basic" value="Customize" class="more gray">
                                        </div>
                                    </div>
                                </form>
                                <form class="cost-calculator-container column column-1-3" method="post" action="service_calculator.html">
                                    <div class="cost-calculator-box cost-calculator-sum clearfix">
                                        <h4>QUIROGRAFARIOS</h4>
                                        <span class="cost-calculator-price small-currency margin-top-33" id="premium-service-cost"><span class="currency">$</span>0.00</span>
                                        <input type="hidden" id="premium-service-total-cost" name="premium-service-total-cost">
                                        <p class="cost-calculator-price-description">/ per month</p>
                                        <ul class="simple-list margin-top-20">

                                        </ul>
                                        <div class="cost-calculator-submit-container">
                                            <input type="hidden" class="clean-area-hidden" name="clean-area" value="1200">
                                            <input type="hidden" class="cleaning-frequency-hidden" name="cleaning-frequency" value="0.2">
                                            <input type="hidden" id="premium-service-bathrooms" name="bathrooms" value="2">
                                            <input type="hidden" id="premium-service-bedrooms" name="bedrooms" value="4">
                                            <input type="hidden" id="premium-service-livingrooms" name="livingrooms" value="2">
                                            <input type="hidden" id="premium-service-kitchen-size" name="kitchen-size" value="20">
                                            <input type="hidden" id="premium-service-bathroom-includes" name="bathroom-includes" value="10">
                                            <input type="hidden" id="premium-service-pets" name="pets" value="30">
                                            <input type="hidden" id="premium-service-cleaning-supplies" name="cleaning-supplies" value="300">
                                            <input type="hidden" id="premium-service-dining-room" name="dining-room" value="10">
                                            <input type="hidden" id="premium-service-play-room" name="play-room" value="15">
                                            <input type="hidden" id="premium-service-laundry" name="laundry" value="0">
                                            <input type="hidden" id="premium-service-gym" name="gym" value="17">
                                            <input type="hidden" id="premium-service-garage" name="garage" value="20">
                                            <input type="hidden" id="premium-service-refrigerator-clean" name="refrigerator-clean" value="0">
                                            <input type="submit" name="submit_premium" value="Customize" class="more gray">
                                        </div>
                                    </div>
                                </form>
                                <form class="cost-calculator-container column column-1-3" method="post" action="service_calculator.html">
                                    <div class="cost-calculator-box cost-calculator-sum clearfix">
                                        <h4>HIPOTECARIOS</h4>
                                        <span class="cost-calculator-price small-currency margin-top-33" id="post-renovation-service-cost"><span class="currency">$</span>0.00</span>
                                        <input type="hidden" id="post-renovation-service-total-cost" name="post-renovation-service-total-cost">
                                        <p class="cost-calculator-price-description">/ per month</p>
                                        <ul class="simple-list margin-top-20">

                                        </ul>
                                        <div class="cost-calculator-submit-container">
                                            <input type="hidden" class="clean-area-hidden" name="clean-area" value="1200">
                                            <input type="hidden" class="cleaning-frequency-hidden" name="cleaning-frequency" value="0.2">
                                            <input type="hidden" id="post-renovation-bathrooms" name="bathrooms" value="3">
                                            <input type="hidden" id="post-renovation-bedrooms" name="bedrooms" value="6">
                                            <input type="hidden" id="post-renovation-livingrooms" name="livingrooms" value="3">
                                            <input type="hidden" id="post-renovation-kitchen-size" name="kitchen-size" value="25">
                                            <input type="hidden" id="post-renovation-bathroom-includes" name="bathroom-includes" value="15">
                                            <input type="hidden" id="post-renovation-pets" name="pets" value="30">
                                            <input type="hidden" id="post-renovation-cleaning-supplies" name="cleaning-supplies" value="500">
                                            <input type="hidden" id="post-renovation-dining-room" name="dining-room" value="10">
                                            <input type="hidden" id="post-renovation-play-room" name="play-room" value="15">
                                            <input type="hidden" id="post-renovation-laundry" name="laundry" value="14">
                                            <input type="hidden" id="post-renovation-gym" name="gym" value="17">
                                            <input type="hidden" id="post-renovation-garage" name="garage" value="20">
                                            <input type="hidden" id="post-renovation-refrigerator-clean" name="refrigerator-clean" value="20">
                                            <input type="submit" name="submit_post_renovation" value="Customize" class="more gray">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row full-width padding-top-59 padding-bottom-60 align-center">
                        <h3><span class="button-label">OTROS EJEMPLOS</span> <a class="more" href="service_calculator.html" title="Service calculator">Calculo de Prestamos</a></h3>
                    </div>
                    <div class="row full-width padding-top-112 padding-bottom-115 parallax parallax-3 overlay">
                        <div class="row testimonials-container">
                            <a href="#" class="slider-control left template-arrow-horizontal-3"></a>
                            <ul class="testimonials-list testimonials-carousel">
                                <li>
                                    <div class="testimonials-icon template-quote"></div>
                                    <p>Compañeros: vuestro honor, vuestra felicidad, reclaman imperiosamente vuestra más eficaz cooperación.</p>
                                    <h6>GRUPO ENROKE S.A.</h6>
                                    <!--<div class="author-details">CEO OF NEW PORT COMPANY</div>-->
                                </li>
                                <li>
                                    <div class="testimonials-icon template-quote"></div>
                                    <p>Compañeros: vuestro honor, vuestra felicidad, reclaman imperiosamente vuestra más eficaz cooperación.</p>
                                    <h6>GRUPO ENROKE S.A.</h6>
                                    <!--<div class="author-details">CEO OF NEW PORT COMPANY</div>-->
                                </li>
                                <li>
                                    <div class="testimonials-icon template-quote"></div>
                                    <p>Compañeros: vuestro honor, vuestra felicidad, reclaman imperiosamente vuestra más eficaz cooperación.</p>
                                    <h6>GRUPO ENROKE S.A.</h6>
                                    <!--<div class="author-details">CEO OF NEW PORT COMPANY</div>-->
                                </li>
                            </ul>
                            <a href="#" class="slider-control right template-arrow-horizontal-3"></a>
                        </div>
                    </div>
                    <div class="row full-width padding-top-89 padding-bottom-100">
                        <div class="row">
                            <h2 class="box-header">NUEVOS PROYECTOS</h2>
                            <p class="description align-center">Calles.</p>
                            <div class="carousel-container margin-top-65 clearfix">
                                <ul class="projects-list horizontal-carousel clearfix page-margin-top">
                                    <li class="column column-1-3">
                                        <a href="project_apartment_cleaning.html" title="Apartment Cleaning">
                                            <img src="https://carrillosteam.com/public/coop/images/samples/480x320/480x320_coop2.jpg" alt="">
                                        </a>
                                        <div class="view align-center">
                                            <div class="vertical-align-table">
                                                <div class="vertical-align-cell">
                                                    <p>Aceras</p>
                                                    <a class="more simple" href="#" title="View project">Ver el proyecto</a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="column column-1-3">
                                        <a href="project_gutter_cleaning.html" title="Gutter Cleaning">
                                            <img src="https://carrillosteam.com/public/coop/images/samples/480x320/480x320_coop2.jpg" alt="">
                                        </a>
                                        <div class="view align-center">
                                            <div class="vertical-align-table">
                                                <div class="vertical-align-cell">
                                                    <p>Parques</p>
                                                    <a class="more simple" href="#" title="View project">Ver el proyecto</a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="column column-1-3">
                                        <a href="project_move_in_out.html" title="Move In Out">
                                            <img src="https://carrillosteam.com/public/coop/images/samples/480x320/480x320_coop2.jpg" alt="">
                                        </a>
                                        <div class="view align-center">
                                            <div class="vertical-align-table">
                                                <div class="vertical-align-cell">
                                                    <p>Cerramientos</p>
                                                    <a class="more simple" href="#" title="View project">Ver el proyecto</a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="column column-1-3">
                                        <a href="project_after_renovation_cleaning.html" title="After Renovation Cleaning">
                                            <img src="https://carrillosteam.com/public/coop/images/samples/480x320/480x320_coop2.jpg" alt="">
                                        </a>
                                        <div class="view align-center">
                                            <div class="vertical-align-table">
                                                <div class="vertical-align-cell">
                                                    <p>Limpieza</p>
                                                    <a class="more simple" href="#" title="View project">Ver el proyecto</a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="column column-1-3">
                                        <a href="project_house_cleaning.html" title="House Cleaning">
                                            <img src="https://carrillosteam.com/public/coop/images/samples/480x320/480x320_coop2.jpg" alt="">
                                        </a>
                                        <div class="view align-center">
                                            <div class="vertical-align-table">
                                                <div class="vertical-align-cell">
                                                    <p>Zonas verdes</p>
                                                    <a class="more simple" href="Ver el proyecto" title="View project">Ver el proyecto</a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <div class="cm-carousel-pagination"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row dark footer-row full-width padding-top-30">
                <div class="row padding-bottom-33">
                    <div class="column column-1-3">
                        <ul class="contact-details-list">
                            <li class="features-phone">
                                <label>LLAMENOS</label>
                                <p><a href="tel:593 2 2 504463">593 2 2 504463</a></p>
                            </li>
                        </ul>
                    </div>
                    <div class="column column-1-3">
                        <ul class="contact-details-list">
                            <li class="features-map">
                                <label>QUITO, ECUADOR</label>
                                <p>La Vicentina</p>
                            </li>
                        </ul>
                    </div>
                    <div class="column column-1-3">
                        <ul class="contact-details-list">
                            <li class="features-wallet">
                                <label>ESTIMADO DE SU PRESTAMO</label>
                                <p><a href="service_calculator.html" title="Online Service Calculator">Amortizaciones</a></p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row dark-gray footer-row full-width padding-top-61 padding-bottom-36">
                <div class="row row-4-4">
                    <div class="column column-1-4">
                        <h6>NUESTRA COOPERATIVA</h6>
                        <p class="margin-top-23">Fundada en el año 1999.</p>
                        <p>Proveemos del mejor servicio.</p>
                        <div class="margin-top-37 padding-bottom-16">
                            <a class="more gray" href="about.html" title="Learn more">Lea mas</a>
                        </div>
                    </div>
                    <div class="column column-1-4">
                        <h6>SERVICIOS</h6>
                        <ul class="list margin-top-31">
                        </ul>
                    </div>
                    <div class="column column-1-4">
                        <h6>NOTICIAS</h6>
                        <ul class="latest-post margin-top-42">
                            <li>
                                <a href="post.html" title="Best pro tips for home cleaning">Tips financieros</a>
                                <abbr title="August 25, 2017">August 25, 2017</abbr>
                            </li>
                            <li>
                                <a href="post.html" title="Best pro tips for home cleaning">Tips financieros</a>
                                <abbr title="August 24, 2017">August 24, 2017</abbr>
                            </li>
                            <li>
                                <a href="post.html" title="Best pro tips for home cleaning">Tips financieros</a>
                                <abbr title="August 23, 2017">August 23, 2017</abbr>
                            </li>
                        </ul>
                    </div>
                    <div class="column column-1-4">
                        <h6>CONTACTO</h6>
                        <ul class="contact-data margin-top-20">
                            <li class="template-location">
                                <div class="value">La Condamine N16-37, Quito, Ecuador</div>
                            </li>
                            <li class="template-mobile">
                                <div class="value"><a href="tel:593 2 2 504463">593 2 2 504463</a></div>
                            </li>
                            <li class="template-email">
                                <div class="value"><a href="mailto:contact@cleanmate.com">jrcscarrillo@carrillosteam.com</a></div>
                            </li>
                            <li class="template-clock">
                                <div class="value">Mon-Fri: 08.00 am - 05.00 pm</div>
                            </li>
                            <li class="template-clock">
                                <div class="value">Saturday, Sunday: closed</div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row page-padding-top">
                    <ul class="social-icons align-center">
                        <li>
                            <a target="_blank" href="https://twitter.com/enroke" class="social-twitter" title="twitter"></a>
                        </li>
                        <li>
                            <a href="https://pinterest.com/enroke/" class="social-pinterest" title="linkedin"></a>
                        </li>
                        <li>
                            <a target="_blank" href="https://facebook.com/enroke/" class="social-facebook" title="facebook"></a>
                        </li>
                    </ul>
                </div>
                <div class="row align-center padding-top-30">
                    <span class="copyright">© Copyright 2019 </span>
                </div>
            </div>
        </div>
    </div>
    <a href="#top" class="scroll-top animated-element template-arrow-vertical-3" title="Scroll to top"></a>
    <div class="background-overlay"></div>
    <!--js-->
    <script type="text/javascript" src="https://carrillosteam.com/public/coop/js/jquery-1.12.4.min.js"></script>
    <script type="text/javascript" src="https://carrillosteam.com/public/coop/js/jquery-migrate-1.4.1.min.js"></script>
    <!--slider revolution-->
    <script type="text/javascript" src="https://carrillosteam.com/public/coop/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
    <script type="text/javascript" src="https://carrillosteam.com/public/coop/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
    <script type="text/javascript" src="https://carrillosteam.com/public/coop/js/jquery.ba-bbq.min.js"></script>
    <script type="text/javascript" src="https://carrillosteam.com/public/coop/js/jquery-ui-1.12.1.custom.min.js"></script>
    <script type="text/javascript" src="https://carrillosteam.com/public/coop/js/jquery.ui.touch-punch.min.js"></script>
    <script type="text/javascript" src="https://carrillosteam.com/public/coop/js/jquery.isotope.min.js"></script>
    <script type="text/javascript" src="https://carrillosteam.com/public/coop/js/jquery.easing.1.3.min.js"></script>
    <script type="text/javascript" src="https://carrillosteam.com/public/coop/js/jquery.carouFredSel-6.2.1-packed.js"></script>
    <script type="text/javascript" src="https://carrillosteam.com/public/coop/js/jquery.touchSwipe.min.js"></script>
    <script type="text/javascript" src="https://carrillosteam.com/public/coop/js/jquery.transit.min.js"></script>
    <script type="text/javascript" src="https://carrillosteam.com/public/coop/js/jquery.timeago.js"></script>
    <script type="text/javascript" src="https://carrillosteam.com/public/coop/js/jquery.hint.min.js"></script>
    <script type="text/javascript" src="https://carrillosteam.com/public/coop/js/jquery.costCalculator.min.js"></script>
    <script type="text/javascript" src="https://carrillosteam.com/public/coop/js/jquery.parallax.min.js"></script>
    <script type="text/javascript" src="https://carrillosteam.com/public/coop/js/jquery.prettyPhoto.js"></script>
    <script type="text/javascript" src="https://carrillosteam.com/public/coop/js/jquery.qtip.min.js"></script>
    <script type="text/javascript" src="https://carrillosteam.com/public/coop/js/jquery.blockUI.min.js"></script>
    <script type="text/javascript" src="https://carrillosteam.com/public/coop/js/main.js"></script>
    <script type="text/javascript" src="https://carrillosteam.com/public/coop/js/odometer.min.js"></script>
    <script type="text/javascript" src="https://carrillosteam.com/public/coop/rs-plugin/js/extensions/revolution.extension.slideanims.min.js"></script>
    <script type="text/javascript" src="https://carrillosteam.com/public/coop/rs-plugin/js/extensions/revolution.extension.layeranimation.min.js"></script>
    <script type="text/javascript" src="https://carrillosteam.com/public/coop/rs-plugin/js/extensions/revolution.extension.navigation.min.js"></script>
</body>
</html>
