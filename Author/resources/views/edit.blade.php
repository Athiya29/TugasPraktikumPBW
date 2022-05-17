@extends('template')
@section('title', 'Edit Data Buku')

@section('konten')
    @foreach($data_buku as $DB)
    <div class="content">
        <div class="edit">
        <form action="/databuku/update" method ="post">
            {{csrf_field()}}
            id buku  <br>  <input type=text, name="id_buku", required="required", value="{{$DB['id_buku']}}"><br>
           judul buku<br> <input type=text, name="judul_buku", required="required", value="{{$DB['judul_buku']}}"><br>
           tahun tebrit<br><input type=text, name="tahun_terbit", required="required", value="{{$DB['tahun_terbit']}}"><br>
           jumlah publikasi <br> <input type=text, name="jumlah_publikasi", required="required", value="{{$DB['jumlah_publikasi']}}"><br>
            <input type="submit" value="Simpan Data">
        </form>
    @endforeach
@endsection