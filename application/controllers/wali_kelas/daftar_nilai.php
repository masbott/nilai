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
		
		$kelas = $this->db->get_where( 'kelas' , array('wali_kelas' => $get_result ) );
		$get_one_kelas = isset( $kelas ) ? $kelas->row()->id : null;
		$this->data['kelas'] = isset( $kelas ) ? $kelas->row()->nama_kelas : null;
		$this->data['mapel'] = $this->db->get( 'mapel' );
		$this->data['semester'] = $this->db->get( 'semester' );
		// $this->data['get_data'] = 0;
		if( $this->input->post('submit') ):
		// echo '<pre>'; print_r( $_POST );exit();
		$get = $this->db->query('SELECT a.* , b.nama_mapel, c.nama_semester, c.tahun, d.nama_siswa
													FROM `nilai` a
													INNER JOIN mapel b ON a.id_mapel = b.id
													INNER JOIN semester c ON a.id_semester = c.id
													inner join siswa d ON a.id_siswa = d.id
													WHERE a.id_kelas="'.$get_one_kelas.'" AND a.id_mapel="'.$_POST['mapel'].'" AND a.id_semester="'.$_POST['semester'].'"
													');

		if( $get->num_rows() > 0 ):
			$no = 1;
			foreach( $get->result() as $d ):
				$s[$d->id]['no'] = $no++;
				$s[$d->id]['siswa'] = $d->nama_siswa;
				$s[$d->id]['n_h_1'] = $d->n_h_1;
				$s[$d->id]['n_h_2'] = $d->n_h_2;
				$s[$d->id]['n_h_3'] = $d->n_h_3;
				$s[$d->id]['n_h_4'] = $d->n_h_4;
				$s[$d->id]['n_h_5'] = $d->n_h_5;
				$s[$d->id]['nts'] = $d->nts;
				$s[$d->id]['nas'] = $d->nas;
			endforeach;
		else :
			$s = null;
		endif;
		// print_r( $s );exit();
		$this->data['result_s'] = $s;
		endif;

		$this->data['content'] = 'wali_kelas/daftar_nilai/index';
		$this->load->view( 'main', $this->data );
	}
}

 ?>