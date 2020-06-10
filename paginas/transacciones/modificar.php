<!DOCTYPE html>
<html lang="en">

    <head>

        <?php include '../header.php';
        ?>

    </head>

    <body class="index-page sidebar-collapse">


        <?php include '../menu.php'; ?>

        <?php
        if (isset($_GET['id_cliente'])) {

            include '../../clases/Cliente.php';

            $id_cliente = $_GET['id_cliente'];

            $primer_nombre;
            $segundo_nombre;
            $primer_apellido;
            $segundo_apellido;
            $fecha_nacimiento;
            $cui;
            $nit;
            $latitud;
            $longitud;
            $direccion;
            $telefono;

            $cliente = new Cliente();

            $result = $cliente->buscar_para_actualizar($id_cliente);

            if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {

                    $primer_nombre = $row['primer_nombre'];
                    $segundo_nombre = $row['segundo_nombre'];
                    $primer_apellido = $row['primer_apellido'];
                    $segundo_apellido = $row['segundo_apellido'];
                    $fecha_nacimiento = $row['fecha_nacimiento'];
                    $cui = $row['cui'];
                    $nit = $row['nit'];
                    $latitud = $row['latitud'];
                    $longitud = $row['longitud'];
                    $direccion = $row['direccion'];
                    $telefono = $row['telefono'];
                }
            }
        } else {

            echo '<meta http-equiv="Refresh" content="0;URL=mostrar_clientes.php">';
        }
        ?>

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


                            <h3>Modificar Cliente</h3>


                        </div>


                        <form action="post.php" method="post">


                            <div class="row">

                                <div class="col-lg-3 col-sm-4">
                                    <div class="form-group">
                                        <label for="idnombre1" class="bmd-label-floating">Primer nombre</label>
                                        <input type="text" name="nombre1" value="<?php echo $primer_nombre; ?>" class="form-control" id="idnombre1">
                                        <span class="bmd-help">Escriba el primer nombre del cliente</span>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-sm-4">
                                    <div class="form-group">
                                        <label for="idnombre2" class="bmd-label-floating">Segundo nombre</label>
                                        <input type="text" name="nombre2" value="<?php echo $segundo_nombre; ?>" class="form-control" id="idnombre2">
                                        <span class="bmd-help">Escriba el segundo nombre del cliente</span>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-sm-4">
                                    <div class="form-group">
                                        <label for="idapellido1" class="bmd-label-floating">Primer apellido</label>
                                        <input type="text" name="apellido1" value="<?php echo $primer_apellido; ?>" class="form-control" id="idapellido1">
                                        <span class="bmd-help">Escriba el primer apellido del cliente</span>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-sm-4">
                                    <div class="form-group">
                                        <label for="idapellido2" class="bmd-label-floating">Segundo apellido</label>
                                        <input type="text" name="apellido2" value="<?php echo $segundo_apellido; ?>" class="form-control" id="idapellido2">
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
                                        <input type="text" autocomplete="off" name="fecha_nacimiento" id="idfecha_nacimiento" class="form-control datetimepicker">
                                        <input type="hidden" name="fecha_nacimiento_oculta" id="idfecha_nacimiento_oculta" value="" />  
                                    </div>
                                </div>

                                <div class="col-lg-3 col-sm-4">
                                    <div class="form-group">
                                        <label for="idcui" class="bmd-label-floating">CUI</label>
                                        <input type="text" name="cui" value="<?php echo $cui; ?>" class="form-control" id="idcui">
                                        <span class="bmd-help">Cui del cliente</span>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-sm-4">
                                    <div class="form-group">
                                        <label for="idnit" class="bmd-label-floating">NIT</label>
                                        <input type="text" name="nit" value="<?php echo $nit; ?>" class="form-control" id="idnit">
                                        <span class="bmd-help">Nit del cliente</span>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-sm-4">
                                    <div class="form-group">
                                        <label for="idlatitud" class="bmd-label-floating">Latitud</label>
                                        <input type="text" name="latitud" value="<?php echo $latitud; ?>" class="form-control" id="idlatitud" data-toggle="modal" data-target="#modal_mapa" readonly rel="tooltip" data-placement="bottom" data-original-title="Hacer click para abrir un mapa">
                                        <span class="bmd-help">latitud del cliente</span>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-sm-4">
                                    <div class="form-group">
                                        <label for="idlongitud" class="bmd-label-floating">Longitud</label>
                                        <input type="text" name="longitud" value="<?php echo $longitud; ?>" class="form-control" id="idlongitud" data-toggle="modal" data-target="#modal_mapa" readonly rel="tooltip" data-placement="bottom" data-original-title="Hacer click para abrir un mapa">
                                        <span class="bmd-help">longitud del cliente</span>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-sm-4">
                                    <div class="form-group">
                                        <label for="iddireccion" class="bmd-label-floating">Dirección</label>
                                        <input type="text" name="direccion" value="<?php echo $direccion; ?>" class="form-control" id="iddireccion">
                                        <span class="bmd-help">Escriba la dirección del cliente</span>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-sm-4">
                                    <div class="form-group">
                                        <label for="idtelefono" class="bmd-label-floating">Teléfono</label>
                                        <input type="text" name="telefono" value="<?php echo $telefono; ?>" class="form-control" id="idtelefono">
                                        <span class="bmd-help">Escriba el teléfono de contacto del cliente</span>
                                    </div>
                                </div>

                                <input type="hidden" name="id_cliente" value="<?php echo $id_cliente; ?>">

                            </div>

                            <br>

                            <div class="row">
                                <div class="col-lg-8 col-sm-4 mr-auto">
                                    <button class="btn btn-primary" name="actualizar_cliente"><i class="material-icons">save</i> Guardar</button>
                                    <a class="btn btn-primary" name="actualizar_cliente" href="mostrar_clientes.php"><i class="material-icons">cancel</i> Cancelar</a>
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

                     <!--<input id="pac-input" class="form-control" type="text" placeholder="Search Box">-->

                    <div class="form-group">
                        <label for="pac-input" class="bmd-label-floating">Buscar ubicación</label>
                        <input type="text" class="form-control" id="pac-input" placeholder="">
                    </div>

                    <div id="map" style="margin-top:1px">

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
                            <a>

                            </a>
                        </li>
                        <li>
                            <a>

                            </a>
                        </li>
                        <li>
                            <a>

                            </a>
                        </li>
                        <li>
                            <a>

                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="copyright float-right">


                </div>
            </div>
        </footer>

        <script>
            $(document).ready(function () {
                //init DateTimePickers
                //materialKit.initFormExtendedDatetimepickers();

                 $('#idfecha_nacimiento').datetimepicker({
                    //format: 'DD/MM/YYYY'
                    defaultDate: "<?php echo $fecha_nacimiento; ?>",
                    format: 'DD MMMM YYYY',
                    //minDate: (parseInt((new Date()).getFullYear()) - 60).toString(),
                    //maxDate: (parseInt((new Date()).getFullYear()) - 18).toString(),
                    ignoreReadonly: true,
                    allowInputToggle: true
                });

                $('#idfecha_nacimiento').data("DateTimePicker").maxDate((parseInt((new Date()).getFullYear()) - 18).toString());


                $('#idfecha_nacimiento_oculta').datetimepicker({
                    //format: 'DD/MM/YYYY'
                    defaultDate: "<?php echo $fecha_nacimiento ?>",
                    format: 'YYYY/MM/DD',
                });
                
                $("#idfecha_nacimiento").on("dp.change", function (e) {
                    $('#idfecha_nacimiento_oculta').data("DateTimePicker").date(e.date);
                });


                // Sliders Init
                //materialKit.initSliders();
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
                var myCenter = new google.maps.LatLng(<?php echo $latitud; ?>,<?php echo $longitud; ?>);





                var mapOptions = {
                    center: myCenter, zoom: 18
                            //mapTypeId:google.maps.MapTypeId.HYBRID
                };
                var map = new google.maps.Map(mapCanvas, mapOptions);
                google.maps.event.addListener(map, 'click', function (event) {
                    placeMarker(map, event.latLng);
                });

                //----------------------------------------------------------------------------------------

                var myLatlng = new google.maps.LatLng(<?php echo $latitud; ?>,<?php echo $longitud; ?>);
                //var mapOptions = {
                //  zoom: 18,
                //  center: myLatlng
                //}
                //var map = new google.maps.Map(document.getElementById("map"), mapOptions);

                var marker1 = new google.maps.Marker({
                    position: myLatlng,
                    icon: 'http://maps.google.com/mapfiles/ms/icons/blue-dot.png'
                });

                // To add the marker to the map, call setMap();
                marker1.setMap(map);

                infowindow1 = new google.maps.InfoWindow({
                    content: 'Coordenadas actuales' + '<br>Latitud: ' + '<?php echo $latitud; ?>' + '<br>Longitud: ' + '<?php echo $longitud; ?>'
                });

                infowindow1.open(map, marker1);




                //----------------------------------------------------------------------------------------



                infoWindow = new google.maps.InfoWindow;

                //-------------------- Codigo busqueda en el mapa -------------------------------------------

                // Create the search box and link it to the UI element.
                var input = document.getElementById('pac-input');
                var searchBox = new google.maps.places.SearchBox(input);
                //map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

                // Bias the SearchBox results towards current map's viewport.
                map.addListener('bounds_changed', function () {
                    searchBox.setBounds(map.getBounds());
                });

                var markers = [];
                // Listen for the event fired when the user selects a prediction and retrieve
                // more details for that place.
                searchBox.addListener('places_changed', function () {
                    var places = searchBox.getPlaces();

                    if (places.length == 0) {
                        return;
                    }

                    // Clear out the old markers.
                    markers.forEach(function (marker) {
                        marker.setMap(null);
                    });
                    markers = [];

                    // For each place, get the icon, name and location.
                    var bounds = new google.maps.LatLngBounds();
                    places.forEach(function (place) {
                        if (!place.geometry) {
                            console.log("Returned place contains no geometry");
                            return;
                        }
                        var icon = {
                            url: place.icon,
                            size: new google.maps.Size(71, 71),
                            origin: new google.maps.Point(0, 0),
                            anchor: new google.maps.Point(17, 34),
                            scaledSize: new google.maps.Size(25, 25)
                        };

                        // Create a marker for each place.
                        markers.push(new google.maps.Marker({
                            map: map,
                            icon: icon,
                            title: place.name,
                            position: place.geometry.location
                        }));

                        if (place.geometry.viewport) {
                            // Only geocodes have viewport.
                            bounds.union(place.geometry.viewport);
                        } else {
                            bounds.extend(place.geometry.location);
                        }
                    });
                    map.fitBounds(bounds);
                });


                //-----------------------------------------------------------------------------------------



                //////////////////////////////        



                ////////////////////////////       

            }

            ///////////////////////////


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
                    content: 'Nuevas coordenadas' + '<br>Latitud: ' + location.lat() + '<br>Longitud: ' + location.lng()
                });
                infowindow.open(map, marker);

                document.getElementById("idlatitud").value = location.lat();
                document.getElementById("idlongitud").value = location.lng();

            }

            //Deshabilitar el teclado en los inputs de longitud y latitud
            $("#idlatitud").keydown(false);
            $("#idlongitud").keydown(false);

        </script>



        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC-CXtFICDTkaC389rWouYTmpM5LWNMKlg&libraries=places&callback=myMap"></script>



    </body>

</html>