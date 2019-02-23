<div id="editModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="EditarDatos" method="POST" enctype="multipart/form-data">
					<div class="modal-header">
						<h4 class="modal-title">Editar Dueños</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<div class="form-group col-md-12" hidden>
						      <label for="equipo">code:</label>
						      <input type="text" name="mcode" class="form-control" id="mcode" required>
						    </div>
						 <div class="form-group col-md-12">
						      <label for="equipo">Nombre:</label>
						      <input type="text" name="mNombre" class="form-control" id="mNombre" placeholder="Nombre" required>
						    </div>
						  </div>
						  <div class="form-group">
						    <div class="form-group col-md-12">
						      <label for="equipo">Apellido Paterno:</label>
						      <input type="text" name="mPaterno" class="form-control" id="mPaterno" placeholder="Apellido Paterno" required>
						    </div>
						  </div>
						  <div class="form-group">
						    <div class="form-group col-md-12">
						      <label for="equipo">Apellido Materno:</label>
						      <input type="text" name="mMaterno" class="form-control" id="mMaterno" placeholder="Apellido Materno" required>
						    </div>
						  </div>
						  <div class="form-group">
						    <div class="form-group col-md-12">
						      <label for="equipo">Usuario:</label>
						      <select name="mUsr" class="form-control" id="mUsr">
						      	<?php require_once '../../controlador/cbUsuarios.php' ?>
						      </select>
						    </div>
						  </div>
					</div>

					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
						<input type="submit"class="btn btn-info" value="Guardar">
					</div>
				</form>
			</div>
		</div>
	</div>
