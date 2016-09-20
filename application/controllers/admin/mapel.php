<?php 

/**
* 
*/
class Mapel extends CI_controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		if( $this->session->userdata('login') != TRUE ):
			redirect('login');
		endif;
	}

	function index( $key = null ) {
		if ( $this->input->post() ) {
			// print_r( $this->input->post() );exit();
			$cek = $this->db->get_where('mapel' , array('kode_mapel' => $this->input->post('kode_mapel') , 'tahun_ajaran_id' => $this->input->post('semester')));
			if ( $cek->num_rows() == 1 ) {
				$this->session->set_flashdata('msg_error', 'Data sudah tersedia');
				redirect('admin/mapel');
			} else {
				$data['kode_mapel'] = $this->input->post('kode_mapel');
				$data['nama_mapel'] = $this->input->post('nama_mapel');
				$data['tahun_ajaran_id'] = $this->input->post('semester');

				$insert = $this->db->insert( 'mapel', $data );
				$this->session->set_flashdata('msg_success', 'Berhasil menginputkan data');
				redirect('admin/mapel');
			}
		}
		$data['get_data_semester'] = $this->db->get('semester');
		$data['get_data_mapel'] = $this->db->query('SELECT a.id as id_mapel, a.kode_mapel, a.nama_mapel, a.tahun_ajaran_id, b.id as id_semester , b.nama_semester , b.tahun 
			                                        FROM mapel a 
			                                        INNER JOIN semester b ON a.tahun_ajaran_id = b.id
			                                        WHERE a.tahun_ajaran_id="'.$key.'"');
		$data['content'] = 'admin/mapel/index';
		$this->load->view( 'main', $data );
	}

	function delete( $key = null ){
		if ( $key != '' ) {
			$deleted = $this->db->where( 'mapel.id', $key )->delete('mapel');
			$this->session->set_flashdata('msg_success', 'Berhasil menghapus data');
			redirect('admin/mapel');
		}
	}
}

 ?>