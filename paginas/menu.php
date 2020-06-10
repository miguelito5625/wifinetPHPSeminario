<?php
session_start();

if (!isset($_SESSION['usuario'])) {

    echo '<script>window.location.href = "https://wifinet.ga/paginas/login";</script>';
}

$usuario_activo = $_SESSION['usuario'];
$puesto = $_SESSION['puesto'];
?>

<?php if ($puesto == "Administrador"): ?>

    <nav class="navbar navbar-default  fixed-top navbar-expand-lg"  id="sectionsNav">
        <div class="container">
            <div class="navbar-translate">
                <a class="navbar-brand" href="https://wifinet.ga/paginas/principal/index.php">
                    WIFINET </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="navbar-toggler-icon"></span>
                    <span class="navbar-toggler-icon"></span>
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">

                    
                    

                    <li class="dropdown nav-item">
                        <a href="#" class="active dropdown-toggle nav-link" data-toggle="dropdown">
                            Otros
                        </a>
                        <div class="dropdown-menu dropdown-with-icons">
                            <h6 class="dropdown-header">Crear</h6>
                            <a href="#" class="dropdown-item">Plan de Servicio</a>
                            <a href="#" class="dropdown-item">Tipo de Equipo</a>
                            <a href="#" class="dropdown-item">Tipo de Material</a>
                            
                            <div class="dropdown-divider"></div>
                                
                            <h6 class="dropdown-header">Mostrar</h6>
                        
                            <a href="#" class="dropdown-item">Plan de Servicio</a>
                            <a href="#" class="dropdown-item">Tipo de Equipo</a>
                            <a href="#" class="dropdown-item">Tipo de Material</a>
                            
                        </div>
                    
                    
                    </li>
                    
                    
                    <li class="dropdown nav-item">
                        <a href="#" class="active dropdown-toggle nav-link" data-toggle="dropdown">
                            Transacciones
                        </a>
                        <div class="dropdown-menu dropdown-with-icons">
                            <h6 class="dropdown-header">Registrar</h6>
                            
                            <a href="https://wifinet.ga/paginas/depositos_bancarios/crear_deposito_bancario.php" class="dropdown-item">Deposito Bancario</a>
                            <a href="https://wifinet.ga/paginas/transacciones/crear.php" class="dropdown-item">Movimiento Caja Chica</a>

                            <div class="dropdown-divider"></div>
                                
                            <h6 class="dropdown-header">Mostrar</h6>                            
                            <a href="https://wifinet.ga/paginas/depositos_bancarios/mostrar_deposito_bancario.php" class="dropdown-item">Deposito Bancario</a>
                            <a href="https://wifinet.ga/paginas/transacciones/mostrar.php" class="dropdown-item">Movimiento Caja Chica</a>
                        </div>
                    
                    
                    </li>
                    
                    
                    <li class="dropdown nav-item">
                        <a href="#" class="active dropdown-toggle nav-link" data-toggle="dropdown">
                            Servicios
                        </a>
                        <div class="dropdown-menu dropdown-with-icons">
                            <h6 class="dropdown-header">Crear</h6>
                            <a href="https://wifinet.ga/paginas/ordenes_de_trabajo/nuevo_servicio/crear_ot_nuevo_servicio.php" class="dropdown-item">Solicitud de Instalacion</a>
                            
                            <a href="https://wifinet.ga/paginas/ordenes_de_trabajo/desinstalacion/crear_ot_desinstalacion.php" class="dropdown-item">Desinstalacion por solicitud</a>
                            
                            <a href="https://wifinet.ga/paginas/ordenes_de_trabajo/desinstalacion_mora/crear_ot_desinstalacion_mora.php" class="dropdown-item">Desinstalacion por mora</a>
                            <div class="dropdown-divider"></div>
                                
                            <h6 class="dropdown-header">Mostrar</h6>
                            
                            <a href="https://wifinet.ga/paginas/ordenes_de_trabajo/nuevo_servicio/mostrar_ot_nuevo_servicio.php" class="dropdown-item">Solicitud de desinstalacion</a>
                            
                            <a href="https://wifinet.ga/paginas/ordenes_de_trabajo/desinstalacion/mostrar_ot_desinstalacion.php" class="dropdown-item">Desinstalacion por solicitud</a>
                            
                            <a href="https://wifinet.ga/paginas/ordenes_de_trabajo/desinstalacion_mora/mostrar_ot_desinstalacion_mora.php" class="dropdown-item">Desinstalacion por mora</a>
                            
                            <a href="https://wifinet.ga/paginas/registros_de_instalaciones/mostrar_instalaciones.php" class="dropdown-item">Servicios Instalados</a>
                            
                            <a href="https://wifinet.ga/paginas/cobros/mostrar.php" class="dropdown-item">Control de Cobros</a>
                            
                            
                        </div>
                    </li>


                    <li class="dropdown nav-item">
                        <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">Ordenes de Trabajo</a>
                        <div class="dropdown-menu">
                            <h6 class="dropdown-header">Crear</h6>
                           
                            <a href="https://wifinet.ga/paginas/ordenes_de_trabajo/mantenimiento_reparacion/crear_ot_man_re.php" class="dropdown-item">Mantenimiento y Reparación</a>
                            
                            <a href="https://wifinet.ga/paginas/ordenes_de_trabajo/cobro_cliente/crear_ot_cobro_cliente.php" class="dropdown-item">Cobro a cliente</a>
                            
                            <div class="dropdown-divider"></div>
                            
                            <h6 class="dropdown-header">Mostrar</h6>
                            
                            <a href="https://wifinet.ga/paginas/ordenes_de_trabajo/mantenimiento_reparacion/mostrar_ot_man_re.php" class="dropdown-item">Mantenimiento y Reparación</a>
                            
                            <a href="https://wifinet.ga/paginas/ordenes_de_trabajo/cobro_cliente/mostrar_ot_cobro_cliente.php" class="dropdown-item">Cobro a cliente</a>
                            
                                                                           
                        </div>
                    </li>
                    
                    
                    <li class="dropdown nav-item">
                        <a href="#" class="active dropdown-toggle nav-link" data-toggle="dropdown">
                            Equipo y Material
                        </a>
                        <div class="dropdown-menu dropdown-with-icons">

                            <h6 class="dropdown-header">Crear</h6>
                            <a href="https://wifinet.ga/paginas/equipo_tecnilogico/crear_equipo_tecnologico.php" class="dropdown-item">Equipo</a>
                            
                            <a href="https://wifinet.ga/paginas/materiales/crear_material.php" class="dropdown-item">Material</a>
                            
                            <div class="dropdown-divider"></div>
                            <h6 class="dropdown-header">Mostrar</h6>
                            <a href="https://wifinet.ga/paginas/equipo_tecnilogico/mostrar_equipos_tecnologicos.php" class="dropdown-item">Equipo</a>
                            
                            <a href="https://wifinet.ga/paginas/materiales/mostrar_materiales.php" class="dropdown-item">Material</a>
                            
                            <a href="https://wifinet.ga/paginas/cambio_equipo_danio/mostrar_solicitud.php" class="dropdown-item">Solicitudes de cambio</a>

                        </div>
                    </li>
                    


                    <li class="dropdown nav-item">
                        <a href="#" class="active dropdown-toggle nav-link" data-toggle="dropdown">
                            Clientes
                        </a>
                        <div class="dropdown-menu dropdown-with-icons">
                            
                            <a href="https://wifinet.ga/paginas/clientes/crear_cliente.php" class="dropdown-item">
                                Registrar
                            </a>
                            
                            <a href="https://wifinet.ga/paginas/clientes/mostrar_clientes.php" class="dropdown-item">
                                Mostrar
                            </a>
                            
                        </div>
                    </li>

                    <li class="dropdown nav-item">
                        <a href="#" class="active dropdown-toggle nav-link" data-toggle="dropdown">
                            Usuarios
                        </a>
                        <div class="dropdown-menu dropdown-with-icons">
                            
                            <a href="https://wifinet.ga/paginas/usuarios/crear_usuario.php" class="dropdown-item">
                                Registrar
                            </a>
                            
                            <a href="https://wifinet.ga/paginas/usuarios/mostrar_usuarios.php" class="dropdown-item">
                                Mostrar
                            </a>
                            
                        </div>
                    </li>


                    <li class="dropdown nav-item">
                        <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                            <i class="material-icons">account_circle</i> <?php echo $usuario_activo; ?>
                        </a>
                        <div class="dropdown-menu dropdown-with-icons">
                            <a href="https://wifinet.ga/paginas/login/datos_usuario.php" class="dropdown-item">
                                Perfil de usuario
                            </a>
                            <a href="https://wifinet.ga/paginas/login" class="dropdown-item">
                                Cerrar Sesión
                            </a>
                        </div>
                    </li>


                </ul>
            </div>
        </div>
    </nav>



