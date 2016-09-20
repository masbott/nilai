<?php 

/**
* 
*/
class Input_nilai extends CI_Controller
{
	
	function __construct() {
		parent::__construct();
		$this->load->library('session');
		if( $this->session->userdata('login') != TRUE ):
			redirect('login');
		endif;
	}

	function index() {
		$this->load->library( 'session' );

		$get = $this->session->all_userdata();
		$result_get = $get['id_guru'];

		$this->data['get_form_nilai'] = array('0' => 'null');
		if( $this->input->post('submit') ):
				$get_form_nilai = $this->db->query('SELECT a.*, c.nama_siswa
					                                FROM `nilai` a
					                                INNER JOIN semester b ON a.id_semester = b.id
					                                INNER JOIN siswa c ON a.id_siswa = c.id			                                
					                                INNER JOIN kelas d ON c.kelas_id = d.id
					                                WHERE a.id_guru="'.$result_get.'" 
					                                AND a.id_semester="'.$_POST['semester'].'" 
					                                AND d.id="'.$_POST['kelas'].'"');
		else :
			$get_form_nilai = null;
		endif;

		if( !is_null( $get_form_nilai ) ):
			$s = [];
			$t = [];
			$angka_nts = [];
			$angka_nas = [];
			foreach( $get_form_nilai->result() as $g ):
				$angka_nts[] = $g->nts;
				$angka_nas[] = $g->nas;
				$s[$g->id]['id'] = $g->id;
				$s[$g->id]['nama_siswa'] = $g->nama_siswa;
				$s[$g->id]['n_h_1'] = $g->n_h_1;
				$s[$g->id]['n_h_2'] = $g->n_h_2;
				$s[$g->id]['n_h_3'] = $g->n_h_3;
				$s[$g->id]['n_h_4'] = $g->n_h_4;
				$s[$g->id]['n_h_5'] = $g->n_h_5;
				$s[$g->id]['nts'] = $g->nts;
				$s[$g->id]['nas'] = $g->nas;
				$s[$g->id]['rerata_nilai_harian'] = ($g->n_h_1 + $g->n_h_2 + $g->n_h_3 + $g->n_h_4 + $g->n_h_5 ) / 4;
				$s[$g->id]['r_nilai'] = ( $s[$g->id]['nts'] + $s[$g->id]['nas'] + $s[$g->id]['rerata_nilai_harian'] ) / 3;
				$s[$g->id]['n_p_1'] = $g->n_p_1;
				$s[$g->id]['n_p_2'] = $g->n_p_2;
				$s[$g->id]['n_p_3'] = $g->n_p_3;
				$s[$g->id]['n_p_4'] = $g->n_p_4;
				$s[$g->id]['n_p_5'] = $g->n_p_5;
				$s[$g->id]['projek'] = $g->projek;
				$s[$g->id]['portfolio'] = $g->portfolio;
				$s[$g->id]['o_b_1'] = $g->o_b_1;
				$s[$g->id]['o_b_2'] = $g->o_b_2;
				$s[$g->id]['o_b_3'] = $g->o_b_3;
				$s[$g->id]['o_b_4'] = $g->o_b_4;
				$s[$g->id]['o_b_5'] = $g->o_b_5;
				$t['max_nts'] = isset( $angka_nts ) ?  max( $angka_nts ) : null;
				$t['min_nts'] = isset( $angka_nts ) ?  min( $angka_nts ) : null;
				$t['max_nas'] = isset( $angka_nas ) ? max( $angka_nas ) : null;
				$t['min_nas'] = isset( $angka_nas ) ?  min( $angka_nas ) : null;
			endforeach;
		else :
			$s = null;
			$t = null;
			$angka_nts = null;
		endif;
			
		$this->data['get_form_nilai'] = $s;
		$this->data['get_kesimpulan'] = $t;
			
		$this->data['get_data_semester'] = $this->db->get('semester');
		$this->data['get_data_kelas'] = $this->db->query('SELECT a.* , d.*
										FROM `ampu` a 
										INNER JOIN guru b ON a.guru_id = b.id
										INNER JOIN semester c ON a.tahun_ajaran_id = c.id
										INNER JOIN kelas d ON a.kelas_id = d.id
										WHERE b.id="'.$result_get.'"');
		// echo $this->db->last_query();exit();
		$this->data['content'] = 'guru/nilai/index';
		$this->load->view( 'main' , $this->data );

	}

	function add_nilai() {
		$result = array();


		if( $this->input->post() ):
			$id = $this->input->post('id');
			$field = $this->input->post('field');
			$value = $this->input->post('nilai');

			$get_one = $this->db->get_where('nilai', array('id' => $id))->row();
			$data[$field] = $this->input->post('nilai');

			$u = $this->db->where('nilai.id', $id)->update('nilai', $data);

			if ( $u != FALSE ) :
				$get_nilai = $get_one->n_h_1 + $get_one->n_h_2 + $get_one->n_h_3 + $get_one->n_h_4 + $get_one->n_h_5 + $get_one->nts + $get_one->nas;
				$result_rerata = $get_nilai / 7;
				$result['rerata'] =  number_format($result_rerata, 2, '.', '');
				$result['field'] = $field;
				$result['value'] = $value;
			endif;
		endif;

		header('Content-Type: application/json');
		echo json_encode( $result );

	}

}

 ?>