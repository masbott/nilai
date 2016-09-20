<?php 

/**
* 
*/
class Siswa extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		if( $this->session->userdata('login') != TRUE ):
			redirect('login');
		endif;
	}

	function index( $key = null , $y = null ){
		//edit data
		if ( $this->input->post('submit-update') ) {
			$data_siswa = array(
								'nis' => $this->input->post('nis'),
								'nama_siswa' => $this->input->post('nama_siswa'),
								'nama_ortu' => $this->input->post('nama_ortu'),
								'alamat' => $this->input->post('alamat'),
								'kelas_id' => $this->input->post('kelas'),
								'agama_id' => $this->input->post('agama')
							);
			$this->db->where('siswa.id', $_POST['id'])->update('siswa', $data_siswa);
			$this->session->set_flashdata('msg_success', 'Berhasil mengubah data');
			redirect('admin/siswa/index/'.$key);
		}

		$data['get_data_kelas'] = $this->db->get('kelas');
		$data['get_data_agama'] = $this->db->get('agama');
		$data['get_data_siswa'] = $this->db->query('SELECT a.id as id_siswa, a.nis, a.nama_siswa, a.nama_ortu, a.alamat, a.kelas_id , b.* FROM `siswa` a
													INNER JOIN  kelas b ON a.kelas_id = b.id
													WHERE a.kelas_id="'.$key.'"');
		$data['content'] = 'admin/siswa/index';
		$this->load->view( 'main', $data );
	}


	function get_one() {
		$res = array();
		if ( $this->input->post('id') ) :
			$get_one = $this->db->get_where('siswa', array('id' => $this->input->post('id')));
			$result_get_one = $get_one->row();
			if ( $result_get_one != FALSE ) :
				$res['id'] = $result_get_one->id;
				$res['nis'] = $result_get_one->nis;
				$res['nama_siswa'] = $result_get_one->nama_siswa;
				$res['kelas'] = $result_get_one->kelas_id;
				$res['agama'] = $result_get_one->agama_id;
				$res['nama_ortu'] = $result_get_one->nama_ortu;
				$res['alamat'] = $result_get_one->alamat;
			endif;
		endif;

		header('Content-Type: application/json');
		echo json_encode( $res );
	}
}

 ?>