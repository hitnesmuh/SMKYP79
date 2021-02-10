<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Kata Dasar</title>
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
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo site_url('admin') ?>">
        <img style="height: 40px" src="<?php echo base_url('assets/img/logo.png') ?>">
        <div class="sidebar-brand-text mx-1">
          SMK YP 79 Majalaya
        </div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('admin') ?>">
          <i class="fas fa-fw fa-users"></i>
          <span>Pengguna</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('admin/kategori') ?>">
          <i class="fas fa-fw fa-list"></i>
          <span>Kategori</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('admin/tampilmodul') ?>">
          <i class="fas fa-fw fa-dumbbell"></i>
          <span>Pelatihan</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('admin/matapelajaran') ?>">
          <i class="fas fa-fw fa-book"></i>
          <span>Mata Pelajaran</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('admin/forum') ?>">
          <i class="fas fa-fw fa-comments"></i>
          <span>Forum</span></a>
      </li>

      <li class="nav-item active">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fab fa-fw fa-wordpress"></i>
          <span>TF-IDF</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item active" href="<?php echo site_url('admin/katadasar') ?>">Kata Dasar</a>
            <a class="collapse-item" href="<?php echo site_url('admin/stopword') ?>"><i>Stopword</i></a>
            <a class="collapse-item" href="<?php echo site_url('admin/hitungbobot') ?>">Hitung Bobot</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Pages Collapse Menu -->
      <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-clipboard-list"></i>
          <span>Modul Pelatihan</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?php echo site_url('admin/tambahmodul') ?>">Tambah Data</a>
            <a class="collapse-item" href="<?php echo site_url('admin/tampilmodul') ?>">Tampil Data</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-pen-alt"></i>
          <span>Hasil Rapat</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?php echo site_url('admin/tambahrapat') ?>">Tambah Data</a>
            <a class="collapse-item" href="<?php echo site_url('admin/tampilrapat') ?>">Tampil Data</a>
          </div>
        </div>
      </li> -->

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
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Hello, <b>Admin</b></span>
                <img class="img-profile rounded-circle" src="<?php echo base_url('assets/img/profile/default.png') ?>">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
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
                  <h3 class="m-0 font-weight-bold text-primary">Daftar Kata Dasar</h3>
                </div>
                  <div class="col-auto">
                    <a href="<?php echo site_url('admin/tambahkatadasar') ?>" class="btn btn-sm btn-primary btn-icon-split">
                        <span class="icon">
                            <i class="fa fa-user-plus"></i>
                        </span>
                        <span class="text">
                          Tambah Kata Dasar
                        </span>
                    </a>
                  </div>
              </div>
              <span><?php echo $this->session->flashdata('message'); ?></span>
            </div>
            <div class="card-body">
              <p class="text-justify">Kata dasar adalah kata yang tidak mengandung imbuhan. Kata tersebut belum mengalami penambahan atau perubahan bentuk yang mengakibatkan perubahan makna. Salah satu contohnya yaitu, kata dasar dari <b>memakan</b> adalah <b>makan</b>. Kata dasar yang memiliki imbuhan disebut <i><b>term</b></i>, sedangkan <i><b>stem</b></i> adalah <i><b>term</b></i> yang telah dihilangkan imbuhannya atau kata dasar itu sendiri. Proses menghilangkan imbuhan ini disebut dengan <i><b>stemming</b></i>.</p>
              <div class="table-responsive">
                <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                  <thead class="text-center">
                    <tr>
                      <th class="align-middle">No</th>
                      <th class="align-middle">Term</th>
                      <th class="align-middle">Stem</th>
                      <th class="align-middle">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $no = 1;
                      foreach ($katadasar as $datkata) {
                    ?>
                    <tr>
                      <td class="align-middle text-center" width="30"><?php echo $no; ?></td>
                      <td class="align-middle"><?php echo $datkata->term; ?></td>
                      <td class="align-middle"><?php echo $datkata->stem; ?></td>
                      <td class="align-middle text-center">
                        <a href="#" onclick="hapus('<?php echo $datkata->term ?>','<?php echo $datkata->id ?>')" class="btn btn-danger btn-circle m-1"><i class="fa fa-fw fa-trash"></i></a>
                        <a href="<?php echo site_url('admin/suntingkatadasar/'.$datkata->id) ?>" class="btn btn-success btn-circle m-1"><i class="fa fa-fw fa-edit"></i></a>
                      </td>
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
      $('#dataTable').DataTable();
    });

    <?php
      foreach ($katadasar as $datkata) {
    ?> 
      function hapus(kata, id) {
        var konfirmasi = confirm("Apakah Anda yakin akan menghapus "+kata);
        if (konfirmasi){
          window.location.replace("<?php echo site_url('Controller_admin/hapuskatadasar/') ?>"+id);
        }else{
          return false;
        }
      }
    <?php } ?>

  </script>
</body>
</html>