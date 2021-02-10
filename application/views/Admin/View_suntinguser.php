<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Sunting Pengguna</title>
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
          <div class="sidebar-brand-icon">
              <img style="height: 40px" src="<?php echo base_url('assets/img/logo.png') ?>">
          </div>
          <div class="sidebar-brand-text mx-1">
              SMK YP 79 Majalaya
          </div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <li class="nav-item active">
          <a class="nav-link" href="<?php echo site_url('admin') ?>">
          <i class="fas fa-fw fa-users"></i>
          <span>Pengguna</span></a>
        </li>

        <!-- Divider -->
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

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fab fa-fw fa-wordpress"></i>
          <span>TF-IDF</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?php echo site_url('admin/katadasar') ?>">Kata Dasar</a>
            <a class="collapse-item" href="<?php echo site_url('admin/stopword') ?>"><i>Stopword</i></a>
            <a class="collapse-item" href="<?php echo site_url('admin/hitungbobot') ?>">Hitung Bobot</a>
          </div>
        </div>
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
                <span class="mr-2 d-lg-inline text-gray-600 small">
                  Hello, <b>Admin</b>
                </span>
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

            <div class="row justify-content-center">
              <div class="col-md-8">
                <div class="card shadow mb-4">
                  <div class="card-header py-3">
                    <div class="row">
                      <div class="col">
                        <h3 class="align-middle m-0 font-weight-bold text-primary">
                          Sunting <?php echo $user->nama; ?>
                        </h3>
                      </div>
                      <div class="col-auto">
                        <a href="<?php echo site_url('admin') ?>" class="btn btn-sm btn-secondary btn-icon-split">
                          <span class="icon">
                              <i class="fa fa-arrow-left"></i>
                          </span>
                          <span class="text">
                            Kembali
                          </span>
                        </a>
                      </div>
                    </div>
                  </div>
                  <div class="card-body pb-2">
                    <form action="<?php echo site_url('Controller_admin/simpansuntinguser/'.$user->id) ?>" method="POST">
                      <div class="row form-group">
                          <label class="col-md-4 text-md-right" for="username">Username</label>
                          <div class="col-md-8">
                              <input type="hidden" value="<?php echo $user->username?>" name="cek">
                              <input type="text" value="<?php echo $user->username?>" id="username" name="username" class="form-control" placeholder="Username" required>
                          </div>
                      </div>
                      <div class="row form-group">
                        <label class="col-md-4 text-md-right" for="password_baru">Password Lama</label>
                        <div class="col-md-8">
                          <div class="input-group">
                            <input id="pass" value="<?php echo $user->password ?>" type="password" autocomplete="off" class="form-control" name="pass" placeholder="Password Lama" onchange="tombol()" readonly>
                            <div class="input-group-append">
                              <span id="show" class="input-group-text bg-white"><i id="eye" class="fas fa-fw fa-eye"></i></span>
                             </div>
                          </div>
                        </div>
                      </div>
                      <div class="row form-group">
                        <label class="col-md-4 text-md-right" for="password_baru">Password Baru</label>
                        <div class="col-md-8">
                          <div class="input-group">
                            <input id="pass2" type="password" autocomplete="off" class="form-control" name="pass2" placeholder="Password Baru" onchange="tombol()">
                            <div class="input-group-append">
                              <span id="show2" class="input-group-text bg-white"><i id="eye2" class="fas fa-fw fa-eye"></i></span>
                             </div>
                          </div>
                        </div>
                      </div>
                      <div class="row form-group">
                        <label class="col-md-4 text-md-right" for="konfirmasi_password">Konfirmasi Password</label>
                        <div class="col-md-8">
                          <div class="input-group">
                            <input id="pass3" type="password" autocomplete="off" class="form-control" name="pass3" placeholder="Konfirmasi Password" onchange="tombol()">
                            <div class="input-group-append">
                              <span id="show3" class="input-group-text bg-white"><i id="eye3" class="fas fa-fw fa-eye"></i></span>
                             </div>
                          </div>
                        </div>
                      </div>
                      <hr>
                      <div class="row form-group">
                        <label class="col-md-4 text-md-right" for="nama">Nama</label>
                        <div class="col-md-8">
                          <input type="text" value="<?php echo $user->nama ?>" name="nama" class="form-control" placeholder="Nama" required>
                        </div>
                      </div>
                      <div class="row form-group">
                        <label class="col-md-4 text-md-right" for="level">Jabatan</label>
                        <div class="col-md-8">
                          <div class="custom-control custom-radio">
                            <input value="1" type="radio" id="kurikulum" name="level" class="custom-control-input" required <?php echo $jabatan = ($user->level == 1) ? "checked" : false ; ?>>
                            <label class="custom-control-label" for="kurikulum">Kurikulum</label>
                          </div>
                          <div class="custom-control custom-radio">
                            <input value="2" type="radio" id="guru" name="level" class="custom-control-input" required <?php echo $jabatan = ($user->level == 2) ? "checked" : false ; ?>>
                            <label class="custom-control-label" for="guru">Guru</label>
                          </div>
                        </div>
                      </div>
                      <div class="row form-group justify-content-end">
                        <div class="col-md-8">
                          <button type="submit" class="btn btn-primary btn-icon-split">
                            <span class="icon"><i class="fa fa-save"></i></span>
                            <span class="text">Simpan</span>
                          </button>
                          <button type="reset" class="btn btn-secondary">
                            Reset
                          </button>
                        </div>
                      </div>
                      <div class="text-center">
                        <span class="text-danger mt-2"><?php echo $this->session->flashdata('message'); ?></span>
                      </div>
                    </form>
                  </div>
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

    <script>
      function tombol(){
        var simpan = document.getElementById('simpan');
        simpan.disabled = false;
        $('#simpan').attr('title', '');
      }

      var eye = document.getElementById('eye');
      $('#show').on('click', function(){
        if($('#pass').attr('type') == 'password'){
          $('#pass').attr('type', 'text');
          eye.className = 'fas fa-fw fa-eye-slash';
        }else{
          $('#pass').attr('type', 'password');
          eye.className = 'fas fa-fw fa-eye';
        }
      });

      var eye2 = document.getElementById('eye2');
      $('#show2').on('click', function(){
        if($('#pass2').attr('type') == 'password'){
          $('#pass2').attr('type', 'text');
          eye2.className = 'fas fa-fw fa-eye-slash';
        }else{
          $('#pass2').attr('type', 'password');
          eye2.className = 'fas fa-fw fa-eye';
        }
      });

      var eye3 = document.getElementById('eye3');
      $('#show3').on('click', function(){
        if($('#pass3').attr('type') == 'password'){
          $('#pass3').attr('type', 'text');
          eye3.className = 'fas fa-fw fa-eye-slash';
        }else{
          $('#pass3').attr('type', 'password');
          eye3.className = 'fas fa-fw fa-eye';
        }
      });
    </script>
</body>
</html>