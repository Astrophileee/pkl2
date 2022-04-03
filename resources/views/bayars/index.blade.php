@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between">
        <div>
            <h4>Data Pembayaran</h4>
            <hr>
        </div>
        <div>
            <a href="/bayar/create" class="btn btn-primary">New Pembayaran</a>
        </div>
    
        <form class="form-inline my-2 my-lg-0" action="/bayar" method="get">
        <input class="form-control mr-sm-2" value="{{request()->search ?? ''}}" type="search" placeholder="Search" aria-label="Search" name="search">
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
        Nama Dokter
        </th>
        <th>
        Pembayaran
        </th>
        <th>
        Published
        </th>
        <th>
        Bayar
        </th>
        <th>
        Edit/Delete
        </th>
        </tr>
        @forelse($bayars as $bayar)
        <tr>
        <td>
        {{ $bayar->pasien->nama_pasien }}
        </td>
        <td>
        {{ $bayar->dokter->nama }}
        </td>
        <td>
        {{ $bayar->pembayaran }}
        </td>
        <td>
        <div class=" d-flex justify-content-center">
        {{ $bayar->created_at->format("d M, Y") }}
        </div>
        </td>
        <td>
        {{ $bayar->bayar }}
        </td>
        <td>
        <div class="">
        <a href="/bayar/{{$bayar->id}}/edit" class="btn btn-sm btn-success">Edit</a>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary btn-danger" data-toggle="modal" data-target="#exampleModal{{$bayar->id}}">
            Delete
            </button>
            </div>
        </div>
        </td>
        </tr>
        <div class="modal fade" id="exampleModal{{$bayar->id}}" tabindex="-1" aria-labelledby="exampleModalLabel{{$bayar->id}}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Serius Nih Mau Di Hapus?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <div class="mb-2">
                <div>{{ $bayar->nama_pasien }}</div>
                <div class="text-secondry">
                    <small> Published: {{ $bayar->created_at->format("d F, Y") }}</small>
                </div>
            </div>
            <form action="/bayar/delete" method="post">
                @csrf 
                @method('delete')
                <button type="submit" name="id" value="{{ $bayar->id }}" class="btn btn-sm btn-danger">Delete
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
    {{ $bayars->links() }}
    </div>
</div>


@stop