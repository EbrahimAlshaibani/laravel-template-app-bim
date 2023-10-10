@extends('layouts.app')
@section('title')
     Products
@endsection
@section('content')
    <a href="{{ route("products.create") }}" class="btn btn-success btn-sm">Add Product</a>
    <table class="table table-bordered data-table">
      <thead>
          <tr>
              <th>name</th>
              <th>sub_name</th>
              <th>title</th>
              <th>category_name</th>
              <th width="280px">Action</th>
          </tr>
      </thead>
      <tbody>
      </tbody>
  </table>
  <div class="modal fade" id="ajaxModel" aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <h4 class="modal-title" id="modelHeading"></h4>

            </div>

            <div class="modal-body">

                <form id="productForm" name="productForm" class="form-horizontal">

                   <input type="hidden" name="product_id" id="product_id">

                    <div class="form-group">

                        <label for="name" class="col-sm-2 control-label">Name</label>

                        <div class="col-sm-12">

                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="" maxlength="50" required="">

                        </div>

                    </div>

       

                    <div class="form-group">

                        <label class="col-sm-2 control-label">Details</label>

                        <div class="col-sm-12">

                            <textarea id="detail" name="detail" required="" placeholder="Enter Details" class="form-control"></textarea>

                        </div>

                    </div>

        

                    <div class="col-sm-offset-2 col-sm-10">

                     <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Save changes

                     </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>
    {{-- @if ($products->count()==0)
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
    {{-- <div>
      <canvas id="myChart"></canvas>
    </div> --}}


    
  {{-- <script>
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
    @endif --}} 

@endsection


@section('scripts')
<script type="text/javascript">

  $(function () {
    $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });
    var table = $('.data-table').DataTable({
        "lengthMenu": [10, 20, 50, 100],
        processing: true,
        serverSide: true,
        ajax: "{{ route('products.index') }}",
        columns: [
            // {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
            {data: 'sub_name', name: 'sub_name'},
            {data: 'title', name: 'title'},
            // {data: 'detail', name: 'detail'},
            {data: 'category_name', name: 'category_name'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
  });
</script>


@endsection