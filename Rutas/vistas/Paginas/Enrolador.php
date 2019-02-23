<?php
    session_start();

    if(isset($_SESSION['Usuario']))
    {
        if($_SESSION['privilegio']=='Administrador')
        {

        }
        else
        {
            session_destroy();
            header('location: ../../');
        }
    }else{
        session_destroy();
        header('location: ../../'); 
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Enroladores</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php require_once '../Recursos/head.php' ?>
	<link rel="stylesheet" href="../css/Estilos.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.0/css/all.css" integrity="sha384-aOkxzJ5uQz7WBObEZcHvV5JvRW3TUc2rNPA7pe3AwnsUohiw1Vj2Rgx2KSOkF5+h" crossorigin="anonymous">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">

</head>
<body>
<?php require_once '../Recursos/navbarRuta.php' ?>
 <div class="section">

        <?php require_once '../Recursos/navbarRuta.php' ?>
        <hr>
        <center><h1 class="h3 mb-3 font-weight-normal">RUTA 53 ENROLAMIENTO DE UNIDADES</h1></center>
        <div class="container">
        <form id="InsertaEnrol" method="POST" enctype="multipart/form-data">

		    <div class="form-group">
		      <label for="equipo">Seleccione Una Unidad:</label>
		      <select class="form-control" name="Unidades" id="Unidades">
		      	<?php require_once '../../controlador/ComboUnidades.php' ?>
		      </select>
		    </div>
				<div class="form-group">
					<label for="chofer">Seleccione Un Chofer:</label>
					<select class="form-control" name="Chofer">
						<?php require_once '../../controlador/ComboChoferes.php' ?>
					</select>
				</div>
                <div class="form-group">
					<label for="chofer">Seleccione Base Salida:</label>
					<select class="form-control" name="Base">
						<?php require_once '../../controlador/ComboBaseSalida.php' ?>
					</select>
				</div>
                <div class="form-group">
					<label for="chofer">Seleccione Fecha Salida:</label>
					<input class="form-control" type="text" name="Fecha" id="datepicker" placeholder="Seleccione Una Fecha">
				</div>
                <div class="form-group">
					<label for="chofer">Seleccione Hora Salida:</label>
					<input class=" timepicker form-control" type="text" name="Hora" id="Hora" placeholder="Seleccione Una Hora">
				</div>
		   <div class="form-group col-md-12">
		  	<button type="submit" name="InsertaUnidades" class="btn btn-primary">Registrar</button>
            <a href="EditarEnroler.php" class="btn btn-primary">Mostrar Enrolamientos</a>
			</div>
		</form>
        </div>
        <hr>
        <div id="hola">
        </div>
        <?php require_once '../Recursos/footer.php' ?>
    </div>

    <?php require_once '../../controlador/ModalEnrolados.php' ?>

		<script src="../../Ajax/Dropdown.js"></script>
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>

<script src="../../Ajax/Enroladores.js"></script>
</body>
</html>
