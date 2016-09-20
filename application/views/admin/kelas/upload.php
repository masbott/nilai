<?php echo form_open_multipart('admin/kelas/upload','class="form-horizontal"'); ?>
<div class="form-group">
	<label for="">Dokumen 1 </label>
	<input type="file" name="images[]">	
</div>

<div class="form-group">
	<label for="">Dokumen 2 </label>
	<input type="file" name="images[]">	
</div>

<input type="submit" class="btn btn-parimary btn-sm" name="submit" value="upload">
<?php echo form_close(); ?>