<?php

namespace App\Http\Controllers;

use illuminate\Http\Request;
use App\Models\Genre;
use App\Models\Post;
use File;
use illuminate\Routing\Controllers\HasMiddleware;
use illuminate\Routing\Controllers\Middleware;
use App\Http\Middleware\IsAdmin;

class PostController extends Controller implements HasMiddleware
{
    public static function middleware() : array
    {
      return [
          new Middleware(IsAdmin::class, except: ['index', 'show']),
      ];
    }
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $post = Post::all();
    return view('post.tampil', ['post' => $post]);
  }
 
  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $genre = Genre::all();
    return view('post.tambah', ['genre' => $genre]);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $request->validate([
      'image' => 'required|mimes:jpg,jpeg,png|max:2048',
      'title' =>'required',
      'content' => 'required',
      'genre_id' => 'required'
    ]);

    $newImageName = time().'.'.$request->image->extension();

    $request->image->move(public_path('image'), $newImageName);

    $post = new Post;

    $post->title = $request->input('title');
    $post->content = $request->input('content');
    $post->genre_id = $request->input('genre_id');
    $post->image = $newImageName;

    $post->save();

    return redirect('/post');
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    $post = Post::find($id);
    return view('post.detail', ['post' => $post]);
  }

  /**
   * show the form for editing the specified resorce.
   */
  public function edit(string $id)
  {
     $genre = Genre::all();
     $post = Post::find($id);
    return view('post.edit', ['post'=>$post, 'genre'=>$genre]);

  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
     $request->validate([
      'image' => 'mimes:jpg,jpeg,png|max:2048',
      'title' =>'required',
      'content' => 'required',
      'genre_id' => 'required'
     ]);
    $post = Post::find($id);
    if($request->has('image')){
      //hapus data lama
      Post::delete('image/'. $post->image);

      $newImageName = time().'.'.$request->image->extension();

      $request->image->move(public_path('image'), $newImageName); 
      
      $post->image= $newImageName;
    }

    $post->title = $request->input('title');
    $post->content = $request->input('content');
    $post->genre = $request->input('genre_id');

    $post->save();

    return redirect('/post');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    $post = Post::find($id);
    Post::delete('image/'. $post->image);

    $post->delete();

    return redirect('/post');

  }

  
}