<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Solicitar_labo_c extends CI_Controller {
		
		public function __construct(){
				
			parent::__construct();
			
			$this->load->helper(array('html', 'url'));
			$this->load->model('Solicitar_laboratorio_m'); 
			
			$this->load->library('form_validation');
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			$this->load->library('email');
		}
		
		function index()	{           
			$DataDivision['datosDivision']=$this->Solicitar_laboratorio_m->ObtenListaDivisiones(); //Obteniendo mis datos
	
			if($DataDivision['datosDivision'] > 0){
				foreach ($DataDivision['datosDivision'] as $indice => $division) {
					$divisiones['divisiones'][$indice]=$division;
				}
			}else{
				$mensaje='No hay datos';
				$divisiones['divisiones'][1]=$mensaje;
			}		
			 
			$DataHorarios['hora']=$this->Solicitar_laboratorio_m->Obtenhorarios();
			$DataSem=$this->Solicitar_laboratorio_m->obtenerSemana();
			$DataLabos=$this->Solicitar_laboratorio_m->obtenLaboratorios();
			
			$datos=Array(
					'listaDivisiones' => $divisiones,
					'DataLabos' => $DataLabos,
					'DataHorarios' => $DataHorarios['hora'],
					'DataSem' => $DataSem
					

			);

			/**Validación del formulario**/			
			$this->form_validation->set_rules('nombreInput', 'nombreInput', 'callback_nombreInput_check');
			$this->form_validation->set_rules('numInput', 'numInput', 'callback_numInput_check');
			$this->form_validation->set_rules('correoInput', 'correoInput', 'callback_correoInput_check');
			$this->form_validation->set_rules('ueaInput', 'ueaInput', 'callback_ueaInput_check');
			$this->form_validation->set_rules('claveInput', 'claveInput', 'callback_claveInput_check');
			$this->form_validation->set_rules('grupoInput', 'grupoInput', 'callback_grupoInput_check');
			$this->form_validation->set_rules('checkboxes[]', 'checkboxes', 'required');
			$this->form_validation->set_message('required','Debe seleccionar al menos un día');
			
			if($this->form_validation->run()){
				$datos_correo=Array(
					'nombre' => $_POST['nombreInput'],
					'numero' => $_POST['numInput'],
					'correo' => $_POST['correoInput'],
					'uea' =>$_POST['ueaInput'],
					'clave' => $_POST['claveInput'],
					'grupo' =>$_POST['grupoInput'],
					'division' => $_POST['divisionesDropdown'],
					'laboratorio' => $_POST['laboratoriosDropdown'],
					'laboratorioAlt' => $_POST['laboratoriosAltDropdown'],
					'hora_i' => $_POST['HoraIDropdown'],
					'hora_f' => $_POST['HoraFDropdown'],
					'recursos' => $_POST['recursos'],
					'dias' => $_POST['checkboxes'],
					'semI' => $_POST['SemIDropdown'],
					'semF' => $_POST['SemFDropdown'],
 					'comentarios' => $_POST['comentarios']
				
				);
						
				//Comprobando si el horario no está ocupado

				$idHoraI=$this->Solicitar_laboratorio_m->obtenerIdHora($_POST['HoraIDropdown']);
				$idHoraF=$this->Solicitar_laboratorio_m->obtenerIdHora($_POST['HoraFDropdown']);
				
				$indice=1;
				
				for ($j=$_POST['SemIDropdown']; $j <=$_POST['SemFDropdown']; $j++) { //Semanas 
					for ($i=$idHoraI; $i <=$idHoraF; $i++) {  //horas
						foreach ($_POST['checkboxes'] as $dias) { //días
							$ocupado[$indice] = $this->Solicitar_laboratorio_m->horarioOcupado($_POST['laboratoriosDropdown'], $j, $dias, $i);
							$indice++;
						}
					}
				}
				$no_disponible = array_unique($ocupado);
				if(sizeof($no_disponible)==1 AND ($no_disponible[1] == NULL || $no_disponible[1]==-1)){ //En caso de que los horarios estén disponibles, envía la solicitud
					
					$config['mailtype']='html';
	 				$this->email->initialize($config);
					$this->email->from('nallely.ag.sama@gmail.com', 'Laboratorios de Docencia CBI'); //Cambiar aquí por la dirección de correo electrónico de administración
					$this->email->to('naye_flo89@hotmail.com'); //Cambiar aquí por la dirección del correo del administrador
					$this->email->subject('Solicitud de laboratorio');
					$msj=$this->load->view('correo_v',$datos_correo,TRUE);			
					$this->email->message($msj);				
					$this->email->send();	
					// echo $this->email->print_debugger();
					echo "<script languaje='javascript' type='text/javascript'>
				    alert('Solicitud enviada. Por favor, espere aprovación');
	                window.close();</script>";
				
				}else{ //En otro caso, le indica al usuario que el horario no está disponible
					
					$this->load->view('solicitar_lab_v', $datos);
					echo "<label class='error'>Lo sentimos. El laboratorio que usted está solicitando, no está disponible
				    en este horario</label>";	
				}
					
							
				
				
				
			}
			else{
				$this->load->view('solicitar_lab_v', $datos);
				$this->load->view('footer');
			}
			

		} //Fin de index
		
				
		
		public function nombreInput_check($nombreInput){
				if($nombreInput==''){
						$this->form_validation->set_message('nombreInput_check','Campo obligatorio. Por favor, introduce nombre');
						return FALSE;
					
				}else
						return TRUE;
		}
		
		public function correoInput_check($correoInput){
				if($correoInput==''){
						$this->form_validation->set_message('correoInput_check','Campo de correo obligatorio');
						return FALSE;
					
				}else
						return TRUE;
		}

		public function ueaInput_check($ueaInput){
				if($ueaInput==''){
						$this->form_validation->set_message('ueaInput_check','Campo obligatorio');
						return FALSE;
					
				}else
						return TRUE;
		}
		
		public function claveInput_check($ueaInput){
				if($ueaInput==''){
						$this->form_validation->set_message('claveInput_check','Campo obligatorio');
						return FALSE;
					
				}else
						return TRUE;
		}
		
		public function grupoInput_check($grupoInput){
				if($grupoInput==''){
						$this->form_validation->set_message('grupoInput_check','Campo obligatorio');
						return FALSE;
					
				}else
						return TRUE;
		}

		public function numInput_check($numInput){
				if($numInput==''){
						$this->form_validation->set_message('numInput_check','Campo obligatorio');
						return FALSE;
					
				}else
						return TRUE;
		}
	
	}//Fin de la clase
?>