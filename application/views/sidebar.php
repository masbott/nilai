      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <!--begin menu administrator-->
              <?php $get_rule_user = $this->session->all_userdata();?>

              <?php if( $get_rule_user['level'] == 1 ): ?>
                <ul class="sidebar-menu" id="nav-accordion">
                	  <h5 class="centered"><?php echo get_name_login_admin(); ?></h5>
                    <h6 style="color:#fff; padding-left:5px;">Anda masuk sebagai : <?php echo get_name_level_user(); ?></h6>
                	  	
                    <li>
                        <a class="" href="index.html">
                            <i class="fa fa-dashboard"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('admin/kelas') ?>" class="<?php if( $this->uri->segment(2) == 'kelas' ): echo 'active'; else : echo null; endif; ?>">
                            <i class="fa fa-dashboard"></i>
                            <span>Kelas</span>
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('admin/guru') ?>" class="<?php if( $this->uri->segment(2) == 'guru' ): echo 'active'; else : echo null; endif; ?>">
                            <i class="fa fa-dashboard"></i>
                            <span>Guru</span>
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('admin/siswa') ?>" class="<?php if( $this->uri->segment(2) == 'siswa' ): echo 'active'; else : echo null; endif; ?>">
                            <i class="fa fa-dashboard"></i>
                            <span>Siswa</span>
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('admin/mapel') ?>" class="<?php if( $this->uri->segment(2) == 'mapel' ): echo 'active'; else : echo null; endif; ?>">
                            <i class="fa fa-dashboard"></i>
                            <span>Mata Pelajaran</span>
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('admin/ampu') ?>" class="<?php if( $this->uri->segment(2) == 'ampu' ): echo 'active'; else : echo null; endif; ?>">
                            <i class="fa fa-dashboard"></i>
                            <span>Pengampu</span>
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('admin/form_nilai') ?>" class="<?php if( $this->uri->segment(2) == 'form_nilai' ): echo 'active'; else : echo null; endif; ?>">
                            <i class="fa fa-dashboard"></i>
                            <span>Form Input Nilai</span>
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('admin/pengguna') ?>" class="<?php if( $this->uri->segment(2) == 'pengguna' ): echo 'active'; else : echo null; endif; ?>">
                            <i class="fa fa-dashboard"></i>
                            <span>Pengguna</span>
                        </a>
                    </li>

                </ul>
              <?php endif; ?>
              <!-- sidebar menu end-->

              <!--end menu administrator-->

              <!--begin menu guru-->
              <?php if( $get_rule_user['level'] == 2 ): ?>
                <ul class="sidebar-menu" id="nav-accordion">

                    <p class="centered">
                      <a href="profile.html">
                        <img src="<?php echo base_url() ?>/themes/image/ui-sam.jpg" alt="..." class="img-circle">
                      </a>
                    </p>

                    <h5 class="centered"><?php echo get_name_login_guru(); ?></h5>
                    <h6 style="color:#fff; padding-left:5px;">Anda masuk sebagai : <?php echo get_name_level_user(); ?></h6>

                  <li>
                    <a href="<?php echo site_url('guru/home') ?>" class="<?php if( $this->uri->segment(2) == 'home' ): echo 'active'; else : echo null; endif; ?>">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                  </li>
                  
                  <li>
                    <a href="<?php echo site_url('guru/input_nilai') ?>" class="<?php if( $this->uri->segment(2) == 'input_nilai' ): echo 'active'; else : echo null; endif; ?>">
                        <i class="fa fa-dashboard"></i>
                        <span>Form Input Nilai</span>
                    </a>
                  </li>

                  <li>
                    <a href="<?php echo site_url('pengaturan/index') ?>" class="<?php if( $this->uri->segment(1) == 'pengaturan' ): echo 'active'; else : echo null; endif; ?>">
                      <i class="fa fa-gear"></i>
                      <span>Pengaturan</span>
                    </a>
                  </li>
                    
                </ul>
              <?php endif; ?>
              <!--end menu guru-->

              <!--beign menu siswa-->
              <?php if( $get_rule_user['level'] == 3 ): ?>
                <ul class="sidebar-menu" id="nav-accordion">

                    <p class="centered">
                      <a href="profile.html">
                        <img src="<?php echo base_url() ?>/themes/image/ui-sam.jpg" alt="..." class="img-circle">
                      </a>
                    </p>

                    <h5 class="centered"><?php echo isset( get_nama_siswa()->nis ) ?  get_nama_siswa()->nis .' - '. get_nama_siswa()->nama_siswa : null; ?></h5>
                    <h6 style="color:#fff; padding-left:5px;">Anda masuk sebagai : <?php echo get_name_level_user(); ?></h6>
                  <li>
                    <a href="<?php echo site_url('siswa/home') ?>" class="<?php if( $this->uri->segment(2) == 'home' ): echo 'active'; else : echo null; endif; ?>">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                  </li>
                  
                  <li>
                    <a href="<?php echo site_url('siswa/hasil_belajar') ?>" class="<?php if( $this->uri->segment(2) == 'hasil_belajar' ): echo 'active'; else : echo null; endif; ?>">
                        <i class="fa fa-dashboard"></i>
                        <span>Hasil Belajar</span>
                    </a>
                  </li>

                  <li>
                    <a href="<?php echo site_url('pengaturan/index') ?>" class="<?php if( $this->uri->segment(1) == 'pengaturan' ): echo 'active'; else : echo null; endif; ?>">
                      <i class="fa fa-gear"></i>
                      <span>Pengaturan</span>
                    </a>
                  </li>

                </ul>
              <?php endif; ?>
              <!--end menu siswa-->

              <!--begin menu wali kelas-->
              <?php if( $get_rule_user['level'] == 4 ): ?>
                <ul class="sidebar-menu" id="nav-accordion">
                
                    <p class="centered">
                      <a href="profile.html">
                        <img src="<?php echo base_url() ?>/themes/image/ui-sam.jpg" alt="..." class="img-circle">
                      </a>
                    </p>
                    
                    <h5 class="centered"><?php echo get_nama_wali_kelas(); ?></h5>
                    <h6 style="color:#fff; padding-left:5px;">Anda masuk sebagai : <?php echo get_name_level_user(); ?></h6>

                    <li>
                        <a class="" href="#">
                            <i class="fa fa-dashboard"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('wali_kelas/daftar_nilai/index') ?>" class="<?php if( $this->uri->segment(2) == 'daftar_nilai' ): echo 'active'; else : echo null; endif; ?>">
                            <i class="fa fa-book"></i>
                            <span>Daftar Nilai</span>
                        </a>
                    </li>

                    <li>
                      <a href="<?php echo site_url('pengaturan/index') ?>" class="<?php if( $this->uri->segment(1) == 'pengaturan' ): echo 'active'; else : echo null; endif; ?>">
                        <i class="fa fa-gear"></i>
                        <span>Pengaturan</span>
                      </a>
                    </li>

                </ul>
              <?php endif; ?>
              <!--end menu wali kelas-->
          </div>
      </aside>
      <!--sidebar end-->