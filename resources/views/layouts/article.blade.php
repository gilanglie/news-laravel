@extends('index')
@section('content')
<div class="container mt-4">
    <div class="row">
        <img src="{{$article['img']}}"/>
        <div class="page-header mt-4">
            <h1>{{$article['title']}}</h1>
        </div>
        <div class="col-md-12">
        {{$article['text']}}
        </div>
    </div>
</div>

@endsection
