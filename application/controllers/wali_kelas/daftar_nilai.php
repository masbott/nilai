<?php 

/**
* 
*/
class Daftar_nilai extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		# code...
	}

	function index() {
		$this->load->library('session');
		$get = $this->session->userdata('id_guru');
		$get_result = isset( $get ) ? $get : null;
		// print_r( $get );exit();
		$kelas = $this->db->get_where( 'kelas' , array('wali_kelas' => $get_result ) );
		$get_one_kelas = isset( $kelas ) ? $kelas->row()->id : null;
		$this->data['kelas'] = isset( $kelas ) ? $kelas->row()->nama_kelas : null;
		$this->data['mapel'] = $this->db->get( 'mapel' );
		$this->data['semester'] = $this->db->get( 'semester' );
		if( $this->input->post('submit') ):
		$this->data['get_data'] = $this->db->query('SELECT a.* , b.* , c.id as id_mapel , d.id as id_semester
													FROM `nilai` a
													INNER JOIN siswa b ON a.id_siswa = b.id
													INNER JOIN mapel c ON a.id_mapel = c.id
													INNER JOIN semester d ON a.id_semester = d.id
													WHERE a.id_kelas="'.$get_one_kelas.'" AND id_mapel="'.$this->input->post('mapel').'" AND id_semester="'.$this->input->post('semester').'"');
		else : 
			$this->data['get_data'] = null;
		endif;
		$this->data['content'] = 'wali_kelas/daftar_nilai/index';
		$this->load->view( 'main', $this->data );
	}
}

 ?>