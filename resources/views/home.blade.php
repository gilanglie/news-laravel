@extends('index')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-header">Dashboard</div>
            <div class="card-body">
                {{-- check auth status --}}
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <button type="button" class="btn btn-primary mb-4 add-btn" >Add New</button>

                {{-- filter  --}}
                <div class="col-12 mb-4">
                    <form class="row" method="get" action="/home/sort">
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

                {{-- article list --}}
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Tag</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($articles as $article)
                        <tr id="{{$article->id}}">
                            <td class="title">{{ $article->title }}</td>
                            <td class="tag">{{ $article->tag }}</td>
                            <td class="img d-none">{{ $article->img }}</td>
                            <td class="content d-none">{{ $article->text }}</td>
                            <td>
                                <button type="button" class="btn btn-warning mb-4 edit-btn">Edit</button>
                                <a class="btn btn-danger mb-4" href="/article/delete/{{ $article->id }}">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $articles->appends(request()->query())->links() }}  </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalPopup" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" action="/article/add" enctype="multipart/form-data">>
            {{ csrf_field() }}   {{ method_field('post') }}
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal">Add New</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" placeholder="" name="title">
                </div>
                <div class="form-group">
                    <label for="img" >Img Url</label>
                    <input type="text" class="form-control" id="img" placeholder="Example: https://lorempixel.com/1080/720/?75033" name="imgUrl">
                    <input type="file" name="imgFile" accept="image/*">
                </div>
                <div class="form-group">
                        <label for="tag">Tag</label>
                        <select class="form-control" id="tag" name="tag">
                            @foreach ($tags as $tag)
                                <option value="{{$tag->tag}}">{{$tag->tag}}</option>
                            @endforeach
                        </select>
                    </div>
                <div class="form-group">
                    <label for="text">Content</label>
                    <textarea class="form-control" id="text" rows="5" name="text"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </div>
        </form>
    </div>
</div>

<script>
    $('.add-btn').on('click',function(){
        var modal = $('#modalPopup');
        modal.find('form').attr('action','/article/add')
        modal.find('input[type="text"], select, textarea').val('')
        modal.modal('show');
    })

    $('.edit-btn').on('click',function(){
        var data = $(this).parents('tr');
        var id = data.attr('id');
        var title = data.find('.title').text();
        var img = data.find('.img').text();
        var tag = data.find('.tag').text();
        var content = data.find('.content').text();
        
        var modal = $('#modalPopup');
        modal.find('form').attr('action','/article/update/'+ id)
        modal.find('input[name="title"]').val(title)
        modal.find('input[name="imgUrl"]').val(img)
        modal.find('select[name="tag"]').val(tag)
        modal.find('textarea[name="text"]').val(content)
        modal.modal('show');
    })
</script>
@endsection
