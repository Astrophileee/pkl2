@extends('layouts.app',['title' => 'New Pasien'])

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
        
            <div class="card">
                <div class="card-header">New pasien</div>
                <div class="card-body">
                    <form action="/pasien/store" method="post" autocomplete="off">
                        @csrf
                        @include('pasiens.partials.from-control', ['submit' =>'Create'])
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop