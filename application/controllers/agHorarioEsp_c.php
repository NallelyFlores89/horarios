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
				$this->form_validation->set_rules('ueaInput', 'ueaInput', 'callback_ueaInput_check');
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
							$horaI=1;
							break;
						case '8.5':
							$horaI=2;
							break;					
						case '9':
							$horaI=3;
							break;
						case '9.5':
							$horaI=4;
							break;
						case '10':
							$horaI=5;
							break;
						case '10.5':
							$horaI=6;
							break;						
						case '11':
							$horaI=7;
							break;
						case '11.5':
							$horaI=8;
							break;
						case '12':
							$horaI=9;
							break;												
						case '12.5':
							$horaI=10;
							break;
						case '13':
							$horaI=11;
							break;
						case '13.5':
							$horaI=12;
							break;
						case '14':
							$horaI=13;
							break;
						case '14.5':
							$horaI=14;
							break;
						case '15':
							$horaI=15;
							break;
						case '15.5':
							$horaI=16;
							break;
						case '16':
							$horaI=17;
							break;
						case '16.5':
							$horaI=18;
							break;
						case '17':
							$horaI=19;
							break;																																																													
						case '17.5':
							$horaI=20;
							break;
						case '18':
							$horaI=21;
							break;
						case '18.5':
							$horaI=22;
							break;
						case '19':
							$horaI=23;
							break;
						case '19.5':
							$horaI=24;
							break;
						case '20':
							$horaI=25;
							break;
						case '20.5':
							$horaI=26;
							break;																																										
					}
	
					//OBTENIENDO ID DE HORARIO FINAL	
					switch ($_POST['HoraFDropdown']) {
						case '8':
							$horaF=1;
							break;
						case '8.5':
							$horaF=2;
							break;					
						case '9':
							$horaF=3;
							break;
						case '9.5':
							$horaF=4;
							break;
						case '10':
							$horaF=5;
							break;
						case '10.5':
							$horaF=6;
							break;						
						case '11':
							$horaF=7;
							break;
						case '11.5':
							$horaF=8;
							break;
						case '12':
							$horaF=9;
							break;												
						case '12.5':
							$horaF=10;
							break;
						case '13':
							$horaF=11;
							break;
						case '13.5':
							$horaF=12;
							break;
						case '14':
							$horaF=13;
							break;
						case '14.5':
							$horaF=14;
							break;
						case '15':
							$horaF=15;
							break;
						case '15.5':
							$horaF=16;
							break;
						case '16':
							$horaF=17;
							break;
						case '16.5':
							$horaF=18;
							break;
						case '17':
							$horaF=19;
							break;																																																													
						case '17.5':
							$horaF=20;
							break;
						case '18':
							$horaF=21;
							break;
						case '18.5':
							$horaF=22;
							break;
						case '19':
							$horaF=23;
							break;
						case '19.5':
							$horaF=24;
							break;
						case '20':
							$horaF=25;
							break;
						case '20.5':
							$horaF=26;
							break;
						case '21':
							$horaF=27;
							break;																																								
					}
					
					//OPERACIONES SEMANA
			
					$idSemI=$_POST['SemIDropdown'];
					$idSemF=$_POST['SemFDropdown'];
	
					//INSERTANDO EN LABORATORIO_GRUPO				
					for ($j=$idSemI; $j <=$idSemF; $j++) { //Semanas
						if($horaF==27){
							for ($i=$horaI; $i <=26; $i++) {  //horas
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
							
						}else{ 
							for ($i=$horaI; $i <$horaF; $i++) {  //horas
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
	
			public function siglasInput_check($siglasInput){
					if($siglasInput==''){
							$this->form_validation->set_message('siglasInput_check','Campo obligatorio');
							return FALSE;
						
					}else{
							return TRUE;
					}
			}

	
	}//Fin de la clase
	
?>