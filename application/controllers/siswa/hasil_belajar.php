<?php 

/**
* 
*/
class Hasil_belajar extends CI_Controller
{
	
	function __construct() {
		# code...
		parent::__construct();
		$this->load->library('session');
		$this->load->library('fpdf');
		if( $this->session->userdata('login') != TRUE ):
			redirect('login');
		endif;
	}

	function index() {
		$this->load->library( 'session' );
		$get_id_siswa = $this->session->userdata('id_siswa');
			$this->data['get_data'] = null;

		if( $this->input->post('submit') ):
			// print_r( $this->input->post() );exit();
			$this->data['get_data'] = $this->db->query('SELECT a.* , b.*
			                                        FROM nilai a
			                                        INNER JOIN mapel b ON a.id_mapel = b.id
			                                        WHERE a.id_siswa="'.$get_id_siswa.'" AND a.id_semester="'.$_POST['semester'].'" AND a.id_kelas="'.$_POST['kelas'].'"');
		else :
			$this->data['get_data']	 = null;
		endif;

		if( $this->input->post('cetak') ):
			$get_semester = $this->db->get_where('semester' , array('id' => $_POST['semester']));
			$result_getone_semester = $get_semester->row()->nama_semester . ' ' . $get_semester->row()->tahun;
			$data['hae_semester'] = isset( $result_getone_semester ) ? $result_getone_semester : null;
			// print_r( $data['hae_semester'] );exit();
			$data['get_data_cetak'] = $this->db->query('SELECT a.* , b.*
			                                        FROM nilai a
			                                        INNER JOIN mapel b ON a.id_mapel = b.id
			                                        WHERE a.id_siswa="'.$get_id_siswa.'" AND a.id_semester="'.$_POST['semester'].'" AND a.id_kelas="'.$_POST['kelas'].'"');
		// $data['content'] = 'siswa/hasil_belajar/cetak';
		return $this->load->view( 'siswa/hasil_belajar/cetak', $data );
		endif;
		
		// print_r( $this->data['get_data'] );exit();
		$this->data['kelas'] = $this->db->get('kelas');
		$this->data['semester'] = $this->db->get('semester');
		$this->data['content'] = 'siswa/hasil_belajar/index';
		$this->load->view( 'main', $this->data );
	}


}

 ?>