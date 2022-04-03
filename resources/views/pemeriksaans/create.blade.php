@extends('layouts.app',['title' => 'New Pemeriksaan'])

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
        
            <div class="card">
                <div class="card-header">New Pemeriksaan</div>
                <div class="card-body">
                    <form action="/pemeriksaan/store" method="post" autocomplete="off">
                        @csrf
                        @include('pemeriksaans.partials.from-control', ['submit' =>'Create'])
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop