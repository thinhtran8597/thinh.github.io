@extends ('layouts.app')

@section('content')
    <h1>Posts</h1>
<!--    --><?php
//    var_dump($posts);exit();?>

    @if(count($posts) > 0)
        @foreach($posts as $post)
            <div class="well">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <img style="width: 100%" src="/9gag/public/storage/cover_images/{{$post->cover_image}}">
                    </div>
                    <br>
                    <div class="col-md-8 col-sm-8">
                        <h2><a href="/9gag/public/posts/{{$post->id}}">{{$post->title}}</a></h2>
                        <small><a href="/9gag/public/posts/{{$post->id}}">{{$post->author}}</a></small>
                        <h4>{{$post->content}}</h4>
{{--                        <div class="cmts">--}}
{{--                            <p>{{$comment->user_name}}</p>--}}
{{--                        </div>--}}
                        <div class="click">
                            <p class="points"><span>{{$post->points}}</span> points</p>
                            <div class="button_zise">
                                <a class="button-like" data-post-id="{{$post->id}}" data-post-list="{{$post->points}}">
                                    <i class=" fas fa-arrow-alt-circle-up"></i>
                                </a>
                                <a class="button-unlike" data-post-id="{{$post->id}}" data-post-list="{{$post->points}}">
                                    <i class=" fas fa-arrow-alt-circle-down"></i>
                                </a>
                            </div>
                        </div>
                        <small>Written on {{$post->created_at}}</small>
                    </div>
                </div>
            </div>
        @endforeach
        {{$posts->links()}}
    @else
        <p>No posts found</p>
    @endif

    <style>
        .button_zise {
            font-size: 40px !important;
        }

        .button-like {
            text-decoration: none !important;
        }
        .row {
            margin-top: 40px;
        }

        .well {
            margin-bottom: 30px;
        }

        .points {
            margin-bottom: 0px;
        }

        .col-md-8 {
            margin-top: -10px;
        }

</style>

    <script language="JavaScript">
        var flag_1 = 0;
        var flag_2 = 0;
        var tmp;
        var reset_1 = 0;
        var reset_2 = 0;

        $(".button-like").click(function() {
            reset_2 = 1;
            var postId = $(this).attr('data-post-id');
            var point = $(this).closest('.click').find('.points > span').html();
            tmp = $(this).attr('data-post-list');
            // $(this).closest('.click').find('.points > span').html(parseInt(point) + 1);
            // $.ajax({
            //     url: 'http://localhost:3000/9gag/public/ajax',
            //     success: function(result) {
            //         console.log(result);
            //     },
            //     data:{
            //         post_id: postId,
            //         count: 1
            //     },
            //     type: "GET"
            // })
            if(reset_1==1) {
                flag_1 = 0;
                reset_1=0;
            }
            if (flag_1 == 0) {
                $(this).closest('.click').find('.points > span').html(parseInt(tmp) + 1);
                flag_1 = 1;
            } else {
                $(this).closest('.click').find('.points > span').html(parseInt(tmp));
                flag_1 = 0;
            }
            // var postId = $(this).attr('data-post-id');
            // var point = $(this).closest('.click').find('.points > span').html();
            // $(this).closest('.click').find('.points > span').html(parseInt(point) + 1);

            console.log(postId);
            $.ajax({
                url: 'http://localhost:3000/9gag/public/ajax',
                success: function(result) {
                },
                data:{
                    post_id: postId,
                    count: $(this).closest('.click').find('.points > span').html()
                },
                type: "get"
            })
        });

        $(".button-unlike").click(function() {
            reset_1 = 1;
            var postId = $(this).attr('data-post-id');
            var point = $(this).closest('.click').find('.points > span').html();
            tmp = $(this).attr('data-post-list');
            // $(this).closest('.click').find('.points > span').html(parseInt(point) - 1);

            if(reset_2==1) {
                flag_2 = 0;
                reset_2=0;
            }
            if (flag_2 == 0) {
                $(this).closest('.click').find('.points > span').html(parseInt(tmp) - 1);
                flag_2 = 1;
            } else {
                $(this).closest('.click').find('.points > span').html(parseInt(tmp));
                flag_2 = 0;
            }
            console.log(postId);
            $.ajax({
                url: 'http://localhost:3000/9gag/public/ajax',
                success: function(result) {
                    console.log(result);

                },
                data:{
                    post_id: postId,
                    count: $(this).closest('.click').find('.points > span').html()
                },
                type: "GET"

            })

        });
    </script>
@endsection

