@extends('layouts.master')
@section('title')
  Halaman Tambah Post
@endsection
@section('content')
    
<form method="POST" action="/post" enctype="multipart/form-data">
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

  </div>
    <div class="mb-3">
    <label class="form-label">Genre</label>
    <select name="genre_id" id="" class="form-control">
      <option value="">--Pilih Genre--</option>
      @@forelse ($Genre as $item)
          <option value="">{{$item->$name}}</option>
      @empty
          <option value="">Genre belum ada</option>
      @endforelse
    </select>
  </div>
  <div class="mb-3">
    <label class="form-label">Post Title</label>
    <input type="text" class="form-control" name="title">
  </div>
  <div class="mb-3">
    <label class="form-label">Post Content</label>
    <textarea name="content" class="form-control" id=" cols="30" row="10"></textarea>
  </div>
    <div class="mb-3">
    <label class="form-label">Post Image</label>
    <input type="file" class="form-control" name="image">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection