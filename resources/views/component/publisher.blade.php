@extends('partial.dashboard.index')
@section('book')
    @foreach ($list as $publisher)
        <div class="col-lg-3">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle" src="../../dist/img/user4-128x128.jpg"
                            alt="User profile picture">
                    </div>

                    <h3 class="profile-username text-center">{{ $publisher->nama_penerbit }}</h3>
                    <div class="d-flex justify-content-center">

                        <button type="button" class="btn btn-success" data-toggle="modal"
                            data-target="#modal-default{{ $publisher->idpenerbit }}">
                            <i class="fas fa-solid fa-eye"></i>

                        </button>
                    </div>

                </div>
                <!-- /.card-body -->
            </div>
        </div>
    @endforeach
    {{-- input --}}
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
                    <form method="post" action="{{ route('savePublisher') }}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputtext">nama penerbit</label>
                                <input type="text" name="penerbit" class="form-control" id="exampleInputEmail1"
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
    {{-- view --}}
    @foreach ($list as $publisher)
        <div class="modal fade" id="modal-default{{ $publisher->idpenerbit }}">
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
                        <h4 class="text-center">{{ $publisher->nama_penerbit }}</h4>




                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-warning" data-toggle="modal"
                            data-target="#modal-default-update{{ $publisher->idpenerbit }}">
                            <i class="bi bi-pencil-square"></i>
                        </button>
                        <button type="button" class="btn btn-danger" data-toggle="modal"
                            data-target="#modal-default-delete{{ $publisher->idpenerbit }}">
                            <i class="bi bi-trash3-fill"></i>
                        </button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    @endforeach
    {{-- edit --}}
    @foreach ($list as $publisher)
        <div class="modal fade" id="modal-default-update{{ $publisher->idpenerbit }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit data</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{ route('editPublisher', $publisher->idpenerbit) }}">
                            @method('PUT')
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputtext">nama penerbit</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        placeholder="masukan data" name="penerbit" value="{{ $publisher->nama_penerbit }}">
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
    {{-- delete --}}
    @foreach ($list as $publisher)
        <div class="modal fade" id="modal-default-delete{{ $publisher->idpenerbit }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Hapus data</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h5 class="text-capitalize text-center">apakah anda yakin untuk menghapus pengarang
                            <strong>
                                {{ $publisher->nama_penerbit }}
                            </strong>
                        </h5>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <form action="{{ route('deletePublisher', $publisher->idpenerbit) }}" method="post">
                            @method('delete')
                            @csrf
                            <input type="hidden" name="pengarang" value="{{ $publisher->idpenerbit }}">
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