<?php endif; ?>










<?php if ($puesto == "Técnico"): ?>

    <nav class="navbar navbar-default  fixed-top navbar-expand-lg"  id="sectionsNav">
        <div class="container">
            <div class="navbar-translate">
                <a class="navbar-brand" href="https://wifinet.ga/paginas/principal/index.php">
                    WIFINET </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="navbar-toggler-icon"></span>
                    <span class="navbar-toggler-icon"></span>
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">

                    <li class="nav-item active">
                    <a class="nav-link" href="https://wifinet.ga/paginas/registros_de_instalaciones/mostrar_instalaciones.php">Servicios Instalados<span class="sr-only">(current)</span></a>
                    </li>
                    
                    <li class="nav-item active">
                    <a class="nav-link" href="https://wifinet.ga/paginas/cambio_equipo_danio/mostrar_solicitud.php">Solicitudes de cambio de equipo<span class="sr-only">(current)</span></a>
                    </li>
                   

                    <li class="dropdown nav-item">
                        <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">Ordenes de Trabajo</a>
                        <div class="dropdown-menu">

                            <h6 class="dropdown-header">Mostrar</h6>
                            <a href="https://wifinet.ga/paginas/ordenes_de_trabajo/nuevo_servicio/mostrar_ot_nuevo_servicio.php" class="dropdown-item">Instalación de nuevos servicio</a>
                            
                            <a href="https://wifinet.ga/paginas/ordenes_de_trabajo/desinstalacion/mostrar_ot_desinstalacion.php" class="dropdown-item">Desinstalación por solicitud</a>
                            
                            <a href="https://wifinet.ga/paginas/ordenes_de_trabajo/desinstalacion_mora/mostrar_ot_desinstalacion_mora.php" class="dropdown-item">Desinstalación por mora</a>
                            
                            <a href="https://wifinet.ga/paginas/ordenes_de_trabajo/mantenimiento_reparacion/mostrar_ot_man_re.php" class="dropdown-item">Mantenimiento y Reparación</a>

                        </div>
                    </li>


                    <li class="dropdown nav-item">
                        <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                            <i class="material-icons">account_circle</i> <?php echo $usuario_activo; ?>
                        </a>
                        <div class="dropdown-menu dropdown-with-icons">
                            <a href="https://wifinet.ga/paginas/login/datos_usuario.php" class="dropdown-item">
                                Perfil de usuario
                            </a>
                            <a href="https://wifinet.ga/paginas/login" class="dropdown-item">
                                Cerrar Sesión
                            </a>
                        </div>
                    </li>


                </ul>
            </div>
        </div>
    </nav>


