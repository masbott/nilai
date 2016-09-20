<?php 


/**
* 
*/
class Pengaturan extends CI_controller
{
	
	function __construct()
	{
		parent::__construct();
	}


	function index() {
		if( $this->input->post('submit') ):
			$username = $this->input->post('username');
			$pass_lama = md5( $this->input->post('password_lama') );
			$pass_baru = $this->input->post('pass_baru');
			$pass_konfirm = $this->input->post('pass_konfirm');
			$cek_password = $this->db->get_where('pengguna', array('id' => $this->session->userdata('id') ) );
			if( $cek_password->row()->password == $pass_lama ):
				if( $pass_baru == $pass_konfirm ):
					$data['username'] = $this->input->post('username');
					$data['password'] = md5( $this->input->post('pass_baru') );
					$this->db->where('pengguna.id', $this->session->userdata('id'))->update('pengguna', $data);
					$msg = '<div class="alert alert-success" role="alert"><strong>Berhasil!</strong> Berhasil mengubah password.</div>';
					$this->session->set_flashdata('alert_danger', $msg );
					redirect('pengaturan');	
				else :
					$msg = '<div class="alert alert-warning" role="alert"><strong>Peringatan!</strong> Password baru tidak sesuai.</div>';
					$this->session->set_flashdata('alert_danger', $msg );
					redirect('pengaturan');	
				endif;
			else :
				$msg = '<div class="alert alert-warning" role="alert"><strong>Peringatan!</strong> Password lama tidak sesuai.</div>';
				$this->session->set_flashdata('alert_danger', $msg );
				redirect('pengaturan');
			endif;
		endif;
		$this->data['username'] = $this->session->userdata('username');
		$this->data['content'] = 'general/pengaturan_pengguna';
		$this->load->view( 'main' , $this->data );
	}
}


 ?>