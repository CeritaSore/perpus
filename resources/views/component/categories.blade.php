@extends('partial.dashboard.index')
@section('categories')
    <!-- /.col-md-6 -->
    @php
        $data = ['no', ' kategori', 'action'];
        $number = 1;
    @endphp

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Daftar Kategori</h3>
                {{-- 
                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div> --}}
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            @foreach ($data as $table)
                                <th class="text-capitalize">{{ $table }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list as $cat)
                            <tr>
                                <td>{{ $number++ }}</td>
                                <td>{{ $cat->kategori }}</td>
                                <td><button type="button" class="btn btn-success" data-toggle="modal"
                                        data-target="#modal-default{{ $cat->idkategori }}">
                                        <i class="fas fa-solid fa-eye"></i>

                                    </button></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
    {{-- modal input --}}
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">masukan data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('inputCategories') }}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputtext">Kategori</label>
                                <input type="text" name="kategori" class="form-control" id="exampleInputEmail1"
                                    placeholder="masukan data">
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary toastsDefaultDefault">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    {{-- modal view --}}
    @foreach ($list as $cat)
        <div class="modal fade" id="modal-default{{ $cat->idkategori }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Default Modal</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" src="../../dist/img/user4-128x128.jpg"
                                alt="User profile picture">
                        </div>
                        <h4 class="text-center">{{ $cat->kategori }}</h4>




                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-warning" data-toggle="modal"
                            data-target="#modal-default-update{{ $cat->idkategori }}">
                            <i class="bi bi-pencil-square"></i>
                        </button>
                        <button type="button" class="btn btn-danger" data-toggle="modal"
                            data-target="#modal-default-delete{{ $cat->idkategori }}">
                            <i class="bi bi-trash3-fill"></i>
                        </button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    @endforeach
    {{-- modal edit --}}
    @foreach ($list as $cat)
        <div class="modal fade" id="modal-default-update{{ $cat->idkategori }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit data</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{ route('editcat', $cat->idkategori) }}">
                            @method('PUT')
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputtext">nama kategori</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        placeholder="masukan data" name="kategori" value="{{ $cat->kategori }}">
                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    @endforeach
    {{-- modal delete --}}
    @foreach ($list as $cat)
        <div class="modal fade" id="modal-default-delete{{ $cat->idkategori }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Hapus data</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h5 class="text-capitalize text-center">apakah anda yakin untuk menghapus kategori
                            <strong>
                                {{ $cat->kategori }}
                            </strong>
                        </h5>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <form action="{{ route('deletecat', $cat->idkategori) }}" method="post">
                            @method('delete')
                            @csrf
                            <input type="hidden" name="kategori" value="{{ $cat->idkategori }}">
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </form>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    @endforeach
@endsection
