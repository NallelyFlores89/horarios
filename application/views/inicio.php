<!DOCTYPE html>

<html lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />
    <title>Laboratorios de Docencia - Horarios</title>
	<link href='http://fonts.googleapis.com/css?family=Gafata' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="<?=base_url(); ?>statics/foundation/stylesheets/foundation.min.css">
  	<link rel="stylesheet" href="<?=base_url(); ?>statics/responsiveTable/responsive-tables.css">
  	<link rel="stylesheet" href="<?=base_url(); ?>statics/responsiveTable/collapsed.css/">
	<link rel="stylesheet" href="<?=base_url(); ?>statics/responsiveTable/stylesheets/app.css">
	
  	<script src="<?=base_url(); ?>statics/js/jquery-1.8.2.js"></script>
  	<script src="<?=base_url(); ?>statics/foundation/javascripts/foundation.min.js"></script>
  	<script src="<?=base_url(); ?>statics/foundation/javascripts/modernizr.foundation.js"></script>
	<script src="<?=base_url(); ?>statics/responsiveTable/responsive-tables.js"></script>
   	<script src="<?=base_url(); ?>statics/foundation/javascripts/marketing_docs.js"></script>
	<!-- 	<script src="<?=base_url(); ?>statics/js/jquery.popupWindow.js"></script> -->
	<script src="<?=base_url(); ?>statics/collapsed/src/jquery.collapse.js"></script>
	<script src="<?=base_url(); ?>statics/js/horarios.js"></script>
</head>

<body>
	<div class="container">
		<div class="row">
			<div class="twelve columns">
				<div class="row cabecera">
					<h1 class="nine columns">Laboratorios de Docencia CBI</h1>
					<a class="three columns" id="adminBtn" href="<?=base_url();?>index.php/loguin_c/">Entrar como administrador</a>
				</div>
				<div class="row opciones"><br>
					<a href="<?=base_url(); ?>index.php/solicitar_labo_c" class="solicitarLabosBtn six columns">Solicitar Laboratorio</a>
					<a href="<?=base_url(); ?>index.php/recursos_c" class="recursosLabosBtn six columns" title="Software y hardware instalado en los laboratorios">Recursos >></a><br/><br />				
				</div><br><br>
				
				<label class="indica">Laboratorios</label><br>
				<dl class="tabs four-up">
					<dd class="active"><a href="#simple1">AT-105</a></dd>
				  	<dd><a href="#simple2">AT-106</a></dd>
				  	<dd><a href="#simple3">AT-219</a></dd>
				  	<dd><a href="#simple4">AT-220</a></dd>
				</dl>
				
			<ul class="tabs-content">
            	
            	<li class="active" id="simple1Tab"> <!--TAB1-->
            		<label class="indica">Semanas</label>
					<div class="row">
						<dl class="tabs pill">
							<?php
								for ($i=1; $i <=13 ; $i++) {?> 
									  <?php if($i==1){ ?>
									  	<dd class="active"><a href="#pill<?= $i ?>"><?= $i ?></a></dd>
									  <?php }else{ ?>
									  	<dd><a href="#pill<?= $i ?>"><?= $i ?></a></dd>
							<?php }} ?>
						</dl>
					</div>
					
					<ul class="tabs-content">
						
						<?php 
							for($i=1; $i<=13; $i++){ 
							if($i==1){	
						?>								
									<li class="active" id="pill<?= $i ?>Tab">
										<label class="indica">Horarios</label>
					            	   	<table class="responsive contentHorario">
											<tr>
												<th>Hora<?=$i?></th>
												<th>Lunes</th>
												<th>Martes</th>
												<th>Miércoles</th>
												<th>Jueves</th>
												<th>Viernes</th>
											</tr>
							
											<?php
												foreach ($DataHorarios as $indice=>$value) { ?>
													<tr id='<?= $value ?>'>
														<td class='hora'><?=$value ?></td>
														<td id='<?= $indice; ?>' class='<?=$Data['$DataU105_'.$i.'_1']['divisionesGrupo'][$indice]; ?>'> <?= strtoupper($Data['$DataU105_'.$i.'_1']['siglasGrupos'][$indice]); ?> </td>
														<td id='<?= $indice; ?>' class='<?=$Data['$DataU105_'.$i.'_2']['divisionesGrupo'][$indice]; ?>'> <?= strtoupper($Data['$DataU105_'.$i.'_2']['siglasGrupos'][$indice]); ?> </td>
														<td id='<?= $indice; ?>' class='<?=$Data['$DataU105_'.$i.'_3']['divisionesGrupo'][$indice]; ?>'> <?= strtoupper($Data['$DataU105_'.$i.'_3']['siglasGrupos'][$indice]); ?> </td>
														<td id='<?= $indice; ?>' class='<?=$Data['$DataU105_'.$i.'_4']['divisionesGrupo'][$indice]; ?>'> <?= strtoupper($Data['$DataU105_'.$i.'_4']['siglasGrupos'][$indice]); ?> </td>
														<td id='<?= $indice; ?>' class='<?=$Data['$DataU105_'.$i.'_5']['divisionesGrupo'][$indice]; ?>'> <?= strtoupper($Data['$DataU105_'.$i.'_5']['siglasGrupos'][$indice]); ?> </td>
													</tr>
											<? }?>
							
										</table> <!--TERMINA LA TABLA DE HORARIOS -->
									</li> <!--pill1-->	
							<?php }else{?>
									
								<li class="" id="pill<?= $i ?>Tab">
									<label class="indica">Horarios</label>
				            	   	<table class="responsive contentHorario">
										<tr>
											<th>Hora</th>
											<th>Lunes</th>
											<th>Martes</th>
											<th>Miércoles</th>
											<th>Jueves</th>
											<th>Viernes</th>
										</tr>
						
										<?php
											foreach ($DataHorarios as $indice=>$value) { ?>
												<tr id='<?= $value ?>'>
													<td class='hora'><?=$value ?></td>
													<td id='<?= $indice; ?>' class='<?=$Data['$DataU105_'.$i.'_1']['divisionesGrupo'][$indice]; ?>'> <?= strtoupper($Data['$DataU105_'.$i.'_1']['siglasGrupos'][$indice]); ?> </td>
													<td id='<?= $indice; ?>' class='<?=$Data['$DataU105_'.$i.'_2']['divisionesGrupo'][$indice]; ?>'> <?= strtoupper($Data['$DataU105_'.$i.'_2']['siglasGrupos'][$indice]); ?> </td>
													<td id='<?= $indice; ?>' class='<?=$Data['$DataU105_'.$i.'_3']['divisionesGrupo'][$indice]; ?>'> <?= strtoupper($Data['$DataU105_'.$i.'_3']['siglasGrupos'][$indice]); ?> </td>
													<td id='<?= $indice; ?>' class='<?=$Data['$DataU105_'.$i.'_4']['divisionesGrupo'][$indice]; ?>'> <?= strtoupper($Data['$DataU105_'.$i.'_4']['siglasGrupos'][$indice]); ?> </td>
													<td id='<?= $indice; ?>' class='<?=$Data['$DataU105_'.$i.'_5']['divisionesGrupo'][$indice]; ?>'> <?= strtoupper($Data['$DataU105_'.$i.'_5']['siglasGrupos'][$indice]); ?> </td>
												</tr>
										<? }?>
						
									</table> <!--TERMINA LA TABLA DE HORARIOS -->
								</li> <!--pill1-->	
							<?php }} ?>
					</ul>
     			</li> <!--simple1Tab-->
            	
            	<li id="simple2Tab"> <!--TAB2-->
            		<label class="indica">Semanas</label>
					<div class="row">
						<dl class="tabs pill">
							<?php
								for ($i=1; $i <=13 ; $i++) {?> 
									  <?php if($i==1){ ?>
									  	<dd class="active"><a href="#pill106<?= $i ?>"><?= $i ?></a></dd>
									  <?php }else{ ?>
									  	<dd><a href="#pill106<?= $i ?>"><?= $i ?></a></dd>
							<?php }} ?>
						</dl>
					</div>
					
					<ul class="tabs-content">
						
						<?php 
							for($i=1; $i<=13; $i++){
								
								if($i==1){
						?>
								<li class="active" id="pill106<?= $i ?>Tab">
									<label class="indica">Horarios</label>
				            	   	<table class="responsive contentHorario">
										<tr>
											<th>Hora<?= $i ?></th>
											<th>Lunes</th>
											<th>Martes</th>
											<th>Miércoles</th>
											<th>Jueves</th>
											<th>Viernes</th>
										</tr>
						
										<?php
											foreach ($DataHorarios as $indice=>$value) { ?>
												<tr id='<?= $value ?>'>
													<td class='hora'><?=$value ?></td>
													<td id='<?= $indice; ?>' class='<?=$Data['$DataU106_'.$i.'_1']['divisionesGrupo'][$indice]; ?>'> <?= strtoupper($Data['$DataU106_'.$i.'_1']['siglasGrupos'][$indice]); ?> </td>
													<td id='<?= $indice; ?>' class='<?=$Data['$DataU106_'.$i.'_2']['divisionesGrupo'][$indice]; ?>'> <?= strtoupper($Data['$DataU106_'.$i.'_2']['siglasGrupos'][$indice]); ?> </td>
													<td id='<?= $indice; ?>' class='<?=$Data['$DataU106_'.$i.'_3']['divisionesGrupo'][$indice]; ?>'> <?= strtoupper($Data['$DataU106_'.$i.'_3']['siglasGrupos'][$indice]); ?> </td>
													<td id='<?= $indice; ?>' class='<?=$Data['$DataU106_'.$i.'_4']['divisionesGrupo'][$indice]; ?>'> <?= strtoupper($Data['$DataU106_'.$i.'_4']['siglasGrupos'][$indice]); ?> </td>
													<td id='<?= $indice; ?>' class='<?=$Data['$DataU106_'.$i.'_5']['divisionesGrupo'][$indice]; ?>'> <?= strtoupper($Data['$DataU106_'.$i.'_5']['siglasGrupos'][$indice]); ?> </td>
												</tr>
										<? }?>
						
									</table> <!--TERMINA LA TABLA DE HORARIOS -->
								</li> <!--pill1-->	
							<?php }else{ ?>
								<li class="" id="pill106<?= $i ?>Tab">
									<label class="indica">Horarios</label>

				            	   	<table class="responsive contentHorario">
										<tr>
											<th>Hora<?= $i ?></th>
											<th>Lunes</th>
											<th>Martes</th>
											<th>Miércoles</th>
											<th>Jueves</th>
											<th>Viernes</th>
										</tr>
						
										<?php
											foreach ($DataHorarios as $indice=>$value) { ?>
												<tr id='<?= $value ?>'>
													<td class='hora'><?=$value ?></td>
													<td id='<?= $indice; ?>' class='<?=$Data['$DataU106_'.$i.'_1']['divisionesGrupo'][$indice]; ?>'> <?= strtoupper($Data['$DataU106_'.$i.'_1']['siglasGrupos'][$indice]); ?> </td>
													<td id='<?= $indice; ?>' class='<?=$Data['$DataU106_'.$i.'_2']['divisionesGrupo'][$indice]; ?>'> <?= strtoupper($Data['$DataU106_'.$i.'_2']['siglasGrupos'][$indice]); ?> </td>
													<td id='<?= $indice; ?>' class='<?=$Data['$DataU106_'.$i.'_3']['divisionesGrupo'][$indice]; ?>'> <?= strtoupper($Data['$DataU106_'.$i.'_3']['siglasGrupos'][$indice]); ?> </td>
													<td id='<?= $indice; ?>' class='<?=$Data['$DataU106_'.$i.'_4']['divisionesGrupo'][$indice]; ?>'> <?= strtoupper($Data['$DataU106_'.$i.'_4']['siglasGrupos'][$indice]); ?> </td>
													<td id='<?= $indice; ?>' class='<?=$Data['$DataU106_'.$i.'_5']['divisionesGrupo'][$indice]; ?>'> <?= strtoupper($Data['$DataU106_'.$i.'_5']['siglasGrupos'][$indice]); ?> </td>
												</tr>
										<? }?>
						
									</table> <!--TERMINA LA TABLA DE HORARIOS -->
								</li> <!--pill1-->								
								
							<?php }} 
						?>
					</ul> <!--pill-->
 		       	</li> <!--simple2Tab-->
            	
            	<li id="simple3Tab"> <!--TAB3-->
            		<label class="indica">Semanas</label>
					<div class="row">
						<dl class="tabs pill">
							<?php
								for ($i=1; $i <=13 ; $i++) {?> 
									  <?php if($i==1){ ?>
									  	<dd class="active"><a href="#pill219<?= $i ?>"><?= $i ?></a></dd>
									  <?php }else{ ?>
									  	<dd><a href="#pill219<?= $i ?>"><?= $i ?></a></dd>
							<?php }} ?>
						</dl>
					</div>
					
					<ul class="tabs-content">
						
						<?php 
							for($i=1; $i<=13; $i++){
								
								if($i==1){
								
						?>
									<li class="active" id="pill219<?= $i ?>Tab">
									<label class="indica">Horarios</label>
				            	   	<table class="responsive contentHorario">
										<tr>
											<th>Hora</th>
											<th>Lunes</th>
											<th>Martes</th>
											<th>Miércoles</th>
											<th>Jueves</th>
											<th>Viernes</th>
										</tr>
						
										<?php
											foreach ($DataHorarios as $indice=>$value) { ?>
												<tr id='<?= $value ?>'>
													<td class='hora'><?=$value ?></td>
													<td id='<?= $indice; ?>' class='<?=$Data['$DataU219_'.$i.'_1']['divisionesGrupo'][$indice]; ?>'> <?= strtoupper($Data['$DataU219_'.$i.'_1']['siglasGrupos'][$indice]); ?> </td>
													<td id='<?= $indice; ?>' class='<?=$Data['$DataU219_'.$i.'_2']['divisionesGrupo'][$indice]; ?>'> <?= strtoupper($Data['$DataU219_'.$i.'_2']['siglasGrupos'][$indice]); ?> </td>
													<td id='<?= $indice; ?>' class='<?=$Data['$DataU219_'.$i.'_3']['divisionesGrupo'][$indice]; ?>'> <?= strtoupper($Data['$DataU219_'.$i.'_3']['siglasGrupos'][$indice]); ?> </td>
													<td id='<?= $indice; ?>' class='<?=$Data['$DataU219_'.$i.'_4']['divisionesGrupo'][$indice]; ?>'> <?= strtoupper($Data['$DataU219_'.$i.'_4']['siglasGrupos'][$indice]); ?> </td>
													<td id='<?= $indice; ?>' class='<?=$Data['$DataU219_'.$i.'_5']['divisionesGrupo'][$indice]; ?>'> <?= strtoupper($Data['$DataU219_'.$i.'_5']['siglasGrupos'][$indice]); ?> </td>
												</tr>
										<? }?>
						
									</table> <!--TERMINA LA TABLA DE HORARIOS -->
								</li> <!--pill1-->
						
							<?php }else{ ?>	
									<li class="" id="pill219<?= $i ?>Tab">
									<label class="indica">Horarios</label>
		
				            	   	<table class="responsive contentHorario">
										<tr>
											<th>Hora</th>
											<th>Lunes</th>
											<th>Martes</th>
											<th>Miércoles</th>
											<th>Jueves</th>
											<th>Viernes</th>
										</tr>
						
										<?php
											foreach ($DataHorarios as $indice=>$value) { ?>
												<tr id='<?= $value ?>'>
													<td class='hora'><?=$value ?></td>
													<td id='<?= $indice; ?>' class='<?=$Data['$DataU219_'.$i.'_1']['divisionesGrupo'][$indice]; ?>'> <?= strtoupper($Data['$DataU219_'.$i.'_1']['siglasGrupos'][$indice]); ?> </td>
													<td id='<?= $indice; ?>' class='<?=$Data['$DataU219_'.$i.'_2']['divisionesGrupo'][$indice]; ?>'> <?= strtoupper($Data['$DataU219_'.$i.'_2']['siglasGrupos'][$indice]); ?> </td>
													<td id='<?= $indice; ?>' class='<?=$Data['$DataU219_'.$i.'_3']['divisionesGrupo'][$indice]; ?>'> <?= strtoupper($Data['$DataU219_'.$i.'_3']['siglasGrupos'][$indice]); ?> </td>
													<td id='<?= $indice; ?>' class='<?=$Data['$DataU219_'.$i.'_4']['divisionesGrupo'][$indice]; ?>'> <?= strtoupper($Data['$DataU219_'.$i.'_4']['siglasGrupos'][$indice]); ?> </td>
													<td id='<?= $indice; ?>' class='<?=$Data['$DataU219_'.$i.'_5']['divisionesGrupo'][$indice]; ?>'> <?= strtoupper($Data['$DataU219_'.$i.'_5']['siglasGrupos'][$indice]); ?> </td>
												</tr>
										<? }?>
						
									</table> <!--TERMINA LA TABLA DE HORARIOS -->
								</li> <!--pill1-->								
								
							<?php }} ?>
					</ul> <!--pill-->					
	          	</li> <!--simple3Tab-->

            	<li id="simple4Tab"> <!--TAB4-->
            		<label class="indica">Semanas</label>
					<div class="row">
						<dl class="tabs pill">
							<?php
								for ($i=1; $i <=13 ; $i++) {?> 
									  <?php if($i==1){ ?>
									  	<dd class="active"><a href="#pill220<?= $i ?>"><?= $i ?></a></dd>
									  <?php }else{ ?>
									  	<dd><a href="#pill220<?= $i ?>"><?= $i ?></a></dd>
							<?php }} ?>
						</dl>
					</div>
					
					<ul class="tabs-content">
						
						<?php 
							for($i=1; $i<=13; $i++){ 
								if($i==1){	
								
						?>
								<li class="active" id="pill220<?= $i ?>Tab">
									<label class="indica">Horarios</label>
				            	   	<table class="responsive contentHorario">
										<tr>
											<th>Hora</th>
											<th>Lunes</th>
											<th>Martes</th>
											<th>Miércoles</th>
											<th>Jueves</th>
											<th>Viernes</th>
										</tr>
						
										<?php
											foreach ($DataHorarios as $indice=>$value) { ?>
												<tr id='<?= $value ?>'>
													<td class='hora'><?=$value ?></td>
													<td id='<?= $indice; ?>' class='<?=$Data['$DataU220_'.$i.'_1']['divisionesGrupo'][$indice]; ?>'> <?= strtoupper($Data['$DataU220_'.$i.'_1']['siglasGrupos'][$indice]); ?> </td>
													<td id='<?= $indice; ?>' class='<?=$Data['$DataU220_'.$i.'_2']['divisionesGrupo'][$indice]; ?>'> <?= strtoupper($Data['$DataU220_'.$i.'_2']['siglasGrupos'][$indice]); ?> </td>
													<td id='<?= $indice; ?>' class='<?=$Data['$DataU220_'.$i.'_3']['divisionesGrupo'][$indice]; ?>'> <?= strtoupper($Data['$DataU220_'.$i.'_3']['siglasGrupos'][$indice]); ?> </td>
													<td id='<?= $indice; ?>' class='<?=$Data['$DataU220_'.$i.'_4']['divisionesGrupo'][$indice]; ?>'> <?= strtoupper($Data['$DataU220_'.$i.'_4']['siglasGrupos'][$indice]); ?> </td>
													<td id='<?= $indice; ?>' class='<?=$Data['$DataU220_'.$i.'_5']['divisionesGrupo'][$indice]; ?>'> <?= strtoupper($Data['$DataU220_'.$i.'_5']['siglasGrupos'][$indice]); ?> </td>
												</tr>
										<? }?>
						
									</table> <!--TERMINA LA TABLA DE HORARIOS -->
								</li> <!--pill1-->	
						<?php }else {?>				
								<li class="" id="pill220<?= $i ?>Tab">
									<label class="indica">Horarios</label>
				            	   	<table class="responsive contentHorario">
										<tr>
											<th>Hora</th>
											<th>Lunes</th>
											<th>Martes</th>
											<th>Miércoles</th>
											<th>Jueves</th>
											<th>Viernes</th>
										</tr>
						
										<?php
											foreach ($DataHorarios as $indice=>$value) { ?>
												<tr id='<?= $value ?>'>
													<td class='hora'><?=$value ?></td>
													<td id='<?= $indice; ?>' class='<?=$Data['$DataU220_'.$i.'_1']['divisionesGrupo'][$indice]; ?>'> <?= strtoupper($Data['$DataU220_'.$i.'_1']['siglasGrupos'][$indice]); ?> </td>
													<td id='<?= $indice; ?>' class='<?=$Data['$DataU220_'.$i.'_2']['divisionesGrupo'][$indice]; ?>'> <?= strtoupper($Data['$DataU220_'.$i.'_2']['siglasGrupos'][$indice]); ?> </td>
													<td id='<?= $indice; ?>' class='<?=$Data['$DataU220_'.$i.'_3']['divisionesGrupo'][$indice]; ?>'> <?= strtoupper($Data['$DataU220_'.$i.'_3']['siglasGrupos'][$indice]); ?> </td>
													<td id='<?= $indice; ?>' class='<?=$Data['$DataU220_'.$i.'_4']['divisionesGrupo'][$indice]; ?>'> <?= strtoupper($Data['$DataU220_'.$i.'_4']['siglasGrupos'][$indice]); ?> </td>
													<td id='<?= $indice; ?>' class='<?=$Data['$DataU220_'.$i.'_5']['divisionesGrupo'][$indice]; ?>'> <?= strtoupper($Data['$DataU220_'.$i.'_5']['siglasGrupos'][$indice]); ?> </td>
												</tr>
										<? }?>
						
									</table> <!--TERMINA LA TABLA DE HORARIOS -->
								</li> <!--pill1-->						
								
								
							<?php }}
						?>
					</ul> <!--pill-->					
	
            	</li>	            		            	
	    	</ul>	<!--tabs content-->						
				
				<div class="row opciones"><br>
					<a href="<?=base_url(); ?>index.php/solicitar_labo_c" class="solicitarLabosBtn six columns">Solicitar Laboratorio</a>
					<a href="<?=base_url(); ?>index.php/recursos_c" class="recursosLabosBtn six columns" title="Software y hardware instalado en los laboratorios">Recursos >></a><br><br>
