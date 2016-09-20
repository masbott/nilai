	<?php $b[0] = ' -- Pilih Semester / Tahun ajaran -- ';  ?>
<?php foreach( $get_data_semester->result() as $e ): ?>
	<?php $b[$e->id] = $e->nama_semester . ' - ' .$e->tahun; ?>
<?php endforeach; ?>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm btn-custome" data-toggle="modal" data-target="#myModal" style="margin-bottom:5px;">
	<i class="fa fa-plus"></i>
	  Tambah
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Mata Pelajaran</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo site_url('admin/mapel') ?>">
		  <div class="form-group">
		    <label for="exampleInputEmail1">Kode Mata Pelajaran</label>
		    <input type="text" class="form-control" name="kode_mapel" placeholder="Masukkan Kode Matapelajaran" required>
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Nama Mata Pelajaran</label>

		    <input type="text" class="form-control" name="nama_mapel" placeholder="Masukkan Nama Matapelajaran" required>
		  </div>

		  <div class="form-group">
		    <label for="exampleInputPassword1">Semester/tahun ajaran</label>
		    <?php echo form_dropdown('semester', $b, '' ,'class="form-control" required'); ?>

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


<?php if( $this->session->flashdata('msg_error')): ?>
	<div class="alert alert-danger" role="alert"><?php echo $this->session->flashdata('msg_error'); ?></div>
<?php endif; ?>

<?php if( $this->session->flashdata('msg_success')): ?>
	<div class="alert alert-success" role="alert"><?php echo $this->session->flashdata('msg_success'); ?></div>
<?php endif; ?>
<?php $z = $this->uri->segment(4);?>

<?php echo form_dropdown('semester', $b, $z ,'class="form-control" role="change-mapel" style="margin-bottom:5px;"'); ?>

<table class="table table-striped table-bordered" width="100%">
	<thead>
		<tr>
			<th width="2%">#</th>
			<th width="10%">Kode Matapelajaran</th>
			<th width="10%">Nama Matapelajaran</th>
			<th width="10%">Semester/Tahun ajaran</th>
			<th width="10%">Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $no = 1; if( $get_data_mapel->num_rows() != 0 ): ?>
			<?php foreach( $get_data_mapel->result() as $g ): ?>
				<tr>
					<td><?php echo $no++; ?></td>
					<td><?php echo $g->kode_mapel ?></td>
					<td><?php echo $g->nama_mapel ?></td>
					<td><?php echo $g->nama_semester ?> <?php echo $g->tahun ?></td>
					<td>
						<a href="" class="btn btn-xs btn-primary">
							<span>
								<i class="fa fa-pencil"></i>
							</span>
						</a>

						<a href="<?php echo site_url('admin/mapel/delete/'.$g->id_mapel) ?>" class="btn btn-xs btn-danger">
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
	</tbody>
</table>