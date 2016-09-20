	<?php $mapel[0] = '-- Pilih Matapelajaran --'; ?>
<?php foreach( $get_data_mapel->result_array() as $m ): ?>
	<?php $mapel[$m['id']] = $m['kode_mapel'] . ' - ' .$m['nama_mapel']; ?>
<?php endforeach; ?>
	
	<?php $semester[0] = ' -- Pilih Semester/Tahun ajaran --'; ?>
<?php foreach( $get_data_semester->result_array() as $s ): ?>
	<?php $semester[$s['id']] = $s['nama_semester'] . ' - ' .$s['tahun']; ?>
<?php endforeach; ?>
	<?php //echo '<pre>'; print_r( $semester );exit(); ?>
	
	<?php $guru[0] = '-- Pilih Guru --'; ?>
<?php foreach( $get_data_guru->result_array() as $t ): ?>
	<?php $guru[$t['id']] = $t['nip'] .' - '. $t['nama_guru']; ?>
<?php endforeach; ?>

<button type="button" class="btn btn-primary btn-sm btn-custome" data-toggle="modal" data-target="#myModal" style="margin-bottom:5px;">
	<i class="fa fa-plus"></i>
	  Tambah
</button>

<!--begin modal-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Pengampu Matapelajaran</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo site_url('admin/ampu') ?>">
		  <div class="form-group">
		    <label for="exampleInputEmail1">Nama Guru</label>
		    <?php echo form_dropdown('nip', $guru, '' , 'class="form-control"'); ?>
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Nama Mata Pelajaran</label>
		    <?php echo form_dropdown('mapel', $mapel, '' , 'class="form-control"'); ?>
		  </div>

		  <div class="form-group">
		  	<label>Kelas</label>
		  </div>

		  <div class="checkbox">
		  	<?php if( $get_data_kelas->num_rows() != 0 ): ?>
		  		<?php foreach( $get_data_kelas->result() as $k ): ?>
		  			<label>
				      <input type="checkbox" name="kelas[]" value="<?php echo $k->id ?>"> <?php echo $k->nama_kelas ?>
				    </label>
		  		<?php endforeach; ?>
		 	<?php endif; ?>
		    
		  </div>

		  <div class="form-group">
		    <label for="exampleInputPassword1">Semester/tahun ajaran</label>
		    <?php echo form_dropdown('semester', $semester, '' ,'class="form-control" required'); ?>

		  </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Batal</button>
        <input type="submit" name="submit" class="btn btn-primary btn-sm" value="Tambah">
      </div>
      </form>
    </div>
  </div>
</div>
<!--end modal-->

<?php echo form_dropdown('semester', $semester, $this->uri->segment(4) , 'role="change-semester-ampu" class="form-control" style=margin-bottom:5px;'); ?>
<form action="<?php echo site_url('admin/ampu') ?>" method="post">
<table class="table table-striped table-bordered" width="100%">
	<thead>
		<tr>
			<th width="2%">#</th>
			<th width="10%">Nama Guru</th>
			<th width="10%">Nama Matapelajaran</th>
			<th width="10%">Kelas</th>
			<th width="10%">Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $no = 1;  ?>
			<?php if( !empty( $result_get_data_ampu ) ): ?>
				<?php foreach( $result_get_data_ampu as $g ): ?>
					<tr>
						<td><?php echo $no++; ?></td>
						<td><?php echo $g['nama_guru'] ?></td>
						<td><?php echo $g['nama_mapel'] ?></td>
						<td>
							<ol>
								<?php foreach( $g['nama_kelas'] as $q ): ?>
									<li><?php echo $q ?></li>
								<?php endforeach; ?>
							</ol>
						</td>
						<td>
							<a href="" class="btn btn-xs btn-primary">
								<span>
									<i class="fa fa-pencil"></i>
								</span>
							</a>

							<a href="<?php //echo site_url('admin/mapel/delete/'.$g->id_mapel) ?>" class="btn btn-xs btn-danger">
								<span>
									<i class="fa fa-times"></i>
								</span>
							</a>
						</td>
					</tr>
				<?php endforeach; ?>
			<?php else : ?>
				<tr>
					<td colspan="5">DATA TIDAK TERSEDIA</td>
				</tr>
			<?php endif; ?>
		<?php //endif; ?>
	</tbody>
</table>
</form>
