<ol class="breadcrumb">
  <li><a href="#">Home</a></li>
  <li><a href="#">Library</a></li>
  <li class="active">Data</li>
</ol>

<?php if( $get_data_semester->num_rows() != 0 ): ?>
	<?php $sem[0] = '-- Pilih Semester / tahun ajaran'; ?>
		<?php foreach( $get_data_semester->result() as $s ): ?>
			<?php $sem[$s->id] = $s->nama_semester .' ' .$s->tahun; ?>
		<?php endforeach; ?>
<?php endif; ?>

<?php if( $get_data_kelas->num_rows() != 0  ): ?>
	<?php foreach( $get_data_kelas->result() as $t ): ?>
		<?php $kelas[0] = '-- Pilih Kelas -- '; ?>
		<?php $kelas[$t->id] = $t->nama_kelas; ?>
	<?php endforeach; ?>
<?php else : ?>
	<?php $kelas[0] = '-- Pilih Kelas -- '; ?>
<?php endif; ?>
<form action="" method="post">
	<table class="table table-striped" width="100%">
		<tr>
			<th style="font-weight:normal;" width="10%">Guru</th>
			<th style="font-weight:normal;" width="5%">:</th>
			<th style="font-weight:normal;" width="85%"><?php echo get_name_login_guru(); ?></th>
		</tr>
		<tr>
			<th style="font-weight:normal;">Matapelajaran</th>
			<th style="font-weight:normal;">:</th>
			<th style="font-weight:normal;"><?php echo get_nama_mapel(); ?></th>
		</tr>
		<tr>
			<th style="font-weight:normal;">Semester / Tahun Ajaran</th>
			<th style="font-weight:normal;">:</th>
			<th style="font-weight:normal;">
				<?php echo form_dropdown('semester', $sem, $this->input->post('semester') , 'class="form-control" style="margin-bottom:5px; font-weight:normal"'); ?>					
			</th>
		</tr>
		<tr>
			<th style="font-weight:normal;">Kelas</th>
			<th style="font-weight:normal;">:</th>
			<th style="font-weight:normal;">
				<?php echo form_dropdown('kelas', $kelas, $this->input->post('kelas') ,'class="form-control" style="margin-bottom:5px; font-weight:normal;"'); ?>
			</th>
		</tr>
		<tr>
			<th></th>
			<th></th>
			<th>
				<input type="submit" name="submit" class="btn btn-sm btn-primary" value="Lihat">
			</th>
		</tr>
	</table>
</form>

<hr style="border: 2px dotted rgb(238, 238, 238);">
<?php if( $get_form_nilai != null ): ?>
	<button class="btn btn-sm btn-primary pull-right" style="margin-bottom:5px;"><i class="fa fa-print"></i> Cetak</button>
