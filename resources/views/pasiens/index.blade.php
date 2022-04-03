@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between">
        <div>
            <h4>Data Pasiens</h4>
            <hr>
        </div>
        <div>
            <a href="/pasien/create" class="btn btn-primary">New Pasien</a>
        </div>
    <form class="form-inline my-2 my-lg-0" action="/pasien" method="get">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    </div>
    
    <div class="row">
        <table class="table text-center">
        <tr>
        <th>
        Nama Pasien
        </th>
        <th>
        Jenis Kelamin
        </th>
        <th>
        Alamat
        </th>
        <th>
        Tanggal Lahir
        </th>
        <th>
        No telpon
        </th>
        <th>
        No KTP
        </th>
        <th>
        Published
        </th>
        <th>
        Edit/Delete
        </th>
        </tr>
        @forelse($pasiens as $pasien)
        <tr>
        <td>
        {{ $pasien->nama_pasien }}
        </td>
        <td>
        {{ $pasien->jenis_kelamin }}
        </td>
        <td>
        {{ $pasien->alamat }}
        </td>
        <td>
        {{ date('d-m-Y', strtotime($pasien->tgl_lahir)) }} 
        </td>
        <td>
        {{ $pasien->no_tlp }}
        </td>
        <td>
        {{ $pasien->no_ktp }}
        </td>
        <td>
        <div class=" d-flex justify-content-between">
        {{ $pasien->created_at->format("d M, Y") }}
        </div>
        </td>
        <td>
            <div class="">
            <!-- {{ $pasien->created_at->format("d M, Y") }} -->
            <a href="/pasien/{{$pasien->id}}/edit" class="btn btn-sm btn-success">Edit</a>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary btn-danger" data-toggle="modal" data-target="#exampleModal{{$pasien->id}}">
            Delete
            </button>
            </div>
        </td>
        </tr>
        <div class="modal fade" id="exampleModal{{$pasien->id}}" tabindex="-1" aria-labelledby="exampleModalLabel{{$pasien->id}}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Serius Nih Mau Di Hapus?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <div class="mb-2">
                <div>{{ $pasien->nama_pasien }}</div>
                <div class="text-secondry">
                    <small> Published: {{ $pasien->created_at->format("d F, Y") }}</small>
                </div>
            </div>
            <form action="/pasien/delete" method="post">
                @csrf 
                @method('delete')
                <button type="submit" name="id" value="{{ $pasien->id }}" class="btn btn-sm btn-danger">Delete
                </button>
                    <button type="button" class="btn btn-success" data-dismiss="modal">Tidak</button>
                </form>
            </div>
            </div>
        </div>
        </div>
        @empty
        <tr>
        <td colspan="6" >No Data</td>
        </tr>
        @endforelse
        </table>    
    </div>
    <!-- Modal -->
    <div class="d-flex justify-content-center">
    {{ $pasiens->links() }}
    </div>
</div>


@stop