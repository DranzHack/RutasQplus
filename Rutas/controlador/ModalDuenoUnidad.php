<div id="editModalDU" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="EditarDatosDU" method="POST" enctype="multipart/form-data">
					<div class="modal-header">
						<h4 class="modal-title">Editar Dueños</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<div class="form-group col-md-12" hidden>
						      <label for="equipo">code:</label>
						      <input type="text" name="LOL" class="form-control" id="LOL" required>
						</div>
						 <div class="form-group col-md-12">
						      <label for="equipo">Dueño:</label>
						      <select class="form-control" name="LOL2" id="LOL2">
						      	<?php require_once '../../controlador/CbDuenos.php' ?>
						      </select>
						    </div>
						  
						  <div class="form-group">
						    <div class="form-group col-md-12">
						      <label for="equipo">Unidad:</label>
						      <select class="form-control" name="LOL3" id=LOL3>
						      	<?php require_once '../../controlador/CbUnidades.php' ?>
						      </select>
						    </div>
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
