<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Learnify dibuat ditujukan agar para siswa dan guru dapat terus belajar dan mengajar dimana saja dan kapan saja." name="Description" />
    <meta content="Learnify, E-learning, Open Source, Gusti robbani, github, programmer indonesia" name="keywords" />
    <link rel="icon" href="<?= base_url('assets/') ?>img/logom.png" type="image/png">
    <title>e-learning ramah anak</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>css/bootstrap.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>vendors/linericon/style.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>vendors/owl-carousel/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>vendors/lightbox/simpleLightbox.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>vendors/nice-select/css/nice-select.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>vendors/animate-css/animate.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>vendors/popup/magnific-popup.css">
    <!-- Main CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>css/style.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>css/responsive.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=FontName&display=swap" rel="stylesheet">
    <!-- Scripts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@600&family=Lobster+Two:wght@700&display=swap" rel="stylesheet">

	<!-- Icon Font Stylesheet -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

	<!-- Libraries Stylesheet -->
	<link href="<?php echo base_url('assets/css/animate.min.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/owlcarousel/'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/owl.carousel.min.css'); ?>" rel="stylesheet">

	<!-- Customized Bootstrap Stylesheet -->
	<link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
	<!-- Template Stylesheet -->
	<link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.10.4/dist/sweetalert2.all.min.js"></script>
    <script src="<?= base_url('assets/') ?>js/jquery-3.3.1.min.js"></script>
    <script src="<?= base_url('assets/') ?>js/popper.js"></script>
    <script src="<?= base_url('assets/') ?>js/bootstrap.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
	<script src="<?php echo base_url('assets/js/wow.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/easing.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/waypoints.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/owlcarousel'); ?>"></script>
	<script src="<?php echo base_url('assets/js/owl.carousel.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/main.js'); ?>"></script>
	
    <script type="text/javascript">
        $(document).ready(() => {
            $("#nav<?= $this->uri->segment(2); ?>").addClass('active')
        })
    </script>

</head>

<body>

    <!--================Header Menu Area =================-->
    <header class="header_area">
        <div class="top_menu row m0">
            <div class="container">
                <div class="float-left">
                </div>
            </div>
        </div>
        <div class="main_menu">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <a class="navbar-brand logo_h" href="<?= base_url('welcome') ?>"><img src="<?= base_url('assets/')?>img/kiki.png" alt="">Al-quthubi</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav ml-auto">
                            <li class="nav-item" id="nav"><a class="nav-link" href="<?= base_url('welcome') ?>">Beranda</a></li>
                            <li class="nav-item" id="navtentang"><a class="nav-link" href="<?= base_url('welcome/tentang') ?>">Tentang</a>
                            </li>
                            <li class="nav-item" id="navkontak"><a class="nav-link" href="<?= base_url('welcome/kontak') ?>">Kontak</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="#" data-toggle="modal" data-target="#exampleModalCenter">Masuk</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <!--================ END Header Menu Area =================-->

    <!-- Home Banner Area  -->
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="kontak bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background="">
            </div>
            <div class="container">
                <div class="banner_content text-center">
                    <h2>Pendaftaran TPQ Muslimat Al-Quthubi</h2>
                    <div class="page_link">
                        <a href="<?= base_url('welcome') ?>">Beranda</a>
                        <a href="<?= base_url('user/registration') ?>">Pendaftaran</a>
                    </div>
                </div>
            </div>
        </div>
        <div id="registration"></div>
    </section>
    <!-- End Home Banner Area  -->

    <!-- Registration Form Area -->
	<div class="container mt-5 mb-5" id="registration">
    <div class="row bg-registration p-3">
        <div class="col-md-12 text-center">
            <p class="registration-title font-weight-bold display-4 mt-4" style="font-size: 50px;">
                Pendaftaran Santri</p>
            <p style="line-height: -30px; margin-top: -20px;">Silahkan isi data data yang diperlukan dibawah ini </p>
            <hr>
        </div>
        <div class="col-md-6 mx-auto text-center">
            <!-- Add the image here -->
            <img src="<?= base_url('assets/img/banner5.jpg') ?>" class="img-fluid" alt="Image">
        </div>
        <div class="col-md-6 mx-auto my-auto mt--5">
            <form action="<?= base_url('user/registration_act') ?>" method="post" onsubmit="return validateForm();">
					<div class="form-group">
						<label for="nama_lengkap" class="label-font-register">Nama lengkap</label>
						<input type="text" autocomplete="off" class="form-control effect-9" name="nama" id="nama_lengkap" value="<?= set_value('nama'); ?>">
						<?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
					</div>
					<div class="form-group">
						<label for="email" class="label-font-register">Email</label>
						<input type="text" class="form-control" name="email" id="email" value="<?= set_value('email'); ?>">
						<?= form_error('email', '<small class="text-danger">', '</small>'); ?>
					</div>
					<div class="form-group">
						<label for="inputState" style="font-weight: bold;">Kelas</label>
						<select required id="inputState" name="kelas" class="form-control">
							<option selected>Pilih disini</option>
							<option value="A">Kelas A</option>
							<option value="B">Kelas B</option>
							<option value="C">Kelas C</option>
						</select>
					</div>
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="password" class="label-font-register">Password</label>
							<input type="password" class="form-control" name="password" id="password">
							<?= form_error('password', '<small class="text-danger">', '</small>'); ?>
						</div>
						<div class="form-group col-md-6">
							<label for="retype_password" class="label-font-register">Retype password</label>
							<input type="password" class="form-control" name="retype_password" id="retype_password">
							<?= form_error('retype_password', '<small class="text-danger">', '</small>'); ?>
						</div>
					</div>
					<div class="form-check">
						<input class="form-check-input checkbox" type="checkbox" id="defaultCheck1" onchange="document.getElementById('btnsubmit').disabled = !this.checked;">
						<label class=" form-check-label" for="defaultCheck1">
							Saya setuju dan ingin melanjutkan
						</label>
					</div>
					<p class="terms">Dengan mendaftar anda menyetujui <i>privasi dan persyaratan ketentuan hukum kami </i></p>
				    <button type="submit" name="submit" id="btnsubmit" disabled class="btn btn-block font-weight-bold btn-modal btn-submit" style="background-color: orange; color: white; font-size: 18px;">Daftar Sekarang!</button>
				</form>
			</div>
		</div>
	</div>

    <!-- End Registration Form Area -->

    <!-- Start Checkbox Scripts -->
    <script>
        $('.tab1_btn').prop('disabled', !$('.tab1_chk:checked')
            .length);
        $('input[type=checkbox]').click(function() {
            if ($('.tab1_chk:checkbox:checked').length > 0) {
                $('.btn-submit').prop('disabled', false);
            } else {
                $('.btn-submit').prop('disabled', true);
            }
        });
    </script>
    <!--  -->
