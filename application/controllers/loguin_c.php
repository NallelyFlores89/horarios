<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	
	class Loguin_c extends CI_Controller{
    
	    function __construct(){
	        parent::__construct();
			
			$this->load->helper(array('html', 'url'));
	        $this->load->model('loguin_model'); 
			$this->load->library('session');
	   	}

    function index( $msg = NULL ){
 		$data['msg'] = $msg;
        $this->load->view('loguin_v', $data);
    }
	
	
	 function process(){
      
        $result = $this->loguin_model->validate();// Validando al usuario         
		
		if(! $result){ 
           	$msg = '<font class="error">Nombre de usuario y/o contraseña incorrectos</font><br />';
			$this->index($msg);
			
        }else{
            redirect('inicio_admin_c'); //Cargando página de administrador
        }        
    }

}
?>