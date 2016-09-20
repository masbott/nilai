<?php 

/**
* 
*/
class Kelas extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		if( $this->session->userdata('login') != TRUE ):
			redirect('login');
		endif;
	}

	function index( $key = null ){
		if ( $this->input->post() ) {
			// print_r( $this->input->post() );exit();
			$cek = $this->db->get_where('kelas', array('nama_kelas' => $this->input->post('nama_kelas')))->row();

			if ( $cek == 1 || $this->input->post('wali_kelas') == 0 ) {
				$this->session->set_flashdata('msg_error', 'Data sudah tersedia');
				redirect('admin/kelas');
			} else {
				$data['nama_kelas'] = $this->input->post('nama_kelas');
				$data['wali_kelas'] = $this->input->post('wali_kelas');
				//$data['semester'] = $this->input->post('semester');

				$this->db->insert( 'kelas', $data );

				$this->session->set_flashdata('msg_success', 'Berhasil menginputkan data');
				redirect('admin/kelas');
			}
		}

		$data['get_data'] = $this->db->query('SELECT a.id as id_kelas, a.nama_kelas, a.wali_kelas , b.id as id_guru, b.nip, b.nama_guru 
											  FROM `kelas` a 
											  INNER JOIN guru b ON a.wali_kelas = b.id
											  ORDER BY a.id ASC
											  ');
		// echo '<pre>'; print_r( $data['get_data']->result() );exit();
		$data['get_data_semester'] = $this->db->get('semester');
		$data['wali_kelas'] = $this->db->get('guru');
		$data['content'] = 'admin/kelas/index';
		$this->load->view( 'main' ,$data );
	}

	function get_upload() {
		$data['content'] = 'admin/kelas/upload';
		$this->load->view( 'main', $data );	
	}

	function upload() { 
			if( !empty($_FILES['images']['name'][0]) ):
				if( $this->multiple_upload($_FILES['images']) != FALSE || $_FILES['images']['name'][0] ):
					//jika berhasil
					echo 'berhasil';
				endif;
			else :
				//jika gagal
				echo 'gagal';
			endif;
 	}

	 private function multiple_upload($files) {
	 	
	    $config = array(
	            'upload_path'   => FCPATH . 'uploads/dokumen', //path penyimpanan file,sebaiknya menggunakan dynamic path jika suatu saat server fisik pindah.
	            'allowed_types' => 'jpg|gif|png', //ekstensi dokumen yang diterima atau diperbolehkan.
	            'overwrite'     => 1,//overwrite 1 berarti ya,0 tidak (jika upload data sama maka akan menggandakan)                       
	        );

	        $this->load->library('upload', $config); //load library upload dan config

	        $images = array(); //deklarasi variabel kosong

	        foreach ($files['name'] as $key => $image) : //perulangan data
	            $_FILES['images[]']['name']= $files['name'][$key];
	            $_FILES['images[]']['type']= $files['type'][$key];
	            $_FILES['images[]']['tmp_name']= $files['tmp_name'][$key];
	            $_FILES['images[]']['error']= $files['error'][$key];
	            $_FILES['images[]']['size']= $files['size'][$key];

	            $fileName = $image;

	            $images[] = $fileName;

	            $config['file_name'] = $fileName; //file_name sama arti mengambil config berupa file_name

	            $this->upload->initialize($config);//penginisialisasian

	            if ($this->upload->do_upload('images[]')) ://jika terdapat array berbentuk images
	                $this->upload->data(); //melakukan pengupload an
	            else : //jika tidak sesuai
	                return false;
	            endif;

	        endforeach;
	        //kembalian
	        return $images;
	}

	function update_wali_kelas() {
		$return = array();

		if ( $this->input->post() ) {
			$id = $this->input->post('id');
			$nilai = $this->input->post('nilai');
			$data['wali_kelas'] = $this->input->post('nilai');

			$updated = $this->db->where('kelas.id', $id)->update('kelas',$data);

			if ( $updated != FALSE ) {
				$return['id'] = $id;
				$return['wali_kelas'] = $nilai;
			}
		}

		header('Content-Type: application/json');
		echo json_encode($return);

	}

	function delete( $key = null ) {
		if ( $key != '' ) {
			$deleted = $this->db->where('kelas.id', $key)->delete('kelas');
			$this->session->set_flashdata('msg_success', 'Berhasil menghapus data');
			redirect('admin/kelas');
		}
	}

}

?>