@extends('partial.dashboard.index')
@section('user')
    @php
        $table = ['no', 'nama user', 'action'];
        $number = 1;
        $role = ['Member', 'Administrator', 'Staff'];
        $status = ['Active', 'Not Active', 'Banned'];
    @endphp
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Daftar user</h3>

            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            @foreach ($table as $data)
                                <th class="text-capitalize">{{ $data }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($users as $detail)
                            <tr>
                                <td>{{ $number++ }}</td>
                                <td>{{ $detail->name }}</td>
                                {{-- <td><button type="button" class="btn btn-success" data-toggle="modal"
                                        data-target="#modal-default{{ $detail->id }}">
                                        <i class="fas fa-solid fa-eye"></i>

                                    </button></td> --}}
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-info" data-toggle="modal"
                                            data-target="#modal-default{{ $detail->id }}"><i
                                                class="fas fa-solid fa-eye"></i></button>
                                        <button type="button" class="btn btn-info dropdown-toggle dropdown-icon"
                                            data-toggle="dropdown">
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu" role="menu">
                                            <a class="dropdown-item" href="#" data-toggle="modal"
                                                data-target="#modal-default-edit{{ $detail->id }}">Ubah</a>
                                            <a class="dropdown-item" href="#" data-toggle="modal"
                                                data-target="#modal-default-delete{{ $detail->id }}">Hapus</a>
                                        </div>
                                    </div>
                                </td>
                        @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
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
                    <form method="post" action="{{ route('user.input') }}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputtext">Nama User</label>
                                <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                                    placeholder="masukan data">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputtext">Email</label>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                                    placeholder="masukan data">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputtext">Peran</label>
                                <select type="text" name="role" class="form-control" id="exampleInputEmail1"
                                    placeholder="masukan data">
                                    <option value="" selected>-- select role --</option>
                                    @foreach ($role as $roledata)
                                        <option value="{{ $roledata }}">{{ $roledata }}</option>
                                    @endforeach
                                </select>
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
    @foreach ($users as $detail)
        <div class="modal fade" id="modal-default{{ $detail->id }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">view data</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" src="../../dist/img/user4-128x128.jpg"
                                alt="User profile picture">
                        </div>
                        <h4 class="text-center">{{ $detail->name }}</h4>
                        <p class="text-center">Role : {{ $detail->role }}</p>
                        <p class="text-center">Status : {{ $detail->status }}</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    @endforeach
    @foreach ($users as $detail)
        <div class="modal fade" id="modal-default-edit{{ $detail->id }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">view data</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{ route('user.change', $detail->id) }}">
                            @method('PUT')
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputtext">Nama User</label>
                                    <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                                        placeholder="masukan data" value="{{ $detail->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputtext">Peran</label>
                                    <select name="role" class="form-control" id="exampleInputEmail1">
                                        @foreach ($role as $roledata)
                                            <option value="{{ $roledata }}"
                                                {{ $detail->role === $roledata ? 'selected' : '' }}>{{ $roledata }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputtext">status</label>
                                    <select type="text" name="status" class="form-control" id="exampleInputEmail1"
                                        placeholder="masukan data">
                                        <option value="" selected>-- select active --</option>
                                        @foreach ($status as $stats)
                                            <option value="{{ $stats }}"
                                                {{ $detail->status === $stats ? 'selected' : '' }}>{{ $stats }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary toastsDefaultDefault">Submit</button>
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
    @foreach ($users as $detail)
        <div class="modal fade" id="modal-default-delete{{ $detail->id }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">view data</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h5 class="text-capitalize text-center">apakah anda yakin untuk menghapus <strong> user

                                {{ $detail->name }}
                            </strong>
                        </h5>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <form action="{{ route('user.delete', $detail->id) }}" method="post">
                            @method('delete')
                            @csrf
                            <input type="hidden" name="peminjaman" value="{{ $detail->id }}">
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
