@extends('layouts.app')
@section('title')
     Categories
@endsection
@section('content')

    <a href="{{ route("categories.create") }}" class="btn btn-success btn-sm">Add Category</a>

    @if ($categories->count()==0)
        <div class="alert alert-light alert-dismissible fade show mt-2" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <strong>Sorry</strong> There are no data yet
        </div>
    @else
   

    <table class="table">
        <thead>
          <tr>
            <td>Category Name</td>
            <td>Category Display Name</td>
            <td>Category Date</td>
            <td>Category Update Date</td>
            <td style="width: 200px" >Actions</td>
          </tr>
        </thead>
        <tbody>

              @foreach ($categories as $category)
              <tr>
                <td>{{$category->name}}</td>
                <td>{{$category->display_name}}</td>
                <td>{{$category->created_at}}</td>
                <td>{{$category->updated_at}}</td>
                <td style="width: 200px">
                    <a href="{{route('categories.edit',$category)}}" class="btn btn-sm btn-primary">edit</a>
                    <form method="POST" action="{{ route('categories.destroy', $category) }}" onsubmit=" return confirm('Are you sure!?') " class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
              </tr>
              @endforeach
        </tbody>
    </table>

@endif

    
@endsection