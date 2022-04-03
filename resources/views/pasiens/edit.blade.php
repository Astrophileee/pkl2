@extends('layouts.app',['title' => 'Update Pasien'])

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
        
            <div class="card">
                <div class="card-header">Update Pasien: {{ $pasien->nama_pasien}}</div>
                <div class="card-body">
                    <form action="/pasien/update" method="post" autocomplete="off">
                        @method('patch')
                        @csrf
                        <input type="hidden" name="id" value="{{ $pasien->id }}" id="id" class="form-control">
                        @include('pasiens.partials.from-control')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop