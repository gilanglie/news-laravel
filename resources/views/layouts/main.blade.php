@extends('index')
@section('content')
<div class="container-fluid main-header">
    <div class="row no-gutters">
        <div class="col-3 left-content slider-nav">
            @foreach ($articles->slice(0, 3) as $latest)
            <div class="card text-white" style="background:url({{$latest->img}})">
                <div class="card-body overlay" >
                    <h5 class="badge badge-{{$latest->tag}}">{{$latest->tag}}</h5>
                    <h5 class="card-title">{{$latest->title}}</h5>
                    <h6 class="card-subtitle mb-2">{{$latest->created_at}}</h6>
                </div>
            </div>
            @endforeach
        </div>
        <div class="col-6 main-banner slider-for">
            @foreach ($articles->slice(0, 3) as $latest)
            <a href="article/{{$latest->id}}">
            <div class="card text-white" style="background:url({{$latest->img}})">
                <div class="card-body overlay" >
                  <div class="bottom">
                    <h5 class="badge badge-{{$latest->tag}}">{{$latest->tag}}</h5>
                    <h5 class="card-title">{{$latest->title}}</h5>
                    <h6 class="card-subtitle mb-4">{{$latest->created_at}}</h6>
                    <h6 class="text markdown">{{$latest->markdown}}</h6>
                  </div>
                </div>
            </div>
            </a>
            @endforeach
        </div>
        <div class="col-3 right-content">
            @include('include.forecast')
            @include('include.rate')
        </div>
    </div>
</div>
<div class="container content mt-4  ">
  <div class="row">
    @foreach ($articles as $article)
    <a class="col-4 text-dark" href="article/{{$article->id}}">
      <div class="card shadow mb-4 article-card">
        <div class="card-top">
          <img class="card-img-top" src="{{$article->img}}">
          <span class="badge badge-{{$article->tag}}">{{$article->tag}}</span>
        </div>
        <div class="card-body">
          <h4 class="card-title">{{$article->title}}</h4>
        </div>
        <div class="card-footer text-muted">
          Posted on {{$article->created_at}}
        </div>
      </div>
    </a>
    @endforeach
    {{ $articles->links() }}
  </div>
</div>

</div>
@endsection
