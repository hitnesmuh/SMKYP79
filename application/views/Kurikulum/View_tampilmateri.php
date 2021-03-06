<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Materi <?php echo $matapelajaran->nama; ?></title>
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('assets/img/icon.ico'); ?>">
  
  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url('assets/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url('assets/css/fontfamily.css') ?>" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url('assets/css/sb-admin-2.min.css') ?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/vendor/datatables/dataTables.bootstrap4.min.css') ?>" rel="stylesheet">
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <img style="height: 40px" src="<?php echo base_url('assets/img/logo.png') ?>">
        <div class="sidebar-brand-text mx-1">
          SMK YP 79 Majalaya
        </div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('kurikulum') ?>">
          <i class="fas fa-fw fa-home"></i>
          <span>Beranda</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('kurikulum/tampilpelatihan') ?>">
          <i class="fas fa-fw fa-dumbbell"></i>
          <span>Pelatihan</span></a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="<?php echo site_url('kurikulum/tampilmatapelajaran') ?>">
          <i class="fas fa-fw fa-book"></i>
          <span>Mata Pelajaran</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('kurikulum/tampilforum') ?>">
          <i class="fas fa-fw fa-comments"></i>
          <span>Forum</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Hello, <b><?php echo $this->session->userdata('nama'); ?></b></span>
                <img class="img-profile rounded-circle" src="<?php echo base_url('assets/img/profile/'.$this->session->userdata('foto')) ?>">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="<?php echo site_url('profile') ?>">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <div class="row">
                <div class="col">
                  <h3 class="m-0 font-weight-bold text-primary">Daftar Materi <?php echo $matapelajaran->nama; ?></h3>
                </div>
                <div class="col-auto">
                    <a href="<?php echo site_url('kurikulum/tampilmatapelajaran') ?>" class="btn btn-sm btn-secondary btn-icon-split">
                      <span class="icon">
                          <i class="fa fa-arrow-left"></i>
                      </span>
                      <span class="text">
                        Kembali
                      </span>
                    </a>
                  </div>
              </div>
              <span><?php echo $this->session->flashdata('message'); ?></span>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="dataTable1" width="100%" cellspacing="0">
                  <thead class="text-center">
                    <tr>
                      <th class="align-middle">No</th>
                      <th class="align-middle">Pembuat</th>
                      <th class="align-middle">Nama Materi</th>
                      <th class="align-middle">Uraian Singkat</th>
                      <th class="align-middle">Berkas</th>
                      <!-- <th class="align-middle">Aksi</th> -->
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $no = 1;
                      foreach ($materi as $datmateri) {
                    ?>
                    <tr>
                      <td class="align-middle text-center" width="30"><?php echo $no; ?></td>
                      <td class="align-middle"><?php echo $datmateri->nama_guru; ?></td>
                      <td class="align-middle"><?php echo $datmateri->nama; ?></td>
                      <td class="align-middle"><?php echo $datmateri->uraian_singkat; ?></td>
                      <td class="align-middle text-center"><a class="btn btn-circle btn-primary" href="<?php echo base_url('uploads/materi/'.$datmateri->file) ?>"><i class="fas fa-fw fa-download"></i></a></td>
                      <!-- <td class="align-middle text-center">
                        <a href="#" onclick="hapus('<?php echo $datmateri->nama ?>', '<?php echo $datmateri->id ?>')" class="btn btn-danger btn-circle m-1"><i class="fa fa-fw fa-trash"></i></a>
                        <a href="<?php echo site_url('guru/suntingmateri/'.$datmateri->id.'/'.$matapelajaran->id) ?>" class="btn btn-success btn-circle m-1"><i class="fa fa-fw fa-edit"></i></a>
                      </td> -->
                    </tr>
                    <?php
                        $no++; }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>SMK YP 79 Majalaya <?php echo date('Y'); ?></span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Yakin mau logout?</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                  </button>
              </div>
              <div class="modal-body">Klik "logout" untuk keluar.</div>
              <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <a class="btn btn-danger" href="<?php echo site_url('logout') ?>">Logout</a>
              </div>
          </div>
      </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url('assets/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url('assets/js/sb-admin-2.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/vendor/datatables/jquery.dataTables.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/vendor/datatables/dataTables.bootstrap4.min.js') ?>"></script>

  <script>
    $(document).ready(function() {
      $('#dataTable1').DataTable();
    });

    <?php
      foreach ($materi as $datmateri) {
    ?>
      function hapus(judul, id) {
        var konfirmasi = confirm("Apakah Anda yakin akan menghapus pelatihan " + judul);
        if (konfirmasi){
          window.location.replace("<?php echo site_url('Controller_guru/hapusmateri/') ?>" + id);
        }else{
          return false;
        }
      }
    <?php } ?>

  </script>

</body>
</html>