@extends('layouts.app')

@section('content')
    <div class="container " style="margin-top: 80px">

        <div class="row justify-content-center">
            <div class="col-lg-12">

                <div class="row">
                    @foreach($products as $pro)
                        <a href="{{route('product.id',$pro->id)}}">
                            <div class="col-lg-3">
                                <div class="" style="margin-bottom: 20px; height: auto;">
                                    <img src="/images/{{ $pro->image_path }}"
                                         class="card-img-top mx-auto"
                                         style="height: 150px; width: 150px;display: block;"
                                         alt="{{ $pro->image_path }}">
                                    <div class="card-body">
                                        <a href="{{route('product.id',$pro->id)}}"> <h6 class="card-title">{{ $pro->name }}</h6></a>
                                        <p>${{ $pro->price }}</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection
