<nav class="navbar navbar-expand-lg navbar-dark  bg-dark">
  <a class="navbar-brand" href="#"><img src=""  height="30" class="d-inline-block align-top" alt="">
    <?php require_once '../../controlador/getRutaName.php' ?>
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="Ruta.php">Inicio <span class="sr-only">(current)</span></a>
      </li>
      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Ubicaciones
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <li><a class="dropdown-item" href="../Paginas/UbicacionXUnidad.php">Unidades</a></li>
          <li><a class="dropdown-item" href="../Paginas/recorrido.php">Recorridos</a></li>
        </ul>
      </li>


      

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Tiempos
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <li><a class="dropdown-item" href="../Paginas/Monitoreo.php">Monitoreo</a></li>
          <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">Vualtas </a>
          <ul class="dropdown-menu">
            <?php require_once '../../controlador/LiNavarEq.php' ?>
            </ul>
          </li> 
        </ul>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Inventario
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <li><a class="dropdown-item" href="../Paginas/Inventario.php">*Inventarios*</a></li>
          <li><a class="dropdown-item" href="../Paginas/NewUnidades.php">Unidades</a></li>
          <li><a class="dropdown-item" href="../Paginas/NewChofer.php">Choferes</a></li>
          <li><a class="dropdown-item" href="../Paginas/Dueños.php">Dueños</a></li>
          <li><a class="dropdown-item" href="#">Supervisores</a></li>
        </ul>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Enroler y Salidas
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <li><a class="dropdown-item" href="../Paginas/Enrolador.php">Enrolador</a></li>
          <li><a class="dropdown-item" href="../Paginas/Salidas.php">Salidas</a></li>
          <li><a class="dropdown-item" href="#">Choferes</a></li>
          <li><a class="dropdown-item" href="#">Dueños</a></li>
          <li><a class="dropdown-item" href="#">Supervisores</a></li>
        </ul>
      </li>

    </ul>
    <a href="../../controlador/Logout.php" class="btn btn-danger btn-sm">
    <i class="fas fa-sign-out-alt"></i> logout
        </a>
  </div>
</nav>