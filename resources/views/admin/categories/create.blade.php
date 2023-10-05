@extends('layouts.app')
@section('title')
    Create New Category
@endsection
@section('content')
    <form action="{{route('categories.store')}}" enctype="multipart/form-data" class="row" method="POST" onsubmit="return confirm('Are you sure you want to add this Category!?')">
        @csrf
        @method("POST")
        <div class="col-6">
            <label for="name">Category name</label>
            <input type="text" id="name" name="name"  class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}" required>
            <p class="text-danger">@error('name') {{$message}} @enderror</p>
        </div>
        <div class="col-6">
            <label for="display_name">Category Display Name</label>
            <input type="text" id="display_name" name="display_name" class="form-control @error('display_name') is-invalid @enderror" value="{{old('display_name')}}" required>
            <p class="text-danger">@error('display_name') {{$message}} @enderror</p>
        </div>
        <button type="submit" class="btn btn-success btn-sm mt-2">Add</button>
    
    </form>
@endsection