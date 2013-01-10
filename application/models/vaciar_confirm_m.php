<?php if(! defined('BASEPATH')) exit ('No direct script acces allowed');

	class Vaciar_confirm_m extends CI_Model{
	
		function __construct(){
			parent::__construct();
			$this->load->database();
			$this->load->library('form_validation');
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>'); 
		}
			
		function obtenerIdGrupo($lab){
			$this->db->select('idgrupo');
			$this->db->from('laboratorios_grupo');
			$this->db->where('idlaboratorios',$lab);
			$this->db->where('idgrupo !=','NULL');
			
			$idGrupo=$this->db->get();

			if(($idGrupo->num_rows())>0){
				$indice=1;
				foreach ($idGrupo->result_array() as $value) {
					$idGr[$indice]= $value['idgrupo'];
					$indice++;
				}
				return ($idGr);
			}else{
				return -1;
			}//fin del else
		
		} //Fin de obtenerGrupo
		
		function vaciarLaboratorio($idlab){
			$datos= Array(
				'idgrupo'=>NULL,
			);			
			$this->db->where('idlaboratorios',$idlab);
			$this->db->where('idgrupo !=', 'NULL');
			
			$this->db->update('laboratorios_grupo', $datos); //Insertando NULL en la tabla de laboratorios_grupo
		}
	
	} //Fin de la clase
?>

 