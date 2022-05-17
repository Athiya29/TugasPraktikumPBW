<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class databukuController extends Controller
{
    public function readdata()
    {
        //mau ambil data dari tabel mahasiswa
        $data_buku= DB::table('data_buku')->get();

        // mengirim ke halaman edit data untuk tampilkan data buku
        return view('datamahasiswa',['data_buku'=>$data_buku]);
    }

    public function input()
    {
        return view('inputdata');
    }

    public function store(Request $request)
    {
        //memasukkan data kedalam databse
        DB::table('data_buku')->insert([
            'id_buku' => $request->id_buku,
            'judul_buku' => $request->judul_buku,
            'tahun_terbit' => $request->tahun_terbit,
            'jumlah_publikasi' => $request->jumlah_publikasi
        ]);

        return redirect('/tampildata');
    }

    public function edit($id_buku)
    {
        #ambil data buku berdasarkan $id_buku
        $data_buku = DB::table('data_buku')
        ->select('data_buku.*')->where('data_buku.id_buku', $id_buku)
        ->get();
        $data_buku = json_decode($data_buku, true);

        #passing data
        return view('edit', ['data_buku' => $data_buku]);
    }

    public function update(Request $request)
    {
        DB::table('data_buku')->where('id_buku', $request->id_buku)->update([
            'id_buku' => $request->id_buku,
            'judul_buku' => $request->judul_buku,
            'tahun_terbit' => $request->tahun_terbit,
            'jumlah_publikasi' => $request->jumlah_publikasi
        ]);

        return redirect('/tampildata');
    }

    public function hapus($id_buku)
    {
        DB::table('data_buku')->where('id_buku', $id_buku)->delete();
        return redirect('/tampildata');
    }

}