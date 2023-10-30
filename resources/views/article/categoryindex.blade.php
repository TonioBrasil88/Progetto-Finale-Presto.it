<x-layout>
    

    <div class="container-fluid ">

        <x-navbar />

        <div class="row">
            <div class="col-12 text-center text-sec pt-2">
                <h1 class="display-2" data-aos="zoom-in">{{ __("ui.$category->name") }}</h1>
            </div>
        </div>

        <div class="row justify-content-center pt-3 bg-index">
            @if ($articles->isEmpty())
                {{-- <div class="row">
                    <div class="col-12 text-center" data-aos="zoom-out">
                        <h4>{{ __('ui.create_article') }}</h4>
                        <button class="btn bg-sec"><a class="text-white text-decoration-none" 
                                href="{{ route('article.create') }}">{{ __('ui.create_article') }}</a></button>
                    </div>
                </div> --}}

                <div class="row justify-content-center align-items-center py-3" >
                    <div class="col-12 col-md-9 banner-cus bg-white rounded px-4 py-4 text-center" data-aos="fade-right" >
                        <h3 class="text-sec">{{__('ui.gain')}}</h3>
                        <p>{{__('ui.whyGain')}}</p>
                        <div>
                            <button class="createButton"><a class="text-white text-decoration-none" href="{{ route('article.create') }}">{{ __('ui.create_article') }}</a></button>
                        </div>
                    </div>
                    
                </div>
            @else
                <div class="row">
                    @foreach ($articles as $article)
                        {{-- <div class="col-6 col-lg-3 my-5 d-flex justify-content-center"> --}}
                            <livewire:article-card :article="$article" />
                        {{-- </div> --}}
                    @endforeach
                </div>
            @endif
        </div>
    </div>

    {{-- <div class="container mb-5 bg-sec text-white rounded mt-5">
        <div class="row">
            <div class="col-12 text-center pt-3">
                <h1 class="display-2">{{ __("ui.$category->name") }}</h1>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">

            @if ($articles->isEmpty())
                <div class="row">
                    <div class="col-12 text-center">
                        <h4>{{ __('ui.create_article') }}</h4>
                        <button class="btn bg-sec"><a class="text-white text-decoration-none" 
                                href="{{ route('article.create') }}">{{ __('ui.create_article') }}</a></button>
                    </div>
                </div>
            @else
                <div class="row">
                    @foreach ($articles as $article)
                        <div class="col-6 col-lg-3 my-5 d-flex justify-content-center">
                            <livewire:article-card :article="$article" />
                        </div>
                    @endforeach
                </div>
            @endif

        </div>
    </div> --}}

    <x-footer />
</x-layout>
