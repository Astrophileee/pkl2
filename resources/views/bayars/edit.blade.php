@extends('layouts.app',['title' => 'Edit Pembayaran'])

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
        
            <div class="card">
                <div class="card-header">Update Pembayar: {{ $bayar->pasien_id}}</div>
                <div class="card-body">
                    <form action="/bayar/update" method="post" autocomplete="off">
                        @method('patch')
                        @csrf
                        <input type="hidden" name="id" value="{{ $bayar->id }}" id="id" class="form-control">
                        @include('bayars.partials.from-control')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop