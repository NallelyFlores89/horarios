<!DOCTYPE html>

<html lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />
    <title>Editar</title>
	<link href='http://fonts.googleapis.com/css?family=Gafata' rel='stylesheet' type='text/css'>
  	<link rel="stylesheet" href="<?=base_url(); ?>statics/foundation/stylesheets/foundation.min.css">
  	<link rel="stylesheet" href="<?=base_url(); ?>statics/foundation/stylesheets/zurb.mega-drop.css">
  	<link rel="stylesheet" href="<?=base_url(); ?>statics/foundation/stylesheets/app.css">

  	<script src="<?=base_url(); ?>statics/js/jquery-1.8.2.js"></script>
  	<script src="<?=base_url(); ?>statics/foundation/javascripts/foundation.min.js"></script>
  	<script src="<?=base_url(); ?>statics/foundation/javascripts/modernizr.foundation.js"></script>
</head>

<body>
		<div class="row">
			<div class="twelve columns">
				<br><br>
				<p class="instrucciones">Rellene los campos que desee editar</p>
				<fieldset >
					<form class="custom" action="" method="post">
						<div class="row">
							<div class="nine columns">
						  		<label for="ueaInput">Nombre de la UEA</label>
						  		<input type="text" id="ueaInput" name="ueaInput" value="<?= $datos[1]['nombreuea'] ?>"/>
						  	</div>
						 							  	
							<div class="three columns">
						  		<label for="claveInput">Clave</label>
						  		<input type="text" id="claveInput" name="claveInput" value="<?= $datos[1]['clave'] ?>"/>
						  	</div>

							<div class="four columns">
						  		<label for="siglasInput">Siglas</label>
						  		<input type="text" id="siglasInput" name="siglasInput" value="<?= $datos[1]['siglas'] ?>"/>
						  		<?php echo form_error('siglasInput'); ?>						 	
						  	</div>
						  							  	
							<div class="four columns">
						  		<label for="ueaInput">Grupo</label>
						  		<input type="text" id="grupoInput" name="grupoInput" value="<?= $datos[1]['grupo'] ?>"/>
						  		<?php echo form_error('grupoInput'); ?>
						  	</div>

						  	<div class="four columns">
						  		<label for="laboratoriosDropdown">Sección</label>
									<?php 
										foreach ($div as $value) {
											$div[$value['iddivisiones']]=$value['nombredivision'];
										}
										echo form_dropdown('division', $div, $id_div);
								    ?>
						  		
						  	</div>
						  	
						  	
						</div>

						<div class="four columns"></div>
						<input type="submit" id="editar" class="button large four columns" value="Guardar cambios" />
						<div class="four columns"></div>
					</fieldset>

			</div> <!--twelve colums-->
		</div> <!--row-->

</body>
</html>
