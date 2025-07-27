@extends('layouts.master')
@section('title')
  Halaman Detail Post
@endsection
@section('content')

<img src="{{asset('image/'. $post->image)}}" width="100%" height="500px" alt="">
<h1 class="text-primary">{{post->title}}</h1>
<p>{{$post->content}}</p>
<hr>
<h1>List Komentar</h1>
@forelse ($post->comments as $item)
<div class="card my-3">
  <div class="card-header">
    {{$item->owner->name}}
  </div>
  <div class="card-body">
    <p class="card-text">{{$item->content}}</p>
  </div>
</div>
@empty
    <h3>Tidak Ada Komentar</h3>
@endforelse

<hr>
<h3>Buat Komentar</h3>
@auth
    

<form method="POST" action="/comments/{{post->id}}" enctype="multipart/form-data">
@csrf

{{--Validation--}}
  @if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>     
  @endif

  <div class="mb-3">
    <textarea name="content" class="form-control" placeholder="Isi Komentar ..." id="" cols="30" row="10"></textarea>
  </div>

  <button type="submit" class="btn btn-primary">Buat Komentar</button>
</form>

@endauth

@endsection