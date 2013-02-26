<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Agregar_horario_c extends CI_Controller {
		
		public function __construct(){
				
			parent::__construct();
			
			$this->load->helper(array('html', 'url'));
			$this->load->model('Solicitar_laboratorio_m'); 
			$this->load->model('Agregar_horario_m');
			$this->load->model('profesores_m'); 
									
			$this->load->library('form_validation');
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		}
		
		function index(){         //Cargamos vista
			
			if(! $this->session->userdata('validated')){
				redirect('loguin_c/index2/NULL/5');
			}else{
				$GrupoExiste=0;
				
				$DataDivision['datosDivision']=$this->Solicitar_laboratorio_m->ObtenListaDivisiones(); 
				$dias=$this->Solicitar_laboratorio_m->ObtenDias();
		
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
				$this->form_validation->set_rules('correoInput', 'claveInput', '');					
				$this->form_validation->set_rules('numInput', 'claveInput', '');					
				$this->form_validation->set_rules('claveInput', 'claveInput', '');	
				$this->form_validation->set_rules('grupoInput', 'claveInput', '');	
				$this->form_validation->set_rules('HoraIDropdown', 'HoraIDropdown', '');	
				$this->form_validation->set_rules('HoraFDropdown', 'HoraFDropdown', '');	
				$this->form_validation->set_rules('divisionesDropdown', 'divisionesDropdown', '');	
				$this->form_validation->set_rules('laboratoriosDropdown', 'laboratoriosDropdown', '');	

								
				$this->form_validation->set_rules('nombreInput', 'nombreInput', 'required');
				$this->form_validation->set_rules('ueaInput', 'ueaInput', 'required');
				$this->form_validation->set_rules('siglasInput', 'siglasInput', 'required');
				$this->form_validation->set_rules('checkboxes[]', 'checkboxes', 'required');
				
				$this->form_validation->set_message('required','Debe seleccionar al menos un día');
						
				$datos=Array(  //Enviando datos a la vista
						'listaDivisiones' => $divisiones,
						'DataLabos' => $DataLabos,
						'DataSem' => $DataSem,
						'DataHorarios' => $DataHorarios['hora'],
						'GrupoExiste' => $GrupoExiste,
						'dias' => $dias
				);
	
				if($this->form_validation->run()){

					//INSERTANDO DATOS EN BD

					$idProf=$this->Agregar_horario_m->obtenerIdProfesor($_POST['nombreInput']); //Profesor
					
					if($idProf==-1){ //Si no existe el profesor en la base de datos, lo inserta
						$this->Agregar_horario_m->inserta_profesores($_POST['nombreInput'], $_POST['numInput'], $_POST['correoInput']);
					}
	
					$idProf=$this->Agregar_horario_m->obtenerIdProfesor($_POST['nombreInput']); //Obteniendo id del profesor
				
					$id_lab = $_POST['laboratoriosDropdown'];
					
					$iduea=$this->Agregar_horario_m->obtenerIdUea($_POST['ueaInput']);
					
					if($iduea==-1){ //Si la UEA no existe, la insertará
						$this->Agregar_horario_m->inserta_uea($_POST['ueaInput'], $_POST['claveInput'], $_POST['divisionesDropdown']);
					}
					
					$iduea=$this->Agregar_horario_m->obtenerIdUea($_POST['ueaInput']); //id definitivo de UEA a manejar
									
					$idGrupo=$this->Agregar_horario_m->obtenerIdGrupo($_POST['siglasInput']);
					
					if($idGrupo==-1){
						$this->Agregar_horario_m->inserta_grupo($_POST['grupoInput'], $_POST['siglasInput'], $iduea, $idProf);
					}else{
						$GrupoExiste=1;		
					}
					$horaI = $_POST['HoraIDropdown'];
					$horaF = $_POST['HoraFDropdown'];						
					$idGrupo=$this->Agregar_horario_m->obtenerIdGrupo($_POST['siglasInput']); //Id definitivo del grupo a manejar
													
					//INSERTANDO EN LABORATORIO_GRUPO				
					for ($j=1; $j <=13; $j++) { //Semanas
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
							$this->load->view('header');
							$this->load->view('script');
							$this->load->view('agregarHorarioForm', $datos);
							$this->load->view('agregar_horario_v', $datos);
						
					} //Validation run
				} //Login
			} //Fin de index
			
			function propon_profesor(){
				$term = $this->input->post('term',TRUE);
				$rows = $this->Agregar_horario_m->propon_profesor(array('keyword' => $term));
				$json_array = array();
				
				foreach ($rows as $row){
					 $json_array[$row->idprofesores]=$row->nombre;
				}			
				echo json_encode($json_array);
			}	
			
			function propon_uea(){
				$term = $this->input->post('term',TRUE);
				$rows = $this->Agregar_horario_m->propon_uea(array('keyword' => $term));
			
				$json_array = array();
				foreach ($rows as $row){
					 array_push($json_array, $row->nombreuea);
				}
			
				echo json_encode($json_array);
			}

			function busca_id_prof(){
				$term = $this->input->post('term2',TRUE);
				$rows = $this->Agregar_horario_m->busca_id_profesor(array('keyword' => $term));
				$json_array = array();
				
				foreach ($rows as $row){
					array_push($json_array, $row->idprofesores);				
				}			
				echo json_encode($json_array);
			}
			
			function busca_num_empleado(){
				$term = $this->input->post('term3',TRUE);
				$rows = $this->Agregar_horario_m->busca_num_empleado(array('keyword' => $term));
				$json_array = array();

				if($rows != -1){
					foreach ($rows as $row){
						array_push($json_array, $row->numempleado);
					}			
					echo json_encode($json_array);
				}else{
					echo json_encode("No número");
				}
			}
			
			function busca_correo_empleado(){
				$term = $this->input->post('term4',TRUE);
				$rows = $this->Agregar_horario_m->busca_correo_empleado(array('keyword' => $term));
				$json_array = array();

				if($rows != -1){
					foreach ($rows as $row){
						array_push($json_array, $row->correo);
					}			
					echo json_encode($json_array);
				}else{
					echo json_encode("No correo");
				}
			}

			function busca_id_uea(){
				$term = $this->input->post('termUea',TRUE);
				$rows = $this->Agregar_horario_m->busca_id_uea(array('keyword' => $term));
				$json_array = array();
				
				foreach ($rows as $row){
					array_push($json_array, $row->iduea);				
				}			
				echo json_encode($json_array);
			}

			function busca_clave(){
				$term = $this->input->post('idUea',TRUE);
				$rows = $this->Agregar_horario_m->busca_clave(array('keyword' => $term));
				$json_array = array();

				if($rows != -1){
					foreach ($rows as $row){
						array_push($json_array, $row->clave);
					}			
					echo json_encode($json_array);
				}else{
					echo json_encode(-1);
				}
			}
			
			function busca_division(){
				$term = $this->input->post('idUea',TRUE);
				$rows = $this->Agregar_horario_m->busca_division(array('keyword' => $term));
				$json_array = array();

				if($rows != -1){
					foreach ($rows as $row){
						array_push($json_array, $row->divisiones_iddivisiones);
					}			
					echo json_encode($json_array);
				}else{
					echo json_encode(-1);
				}				
				
			}
																

	
	}//Fin de la clase
	
?>