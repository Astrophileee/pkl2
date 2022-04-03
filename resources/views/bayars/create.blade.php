@extends('layouts.app',['title' => 'New Pembayaran'])

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
        
            <div class="card">
                <div class="card-header">New Pembayaran</div>
                <div class="card-body">
                    <form action="/bayar/store" method="post" autocomplete="off">
                        @csrf
                        @include('bayars.partials.from-control', ['submit' =>'Create'])
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop