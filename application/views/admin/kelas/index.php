	<?php $b[0] = '-- Pilih wali kelas --'; ?>
<?php foreach( $wali_kelas->result_array() as $k ): ?>
	<?php $b[$k['id']] =  $k['nip'] .' - '.$k['nama_guru'] ?>
<?php endforeach; ?>

<?php $c[0] = '-- Pilih semester / tahun -- '; ?>
<?php foreach( $get_data_semester->result() as $e ): ?>
	<?php $c[$e->id] = $e->nama_semester . ' - ' . $e->tahun; ?>
<?php endforeach; ?>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm btn-custome" data-toggle="modal" data-target="#myModal">
<i class="fa fa-plus"></i>
  Tambah
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Kelas</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo site_url('admin/kelas') ?>">
		  <div class="form-group">
		    <label for="exampleInputEmail1">Nama Kelas</label>
		    <input type="text" class="form-control" name="nama_kelas" placeholder="Masukkan Nama Kelas">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Wali Kelas</label>

		    <?php echo form_dropdown('wali_kelas', $b , ''  , 'class="form-control"'); ?>
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


<table class="table table-striped table-bordered" width="100%">
	<thead>
		<tr>
			<th width="2%">#</th>
			<th width="10%">Nama Kelas</th>
			<th width="10%">Wali Kelas</th>
			<th width="10%">Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $no = 1; if( $get_data->num_rows() != 0 ): ?>
			<?php foreach( $get_data->result() as $d ): ?>
				<tr>
					<td style="text-align:center"><?php echo $no++; ?></td>
					<td><?php echo $d->nama_kelas ?></td>
					<td>
						<?php echo form_dropdown('wali_kelas', $b, $d->id_guru, 'class="form-control" role="wali_kelas_update" data-id="'.$d->id_kelas.'" data-method="update_wali_kelas"'); ?>
					</td>
					<td>
						<a href="<?php echo site_url('admin/kelas/delete/'.$d->id_kelas) ?>" class="btn btn-xs btn-danger">
							<span>
								<i class="fa fa-times"></i>
							</span>	
						</a>
					</td>
				</tr>
			<?php endforeach; ?>
		<?php else: ?>
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

