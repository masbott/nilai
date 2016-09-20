<?php 

/**
* 
*/
class Pengguna extends CI_Controller
{
	
	function __construct()
	{
		# code...
		parent::__construct();
	}

	function index() {
		//get pengguna siswa
		$this->data['get_pengguna_siswa'] = $this->db->query('SELECT a.* , b.*
			                                                  FROM pengguna a 
			                                                  INNER JOIN siswa b ON a.id_siswa = b.id
			                                                  WHERE a.level_id="3"');
		//get pengguna guru
		$this->data['get_pengguna_guru'] = $this->db->query('SELECT a.* , b.*
			                                                 FROM pengguna a 
			                                                 INNER JOIN guru b ON a.id_guru = b.id
			                                                 WHERE a.level_id="2"');

		// echo '<pre>'; print_r( $this->data['get_pengguna_guru']->result() );exit();
		$get_data_guru = $this->db->get('guru');

		if( $get_data_guru->num_rows() > 0 ):
			foreach( $get_data_guru->result() as $g ):
				$guru[$g->id] = $g->id;
			endforeach;
		else :
			$guru = null;
		endif;
			// echo '<pre>'; print_r( $guru );exit();

		if ( $this->input->post('submit-guru') ) :
			$this->pengguna_guru();
		endif;

		$this->data['content'] = 'admin/pengguna/index';
		$this->load->view( 'main', $this->data );
	}

	function pengguna_guru() {
		$this->data['get_pengguna_guru'] = $this->db->get('guru');

		if( $this->data['get_pengguna_guru']->num_rows() > 0 ):
			foreach( $this->data['get_pengguna_guru']->result() as $d ):
				$guru[] = $d->id;
			endforeach;
		else :
			$guru = null;
		endif;

		$a = $guru;
		

		$c = array_map(array($this,'singkron_guru'), $a);
		$msg = '<div class="alert alert-success" role="alert" style="margin-top:10px;">Berhasil sinkronisasi data pengguna guru.</div>';
		$this->session->set_flashdata('sukses', $msg);
		redirect('admin/pengguna/index');
		// echo '<pre>'; print_r($c);
	}

	//sinkron data pengguna guru
	function singkron_guru($n) {
    	$get_data = $this->db->get_where('pengguna' , array('id_guru' => $n  , 'level_id' => 2));
    	if( $get_data->num_rows() > 0 ):
    		return $n . ' TRUE';
    	else :
    		$data['username'] = 'guru_'.$n;
    		$data['password'] = md5( 'guru_'.$n );
    		$data['id_guru'] = $n;
    		$data['level_id'] = '2';
    		$this->db->insert('pengguna', $data);
    		
    	endif;
	}

}

 ?>