@extends('layouts.master')
@section('title')
  Halaman Detail Genre
@endsection
@section('content')

  <h1 class="text-primary">{{$genre->name}}</h1>
  <p>{{$genre->description}}</p>

  <hr>
  
  <div class="row">
  @forelse ($genre->Posts as $item)
      <div class="col-4">
          <div class="card">
    <img src="{{asset('image/'.$item->image)}}" class="card-img-top" height="300px" alt="...">
      <div class="card-body">
        <h5 class="card-title">{{$item->title}}</h5>
        <p class="card-text">{{Str::limit($item->content, 10)}}</p>
        <div class="d-grid gap-2">
            <a href="/post/{{$item->id}}" class="btn btn-info">Read More</a>
          </div>
      </div>
    </div>
  @empty
    <h1>Tidak ada Postingan di Genre Ini</h1>
  @endforelse
</div>

  <a href="/genre" class="btn btn-secondary btn-sm my-3">Kembali</a>

@endsection