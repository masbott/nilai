<?php 

/**
* 
*/
class Ampu extends CI_Controller
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
		$val_ampu = array();
		if ( $this->input->post('submit') ) {
			$temp = count( $this->input->post('kelas') );

			if( $temp == 1 ):
				$val_ampu['guru_id'] = $this->input->post('nip');
				$val_ampu['mapel_id'] = $this->input->post('mapel');
				$val_ampu['kelas_id'] = $this->input->post('kelas');
				$val_ampu['tahun_ajaran_id'] = $this->input->post('semester');
				$this->db->insert('ampu', $val_ampu);
				if ( $key != '' ) :
					redirect( 'admin/ampu/index/'.$key );	
				endif;
			else :
				for( $i=0; $i < $temp ; $i++ ):
					$id_mapel = $this->input->post('mapel');
					$id_guru  = $this->input->post('nip');
					$id_kelas = $this->input->post('kelas');
					$id_semester = $this->input->post('semester');
					$data = array(
								'mapel_id' => $id_mapel,
								'guru_id' => $id_guru,
								'kelas_id' => $id_kelas[$i],
								'tahun_ajaran_id' => $id_semester
							);
					$this->db->insert( 'ampu', $data );
					if ( $key != '' ) {
						redirect( 'admin/ampu/index/'.$key );	
					}
				endfor;
			endif;
		}
		$data['get_data_ampu'] = $this->db->query('SELECT a.id as id_guru, a.nama_guru, b.id as id_ampu, b.mapel_id as id_mapel, b.kelas_id as id_kelas, b.tahun_ajaran_id as id_semester, c.nama_mapel, d.nama_kelas
                                                   FROM `guru` a
                                                   LEFT JOIN ampu b ON a.id = b.guru_id 
                                                   INNER JOIN mapel c ON b.mapel_id = c.id
                                                   INNER JOIN kelas d ON b.kelas_id = d.id
                                                   WHERE b.tahun_ajaran_id="'.$key.'"
		                                           ');
		if ( $data['get_data_ampu']->num_rows() != 0 ) :
			foreach( $data['get_data_ampu']->result() as $e ):
				$f[$e->id_guru]['id_guru'] = $e->id_guru;
				$f[$e->id_guru]['nama_guru'] = $e->nama_guru;
				$f[$e->id_guru]['id_mapel'] = $e->id_mapel;
				$f[$e->id_guru]['nama_mapel'] = $e->nama_mapel;
				$f[$e->id_guru]['id_kelas'][] = $e->id_kelas;
				$f[$e->id_guru]['nama_kelas'][] = $e->nama_kelas;
				$f[$e->id_guru]['id_semester'] = $e->id_semester;
			endforeach;
		else :
			$f = null;
		endif;
			// echo '<pre>'; print_r( $f );exit();
		// echo '<pre>'; print_r( $data['get_data_ampu']->result() );exit();
		$data['result_get_data_ampu'] = $f;
		$data['get_data_mapel'] = $this->db->get_where( 'mapel' , array('tahun_ajaran_id' => $this->uri->segment(4)) );
		// echo '<pre>'; print_r( $data['get_data_mapel']->result());
		$data['get_data_guru'] = $this->db->get( 'guru' );
		$data['get_data_kelas'] = $this->db->get( 'kelas' );
		$data['get_data_semester'] = $this->db->get( 'semester' );
		$data['content'] = 'admin/ampu/index';
		$this->load->view( 'main', $data );
	}
}

 ?>
