	
<?php if( $semester->num_rows() != 0 ): ?>		
		<?php $sem[0] = ' -- Pilih semester / Tahun ajaran --'; ?>
	<?php foreach( $semester->result() as $s ): ?>
		<?php $sem[$s->id] = $s->nama_semester .' - ' .$s->tahun; ?>
	<?php endforeach; ?>
<?php endif; ?>

<?php echo form_dropdown('semester', $sem, $this->uri->segment(4) ,'class="form-control" role="change-semester-nilai" style="margin-bottom:5px;"'); ?>

<table class="table table-striped table-bordered" width="100%">
	<thead>
		<tr>
			<th width="2%">#</th>
			<th width="10%">Matapelajaran</th>
			<th width="10%">Keterangan</th>
		</tr>
	</thead>
	<tbody>
		<?php $no = 1; if( $get_data->num_rows() != 0 ): ?>
			<?php foreach( $get_data->result() as $d ): ?>
				<?php if( $d->uh1 == NULL || $d->uh2 == NULL || $d->nt1 == NULL || $d->nt2 == NULL ): ?>
					<?php $keterangan = '<span class="btn btn-xs btn-danger">Tidak Tersedia</span>'; ?>
				<?php else : ?>
					<?php $keterangan = '<span class="btn btn-xs btn-success">Tersedia</span>'; ?>
				<?php endif; ?>
				<tr>
					<td><?php echo $no++ ?></td>
					<td><?php echo $d->nama_mapel; ?></td>
					<td><?php echo $keterangan ?></td>
				</tr>
			<?php endforeach; ?>
		<?php else : ?>
			<tr>
				<td colspan="3">DATA TIDAK TERESEDIA</td>
			</tr>
		<?php endif; ?>
	</tbody>
</table>

<form action="" method="post">
	<input type="submit" class="btn btn-sm btn-primary" name="submit" value="Siapkan">
</form>