
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Admin Dashboard</title>
    <!-- General CSS Files -->
    <link rel="icon" href="<?= base_url('assets/') ?>img/logom.png" type="image/png">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:500,600,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" <!-- Template CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>stisla-assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>stisla-assets/css/components.css">
	    <!-- Favicon -->
		<link href="img/logom.ico" rel="icon">
		<!-- Google Web Fonts -->
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@600&family=Lobster+Two:wght@700&display=swap" rel="stylesheet">

		<!-- Icon Font Stylesheet -->
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

		<!-- Libraries Stylesheet -->
		<link href="lib/animate/animate.min.css" rel="stylesheet">
		<link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

		<!-- Template Stylesheet -->
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 
		
		<!-- Icon Font Stylesheet -->
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

		<!-- Libraries Stylesheet -->
		<link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
		<link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

		<!-- Customized Bootstrap Stylesheet -->
		<link href="css/bootstrap.min.admin.css" rel="stylesheet">

		<!-- Template Stylesheet -->
		<link href="css/style.admin.css" rel="stylesheet">
		</head>

<body>

    <!-- Start Sidebar -->
	<div id="app">
    <div class="main-wrapper" style="background-color: orange;">
        <div class="navbar-bg" style="background-color: orange;"></div>
        <nav class="navbar navbar-expand-lg main-navbar">
            <form class="form-inline mr-auto">
                <ul class=" navbar-nav mr-3">
                    <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a>
                    </li>
                </ul>
            </form>
            <ul class="navbar-nav navbar-right">
                <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                        <img alt="image" style="margin-bottom:4px !important;" src="./assets/stisla-assets/img/avatar/avatar-2.png" class="rounded-circle mr-1 my-auto border-white">
                    <div class="dropdown-menu dropdown-menu-right" style="background-color: orange;">
                        <div class="dropdown-title">Admin </div>
                        <a href="<?= base_url('welcome/logout') ?>" class="dropdown-item has-icon text-danger">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
    </div>
</div>
			<div>
			<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand text-danger">
            <div class="sidebar-brand sidebar-brand-sm">
                <a href="<?= base_url('admin') ?>">LY <sup>3</sup></a>
            </div>
            <ul class="sidebar-menu">
                <h1 class="menu-header" style="color: orange; font-weight: bold; font-size: xx-large;">Dashboard admin</h1>
                <li class="nav-item dropdown active">
                    <a href="<?= base_url('admin') ?>" class="nav-link"><i class="fas fa-desktop"></i><span style="color: orange;">Dashboard</span></a>
                </li>
                <li class="menu-header"></li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-user"></i>
                        <span style="color: orange;">Santri</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="<?= base_url('admin/data_siswa') ?>">Data Santri</a></li>
                    </ul>
                </li>
                <li class="menu-header">Management Santri</li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-chalkboard-teacher"></i>
                        <span style="color: orange;">Ustadz</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="<?= base_url('admin/data_guru') ?>">Data Ustadz</a>
                        </li>
                        <li><a class="nav-link" href="<?= base_url('admin/add_guru') ?>">Tambah Data Ustadz</a>
                        </li>
                    </ul>
                </li>
                <li class="menu-header">Management Ustadz</li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-book"></i>
                        <span style="color: orange;">Materi</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="<?= base_url('admin/data_materi') ?>">Data Materi</a>
                        </li>
                        <li><a class="nav-link" href="<?= base_url('admin/tambah_materi') ?>">Tambah Materi</a>
                        </li>
                    </ul>
                </li>
                <li class="menu-header">Management Materi</li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-address-card"></i>
                        <span style="color: orange;">Developer</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="<?= base_url('admin/about_developer') ?>">Tentang
                                Pembuat</a>
                        </li>
                        
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </aside>
</div>

            <!-- End Sidebar -->

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1 style="font-size: 27px; letter-spacing:-0.5px; color:black;">Dashboard Admin Tpq Muslimat Al-Quthubi</h1>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-primary">
                                    <i class="far fa-user"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>Santri</h4>
                                    </div>
                                    <div class="card-body">
                                        <?php echo $this->db->count_all('siswa'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-danger">
                                    <i class="fas fa-chalkboard-teacher"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>Ustadz</h4>
                                    </div>
                                    <div class="card-body">
                                        <?php echo $this->db->count_all('guru'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-warning">
                                    <i class="fas fa-book"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>Materi</h4>
                                    </div>
                                    <div class="card-body">
                                        <?php echo $this->db->count_all('materi'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-success">
                                    <i class="fas fa-users"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>Kelas</h4>
                                    </div>
                                    <div class="card-body">
                                        3
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="card" style="width:100%;">
                            <div class="card-body">
                                <h2 class="card-title" style="color: black;">Tambah Materi?</h2>
                                <hr>
                                <p class="card-text">Menambah materi bisa melalui admin jika para guru berhalangan mengisi kelas yang sudah di jadwalkan</p>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="hero text-white hero-bg-image" data-background="<?= base_url('assets/') ?>img/banner5.jpg">
                            <div class=" hero-inner">
                                <h1>Selamat Datang, <?php
                                                    $data['user'] = $this->db->get_where('admin', ['email' =>
                                                    $this->session->userdata('email')])->row_array();
                                                    echo $data['user']['username'];
                                                    ?>!</h1>
                                <p class="lead">Untuk mengecek data siswa TPQ Muslimat Al-Quthubi bisa di lakukan melalui admin</p>
                                <div class="mt-4">
                                    <a href="<?= base_url('admin/data_siswa') ?>" class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="far fa-user"></i>
                                        Data Santri</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <!-- Start Footer -->
            <footer class="main-footer">
                <div class="text-center">
                    Copyright &copy; 2020 <div class="bullet"></div><a href="https://github.com/Gustirobbani">Gusti robbani</a>
                </div>
            </footer>
            <!-- End Footer -->

        </div>
    </div>
    <!-- End Main Content -->

    <!-- General JS Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="<?= base_url('assets/') ?>stisla-assets/js/stisla.js"></script>
    <!-- Template JS File -->
    <script src="<?= base_url('assets/') ?>stisla-assets/js/scripts.js"></script>
    <script src="<?= base_url('assets/') ?>stisla-assets/js/custom.js"></script>
</body>

</html>
