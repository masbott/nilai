<ol class="breadcrumb">
  <li><a href="#">Home</a></li>
  <li><a href="#">Library</a></li>
  <li class="active">Data</li>
</ol>

<form action="" method="post">
	<table class="table table-striped" width="100%">
		<tr>
			<th width="10%" style="font-weight:normal;">NIS</th>
			<th width="5%" style="font-weight:normal;">:</th>
			<th style="font-weight:normal;"><?php echo isset( get_nama_siswa()->nis ) ?  get_nama_siswa()->nis : null; ?></th>
		</tr>
		<tr>
			<th style="font-weight:normal;">Nama Siswa</th>
			<th style="font-weight:normal;">:</th>
			<th style="font-weight:normal;"><?php echo isset( get_nama_siswa()->nis ) ?  get_nama_siswa()->nama_siswa : null; ?></th>
		</tr>
		<tr>
			<th style="font-weight:normal;">Kelas</th>
			<th style="font-weight:normal;">:</th>
			<th>
				<?php if( $kelas->num_rows() != 0 ): ?>
						<?php $s[0] = '-- Pilih Kelas --'; ?>
					<?php foreach( $kelas->result() as $k ): ?>
						<?php $s[$k->id] = $k->nama_kelas; ?>
					<?php endforeach; ?>
				<?php endif; ?>
				<?php echo form_dropdown('kelas', $s, $this->input->post('kelas') , 'class="form-control" style="font-weight:normal;"'); ?>
			</th>
		</tr>

		<tr>
			<th style="font-weight:normal;">Semester / Tahun Ajaran</th>
			<th style="font-weight:normal;">:</th>
			<th>
				<?php if( $semester->num_rows() != 0 ): ?>
						<?php $h[0] = '-- Pilih Semester --'; ?>
					<?php foreach( $semester->result() as $g ): ?>
						<?php $h[$g->id] = $g->nama_semester. ' ' .$g->tahun; ?>
					<?php endforeach; ?>
				<?php endif; ?>
				<?php echo form_dropdown('semester', $h, $this->input->post('semester') ,'class="form-control" style="font-weight:normal;"'); ?>
			</th>
		</tr>

		<tr>
			<th></th>
			<th></th>
			<th>
				<input type="submit" name="submit" role="set-rule" class="btn btn-sm btn-primary" value="Lihat">
			</th>
		</tr>

	</table>


<hr style="border: 2px dotted rgb(238, 238, 238);">
	<?php if( $get_data != null && $get_data->num_rows() != 0  ): ?>
		<input type="submit" class="btn btn-sm btn-primary pull-right" name="cetak" value="Cetak" style="margin-bottom:5px;">
	<?php else : ?>
		<?php echo null; ?>
	<?php endif; ?>
</form>

<table class="table table-striped table-bordered" width="100%">
	<thead>
		<tr>
			<th style="font-weight:normal;text-align:center;" width="2%">#</th>
			<th style="font-weight:normal;text-align:center;" width="10%">Matapelajaran</th>
			<th style="font-weight:normal;text-align:center;" width="10%">Nilai</th>
		</tr>
	</thead>
	<tbody>
		<?php $no = 1; if( $get_data != null && $get_data->num_rows() != 0  ): ?>
			<?php foreach( $get_data->result() as $r ): ?>
				<tr>
					<td style="text-align:center;"><?php echo $no++; ?></td>
					<td><?php echo $r->nama_mapel ?></td>
					<td style="text-align:center;"></td>
				</tr>
			<?php endforeach; ?>
		<?php else : ?>
			<tr>
				<td colspan="3">DATA TIDAK TERSEDIA</td>
			</tr>
		<?php endif; ?>
		
	</tbody>
</table>