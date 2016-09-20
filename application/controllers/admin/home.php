<?php 

/**
* 
*/
class Home extends CI_Controller
{
	
	function __construct()
	{
		parent:: __construct();
		$this->load->library('session');
		if( $this->session->userdata('login') != TRUE ):
			redirect('login');
		endif;
	}

	function index(){
		$data['content'] = 'admin/home/index';
		$this->load->view('main', $data );
	}
}

 ?>