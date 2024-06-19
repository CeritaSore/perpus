@extends('partial.dashboard.index')
@section('book')
    @foreach ($list as $author)
        <div class="col-lg-4">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle" src="../../dist/img/user4-128x128.jpg"
                            alt="User profile picture">
                    </div>

                    <h3 class="profile-username text-center">{{ $author->nama_pengarang }}</h3>
                    <div class="d-flex justify-content-center">

                        <button type="button" class="btn btn-success" data-toggle="modal"
                            data-target="#modal-default{{ $author->idpengarang }}">
                            <i class="fas fa-solid fa-eye"></i>

                        </button>
                    </div>

                </div>
                <!-- /.card-body -->
            </div>
        </div>
    @endforeach
    {{-- @foreach ($list as $author) --}}
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
                    <form method="post" action="{{ route('inputAuthors') }}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputtext">nama pengarang</label>
                                <input type="text" name="pengarang" class="form-control" id="exampleInputEmail1"
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
    {{-- @endforeach --}}
    @foreach ($list as $author)
        <div class="modal fade" id="modal-default{{ $author->idpengarang }}">
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
                        <h4 class="text-center">{{ $author->nama_pengarang }}</h4>




                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        @if (in_array($user->role, ['Administrator', 'Staff']))
                            <button type="button" class="btn btn-warning" data-toggle="modal"
                                data-target="#modal-default-update{{ $author->idpengarang }}">
                                <i class="bi bi-pencil-square"></i>
                            </button>
                            <button type="button" class="btn btn-danger" data-toggle="modal"
                                data-target="#modal-default-delete{{ $author->idpengarang }}">
                                <i class="bi bi-trash3-fill"></i>
                            </button>
                        @endif
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    @endforeach
    {{-- update --}}
    @foreach ($list as $author)
        <div class="modal fade" id="modal-default-update{{ $author->idpengarang }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit data</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{ route('editAuthor', $author->idpengarang) }}">
                            @method('PUT')
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputtext">nama pengarang</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        placeholder="masukan data" name="pengarang" value="{{ $author->nama_pengarang }}">
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
    @foreach ($list as $author)
        <div class="modal fade" id="modal-default-delete{{ $author->idpengarang }}">
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
                                {{ $author->nama_pengarang }}
                            </strong>
                        </h5>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <form action="{{ route('deleteAuthor', $author->idpengarang) }}" method="post">
                            @method('delete')
                            @csrf
                            <input type="hidden" name="pengarang" value="{{ $author->idpengarang }}">
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
