<?php 

/**
* 
*/
class Guru extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		if( $this->session->userdata('login') != TRUE ):
			redirect('login');
		endif;

		$this->load->helper('nilai_helper');
	}

	function index() {
		//edit
		if( $this->input->post('submit-update' ) ):
			// echo '<pre>'; print_r($_POST);exit();
			$data_guru = array(
							'nip' => $this->input->post('nip'),
							'nama_guru' => $this->input->post('nama_guru'),
						);
			$this->db->where( 'id', $_POST['id'])->update( 'guru' , $data_guru );
			$this->session->set_flashdata('msg_success', 'Berhasil mengubah data');
			redirect( 'admin/guru/index' );
		endif;
		//add
		if ( $this->input->post() ) {
			// print_r( $this->input->post() );exit();
			$cek = $this->db->get_where('guru', array('nip' => $this->input->post('nip')))->num_rows();
			if ( $cek == 1 ) {
				$this->session->set_flashdata('msg_error', 'Data sudah tersedia');
				redirect('admin/guru/index');
			} else {
				$data['nip'] = $this->input->post('nip');
				$data['nama_guru'] = $this->input->post('nama_guru');
				$insert = $this->db->insert( 'guru', $data );
				$this->session->set_flashdata('msg_success', 'Berhasil menginputkan data');
				redirect( 'admin/guru/index' );
			}
		}
		$data['get_guru'] = $this->db->get( 'guru' );
		$data['content'] = 'admin/guru/index';
		$this->load->view( 'main' , $data );
	}

	function getone() {
		$result = [];

		if( $this->input->post('id') ):
			$id = $this->input->post('id');
			$getone = $this->db->get_where('guru' , array('id' => $id))->row();

			if( $getone != FALSE ):
				$result['id'] = $getone->id;
				$result['nip'] = $getone->nip;
				$result['nama_guru'] = $getone->nama_guru;
			endif;
		endif;
		header('Content-Type: application/json');
		echo json_encode( $result );
	}

	function delete( $key = null ) {
		if ( $key != '' ) {
			$delete = $this->db->where( 'guru.id' , $key)->delete('guru');
			$this->session->set_flashdata('msg_success', 'Berhasil menghapus data');
			redirect( 'admin/guru/index' );
		}
	}

}

 ?>