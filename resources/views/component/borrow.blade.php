@extends('partial.dashboard.index')
@section('book')
    <div class="col-6">
        <form action="{{route('books.borrow.input')}}" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputtext">Judul Buku</label>
                    <select class="select2bs4" multiple="multiple" data-placeholder="choose books" style="width: 100%;"
                        name="books">
                        {{-- @foreach ($data as $books) --}}
                            <option value="{{ $data['idbuku'] }}" selected>{{ $data['judul'] }}</option>
                        {{-- @endforeach --}}
                    </select>
                </div>
                <div class="form-group">
                    <label>Lama Peminjaman</label>
                    <select class="select2bs4" multiple="multiple" data-placeholder="peminjaman maksimal 8 hari"
                        style="width: 100%;" name="durasi">
                        @php
                            $start = 8;
                        @endphp
                        @for ($i = 0; $i <= $start; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor

                    </select>
                </div>
                <div class="form-group">
                    <label>Date:</label>
                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="date" name="tanggal_peminjaman" class="form-control datetimepicker-input" data-target="#reservationdate">

                    </div>
                </div>
                <div class="form-group">
                    <input type="hidden" name="user_id" class="form-control" id="exampleInputEmail1"
                        value="{{$user->id}}">
                    
                </div>
                
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection
