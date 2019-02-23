<div id="editModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="EditarDatos" method="POST" enctype="multipart/form-data">
					<div class="modal-header">
						<h4 class="modal-title">Editar Unidades</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<div class="form-group col-md-12" hidden>
						      <label for="equipo">code:</label>
						      <input type="text" name="mcode" class="form-control" id="mcode" required>
						    </div>
						 <div class="form-group col-md-12">
						      <label for="equipo">Numero Comercial:</label>
						      <input type="text" name="mNumero" class="form-control" id="mNumero" placeholder="Numero Comercial" required>
						    </div>
						  </div>
						  <div class="form-group">
						    <div class="form-group col-md-12">
						      <label for="equipo">Numero IMEI:</label>
						      <input type="text" name="mImei" class="form-control" id="mImei" placeholder="Numero Imei" required>
						    </div>
						  </div>
						  <div class="form-group">
						    <div class="form-group col-md-12">
						      <label for="equipo">Telefono:</label>
						      <input type="text" name="mTelefono" class="form-control" id="mTelefono" placeholder="Telefono" required>
						    </div>
						  </div>
						  <div class="form-group">
						    <div class="form-group col-md-12">
						      <label for="equipo">Placas:</label>
						      <input type="text" name="mPlacas" class="form-control" id="mPlacas" placeholder="Placas" required>
						    </div>
						  </div>
						  <div class="form-group">
						    <div class="form-group col-md-12">
						      <label for="equipo">Marca:</label>
						      <input type="text" name="mMarca" class="form-control" id="mMarca" placeholder="Marca" required>
						    </div>
						  </div>
						  <div class="form-group">
						    <div class="form-group col-md-12">
						      <label for="equipo">Modelo</label>
						      <input type="text" name="mModelo" class="form-control" id="mModelo" placeholder="Modelo" required>
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
