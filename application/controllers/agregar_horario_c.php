<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Agregar_horario_c extends CI_Controller {
		
		public function __construct(){
				
			parent::__construct();
			
			$this->load->helper(array('html', 'url'));
			$this->load->model('Solicitar_laboratorio_m'); //Cargando mi modelo
			$this->load->model('Agregar_horario_m'); //Cargando mi modelo
						
			$this->load->library('form_validation');
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		}
		
		function index()	{           //Cargamos vista
			
			if(! $this->session->userdata('validated')){
				redirect('loguin_c');
			}else{
				$GrupoExiste=0;
				
				$DataDivision['datosDivision']=$this->Solicitar_laboratorio_m->ObtenListaDivisiones(); 
		
				if($DataDivision['datosDivision'] > 0){
					foreach ($DataDivision['datosDivision'] as $indice => $division) {
						$divisiones['divisiones'][$indice]=$division;
					}
				}else{
					$mensaje='No hay datos';
					$divisiones['divisiones'][1]=$mensaje;
				}		
				
				$DataLabos=$this->Agregar_horario_m->obtenLaboratorios();
				$DataHorarios['hora']=$this->Solicitar_laboratorio_m->Obtenhorarios();
				$DataSem=$this->Agregar_horario_m->obtenerSemana();
				
				/**Validación del formulario**/		
					
				$this->form_validation->set_rules('nombreInput', 'nombreInput', 'callback_nombreInput_check');
				$this->form_validation->set_rules('numInput', 'numInput', 'callback_numInput_check');
				$this->form_validation->set_rules('ueaInput', 'ueaInput', 'callback_ueaInput_check');
				$this->form_validation->set_rules('correoInput', 'correoInput', 'email_valid');
				$this->form_validation->set_rules('claveInput', 'claveInput', 'callback_claveInput_check');
				$this->form_validation->set_rules('grupoInput', 'grupoInput', 'callback_grupoInput_check');
				$this->form_validation->set_rules('siglasInput', 'siglasInput', 'callback_siglasInput_check');
				$this->form_validation->set_rules('checkboxes[]', 'checkboxes', 'required');
				$this->form_validation->set_message('required','Debe seleccionar al menos un día');
				
				$datos=Array(  //Enviando datos a la vista
						'listaDivisiones' => $divisiones,
						'DataLabos' => $DataLabos,
						'DataSem' => $DataSem,
						'DataHorarios' => $DataHorarios['hora'],
						'GrupoExiste' => $GrupoExiste,
				);
			
				if($this->form_validation->run()){

					//INSERTANDO DATOS EN BD
					
					$idProf=$this->Agregar_horario_m->obtenerIdProfesor($_POST['numInput']); //Profesor
					
					if($idProf==-1){ //Si no existe el profesor en la base de datos, lo inserta
						$this->Agregar_horario_m->inserta_profesores($_POST['nombreInput'], $_POST['numInput'], $_POST['correoInput']);
					}
	
					$idProf=$this->Agregar_horario_m->obtenerIdProfesor($_POST['numInput']); //Obteniendo id del profesor
				
					$id_lab = $_POST['laboratoriosDropdown'];
					
					$iduea=$this->Agregar_horario_m->obtenerIdUea($_POST['claveInput']);
					
					if($iduea==-1){ //Si la UEA no existe, la insertará
						$this->Agregar_horario_m->inserta_uea($_POST['ueaInput'], $_POST['claveInput'], $_POST['divisionesDropdown']);
					}
					
					$iduea=$this->Agregar_horario_m->obtenerIdUea($_POST['claveInput']); //id definitivo de UEA a manejar
									
					$idGrupo=$this->Agregar_horario_m->obtenerIdGrupo($_POST['grupoInput']);
					
					if($idGrupo==-1){
						$this->Agregar_horario_m->inserta_grupo($_POST['grupoInput'], $_POST['siglasInput'], $iduea, $idProf);
					}else{
						$GrupoExiste=1;		
					}
																		
					$idGrupo=$this->Agregar_horario_m->obtenerIdGrupo($_POST['grupoInput']); //Id definitivo del grupo a manejar
									
					//OBTENIENDO ID DE HORARIO INICIAL
					switch ($_POST['HoraIDropdown']) {
						case '8':
							$horaI='08:00';
							break;
						case '8.5':
							$horaI='08:30';
							break;					
						case '9':
							$horaI='09:00';
							break;
						case '9.5':
							$horaI='09:30';
							break;
						case '10':
							$horaI='10:00';
							break;
						case '10.5':
							$horaI='10:30';
							break;						
						case '11':
							$horaI='11:00';
							break;
						case '11.5':
							$horaI='11:30';
							break;
						case '12':
							$horaI='12:00';
							break;												
						case '12.5':
							$horaI='12:30';
							break;
						case '13':
							$horaI='13:00';
							break;
						case '13.5':
							$horaI='13:30';
							break;
						case '14':
							$horaI='14:00';
							break;
						case '14.5':
							$horaI='14:30';
							break;
						case '15':
							$horaI='15:00';
							break;
						case '15.5':
							$horaI='15:30';
							break;
						case '16':
							$horaI='16:00';
							break;
						case '16.5':
							$horaI='16:30';
							break;
						case '17':
							$horaI='17:00';
							break;																																																													
						case '17.5':
							$horaI='17:30';
							break;
						case '18':
							$horaI='18:00';
							break;
						case '18.5':
							$horaI='18:30';
							break;
						case '19':
							$horaI='19:00';
							break;
						case '19.5':
							$horaI='19:30';
							break;
						case '20':
							$horaI='20:00';
							break;
						case '20.5':
							$horaI='20:30';
							break;		
						case '21':
							$horaI='21:00';
							break;																																								
					}
	
	
					switch ($_POST['HoraFDropdown']) {
						case '8':
							$horaF='08:00';
							break;
						case '8.5':
							$horaF='08:30';
							break;					
						case '9':
							$horaF='09:00';
							break;
						case '9.5':
							$horaF='09:30';
							break;
						case '10':
							$horaF='10:00';
							break;
						case '10.5':
							$horaF='10:30';
							break;						
						case '11':
							$horaF='11:00';
							break;
						case '11.5':
							$horaF='11:30';
							break;
						case '12':
							$horaF='12:00';
							break;												
						case '12.5':
							$horaF='12:30';
							break;
						case '13':
							$horaF='13:00';
							break;
						case '13.5':
							$horaF='13:30';
							break;
						case '14':
							$horaF='14:00';
							break;
						case '14.5':
							$horaF='14:30';
							break;
						case '15':
							$horaF='15:00';
							break;
						case '15.5':
							$horaF='15:30';
							break;
						case '16':
							$horaF='16:00';
							break;
						case '16.5':
							$horaF='16:30';
							break;
						case '17':
							$horaF='17:00';
							break;																																																													
						case '17.5':
							$horaF='17:30';
							break;
						case '18':
							$horaF='18:00';
							break;
						case '18.5':
							$horaF='18:30';
							break;
						case '19':
							$horaF='19:00';
							break;
						case '19.5':
							$horaF='19:30';
							break;
						case '20':
							$horaF='20:00';
							break;
						case '20.5':
							$horaF='20:30';
							break;		
						case '21':
							$horaF='21:00';
							break;																																								
					}
	
	
					//OPERACIONES DE HORA
					
					$idHoraI=$this->Agregar_horario_m->obtenerIdHora($horaI);
					$idHoraF=$this->Agregar_horario_m->obtenerIdHora($horaF);
					
					//OPERACIONES SEMANA
					
					$idSemI=$_POST['SemIDropdown'];
					$idSemF=$_POST['SemFDropdown'];
	
					//INSERTANDO EN LABORATORIO_GRUPO				
					for ($j=$idSemI; $j <=$idSemF; $j++) { //Semanas 
						for ($i=$idHoraI; $i <=$idHoraF; $i++) {  //horas
							foreach ($_POST['checkboxes'] as $dias) { //días
								$datos_laboratorios_grupoT= Array(
									'idgrupo'=>$idGrupo,
								);
								$this->db->where('idlaboratorios',$id_lab);
								$this->db->where('semanas_idsemanas', $j);
								$this->db->where('dias_iddias', $dias);
								$this->db->where('horarios_idhorarios', $i);
								$this->db->update('laboratorios_grupo', $datos_laboratorios_grupoT); //Insertando en la tabla de laboratorios_grupo
							}
						}
					}
					
					echo "<script languaje='javascript' type='text/javascript'>
						    window.opener.location.reload();
						    alert('Horario agregado');
							window.opener.location.reload();
			                window.close();</script>";
					}else{
						$this->load->view('agregar_horario_v', $datos);
					} //Validation run
				} //Login
			} //Fin de index
			
			public function nombreInput_check($nombreInput){
					if($nombreInput==''){
							$this->form_validation->set_message('nombreInput_check','Campo obligatorio. Por favor, introduce nombre');
							return FALSE;
						
					}else{
							return TRUE;
					}
			}
	
			public function ueaInput_check($ueaInput){
					if($ueaInput==''){
							$this->form_validation->set_message('ueaInput_check','Campo obligatorio');
							return FALSE;
						
					}else{
							return TRUE;
					}
			}
	
			public function grupoInput_check($grupoInput){
					if($grupoInput==''){
							$this->form_validation->set_message('grupoInput_check','Campo obligatorio');
							return FALSE;
						
					}else{
							return TRUE;
					}
			}
			
			public function siglasInput_check($siglasInput){
					if($siglasInput==''){
							$this->form_validation->set_message('siglasInput_check','Campo obligatorio');
							return FALSE;
						
					}else{
							return TRUE;
					}
			}
			
			public function numInput_check($numInput){
					if($numInput==''){
							$this->form_validation->set_message('numInput_check','Campo obligatorio');
							return FALSE;
						
					}else{
							return TRUE;
					}
			}
	
			public function claveInput_check($claveInput){
					if($claveInput==''){
							$this->form_validation->set_message('claveInput_check','Campo obligatorio');
							return FALSE;
						
					}else{
							return TRUE;
					}
			}
	
	}//Fin de la clase
	
?>