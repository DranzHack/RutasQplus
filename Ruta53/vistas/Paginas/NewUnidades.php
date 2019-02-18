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
    }
    else{
        session_destroy();
        header('location: ../../'); 
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>UNIDADES</title>
    <?php require_once '../Recursos/head.php' ?>
    <link rel="stylesheet" href="../css/Estilos.css">
		<link rel="shortcut icon" href="../../img/Unidad.png" />

    <!-- Libreria Alertify -->
<!-- JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/alertify.min.js"></script>

<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/alertify.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/themes/default.min.css"/>
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/themes/semantic.min.css"/>
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/themes/bootstrap.min.css"/>

</head>
<body>
    <div class="section">

        <?php require_once '../Recursos/navbarRuta.php' ?>
        <hr>
        <center><h1 class="h3 mb-3 font-weight-normal">RUTA 53 REGISTRO DE UNIDADES</h1></center>
        <div class="container">
        <form id="InsertaUnidades" method="POST" enctype="multipart/form-data">
		  <div class="form-group">
		    <div class="form-group col-md-12">
		      <label for="equipo">Numero Comercial:</label>
		      <input type="text" name="Numero" class="form-control" id="Numero" placeholder="Numero Comercial" required>
		    </div>
		  </div>
		  <div class="form-group">
		    <div class="form-group col-md-12">
		      <label for="equipo">Numero IMEI:</label>
		      <input type="text" name="Imei" class="form-control" id="Imei" placeholder="Numero Imei" required>
		    </div>
		  </div>
		  <div class="form-group">
		    <div class="form-group col-md-12">
		      <label for="equipo">Telefono:</label>
		      <input type="text" name="Telefono" class="form-control" id="Telefono" placeholder="Telefono" required>
		    </div>
		  </div>
		  <div class="form-group">
		    <div class="form-group col-md-12">
		      <label for="equipo">Placas:</label>
		      <input type="text" name="Placas" class="form-control" id="Placas" placeholder="Placas" required>
		    </div>
		  </div>
		  <div class="form-group">
		    <div class="form-group col-md-12">
		      <label for="equipo">Marca:</label>
		      <input type="text" name="Marca" class="form-control" id="Marca" placeholder="Marca" required>
		    </div>
		  </div>
		  <div class="form-group">
		    <div class="form-group col-md-12">
		      <label for="equipo">Modelo:</label>
		      <input type="text" name="Modelo" class="form-control" id="Modelo" placeholder="Modelo" required>
		    </div>
		  </div>
			<!--
		  <div class="form-group">
		    <label for="tel2">Direccion</label>
		    <input type="text" class="form-control" id="tel2" placeholder="telefono localizador">
		    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15085.438662312281!2d-98.14639913179931!3d19.04791787206973!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85cfc02944ecac49%3A0x168faf499dd87a3f!2sParque+de+Amalucan!5e0!3m2!1ses-419!2smx!4v1538677548722" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
		  </div>-->
		  <br>
		   <div class="form-group col-md-12">
		  	<button type="submit" name="InsertaUnidades" class="btn btn-primary">Registrar</button>
			</div>
		</form>
        </div>

				 <div class="container-fluid">
            <div class="row">
                <div class="col m12">
								<table id="Equip" class="table table-hover text-center">
                              <thead>
                              <tr>
                                <th class="text-center">Numero de Ruta</th>
                                <th class="text-center">Imei</th>
                                <th class="text-center">Telefono</th>
                                <th class="text-center">Placas</th>
                                <th class="text-center">Merca</th>
                                <th class="text-center">Modelo</th>
                              </tr>
                              </thead>
                              <tbody id="Mostrar">

                              </tbody>
                            </table>
                </div>
            </div>
        </div>
        <hr>
        <div id="hola">
        </div>
        <?php require_once '../Recursos/footer.php' ?>
    </div>

    <?php require_once '../../controlador/ModalDelete.php'?>

    <?php require_once '../../controlador/ModalUnidades.php' ?>

    <script src="../../Ajax/Dropdown.js"></script>
    <script src="../js/jquery-3.1.1.min.js"></script>
    <script src="../../Ajax/Unidades.js"></script>
</body>
</html>
