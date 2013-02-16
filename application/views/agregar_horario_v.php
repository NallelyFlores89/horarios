<!DOCTYPE html>

<html lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />
    <title>Agregar horario</title>
	<link href='http://fonts.googleapis.com/css?family=Gafata' rel='stylesheet' type='text/css'>

  	<link rel="stylesheet" href="<?=base_url(); ?>statics/foundation/stylesheets/foundation.min.css">
  	<link rel="stylesheet" href="<?=base_url(); ?>statics/foundation/stylesheets/zurb.mega-drop.css">
  	<link rel="stylesheet" href="<?=base_url(); ?>statics/foundation/stylesheets/app.css">
 	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.0/themes/base/jquery-ui.css" />

  	<script src="<?=base_url(); ?>statics/js/jquery-1.8.2.js"></script>
  	<script src="<?=base_url(); ?>statics/foundation/javascripts/foundation.min.js"></script>
  	<script src="<?=base_url(); ?>statics/foundation/javascripts/modernizr.foundation.js"></script>
  	<script src="<?=base_url(); ?>statics/ui/jquery-ui-1.10.0.custom.min.js"></script>

	<script type="text/javascript">
		$(document).ready(function() {
			$("#nombreInput").autocomplete({
				source: function(request, response) {
					$.ajax({ 
						url: "<?php echo site_url('agregar_horario_c/propon_profesor'); ?>",
						data: { term: $("#nombreInput").val()},
						dataType: "json",
						type: "POST",
						success: function(data){	
							response(data);
							$("#nombreInput").change(function(){
								$("#numInput").removeAttr('disabled')
								$("#correoInput").removeAttr('disabled')
								$.ajax({
									url: "<?php echo site_url('agregar_horario_c/busca_id_prof'); ?>",
									data: { term2:$("#nombreInput").val() },
									dataType: "json",
									type: "POST",
									success:function(data2){
										$("#id_prof").val(data2);
											$.ajax({
												url: "<?php echo site_url('agregar_horario_c/busca_num_empleado'); ?>",
												data: { term3: $("#id_prof").val() },
												dataType: "json",
												type: "POST",
												success:function(data3){
													if(data3==0000){
														$("#numInput").val('No número')
														$("#numInput").attr('disabled','')
													}else{
														if(data3=='No número'){
															$("#numInput").val('')
														}else{
															$("#numInput").val(data3)
															$("#numInput").attr('disabled','')															
															
														}
													
													}
												}										
											})
											
											$.ajax({
												url:"<?php echo site_url('agregar_horario_c/busca_correo_empleado'); ?>",
												data: { term4: $("#id_prof").val()},
												dataType: "json",
												type: "POST",
												success: function(data4){
													if(data4==""){
														$("#correoInput").val('No correo')
														$("#correoInput").attr('disabled','')
													}else{
														if(data4=='No correo'){
															$("#correoInput").val('')
														}else{
															$("#correoInput").val(data4)
															$("#correoInput").attr('disabled','')
														}
													}
												}
											})
										}
									})
								})
							}
						});
					},
				minLength: 1
			});

			$("#ueaInput").autocomplete({
				source: function(request, response) {
					$.ajax({ 
						url: "<?php echo site_url('agregar_horario_c/propon_uea'); ?>",
						data: { term: $("#ueaInput").val()},
						dataType: "json",
						type: "POST",
						success: function(data){
							response(data);
							$("#ueaInput").change(function(){
								$("#claveInput").removeAttr('disabled')
								$.ajax({
									url: "<?php echo site_url('agregar_horario_c/busca_id_uea'); ?>",
									data: { termUea: $("#ueaInput").val() },
									dataType: "json",
									type: "POST",
									success:function(data){								
										$("#ueaId").val(data)
										$.ajax({
											url: "<?php echo site_url('agregar_horario_c/busca_clave'); ?>",
											data: { idUea: $("#ueaId").val() },
											dataType: "json",
											type: "POST",
											success:function(data){	
												if(data == -1){
													$("#claveInput").val('')
												}else{
													if(data==''){
														$("#claveInput").val('No clave')
														$("#claveInput").attr('disabled','')	
													}else{
														$("#claveInput").val(data)
														$("#claveInput").attr('disabled','')
													}
												}
				
											}
											
										})
									}		
								})
							})
						}
					});
				},
				minLength: 1
			});		
		});

	</script>

</head>

