<?php 

/**
* 
*/
class Home extends CI_Controller
{
	
	function __construct()
	{
		# code...

		parent:: __construct();
		$this->load->library('session');
		if( $this->session->userdata('login') != TRUE ):
			redirect('login');
		endif;
		// $this->load->helper('nilai');
	}

	function index() {
		$this->data['content'] = 'guru/home/index';
		$this->load->view( 'main' , $this->data );
	}
}

 ?>