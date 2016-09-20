<?php 

/**
* 
*/
class Login extends CI_Controller
{
	
	function __construct()
	{
		parent:: __construct();
	}

	function index() {
		$this->load->view('login/index');
	}

	function sign(){
		$this->load->library('session');
		if ( $this->input->post() ) {
			// print_r( $_POST );exit();
			$hae = $this->session->all_userdata();
			// print_r( $hae );
			// echo '<pre>'; print_r( $this->input->post() );exit();
			$cek = $this->db->get_where('pengguna', array('username' => $this->input->post('username') , 'password' => md5( $this->input->post('password') ) ) );
			$cek_one = $cek->row();

			if ( $cek->num_rows() == 1 ) {
				$session = $this->session->set_userdata(array( 'id' => $cek_one->id, 'username' => $cek_one->username, 'level' => $cek_one->level_id , 'id_guru' => $cek_one->id_guru , 'id_siswa' => $cek_one->id_siswa));
				$this->session->set_userdata("login",true);
				
				$get_all_auth = $this->session->all_userdata();
				
				if ( $get_all_auth['level'] == 1 ) {
					redirect('admin/home/index');
				}

				if ( $get_all_auth['level'] == 2 ) {
					redirect( 'guru/home/index' );
				}

				if ( $get_all_auth['level'] == 3 ) {
					redirect( 'siswa/home/index' );
				}

				if ( $get_all_auth['level'] == 4 ) {
					redirect( 'wali_kelas/home/index' );
				}


			} else {
				$this->session->set_flashdata('error_login', 'Kesalahan pada username atau password Anda!');
				redirect('login');
			}
		}
	}

	function logout(){
		$this->session->unset_userdata('id');
		$this->session->unset_userdata('login');
		$this->session->sess_destroy();
		$this->session->set_flashdata('sukses_logout', 'Anda berhasil keluar dari sistem.');
		redirect('login');
	}
}
 ?>