<!-- 					<a href="<?=base_url(); ?>index.php/recursos_c" class="horariosExtra four columns">Horarios extra</a><br/><br /> -->
				</div>
				<hr>
  				
  				<div id="listaUEA" class="row"> <!--Aquí comienza lista de UEA's-->
					
					<div id="CBI-UEA" class="four columns">
	  					<h5>CBI</h5>
	  				    <ul class="disc listacbi">
		  				    <?php  
		  				    	if($listaueasCBI['datosCBI']==-1){
		  				    		echo "<label class='noDatos'> No hay datos que cargar</label>";
		  				    	}else{
									foreach ($listaueasCBI['datosCBI'] as $valor) {
										$cadena='('.$valor['siglas'].')';
										echo "<li>";
										print_r(strtoupper($valor['nombreuea']));
										echo"<span class='siglasUEA'>";
										print_r(strtoupper($cadena));
										echo"</span>";
										echo "</li>";									
									}
								}
							?>
	  				    </ul>
	  				</div>
	  				<div id="CBS-UEA" class="four columns">
	  					<h5>CBS</h5>
	  				    <ul class="disc listacbs">
		  				    <?php  
		  				    	if($listaueasCBS['datosCBS']==-1){
		  				    		echo "<label class='noDatos'> No hay datos que cargar</label>";
		  				    		
		  				    	}else{			    	
									foreach ($listaueasCBS['datosCBS'] as $valor) {
										$cadena='('.$valor['siglas'].')';
										echo "<li>";
										print_r(strtoupper($valor['nombreuea']));
										echo"<span class='siglasUEA'>";
										print_r(strtoupper($cadena));
										echo"</span>";
										echo "</li>";									
									}
								}
							?>
						</ul>
	  				  </div>
	  				  <div id="CSH-UEA" class="four columns">
	  					<h5>CSH</h5>
	  				    <ul class="disc listacsh">
		  				    <?php  
		  				    	if($listaueasCSH['datosCSH']==-1){
		  				    		echo "<label class='noDatos'> No hay datos que cargar</label>";
								}else{
									foreach ($listaueasCSH['datosCSH'] as $valor) {
										$cadena='('.$valor['siglas'].')';
										echo "<li>";
										print_r(strtoupper($valor['nombreuea']));
										echo"<span class='siglasUEA'>";
										print_r(strtoupper($cadena));
										echo"</span>";
										echo "</li>";									
									}
								}
							?>
	  				    </ul>
	  				  </div>
 				</div><!--Termina lista UEA's-->
 				<hr>
 				<!--UEAS-PROFESORES-->
				<h3 id="ueas-profesores-h3">UEA's-Profesores</h3>
				<table class="responsive contentHorario">
					<tr>
						<th>UEA</th>
						<th>Siglas</th>
						<th>Grupo</th>
						<th>Lab</th>
						<th>Profesor</th>
					</tr>
						<?php
							if($listaUPG['datosUPG']==-1){
								echo "<label class='noDatos'> No hay datos que cargar</label>";
							}else{
								foreach ($listaUPG['datosUPG'] as $valor) {
									echo "<tr>";
									echo"<td class='derecha'>";print_r(strtoupper($valor['nombreuea'])); echo"</td>";
									echo"<td>";print_r(strtoupper($valor['siglas'])); echo"</td>";
									echo"<td>";print_r(strtoupper($valor['grupo'])); echo"</td>";
	 								echo"<td>";print_r(strtoupper($valor['idlaboratorios'])); echo"</td>";
	 								echo"<td>";print_r(strtoupper($valor['nombre'])); echo"</td>";
									echo "</tr>";
								 }
							}								 
						?>
				</table> <!--TERMINA LA TABLA DE HORARIOS -->
		
			</div><!--twelve columns-->
		</div> <!--row-->
		
 	</div> <!--container-->
    </body>

</html>

