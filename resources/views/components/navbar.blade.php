<nav class="navbar navbar-expand-lg bg-transparent">
    <div class="container-fluid ">
        {{-- #logo --}}
        <a class="navbar-brand" href="{{ route('homepage')}}"><img class="logo" src="/media/logo.png" alt=""></a>
        {{-- navbar-toggler --}}
        <button class="navbar-toggler text-sec" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="text-sec"><i class="fa-solid fa-grip-lines" style="color: #085454;"></i></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarNav">
            <ul class="navbar-nav">
                {{-- home --}}
                <li class="nav-item">
                    <a class="nav-element nav-link @if (Route::currentRouteName() == 'homepage') active @endif" aria-current="page"
                        href="/">Home</a>
                </li>
                {{-- tutti gli annunci --}}
                <li class="nav-item">
                    <a class="nav-element nav-link @if (Route::currentRouteName() == 'article.index') active @endif"
                        href="{{ route('article.index') }}">{{__('ui.articles')}}</a>
                </li>

                {{-- dropdown categorie --}}
                <div class="dropdown_nav nav-element nav-item">
                    <a class="nav-link dropdown-toggle " href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        {{__('ui.categories')}}
                    </a>

                    <ul class="dropdown-menu">
                        @foreach ($categories as $category)
                            <li>
                                <a class="dropdown-item" href="{{ route('article.categoryindex', $category) }}">
                                    {{ __("ui.$category->name") }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </ul>
            
            {{-- search bar --}}
            <ul class="navbar-nav ms-auto nav-item">
                <li class="nav-item">
                    <form class="d-flex align-items-center search-cus" method='get' action="{{ route('article.search') }}">
                        <input class="form-control me-4 w-100 w-md-100" type="search" name="searched" placeholder="Search"
                            aria-label="Search">
                        <button class="searchbutton" type="submit">{{__('ui.search')}}</button>
                    </form>
                </li>
            </ul>
            {{-- lingue --}}
            <ul class="navbar-nav ms-auto nav-item">
                
                    <li class="nav-item">
                        <x-_locale lang="it" />
                    </li>
                    <li class="nav-item">
                        <x-_locale lang="en" />
                    </li>   
                    <li class="nav-item">
                        <x-_locale lang="es" />
                    </li>  
                
                 
                @guest
                    {{-- register --}}
                    <li class="nav-item">
                        <a class="nav-link nav-element @if (Route::currentRouteName() == 'register') active @endif"
                            href="{{ route('register') }}">{{__('ui.register')}}</a>
                    </li>
                    {{-- login --}}
                    <li class="nav-item">
                        <a class="nav-link nav-element @if (Route::currentRouteName() == 'login') active @endif"
                            href="{{ route('login') }}">{{__('ui.login')}}</a>
                    </li>
                @endguest
                @auth

                    <div class="dropdown_nav_user z-3 nav-item">
                        <a class="nav-link dropdown-toggle nav-element" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <span>
                                <i class="fa-solid fa-circle-user bg-transparent rounded-4"></i>
                                {{ Auth::user()->name }}
                            </span>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-md-end">
                            <li class="dropdown-item">
                                <a class="nav-link @if (Route::currentRouteName() == 'article.create') active @endif"
                                    href="{{ route('article.create') }}">{{__('ui.create_article')}}</a>
                            </li>

                            @if (Auth::user()->is_revisor)
                                <li class="dropdown-item">
                                    <a class="nav-link @if (Route::currentRouteName() == 'revisor.index') active @endif"
                                        href="{{ route('revisor.index') }}"> {{__('ui.revisor_panel')}}</a>
                                        <span
                                            class="position-absolute redPoint translate-middle badge rounded-pill bg-danger">
                                            {{ App\Models\Article::toBeRevisionedCount() }}
                                            <span class="visually-hidden">
                                                Unread messages
                                            </span>
                                        </span>
                                    </a>
                                </li>
                            @endif

                            <li class="dropdown-item">
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button class="nav-link btn text-main" href="{{ route('logout') }}">{{__('ui.logout')}}</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @endauth
            </ul>
        </div>
    </div>
</nav>
