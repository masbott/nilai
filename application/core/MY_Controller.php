<?php 

if( !function_exists('get_name_level_user')):
	function get_name_level_user() {
		$ci =& get_instance();

		$get_session = $ci->load->library('session');

		$result_get = $ci->session->userdata('level');

		$get_level = $ci->db->get_where('level' , array('id' => $result_get ))->row();

		$result_get_level = isset( $get_level ) ? $get_level->nama_level : null;

		return $result_get_level;

	}

endif;

if( ! function_exists('get_name_login_guru') ):
	
	function get_name_login_guru() {
		
		$ci =& get_instance();

		$get_session = $ci->load->library('session');

		$result_get = $ci->session->userdata('id_guru');

		$get_nama_guru = $ci->db->query('SELECT nama_guru FROM guru where id="'.$result_get.'"');

		$result_nama_guru = isset( $get_nama_guru->row()->nama_guru ) ? $get_nama_guru->row()->nama_guru : null ;

		return $result_nama_guru;

	}

endif;

if( !function_exists( 'get_name_login_admin') ):

	function get_name_login_admin() {
		$ci =& get_instance();

		$get_session = $ci->load->library('session');

		$result_get = $ci->session->userdata('level');

		if( $result_get == '1' ):
			$get_id_guru = $ci->session->userdata('id_guru');
			$get_name_admin = $ci->db->query('SELECT nama_guru FROM guru where id="'.$get_id_guru.'"');
			$result_get_name_admin = isset( $get_name_admin->row()->nama_guru ) ? $get_name_admin->row()->nama_guru : null;
		endif;

		return  $result_get_name_admin;		
	}

endif;

if( !function_exists( 'get_nama_mapel' )):

	function get_nama_mapel() {
		$ci =& get_instance();

		$get_session = $ci->load->library('session');

		$result_get = $ci->session->userdata('id_guru');

		$get_mapel = $ci->db->query('SELECT a.guru_id , a.mapel_id , b.nama_mapel
			                          FROM ampu a 
			                          INNER JOIN mapel b ON a.mapel_id = b.id
			                          WHERE a.guru_id="'.$result_get.'" ');
		

		if( $get_mapel->num_rows() > 0 ):
			return isset( $get_mapel->row()->nama_mapel ) ? $get_mapel->row()->nama_mapel : null ;	
		endif;
		
	}

endif;

if( function_exists( 'get_kelas_by_semester_guru' )):

	function get_kelas_by_semester_guru( $semester ) {
		$get_session = $ci->load->library('session');

		$result_get = $ci->session->userdata('id_guru');

		$get = $this->db->query('SELECT a.* , b.* , c.*
			                     FROM ampu a 
			                     INNER JOIN kelas b ON a.kelas_id = b.id
			                     INNER JOIN semester c ON a.tahun_ajaran_id = c.id
			                     WHERE a.guru_id="'.$result_get.'" AND  AND c.id="'.$semester.'" ');

		return $get;
	}
endif;

if( !function_exists( 'get_nama_siswa' ) ):

	function get_nama_siswa() {
	
		$ci =& get_instance();

		$get_session = $ci->load->library('session');

		$result_get = $ci->session->userdata('id_siswa');	

		$get = $ci->db->query('SELECT a.* 
			                     FROM siswa a 
			                     WHERE id="'.$result_get.'"');

		$hasil = $get->row();

		return $hasil;

	}

endif;

if( !function_exists( 'get_nama_wali_kelas' )) :
	function get_nama_wali_kelas() {

	$ci =& get_instance();

	$get_session = $ci->load->library('session');

	$result_get = $ci->session->userdata('level');



	if( $result_get == '4' ):
		$get_id_guru = $ci->session->userdata('id_guru');
		$get_name_admin = $ci->db->query('SELECT nama_guru FROM guru where id="'.$get_id_guru.'"');
		$result_get_name_wali_kelas = isset( $get_name_admin->row()->nama_guru ) ? $get_name_admin->row()->nama_guru : null;
	endif;

	return  $result_get_name_wali_kelas;

	}

endif;

 ?>