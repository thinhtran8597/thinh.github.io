<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Post;


class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $posts = Post::orderBy('title', 'desc') -> get();
//        $posts = DB::select('SELECT * FROM posts');
        $posts = Post::orderBy('created_at', 'desc') -> paginate(10);
        return view('posts.index') -> with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this -> validate($request, [
            'title' => 'required',
            'author' => 'required',
            'content' => 'required',
            'cover_image' =>'image|nullable|max:1999',


        ]);

        //handle file upload
        if($request->hasFile('cover_image')) {
            //get filename with extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            //getjust filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //filename to store
            $fileNametoStore = $filename . '_' . time() . '.' . $extension;
            //upload file
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNametoStore);
        } else{
            $fileNametoStore = 'noimage.jpg';

        }

        //Create Post
        $post = new Post;
        $post->title = $request ->input('title');
        $post->author = $request ->input('author');
        $post->content = $request ->input('content');
        $post->points = $request ->input('points');
        $post->cover_image = $fileNametoStore;
        $post->save();

        return redirect('/posts')->with ('success', 'Post Create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        $comments = Comment::where('comments.post_id', $id)->get();
//        var_dump($comments->toArray());
//        exit;
        return view('posts.show') ->with('post', $post)->with('comments', $comments);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit') ->with('post', $post);
    }

    public function like()
    {
        $post = Post::find($_GET['post_id']);
        $post->points = $_GET['count'];

        $post->save();
    }

    public function unlike()
    {
        $post = Post::find($_GET['post_id']);
        $post->points = $_GET['count'];

        $post->save();
    }

    public function comment(Request $request, $id)
    {
        $comment = new Comment;
        $comment->post_id = $request ->input('post_id');
        $comment->user_name = $request ->input('user_name');
        $comment->com_content = $request ->input('com_content');

        $comment ->save();
        return redirect('/comments')->with ('success', 'Comments created');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this -> validate($request, [
            'title' => 'required',
            'author' => 'required',
            'content' => 'required',
        ]);

        //handle file upload
        if($request->hasFile('cover_image')) {
            //get filename with extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            //getjust filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //filename to store
            $fileNametoStore = $filename . '_' . time() . '.' . $extension;
            //upload file
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNametoStore);
        }

        //Create Post
        $post = Post::find($id);
        $post->title = $request ->input('title');
        $post->author = $request ->input('author');
        $post->content = $request ->input('content');
        $post->points = $request ->input('points');
        if($request->hasFile('cover_image')) {
            $post->cover_image = $fileNametoStore;
        }
        $post->save();

        return redirect('/posts')->with ('success', 'Post Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        if($post->cover_image !='noimage.jpg') {
            //delete image
            Storage::delete('public/cover_images'.$post->cover_image);

        }
        $post ->delete();
        return redirect('/posts') ->with('success', 'Post Removed');
    }
}
