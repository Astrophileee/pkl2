@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between">
        <div>
            <h4>Data Dokters</h4>
            <hr>
        </div>
        <div>
            <a href="/dokter/create" class="btn btn-primary">New Dokter</a>
        </div>
        <form class="form-inline my-2 my-lg-0" action="/dokter" method="get">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    
    </div>
    
    <div class="row">
        <table class="table text-center">
        <tr>
        <th>
        Nama Dokter
        </th>
        <th>
        Nomor Izin
        </th>
        <th>
        Alamat
        </th>
        <th>
        Published
        </th>
        <th>
        Edit/Delete
        </th>
        <th>
        @forelse($dokters as $dokter)
        <tr>
        <td>
        {{ $dokter->nama }}
        </td>
        <td>
        {{ $dokter->no_izin}}
        </td>
        <td>
        {{ $dokter->alamat }}
        </td>
        <td>
        <div class=" d-flex justify-content-center">
        {{ $dokter->created_at->format("d M, Y") }}
        </div>
        </td>
        <td>
        <div class="">
        <a href="/dokter/{{$dokter->id}}/edit" class="btn btn-sm btn-success">Edit</a>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary btn-danger" data-toggle="modal" data-target="#exampleModal{{$dokter->id}}">
            Delete
            </button>
        </div>
        </td>
        </tr>
        <div class="modal fade" id="exampleModal{{$dokter->id}}" tabindex="-1" aria-labelledby="exampleModalLabel{{$dokter->id}}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Serius Nih Mau Di Hapus?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <div class="mb-2">
                <div>{{ $dokter->nama_pasien }}</div>
                <div class="text-secondry">
                    <small> Published: {{ $dokter->created_at->format("d F, Y") }}</small>
                </div>
            </div>
            <form action="/dokter/delete" method="post">
                @csrf 
                @method('delete')
                <button type="submit" name="id" value="{{ $dokter->id }}" class="btn btn-sm btn-danger">Delete
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
    <div class="d-flex justify-content-center">
    {{ $dokters->links() }}
    </div>
</div>


@stop