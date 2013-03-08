<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	
	class Administracion_c extends CI_Controller{
    
	    function __construct(){
	        parent::__construct();
			
			$this->load->helper(array('html', 'url'));
	        $this->load->model('administracion_m'); // modelos
			$this->load->model('profesores_m');
			$this->load->model('solicitar_laboratorio_m');
			
	   	}

	    function index(){
	    	if(! $this->session->userdata('validated')){
				redirect('loguin_c/index2/NULL/2');
			}else{
				$data['datosUPG']=$this->administracion_m->obtenListaUeaProfesorGrupo();
		        $this->load->view('administracion_v', $data);
			}
	    }
		

		function elimina_grupo($idgrupo){
			if(! $this->session->userdata('validated')){
				redirect('loguin_c/index2/NULL/2');
			}else{				
				if($_POST != NULL){
					$this->administracion_m->eliminaGrupo($idgrupo);
					echo "<script languaje='javascript' type='text/javascript'>
							window.opener.location.reload();
							window.close();</script>";	
				}else{
					$this->load->view('elimina_grupo_v');	
				}
			}			
		}	
			
		function elimina_uea($iduea){
			if(! $this->session->userdata('validated')){
				redirect('loguin_c/index2/NULL/2');
			}else{
				if($_POST != NULL){
					$this->administracion_m->eliminaUEA($iduea);
					echo "<script languaje='javascript' type='text/javascript'>
							window.opener.location.reload();
							window.close();</script>";				
				}else{
					$this->load->view('elimina_uea_v');
				}
			}	
		}	

		function edita($iduea, $siglas){ //Edita los datos de las UEAS como son sección, nombre de la uea, clave, etc.
			if(! $this->session->userdata('validated')){
				redirect('loguin_c/index2/NULL/2');
			}else{
				$datos['datos'] = $this->administracion_m->obtenDatosGrupo($siglas);
				$datos['id_div'] =$datos['datos'][1]['divisiones_iddivisiones']; 
				$datos['div'] = $this->administracion_m->obtenDiv();
				$this->form_validation->set_rules('ueaInput', 'ueaInput', 'required');
				$this->form_validation->set_rules('siglasInput', 'siglasInput', 'required');
				
				$this->form_validation->set_rules('grupoInput', 'grupoInput', '');
				$this->form_validation->set_rules('claveInput', 'claveInput', '');
				
				$this->form_validation->set_message('required','Este campo no puede ser nulo');
	
				if($this->form_validation->run()){
					
					$this->administracion_m->editaUEA($datos['datos'][1]['nombreuea'], $_POST['ueaInput'], $_POST['claveInput'], $_POST['division']);
					$this->administracion_m->editaGrupo($datos['datos'][1]['siglas'],$_POST['grupoInput'], $_POST['siglasInput']);
				
					echo "<script languaje='javascript' type='text/javascript'>
							window.opener.location.reload();
			                window.close();</script>";
			                
				}else{
					$this->load->view('admin_edita_v',$datos);
				}	
			}
		} //Fin función
		
		function cambia_labo($idgrupo, $idlab){
			if(! $this->session->userdata('validated')){
				redirect('loguin_c/index2/NULL/2');
			}else{
				$datos['laboratorios']=$this->administracion_m->obtenLaboratorios();
				$datos['idlab'] = $idlab;
				
				if($_POST != NULL){ //Recibe la petición para cambiar de laboratorio
				
					$laboratorios_grupo = $this->administracion_m->obtenDatosLaboratoriosGrupo($idgrupo);
					$indice=1;
					foreach ($laboratorios_grupo as $value) { //Obteniendo datos para cambiar de laboratorio
						$diasA[$indice]= $value['dias_iddias'];
						$semanasA[$indice] = $value['semanas_idsemanas'];
						$horasA[$indice] = $value['horarios_idhorarios'];
						$indice++;
					}
					$dias=array_unique($diasA); $semanas=array_unique($semanasA); $horas=array_unique($horasA);
					
					//Borrando el grupo del laboratorio actual
					$this->administracion_m->borraGrupo($idgrupo, $idlab);
					
					//Insertando grupo en el laboratorio nuevo
					foreach ($semanas as $idsem) {
						foreach ($dias as $iddias) {
							foreach ($horas as $idhoras) {
								$this->administracion_m->editaLabo($_POST['laboratoriosDropdown'], $idgrupo, $iddias, $idsem, $idhoras);
							}
						}
					}
					echo "<script languaje='javascript' type='text/javascript'>
						    window.opener.location.reload();
			                window.close();</script>";
				}
				
				$this->load->view('editaLabo_v',$datos);
			}		
		} //Fin función cambia labos
		
		function cambiaProfe($idgrupo, $idprofesor){
			
			if(! $this->session->userdata('validated')){
				redirect('loguin_c/index2/NULL/2');
			}else{
				$datos['profesor'] = $this->profesores_m->obtenerInfoProfesorId($idprofesor);
				$this->form_validation->set_rules('profesor', 'profesor', 'required');
				$this->form_validation->set_message('required','Este campo no puede ser nulo');

				if($this->form_validation->run()){ 

					$idprof = $this->administracion_m->obtenIdProf($_POST['profesor']);

					//Si el profesor no existe, se inserta en la base de datos
					if($idprof == -1){
						$this->profesores_m->inserta_profesores($_POST['profesor'], '', '');
						$idprof = $this->administracion_m->obtenIdProf($_POST['profesor']);
						$this->administracion_m->cambiaProfesor($idgrupo, $idprof);						
						
					}else{ 	//En caso de que exista, se le asigna su id al grupo					

						$idprof = $this->administracion_m->obtenIdProf($_POST['profesor']); //Consultamos el id del profesor nuevo
						$this->administracion_m->cambiaProfesor($idgrupo, $idprof);
					}

					echo "<script languaje='javascript' type='text/javascript'>
						    window.opener.location.reload();
			                window.close();</script>";
				}else{				
					$this->load->view('cambiar_profe_v',$datos);
				}			
			
			}
		}
		
		function cambiaHora($idgrupo, $siglas, $idlab){
			if(! $this->session->userdata('validated')){
				redirect('loguin_c/index2/NULL/2');
			}else{
				
				$datos['horarios'] = $this->solicitar_laboratorio_m->Obtenhorarios();
				$datos['dias'] = $this->solicitar_laboratorio_m->ObtenDias();
				$horario_grupo = $this->administracion_m->obtenDatosLaboratoriosGrupo2($idgrupo, $idlab);
				$horas=array(); $dias=array(); $semanas=array(); $lab=array();
				foreach ($horario_grupo as $value) {
					array_push($horas,$value['horarios_idhorarios']);
					array_push($semanas, $value['semanas_idsemanas']);
					array_push($dias, $value['dias_iddias']);
				}
				
				$hrs = array_unique($horas);
				$datos['hora_i'] = array_shift($hrs);
				$datos['hora_f'] = end($hrs);				
				$datos['dias_g'] = array_unique($dias);
				$datos['semanas'] = array_unique($semanas);

				if($_POST != NULL){ //Recibe la petición para cambiar de laboratorio

					//Borra el grupo de su horario original					
					
					$this->administracion_m->borraGrupo($idgrupo, $idlab);
					
					//Inserta grupo en su horario nuevo
					
					for ($weeks=1; $weeks <13 ; $weeks++) {
						foreach ($_POST['diasCheckBox'] as $value) {
							for ($horas=$_POST['HoraIDropdown']; $horas <= $_POST['HoraFDropdown']; $horas++) { 
								$this->administracion_m->editaLabo($idlab, $idgrupo, $value, $weeks, $horas);
							}
						} 
					}
					echo "<script languaje='javascript' type='text/javascript'>
						    window.opener.location.reload();
			                window.close();</script>";
				}else{
					$this->load->view('cambiaHora_v', $datos);
				}
			}		
		}
	}
?>