@extends('layouts.app')
@section('title')
     Products
@endsection
@section('content')

    <a href="{{ route("products.create") }}" class="btn btn-success btn-sm">Add Product</a>

    @if ($products->count()==0)
        <div class="alert alert-light alert-dismissible fade show mt-2" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <strong>Sorry</strong> There are no data yet
        </div>
    @else
   

    <table class="table">
        <thead>
          <tr>
            <td>Product Name</td>
            <td>Product Sub Name</td>
            <td>Product Catogry</td>
            <td>Product Title</td>
            <td>Detail</td>
            <td>Date</td>
            <td style="width: 200px" >Actions</td>
          </tr>
        </thead>
        <tbody>

              @foreach ($products as $product)
              <tr>
                <td>{{$product->name}}</td>
                <td>{{$product->sub_name}}</td>
                <td>{{$product->category->name}}</td>
                <td>{{$product->title}}</td>
                <td>{{  substr($product->detail, 0, 30)  }}</td>
                <td>{{$product->created_at}}</td>
                <td style="width: 200px">
                    <a href="{{route('products.show',$product)}}" class="btn btn-sm btn-primary">show</a>
                    <a href="{{route('products.edit',$product)}}" class="btn btn-sm btn-primary">edit</a>
                    <form method="POST" action="{{ route('products.destroy', $product) }}" onsubmit=" return confirm('Are you sure!?') " class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
              </tr>
              @endforeach
        </tbody>
        
    </table>
    {{-- {{$products->links()}} --}}
    <div>
      <canvas id="myChart"></canvas>
    </div>


    
  <script>
      const ctx = document.getElementById('myChart');
    
      new Chart(ctx, {
        type: 'bar',
        data: {
          labels: [
          @foreach ($products as $product)
            "{{$product->name}}",
          @endforeach],
          datasets: [{
            label: '# of Votes',
            data: 
            [
          @foreach ($products as $product)
            {{$product->images_count}},
          @endforeach]
            ,
            borderWidth: 1
          }]
        },
        options: {
          scales: {
            y: {
              beginAtZero: true
            }
          }
        }
      });
    </script>
    @endif

@endsection