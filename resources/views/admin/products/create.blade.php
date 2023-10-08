@extends('layouts.app')
@section('title')
    Create New Product
@endsection
@section('content')
    <form action="{{route('products.store')}}" enctype="multipart/form-data" class="row" method="POST" onsubmit="return confirm('Are you sure you want to add this product!?')">
        @csrf
        @method("POST")
        <div class="col-6">
            <label for="name">Product name</label>
            <input type="text" id="name" name="name"  class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}" >
            <p class="text-danger">@error('name') {{$message}} @enderror</p>
        </div>

        <div class="col-6">
            <label for="sub_name">Product sub_name</label>
            <input type="text" id="sub_name" name="sub_name" class="form-control" value="{{old('sub_name')}}" >
            <p class="text-danger">@error('sub_name') {{$message}} @enderror</p>
        </div>

        <div class="col-6">
            <label for="category">Product Category</label>
            <select name="category" id="category" class="form-select">
                <option value="">---</option>
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->display_name}}</option>
                @endforeach
            </select>
            <p class="text-danger">@error('category') {{$message}} @enderror</p>
        </div>

        <div class="col-6">
            <label for="title">Product title</label>
            <input type="text" id="title" name="title" class="form-control">
            <p class="text-danger">@error('title') {{$message}} @enderror</p>
        </div>

        <div class="col-12">
            <label for="detail">Product detail</label>
            <textarea name="detail" id="detail" class="form-control" cols="30" rows="10">
                {{old('category')}}
            </textarea>
        </div>

        <div class="col-12">
            <label for="image">Product Images</label>
            <input type="file" accept=".jpg,.png" id="image" name="images[]" class="form-control" multiple>
            <p class="text-danger">@error('image') {{$message}} @enderror</p>
        </div>

        <button type="submit" class="btn btn-success btn-sm mt-2">Add</button>
    
    </form>
@endsection