<div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
        {{__("SORT BY")}}
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
        <li><a class="dropdown-item" href="{{route('category.chosed',['id'=>$id])}}">Featured</a></li>
        <li><a class="dropdown-item" href="{{route('category.chosed',['id'=>$id,'sort'=>"LowToHigh"])}}">Price: Low to High</a></li>
        <li><a class="dropdown-item" href="{{route('category.chosed',['id'=>$id,'sort'=>"HighToLow"])}}">Price: High to Low</a></li>
    </ul>
</div>
