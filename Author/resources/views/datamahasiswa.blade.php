@extends('template')
@section('title', 'Data Buku')

@section('konten')
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>

<div class="container">
    <h2> Data buku </h2>
	<div class="row">
        <div class="table-responsive">                
            <table id="mytable" class="table table-bordred table-striped">
                <thead>
                    <th>id_buku</th>
                    <th>judul_buku</th>
                    <th>tahun_terbit</th>
                    <th>jumlah_publikasi</th>
                </thead>
            <tbody> 
                @foreach($data_buku as $db)
                <tr>
                    <td>{{$db->id_buku}}</td>
                    <td>{{$db->judul_buku}}</td>
                    <td>{{$db->tahun_terbit}}</td>
                    <td>{{$db->jumlah_publikasi}}</td>
                    <td>
                        <a href="/databuku/edit/{{$db->id_buku}}">Edit</a>
                        <a style="color:red;" href="/databuku/hapus/{{$db->id_buku}}">Hapus</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection