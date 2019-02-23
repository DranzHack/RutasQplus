<?php 
	require_once dirname(__DIR__).'/modelo/Rutas.php';
	$q = new Unidades();
	$nombre = '';
	$descripcion = '';
	$logo = '';
	$id = '';
	$_SESSION['ruta']='';
	$_SESSION['idruta']='';
	$R = $q->RutaExists();
	while($r=sqlsrv_fetch_array($R)){
		$nombre = $r['nombre'];
		$descripcion = $r['descripcion'];
		$logo = $r['logo'];
		$id = $r['id_Ruta'];

		$_SESSION['ruta']=$r['nombre'];
		$_SESSION['idruta']=$r['id_Ruta'];
	}
	$html = '
    <form id="login_form" class="form-signin" name="formulario_registro" onsubmit="return Login();">
          <h3 class="mt-5 mb-3 text-muted">'.
          ($nombre!=''?$nombre:'Sistema Rutas')
          .'</h3>
          <p class="mt-5 mb-3 text-muted">'.
          ($descripcion!=''?$descripcion:'')
          .'</p>
      <img class="mb-4" src="'.
      ($logo!=''?'../img/'.$logo:'../img/logo_iq_min.png')
      .'" alt="" width="300" height="350">

      <label for="Usuario" class="sr-only">Usuario</label>
      <input name="Usuario" id="Usuario" class="form-control" placeholder="Username" required autofocus>
      <label for="inputPassword" class="sr-only">Contraseña</label>
      <input type="password" id="inputPassword" name="Pass" class="form-control" placeholder="Password" required>
      <input type="hidden" value="'.$nombre.'" id="ruta" name="ruta">
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Recordar usuario
        </label>
      </div>
      <br>
      <label id="alert" style="float: right; color: red;">
      </label>
      <button class="btn btn-lg btn-primary btn-block" name="login" type="submit">Ingresar</button>
      <p class="mt-5 mb-3 text-muted">&copy; VicomNet  2018</p>
    </form>
	';

	echo $html;

?>