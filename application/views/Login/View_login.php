<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Login</title>
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('assets/img/icon.ico'); ?>">

	<!-- Custom fonts for this template-->
	<link href="<?php echo base_url('assets/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('assets/css/fontfamily.css') ?>" rel="stylesheet" type="text/css">

	<!-- Custom styles for this template-->
	<link href="<?php echo base_url('assets/css/sb-admin-2.min.css') ?>" rel="stylesheet">
</head>

<body class="bg-gradient-primary">
	<div class="container">
		<!-- Outer Row -->
		<div class="row justify-content-center">
			<div class="col-xl-8 col-lg-8 col-md-9">
		    	<div class="card o-hidden border-0 shadow-lg my-5">
		      		<div class="card-body p-0">
				        <!-- Nested Row within Card Body -->
	            		<div class="p-5">
	              			<div class="text-center">
	                			<h1 class="h4 text-gray-900 mb-4">Sistem Pengelolaan Pengetahuan Tenaga Pendidik<br>SMK YP 79 Majalaya</h1>
	                			<p>Silahkan login dengan akun yang sudah terdaftar pada sistem ini</p>
	                			<p class="text-danger"><?php echo $this->session->flashdata('message'); ?></p>
	              			</div>
							<form class="user" method="POST" action="<?php echo site_url('login') ?>">
								<div class="form-group">
									<label>Username</label>
									<input type="text" class="form-control form-control-user" aria-describedby="emailHelp" autocomplete="off" placeholder="Masukkan Username" name="username" required>
								</div>
								<div class="form-group">
									<label>Password</label>
									<div class="input-group mb-3">
										<input id="pass" type="password" autocomplete="off" class="form-control form-control-user" name="password" placeholder="Masukkan Password" required>
										<div class="input-group-append">
										    <span id="show" class="input-group-text bg-white" style="border-radius: 0px 50px 50px 0px;"><i id="eye" class="fas fa-fw fa-eye"></i></span>
										 </div>
									</div>
								</div>
								<button class="btn btn-primary btn-user btn-block">Login</button>
								<a href="#" data-toggle="modal" data-target="#about" class="btn btn-info btn-user btn-block">Tentang</a>
							</form>
	              			<!-- <div class="text-center">
	                			<p>Belum punya akun? Daftar <a class="text-decoration-none" href="<?php echo site_url('register')?>">disini</a></p>
	              			</div> -->
	            		</div>
		      		</div>
		    	</div>
		  	</div>
		</div>
	</div>

	<div class="modal fade" id="about" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tentang</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body text-justify" style="font-size: 14pt">Tentang web ini</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Tutup</button>
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
	</script>

</body>
</html>
