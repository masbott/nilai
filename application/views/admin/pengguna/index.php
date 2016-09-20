<div>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Guru</a></li>
    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Wali Kelas</a></li>
    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Siswa</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="home">

      <form action="" method="post">
        <input type="submit" name="submit-guru" class="btn btn-sm btn-primary" value="Sinkron" style="margin-top:10px;">
      </form>
      <?php echo $this->session->flashdata('sukses'); ?>
      <table class="table table-striped table-bordered" style="margin-top:15px;" width="100%">
        <thead>
          <tr>
            <th style="text-align:center;" width="2%">#</th>
            <th style="text-align:center;" width="5%">NIP</th>
            <th style="text-align:center;" width="5%">Nama Guru</th>
            <th style="text-align:center;" width="5%">Username</th>
            <th style="text-align:center;" width="5%">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; if( $get_pengguna_guru->num_rows() > 0 ): ?>
            <?php foreach( $get_pengguna_guru->result() as $g ): ?>
              <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $g->nip ?></td>
                <td><?php echo $g->nama_guru ?></td>
                <td><?php echo $g->username ?></td>
                <td>
                  <a href="" class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i></a>
                  <a href="" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
                  <a href="" class="btn btn-xs btn-warning"><i class="fa fa-refresh"></i></a>
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
    </div>
    <div role="tabpanel" class="tab-pane" id="profile">

    </div>
    <div role="tabpanel" class="tab-pane" id="messages">
      <button class="btn btn-sm btn-primary" style="margin-top:5px;"><i class="fa fa-plus"></i> Tambah</button>
    	<table class="table table-striped table-bordered" style="margin-top:5px;" width="100%">
    		<thead>
    			<tr>
    				<th width="2%" style="text-align:center;">#</th>
    				<th width="5%" style="text-align:center;">NIS</th>
    				<th width="5%" style="text-align:center;">Nama Siswa</th>
    				<th width="5%" style="text-align:center;">Username</th>
    				<th width="5%" style="text-align:center;">Aksi</th>
    			</tr>
    		</thead>
        <tbody>
          <?php $no = 1; if( $get_pengguna_siswa->num_rows() > 0 ): ?>
            <?php foreach( $get_pengguna_siswa->result() as $s ): ?>
              <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo  $s->nis ?></td>
                <td><?php echo $s->nama_siswa ?></td>
                <td><?php echo $s->username; ?></td>
                <td></td>
              </tr>
            <?php endforeach; ?>
          <?php endif; ?>
        </tbody>
    	</table>
    </div>
  </div>

</div>