<body>
		<div class="row">
			<div class="twelve columns">
				<br><br>
				<h2>Agregar horario</h2><br>
				<p class="instrucciones">Por favor, llene el formulario</p>

				<fieldset >
					<form class="custom" action="" method="post">
						<div class="row">
							<div class="nine columns">
								<label for="nombreInput">Nombre del profesor</label>
					  			<input type="text" id="nombreInput" name="nombreInput" value="<?php echo set_value('nombreInput'); ?>"/>
						  		<input type="hidden" id="id_prof">
						  		<?php echo form_error('nombreInput'); ?>

						 	</div>
						 	
							<div class="three columns">
								<label for="numInput">No. Empleado</label>
					  			<input type="text" id="numInput" name="numInput" value="<?php echo set_value('numInput'); ?>"/>
						 	</div>
						</div><hr>
						<div class="row">
							<label for="correoInput">Correo</label>
				  			<input type="text" id="correoInput" name="correoInput" value="<?php echo set_value('correoInput'); ?>"/>
						</div><hr>
							
						<div class="row">
							<div class="six columns">
								<label for="ueaInput">Nombre de la UEA</label>
					  			<input type="text" id="ueaInput" name="ueaInput" value="<?php echo set_value('ueaInput'); ?>"/>
					  			<input type="hidden" id="ueaId" name="ueaId" />
						  		<?php echo form_error('ueaInput'); ?>
						   	</div>
						  	<div class="two columns">
						  		<label for="claveInput">Clave</label>
						  		<input type="text" id="claveInput" name="claveInput" value="<?php echo set_value('claveInput'); ?>"/>
						  	</div>
							<div class="two columns">
						  		<label for="grupoInput">Grupo</label>
						  		<input type="text" id="grupoInput" name="grupoInput" value="<?php echo set_value('grupoInput'); ?>"/>
						  	</div>
							<div class="two columns">
						  		<label for="siglasInput">Siglas</label>
						  		<input type="text" id="siglasInput" name="siglasInput" value="<?php echo set_value('siglasInput'); ?>"/>
						  		<?php echo form_error('siglasInput'); ?>

						  	</div>
						</div><hr>
		
						<div class="row">
						<div class="twelve columns">
							<div class="row">
						        <div class="six columns">
						           	<label for="divisionesDropdown">Sección</label>
										<?php echo form_dropdown('divisionesDropdown', $listaDivisiones['divisiones'], set_value('divisionesDropdown') ); ?>
								</div>
		
				                <div class="six columns">
					                <label for="laboratoriosDropdown">Laboratorio</label>
										<?php 
											foreach ($DataLabos as $value) {
												$labos[$value['idlaboratorios']]=$value['nombrelaboratorios'];
											}
											echo form_dropdown('laboratoriosDropdown', $labos, set_value('laboratoriosDropdown') );
									    ?>

								</div>
							</div><hr>
							
							<div class="twelve">
								<div class="row>">
						    	    <div class="six columns">
							        	<label for="HoraIDropdown">Hora de inicio</label>
											<?php 
												foreach ($DataHorarios as $index => $value) {
													$time[$index]=substr($value,0,-6);							
												}
												echo form_dropdown('HoraIDropdown', $time, set_value('HoraIDropdown') );
											?>
										</div>
								</div>
									
								<div class="row">
									<div class="six columns">
						                <label for="HoraFAltDropdown">Hora de Term</label>
										<?php 
											foreach ($DataHorarios as $index => $value) {
												$time[$index]=substr($value,0,-6);							
											}
											$time[27]='21:00';
											echo form_dropdown('HoraFDropdown', $time, set_value('HoraFDropdown') );
										?>
									</div>
								</div>
							</div><hr><!--twelve -->	
								
						</div> <!--twelve columns-->
						</div>	<!--row-->
						
						
						<div class="row">
							<div class="twelve columns">
								<label for="dias">Días</label>
								<?php 
									print_r(set_value('checkboxes[]'));
									foreach ($dias as $value) {
								?>
										<div class="two columns">
										<label><?= $value['nombredia'] ?></label>
										<?php echo form_checkbox('checkboxes[]', $value['iddias']); ?>
										</div>
								<?php }	?>
						  		<?php echo form_error('checkboxes[]'); ?>
								<div class="one columns"></div>
							</div>

						</div> <hr>
						
						<div class="four columns"></div>						
							<input type="submit" id="AgregarHorarioBtn" class="button normal four columns" value="Agregar" />
						<div class="four columns"></div>						

				</fieldset>

			</div> <!--twelve colums-->
		</div> <!--row-->

</body>
</html>
