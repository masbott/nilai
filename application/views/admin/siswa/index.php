	<?php $c[0] = ' -- Pilih Kelas -- '; ?>
<?php foreach( $get_data_kelas->result() as $e ): ?>
	<?php $c[$e->id] = $e->nama_kelas; ?>
<?php endforeach; ?>

	<?php $d[0] = ' -- Pilih Agama --'; ?>
<?php foreach(  $get_data_agama->result() as $g ): ?>
	<?php $d[$g->id] = $g->deskripsi; ?>
<?php endforeach; ?>

<?php $x = $this->uri->segment(4); ?>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm btn-custome" data-toggle="modal" data-target="#myModal" style="margin-bottom:5px;">
	<i class="fa fa-plus"></i>
	  Tambah
</button>

<!-- Begin modal add -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Siswa</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo site_url('admin/siswa/index/'.$x) ?>">
		  <div class="form-group">
		    <label for="exampleInputEmail1">NIS</label>
		    <input type="text" class="form-control" name="nis" placeholder="Masukkan NIS" required>
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Nama Siswa</label>

		    <input type="text" class="form-control" name="nama_siswa" placeholder="Masukkan Nama Siswa" required>
		  </div>

		  <div class="form-group">
		    <label for="exampleInputPassword1">Kelas</label>
		    <?php echo form_dropdown('kelas', $c, '' ,'class="form-control" required'); ?>
		  </div>

		  <div class="form-group">
		    <label for="exampleInputPassword1">Kelas</label>
		    <?php echo form_dropdown('agama', $d, '' ,'class="form-control" required'); ?>

		  </div>

		  <div class="form-group">
		    <label for="exampleInputPassword1">Nama Orang Tua</label>
		    <input type="text" class="form-control" name="nama_ortu" placeholder="Masukkan Nama Orang Tua">
		  </div>

		  <div class="form-group">
		    <label for="exampleInputPassword1">Alamat</label>
		    <textarea class="form-control" name="alamat" id="" cols="10" rows="5"></textarea>
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
<!--End modal add-->

<!--Begin modal edit-->
<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Siswa</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="">
		  <div class="form-group">
		    <label for="exampleInputEmail1">NIS</label>
		    <input type="text" class="form-control" name="nis" id="nis" placeholder="Masukkan NIS" required>
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Nama Siswa</label>

		    <input type="text" class="form-control" name="nama_siswa" id="nama_siswa" placeholder="Masukkan Nama Siswa" required>
		  </div>

		  <div class="form-group">
		    <label for="exampleInputPassword1">Kelas</label>
		    <?php echo form_dropdown('kelas', $c, '' ,'class="form-control" id="kelas" required'); ?>
		  </div>

		  <div class="form-group">
		    <label for="exampleInputPassword1">Kelas</label>
		    <?php echo form_dropdown('agama', $d, '' ,'class="form-control" id="agama" required'); ?>

		  </div>

		  <div class="form-group">
		    <label for="exampleInputPassword1">Nama Orang Tua</label>
		    <input type="text" class="form-control" name="nama_ortu" id="nama_ortu" placeholder="Masukkan Nama Orang Tua">
		  </div>

		  <div class="form-group">
		    <label for="exampleInputPassword1">Alamat</label>
		    <textarea class="form-control" name="alamat" id="alamat" cols="10" rows="5"></textarea>
		  </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Batal</button>
        <input type="submit" name="submit-update" class="btn btn-primary btn-sm" value="Ubah">
        <input type="hidden" name="id" id="id">
      </div>
      </form>
    </div>
  </div>
</div>
<!--End modal edit-->

<?php if( $this->session->flashdata('msg_error')): ?>
	<div class="alert alert-danger" role="alert"><?php echo $this->session->flashdata('msg_error'); ?></div>
<?php endif; ?>

<?php if( $this->session->flashdata('msg_success')): ?>
	<div class="alert alert-success" role="alert"><?php echo $this->session->flashdata('msg_success'); ?></div>
<?php endif; ?>



<?php echo form_dropdown('kelas', $c, $x ,'class="form-control dropdown-kelas" style="margin-bottom:5px;"'); ?>

<table class="table table-striped table-bordered" width="100%">
	<thead>
		<tr>
			<th>#</th>
			<th>NIS</th>
			<th>Nama Siswa</th>
			<th>Nama Orang Tua</th>
			<th>Alamat</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $no = 1; if( $get_data_siswa->num_rows() != 0 ): ?>
			<?php //echo '<pre>'; print_r( $get_data_siswa->result() );exit(); ?>
			<?php foreach( $get_data_siswa->result() as $d ): ?>
				<tr>
					<td><?php echo $no++; ?></td>
					<td><?php echo $d->nis; ?></td>
					<td><?php echo $d->nama_siswa; ?></td>
					<td><?php echo $d->nama_ortu; ?></td>
					<td><?php echo $d->alamat; ?></td>
					<td>
						<a href="#" class="btn btn-xs btn-primary" role="update-siswa" data-id="<?php echo $d->id_siswa ?>">
							<span>
								<i class="fa fa-pencil"></i>
							</span>
						</a>
						<a href="<?php echo site_url('admin/siswa/index/'.$d->id_siswa) ?>" class="btn btn-xs btn-danger">
							<span>
								<i class="fa fa-times"></i>
							</span>
						</a>
					</td>
				</tr>
			<?php endforeach; ?>
		<?php else : ?>
			<tr>
				<td colspan="6">SILAHKAN PILIH KELAS TERLEBIH DAHULU</td>
			</tr>
		<?php endif; ?>
	</tbody>
</table>