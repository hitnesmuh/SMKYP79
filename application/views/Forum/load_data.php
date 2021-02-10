<?php
function tanggal_indo($tanggal, $cetak_hari = false){
  $hari = array ( 1 =>    'Senin',
        'Selasa',
        'Rabu',
        'Kamis',
        'Jumat',
        'Sabtu',
        'Minggu'
      );
      
  $bulan = array (1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
      );
  $split    = explode('-', $tanggal);
  $tgl_indo = $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
  
  if ($cetak_hari) {
    $num = date('N', strtotime($tanggal));
    return $hari[$num] . ', ' . $tgl_indo;
  }
  return $tgl_indo;
}
?>

<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
  <?php
    foreach ($posting as $listposting) {
  ?>
    <div class="card shadow mb-4" id="posting<?php echo $listposting->id_posting ?>">
      <!-- Header Posting -->
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-white">
        <table>
          <tbody>
            <tr>
              <td rowspan="2" style="width: 50px; padding-right: 10px">
                <img class="rounded-circle" src="<?php echo base_url ('assets/img/profile/' . $listposting->foto_user) ?>" style="width: 50px; height:50px;">
              </td>
              <td>
                <h6 class="m-0 font-weight-bold text-primary"><?php echo $listposting->nama_user; ?></h6>
              </td>
            </tr>
            <tr>
              <td style="font-size: 10pt">
                <?php 
                $tanggal = date("Y-m-d", strtotime($listposting->waktu_posting));
                echo tanggal_indo($tanggal, true) . ' pukul ' . date("H.i", strtotime($listposting->waktu_posting)) ?>
              </td>
            </tr>
          </tbody>
        </table>
        <div class="dropdown no-arrow">
          <!-- <small class="text-secondary"><?php echo $edited = ($listposting->edit_status == 1) ? 'Telah disunting' : '' ; ?></small> -->
          <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-ellipsis-v fa-sm fa-fw text-dark"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
            <?php if ($this->session->userdata('id') == $listposting->id_user || $this->session->userdata('username') == 'admin') { ?>
              <a class="dropdown-item" id="edit<?php echo $listposting->id_posting ?>" href="#">Sunting</a>
              <a class="dropdown-item" id="hapus<?php echo $listposting->id_posting ?>" href="#">Hapus</a>
            <?php }else{ ?>
              <a class="dropdown-item" id="lapor<?php echo $listposting->id_posting ?>" href="#">Laporkan</a>
            <?php } ?>
          </div>
        </div>
      </div>
      <!-- Header Posting -->

      <!-- Isi Posting -->
      <div class="card-body">
        <div style="word-wrap: break-word;">
          <p id="isiposting<?php echo $listposting->id_posting ?>"><?php echo $listposting->isi_posting; ?><br>
            <!-- <small class="text-secondary"><?php echo $edited = ($listposting->edit_status == 1) ? '(Telah disunting)' : '' ; ?></small> -->
          </p>

          <form id="formedit<?php echo $listposting->id_posting ?>" method="POST" style="display: none">
            <textarea class="form-control mb-2" name="isiedit" id="isiedit<?php echo $listposting->id_posting ?>" style="color:#212121;resize:none;"><?php echo $listposting->isi_posting; ?></textarea>
            <div class="text-danger mb-2" style="display: none;" id="validasiedit<?php echo $listposting->id_posting ?>">Kiriman tidak boleh kosong</div>
            <div class="row">
              <div class="col">
                <button type="submit" class="btn btn-success btn-block">Sunting</button>
              </div>
              <div class="col">
                <button id="batal<?php echo $listposting->id_posting ?>" class="btn btn-secondary btn-block">Batal</button>
              </div>
            </div>
          </form>
        </div>

        <hr>

        <!-- Komentar -->
        <!-- <?php
          $id = $listposting->id_posting;
          $offset = 0;

          foreach ($comment as $komentar) {
            if ($komentar->status_posting == $id) {
        ?>
        <div class="card-body p-2" id="comment<?php echo $komentar->id_posting ?>">
          <div class="row">
            <div class="col-lg-1 p-0 pb-2">
              <img src="<?php echo base_url ('assets/img/profile/'.$komentar->foto_user) ?>" style="border-radius:100%; width: 40px; height:40px">
            </div>
            <div class="col-lg-11 pt-2 pb-2" style="background-color: #E9EBEE; border-radius: 20px">
              <div class="d-flex justify-content-between">
                <b><?php echo $komentar->nama_user; ?></b>
                <div class="dropdown no-arrow">
                  <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-h fa-sm fa-fw text-dark"></i>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                    <?php if ($this->session->userdata('id') == $komentar->id_user || $listposting->id_user || $this->session->userdata('username') == 'admin') { ?>
                      <a class="dropdown-item" id="hapuscom<?php echo $komentar->id_posting ?>" href="#">Hapus</a>
                    <?php }else{ ?>
                      <a class="dropdown-item" id="laporcom<?php echo $komentar->id_posting?>" href="#">Laporkan</a>
                    <?php } ?>
                  </div>
                </div>
              </div>
              <div>
                <?php echo $komentar->isi_posting; ?>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-1">
            </div>
            <div class="col-lg-11 pt-2" style="font-size: 10pt">
              <?php 
              $tanggal = date("Y-m-d", strtotime($komentar->waktu_posting));
              echo tanggal_indo($tanggal, true) . ' pukul ' . date("H.i", strtotime($komentar->waktu_posting))
              ?>
            </div>
          </div>
          
        </div>
        <?php
              $offset++;
            }
          }
        ?> -->
        <!-- End Komentar -->

        <div id="display_comment<?php echo $id ?>"></div>

        <!-- Form Komentar -->
        <form id="comment_form<?php echo $id ?>" method="POST">
          <table>
            <tbody>
              <tr>
                <div class="text-danger mb-2" style="display: none;" id="validasi<?php echo $id ?>">Komentar tidak boleh kosong</div>
                  <td style="padding-right: 10px; width: 100%">
                    <input type="hidden" name="status" value="<?php echo $id ?>">
                    <input type="hidden" name="id_kategori" value="<?php echo $kategori->id ?>">
                    <!-- <input type="hidden" name="offset" value="<?php echo $offset ?>"> -->
                    <input type="text" autocomplete="off" class="form-control-plaintext pt-2 pb-2 pr-3 pl-3" style="border-radius: 20px; background-color: #E9EBEE" name="isi" id="isi<?php echo $id ?>" placeholder="Tulis komentar...">
                  </td>
                  <td style="width: 70px">
                    <button type="submit" class="btn btn-primary">Kirim</button>
                  </td>
              </tr>
            </tbody>
          </table>
        </form>
        <!-- End Form Komentar -->

      </div>
    </div>
  <?php
    }
  ?>


<script>
    var limit = 0;

    function load_comment(id/*, limit, offset*/){
      $.ajax({
        url:"<?php echo site_url('Controller_forum/load_comment/'.$kategori->id) ?>",
        method:"POST",
        data:{id:id/*, limit:limit, offset:offset*/},
        cache: false,
        success:function(data){
          $('#display_comment'+id).html(data);
        }
      })
    }


    <?php foreach ($posting as $listposting) { ?>
      $(document).ready(function(){
        load_comment(<?php echo $listposting->id_posting; ?>);

        setInterval(function(){
          load_comment(<?php echo $listposting->id_posting; ?>);
        }, 5000);
      });

      $('#comment_form<?php echo $listposting->id_posting ?>').on('submit', function(event){
        event.preventDefault();
        var isi = $('#isi<?php echo $listposting->id_posting ?>').val();
        if ($.trim(isi) != ''){
          var form_data = $(this).serialize();
          $.ajax({
           url:"<?php echo site_url('Controller_forum/comment') ?>",
           method:"POST",
           data:form_data,
           dataType:"JSON",
           success:function(data){
            if (data.error == ''){
              limit++;
              /*var offset = data.offset;*/
              var id = data.id;
              $('#comment_form<?php echo $listposting->id_posting ?>')[0].reset();
              load_comment(id);
              alert('Komentar berhasil dikirim');
            }
           }
          });
        }else{
          $('#comment_form<?php echo $listposting->id_posting ?>')[0].reset();
          $('#validasi<?php echo $listposting->id_posting ?>').fadeIn('slow');
          setTimeout(function(){
            $('#validasi<?php echo $listposting->id_posting ?>').fadeOut('slow');
          }, 2000);
        }
      });

      $('#hapus<?php echo $listposting->id_posting ?>').on('click', function(event){
        event.preventDefault();
        var konfirmasi = confirm('Apakah Anda yakin akan menghapus kiriman ini?');
        if (konfirmasi) {
          $.ajax({
            url:"<?php echo site_url('Controller_forum/hapuspost') ?>",
            method:"POST",
            data:{id:<?php echo $listposting->id_posting; ?>},
            cache: false,
            dataType:"JSON",
            success:function(data){
              if (data.error == ''){
                $('#posting<?php echo $listposting->id_posting ?>').fadeOut('slow');
              }else{
                alert(data.error);
              }
            }
          });
        }
      });

      $('#edit<?php echo $listposting->id_posting ?>').on('click', function(event){
        event.preventDefault();
        $('#isiposting<?php echo $listposting->id_posting ?>').hide(100);
        $('#formedit<?php echo $listposting->id_posting ?>').show(100);

        $('#batal<?php echo $listposting->id_posting ?>').on('click', function(event){
          event.preventDefault();
          $('#isiposting<?php echo $listposting->id_posting ?>').show(100);
          $('#formedit<?php echo $listposting->id_posting ?>').hide(100);
        });

        $('#formedit<?php echo $listposting->id_posting ?>').on('submit', function(event){
          event.preventDefault();
          var edit = $('#isiedit<?php echo $listposting->id_posting ?>').val();
          if ($.trim(edit) != '') {
            var form_data = $(this).serialize();
            $.ajax({
             url:"<?php echo site_url('Controller_forum/editpost/'.$listposting->id_posting) ?>",
             method:"POST",
             data:form_data,
             dataType:"JSON",
             success:function(data){
              if (data.error == ''){
                $('#formedit<?php echo $listposting->id_posting ?>').hide('slow');     
                $('#isiposting<?php echo $listposting->id_posting ?>').html(edit)
                $('#isiposting<?php echo $listposting->id_posting ?>').show('slow');
              }else{
                alert(data.error);
              }
             }
            });
          }else{
            $('#formedit<?php echo $listposting->id_posting ?>')[0].reset();
            $('#validasiedit<?php echo $listposting->id_posting ?>').fadeIn('slow');
            setTimeout(function(){
              $('#validasiedit<?php echo $listposting->id_posting ?>').fadeOut('slow');
            }, 2000);
          }
        });
      });

      $('#lapor<?php echo $listposting->id_posting ?>').on('click', function(event){
        event.preventDefault();
        var konfirmasi = confirm('Apakah Anda yakin akan melaporkan kiriman ini?');
        if (konfirmasi) {
          $.ajax({
            url: "<?php echo site_url('Controller_forum/reportpost') ?>",
            method: "POST",
            data: {id_posting:<?php echo $listposting->id_posting?>, id_user:<?php echo $this->session->userdata('id')?>},
            dataType: "JSON",
            success:function(data){
              if (data.error == ''){
                alert('Kiriman berhasil dilaporkan');
              }else{
                alert('Terjadi kesalahan');
              }
            }
          });
        }
      });

    <?php } ?>

    /*<?php foreach ($comment as $komentar) {?>
      $('#hapuscom<?php echo $komentar->id_posting?>').on('click', function(event){
        event.preventDefault();
        var konfirmasi = confirm('Apakah Anda yakin akan menghapus komentar ini?');
        if (konfirmasi) {
          $.ajax({
            url:"<?php echo site_url('Controller_home/hapuscomment') ?>",
            method:"POST",
            data:{id:<?php echo $komentar->id_posting; ?>},
            cache: false,
            dataType:"JSON",
            success:function(data){
              if (data.error == ''){
                $('#comment<?php echo $komentar->id_posting ?>').fadeOut('slow');
              }else{
                alert(data.error);
              }
            }
          });
        }
      });

      $('#laporcom<?php echo $komentar->id_posting ?>').on('click', function(event){
        event.preventDefault();
        var konfirmasi = confirm('Apakah Anda yakin akan melaporkan komentar ini?');
        if (konfirmasi) {
          $.ajax({
            url: "<?php echo site_url('Controller_home/reportcomment') ?>",
            method: "POST",
            data: {id_posting:<?php echo $komentar->id_posting?>, id_user:<?php echo $this->session->userdata('id')?>},
            dataType: "JSON",
            success:function(data){
              if (data.error == ''){
                alert('Komentar berhasil dilaporkan');
              }else{
                alert(data.error);
              }
            }
          });
        }
      });
    <?php } ?>*/
</script>
</body>
</html>