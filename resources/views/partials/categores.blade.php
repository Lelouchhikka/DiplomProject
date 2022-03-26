
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        @if(session()->get('locale')=='ru')
            {{(App::setLocale('ru'))}}
        @endif
        <li class="breadcrumb-item active" aria-current="page">{{__('Home ')}}</li>
        <li class="breadcrumb-item active"> <a href="{{route("category.list")}}">{{__('Categories')}}</a></li>
        <li class="breadcrumb-item active"> <a href="{{route("brand.list")}}">{{__('Brands')}}</a></li>
    </ol>
</nav>
