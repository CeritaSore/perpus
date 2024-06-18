@extends('partial.dashboard.index')
@section('book')
    <!-- /.col-md-6 -->
    <div class="col-12">

        @if (session('success'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon bi bi-check-lg"></i> Alert!</h5>
                {{ session('success') }}
            </div>
        @endif
    </div>
    @foreach ($list[0] as $books)
        <div class="col-lg-4">
            <div class="card" style="width: 18rem;">
                <img src="https://images.unsplash.com/photo-1495615080073-6b89c9839ce0?q=80&w=1506&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                    class="card-img-top" alt="...">
                <div class="card-body text-center">
                    <h4 class="card-title" style="font-weight: bold;">{{ $books->judul_buku }}</h4>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's content.</p>
                    <button type="button" class="btn btn-primary text-center" data-toggle="modal"
                        data-target="#modal-default-{{ $books->idbuku }}">
                        Check this
                    </button>
                </div>
            </div>
        </div>
    @endforeach
    {{-- modal input --}}
    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="background-color: #7b6ada">
                <div class="modal-header" style="border-bottom: none">
                    <h4 class="modal-title text-light">Large Modal</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-light">
                    <form method="post" action="{{ route('inputBooks') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-6">

                                <div class="form-group">
                                    <label for="exampleInputtext">Judul Buku</label>
                                    <input type="text" name="book" class="form-control" id="exampleInputEmail1"
                                        placeholder="masukan data">
                                </div>
                                <div class="form-group">
                                    <label>Pengarang</label>
                                    <select class="select2bs4" multiple="multiple" data-placeholder="Select a State"
                                        style="width: 100%;" name="pengarang">
                                        @foreach ($list[2] as $data)
                                            <option value="{{ $data->idpengarang }}">{{ $data->nama_pengarang }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Penerbit</label>
                                    <select class="select2bs4" multiple="multiple" data-placeholder="Select a State"
                                        style="width: 100%;" name="penerbit">
                                        @foreach ($list[1] as $data)
                                            <option value="{{ $data->idpenerbit }}">{{ $data->nama_penerbit }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>kategori</label>
                                    <select class="select2bs4" multiple="multiple" data-placeholder="Select a State"
                                        style="width: 100%;" name="kategori">
                                        @foreach ($list[3] as $data)
                                            <option value="{{ $data->idkategori }}">{{ $data->kategori }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class="col-6">

                                <div class="form-group">
                                    <label for="formFile" class="form-label">Foto buku</label>
                                    <input class="form-control" name="photos" type="file" id="formFile">
                                </div>
                                <div class="form-group">
                                    <label>Deskripsi</label>
                                    <textarea class="form-control" name="description" rows="3" placeholder="Masukan data(opsional)"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Tahun terbit</label>
                                    <select class="select2bs4" multiple="multiple" data-placeholder="Select a State"
                                        style="width: 100%;" name="terbitan">
                                        @php
                                            $year = 2024;
                                        @endphp
                                        @for ($i = 1969; $i <= $year; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor

                                    </select>
                                </div>
                            </div>
                            <div class="col-12 d-flex justify-content-end">

                                <button type="submit" class="btn text-light" style="background-color: #8879dc">Save
                                    changes</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal-content -->

    {{-- modal view --}}
    @foreach ($list[0] as $books)
        <div class="modal fade" id="modal-default-{{ $books->idbuku }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">masukan data</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class=" box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle" src="../../dist/img/user4-128x128.jpg"
                                    alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center">{{ $books->judul_buku }}</h3>
                            <p class="text-center">dikarang oleh : {{ $books->pengarang->nama_pengarang }} <br>diterbitkan
                                oleh : {{ $books->penerbit->nama_penerbit }} <br>tahun terbit : {{ $books->tahun_terbit }} <br> Status buku : {{$books->status}}
                            </p>


                        </div>
                        <!-- /.card-body -->


                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer" style="display: flex;justify-content:space-around;">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-warning" data-toggle="modal"
                            data-target="#modal-lg{{ $books->idbuku }}">
                            <i class="bi bi-pencil-square"></i>
                        </button>
                        <button type="button" class="btn btn-danger" data-toggle="modal"
                            data-target="#modal-lg-delete{{ $books->idbuku }}">
                            <i class="bi bi-trash3-fill"></i>
                        </button>

                        <a href="{{ route('books.borrow', ['idbuku' => $books->idbuku, 'judul' => $books->judul_buku]) }}"
                            class="btn btn-{{ $books->status === 'sedang dipinjam' ? 'danger disabled' : 'success' }}"><i
                                class="bi bi-ticket-fill"></i></a>

                    </div>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
    @endforeach

    {{-- modal edit --}}
    @foreach ($list[0] as $books)
        <div class="modal fade" id="modal-lg{{ $books->idbuku }}">
            <div class="modal-dialog modal-lg">
                <div class="modal-content" style="background-color: #7b6ada">
                    <div class="modal-header" style="border-bottom: none">
                        <h4 class="modal-title text-light">Large Modal</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-light">
                        <form method="post" action="{{ route('editBooks', $books->idbuku) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-6">

                                    <div class="form-group">
                                        <label for="exampleInputtext">Judul Buku</label>
                                        <input type="text" name="book" class="form-control"
                                            id="exampleInputEmail1" value="{{ $books->judul_buku }}"
                                            placeholder="masukan data">
                                    </div>
                                    <div class="form-group">
                                        <label>Pengarang</label>
                                        <select class="select2bs4" multiple="multiple" data-placeholder="Select a State"
                                            style="width: 100%;" name="pengarang">
                                            @foreach ($list[2] as $data)
                                                <option value="{{ $data->idpengarang }}"
                                                    {{ $data->idpengarang === $books->pengarang->idpengarang ? 'selected' : '' }}>
                                                    {{ $data->nama_pengarang }}
                                                </option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Penerbit</label>
                                        <select class="select2bs4" multiple="multiple" data-placeholder="Select a State"
                                            style="width: 100%;" name="penerbit">
                                            @foreach ($list[1] as $data)
                                                <option value="{{ $data->idpenerbit }}"
                                                    {{ $data->idpenerbit === $books->penerbit->idpenerbit ? 'selected' : '' }}>
                                                    {{ $data->nama_penerbit }}

                                                </option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>kategori</label>
                                        <select class="select2bs4" multiple="multiple" data-placeholder="Select a State"
                                            style="width: 100%;" name="kategori">
                                            @foreach ($list[3] as $data)
                                                <option value="{{ $data->idkategori }}"
                                                    {{ $data->idkategori === $books->kategori->idkategori ? 'selected' : '' }}>
                                                    {{ $data->kategori }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">

                                    <div class="form-group">
                                        <label for="formFile" class="form-label">Foto buku</label>
                                        <input class="form-control" name="photos" type="file" id="formFile">
                                    </div>
                                    <div class="form-group">
                                        <label>Deskripsi</label>
                                        <textarea class="form-control" name="description" rows="3" placeholder="Masukan data(opsional)">{{ $books->deskripsi }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Tahun terbit</label>
                                        <select class="select2bs4" multiple="multiple" data-placeholder="Select a State"
                                            style="width: 100%;" name="terbitan">
                                            @php
                                                $year = 2024;
                                            @endphp
                                            @for ($i = 1969; $i <= $year; $i++)
                                                <option value="{{ $i }}"
                                                    {{ $i == $books->tahun_terbit ? 'selected' : '' }}>{{ $i }}
                                                </option>
                                            @endfor

                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-end">

                                    <button type="submit" class="btn text-light" style="background-color: #8879dc">Save
                                        changes</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal-content -->
    @endforeach

    {{-- modal delete --}}
    @foreach ($list[0] as $books)
        <div class="modal fade" id="modal-lg-delete{{ $books->idbuku }}">
            <div class="modal-dialog modal-lg">
                <div class="modal-content" style="background-color: #7b6ada">
                    <div class="modal-header" style="border-bottom: none">
                        <h4 class="modal-title text-light">Large Modal</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-light">
                        <h5 class="text-capitalize text-center">apakah anda yakin untuk menghapus pengarang
                            <strong>
                                {{ $books->judul_buku }}
                            </strong>
                        </h5>
                        <form action="{{ route('deleteBooks', $books->idbuku) }}" method="post">
                            @method('delete')
                            @csrf
                            <input type="hidden" name="pengarang" value="{{ $books->idbuku }}">
                            <button type="submit" class="btn btn-primary">Save changes</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                        </form>

                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    @endforeach
@endsection
