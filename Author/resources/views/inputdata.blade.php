@extends('template')
@section('title', 'Edit Data Buku')

@section('konten')
    <form action="/databuku/store" method ="post">
        {{csrf_field()}}
        id_buku <br>  <input type=text, name="id_buku", required="required"><br>
        judul_buku<br> <input type=text, name="judul_buku", required="required"><br>
        tahun_terbit <br><input type=text, name="tahun_terbit", required="required"><br>
        jumlah_publikasi<br> <input type=text, name="jumlah_publikasi", required="required"><br>
        <input type="submit" value="Simpan Data">
    </form>

@endsection