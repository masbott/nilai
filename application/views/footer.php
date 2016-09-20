		  <script src="<?php echo base_url() ?>themes/js/jquery.js"></script>
      <script src="<?php echo base_url() ?>themes/js/bootstrap.min.js"></script>
      <script src="<?php echo base_url() ?>themes/js/jquery-migrate.min.js"></script>
      <script src="<?php echo base_url() ?>themes/js/Chart.js"></script>
      <script type="text/javascript">
    		$(document).ready(function(){
    			$('.btn-hapus').on('click', function(){
    				alert('Yakin akan menghapus data ini?');
    			});
    		});
		</script>

    <script type="text/javascript">
      $(document).ready(function(){
        $('.tahun').on('change', function(){
            var url = $(this).val();
            var currenturl = window.location;
            var merge = currenturl.toString().split('/kelas');
            window.location.href = merge[0]+'/kelas/index/'+url;
          });
      });
    </script>

    <script type="text/javascript">
      $(document).ready(function(){
        $('.dropdown-kelas').on('change', function(){
          // alert('hae');
          var url = $(this).val();
          var currenturl = window.location;
          var merge = currenturl.toString().split('/siswa');

          setTimeout(function(){
          window.location.href = merge[0]+'/siswa/index/'+url;
          },
          3000 , merge);
          $('#preloader').show();
        });
      });
      
    </script>
    
    <script type="text/javascript">
    $('[role="wali_kelas_update"]').on('change', function(){
      var nilai = $(this).val();
      var id = $(this).data('id');
      var method = $(this).data('method');

      $.post(
          '<?php echo site_url() ?>/admin/kelas/'+method,
          {nilai:nilai,id:id},
          function(data){
            // console.log(data); return false;
          }
        );
      // alert(id); 
      // alert('hae');return false;
    });
    </script>

    <script type="text/javascript">
    $('[role="change-mapel"]').on('change', function(){
      var url = $(this).val();
      var currenturl = window.location;
      var merge = currenturl.toString().split('/mapel');
      setTimeout(function(){
        window.location.href = merge[0]+'/mapel/index/'+url;
      },2000,merge);
      $('#preloader').show();
    });
    </script>

    <script type="text/javascript">
    $('[role="change-semester-ampu"]').on('change', function(){
      // alert('hae');
      var url = $(this).val();
      var currenturl = window.location;
      var merge = currenturl.toString().split('/ampu');
      setTimeout(function(){
        window.location.href = merge[0]+'/ampu/index/'+url;
      },2000,merge);
      $('#preloader').show();
    });
    </script>

    <script type="text/javascript">
    $('[role="change-semester-nilai"]').on('change', function(){
      // alert('hae');
      var url = $(this).val();
      var currenturl = window.location;
      var merge = currenturl.toString().split('/form_nilai');
      setTimeout(function(){
        window.location.href = merge[0]+'/form_nilai/index/'+url;  
      },2000,merge);
      $('#preloader').show();
    });
    </script>

    <script type="text/javascript">
    $('[role="change-semester-nilai-guru"]').on('change', function(){
      var url = $(this).val();
      
      var currenturl = window.location;
      var merge = currenturl.toString().split('/input_nilai');
      // var first = merge[0]+'/input_nilai/index/'+url+'/'+kelas;
      window.location.href = merge[0] + '/input_nilai/index/' + url;

      $('#change-semester-nilai-guru-2').on('change', function(){
        alert('hae');return false;
      var kelas = $(this).val();
      var first = merge[0]+'/input_nilai/index/'+url+'/'+kelas;
      
      window.location.href = first;
      });
    });
    </script>

    <script type="text/javascript">
    $(document).ready(function(){
      $('[role="auto-input"]').live('change', function(){
        // alert('hae');return false;
        var field = $(this).attr('name');
        var nilai = $(this).val();
        var method = $(this).data('method');
        var id = $(this).data('id');
        // alert(nilai); return false;

        if ( typeof id != 'undefined' ) {

        };

        $.post(
              '<?php echo site_url() ?>/guru/input_nilai/'+method,
                {field:field,nilai:nilai,id:id},
                  function(data) {
                    // console.log(data);
                    // console.log(data.rerata);
                    $('.data #rerata').text(data.rerata);
                  }

              );
      });  
    });
    </script>

    <script type="text/javascript">
      $('[role="set-rule"]').on('click', function(){
        setTimeout(function(){
        },
        5000);
        $('#preloader').show();
      });
    </script>

    <script type="text/javascript">
      $('[role="update-siswa"]').on('click',function(){
        var id = $(this).data('id');
        // console.log(id);return false;
        

        $.post(
            '<?php echo site_url() ?>admin/siswa/get_one',
            {id:id},
            function(data) {
                // console.log(data);return false;
               if ( id != 'undefined' ) {
                $('#modal-edit #id').val(data.id);
                $('#modal-edit #nis').val(data.nis);
                $('#modal-edit #nama_siswa').val(data.nama_siswa);
                $('#modal-edit #kelas').val(data.kelas);
                $('#modal-edit #agama').val(data.agama);
                $('#modal-edit #nama_ortu').val(data.nama_ortu);
                $('#modal-edit #alamat').text(data.alamat);
                <?php echo '$("#modal-edit").modal("show")'; ?>
              }; 

            }
          );
        
      });
    </script>

    <script type="text/javascript">
    $('[role="update-guru"]').on('click', function(){
      // alert('hae');
      var id = $(this).data('id');
      var method = $(this).data('method');
      // alert(id); return false;
      $.post(
          '<?php echo site_url() ?>admin/guru/'+method,
          {id:id},
          function(data) {
            // console.log(data);return false;
            if ( id != 'undefined' ) {
              $('#modal-edit-guru #id').val(data.id);
              $('#modal-edit-guru #nip').val(data.nip);
              $('#modal-edit-guru #nama_guru').val(data.nama_guru);
              <?php echo '$("#modal-edit-guru").modal("show")'; ?>  
            };
            
          }
        );
      
    });
    </script>