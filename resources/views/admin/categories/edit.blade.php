@extends('layouts.app')
@section('title')
    Edit Category
@endsection
@section('content')
    <form action="{{route('categories.update',$category)}}" enctype="multipart/form-data" class="row" method="POST" onsubmit="return confirm('Are you sure you want to add this Category!?')">
        @csrf
        @method("PUT")
        <div class="col-6">
            <label for="name">Category name</label>
            <input type="text" id="name" name="name"  class="form-control @error('name') is-invalid @enderror" value="{{$category->name}}" required>
            <p class="text-danger">@error('name') {{$message}} @enderror</p>
        </div>
        <div class="col-6">
            <label for="display_name">Category Display Name</label>
            <input type="text" id="display_name" name="display_name"  class="form-control @error('display_name') is-invalid @enderror" value="{{$category->display_name}}" required>
            <p class="text-danger">@error('display_name') {{$message}} @enderror</p>
        </div>
        <button type="submit" class="btn btn-success btn-sm mt-2">Update</button>
    
    </form>
@endsection