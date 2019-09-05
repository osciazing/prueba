
<!DOCTYPE html>
<html lang="en">
<head>
<title>Login V11</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8.17.1/dist/sweetalert2.all.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<link rel="stylesheet" href="<?=CONTENT_WEBROOT?>colorbox-master/example1/colorbox.css" />
 <script src="<?=CONTENT_WEBROOT?>colorbox-master/jquery.colorbox.js"></script>
 
</head>  
<body class="BgLogin">

<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Prueba</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
			
             <li  rel="importar" <?php if($_GET["mode"]=="importar")echo 'class="active"';?>><a href="?mode=importar">Importar datos desde servicio</a></li>
            <li  rel="consultas"	<?php if($_GET["mode"]=="consultas")echo 'class="active"';?>><a href="?mode=consultas">Consultar datos Agregados en Base de datos</a></li>
            <li  rel="salir"	><a href="?mode=login&action=logout">Logout</a></li>
             
          </ul>
        </div><!--/.nav-collapse -->   
      </div>   
</nav>


<div class="container theme-showcase" role="main">

<div class='page-header' >


<?php include(CONTENT_VIEW.$template.".php");?>

</div>
</div>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</body>
</html>