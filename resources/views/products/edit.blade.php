@extends('layouts.app')
@section('content')
    <h2 style="margin-top: 5rem;" class="text-center">Edit Product</h2>
    <br>
    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype=multipart/form-data name="update_product">
        @csrf
        @method('PUT    ')
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Title</strong>
                    <input type="text" name="name" class="form-control" placeholder="Enter Name" value="{{ $product->name }}">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Product Slug</strong>
                    <input type="text" name="slug" class="form-control" placeholder="Enter Slug" value="{{ $product->slug }}">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Product Details</strong>
                    <input type="text" name="details" class="form-control" placeholder="Enter Details" value="{{ $product->details }}">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Product Price</strong>
                    <input type="number" name="price" class="form-control" placeholder="Enter Price" value="{{ $product->price }}">

            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Product Shipping Cost</strong>
                    <input type="number" name="shipping_cost" class="form-control" placeholder="Enter Slug" value="{{ $product->shipping_cost }}">
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <strong>Product Description</strong>
                    <input type="text" name="description" class="form-control" placeholder="Enter Description" value="{{ $product->description }}">
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <strong>Product Category</strong>
                    <select class="form-select" aria-label="Default select example" name="category_id">
                        @foreach ($categories as $row)
                            @if($product->category_id==$row->id)

                                <option selected value="{{$row->id}}">{{$row->name}}</option>

                            @else
                                <option value="{{$row->id}}">{{$row->name}}</option>
                            @endif
                        @endforeach
                    </select></div>
            </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <strong>Product Brand</strong>
                        <select class="form-select" aria-label="Default select example" name="brand_id">

                            @foreach ($brands as $row)
                                @if($product->brand_id==$row->id)

                                    <option selected value="{{$row->id}}">{{$row->name}}</option>

                                    @else
                                <option value="{{$row->id}}">{{$row->name}}</option>
                                @endif
                            @endforeach
                        </select></div>
                </div>
            <div class="col-md-12">
                <h1>{{$product->image_path}}</h1>
                <div class="form-group">
                    <strong>Product Image</strong>
                    @if($product->image_path)
                        <img src="/images/{{ $product->image_path }}"
                             class="card-img-top mx-auto"
                             style="height: 150px; width: 150px;display: block;"
                             alt="{{ $product->image_path }}"
                        >
                    @endif
                    <input type="file" name="image_path" class="form-control" placeholder="" value="{{ $product->image_path }}">
                    <span class="text-danger">{{ $errors->first('image') }}</span>
                </div>
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
        </div>
    </form>
@endsection
