<?php if(! defined('BASEPATH')) exit ('No direct script acces allowed');

	class Inicio_m extends CI_Model{
	
		function __construct(){
			parent::__construct();
			$this->load->database();
		
		}
			
		function obtenListaUeasDiv($idDivision){
			$this->db->select('nombreuea, grupo.siglas, nombredivision');
			$this->db->from('uea');
			$this->db->join('divisiones', 'uea.divisiones_iddivisiones=divisiones.iddivisiones');
			$this->db->join('grupo', 'uea.iduea=grupo.uea_iduea');
			$this->db->where('uea.divisiones_iddivisiones',$idDivision);

			$listaUeasCBS=$this->db->get(); //Vacía el contenido de la consulta en la variable
			
			if(($listaUeasCBS->num_rows())>0){
				$indice=1;
				foreach ($listaUeasCBS->result_array() as $value) {
					$arregloUeasCBS[$indice] = $value;
					$indice=$indice+1;
				}
				
				//print_r($arregloUeas);
				return ($arregloUeasCBS);
			}else{
				$mensaje_error="No hay datos que cargar";
				return (-1);
			}//fin del else
		}//Fin de obtenListaUeasCBS
				
		function obtenListaUeaProfesorGrupo(){
			$this->db->select('uea.nombreuea, grupo.siglas, grupo.grupo, profesores.nombre, idlaboratorios');
			$this->db->from('grupo');
			$this->db->join('profesores', 'grupo.profesores_idprofesores=profesores.idprofesores');
			$this->db->join('uea','grupo.uea_iduea=uea.iduea');
			$this->db->join('laboratorios_grupo','grupo.idgrupo=laboratorios_grupo.idgrupo');
			$this->db->distinct(); //Para que no se repitan los datos
			

			$listaUeaProfesorGrupo=$this->db->get(); //Vacía el contenido de la consulta en la variable
			
			if(($listaUeaProfesorGrupo->num_rows())>0){
				$indice=1;
				
				foreach ($listaUeaProfesorGrupo->result_array() as $value) {
					$arregloUPG[$indice] = $value;
					$indice=$indice+1;
				}
				return ($arregloUPG);
			}else{
				return -1;
			}//fin del else
			
		} //fin obtenListaUeaProfesorGrupo

		
		function ueas($labo,$sem, $dia){
			$this->db->select('idgrupo');
			$this->db->from('laboratorios_grupo');
			$this->db->where('idlaboratorios',$labo);
			$this->db->where('semanas_idsemanas', $sem);			
			$this->db->where('dias_iddias',$dia);			
			$this->db->order_by('horarios_idhorarios', "asc"); 
			
			$ueaL=$this->db->get();
			
			if(($ueaL->num_rows())>0){
				$indice2=1;
				foreach ($ueaL->result_array() as $value) {
					$this->db->select('siglas,uea_iduea');
					$this->db->from('grupo');
					$this->db->where('idgrupo', $value['idgrupo']);
					
					$ueas=$this->db->get();
					
					if($ueas->num_rows()>0){
						foreach ($ueas->result_array() as $value2) {
							$siglasGrupos[$indice2]=$value2['siglas'];
							$idsueas[$indice2]=$value2['uea_iduea'];
						}
					}
					else{
						$siglasGrupos[$indice2]='';
						$idsueas[$indice2]='-1';
						
					}
					$indice2++;
				}
				
				$indice=1;
				foreach ($idsueas as $iduea) { //Obteniendo a qué división pertenece cada grupo
					$this->db->select('divisiones_iddivisiones');
					$this->db->where('iduea', $iduea);
					
					$div = $this->db->get('uea');
					
					if($div->num_rows()>0){
						foreach ($div->result_array() as $valor) {
							if($valor['divisiones_iddivisiones']==1){
								$divisiones[$indice]='CBI';
							}
							if($valor['divisiones_iddivisiones']==2){
								$divisiones[$indice]='CBS';
							}
							if($valor['divisiones_iddivisiones']==3){
								$divisiones[$indice]='CSH';
							}														
						}
					}
					else{
						$divisiones[$indice]='';
						
					}
					$indice++;					
				}
				$datos['divisionesGrupo'] = $divisiones;
				$datos['siglasGrupos'] = $siglasGrupos;
				return ($datos);
			 }else{
			 	return 'No hay datos';
			}//fin del else
		
		} //fin ueas
		
				
		function Obtenhorarios(){
			$this->db->select('hora');
			$this->db->from('horarios');
			
			$lHorarios=$this->db->get();

			if(($lHorarios->num_rows())>0){
				$indice=1;
				foreach ($lHorarios->result_array() as $value) {
					$arregloHorarios[$indice] = $value['hora'];
					$indice++;
				}
				return ($arregloHorarios);
			}else{
				return 0;
			}//fin del else
			
		} //fin Obtenhorarios
						
	} //Fin de la clase

?>


		

 