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
    <title>DUEÑOS</title>
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
        <center><h1 class="h3 mb-3 font-weight-normal">RUTA 53 REGISTRO DE DUEÑOS</h1></center>

        <div class="container-fluid">
        	<ul class="nav nav-tabs" id="myTab" role="tablist">
			  <li class="nav-item">
			    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Nuevo Dueño</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Dueño Unidad</a>
			  </li>
			</ul>
			<div class="tab-content" id="myTabContent">
			  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
			  	<form id="InsertaDuanos" method="POST" enctype="multipart/form-data">
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
				      <label for="Usuario">Usuario:</label>
				      <select class="form-control" name="Usuario" id="Usuario">
				      	<?php require_once '../../controlador/ComboUsuarios.php' ?>
				      </select>
				    </div>
				  </div>

				  <br>
				   <div class="form-group col-md-12">
				  	<button type="submit" name="InsertarDueno" class="btn btn-primary">Registrar</button>
					</div>
				</form>

				<div class="container-fluid">
		          <div class="row">
		             <div class="col m12">
						<table id="Equip" class="table table-hover text-center">
		                	<thead>
		                    	<tr>
		                          <th class="text-center">Nombre</th>
		                          <th class="text-center">Apellido Paterno</th>
		                          <th class="text-center">Apelido Materno</th>
		                          <th class="text-center">Usuario</th>
		                          <th class="text-center">Acciones</th>
		                        </tr>
		                    </thead>
		                    <tbody id="Mostrar">

		                        </tbody>
		                </table>
		                </div>
		            </div>
		        </div>
			  </div>
			  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
			  	
			  	<form id="InsertaDuanoUnidad" method="POST" enctype="multipart/form-data">
				  <div class="form-group">
				    <div class="form-group col-md-12">
				      <label for="equipo">Dueño:</label>
				      <select class="form-control" name="dueno" id="dueno">
				      	<?php require_once '../../controlador/ComboDuenos.php' ?>
				      </select>
				    </div>
				  </div>
				  <div class="form-group">
				    <div class="form-group col-md-12">
				      <label for="equipo">Unidad:</label>
				      <select class="form-control" name="Unidad" id="Unidad">
				      	<?php require_once '../../controlador/ComboUnidades.php' ?>
				      </select>
				    </div>
				  </div>

				  <br>
				   <div class="form-group col-md-12">
				  	<button type="submit" name="InsertarDueno" class="btn btn-primary">Registrar</button>
					</div>
				</form>

				<div class="container-fluid">
		          <div class="row">
		             <div class="col m12">
						<table id="Equip" class="table table-hover text-center">
		                	<thead>
		                    	<tr>
		                          <th class="text-center">Dueño</th>
		                          <th class="text-center">Unidad</th>
		                          <th class="text-center">Acciones</th>
		                        </tr>
		                    </thead>
		                    <tbody id="MostrarDU">

		                        </tbody>
		                </table>
		                </div>
		            </div>
		        </div>

			  </div>
			</div>
	<?php require_once '../Recursos/footer.php' ?>
        </div>
    <?php require_once '../../controlador/ModalDuenos.php' ?>
    <?php require_once '../../controlador/ModalDuenoUnidad.php' ?>

    <script src="../../Ajax/Dropdown.js"></script>
    <script src="../js/jquery-3.1.1.min.js"></script>
    <script src="../../Ajax/Duenos.js"></script>
</body>
</html>