@extends('layouts.app',['title' => 'Edit Pemeriksaan'])

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
        
            <div class="card">
                <div class="card-header">Update Pemeriksaan: {{ $pemeriksaan->pasien_id}}</div>
                <div class="card-body">
                    <form action="/pemeriksaan/update" method="post" autocomplete="off">
                        @method('patch')
                        @csrf
                        <input type="hidden" name="id" value="{{ $pemeriksaan->id }}" id="id" class="form-control">
                        @include('pemeriksaans.partials.from-control')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop