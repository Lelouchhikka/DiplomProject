<nav class="navbar  bg-white  font-black  2xl:border-b-2 flex flex-row">
    <div class="container navbar-expand-md">
        <a class="navbar-bran nav-link text-3xl " href="{{ url('/') }}">
            DIOstore
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <form class="w-4/6"  action="{{route('home')}}">
            <div class="input-group  border rounded-pill p-1">
                <input id="search" name="search" type="search" placeholder="Search products" aria-describedby="button-addon3" class="form-control bg-none border-0">
                <div class="input-group-append border-0">
                    <button id="button-addon3" type="submit" class="btn btn-link" ><i class="fa fa-search"></i></button>
                </div>
            </div>
        </form>

        <ul class="navbar-nav font-normal">
                @if(session()->get('locale')=='ru')
                    {{(App::setLocale('ru'))}}
                @endif
{{--                <li> <a href="{{ route('Ru') }}" class="nav-link" > {{__("Ru")}}</a> </li>--}}
{{--                <li> <a href="{{ route('En') }}" class="nav-link" > {{__("En")}}</a> </li>--}}
                @guest
                    <li >

                        <button  type="button" class="nav-link text-blue-500" data-toggle="modal" data-target="#logModalCenter">
                            {{__("Login")}} </button><!-- Button trigger modal -->

                        <!-- LOGIN -->
                        <div class="modal fade text-blue-500 " id="logModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered " role="document">
                                <div class="modal-content ">
                                    <div class="modal-header ">
                                        <h5 class="modal-title font-extrabold text-3xl" id="exampleModalLongTitle">Login</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body ">
                                        <x-slot name="logo">
                                            <a href="/">
                                                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                                            </a>
                                        </x-slot>

                                        <!-- Session Status -->
                                        <x-auth-session-status class="mb-4" :status="session('status')" />

                                        <!-- Validation Errors -->
                                        <x-auth-validation-errors class="mb-4" :errors="$errors" />

                                        <form method="POST" action="{{ route('login') }}">
                                        @csrf

                                        <!-- Email Address -->
                                            <div class="">
                                                <x-label class=" text-xl" for="email" :value="__('Email')" />

                                                <x-input  id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                                            </div>

                                            <!-- Password -->
                                            <div class="mt-4">
                                                <x-label class=" text-xl"  for="password" :value="__('Password')" />

                                                <x-input id="password" class="block mt-1 w-full"
                                                         type="password"
                                                         name="password"
                                                         required autocomplete="current-password" />
                                            </div>
                                            <!-- Remember Me -->
                                            <div class="block mt-4">
                                                <label for="remember_me" class="inline-flex items-center">
                                                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                                                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                                </label>
                                                </label>
                                            </div>


                                            <div class="flex items-center justify-end mt-4">
                                                @if (Route::has('password.request'))
                                                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                                        {{ __('Forgot your password?') }}
                                                    </a>
                                                @endif
                                                    <a  type="button" class="nav-link" data-toggle="modal" data-target="#regModalCenter"  data-dismiss="modal" aria-label="Close">
                                                        {{__("Registration")}} </a><!-- Button trigger modal -->
                                                <x-button class="ml-3 bg-blue-500 text-sm">
                                                    {{ __('Log in') }}
                                                </x-button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- REGISTRATION -->
                        <div class="modal fade text-blue-500 " id="regModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered " role="document">
                                <div class="modal-content ">
                                    <div class="modal-header ">
                                        <h5 class="modal-title font-extrabold text-3xl" id="exampleModalLongTitle">Create your account</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body ">

                                        <x-slot name="logo">
                                            <a href="/">
                                                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                                            </a>
                                        </x-slot>

                                        <!-- Validation Errors -->
                                        <x-auth-validation-errors class="mb-4" :errors="$errors" />

                                        <form method="POST" action="{{ route('register') }}">
                                        @csrf

                                        <!-- Name -->
                                            <div>
                                                <x-label for="name" :value="__('Name')" />

                                                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                                            </div>

                                            <!-- Email Address -->
                                            <div class="mt-4">
                                                <x-label for="email" :value="__('Email')" />

                                                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                                            </div>

                                            <!-- Password -->
                                            <div class="mt-4">
                                                <x-label for="password" :value="__('Password')" />

                                                <x-input id="password" class="block mt-1 w-full"
                                                         type="password"
                                                         name="password"
                                                         required autocomplete="new-password" />
                                            </div>

                                            <!-- Confirm Password -->
                                            <div class="mt-4">
                                                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                                                <x-input id="password_confirmation" class="block mt-1 w-full"
                                                         type="password"
                                                         name="password_confirmation" required />
                                            </div>

                                            <div class="flex items-center justify-end mt-4">
                                                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                                                    {{ __('Already registered?') }}
                                                </a>

                                                <x-button class="ml-4 bg-blue-500 text-sm">
                                                    {{ __('Register') }}
                                                </x-button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </li>
                @else

                    @if(Auth::user()->usertype==='admin')
                        <li> <a href="{{ route('brands.index') }}" class="nav-link" >
                                {{__("Admin panel for brands")}} </a>
                        </li>
                        <li> <a href="{{ route('products.index') }}" class="nav-link" >
                                {{__("Admin panel for products")}}</a>
                        </li>
                        <li> <a href="{{ route('categories.index') }}" class="nav-link" >
                                {{__("Admin panel for categories")}} </a>
                        </li>
                    @endif

                    <li href="{{route('logout')}}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit()">Выйти</li>

                   <form id="logout-form" action="{{route('logout')}}" method="post">@csrf</form>

                @endguest

                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle"
                       href="#" role="button" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-shopping-cart"></i> {{ \Cart::getTotalQuantity()}}
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" style="width: 450px; padding: 0px; border-color: #9DA0A2">
                        <ul class="list-group" style="margin: 20px;">
                            @include('partials.cart-drop')
                        </ul>

                    </div>
                </li>
            </ul>

    </div>


    <div class="container navbar-expand-md font-normal ">
            @if($categories!=null)
                @foreach($categories as $pro)
                    <a href="{{route('category.chosed',['id'=>$pro->id])}}" class="nav-link ">{{ $pro->name }}</a>
                @endforeach
            @endif
{{--                <a class="nav-link " href="">TV</a>--}}

{{--                <a class="nav-link " href="">Notebooks</a>--}}

{{--                <a class="nav-link " href="">Smartphones</a>--}}

{{--                <a class="nav-link " href="">Playstation</a>--}}

{{--                <a class="nav-link " href="">Xbox</a>--}}

{{--                <a class="nav-link " href="">Camera</a>--}}

{{--                <a class="nav-link " href="">Kitchen</a>--}}
    </div>

</nav>


