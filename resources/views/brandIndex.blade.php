
@extends('layouts.app')

@section('content')
    <div class="container" style="margin-top: 80px">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                @if(session()->get('locale')=='ru')
                    {{(App::setLocale('ru'))}}
                @endif
                <li class="breadcrumb-item active" ><a href="{{route('home')}}">{{__('Home ')}}</a></li>
                <li class="breadcrumb-item active"><a href="{{route("category.list")}}">{{__('Categories')}}</a></li>
                <li class="breadcrumb-item active"> <a href="{{route("brand.list")}}">{{__('Brands')}}</a></li>
                <li class="breadcrumb-item active"aria-current="page">{{$name}}</li>
            </ol>
        </nav>
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-7">
                    <h4>{{__("Products from")}}  {{$name}}</h4>
                </div>
            </div>
            <hr>
            <div class="row">
                @foreach($product as $pro)
                    <div class="card" style="margin-bottom: 20px; height: auto;">
                        <img src="/images/{{ $pro->image_path }}"
                             class="card-img-top mx-auto"
                             style="height: 150px; width: 150px;display: block;"
                             alt="{{ $pro->image_path }}"
                        >
                        <div class="card-body">
                            <a href=""><h6 class="card-title">{{ $pro->name }}</h6></a>
                            <p>${{ $pro->price }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>


@endsection
