<?php
/**
 * Created by PhpStorm.
 * User: Marco
 * Date: 17/05/2015
 * Time: 19:00
 */

echo '<li class="list-group-item">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-xs-12 col-lg-2 text-center">
                                        <img src="'.$schl['portadaPath'].'" alt="bootsnipp"
                                             class="img-rounded img-responsive portada" />
                                    </div>
                                    <div class="col-xs-12 col-md-8 section-box">
                                        <h4>
                                           <a href="oferta.php?id='.$schl['idOferta'].'">' . $schl['titulo'] . ' </a>
                                        </h4>
                                        <p>
                                            <small>' . substr($schl['descripcion'], 0, 70) ."...". '</small>
                                        </p>
                                        <hr/>
                                        <div class="row rating-desc">
                                            <div class="col-lg-12">
                                                <small>
                                                    <label>Valoración</label>
                                                    ';
$v = $schl['valoracion'];
if(!$v>0)$v=0;

for($i=0; $i<5; $i++){
    if($v>$i) echo '<span class="glyphicon glyphicon-star"></span>';
    else echo '<span class="glyphicon glyphicon-star-empty"></span>';
}

echo'
                                                ('.$v.')
                                                </small>
                                                &nbsp;
                                                <small>
                                                    <label for="">Precio</label>
                                                    <span class="glyphicon glyphicon-euro"></span>
                                                    '.$schl['precio'].'&euro; / Hora
                                                </small>
                                                &nbsp;
                                                <small>
                                                    <label for="">Categoría</label>
                                                    ' . $schl['categoria'] . '
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-2 section-box hireButton">
                                        <a href="/php/contratar.php?id='.$_SESSION[user_id].'&idOferta='.$schl['idOferta'].'" class="btn btn-lg btn-success"><span class="glyphicon glyphicon-hand-right"></span>Contratar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>';