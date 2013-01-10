<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	
	class Administracion_c extends CI_Controller{
    
	    function __construct(){
	        parent::__construct();
			
			$this->load->helper(array('html', 'url'));
	        $this->load->model('administracion_m'); // modelo
			
	   	}

	    function index(){
	    	if(! $this->session->userdata('validated')){
				redirect('loguin_c');
			}else{
				$data['datosUPG']=$this->administracion_m->obtenListaUeaProfesorGrupo();
		        $this->load->view('administracion_v', $data);
			}
	    }
		
		function elimina_profesor($numEmp){
			if(! $this->session->userdata('validated')){
				redirect('loguin_c');
			}else{				
				if($_POST != NULL){
					$idprof=$this->administracion_m->obtenIdProf($numEmp);
					$grupos=$this->administracion_m->obtenGruposxProf($idprof); 
					
					
					foreach ($grupos as $value) { //Elimina los grupos dados por el profesor
						$this->administracion_m->eliminaGrupo($value['idgrupo']);
					}
					
					//Eliminando al profesor
					$this->administracion_m->eliminaProfesor($numEmp);
										
					echo "<script languaje='javascript' type='text/javascript'>
							window.opener.location.reload();
							window.close();</script>";				
					
				}else{
					$this->load->view('elimina_profr');
				}
			}
		}

		function elimina_grupo($grupo){
			if(! $this->session->userdata('validated')){
				redirect('loguin_c');
			}else{				
				if($_POST != NULL){
					$idgrupo=$this->administracion_m->obtenIdGrupo($grupo);
					$this->administracion_m->eliminaGrupo($idgrupo);
					echo "<script languaje='javascript' type='text/javascript'>
							window.opener.location.reload();
							window.close();</script>";	
				}else{
					$this->load->view('elimina_grupo_v');	
				}
			}			
		}	
			
		function elimina_uea($clave){
			if(! $this->session->userdata('validated')){
				redirect('loguin_c');
			}else{
				if($_POST != NULL){
					$iduea=$this->administracion_m->obtenIdUea($clave);
					$this->administracion_m->eliminaUEA($iduea);
					echo "<script languaje='javascript' type='text/javascript'>
							window.opener.location.reload();
							window.close();</script>";				
				}else{
					$this->load->view('elimina_uea_v');
				}
			}	
		}	

		function edita($numEmp, $grupo, $claveUEA, $siglas, $idlab){
			if(! $this->session->userdata('validated')){
				redirect('loguin_c');
			}else{
				$datos['profesor']=$this->administracion_m->obtenDatosProfesor($numEmp);
				$datos['uea'] =$this->administracion_m->obtenDatosUEA($claveUEA);
				$datos['grupo'] =$grupo;
				$datos['siglas'] = $siglas;
				$datos['idlab'] =$idlab;
				
				$this->form_validation->set_rules('nombreInput', 'nombreInput', 'required');
				$this->form_validation->set_rules('ueaInput', 'ueaInput', 'required');
				$this->form_validation->set_rules('grupoInput', 'grupoInput', 'required');
				$this->form_validation->set_rules('siglasInput', 'siglasInput', 'required');
				$this->form_validation->set_message('required','Este campo no puede ser nulo');
				$this->form_validation->set_message('email_valid','Ingrese una dirección de correo valida');
	
				if($this->form_validation->run()){
					
					$this->administracion_m->editaProfesor($numEmp, $_POST['nombreInput'], $correo);
					$this->administracion_m->editaUEA($claveUEA, $_POST['ueaInput']);
					$this->administracion_m->editaGrupo($grupo, $_POST['grupoInput']);
					$this->administracion_m->editaSiglas($grupo, $_POST['siglasInput']);
					$idgrupo=$this->administracion_m->obtenIdGrupo($grupo);
					
					echo "<script languaje='javascript' type='text/javascript'>
							window.opener.location.reload();
			                window.close();</script>";
			                
				}else{
					$this->load->view('admin_edita_v',$datos);
				}	
			}
		} //Fin función
		
		function cambia_labo($grupo, $idlab){
			if(! $this->session->userdata('validated')){
				redirect('loguin_c');
			}else{
				$datos['laboratorios']=$this->administracion_m->obtenLaboratorios();
				
				if($_POST != NULL){ //Recibe la petición para cambiar de laboratorio
				
					$idgrupo=$this->administracion_m->obtenIdGrupo($grupo);
					print_r($idgrupo);
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
		}
		

	}
?>