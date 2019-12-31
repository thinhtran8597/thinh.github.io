@extends ('layouts.app')

@section('content')
    <a href="/9gag/public/posts" class="btn btn-primary">Go Back</a>
    <h1>{{$post->title}}</h1>
    <img style="width: 20%" src="/9gag/public/storage/cover_images/{{$post->cover_image}}">
    <br>
    <div>
        <h3>{{$post->author}}</h3>
        {!!$post->content!!}
    <p><span>{{$post->points}}</span> points</p>
    <small>Written on {{$post->created_at}}</small>
    </div>
    <hr>

    <div>
    <a href="/9gag/public/posts/{{$post->id}}/edit" class="btn btn-primary">Edit</a>
    </div>

    <div class="delete">
    {!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right']) !!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
    {!! Form::close() !!}
    </div>
    <br>
    <br>
    <hr>
        <h5>What do you think ?</h5>
        {!! Form::open(['action'=> 'CommentsController@store', 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('user_name', 'User')}}
            {{Form::text('user_name','', ['class'=>'form-control', 'placeholder' => 'User'])}}

            {{Form::label('com_content', 'Comments')}}
            {{Form::text('com_content','', ['class'=>'form-control', 'placeholder' => 'Comments'])}}

            <input type="text" value="{{$post->id}}" name="post_id" hidden>
        </div>
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
        {!! Form::close() !!}
    <br>

        <h4>Comments :</h4>
    <div class="border">
        @foreach($comments as $comment)
            <div class="word">
                <small>{{$comment->user_name}}</small> : {{$comment->com_content}}
            </div>
        @endforeach
    </div>
    <br>

@endsection



<style>
    .delete {
        position: absolute;
        margin-top: -35px;
        right:100px;
        width: 100px;
        height: 120px;
    }

    small {
        color: rgba(95, 95, 95, 0.68);
    }
    .border {
        padding-bottom: 10px;
        padding-top: 10px;
        padding-left: 10px;
    }
</style>
