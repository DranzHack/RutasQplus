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
	<title>Editar Enroladores</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php require_once '../Recursos/head.php' ?>
	<link rel="stylesheet" href="../css/Estilos.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.0/css/all.css" integrity="sha384-aOkxzJ5uQz7WBObEZcHvV5JvRW3TUc2rNPA7pe3AwnsUohiw1Vj2Rgx2KSOkF5+h" crossorigin="anonymous">
    
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">

</head>
<body>
<?php require_once '../Recursos/navbarRuta.php' ?>
 <div class="section">

        <?php require_once '../Recursos/navbarRuta.php' ?>
        <hr>
        <center><h1 class="h3 mb-3 font-weight-normal">RUTA 53 EDITAR ENROLAMIENTO DE UNIDADES <a href="Enrolador.php" class="btn btn-primary">+</a></h1></center>
        <div class="container-fluid">
        <div class="row">
                <div class="col m12">
                                <table id="Equip" class="table table-hover table-responsive text-center">
                              <thead>
                              <tr>
                                <th class="text-center">Numero de Ruta</th>
                                <th class="text-center">Chofer</th>
                                <th class="text-center">Telefono Unidad</th>
                                <th class="text-center">Placas</th>
                                <th class="text-center">Merca</th>
                                <th class="text-center">Modelo</th>
                                <th class="text-center">Fecha</th>
                                <th class="text-center">Hora</th>
                                <th class="text-center">Actions</th>
                              </tr>
                              </thead>
                              <tbody id="Mostrar">

                              </tbody>
                            </table>
                </div>
        </div>
        <hr>
        <div id="hola">
        </div>
        <?php require_once '../Recursos/footer.php' ?>
    </div>

    <?php require_once '../../controlador/ModalEnrolados.php' ?>

		<script src="../../Ajax/Dropdown.js"></script>
        <script src="../js/jquery-3.1.1.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.js"></script>
<script src="../js/bootstrap-datetimepicker-master/js/bootstrap-datetimepicker.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>

<script src="../../Ajax/EditarEnroler.js"></script>
</body>
</html>
