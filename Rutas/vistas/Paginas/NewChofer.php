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
    <title>CHOFERES</title>
    <?php require_once '../Recursos/head.php' ?>
    <link rel="stylesheet" href="../css/Estilos.css">
    <link rel="shortcut icon" href="../../img/Chofer.jpg" />
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
        <center><h1 class="h3 mb-3 font-weight-normal">RUTA 53 REGISTRO DE CHOFERES</h1></center>
        <div class="container">
        <form id="InsertaChofer" method="POST" enctype="multipart/form-data">
		  <div class="form-group">
		    <div class="form-group col-md-12">
		      <label for="equipo">Nombre:</label>
		      <input type="text" name="Nombre" class="form-control" id="Nombre" placeholder="Nombre" required>
		    </div>
		  </div>
		  <div class="form-group">
		    <div class="form-group col-md-12">
		      <label for="equipo">Apellido Paterno:</label>
		      <input type="text" name="Paterno" class="form-control" id="Paterno" placeholder="Apellido Paterno" required>
		    </div>
		  </div>
		  <div class="form-group">
		    <div class="form-group col-md-12">
		      <label for="equipo">Apellido Materno:</label>
		      <input type="text" name="Materno" class="form-control" id="Materno" placeholder="Apellido Materno" required>
		    </div>
		  </div>
		  <div class="form-group">
		    <div class="form-group col-md-12">
		      <label for="equipo">Licencia:</label>
		      <input type="text" name="Licencia" class="form-control" id="Licencia" placeholder="Licencia" required>
		    </div>
		  </div>

		  <br>
		   <div class="form-group col-md-12">
		  	<button type="submit" name="InsertaChoferes" class="btn btn-primary">Registrar</button>
			</div>
		</form>
        </div>

		<div class="container-fluid">
          <div class="row">
             <div class="col m12">
				<table id="Equip" class="table table-hover text-center">
                	<thead>
                    	<tr>
                          <th class="text-center">Nombre</th>
                          <th class="text-center">Apellido Paterno</th>
                          <th class="text-center">Apelido Materno</th>
                          <th class="text-center">Licencia</th>
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

    <?php require_once '../../controlador/ModalChoferes.php' ?>

    <script src="../../Ajax/Dropdown.js"></script>
    <script src="../js/jquery-3.1.1.min.js"></script>
    <script src="../../Ajax/Choferes.js"></script>
</body>
</html>
