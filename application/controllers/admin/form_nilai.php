<?php 

/**
* 
*/
class Form_nilai extends CI_Controller {

	
	function __construct() {
		parent::__construct();
		$this->load->library('session');
		if( $this->session->userdata('login') != TRUE ):
			redirect('login');
		endif;
	}

	function index( $key = null) {

		$this->data['get_data'] = $this->db->query('SELECT a.*, c.nama_mapel
			                                        FROM nilai a
			                                        RIGHT JOIN mapel c ON a.id_mapel = c.id
			                                        LEFT JOIN semester d ON a.id_semester = d.id
			                                        WHERE c.tahun_ajaran_id="'.$key.'"
			                                        GROUP BY a.id_mapel
			                                        ');
		// echo '<pre>'; print_r( $this->data['get_data']->result() );exit();
		if( $this->input->post() ):
			$get_synch = $this->db->query('SELECT a.*, b.id as id_kelas, b.nama_kelas , c.id as id_mapel, c.nama_mapel, d.id as id_siswa, d.nama_siswa 
				                           FROM ampu a 
				                           INNER JOIN kelas b ON a.kelas_id = b.id
				                           INNER JOIN mapel c ON a.mapel_id = c.id
				                           INNER JOIN siswa d ON b.id = d.kelas_id
				                           WHERE a.tahun_ajaran_id="'.$key.'"');
			// echo $this->db->last_query();exit();
			if ( $get_synch->num_rows() > 0 ) {
				foreach( $get_synch->result() as $d ):
					$data['id_kelas'] = $d->id_kelas;
					$data['id_siswa'] = $d->id_siswa;
					$data['id_guru'] = $d->guru_id;
					$data['id_mapel'] =  $d->id_mapel;
					$data['id_semester'] = $key;
					// $this->db->truncate('nilai');
					$cek_form_nilai = $this->db->get_where('nilai', array('id_siswa' => $d->id_siswa , 'id_mapel' => $d->id_mapel , 'id_semester' => $key));
					if ( $cek_form_nilai->num_rows() == 1 ) :
						//gagal
					else :
						$this->db->insert('nilai', $data);	
					endif;
				endforeach;
					$this->session->set_flashdata('msg_success', 'value');
					redirect( 'admin/form_nilai/index' );
				// exit();
			}
			// echo '<pre>'; print_r( $get_synch->result() );exit();
		endif;
		$this->data['semester'] = $this->db->get( 'semester' );
		$this->data['content'] = 'admin/form_nilai/index';
		$this->load->view( 'main', $this->data );
	}

}

 ?>