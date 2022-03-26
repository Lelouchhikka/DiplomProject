@extends('layouts.app')
@section('content')
    <div class="row" style="margin-top: 5rem;">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>CRUD</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('products.create') }}"> Create New Products</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Slug</th>
            <th>Details</th>
            <th>price</th>
            <th>shopping_cost</th>
            <th>description</th>
            <th>category_id</th>
            <th>brand_id</th>
            <th>image_path</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($data as $key => $value)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{$value->name }}</td>
                <td>{{$value->slug}}</td>
                <td>{{$value->details}}</td>
                <td>{{$value->price}}</td>
                <td>{{$value->shipping_cost}}</td>
                <td>{{Str::limit($value->description, 100)}}</td>
                <td>{{$value->category_id}}</td>
                <td>{{$value->brand_id}}</td>
                <td>{{$value->image_path}}</td>
                <td>
                    <form action="{{ route('products.destroy',$value->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('products.show',$value->id) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('products.edit',$value->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {!! $data->links() !!}
@endsection
