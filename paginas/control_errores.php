<?php if (isset($_GET['codigo_error'])): ?>

    <script type="text/javascript">

        var codigo_error = '<?php echo $_GET['codigo_error']; ?>';
        var mensaje;

        if (codigo_error == 1064) {

            mensaje = 'Sintaxis sql'
        } else if (codigo_error == 1146) {

            mensaje = 'Tabla no existe'

        } else if (codigo_error == 1045) {

            mensaje = 'en el usuario o la contraseña de la base de datos';

        } else if (codigo_error == 1049) {

            mensaje = 'la base de datos no existe';

        } else if (codigo_error == 2002) {

            mensaje = 'El tiempo de respuesta de la base de datos a expirado';

        } else if (codigo_error == 1050) {

            mensaje = 'El registro no existe';

        } else if (codigo_error == 1054) {

            mensaje = 'Sintaxis sql';

        }else if (codigo_error == 10) {

            mensaje = 'Fondos insuficientes';

        }


        iziToast.error({
            transitionOut: 'fadeOutDown',
            title: 'Error',
            position: 'topCenter',
            message: mensaje,

        });



    </script> 

<?php endif; ?>

<?php if (isset($_GET['codigo_exito'])): ?>

    <script type="text/javascript">

        var codigo_exito = '<?php echo $_GET['codigo_exito']; ?>';
        var mensaje;

        if (codigo_exito == 1) {

            mensaje = 'Se ha guardado correctamente'
        } else if (codigo_exito == 2) {

            mensaje = 'Registro editado correctamente'

        } else if (codigo_exito == 3) {

            mensaje = 'Se ha cambiado el estado del registro';

        }


        iziToast.success({
            transitionOut: 'fadeOutDown',
            title: 'OK',
            position: 'topCenter',
            message: mensaje,

        });



    </script> 

<?php endif; ?>

    
<!--    Ocultar el paso de parametros por get de la url
    
<script type="text/javascript">
    var uri = window.location.toString();
    if (uri.indexOf("?") > 0) {
        var clean_uri = uri.substring(0, uri.indexOf("?"));
        window.history.replaceState({}, document.title, clean_uri);
    }
</script>-->
