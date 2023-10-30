<x-layout>
    
    <div class="container-fluid">
        
        <x-navbar />
        
        <div class="row">
            <div class="col-12 text-center text-sec pt-2">
                <h1 class="display-2 pt-3" data-aos="zoom-in">{{__('ui.all_articles')}}</h1>
            </div>
        </div>
        
        <div class="row justyfy-content-center pt-3 bg-index">
            @forelse ($articles as $article)
            {{-- <div class="col-6 col-lg-3 my-5 d-flex justify-content-center"> --}}
                <livewire:article-card :article="$article" />
                {{-- </div> --}}
                @empty
                <div class="col-12 text-center my-5">
                    <div class="alert alert-warning">
                        <p class="lead">{{__('ui.no_articles')}}</p>
                    </div>
                    
                    
                    <div>
                        <button class="createButton"><a class="text-white text-decoration-none" href="{{ route('article.create') }}">{{ __('ui.create_article') }}</a></button>
                    </div>
                    
                    
                </div>
                @endforelse
            </div>
            
            
        </div>
        
        {{-- <div class="container mb-5 bg-sec text-white rounded mt-5">
            <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    <h1 class="display-2 pt-3">{{__('ui.all_articles')}}</h1>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row justify-content-center">
                @forelse ($articles as $article)
                <div class="col-6 col-lg-3 my-5 d-flex justify-content-center">
                    <livewire:article-card :article="$article" />
                </div>
                @empty
                <div class="col-12 text-center my-5">
                    <div class="alert alert-warning">
                        <p class="lead">{{__('ui.no_articles')}}</p>
                    </div>
                    <button class="btn bg-sec"><a class="text-white text-decoration-none" 
                        href="{{ route('article.create') }}">{{ __('ui.create_article') }}</a></button>
                    </div>
                    @endforelse
                </div>
            </div> --}}
            
            
            
            
            
            <x-footer />
        </x-layout>
        