<ol class="breadcrumb">
  <li><a href="#">Home</a></li>
  <li><a href="#">Library</a></li>
  <li class="active">Data</li>
</ol>

<?php if( $mapel->num_rows() > 0 ): ?>
		<?php $mapeles[0] = '-- Pilih Matapelajaran --'; ?>
	<?php foreach( $mapel->result() as $m ): ?>
		<?php $mapeles[$m->id] = $m->nama_mapel; ?>
	<?php endforeach; ?>
<?php endif; ?>

<?php if( $semester->num_rows() > 0 ): ?>
		<?php $semesters[0] = '-- Pilih Semester --'; ?>
	<?php foreach( $semester->result() as $s ): ?>
		<?php $semesters[$s->id] = $s->nama_semester ." " . $s->tahun;  ?>
	<?php endforeach; ?>
<?php endif; ?>
<form action="" method="post">
	<table class="table table-striped" width="100%">
		<tr>
			<td width="5%">Kelas</td>
			<td width="2%">:</td>
			<td width="">
				<?php echo $kelas; ?>
				<?php //echo form_dropdown('kelas', $kelases, $this->input->post('kelas') ,'class="form-control"'); ?>
			</td>
		</tr>
		<tr>
			<td>Matapelajaran</td>
			<td>:</td>
			<td>
				<?php echo form_dropdown( 'mapel', $mapeles, $this->input->post('mapel') ,'class="form-control"'); ?>
			</td>
		</tr>
		<tr>
			<td>Semester/Tahun ajaran</td>
			<td>:</td>
			<td>
				<?php echo form_dropdown('semester', $semesters, $this->input->post('semester') ,'class="form-control"'); ?>
			</td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td>
				<input type="submit" role="set-rule" name="submit" class="btn btn-sm btn-primary" value="Lihat">
			</td>
		</tr>
	</table>
</form>
<hr style="border:2px dotted #eee;">

<?php if( !empty( $get_data ) ): ?>
	<button class="btn btn-primary btn-sm pull-right" style="margin-bottom:5px;"><i class="fa fa-print"></i> Cetak</button>
<?php endif; ?>

<div class="table-data">
	<table class="table table-striped table-bordered table-responsive data" width="100%">
		<thead>
				<tr>
					<th class="wrap" rowspan="3">#</th>
					<th class="wrap" rowspan="3">Nama Siswa</th>
					<th class="wrap" colspan="10" width="30%"><strong>NILAI PENGETAHUAN</strong></th>
					<th class="wrap" colspan="10" width="30%"><strong>NILAI PRAKTEK</strong></th>
					<th class="wrap" colspan="10" width="30%"><strong>NILAI SIKAP</strong></th>
					<th class="wrap" rowspan="3">Ketuntasan</th>
				</tr>
				<tr>

					<th class="wrap" colspan="5">R.Nilai Harian</th>
					<th class="wrap" rowspan="2">NTS</th>
					<th class="wrap" rowspan="2">NAS</th>
					<th class="wrap" rowspan="2">R.Nilai</th>
					<th class="wrap" colspan="2">Nilai LHB</th>

					<th class="wrap" colspan="5">R.Nilai Praktek</th>
					<th class="wrap" rowspan="2">Projek</th>
					<th class="wrap" rowspan="2">Portofolio</th>
					<th class="wrap" rowspan="2">R.Nilai</th>
					<th class="wrap" colspan="2">Nilai LHB</th>

					<th class="wrap" colspan="5">Observasi</th>
					<th class="wrap" rowspan="2">PD</th>
					<th class="wrap" rowspan="2">PS</th>
					<th class="wrap" rowspan="2">Jurnal</th>
					<th class="wrap" rowspan="2">R.Nilai</th>
					<th class="wrap" rowspan="2">Kualifikasi</th>

				</tr>
				<tr>
					<th class="wrap">1</th>
					<th class="wrap">2</th>
					<th class="wrap">3</th>
					<th class="wrap">4</th>
					<th class="wrap">5</th>
					<th class="wrap">NA</th>
					<th class="wrap">Pre</th>

					<th class="wrap">1</th>
					<th class="wrap">2</th>
					<th class="wrap">3</th>
					<th class="wrap">4</th>
					<th class="wrap">5</th>
					<th class="wrap">NA</th>
					<th class="wrap">Pre</th>

					<th class="wrap">1</th>
					<th class="wrap">2</th>
					<th class="wrap">3</th>
					<th class="wrap">4</th>
					<th class="wrap">5</th>

				</tr>
		</thead>
		<tbody>
			<?php $no = 1; if( !empty( $result_s ) ): ?>
				<?php foreach( $result_s as $d ): ?>
					<tr>
						<td><?php echo $d['no']; ?></td>
						<td><?php echo $d['siswa'] ?></td>
						<td><?php echo $d['n_h_1'] ?></td>
						<td><?php echo $d['n_h_2'] ?></td>
						<td><?php echo $d['n_h_3'] ?></td>
						<td><?php echo $d['n_h_4'] ?></td>
						<td><?php echo $d['n_h_5'] ?></td>
						<td><?php echo $d['nts'] ?></td>
						<td><?php echo $d['nas'] ?></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
				<?php endforeach; ?>
			<?php else : ?>
				<tr>
					<td colspan="33">DATA TIDAK TERSEDIA</td>
				</tr>
			<?php endif; ?>
		</tbody>
	</table>
</div>

<style type="text/css">
	.data { 
		border-collapse:separate; 
		border-top: 1px solid #eee; 
	}

	.table-data {
        width: 1200px; 
        overflow-x:scroll;  
        /*padding-left:5em; */
        overflow-y:visible;
        padding-bottom:1px;
	}

	.table-bordered > thead > tr > th, .table-bordered > tbody > tr > th, .table-bordered > tfoot > tr > th, .table-bordered > thead > tr > td, .table-bordered > tbody > tr > td, .table-bordered > tfoot > tr > td {
		border: 1px solid #eee;
		text-align:center; 
		font-weight:normal; 
	}

	.head {
            position:absolute; 
            height: 4em;
            overflow:hidden;
        }

</style>