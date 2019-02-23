<div id="editModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="InsertarPapeleta" method="POST" enctype="multipart/form-data">
					<div class="modal-header">
						<h4 class="modal-title">Papeletas</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<div class="form-group col-md-12" hidden>
						      <label for="code">code:</label>
						      <input type="text" name="mCode" class="form-control" id="mCode" required>
						</div>
						<div class="form-group col-md-12">
						      <label for="Unidad">Unidad:</label>
						      <input type="text" name="mUnidad" class="form-control" id="mUnidad" required>
						</div>
						 <div class="form-group col-md-12">
						      <label for="equipo">Fecha y Hora Pestalozzi:</label>
						      <br>
						      <input class="form-control" type="date" name="fechpes" id="fechpes" style="width:40%;display: inline-block;">
						      <input class="form-control" type="time" name="hrapes" id="hrapes" style="width:40%;display: inline-block;">
						  </div>
						  <div class="form-group col-md-12">
						      <label for="equipo">Fecha y Hora ISSSTEP:</label>
						      <br>
						      <input class="form-control" type="date" name="fechistep" id="fechistep"style="width:40%;display: inline-block;">
						      <input class="form-control" type="time" name="hraistep" id="hraistep"style="width:40%;display: inline-block;">
						  </div>
						  <div class="form-group col-md-12">
						      <label for="equipo">Fecha y Hora Llegada:</label>
						      <br>
						      <input class="form-control" type="date" name="fechfin" id="fechfin"style="width:40%;display: inline-block;">
						      <input class="form-control" type="time" name="hrafin" id="hrafin"style="width:40%;display: inline-block;">
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