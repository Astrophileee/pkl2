@extends('layouts.app',['title' => 'New Dokter'])

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
        
            <div class="card">
                <div class="card-header">New Dokter</div>
                <div class="card-body">
                    <form action="/dokter/store" method="post" autocomplete="off">
                        @csrf
                        @include('dokters.partials.from-control', ['submit' =>'Create'])
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop