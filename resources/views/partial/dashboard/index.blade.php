@extends('partial.main')
@section('wrapper')
    <div class="wrapper">
        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div>
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="/" class="nav-link">Home</a>
                </li>

            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                    aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="/" class="brand-link text-decoration-none">
                <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light ">AdminLTE 3</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block text-decoration-none">{{ $user->name }}</a>
                    </div>
                </div>
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                                                                               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="/" class="nav-link {{ Request::is('/') ? 'active' : '' }}">

                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard

                                </p>
                            </a>
                        </li>
                        <li class="nav-item menu-open">
                            <a href="#" class="nav-link ">
                                <i class=" nav-icon fas fa-solid fa-list"></i>
                                <p>
                                    Yang Kamu cari
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/book" class="nav-link {{ Request::is('book') ? 'active' : '' }}">

                                        <i class="nav-icon fas fa-solid fa-book-open"></i>
                                        <p>Book</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/author" class="nav-link {{ Request::is('author') ? 'active' : '' }}">
                                        <i class="fas fa-solid fa-at nav-icon"></i>
                                        <p>Author</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/publisher" class="nav-link {{ Request::is('publisher') ? 'active' : '' }}">
                                        <i class="fas fa-solid fa-upload nav-icon"></i>
                                        <p>Publisher</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/categories" class="nav-link {{ Request::is('categories') ? 'active' : '' }}">
                                        <i class="nav-icon fas bi bi-list"></i>
                                        <p>Categories</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="/statusBorrow" class="nav-link {{ Request::is('statusBorrow') ? 'active' : '' }}">

                                <i class="nav-icon bi bi-exclamation-circle"></i>
                                <p>
                                    Status Peminjaman

                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/user" class="nav-link {{ Request::is('user') ? 'active' : '' }}">

                                <i class="nav-icon bi bi-people"></i>
                                <p>
                                    Daftar pengguna

                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <form action="/logout" method="post">
                                @csrf
                                <button type="submit" class="btn btn-primary col-12">
                                    <i class="right nav-icon fas fa-solid fa-door-open"></i>
                                    Logout
                                </button>
                            </form>
                        </li>

                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside><!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            @if (Request::is('/'))
                                <h2>selamat datang</h2>
                            @elseif(Request::is('book'))
                                <h2>Buku</h2>
                                <p>cari buku kesukaanmu</p>
                                <button type="button" class="btn btn-primary " data-toggle="modal"
                                    data-target="#modal-lg">
                                    New
                                </button>
                            @elseif(Request::is('author'))
                                <h2>Author</h2>
                                <p>mereka ini salah satu orang yang menulis buku kamu baca lohh!!</p>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary " data-toggle="modal"
                                    data-target="#modal-default">
                                    New
                                </button>
                            @elseif(Request::is('publisher'))
                                <h2>Penerbit </h2>
                                <p>Kamu mau lihat siapa penerbit dari buku yang kamu suka? sini! </p>
                                <button type="button" class="btn btn-primary " data-toggle="modal"
                                    data-target="#modal-default">
                                    New
                                </button>
                            @elseif(Request::is('categories'))
                                <h2>Kategori </h2>
                                <p>Ada banyak Kategori buku sesuai dengan yang kamu ingin cari! </p>
                                <button type="button" class="btn btn-primary " data-toggle="modal"
                                    data-target="#modal-default">
                                    New
                                </button>
                            @elseif(Request::is('statusBorrow'))
                                <h2>Status Peminjaman </h2>
                                <p>Cek berkala status Peminjaman yang kamu buat </p>
                                <button type="button" class="btn btn-primary " data-toggle="modal"
                                    data-target="#modal-default">
                                    New
                                </button>
                            @elseif(Request::is('user'))
                                <h2>Daftar user</h2>
                                <p>Hanya admin yang dapat masuk</p>
                                <button type="button" class="btn btn-primary " data-toggle="modal"
                                    data-target="#modal-default">
                                    New
                                </button>
                            @endif

                        </div><!-- /.col -->

                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        @yield('home')
                        @yield('book')
                        @yield('author')
                        @yield('publisher')
                        @yield('categories')
                        @yield('borrow')
                        @yield('status')
                        @yield('user')
                        <!-- ./col -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.2.0
            </div>
        </footer><!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
    </div>
    <!-- ./wrapper -->
@endsection
