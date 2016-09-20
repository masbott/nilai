<?php 

/**
* 
*/
class Home extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		# code...
	}

	function index() {
		$this->data['content'] = 'wali_kelas/home/index';
		$this->load->view( 'main' , $this->data );
	}
}

 ?>