@extends ('layouts.app')

@section('content')
    <h1>create comments</h1>
    {!! Form::open(['action'=> 'CommentsController@store', 'method' => 'POST']) !!}
    <div class="form-group">
        {{Form::label('user_name', 'User')}}
        {{Form::text('user_name','', ['class'=>'form-control', 'placeholder' => 'User'])}}
    </div>

    <div class="form-group">
        {{Form::label('com_content', 'Comments')}}
        {{Form::textarea('com_content','', ['class'=>'form-control', 'placeholder' => 'Comments'])}}
    </div>



    {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection
