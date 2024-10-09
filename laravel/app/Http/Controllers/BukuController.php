<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBukuRequest;
use App\Http\Requests\UpdateBukuRequest;
use App\Http\Resources\BukuResource;
use App\Models\Buku;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class BukuController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        return view("buku.index", [
            'bukus' => DB::table('bukus')->get()
        ]);
    }

    public function create()
    {
        return view("buku.create");
    }

    public function store(StoreBukuRequest $request)
    {
        $ValidatedData = $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'kategori' => 'required',
            'sampul' => 'required|image|file|max:2048',
        ]);

        if ($request->file('sampul')) {
            $ValidatedData['sampul'] = $request->file('sampul')->store('/sampul-buku');
        }
        Buku::create($ValidatedData);
        Alert::success('Data Buku Berhasil Ditambahkan', 'Anda akan dialihkan ke halaman utama.');
        return redirect('/buku');
    }

    public function edit($id) {
        $test = DB::table('bukus')->where('id', $id)->get();
        return view('buku.update', ['buku' => $test[0]]);
    }

    public function update(UpdateBukuRequest $request, $id)
    {
        $ValidatedData = $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'kategori' => 'required',
            'sampul' => 'image|file|max:2048',
        ]);
        if ($request->file('sampul')) {
            if ($request->sampulLama) {
                Storage::delete($request->sampulLama);
            }
            $ValidatedData['sampul'] = $request->file('sampul')->store('/sampul-buku');
        }
        Buku::where('id', $id) -> update($ValidatedData);
        Alert::success('Data Buku Berhasil DiUpdate', 'Anda akan dialihkan ke halaman utama.');
        return redirect('/buku');
    }

    public function destroy($id)
    {
        $test = DB::table('bukus')->select('sampul')
            ->where('id', $id)->get();
        if ($test[0]->sampul) {
            Storage::delete($test[0]->sampul);
        }
        Buku::destroy($id);
        Alert::success('Data Buku Berhasil DiHapus', 'Anda akan dialihkan ke halaman utama.');
        return redirect('/buku');
    }
}
