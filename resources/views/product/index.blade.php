@extends('home')
@section('section')
<div class="card">
    <div class="card-header">
        Product List
        <div class="card-toolbar float-right">
            <a href="{{ route('product.create')}}" class="btn btn-success">Create</a>
        </div>
    </div>

    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->description }}</td>
                        <td>{{ $item->price }}</td>
                        <td>
                            <a href="{{ url('/stripe')}}" class="btn btn-success">Add To Cart</a>
                        </td>
                    </tr>   
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection