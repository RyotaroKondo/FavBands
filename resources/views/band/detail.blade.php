@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">バンド名</div>
                    <img src="{{asset('images')}}/{{$band->image}}" class="img-responsibe" width="250">
                <div class="card-body">
   
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">詳細</div>
                    <p><h2>{{$band->name}}</h2></p>
                    <p class="lead">{{$band->description}}</p>
                    <p><h4>{{$band->url}}</h4></p>
                    
                <div class="card-body">
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
