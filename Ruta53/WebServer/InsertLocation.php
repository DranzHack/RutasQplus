   <?php

$serverName = "192.168.0.126";
$connectionOptions = array(
    "database" => "DB_Ruta53",
    "uid" => "sa",
    "pwd" => "Oas970520"
);

//Establishes the connection
$conn = sqlsrv_connect($serverName, $connectionOptions);


//vARIABLES
$fecha=date("Y-m-d");
$hora=date("H:i:s");
$latitud=$_POST['latitud'];
$longitud=$_POST['longitud'];
$direccion=$_POST['direccion'];
$imei=$_POST['imei'];
//Pendiente
//$QR=$_POST['Qr'];

/*
$direccion="Muy lejos";
$coordenadas="POR HAY ALV";
*/
//Insert Query

if(empty($_POST["latitud"]) and ($_POST["longitud"]) AND $_POST["direccion"]!==''AND$_POST["imei"]!==''AND$_POST["fecha"]!==''AND$_POST["hora"]!=='')
{
    echo "Faltan DATOS los campos estan vacios"; 
}
else
{
    echo ("Inserting a new row into table" . PHP_EOL);
$tsql= "INSERT INTO LocationGPS (Direccion,Latitud,Longitud,Imei,Fecha,Hora) VALUES (?,?,?,?,?,?);";
$params = array($direccion,$latitud,$longitud,$imei,$fecha,$hora);
$getResults= sqlsrv_query($conn, $tsql, $params);
$rowsAffected = sqlsrv_rows_affected($getResults);
if ($getResults == FALSE or $rowsAffected == FALSE)
    die(FormatErrors(sqlsrv_errors()));
echo ($rowsAffected. " row(s) inserted: " . PHP_EOL);

sqlsrv_free_stmt($getResults);
}

function formatErrors($errors)
{
    // Display errors
    echo "Error information: <br/>";
    foreach ($errors as $error) {
        echo "SQLSTATE: ". $error['SQLSTATE'] . "<br/>";
        echo "Code: ". $error['code'] . "<br/>";
        echo "Message: ". $error['message'] . "<br/>";
    }
}


/*


    $hostname ="192.168.0.126";  //nuestro servidor
    $database ="GPS_BD";//Nombre de nuestra base de datos
    $username ="SA";//Nombre de usuario de nuestra base de datos (yo utilizo el valor por defecto)
    $password ="Oas970520";//Contraseña de nuestra base de datos (yo utilizo por defecto)
    $conexion = sqlsr_connect($hostname,$username,$password)//Conexión a nuestro servidor mysql
    //mysqli_select_db($conexion,$dbname);
    or
    trigger_error(mysql_error(),E_USER_ERROR); //mensaaje de error si no se puede conectar
    mysqli_select_db($conexion, $database);//seleccion de la base de datos con la qu se desea trabajar
     
      //variables que almacenan los valores que enviamos por nuestra app, (observar que se llaman igual en nuestra app y aqui)
      $direccion=$_POST['direccion'];
      $coordenadas=$_POST['coordenadas'];
      $imei=$_POST['imei'];
      $fecha=$_POST['fecha'];
     
      if (empty($_POST["coordenadas"]) AND $_POST["direccion"]!==''){
      echo "Faltan DATOS los campos estan vacios"; 
      }else{
     
    $query_search = "insert into gps(direccion,coordenadas,imei,fecha) values ('".$direccion."','".$coordenadas."','".$imei."','".$fecha."')";//Sentencia sql a realizar
    $query_exec = mysqli_query($conexion,$query_search) or die(mysqli_error($conexion));//Ejecuta la sentencia sql.
      }
      */
    ?>
  