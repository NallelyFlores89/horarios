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
								for ($i=1; $i <=12 ; $i++) {?> 
									  <?php if($i==1){ ?>
									  	<dd class="active"><a href="#pill<?= $i ?>"><?= $i ?></a></dd>
									  <?php }else{ ?>
									  	<dd><a href="#pill<?= $i ?>"><?= $i ?></a></dd>
							<?php }} ?>
						</dl>
					</div>
		
					<ul class="tabs-content">
						
						<?php 
							for($i=1; $i<=12; $i++){ 
							if($i==1){	
						?>								
									<li class="active" id="pill<?= $i ?>Tab">
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
													<tr id='<?= $value ?>' class=<?= $indice ?>>
														<td class='hora'><?=$value ?></td>
														<td id='<?= $indice; ?>' class='div-<?=$Data['$DataU105_'.$i.'_1']['divisionesGrupo'][$indice]; ?>'> <?= strtoupper($Data['$DataU105_'.$i.'_1']['siglasGrupos'][$indice]); ?> </td>
														<td id='<?= $indice; ?>' class='div-<?=$Data['$DataU105_'.$i.'_2']['divisionesGrupo'][$indice]; ?>'> <?= strtoupper($Data['$DataU105_'.$i.'_2']['siglasGrupos'][$indice]); ?> </td>
														<td id='<?= $indice; ?>' class='div-<?=$Data['$DataU105_'.$i.'_3']['divisionesGrupo'][$indice]; ?>'> <?= strtoupper($Data['$DataU105_'.$i.'_3']['siglasGrupos'][$indice]); ?> </td>
														<td id='<?= $indice; ?>' class='div-<?=$Data['$DataU105_'.$i.'_4']['divisionesGrupo'][$indice]; ?>'> <?= strtoupper($Data['$DataU105_'.$i.'_4']['siglasGrupos'][$indice]); ?> </td>
														<td id='<?= $indice; ?>' class='div-<?=$Data['$DataU105_'.$i.'_5']['divisionesGrupo'][$indice]; ?>'> <?= strtoupper($Data['$DataU105_'.$i.'_5']['siglasGrupos'][$indice]); ?> </td>
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
														<td id='<?= $indice; ?>' class='div-<?=$Data['$DataU105_'.$i.'_1']['divisionesGrupo'][$indice]; ?>'> <?= strtoupper($Data['$DataU105_'.$i.'_1']['siglasGrupos'][$indice]); ?> </td>
														<td id='<?= $indice; ?>' class='div-<?=$Data['$DataU105_'.$i.'_2']['divisionesGrupo'][$indice]; ?>'> <?= strtoupper($Data['$DataU105_'.$i.'_2']['siglasGrupos'][$indice]); ?> </td>
														<td id='<?= $indice; ?>' class='div-<?=$Data['$DataU105_'.$i.'_3']['divisionesGrupo'][$indice]; ?>'> <?= strtoupper($Data['$DataU105_'.$i.'_3']['siglasGrupos'][$indice]); ?> </td>
														<td id='<?= $indice; ?>' class='div-<?=$Data['$DataU105_'.$i.'_4']['divisionesGrupo'][$indice]; ?>'> <?= strtoupper($Data['$DataU105_'.$i.'_4']['siglasGrupos'][$indice]); ?> </td>
														<td id='<?= $indice; ?>' class='div-<?=$Data['$DataU105_'.$i.'_5']['divisionesGrupo'][$indice]; ?>'> <?= strtoupper($Data['$DataU105_'.$i.'_5']['siglasGrupos'][$indice]); ?> </td>
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
								for ($i=1; $i <=12 ; $i++) {?> 
									  <?php if($i==1){ ?>
									  	<dd class="active"><a href="#pill106<?= $i ?>"><?= $i ?></a></dd>
									  <?php }else{ ?>
									  	<dd><a href="#pill106<?= $i ?>"><?= $i ?></a></dd>
							<?php }} ?>
						</dl>
					</div>
					
					<ul class="tabs-content">
						
						<?php 
							for($i=1; $i<=12; $i++){
								
								if($i==1){
						?>
								<li class="active" id="pill106<?= $i ?>Tab">
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
													<td id='<?= $indice; ?>' class='div-<?=$Data['$DataU106_'.$i.'_1']['divisionesGrupo'][$indice]; ?>'> <?= strtoupper($Data['$DataU106_'.$i.'_1']['siglasGrupos'][$indice]); ?> </td>
													<td id='<?= $indice; ?>' class='div-<?=$Data['$DataU106_'.$i.'_2']['divisionesGrupo'][$indice]; ?>'> <?= strtoupper($Data['$DataU106_'.$i.'_2']['siglasGrupos'][$indice]); ?> </td>
													<td id='<?= $indice; ?>' class='div-<?=$Data['$DataU106_'.$i.'_3']['divisionesGrupo'][$indice]; ?>'> <?= strtoupper($Data['$DataU106_'.$i.'_3']['siglasGrupos'][$indice]); ?> </td>
													<td id='<?= $indice; ?>' class='div-<?=$Data['$DataU106_'.$i.'_4']['divisionesGrupo'][$indice]; ?>'> <?= strtoupper($Data['$DataU106_'.$i.'_4']['siglasGrupos'][$indice]); ?> </td>
													<td id='<?= $indice; ?>' class='div-<?=$Data['$DataU106_'.$i.'_5']['divisionesGrupo'][$indice]; ?>'> <?= strtoupper($Data['$DataU106_'.$i.'_5']['siglasGrupos'][$indice]); ?> </td>
												</tr>
										<? }?>
						
									</table> <!--TERMINA LA TABLA DE HORARIOS -->
								</li> <!--pill1-->	
							<?php }else{ ?>
								<li class="" id="pill106<?= $i ?>Tab">
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
													<td id='<?= $indice; ?>' class='div-<?=$Data['$DataU106_'.$i.'_1']['divisionesGrupo'][$indice]; ?>'> <?= strtoupper($Data['$DataU106_'.$i.'_1']['siglasGrupos'][$indice]); ?> </td>
													<td id='<?= $indice; ?>' class='div-<?=$Data['$DataU106_'.$i.'_2']['divisionesGrupo'][$indice]; ?>'> <?= strtoupper($Data['$DataU106_'.$i.'_2']['siglasGrupos'][$indice]); ?> </td>
													<td id='<?= $indice; ?>' class='div-<?=$Data['$DataU106_'.$i.'_3']['divisionesGrupo'][$indice]; ?>'> <?= strtoupper($Data['$DataU106_'.$i.'_3']['siglasGrupos'][$indice]); ?> </td>
													<td id='<?= $indice; ?>' class='div-<?=$Data['$DataU106_'.$i.'_4']['divisionesGrupo'][$indice]; ?>'> <?= strtoupper($Data['$DataU106_'.$i.'_4']['siglasGrupos'][$indice]); ?> </td>
													<td id='<?= $indice; ?>' class='div-<?=$Data['$DataU106_'.$i.'_5']['divisionesGrupo'][$indice]; ?>'> <?= strtoupper($Data['$DataU106_'.$i.'_5']['siglasGrupos'][$indice]); ?> </td>
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
								for ($i=1; $i <=12 ; $i++) {?> 
									  <?php if($i==1){ ?>
									  	<dd class="active"><a href="#pill219<?= $i ?>"><?= $i ?></a></dd>
									  <?php }else{ ?>
									  	<dd><a href="#pill219<?= $i ?>"><?= $i ?></a></dd>
							<?php }} ?>
						</dl>
					</div>
					
					<ul class="tabs-content">
						
						<?php 
							for($i=1; $i<=12; $i++){
								
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
													<td id='<?= $indice; ?>' class='div-<?=$Data['$DataU219_'.$i.'_1']['divisionesGrupo'][$indice]; ?>'> <?= strtoupper($Data['$DataU219_'.$i.'_1']['siglasGrupos'][$indice]); ?> </td>
													<td id='<?= $indice; ?>' class='div-<?=$Data['$DataU219_'.$i.'_2']['divisionesGrupo'][$indice]; ?>'> <?= strtoupper($Data['$DataU219_'.$i.'_2']['siglasGrupos'][$indice]); ?> </td>
													<td id='<?= $indice; ?>' class='div-<?=$Data['$DataU219_'.$i.'_3']['divisionesGrupo'][$indice]; ?>'> <?= strtoupper($Data['$DataU219_'.$i.'_3']['siglasGrupos'][$indice]); ?> </td>
													<td id='<?= $indice; ?>' class='div-<?=$Data['$DataU219_'.$i.'_4']['divisionesGrupo'][$indice]; ?>'> <?= strtoupper($Data['$DataU219_'.$i.'_4']['siglasGrupos'][$indice]); ?> </td>
													<td id='<?= $indice; ?>' class='div-<?=$Data['$DataU219_'.$i.'_5']['divisionesGrupo'][$indice]; ?>'> <?= strtoupper($Data['$DataU219_'.$i.'_5']['siglasGrupos'][$indice]); ?> </td>
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
													<td id='<?= $indice; ?>' class='div-<?=$Data['$DataU219_'.$i.'_1']['divisionesGrupo'][$indice]; ?>'> <?= strtoupper($Data['$DataU219_'.$i.'_1']['siglasGrupos'][$indice]); ?> </td>
													<td id='<?= $indice; ?>' class='div-<?=$Data['$DataU219_'.$i.'_2']['divisionesGrupo'][$indice]; ?>'> <?= strtoupper($Data['$DataU219_'.$i.'_2']['siglasGrupos'][$indice]); ?> </td>
													<td id='<?= $indice; ?>' class='div-<?=$Data['$DataU219_'.$i.'_3']['divisionesGrupo'][$indice]; ?>'> <?= strtoupper($Data['$DataU219_'.$i.'_3']['siglasGrupos'][$indice]); ?> </td>
													<td id='<?= $indice; ?>' class='div-<?=$Data['$DataU219_'.$i.'_4']['divisionesGrupo'][$indice]; ?>'> <?= strtoupper($Data['$DataU219_'.$i.'_4']['siglasGrupos'][$indice]); ?> </td>
													<td id='<?= $indice; ?>' class='div-<?=$Data['$DataU219_'.$i.'_5']['divisionesGrupo'][$indice]; ?>'> <?= strtoupper($Data['$DataU219_'.$i.'_5']['siglasGrupos'][$indice]); ?> </td>
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
								for ($i=1; $i <=12 ; $i++) {?> 
									  <?php if($i==1){ ?>
									  	<dd class="active"><a href="#pill220<?= $i ?>"><?= $i ?></a></dd>
									  <?php }else{ ?>
									  	<dd><a href="#pill220<?= $i ?>"><?= $i ?></a></dd>
							<?php }} ?>
						</dl>
					</div>
					
					<ul class="tabs-content">
						<?php 
							for($i=1; $i<=12; $i++){ 
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
													<td id='<?= $indice; ?>' class='div-<?=$Data['$DataU220_'.$i.'_1']['divisionesGrupo'][$indice]; ?>'> <?= strtoupper($Data['$DataU220_'.$i.'_1']['siglasGrupos'][$indice]); ?> </td>
													<td id='<?= $indice; ?>' class='div-<?=$Data['$DataU220_'.$i.'_2']['divisionesGrupo'][$indice]; ?>'> <?= strtoupper($Data['$DataU220_'.$i.'_2']['siglasGrupos'][$indice]); ?> </td>
													<td id='<?= $indice; ?>' class='div-<?=$Data['$DataU220_'.$i.'_3']['divisionesGrupo'][$indice]; ?>'> <?= strtoupper($Data['$DataU220_'.$i.'_3']['siglasGrupos'][$indice]); ?> </td>
													<td id='<?= $indice; ?>' class='div-<?=$Data['$DataU220_'.$i.'_4']['divisionesGrupo'][$indice]; ?>'> <?= strtoupper($Data['$DataU220_'.$i.'_4']['siglasGrupos'][$indice]); ?> </td>
													<td id='<?= $indice; ?>' class='div-<?=$Data['$DataU220_'.$i.'_5']['divisionesGrupo'][$indice]; ?>'> <?= strtoupper($Data['$DataU220_'.$i.'_5']['siglasGrupos'][$indice]); ?> </td>
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
													<td id='<?= $indice; ?>' class='div-<?=$Data['$DataU220_'.$i.'_1']['divisionesGrupo'][$indice]; ?>'> <?= strtoupper($Data['$DataU220_'.$i.'_1']['siglasGrupos'][$indice]); ?> </td>
													<td id='<?= $indice; ?>' class='div-<?=$Data['$DataU220_'.$i.'_2']['divisionesGrupo'][$indice]; ?>'> <?= strtoupper($Data['$DataU220_'.$i.'_2']['siglasGrupos'][$indice]); ?> </td>
													<td id='<?= $indice; ?>' class='div-<?=$Data['$DataU220_'.$i.'_3']['divisionesGrupo'][$indice]; ?>'> <?= strtoupper($Data['$DataU220_'.$i.'_3']['siglasGrupos'][$indice]); ?> </td>
													<td id='<?= $indice; ?>' class='div-<?=$Data['$DataU220_'.$i.'_4']['divisionesGrupo'][$indice]; ?>'> <?= strtoupper($Data['$DataU220_'.$i.'_4']['siglasGrupos'][$indice]); ?> </td>
													<td id='<?= $indice; ?>' class='div-<?=$Data['$DataU220_'.$i.'_5']['divisionesGrupo'][$indice]; ?>'> <?= strtoupper($Data['$DataU220_'.$i.'_5']['siglasGrupos'][$indice]); ?> </td>
												</tr>
										<? }?>
									</table> <!--TERMINA LA TABLA DE HORARIOS -->
								</li> <!--pill1-->						
							<?php }}
						?>
					</ul> <!--pill-->					
	
            	</li>	            		            	
	    	</ul>	<!--tabs content-->