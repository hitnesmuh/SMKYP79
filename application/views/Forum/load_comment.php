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

  foreach ($comment as $komentar) {
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
            <?php if ($this->session->userdata('id') == $komentar->id_user || $this->session->userdata('username') == 'admin') { ?>
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

<script>
  $('#hapuscom<?php echo $komentar->id_posting?>').on('click', function(event){
    event.preventDefault();
    var konfirmasi = confirm('Apakah Anda yakin akan menghapus komentar ini?');
    if (konfirmasi) {
      $.ajax({
        url:"<?php echo site_url('Controller_forum/hapuscomment') ?>",
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
        url: "<?php echo site_url('Controller_forum/reportcomment') ?>",
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
</script>

<?php
  }
?>
