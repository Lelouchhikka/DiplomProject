@extends('layouts.app')
@section('content')
    <h2 style="margin-top: 5rem;" class="text-center">Edit Product</h2>
    <br>
    <form action="{{ route('products.update', $product->id) }}" method="POST" name="update_product">
        {{ csrf_field() }}
        @method('PATCH')
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
                    <textarea class="form-control" col="4" name="description" placeholder="Enter Description" >{{ $product->description }}</textarea>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Product Category Id</strong>
                    <input type="number" name="category_id" class="form-control" placeholder="Enter Category Id" value="{{ $product->category_id }}">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Product Brand Id</strong>
                    <input type="number" name="brand_id" class="form-control" placeholder="Enter Brand Id" value="{{ $product->brand_id }}">
                </div>
            </div>
            <div class="col-md-12">
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
