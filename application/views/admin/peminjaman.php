<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('login/admin')?>">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-book"></i>
                </div>
                <div class="sidebar-brand-text mx-3">ADMIN <sup>perpustakaan</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

           

<!--_______________________________________________________________________________________________________________________________________________________________________________v  -->
             <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="<?= base_url('login/admin')?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
            
            <li class="nav-item">
                <a class="nav-link collapsed" href="<?= base_url('login/buku')?>" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Buku</span>
                </a>
                
            
            <li class="nav-item">
                
            <a class="nav-link collapsed" href="<?= base_url('login/anggota')?>"  data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Anggota</span>
                </a>
            
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="<?= base_url('login/peminjaman')?>"  data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-plus"></i>
                    <span>Peminjaman</span>
                </a>
            
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="<?= base_url('login/setting')?>"  data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Setting</span>
                </a>
            
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="<?= base_url('login/logout')?>"  data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
            
            </li>

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

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                    </ul>

                </nav>
                <!-- End of Topbar -->
<!-- _______________________________________________________________________________________________________________________________________________________________________________ -->
                
                <!-- CONTENT -->
                <div class="container-fluid">

                <?php if($msg_nana = $this->session->flashdata('tambah')):?>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="alert alert-dismissible alert-success">
                                <?= $msg_nana; ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                                       
                   <h2>DATA PEMINJAMAN BUKU PERPUSTAKAAN</h2>
                    <a href="<?= base_url('login/tambah_peminjaman')?>" class="btn btn-primary">Tambah Peminjaman</a>
                   
                    
                    <table class="table table-border my-5">
                        <tr>
                            <th> NAMA ANGGOTA </th>
                            <th> JUDUL BUKU </th>
                            <th> TANGGAL PINJAM </th>
                            <th> TANGGAL KEMBALI </th>
                            <th> AKSI </th>
                        </tr>

                        <?php foreach ($peminjaman as $pinjam):?>
                            <tr>
                                <td><?= $pinjam['nama'] ?></td>
                                <!-- nama diambil dari table anggota -->
                                <td><?= $pinjam['judul']?></td>
                                <td><?= $pinjam['tanggal_pinjam']?></td>
                                <td><?= $pinjam['tanggal_kembali']?></td>
                                <td>
                                    
                                        <!-- <a href="<?= base_url()?>login/edit_peminjaman/<?= $pinjam['id_peminjaman'] ?>" >
                                            <div class="btn btn-primary btn-sm"><i class=" fa fa-edit"></i></div>
                                            id_buku : biar dia itu sesuai id gitu, jadi kalau kita klik edit di buku ke 2 maka yang muncul ya detail buku ke 2
                                        </a> -->

                                        <a onclick="return confirm('Hapus Data?')"href="<?= base_url()?>login/hapus_anggota/<?= $pinjam['id_peminjaman'] ?>" ><div class="btn btn-danger btn-sm"><i class=" fa fa-trash"></i></div></a>
                                    </td>
                            

                            </tr>
                        <?php endforeach ?>
                       
                    </table>
                </div>
            </div>
        </div>
    </div>
