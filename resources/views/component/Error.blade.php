@extends('partial.dashboard.index')
@section('error')
    <div class="error-page">
        <h2 class="headline text-danger">403</h2>

        <div class="error-content">
            <h3><i class="fas fa-exclamation-triangle text-danger"></i> Wow! Kamu tidak boleh masuk kesini.</h3>

            <p>
                halaman  ini tidak khusus untuk staff, <a href="/">silahkan ke dashboard </a>
            </p>

            <form class="search-form">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Search">

                    <div class="input-group-append">
                        <button type="submit" name="submit" class="btn btn-danger"><i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
                <!-- /.input-group -->
            </form>
        </div>
    </div>
@endsection
<script>
    // Fungsi untuk mengalihkan pengguna setelah 5 detik
    function redirectToPage() {
        setTimeout(function() {
            window.location.href = '{{ url('/') }}'; // Ganti '/target-page' dengan URL tujuan Anda
        }, 5000); // 5000 milidetik = 5 detik
    }

    // Panggil fungsi saat halaman selesai dimuat
    window.onload = redirectToPage;
</script>