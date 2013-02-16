<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class Inicio_admin_c extends CI_Controller {
		
		public function __construct(){
				
			parent::__construct();
			
			$this->load->helper(array('html', 'url'));
			$this->load->model('Inicio_m'); //Cargando mi modelo
			$this->check_isvalidated();
			
		
		}
	
		function index(){           //Cargamos vista
			
			$Data['datosCBI']=$this->Inicio_m->obtenListaUeasDiv(1);
			$Data['datosCBS']=$this->Inicio_m->obtenListaUeasDiv(2); 
			$Data['datosCSH']=$this->Inicio_m->obtenListaUeasDiv(3); 
			$Data['datosCompu']=$this->Inicio_m->obtenListaUeasDiv(4); 
			$Data['datosBio']=$this->Inicio_m->obtenListaUeasDiv(5); 
			$Data['datosElec']=$this->Inicio_m->obtenListaUeasDiv(6); 
			$Data['datosPCITI']=$this->Inicio_m->obtenListaUeasDiv(7);
			$Data['datosCC']=$this->Inicio_m->obtenListaUeasDiv(8);
			$Data['datosOtros']=$this->Inicio_m->obtenListaUeasDiv(9);
		
			for ($sem=1; $sem <= 13 ; $sem++) { 
				for ($dia=1; $dia <=5 ; $dia++) { 
					$Data['$DataU105_'.$sem.'_'.$dia]=$this->Inicio_m->ueas(105,$sem,$dia);
				}
			}
			 
			for ($sem=1; $sem <= 13 ; $sem++) { 
				for ($dia=1; $dia <=5 ; $dia++) { 
					$Data['$DataU106_'.$sem.'_'.$dia]=$this->Inicio_m->ueas(106,$sem,$dia);
				}

			}
				
			for ($sem=1; $sem <= 13 ; $sem++) { 
				for ($dia=1; $dia <=5 ; $dia++) { 
					$Data['$DataU219_'.$sem.'_'.$dia]=$this->Inicio_m->ueas(219,$sem,$dia);
				}
			}
			
			for ($sem=1; $sem <= 13 ; $sem++) { 
				for ($dia=1; $dia <=5 ; $dia++) { 
					$Data['$DataU220_'.$sem.'_'.$dia]=$this->Inicio_m->ueas(220,$sem,$dia);
				}
			}

			$DataHorarios['hora']=$this->Inicio_m->Obtenhorarios();

			$datos=Array(
				'DataHorarios' => $DataHorarios['hora'],
				'Data' => $Data
			);

			$this->load->view('inicio_admin_v');
			$this->load->view('tablaHorario_v', $datos);
			$this->load->view('listaUeas_v', $datos);
			$this->load->view('footer');
			
		}//Fin función index
		
		private function check_isvalidated(){
			if(! $this->session->userdata('validated')){
				redirect('loguin_c');
			}
		}
	
		public function do_logout(){
			$this->session->sess_destroy();
			redirect('inicio');
		}

		
		
	
	}//Fin de la clase
?>