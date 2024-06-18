@extends('partial.dashboard.index')
@section('home')
<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-info">
        <div class="inner">
            <h3>{{$books}}</h3>

            <p>Total Buku</p>
        </div>
        <div class="icon">
            <i class="fas fa-solid fa-book-open"></i>
        </div>
        <a href="/book" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
<!-- ./col -->
<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-success">
        <div class="inner">
            <h3>{{$pengarang}}</h3>

            <p>Total Pengarang</p>
        </div>
        <div class="icon">
            <i class="fas fa-solid fa-user"></i>
        </div>
        <a href="/author" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
<!-- ./col -->
<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-warning">
        <div class="inner">
            <h3> {{$activeUsersCount}} </h3>

            <p>Total Pengguna Aktif</p>
        </div>
        <div class="icon">
            <i class="ion ion-person-add"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
<!-- ./col -->
<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-danger">
        <div class="inner">
            <h3>{{$borrow}}</h3>

            <p>Total peminjam</p>
        </div>
        <div class="icon">
            <i class="ion ion-pie-graph"></i>
        </div>
        <a href="/statusBorrow" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
@endsection