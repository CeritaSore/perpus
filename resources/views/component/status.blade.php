@extends('partial.dashboard.index')
@section('book')
    @php
        $no = 1;
    @endphp
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data Peminjaman</h3>

                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama peminjam</th>
                            <th>buku yang dipinjam</th>
                            <th>status</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list as $data)
                            @php
                                $date = $data->tanggal_Peminjaman;
                                $newDate = date('d-m-Y', strtotime($date));
                            @endphp
                            <tr>
                                <td>{{ $data->idpeminjaman }}</td>
                                <td>{{ $data->user->name }}</td>
                                <td>{{ $data->books->judul_buku }}</td>
                                <td>{{ $data->status }}</td>
                                <td>
                                    <button type="button" class="btn btn-primary " data-toggle="modal"
                                        data-target="#modal-default-view{{ $data->idpeminjaman }}">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                    <button type="button" class="btn btn-warning " data-toggle="modal"
                                        data-target="#modal-default-edit{{ $data->idpeminjaman }}">

                                        <i class="bi bi-pencil"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger " data-toggle="modal"
                                        data-target="#modal-default-delete{{ $data->idpeminjaman }}">

                                        <i class="bi bi-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    @foreach ($list as $data)
        <div class="modal fade" id="modal-default-view{{ $data->idpeminjaman }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Detail Peminjaman</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" src="../../dist/img/user4-128x128.jpg"
                                alt="User profile picture">
                        </div>
                        <h4 class="text-center">peminjaman : {{ $no++ }}</h4>
                        <p class="text-center">Nama Peminjam : {{ $data->user->name }}</p>
                        <p class="text-center">Buku yang Dipinjam : {{ $data->books->judul_buku }}</p>
                        <p class="text-center">Lama Peminjaman : {{ $data->lama_peminjaman }} hari</p>
                        <p class="text-center">Tanggal Peminjaman : {{ $newDate }}</p>




                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    @endforeach
    @foreach ($list as $data)
        <div class="modal fade" id="modal-default-edit{{ $data->idpeminjaman }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Peminjaman</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form method="post" action="{{ route('borrow.change', $data->idpeminjaman) }}">
                            @method('PUT')
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>status</label>
                                    <select class="form-control select2 select2-hidden-accessible" style="width: 100%;"
                                        data-select2-id="1" tabindex="-1" aria-hidden="true" name="status">
                                        <option>-- data --</option>
                                        @php
                                            $statuses = ['tertunda', 'disetujui', 'dikembalikan'];
                                            $currentStatus = $data->status; // Pastikan variabel $data ada dan memiliki properti status
                                        @endphp
                                        @foreach ($statuses as $status)
                                            <option value="{{ $status }}"
                                                {{ $currentStatus === $status ? 'selected' : '' }}>{{ $status }}
                                            </option>
                                        @endforeach

                                    </select>
                                </div>
                                <input type="hidden" name="bukuid" value="{{ $data->buku_id }}">
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
    @foreach ($list as $data)
        <div class="modal fade" id="modal-default-delete{{ $data->idpeminjaman }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Peminjaman</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h5 class="text-capitalize text-center">apakah anda yakin untuk menghapus <strong> peminjaman

                                {{ $data->idpeminjaman }}
                            </strong>
                        </h5>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <form action="{{ route('borrow.delete', $data->idpeminjaman) }}" method="post">
                            @method('delete')
                            @csrf
                            <input type="hidden" name="peminjaman" value="{{ $data->idpeminjaman }}">
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
