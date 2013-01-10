<!DOCTYPE html>

<html lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />
    <title>Cambiar Laboratorio</title>
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
				<fieldset>
				<form method="POST">
	                <label for="laboratoriosDropdown" class="pregunta">Trasladar grupo al laboratorio</label>
				  	<select id="laboratoriosDropdown" name="laboratoriosDropdown">
						<?php 
							foreach ($laboratorios as $indice => $valor) {
								$id=$valor['idlaboratorios'];
								if($id == $idlab){
									echo "<option id=$id name=$id value=$id selected>"; print_r($valor['nombrelaboratorios']); echo "</option>";
								}else{
									echo "<option id=$id name=$id value=$id>"; print_r($valor['nombrelaboratorios']); echo "</option>";
								}	
							}
					    ?>
			  		</select>
					<br><br>
					<div class="row"></div>
						<input type="submit" id="editar" class="button offset-by-two" value="Guardar cambios" />
					</div>
				</form>
				</fieldset>
			</div> <!--twelve colums-->
		</div> <!--row-->
</body>
</html>
