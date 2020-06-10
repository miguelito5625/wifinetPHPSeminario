<!DOCTYPE html>
<html>
  <head>
    
    <title>Prueba</title>
    
    		<link rel="stylesheet" href="css/iziToast.css" />

    <script src="js/iziToast.js"></script>
    
    
  </head>
<body>

  <button onclick="myFunction()">Click me</button>


  
  <script>
    function myFunction() {

iziToast.success({
    title: 'OK',
    message: 'Successfully inserted record!',
});
    }
  </script>
  

</body>
</html>