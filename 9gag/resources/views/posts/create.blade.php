@extends ('layouts.app')

@section('content')
    <h3>Create Post</h3>
    {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('title', 'Title')}}
            {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
        </div>

        <div class="form-group">
            {{Form::label('author', 'Author')}}
            {{Form::text('author', '', ['class' => 'form-control', 'placeholder' => 'Author'])}}
        </div>

        <div class="form-group">
            {{Form::label('content', 'Content')}}
            {{Form::textarea('content', '', ['class' => 'form-control', 'placeholder' => 'Content'])}}
        </div>

        <div class="form-group">
            {{Form::label('points', 'Points')}}
            {{Form::text('points', '', ['class' => 'form-control', 'placeholder' => 'Points', 'value="0"'])}}
{{--            <input class="form-control" type="text" placeholder="Points" value="0">--}}
        </div>


    <div class="form-group">
            {{Form::file('cover_image')}}
        </div>

{{--        <div class="form-group">--}}
{{--            {{Form::label('points')}}--}}
{{--        </div>--}}

    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection
