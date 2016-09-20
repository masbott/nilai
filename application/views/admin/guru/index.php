<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm btn-custome" data-toggle="modal" data-target="#myModal">
<i class="fa fa-plus"></i>
  Tambah
</button>

<!-- begin modal add -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Guru</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo site_url('admin/guru/index') ?>">
		  <div class="form-group">
		    <label for="exampleInputEmail1">NIP</label>
		    <input type="text" class="form-control" name="nip" placeholder="Masukkan NIP" required="">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Nama Guru</label>
		    <input type="text" class="form-control" name="nama_guru" placeholder="Masukkan Nama Guru" required="">
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
<!--end modal add-->

<!--begin modal edit-->
<div class="modal fade" id="modal-edit-guru" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Guru</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo site_url('admin/guru/index') ?>">
		  <div class="form-group">
		    <label for="exampleInputEmail1">NIP</label>
		    <input type="text" class="form-control" name="nip" id="nip" placeholder="Masukkan NIP" required="">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Nama Guru</label>
		    <input type="text" class="form-control" name="nama_guru" id="nama_guru" placeholder="Masukkan Nama Guru" required="">
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
<!--end modal edit-->

<?php if( $this->session->flashdata('msg_error')): ?>
	<div class="alert alert-danger" role="alert"><?php echo $this->session->flashdata('msg_error'); ?></div>
<?php endif; ?>

<?php if( $this->session->flashdata('msg_success')): ?>
	<div class="alert alert-success" role="alert"><?php echo $this->session->flashdata('msg_success'); ?></div>
<?php endif; ?>

<table class="table table-striped table-bordered" width="100%">
	<thead>
		<tr>
			<th width="2%">#</th>
			<th width="10%">NIP</th>
			<th width="10%">Nama Guru</th>
			<th width="10%">Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $no = 1; if( $get_guru->num_rows() != 0 ): ?>
			<?php foreach( $get_guru->result() as $g ): ?>
				<tr>
					<td style="text-align:center;"><?php echo $no++ ?></td>
					<td><?php echo $g->nip ?></td>
					<td><?php echo $g->nama_guru ?></td>
					<td>
						<button class="btn btn-xs btn-primary" role="update-guru" data-id="<?php echo $g->id ?>" data-method="getone">
							<i class="fa fa-pencil"></i>
						</button>

						<a href="<?php echo site_url('admin/guru/delete/'.$g->id) ?>" class="btn btn-xs btn-danger btn-hapus">
							<i class="fa fa-times"></i>
						</a>

					</td>
				</tr>
			<?php endforeach; ?>
		<?php else : ?>
			<tr>
				<td colspan="4">DATA TIDAK TERSEDIA</td>
			</tr>
		<?php endif; ?>
	</tbody>
</table>

<style type="text/css">
	.btn-custome {
		margin-bottom: 5px;
	}
</style>