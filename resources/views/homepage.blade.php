<x-layout>

    <header class="container-fluid">
        <div class="row">
            <x-navbar />
            <div class="col-12 text-center">
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                @if (session()->has('failMessage'))
                    <div class="alert alert-danger">
                        {{ session('failMessage') }}
                    </div>
                @endif

            </div>

        </div>


        <div class="row justify-content-end align-items-center title-section" data-aos="fade-up">
            <div class="col-12 col-md-5 p-5">
                <h1 class="display-4 text-sec PRESTO">Presto <span class="IT">.it</span></h1>
                <h3 class="display-6 text-sec header-text fw-normal">{{ __('ui.slogan_1') }}</h3>
                <h3 class="display-6 text-sec header-text fw-normal mt-3">{{ __('ui.slogan_2') }}</h3>
                <h3 class="display-6 text-sec header-text fw-normal mt-3">{{ __('ui.slogan_3') }}<span
                        class="text-yellow fw-bold click"> click </span>{{ __('ui.slogan_4') }}</h3>
            </div>

       
        </div>
        <div class="row mt-5 ">

            <div class=" arrow-container">
                <a href="#lastArticles"><span class="arrow-circle">
                    <i class="fa arrow-fa fa-arrow-down"></i>
                </span></a>
                {{-- <span class="arrow-pulse"></span> --}}
            </div>

        </div>
        
    </header>

    <div class="container-fluid  flex-column justify-content-center articles-section py-2 " id="lastArticles">


        <div class="row justify-content-center py-3">

            <div class="col-12 py-3 text-center">
                <h2 class="display-2 text-sec" data-aos="fade-right">{{ __('ui.lastArticles') }}</h2>
            </div>

            @foreach ($articles as $article)
                <livewire:article-card :article="$article" />
            @endforeach

        </div>

        <div class="row justify-content-center align-items-center py-3" data-aos="zoom-in">
            <div class="col-12 col-md-9 banner-cus bg-white rounded px-4 py-4 text-center">
                <h3 class="text-sec">{{ __('ui.gain') }}</h3>
                <p>{{ __('ui.whyGain') }}</p>
                <div>
                    <button class="createButton"><a class="text-white text-decoration-none"
                            href="{{ route('article.create') }}">{{ __('ui.create_article') }}</a></button>
                </div>
            </div>

        </div>

    </div>


    <div class="container-fluid grid-section my-4 ">

        <div class="row py-2">
            <div class="col-12 text-center pt-4">
                <h2 class="display-2 text-white" data-aos="zoom-in-down">{{ __('ui.categories') }}</h2>
            </div>
        </div>

        <div class="row justify-content-center align-items-center my-5">



            <div class="grid ">

                @foreach ($categories as $category)
                    <a href="{{ route('article.categoryindex', $category) }}" class="box {{ $category->class }}"
                        style="background-image: url({{ $category->img }});"
                        data-text="{{ __("ui.$category->name") }}"></a>
                @endforeach

            </div>

   

        </div>

    </div>

    <div class="container-fluid py-5">
        <div class="row " >
            <div class="col-12 text-center text-sec pb-5">
                <h2 class="display-3" id="title" data-aos="fade-right">{{ __('ui.homepage_counter_1') }}</h1>
            </div>

            <div class="col-12 d-flex justify-content-around mediaCounter">
                <p class="counterCus"><span class="fw-bold display-3 text-sec" id="firstSpan">0</span><span
                        class="fw-bold display-3 text-yellow">+</span> {{ __('ui.homepage_counter_2') }} </p>
                <p class="counterCus"><span class="fw-bold display-3 text-sec" id="secondSpan">0</span><span
                        class="fw-bold display-3 text-yellow">%</span> {{ __('ui.homepage_counter_3') }} </p>
                <p class="counterCus"><span class="fw-bold display-3 text-sec" id="thirdSpan">0</span><span
                        class="fw-bold display-3 text-yellow">K</span> {{ __('ui.homepage_counter_4') }} </p>
            </div>
        </div>
    </div>


    <x-footer />
</x-layout>
