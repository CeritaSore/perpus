<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\Borrow;
use App\Models\Categories;
use App\Models\Penerbit;
use App\Models\Pengarang;
use App\Models\User;
use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class DashboardController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        if (Auth::check() && Auth::user()->status !== 'Not Active') {
            $pengarang = Pengarang::count();
            $books = Books::count();
            $borrow = Borrow::count();
            $user = Auth::user();
            $activeUsersCount = User::where('status', 'Active')->count();
            return view('component.index', compact('pengarang', 'books', 'activeUsersCount', 'user', 'borrow'));
        } else {
            return redirect('/login');
        };
    }
    // books
    public function books()
    {
        if (Auth::check() && Auth::user()->status !== 'Not Active') {
            $user = Auth::user();
            $borrowData = Borrow::all();
            $list = [Books::all(), Penerbit::all(), Pengarang::all(), Categories::all(),];
            return view('component.books', compact('user', 'list', 'borrowData'));
        }
    }
    public function inputBooks(Request $request)
    {
        // dd($request);
        $data = $request->validate([
            'book' => 'required|max:50',
            'pengarang' => 'required',
            'penerbit' => 'required',
            'kategori' => 'required',
            'terbitan' => 'required',
            'photos' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $path = $request->file('photos')->store('images', 'public');
        Books::create([
            'judul_buku' => $data['book'],
            'pengarang_id' => $data['pengarang'],
            'penerbit_id' => $data['penerbit'],
            'kategori_id' => $data['kategori'],
            'tahun_terbit' => $data['terbitan'],
            'foto' => $path,
        ]);
        return redirect('/book')->with('success', 'data berhasil ditambahkan');
    }
    public function editBooks(Request $request, $idbuku)
    {
        // dd($request);
        $data = $request->validate([
            'book' => 'required|max:50',
            'pengarang' => 'required',
            'penerbit' => 'required',
            'kategori' => 'required',
            'terbitan' => 'required',
            'photos' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $update = Books::find($idbuku);
        if ($request->hasFile('photos')) {
            // Hapus foto lama jika ada
            if ($update->foto) {
                Storage::disk('public')->delete($update->foto);
            }

            // Simpan foto baru
            $path = $request->file('photos')->store('images', 'public');

            // Update path foto di database
            $update->foto = $path;
        }
        $update->judul_buku = $data['book'];
        $update->pengarang_id = $data['pengarang'];
        $update->penerbit_id = $data['penerbit'];
        $update->kategori_id = $data['kategori'];
        $update->tahun_terbit = $data['terbitan'];
        $update->save();
        return redirect('/book')->with('success', 'data berhasil diupdate');
    }
    public function deleteBooks(Request $request, $idbuku)
    {
        // dd($request);
        $delete = Books::find($idbuku);
        $delete->delete();
        return redirect('/book')->with('success', 'data dihapus');
    }
    // pengarang
    public function authors()
    {
        $list = Pengarang::all();
        if (Auth::check() && Auth::user()->status !== 'Not Active') {
            $user = Auth::user();
            return view('component.authors', compact('user', 'list'));
        }
    }
    public function inputAuthors(Request $request)
    {
        // dd($request);
        $data = $request->validate([
            'pengarang' => 'required|max:50',
        ]);

        // Buat entri baru dalam tabel 'pengarangs'
        Pengarang::create([
            'nama_pengarang' => $data['pengarang'],
        ]);
        return redirect('/author')->with('success', 'data berhasil di tambah');
    }
    public function editAuthor(Request $request, $idpengarang)
    {
        // dd($request);
        $data = $request->validate([
            'pengarang' => 'required|max:50',
        ]);
        $update = Pengarang::find($idpengarang);
        $update->nama_pengarang = $data['pengarang'];
        $update->save();
        return redirect('/author')->with('success', 'data diupdate');
    }
    public function deleteAuthor(Request $request, $idpengarang)
    {
        // dd($request);
        $delete = Pengarang::find($idpengarang);
        $delete->delete();
        return redirect('/author')->with('success', 'data dihapus');
    }

    //end of pengarang
    //
    public function publisher()
    {
        $list = Penerbit::all();
        if (Auth::check() && Auth::user()->status !== 'Not Active') {
            $user = Auth::user();
            return view('component.publisher', compact('user', 'list'));
        }
    }
    public function savePublisher(Request $request)
    {
        // dd($request);
        $data = $request->validate([
            'penerbit' => 'required|max:50'
        ]);
        Penerbit::create([
            'nama_penerbit' => $data['penerbit']
        ]);
        return redirect('/publisher');
    }
    public function editPublisher(Request $request, $idpenerbit)
    {
        // dd($request);
        $data = $request->validate([
            'penerbit' => 'required|max:50'
        ]);
        $update = Penerbit::find($idpenerbit);
        $update->nama_penerbit = $data['penerbit'];
        $update->save();
        return redirect('/publisher');
    }
    public function deletePublisher(Request $request, $idpenerbit)
    {
        // dd($request);
        $delete = Penerbit::find($idpenerbit);
        $delete->delete();
        return redirect('/publisher')->with('success', 'data dihapus');
    }
    // categories
    public function categories()
    {
        if (Auth::check() && Auth::user()->status !== 'Not Active') {
            $user = Auth::user();
            $list = Categories::all();
            return view('component.categories', compact('user', 'list'));
        }
    }

    public function inputCategories(Request $request)
    {
        // dd($request);
        $data = $request->validate([
            'kategori' => 'required|max:50'
        ]);
        Categories::create([
            'kategori' => $data['kategori']
        ]);
        return redirect('/categories');
    }
    public function editCategories(Request $request, $idkategori)
    {
        // dd($request);
        $data = $request->validate([
            'kategori' => 'required|max:50'
        ]);
        $update = Categories::find($idkategori);
        $update->kategori = $data['kategori'];
        $update->save();
        return redirect('/categories');
    }
    public function deleteCategories(Request $request, $idkategori)
    {
        // dd($request);
        $delete = Categories::find($idkategori);
        $delete->delete();
        return redirect('/categories');
    }
    // end of categories

    public function borrow(Request $request)
    {
        // dd($request);
        if (Auth::check() && Auth::user()->status !== 'Not Active') {
            $data = $request->only('idbuku', 'judul');
            $user = Auth::user();
            return view('component.borrow', compact('user', 'data'));
        }
    }
    public function inputBorrow(Request $request)
    {
        // dd($request);
        $data = $request->validate([
            'books' => 'required',
            'durasi' => 'required',
            'tanggal_peminjaman' => 'required',
            'user_id' => 'required',
            // 'idbuku' => 'required|exists:buku,id',
            // 'durasi' => 'required|integer|min:1',
            // 'tanggal_peminjaman' => 'required|date',
            // 'user_id' => 'required|exists:users,id',
        ]);
        borrow::create([
            'buku_id' => $data['books'],
            'tanggal_peminjaman' => $data['tanggal_peminjaman'],
            'lama_peminjaman' => $data['durasi'],
            'user_id' => $data['user_id'],
        ]);
        return redirect('/book')->with('success', 'kamu berhasil meminjam, silahkan tunggu konfirmasi dari admin');
    }
    public function statusIndex()
    {
        if (Auth::check()) {
            $user = Auth::user();
            if (Auth::user()->role === 'Member') {
                $list = Borrow::where('user_id', Auth::user()->id)->get();
                return view('component.status', compact('user', 'list'));
            } else {
                $list = Borrow::all();
                return view('component.status', compact('user', 'list'));
            }
        }
    }
    public function changeStatus(Request $request, $idpeminjaman)
    {
        // dd($request);
        $data = $request->validate([
            'status' => 'required|in:tertunda,disetujui,dikembalikan',
        ]);
        $update = Borrow::find($idpeminjaman);
        if ($request->status == 'disetujui') {
            $update->status = $data['status'];
            $update->save();

            $updates = Books::find($request->bukuid);
            $updates->status = 'sedang dipinjam';
            $updates->save();
        } else if ($request->status == 'dikembalikan') {
            $update->status = $data['status'];
            $update->save();

            $updates = Books::find($request->bukuid);
            $updates->status = 'tersedia';
            $updates->save();
        } else {
            $update->status = 'tertunda';
            $update->save();

            $updates = Books::find($request->bukuid);
            $updates->status = 'tersedia';
            $updates->save();
        }
        return redirect('/statusBorrow');
    }
    public function deleteStatus(Request $request, $idpeminjaman)
    {
        // dd($request);
        $delete = Borrow::find($idpeminjaman);
        $delete->delete();
        return redirect('statusBorrow');
    }
    public function user()
    {
        if (Auth::check() && Auth::user()->status !== 'Not Active') {
            $user = Auth::user();
            $users = User::all();
            return view('component.user', compact('user', 'users'));
        }
    }
    public function userInput(Request $request)
    {
        // dd($request);
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email:rfc,dns',
            'role' => 'required|in:Member,Administrator,Staff',
        ]);
        $password = Str::random(8);
        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'role' => $data['role'],
            'password' => bcrypt($password),
        ]);
        return redirect('user')->with('success', 'data berhasil ditambahkan');
    }
    public function changeInput(Request $request, $id)
    {
        // dd($request);
        $data = $request->validate([
            "name" => "required",
            "role" => "required|in:Member,Administrator,Staff",
            "status" => "required|in:Active,Not Active,Banned"
        ]);
        $password = Str::random(8);
        $update = user::find($id);
        $update->name = $data['name'];
        $update->role = $data['role'];
        $update->status = $data['status'];
        $update->password = $password;
        $update->save();
        return redirect('user')->with('success', 'data berhasil ditambahkan');
    }
    public function deleteInput(Request $request, $id)
    {
        // dd($request);
        $delete = User::find($id);
        $delete->delete();
        return redirect('user');
    }
    public function error()
    {
        if (Auth::check()) {
            $user = Auth::user();
            return view('component.Error', compact('user'));
        }
    }
}
