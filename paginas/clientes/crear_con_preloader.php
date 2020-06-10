<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>CSS3 spin preloader + preload Page</title>
  
  
   <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../../estilos/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../../estilos/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    WIFINET
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
 <!--     Fonts and icons     -->
 <link rel="stylesheet" type="text/css" href="../../estilos/css/iconos.css" />
 <link rel="stylesheet" href="../../estilos/css/fontawesome.css">
  <!-- CSS Files -->
  <link href="../../estilos/css/material-kit.css?v=2.0.4" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../../estilos/demo/demo.css" rel="stylesheet" />



   <!--   Core JS Files   -->
   <script src="../../estilos/js/core/jquery.min.js" type="text/javascript"></script>
  <script src="../../estilos/js/core/popper.min.js" type="text/javascript"></script>
  <script src="../../estilos/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
  <script src="../../estilos/js/plugins/moment.min.js"></script>
  <!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
  <script src="../../estilos/js/plugins/bootstrap-datetimepicker.js" type="text/javascript"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="../../estilos/js/plugins/nouislider.min.js" type="text/javascript"></script>
  <!--	Plugin for Sharrre btn -->
  <script src="../../estilos/js/plugins/jquery.sharrre.js" type="text/javascript"></script>
  <!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
  <script src="../../estilos/js/material-kit.js?v=2.0.4" type="text/javascript"></script>
  
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  
      <link rel="stylesheet" href="css/style.css">

  
</head>

<body>

  <div id="loader-wrapper">
  <div id="loader"></div>
  
  <div class="loader-section section-left"></div>
  <div class="loader-section section-right"></div>
  
</div>

     <?php include 'menu.php'; ?>
    
     <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>


        <div class="main main-raised">

            <div class="section section-basic">
                <div class="container">

                    <div id="inputs">
                        <div class="title">


                            <h3>Introduzca los datos del cliente</h3>


                        </div>


                        <form action="post.php" method="post">


                            <div class="row">


                                <!-- Este es otro campo de texto mas sencillo -->

                                <!-- <div class="col-lg-3 col-sm-4">
                                  <div class="form-group has-default">
                                    <input type="text" class="form-control" placeholder="Regular">
                                  </div>
                                </div> -->

                                <div class="col-lg-3 col-sm-4">
                                    <div class="form-group">
                                        <label for="idnombre1" class="bmd-label-floating">Primer nombre</label>
                                        <input type="text" name="nombre1" class="form-control" id="idnombre1">
                                        <span class="bmd-help">Escriba el primer nombre del cliente</span>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-sm-4">
                                    <div class="form-group">
                                        <label for="idnombre2" class="bmd-label-floating">Segundo nombre</label>
                                        <input type="text" name="nombre2" class="form-control" id="idnombre2">
                                        <span class="bmd-help">Escriba el segundo nombre del cliente</span>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-sm-4">
                                    <div class="form-group">
                                        <label for="idapellido1" class="bmd-label-floating">Primer apellido</label>
                                        <input type="text" name="apellido1" class="form-control" id="idapellido1">
                                        <span class="bmd-help">Escriba el primer apellido del cliente</span>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-sm-4">
                                    <div class="form-group">
                                        <label for="idapellido2" class="bmd-label-floating">Segundo apellido</label>
                                        <input type="text" name="apellido2" class="form-control" id="idapellido2">
                                        <span class="bmd-help">Escriba el segundo apellido del cliente</span>
                                    </div>
                                </div>

                                <!--           <div class="col-lg-3 col-sm-4">
                                              <div class="form-group">
                                                <label for="idfecha_nacimiento" class="bmd-label-floating">Fecha nacimiento</label>
                                                <input type="text" name="fecha_nacimiento" class="form-control" id="idfecha_nacimiento">
                                                <span class="bmd-help">Fecha de nacimientos del cliente</span>
                                              </div>
                                            </div>-->

                                <div class="col-lg-3 col-sm-4">
                                    <div class="form-group">
                                        <label class="label-control">Fecha de nacimiento</label>
                                        <input type="text" name="fecha_nacimiento" value="1990/01/01" readonly="true" id="idfecha_nacimiento" class="form-control datetimepicker">
                                    </div>
                                </div>

                                <div class="col-lg-3 col-sm-4">
                                    <div class="form-group">
                                        <label for="idcui" class="bmd-label-floating">CUI</label>
                                        <input type="text" name="cui" class="form-control" id="idcui">
                                        <span class="bmd-help">Cui del cliente</span>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-sm-4">
                                    <div class="form-group">
                                        <label for="idnit" class="bmd-label-floating">NIT</label>
                                        <input type="text" name="nit" class="form-control" id="idnit">
                                        <span class="bmd-help">Nit del cliente</span>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-sm-4">
                                    <div class="form-group">
                                        <label for="idlatitud" class="bmd-label-floating">Latitud</label>
                                        <input type="text" name="latitud" class="form-control" id="idlatitud" data-toggle="modal" data-target="#modal_mapa">
                                        <span class="bmd-help">latitud del cliente</span>
                                    </div>
                                </div>
                                
                                <div class="col-lg-3 col-sm-4">
                                    <div class="form-group">
                                        <label for="idlongitud" class="bmd-label-floating">Longitud</label>
                                        <input type="text" name="longitud" class="form-control" id="idlongitud" data-toggle="modal" data-target="#modal_mapa">
                                        <span class="bmd-help">longitud del cliente</span>
                                    </div>
                                </div>

                                
                                
                            </div>

                            <br>

                            <div class="row">

                                <div class="col-lg-3 col-sm-4">
                                    <button class="btn btn-primary" name="crear_cliente"><i class="material-icons">save</i> Guardar</button>
                                </div>

                            </div>

                        </form>

                    </div>


                </div>


            </div>

        </div>




        <!-- modal grande -->
        <div class="modal fade bd-example-modal-lg" id="modal_mapa" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title">Mapa</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i class="material-icons">clear</i>
                        </button>
                    </div>

                    <div id="map" style="margin-top:15px">
                    </div>
                    
                </div>
            </div>
        </div>
        <!--  fin de modal grande-->



        <footer class="footer" data-background-color="black">
            <div class="container">
                <nav class="float-left">
                    <ul>
                        <li>
                            <a href="https://www.creative-tim.com">
                                Creative Tim
                            </a>
                        </li>
                        <li>
                            <a href="https://creative-tim.com/presentation">
                                About Us
                            </a>
                        </li>
                        <li>
                            <a href="http://blog.creative-tim.com">
                                Blog
                            </a>
                        </li>
                        <li>
                            <a href="https://www.creative-tim.com/license">
                                Licenses
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="copyright float-right">
                    &copy;
                    <script>
                        document.write(new Date().getFullYear())
                    </script>, made with <i class="material-icons">favorite</i> by
                    <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a> for a better web.
                </div>
            </div>
        </footer>
        
        
        <script>
            $(document).ready(function () {
                //init DateTimePickers
                //materialKit.initFormExtendedDatetimepickers();

                $('#idfecha_nacimiento').datetimepicker({
                    //format: 'DD/MM/YYYY'
                    format: 'YYYY/MM/DD',
                    ignoreReadonly: true,
    allowInputToggle: true
                });


                // Sliders Init
                materialKit.initSliders();
            });


            function scrollToDownload() {
                if ($('.section-download').length != 0) {
                    $("html, body").animate({
                        scrollTop: $('.section-download').offset().top
                    }, 1000);
                }
            }


            $(document).ready(function () {

                $('#facebook').sharrre({
                    share: {
                        facebook: true
                    },
                    enableHover: false,
                    enableTracking: false,
                    enableCounter: false,
                    click: function (api, options) {
                        api.simulateClick();
                        api.openPopup('facebook');
                    },
                    template: '<i class="fab fa-facebook-f"></i> Facebook',
                    url: 'https://demos.creative-tim.com/material-kit/index.html'
                });

                $('#googlePlus').sharrre({
                    share: {
                        googlePlus: true
                    },
                    enableCounter: false,
                    enableHover: false,
                    enableTracking: true,
                    click: function (api, options) {
                        api.simulateClick();
                        api.openPopup('googlePlus');
                    },
                    template: '<i class="fab fa-google-plus"></i> Google',
                    url: 'https://demos.creative-tim.com/material-kit/index.html'
                });

                $('#twitter').sharrre({
                    share: {
                        twitter: true
                    },
                    enableHover: false,
                    enableTracking: false,
                    enableCounter: false,
                    buttons: {
                        twitter: {
                            via: 'CreativeTim'
                        }
                    },
                    click: function (api, options) {
                        api.simulateClick();
                        api.openPopup('twitter');
                    },
                    template: '<i class="fab fa-twitter"></i> Twitter',
                    url: 'https://demos.creative-tim.com/material-kit/index.html'
                });

            });
        </script>


        <script>



            var marker;
            var infowindow;

            function myMap() {
                var mapCanvas = document.getElementById("map");
                var myCenter = new google.maps.LatLng(15.471197643542778, -88.84186445817983);

                navigator.geolocation.getCurrentPosition(function (position) {
                    // initialLocation = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
                    map.setCenter(initialLocation);
                });

                var mapOptions = {
                    center: myCenter, zoom: 18
                            //mapTypeId:google.maps.MapTypeId.HYBRID
                };
                var map = new google.maps.Map(mapCanvas, mapOptions);
                google.maps.event.addListener(map, 'click', function (event) {
                    placeMarker(map, event.latLng);
                });
            }

            function placeMarker(map, location) {
                if (!marker || !marker.setPosition) {
                    marker = new google.maps.Marker({
                        position: location,
                        map: map,
                    });
                } else {
                    marker.setPosition(location);
                }
                if (!!infowindow && !!infowindow.close) {
                    infowindow.close();
                }
                infowindow = new google.maps.InfoWindow({
                    content: 'Latitude: ' + location.lat() + '<br>Longitude: ' + location.lng()
                });
                infowindow.open(map, marker);


                document.getElementById("idlatitud").value = location.lat();
                document.getElementById("idlongitud").value = location.lng();

            }


            //Deshabilitar el teclado en un textbox
            $("#idlatitud").keydown(false);
            $("#idlongitud").keydown(false);

        </script>



        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDyetklP8qKMOoWODKlWV_z7yndYz8ZeGM&callback=myMap"></script>


    
    
  <script src='https://codepen.io/fbrz/pen/9a3e4ee2ef6dfd479ad33a2c85146fc1.js'></script>
<!--<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>-->

  

    <script  src="js/index.js"></script>




</body>

</html>
