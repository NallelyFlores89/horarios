<!DOCTYPE html>

<html lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />
    <title>Solicitar Laboratorio</title>
	<link href='http://fonts.googleapis.com/css?family=Gafata' rel='stylesheet' type='text/css'>
  	<link rel="stylesheet" href="<?=base_url(); ?>statics/foundation/stylesheets/foundation.min.css">
  	<link rel="stylesheet" href="<?=base_url(); ?>statics/foundation/stylesheets/zurb.mega-drop.css">
  	<link rel="stylesheet" href="<?=base_url(); ?>statics/foundation/stylesheets/app.css">
   	<script src="<?=base_url(); ?>statics/js/jquery-1.8.2.js"></script>
  	<script src="<?=base_url(); ?>statics/foundation/javascripts/foundation.min.js"></script>
  	<script src="<?=base_url(); ?>statics/foundation/javascripts/modernizr.foundation.js"></script>
	<script src="<?=base_url(); ?>statics/js/solicitarLab.js"></script>
</head>

<body>
		<div class="row">
			<div class="twelve columns">
				<h2>Solicitar laboratorios</h2><br>
				<p class="instrucciones">Por favor, llene el formulario<br>Campos con * son obligatorios</p>

				<fieldset >
					<form class="custom" action="" method="post">
						<div class="row">
							<div class="eight columns">
								<label for="nombreInput">* Nombre del titular</label>
					  			<input type="text" id="nombreInput" name="nombreInput" value="<?php echo set_value('nombreInput'); ?>"/>
						  		<?php echo form_error('nombreInput'); ?>

						 	</div>
						 	
							<div class="four columns">
								<label for="numInput">* No. Empleado</label>
					  			<input type="text" id="numInput" name="numInput" value="<?php echo set_value('numInput'); ?>"/>
						  		<?php echo form_error('numInput'); ?>

						 	</div>						 	
						</div><hr>

						<div class="row">
							<div class="twelve columns">
								<label for="correoInput">* Correo electrónico (xanum.uam.mx)</label>
						  		<input type="email" id="correoInput" name="correoInput" pattern="([a-zA-Z0-9]+)@xanum.uam.mx" value="<?php echo set_value('correoInput'); ?>"/>
						  		<?php echo form_error('correoInput'); ?>
						 	</div>
						 </div><hr>	
						<div class="row">
							<div class="eight columns">
						  		<label for="ueaInput">* Nombre de la UEA</label>
						  		<input type="text" id="ueaInput" name="ueaInput" value="<?php echo set_value('ueaInput'); ?>"/>
						  		<?php echo form_error('ueaInput'); ?>

						  	</div>
						  	
							<div class="two columns">
						  		<label for="claveInput">* Clave</label>
						  		<input type="text" id="claveInput" name="claveInput" value="<?php echo set_value('claveInput'); ?>"/>
						  		<?php echo form_error('claveInput'); ?>

						  	</div>
						  	
							<div class="two columns">
						  		<label for="ueaInput">* Grupo</label>
						  		<input type="text" id="grupoInput" name="grupoInput" value="<?php echo set_value('grupoInput'); ?>"/>
						  		<?php echo form_error('grupoInput'); ?>

	                 		</div><hr>
						</div>
		
						<div class="row">
						<div class="twelve columns">
					        <div class="four columns">
					           	<label for="divisionesDropdown">División</label>
								  	<select id="divisionesDropdown" name="divisionesDropdown">
										<?php 
											$add='division';
											foreach ($listaDivisiones['divisiones'] as $indice => $valor) {
												$divisionid=$add.strtolower($valor);
												echo "<option id=$divisionid name=$divisionid>"; print_r($valor); echo "</option>";	
											}
									    ?>
							  		</select>
							</div>
	
			                <div class="four columns">
				                <label for="laboratoriosDropdown">Laboratorio</label>
							  	<select id="laboratoriosDropdown" name="laboratoriosDropdown">
								    <option id="laboratorioNON" value=0 selected="true">Ninguno en especial</option>
									<?php 
										$add='laboratorio';
										foreach ($DataLabos as $valor) {
											$id=$add.strtolower($valor['nombrelaboratorios']);
											$value=$valor['idlaboratorios'];
											echo "<option id=$id name=$id value=$value>"; print_r($valor['nombrelaboratorios']); echo "</option>";	
										}
								    ?>
						  		</select>
							</div>
	
			                <div class="four columns">
				                <label for="laboratoriosAltDropdown">Laboratorio Alterno</label>
							  	<select id="laboratoriosAltDropdown" name="laboratoriosAltDropdown">
								    <option id="laboratorioAltNON" value=0>Ninguno en especial</option>
									<?php 
										$add='laboratorio';
										foreach ($DataLabos as $valor) {
											$id=$add.strtolower($valor['nombrelaboratorios']);
											$value=$valor['idlaboratorios'];
											echo "<option id=$id name=$id value=$value>"; print_r($valor['nombrelaboratorios']); echo "</option>";	
										}
								    ?>
						  		</select>
							</div>		
							
							<div class="row">
								<div class="twelve">
									<div class="row>">
						                <div class="six columns">
							                <label for="HoraIDropdown">Hora de inicio</label>
			
										  	<select id="HoraIDropdown" name="HoraIDropdown">
												<?php 
													$add='HoraI';
													foreach ($DataHorarios as $valor) {
														$id=$add.strtolower($valor);
														echo "<option id=$id name=$id>"; print_r(substr($valor,0,-6)); echo "</option>";
													}
											    ?>
									  		</select>
										</div>
									</div>
									
									<div class="row">
										<div class="six columns">
							                <label for="HoraFAltDropdown">Hora de Term</label>
			
										  	<select id="HoraFDropdown" name="HoraFDropdown">
												<?php 
													$add='HoraF';
													foreach ($DataHorarios as $valor) {
														$id=$add.strtolower($valor);
														echo "<option id=$id name=$id>"; print_r(substr($valor,0,-6)); echo "</option>";	
													}
											    ?>
									  		<option name="21:00">21:00</option>
									  		</select>
										</div>
										<?php echo form_error('HoraFDropdown'); ?>

									</div>
									
									<div class="twelve">
									<div class="row>">
						                <div class="six columns">
							                <label for="SemIDropdown">Semana de inicio</label>
											
										  	<select id="SemIDropdown" name="SemIDropdown">
												<?php 
													$add='SemI_';
													foreach ($DataSem as $indice=>$valor) {
														$id=$add.strtolower($indice);
														echo "<option id=$id name=$id value=$indice>"; print_r($valor); echo "</option>";
													
													}
											    ?>
									  		</select>
										</div>
									</div>
									
									<div class="row">
										<div class="six columns">
							                <label for="SemFDropdown">Semana Final</label>
			
										  	<select id="SemFDropdown" name="SemFDropdown">
												<?php 
													$horaVal=8.00;
													$add='SemF_';
													foreach ($DataSem as $indice=>$valor) {
														$id=$add.strtolower($indice);
														echo "<option id=$id name=$id value=$indice>"; print_r($valor); echo "</option>";
													}
											    ?>
									  		</select>
										</div>
									</div>
								</div><hr>
								</div> <!--twelve -->	
							</div>	<!--row-->			
								
						</div> <!--twelve columns-->
						</div>	<!--row-->
						
						<div class="row">
							<label>* Días</label>
							<div class="six columns">
						      <label for="checkboxLunes"><input type="checkbox" id="checkboxLunes" name="checkboxes[]" style='display: none;' value=1><span class="custom checkbox"></span> Lunes</label>
						      <label for="checkboxMartes"><input type="checkbox" id="checkboxMartes" name="checkboxes[]" style='display: none;' value=2><span class="custom checkbox"></span> Martes</label>
						      <label for="checkboxMiercoles"><input type="checkbox" id="checkboxMiercoles" name="checkboxes[]" style='display: none;' value=3><span class="custom checkbox"></span> Miércoles</label>
							</div>
							<div class="six columns">
								<label for="checkboxJueves"><input type="checkbox" id="checkboxJueves" name="checkboxes[]" style='display: none;' value=4><span class="custom checkbox"></span> Jueves</label>
						      	<label for="checkboxViernes"><input type="checkbox" id="checkboxViernes" name="checkboxes[]" style='display: none;' value=5><span class="custom checkbox"></span> Viernes</label>
								
							</div>
					  		<?php echo form_error('checkboxes[]'); ?>

						</div><hr>
						
						<label style="margin-top:20px;">Recursos </label>
						<p>(Sólo en caso de ser necesario) <a class="recursosLabosBtn" href="<?= base_url(); ?>index.php/recursos_c">Ver recursos</a></p> 
						<textarea id="recursos" name="recursos"></textarea><hr>
						
						<div class="row">
							<label style="margin-top:20px;">Comentarios </label>
							<textarea id="comentarios" name="comentarios" placeholder="Si desea, puede dejar un comentario adicional"></textarea>
						</div><hr>

						<div class="four columns"></div>
						<input type="submit" id="EnviarSolicitudBtn" class="button large four columns" value="Enviar Solicitud" />
						<div class="four columns"></div>

				</fieldset>

			</div> <!--twelve colums-->
		</div> <!--row-->

</body>
</html>
