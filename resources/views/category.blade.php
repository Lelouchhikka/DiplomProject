@extends('layouts.app')

@section('content')
    <div class="container " style="margin-top: 80px">
        <div class="row justify-content-center">
    <div class="col-lg-12">
    <div class="row">
        @foreach($categories as $pro)
            <div class="col-lg-3">
                <div class="card" style="margin-bottom: 20px; height: auto;">
                    <div class="card-body">
                        <h2 class="card-title">{{ $pro->name }}</h2>
                        <a href="{{route('category.chosed',['id'=>$pro->id])}}">{{__('watch')}}</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    </div>
    </div>
    </div>
@endsection
