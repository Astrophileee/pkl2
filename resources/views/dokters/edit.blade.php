@extends('layouts.app',['title' => 'Update Pasien'])

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
        
            <div class="card">
                <div class="card-header">Update Dokter: {{ $dokter->nama}}</div>
                <div class="card-body">
                    <form action="/dokter/update" method="post" autocomplete="off">
                        @method('patch')
                        @csrf
                        <input type="hidden" name="id" value="{{ $dokter->id }}" id="id" class="form-control">
                        @include('dokters.partials.from-control')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop