@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between">
        <div>
            <h4>Data Pemeriksaan</h4>
            <hr>
        </div>
        <div>
            <a href="/pemeriksaan/create" class="btn btn-primary">New Pemeriksaan</a>
        </div>

        <form class="form-inline my-2 my-lg-0" action="/pemeriksaan" method="get">
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
        poli
        </th>
        <th>
        Keluhan
        </th>
        <th>
        Diagnosa
        </th>
        <th>
        obat
        </th>
        <th>
        Published
        </th>
        <th>
        Edit/Delete
        </th>
        </tr>
        @forelse($pemeriksaans as $pemeriksaan)
        <tr>
        <td>
        {{ $pemeriksaan->pasien->nama_pasien }}
        </td>
        <td>
        {{ $pemeriksaan->dokter->nama }}
        </td>
        <td>
        {{ $pemeriksaan->poli }}
        </td>
        <td>
        {{ $pemeriksaan->keluhan}} 
        </td>
        <td>
        {{ $pemeriksaan->diagnosa }}
        </td>
        <td>
        {{ $pemeriksaan->obat }}
        </td>
        <td>
        <div class=" d-flex justify-content-center">
        {{ $pemeriksaan->created_at->format("d M, Y") }}
        </div>
        </td>
        <td>
        <div class="">
        <a href="/pemeriksaan/{{$pemeriksaan->id}}/edit" class="btn btn-sm btn-success">Edit</a>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary btn-danger" data-toggle="modal" data-target="#exampleModal{{$pemeriksaan->id}}">
            Delete
            </button>
            </div>
        </div>
        </td>
        </tr>
        <div class="modal fade" id="exampleModal{{$pemeriksaan->id}}" tabindex="-1" aria-labelledby="exampleModalLabel{{$pemeriksaan->id}}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Serius Nih Mau Di Hapus?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <div class="mb-2">
                <div>{{ $pemeriksaan->nama_pasien }}</div>
                <div class="text-secondry">
                    <small> Published: {{ $pemeriksaan->created_at->format("d F, Y") }}</small>
                </div>
            </div>
            <form action="/pemeriksaan/delete" method="post">
                @csrf 
                @method('delete')
                <button type="submit" name="id" value="{{ $pemeriksaan->id }}" class="btn btn-sm btn-danger">Delete
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
    {{ $pemeriksaans->links() }}
    </div>
</div>


@stop