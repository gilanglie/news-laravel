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
    <div class="col-12 mb-4">
      <form class="row" method="get" action="/sort"> 
      {!! csrf_field() !!}
          <div class="mr-4">
            <select id="inputState" class="form-control" name="sortBy">
              @if($sort == 'DESC')
              <option value="DESC" selected>Newest Post</option>
              <option value="ASC">Older Post</option>
              @else
              <option value="DESC" >Newest Post</option>
              <option value="ASC" selected>Older Post</option>
              @endif
            </select>
          </div>
          <div class="dropdown mr-4">
            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownTag" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Select Tag
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownTag">
                @foreach ($tags as $tag)
                <div class="form-check dropdown-item">
                    <input class="form-check-input" name="tags[]" type="checkbox" id="{{$tag->tag}}" value="{{$tag->tag}}" {{$tag->checked}}>
                  <label class="form-check-label" for="{{$tag->tag}}" >{{$tag->tag}}</label>
                </div>
                @endforeach
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Sort</button>
      </form>
    </div>
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
          Posted on {{$article->created_at->diffForHumans()}}
        </div>
      </div> 
    </a>
    @endforeach
    {{ $articles->appends(request()->query())->links() }}  </div>
</div>

</div>
@endsection
