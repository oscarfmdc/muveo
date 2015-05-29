<?php
include_once 'php/db_connect.php';
include_once 'php/functions.php';

sec_session_start();

if(isset($_GET['id'])){
    $id=$_GET['id'];
}

$oferta = getOferta($id,$mysqli);
$user = getUser($oferta['idOfertante'],$mysqli);

?>
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

<div class="container main-container">
    <div class="row">
        <!-- Overview de la oferta  -->
        <aside id="overview" class="col-lg-3 well">
            <div id=anuncio>
                <h4><strong>
                        <?php //Titulo Oferta
                            printf("%s",$oferta['titulo']);
                        ?>
                    </strong></h4>
                    <span>
                        <?php //Imagen Oferta
                            printf('<img id="portada" src="%s" class="img-responsive">',$oferta['portadaPath']);
                        ?>
                    </span>
            </div>
            <div id="author">
              <div class="media">
                <div class="media-left media-middle">
                <?php //Imagen Ofertante
                    printf('<img id=im_perfil src="%s" class="img-responsive">',$user['avatarPath']); ?>
                </div>
                <div class="media-body">
                <?php //Nombre Ofertante
                  printf('<a href="perfil.php?id=%d"><h4><strong>'.$user['nombre'].' '.$user['apellidos'].'</strong></h4></a>', $user['idUsuario']);?>
                </div>
              </div>
                <!--<h5> <em> Soy programadora </em> </h5> -->
            </div>
            <hr>
                <span id="rating">
                    <h5 style="margin-bottom:5px"> <strong>Valoración:</strong></h5>
                    <?php //Valoracion oferta
                    $valorar=tieneContrato($_SESSION['user_id'], $oferta['idOferta'], $mysqli);
                    $v = $oferta['valoracion'];
                    if(!$v>0)$v=0;
                    for($i=0; $i<5; $i++){
                        if($valorar)echo ('<a href="/php/valorar.php?idOferta='.$oferta['idOferta'].'&idUsuario='.$_SESSION['user_id'].'&valoracion='.($i+1).'" >');
                        if($v>$i) echo '<span class="glyphicon glyphicon-star"></span>';
                        else echo '<span class="glyphicon glyphicon-star-empty"></span>';
                        if($valorar)echo '</a>';
                    }
                    ?>
                    <!--
                    <span class="glyphicon glyphicon-star estrella"></span>
                    <span class="glyphicon glyphicon-star estrella"></span>
                    <span class="glyphicon glyphicon-star-empty estrella"></span>
                    <span class="glyphicon glyphicon-star-empty estrella"></span>
                    <span class="glyphicon glyphicon-star-empty estrella"></span>
                    -->
                </span>
            <!--
            <h6><strong>Registrado desde:</strong></h6>
            <span id="fecha_registro"> Abril 2015</span>
            -->
            <h6><strong>País:</strong></h6>
            <span id="nacionalidad">
                <?php //Nacionalidad Ofertante
                    printf("%s",$user['nacionalidad']);
                ?>
            </span>
            <address id="contacto-anunciante">
                <h6><strong>Contacto: </strong></h6>
                <?php //Email Ofertante
                    printf('<a href="mailto:%s"><strong>'.$user['email'].'</strong></a>',$user['email']);
                ?>
            </address>
            <hr>
            <h4><strong>Formación/Descripción</strong></h4>
            <p>
                <?php //Formacion Ofertante
                printf("%s",$user['formacion']);
                ?>
            </p>
        </aside>
        <!-- Overview de la oferta -->
        <!-- Datos de la oferta -->
        <section id="datos-oferta" class="col-lg-8">
            <?php
            if (login_check($mysqli) == true) {
                if($_SESSION['tipo']==1){//Ofertante
                    if($_SESSION['user_id']==$oferta['idOfertante']){//Editar oferta
                        echo '<a href="editar_oferta.php?id='.$oferta['idOferta'].'">
                            <button id="btn-contratar" class="btn btn-primary">Editar Oferta</button>
                        </a>';
                    }
                }
                else{//Contratante
                    if(!tieneContrato($_SESSION['user_id'],$oferta['idOferta'],$mysqli)){
                        echo '<a type="button" id="btn-contratar" href="/php/contratar.php?id='.$_SESSION['user_id'].'&idOferta='.$oferta['idOferta'].'" class="btn btn-primary">
                    <span class="glyphicon glyphicon-hand-right">
                    </span>
                        Contratar
                    </a>';
                    }
                    else{
                        echo '<button disabled id="btn-contratar" class="btn btn-success">
                    <span class="glyphicon glyphicon-hand-right">
                    </span>
                        Ya contratada
                    </button>';
                    }
                }
            }
            else{
                echo '<button id="btn-contratar" class="btn btn-primary" data-toggle="modal" data-target="#loginModal">
                    <span class="glyphicon glyphicon-hand-right">
                    </span>
                Contratar
            </button>';
            }
            ?>
            <h3> Especificaciones de la oferta</h3>
            <hr>
            <ul class="list-unstyled">
                <li> <strong>Fecha de publicación: </strong><span>
                        <?php //Fecha Publicacion Oferta
                            printf("%s",$oferta['fechaPublicacion']);
                        ?>
                    </span> </li>
                <li> <strong>Categoría: </strong><span>
                        <?php //Categoria Oferta
                            printf("%s",$oferta['categoria']);
                        ?>
                    </span> </li>
                <li> <strong>Precio: </strong><span>
                        <?php //Precio Oferta
                        printf("%d€/hora",$oferta['precio']);
                        ?>
                    </span></li>
                <li> <strong>Idioma: </strong><span>
                        <?php //Idioma Oferta
                            switch ($oferta['idioma']){
                                case "en":
                                    $idioma="Inglés";
                                    break;
                                case "es":
                                    $idioma="Español";
                                    break;
                                case "fr":
                                    $idioma="Francés";
                                    break;
                                case "ch":
                                    $idioma="Chino";
                                    break;
                                case "de":
                                    $idioma="Alemán";
                                    break;
                            }
                            printf("%s",$idioma);
                        ?>
                    </span></li>
                <li> <strong>Provincia: </strong><span>
                        <?php //Provincia Oferta
                            printf("%s",$oferta['provincia']);
                        ?>
                    </span></li>
                <li> <strong>Localizacion: </strong><span>
                        <?php //Localizacion Oferta
                            printf("%s",$oferta['localizacion']);
                        ?>
                    </span></li>
            </ul>
            <h3> Descripción de la oferta</h3>
            <hr>
            <p>
                <?php //Descripcion Oferta
                    printf("%s",$oferta['descripcion']);
                ?>
            </p>
            <!-- <div id="location-map">
                 <h4> Mapa </h4>
                 <hr>
                 <div id="map"></div>
             </div>-->
            <div id="tag-list">
                <h3>
                    Temas relacionados
                </h3>
                <hr>
                <?php //Tags Oferta
                    foreach($mysqli->query("SELECT nombre FROM Etiqueta, EtiquetasOferta WHERE Etiqueta.idEtiqueta = EtiquetasOferta.idEtiqueta
                    AND EtiquetasOferta.idOferta =".$oferta['idOferta'])as $tag){
                        printf('<span class="tag">'.$tag.'</span>');
                    }
                ?>
            </div>
        </section>
        <!-- Datos de la oferta -->
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