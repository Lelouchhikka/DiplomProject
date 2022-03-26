@extends('layouts.app')

@section('content')
    <div class="container" style="margin-top: 80px">
        <div class="">
            <div class="row">
                <aside class="col-sm-5 ">
                    <article class="gallery-wrap">
                        <div class="img-big-wrap">
                            <div> <a href="#"><img src="/images/{{ $item->image_path }}"></a></div>
                        </div> <!-- slider-product.// -->

                    </article> <!-- gallery-wrap .end// -->
                </aside>
                <aside class="col-sm-7">
                    <article class="card-body p-5">
                        <h3 class="title mb-3">{{$item->name}}</h3>

                        <p class="price-detail-wrap">
	<span class="price h3 text-success">
		<span class="currency">US $</span><span class="num">{{$item->price}}</span>
	</span>

                        </p> <!-- price-detail-wrap .// -->
                        <dl class="item-property">
                            <dt>Description</dt>
                            <dd><p>{{$item->details}} </p></dd>
                        </dl>
                        <dl class="param param-feature">
                            <dt>Shipping cost</dt>
                            <dd>US $ {{$item->shipping_cost}}</dd>
                        </dl>  <!-- item-property-hor .// -->
                        <dl class="param param-feature">
                            <dt>Delivery</dt>
                            <dd>Russia, USA, and Europe</dd>
                        </dl>  <!-- item-property-hor .// -->

                        <form action="{{ route('cart.store') }}" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" value="{{ $item->id }}" id="id" name="id">
                            <input type="hidden" value="{{ $item->name }}" id="name" name="name">
                            <input type="hidden" value="{{ $item->price }}" id="price" name="price">
                            <input type="hidden" value="{{ $item->image_path }}" id="img" name="img">
                            <input type="hidden" value="{{ $item->slug }}" id="slug" name="slug">
                            <input type="hidden" value="1" id="quantity" name="quantity">
                            <div class="card-footer" style="background-color: white;">
                                <div class="row">
                                    <button class="btn btn-secondary btn-sm" class="tooltip-test" title="add to cart">
                                        <i class="fa fa-shopping-cart"></i> {{__("add to cart")}}
                                    </button>
                                </div>
                            </div>
                        </form>

                    </article> <!-- card-body.// -->
                </aside> <!-- col.// -->
            </div> <!-- row.// -->
        </div> <!-- card.// -->

    </div>
    </div>
    <!--container.//-->


@endsection