<?php endif; ?>










<?php if ($puesto == "Cobrador"): ?>

    <nav class="navbar navbar-default  fixed-top navbar-expand-lg"  id="sectionsNav">
        <div class="container">
            <div class="navbar-translate">
                <a class="navbar-brand" href="https://wifinet.ga/paginas/principal/index.php">
                    WIFINET </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="navbar-toggler-icon"></span>
                    <span class="navbar-toggler-icon"></span>
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">

                    
                    <li class="nav-item active">
                    <a class="nav-link" href="https://wifinet.ga/paginas/cobros/mostrar.php">Control de Cobros<span class="sr-only">(current)</span></a>
                    </li>
                    
                    <li class="nav-item active">
                    <a class="nav-link" href="https://wifinet.ga/paginas/registros_de_instalaciones/crear_registro_de_instalacion.php">OT de cobro a clientes<span class="sr-only">(current)</span></a>
                    </li>
                    
                    

                    <li class="dropdown nav-item">
                        <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">Depositos Bancarios</a>
                        <div class="dropdown-menu">

                            <a href="https://wifinet.ga/paginas/depositos_bancarios/crear_deposito_bancario.php" class="dropdown-item">Registrar</a>
                            <a href="https://wifinet.ga/paginas/depositos_bancarios/mostrar_deposito_bancario.php" class="dropdown-item">Mostrar</a>

                        </div>
                    </li>


                    <li class="dropdown nav-item">
                        <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                            <i class="material-icons">account_circle</i> <?php echo $usuario_activo; ?>
                        </a>
                        <div class="dropdown-menu dropdown-with-icons">
                            <a href="https://wifinet.ga/paginas/login/datos_usuario.php" class="dropdown-item">
                                Perfil de usuario
                            </a>
                            <a href="https://wifinet.ga/paginas/login" class="dropdown-item">
                                Cerrar Sesión
                            </a>
                        </div>
                    </li>


                </ul>
            </div>
        </div>
    </nav>



<?php endif; ?>