<?php else : ?>
	<?php echo null; ?>
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
				<!-- <th style="text-align:center; font-weight:normal;" class="wrap" rowspan="2">Ulangan Tengah Semester</th>
				<th style="text-align:center; font-weight:normal;" class="wrap" rowspan="2">Ulangan Akhir Semester</th> -->
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
			<?php $no = 1;  if( $get_form_nilai != null ): ?>
				<?php foreach( $get_form_nilai as $n ): ?>
					<tr>
						<td><?php echo $no++ ?></td>
						<td style="text-align:left;"><?php echo $n['nama_siswa'] ?></td>
						<td><input type="text" role="auto-input" class="form-control-custome" data-method="add_nilai" data-id="<?php echo $n['id'] ?>" name="n_h_1" value="<?php echo $n['n_h_1'] ?>"></td>
						<td><input type="text" role="auto-input" class="form-control-custome" data-method="add_nilai" data-id="<?php echo $n['id'] ?>" name="n_h_2" value="<?php echo $n['n_h_2'] ?>"></td>
						<td><input type="text" role="auto-input" class="form-control-custome" data-method="add_nilai" data-id="<?php echo $n['id'] ?>" name="n_h_3" value="<?php echo $n['n_h_3'] ?>"></td>
						<td><input type="text" role="auto-input" class="form-control-custome" data-method="add_nilai" data-id="<?php echo $n['id'] ?>" name="n_h_4" value="<?php echo $n['n_h_4'] ?>"></td>
						<td><input type="text" role="auto-input" class="form-control-custome" data-method="add_nilai" data-id="<?php echo $n['id'] ?>" name="n_h_5" value="<?php echo $n['n_h_5'] ?>"></td>
						<td><input type="text" role="auto-input" class="form-control-custome" data-method="add_nilai" data-id="<?php echo $n['id'] ?>" name="nts" value="<?php echo $n['nts'] ?>"></td>
						<td><input type="text" role="auto-input" class="form-control-custome" data-method="add_nilai" data-id="<?php echo $n['id'] ?>" name="nas" value="<?php echo $n['nas'] ?>"></td>
						<td><?php echo number_format( $n['r_nilai'] , 2 , ',' , '.') ?></td>
						<td></td>
						<td></td>
						<td><input type="text" role="auto-input" class="form-control-custome" data-method="add_nilai" data-id="<?php echo $n['id'] ?>" name="n_p_1" value="<?php echo $n['n_p_1'] ?>"></td>
						<td><input type="text" role="auto-input" class="form-control-custome" data-method="add_nilai" data-id="<?php echo $n['id'] ?>" name="n_p_2" value="<?php echo $n['n_p_2'] ?>"></td>
						<td><input type="text" role="auto-input" class="form-control-custome" data-method="add_nilai" data-id="<?php echo $n['id'] ?>" name="n_p_3" value="<?php echo $n['n_p_3'] ?>"></td>
						<td><input type="text" role="auto-input" class="form-control-custome" data-method="add_nilai" data-id="<?php echo $n['id'] ?>" name="n_p_4" value="<?php echo $n['n_p_4'] ?>"></td>
						<td><input type="text" role="auto-input" class="form-control-custome" data-method="add_nilai" data-id="<?php echo $n['id'] ?>" name="n_p_5" value="<?php echo $n['n_p_5'] ?>"></td>
						<td><input type="text" role="auto-input" class="form-control-custome" data-method="add_nilai" data-id="<?php echo $n['id'] ?>" name="projek" value="<?php echo $n['projek'] ?>"></td>
						<td><input type="text" role="auto-input" class="form-control-custome" data-method="add_nilai" data-id="<?php echo $n['id'] ?>" name="portfolio" value="<?php echo $n['portfolio'] ?>"></td>
						<td></td>
						<td></td>
						<td></td>
						<td><input type="text" role="auto-input" class="form-control-custome" data-method="add_nilai" data-id="<?php echo $n['id'] ?>" name="o_b_1" value="<?php echo $n['o_b_1'] ?>"></td>
						<td><input type="text" role="auto-input" class="form-control-custome" data-method="add_nilai" data-id="<?php echo $n['id'] ?>" name="o_b_2" value="<?php echo $n['o_b_2'] ?>"></td>
						<td><input type="text" role="auto-input" class="form-control-custome" data-method="add_nilai" data-id="<?php echo $n['id'] ?>" name="o_b_3" value="<?php echo $n['o_b_3'] ?>"></td>
						<td><input type="text" role="auto-input" class="form-control-custome" data-method="add_nilai" data-id="<?php echo $n['id'] ?>" name="o_b_4" value="<?php echo $n['o_b_4'] ?>"></td>
						<td><input type="text" role="auto-input" class="form-control-custome" data-method="add_nilai" data-id="<?php echo $n['id'] ?>" name="o_b_5" value="<?php echo $n['o_b_5'] ?>"></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
				<?php endforeach; ?>
			<?php else : ?>
				<tr>
					<td colspan="32">DATA TIDAK TERSEDIA</td>
				</tr>
			<?php endif; ?>
		</tbody>
	</table>
</div>
<div class="col-md-6">
<p style="font-size:11px;">Keterangan:</p>
<ul>
	<li><strong>NILAI PENGETAHUAN</strong></li>
		<ul type="I">
			<li>Rerata Nilai Harian (poin 70%)</li>
			<li>NTS (Nilai Tengah Semester) (poin 20%)</li>
			<li>NAS (Nilai Akhir Semester) (poin 10%)</li>
			<li>R.Nilai</li>
			<li>Nilai LHB</li>
		</ul>
	<li><strong>NILAI PRAKTEK</strong></li>
	<ul>
		<li>Rerata Nilai Harian (poin 70%)</li>
		<li>Projek (poin 20%)</li>
		<li>Portfolio (poin 10%)</li>
		<li>R.Nilai</li>
		<li>Nilai LHB</li>
	</ul>
	<li><strong>NILAI SIKAP</strong></li>
	<ul>
		<li>Nilai Sikap (poin 50%)</li>
		<li>PD (poin 20%)</li>
		<li>PS (20%)</li>
		<li>Jurnal (10%)</li>
		<li>R.Nilai</li>
		<li>Kualifikasi</li>
		<li>Ketuntasan</li>
	</ul>
</ul>
</div>
<div class="col-md-6">
	<p style="font-size:11px;">keterangan 2</p>
	<ul>
		<li><strong>NILAI TENGAH SEMESTER</strong></li>
		<ul type="I">
			<li>Nilai Tertingggi &nbsp; : <strong> <?php echo isset( $get_kesimpulan['max_nts'] ) ? $get_kesimpulan['max_nts'] : null; ?> </strong> </li>
			<li>Nilai Terendah &nbsp; : <strong> <?php echo isset( $get_kesimpulan['min_nts'] ) ? $get_kesimpulan['min_nts'] : null;  ?> </strong></li>
		</ul>	
		<li><strong>NILAI AKHIR SEMESTER</strong></li>
		<ul type="I">
			<li>Nilai Tertingggi &nbsp; : <strong> <?php echo isset( $get_kesimpulan['max_nas'] ) ? $get_kesimpulan['max_nas'] : null; ?> </strong></li>
			<li>Nilai Terendah &nbsp; : <strong> <?php echo isset( $get_kesimpulan['min_nas'] ) ? $get_kesimpulan['min_nas'] : null;  ?> </strong></li>
		</ul>
	</ul>
	
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
            /*width:5em; */
            /* left:0;
            top:auto; */
            /* border-right: 1px #solid black; */ 
            /* border-top-width:3px; */ /*only relevant for first row*/
            /* margin-top:-3px; */ /*compensate for top border*/
            overflow:hidden;
            /* background-color : #fff; */
        }

</style>