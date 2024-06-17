@extends('home')
@section('section')
<div class="card">
    <div class="card-header">
        <div class="card-toolbar">
            Product Create
        </div>
        <div class="card-toolbar float-right">
            <a href="{{ route('product.index')}}" class="btn btn-warning">Back</a>
        </div>
    </div>

    <div class="card-body">
        <form action="{{ route('product.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="exampleFormControlInput1">Name</label>
              <input type="text" name="name" class="form-control" id="exampleFormControlInput1" >
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Price</label>
                <input type="number" name="price" class="form-control" id="exampleFormControlInput1" >
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Image</label>
                <input type="file" name="image" class="form-control" >
            </div>
            <div class="form-group">
              <label for="exampleFormControlTextarea1">Description</label>
              <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
          </form>
    </div>
</div>

@endsection