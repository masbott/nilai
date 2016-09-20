
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

<table class="table table-striped table-bordered" width="100%">
	<thead>
		<tr>
			<th style="text-align:center;font-weight:normal;" rowspan="2" width="2%">#</th>
			<th style="text-align:center;font-weight:normal;" rowspan="2" width="5%">Siswa</th>
			<th style="text-align:center;font-weight:normal;" colspan="4" width="20%">Ulangan Harian</th>
			<th style="text-align:center;font-weight:normal;" colspan="4" width="20%">Nilai Tugas</th>
			<th style="text-align:center;font-weight:normal;" rowspan="2" width="5%">Ujian Tengah Semester</th>
			<th style="text-align:center;font-weight:normal;" rowspan="2" width="5%">Ujian Akhir Semester</th>
		</tr>
		<tr>
			<th style="text-align:center;font-weight:normal;">1</th>
			<th style="text-align:center;font-weight:normal;">2</th>
			<th style="text-align:center;font-weight:normal;">3</th>
			<th style="text-align:center;font-weight:normal;">4</th>
			<th style="text-align:center;font-weight:normal;">1</th>
			<th style="text-align:center;font-weight:normal;">2</th>
			<th style="text-align:center;font-weight:normal;">3</th>
			<th style="text-align:center;font-weight:normal;">4</th>
		</tr>
	</thead>
	<tbody>
		<?php $no = 1; if( !empty( $get_data ) ): ?>
			<?php foreach( $get_data->result() as $d ): ?>
				<tr>
					<td><?php echo $no++ ?></td>
					<td><?php echo $d->nama_siswa ?></td>
					<td><?php echo $d->uh1 ?></td>
					<td><?php echo $d->uh2 ?></td>
					<td><?php echo $d->uh3 ?></td>
					<td><?php echo $d->uh4 ?></td>
					<td><?php echo $d->nt1 ?></td>
					<td><?php echo $d->nt2 ?></td>
					<td><?php echo $d->nt3 ?></td>
					<td><?php echo $d->nt4 ?></td>
					<td><?php echo $d->uts ?></td>
					<td><?php echo $d->uas ?></td>
				</tr>
			<?php endforeach; ?>
		<?php else : ?>
			<tr>
				<td colspan="12">DATA TIDAK TERSEDIA</td>
			</tr>
		<?php endif; ?>
	</tbody>
</table>