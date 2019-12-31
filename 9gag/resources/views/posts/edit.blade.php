@extends ('layouts.app')

@section('content')
    <h3>Edit Post</h3>
    {!! Form::open(['action' => ['PostsController@update', $post->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
        {{Form::label('title', 'Title')}}
        {{Form::text('title', $post->title, ['class' => 'form-control', 'placeholder' => 'Title'])}}
    </div>

    <div class="form-group">
        {{Form::label('author', 'Author')}}
        {{Form::text('author', $post->author, ['class' => 'form-control', 'placeholder' => 'Author'])}}
    </div>

    <div class="form-group">
        {{Form::label('content', 'Content')}}
        {{Form::textarea('content', $post->content, ['class' => 'form-control', 'placeholder' => 'Content'])}}
    </div>

    <div class="form-group">
        {{Form::label('points', 'Points')}}
        {{Form::text('points', $post->points, ['class' => 'form-control', 'placeholder' => 'Points'])}}
    </div>

    <div class="form-group">
        {{Form::file('cover_image')}}
    </div>

    {{Form::hidden( '_method', 'PUT')}}
    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection
