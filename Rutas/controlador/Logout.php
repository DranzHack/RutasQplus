<?php
session_start();
$ruta=isset($_SESSION['ruta'])?'?ruta='.$_SESSION['ruta']:'';
session_start(); //to ensure you are using same session
session_destroy(); //destroy the session
header("location:../vistas".$ruta); //to redirect back to "index.php" after logging out
exit();
?>