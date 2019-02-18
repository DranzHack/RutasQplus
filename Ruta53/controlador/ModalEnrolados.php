<div id="editModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="EditarDatosEnroler" method="POST" enctype="multipart/form-data">
					<div class="modal-header">
						<h4 class="modal-title">Editar Unidades</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<div class="form-group col-md-12" >
						      <label for="equipo">code:</label>
						      <input type="text" name="mCode" class="form-control" id="mCode" required>
						    </div>
						 <div class="form-group col-md-12">
						      <label for="equipo">Seleccione una Unidad:</label>
						      <select class="form-control" name="mCombi" id="mCombi">
						      	<?php require_once '../../controlador/ComboUnidades.php' ?>
						      </select>
						    </div>
						  
						  <div class="form-group col-md-12">
						      <label for="equipo">Seleccione Base:</label>
						      <select class="form-control" name="mChofer" id="mChofer">
						      	<?php require_once '../../controlador/ComboChoferes.php' ?>
						      </select>
						    </div>
							<div class="form-group col-md-12">
						      <label for="equipo">Seleccione una Base:</label>
						      <select class="form-control" name="mBase" id="mBase">
						      	<?php require_once '../../controlador/ComboBaseSalida.php' ?>
						      </select>
						    </div>
						    
					        <div class="form-group col-md-12">
								<label for="chofer">Seleccione Fecha Salida:</label>
								<input class="form-control" type="text" name="mFecha" id="datepicker" placeholder="Seleccione Una Fecha">
							</div>
			                
			                <div class="form-group col-md-12">
								<label for="chofer">Seleccione Hora Salida:</label>
								<!--<input class=" timepicker form-control" type="text" name="Hora" id="Hora" placeholder="Seleccione Una Hora">-->
								<input type="text" class="timepicker form-control" name="mHora" id="mHora">
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
