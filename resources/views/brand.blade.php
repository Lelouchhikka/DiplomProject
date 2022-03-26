@extends('layouts.app')

@section('content')
    <div class="container" style="margin-top: 80px">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                @if(session()->get('locale')=='ru')
                    {{(App::setLocale('ru'))}}
                @endif
                <li class="breadcrumb-item active" aria-current="page"><a href="/">{{__('Home ')}}</a></li>
                <li class="breadcrumb-item active"aria-current="page"><a href="{{route("category.list")}}"> {{__('Categories')}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{__('Brands')}}</li>
            </ol>
        </nav>
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="row">
                    @foreach($brands as $pro)
                        <div class="col-lg-3">
                            <div class="card" style="margin-bottom: 20px; height: auto;">
                                <div class="card-body">
                                    <h2 class="card-title">{{ $pro->name }}</h2>
                                    <a href="{{route('brand.chosed',['id'=>$pro->id])}}">{{__('watch')}}</a>


                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
