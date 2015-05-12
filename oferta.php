<!DOCTYPE html>
<html>
<head>
    <?php include 'head.php'; ?>
    <link href="css/oferta.css" rel="stylesheet">
    <title>Muveo - Oferta</title>
</head>
<body>
<!-- Header -->
<?php include 'header.php'; ?>
<!-- Header End-->

<div id="main-container">
    <div class="container">
        <div class="row">
            <section id="datos-oferta-section" class="col-12-lg">
                <div class="container-fluid">
                    <div class="row">
                        <!-- Overview de la oferta  -->
                        <aside id="overview" class="col-4-md">
                            <h3><strong>Anunciante</strong></h3>
                            <h4> <em> Profesión </em> </h4>
                            <hr>
                            <span>
                                <img id="avatar" src="./images/avatar_test.jpg" class="img-responsive">
                            </span>
                            <span id="rating">
                                <h5 style="margin-bottom:5px"> <strong>Valoración:</strong></h5>
                                <span class="glyphicon glyphicon-star estrella"></span>
                                <span class="glyphicon glyphicon-star estrella"></span>
                                <span class="glyphicon glyphicon-star-empty estrella"></span>
                                <span class="glyphicon glyphicon-star-empty estrella"></span>
                                <span class="glyphicon glyphicon-star-empty estrella"></span>
                            </span>

                            <h6><strong>Registrado desde:</strong></h6>
                            <span id="fecha_registro"> Abril 2015</span>
                            <h6><strong>País:</strong></h6>
                            <span id="nacionalidad"> España </span>
                            <address id="contacto-anunciante">
                                <h6><strong>Contacto: </strong></h6>
                                <a href="mailto:#"><strong>first.last@example.com</strong></a>
                            </address>
                            <hr>
                            <h4><strong>Formación/Descripción</strong></h4>
                            <p>
                                Quick and Creative IT Fingers Providing Web Solutions In:-
                                <br><br>
                                PHP5, MVC, .NET, Responsive Websites, HTML5, Parallax, Jquery, YII, Cake PHP, Bootstrap, WordPress, Joomla, Magento etc...
                                <br><br>
                                Lets discuss the needs and will deliver the results exactly ... in fact more than you expect for all areas in website designing and development. We are true experts for all web based solutions and our work history and positive feedback are saying it...
                                <br><br>
                                We do our work in an absurdly detail-oriented and communicative way. We like to spend time on new technologies by which we can convert our work more and more effective. We are 20 experts working in a team and everybody is expert in their respective technology.
                                <br><br>
                                We imagine that if a programmer/designer/developer understood all technologies perfectly, the time required for a project would only be the time spent typing out the few thousand lines of necessary code and all projects would be completed in a matter of hours, rather than days or weeks.
                            </p>
                        </aside>
                        <!-- Overview de la oferta -->
                        <!-- Datos de la oferta -->
                        <div id="datos-oferta" class="col-offset-4-md col-8-md">
                            <button id="btn-contratar" class="btn btn-primary" data-toggle="modal" data-target="#loginModal">
                                <span class="glyphicon glyphicon-hand-right">
                                </span>
                                Contratar
                            </button>
                            <button class="btn btn-default glyphicon glyphicon-cog" hidden id="preferencias" style="float: right"></button>
                            <h3> <strong> Título anuncio </strong></h3>
                            <h4> Descripción </h4>
                            <hr>
                            <p>
                                PHP5, MVC, .NET, Responsive Websites, HTML5, Parallax, Jquery, YII, Cake PHP, Bootstrap, WordPress, Joomla, Magento etc...
                                <br><br>
                                Lets discuss the needs and will deliver the results exactly ... in fact more than you expect for all areas in website designing and development. We are true experts for all web based solutions and our work history and positive feedback are saying it...
                                <br><br>
                                We do our work in an absurdly detail-oriented and communicative way. We like to spend time on new technologies by which we can convert our work more and more effective. We are 20 experts working in a team and everybody is expert in their respective technology.
                                <br><br>
                                We imagine that if a programmer/designer/developer understood all technologies perfectly, the time required for a project would only be the time spent typing out the few thousand lines of necessary code and all projects would be completed in a matter of hours, rather than days or weeks.
                            </p>
                            <h4> Datos </h4>
                            <hr>
                            <ul class="list-unstyled">
                                <li> Fecha de publicación: <span>6 de abril de 2015</span> </li>
                                <li> Horario: <span>19:00 - 20:00</span> </li>
                                <li> Precio: <span>12€/hora</span></li>
                                <li> Idioma: <span>Español/Inglés</span></li>
                                <li> Localizacion: <span>UPM Campus de Montegancedo</span></li>
                            </ul>
                            <div id="location-map">
                                <h4> Mapa </h4>
                                <hr>
                                <div id="map"></div>
                            </div>
                            <div id="tag-list">
                                <h4>
                                    Temas relacionados
                                </h4>
                                <hr>
                                <a class="tag" href=""> HTML </a>
                                <a class="tag" href=""> CSS </a>
                                <a class="tag" href=""> JavaScript </a>
                            </div>
                        </div>
                        <!-- Datos de la oferta -->
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

<!-- Modal para login -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myLoginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h3>Inicia sesión para continuar</h3>
                <h5>¿No tienes cuenta? ¡Registrate <a href="register.php"> aquí</a> en menos de un minuto!</h5>
            </div>
            <div class="modal-body">
                <form class="form-horizontal">
                    <div class="form-group">
                        <label for="inputUsername" class="col-xs-4 control-label"> Nombre de usuario </label>
                        <div class="col-xs-6">
                            <input type="text" class="form-control" id="inputUsername" placeholder="Usuario">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword" class="col-xs-4 control-label"> Contraseña </label>
                        <div class="col-xs-6">
                            <input type="password" class="form-control" id="inputPassword" placeholder="Contraseña">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">
                    Iniciar sesión
                </button>
                <button type="button" class="btn btn-default" data-dismiss="modal">
                    Cerrar
                </button>
            </div>
        </div>
    </div>
</div>
<!-- Modal para login -->

<!-- Footer -->
<footer id="lema" class="">
    © muveo.sytes.net 2015
</footer>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
<script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script>
    var map;
    function initialize() {
        var mapOptions = {
            center: new google.maps.LatLng(40.405268, -3.834794),
            zoom: 14
        };
        map = new google.maps.Map(document.getElementById("map"), mapOptions);
    }

    google.maps.event.addDomListener(window, 'load', initialize);
</script>
</body>
</html>