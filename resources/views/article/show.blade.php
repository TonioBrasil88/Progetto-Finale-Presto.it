<x-layout>
    <x-navbar />

    <div class="container">
        <div class="row justify-content-center align-items-center showCus my-5">
            <div class="col-12 col-md-6 p-5 ">
                <h1 class="text-sec">{{ $article->title }}</h1>
                <p ><span class="fw-bold text-sec ">{{ __('ui.price') }} :</span> <span class="priceCus">{{ $article->price }} <span class="text-yellow">€</span></span></p>
                <p ><span class="fw-bold text-sec">{{ __('ui.description') }} :</span>  {{ $article->description }}</p>
                <p ><span class="fw-bold text-sec">{{ __('ui.category') }} : </span> {{ $article->category->name }}</p>
                <p ><span class="fw-bold text-sec">{{ __('ui.inserted_by') }} :</span> {{ $article->user->name }}</p>
                <p class="fst-italic">{{ $article->created_at->diffForHumans() }}</p>
            </div>

            <div class="col-12 col-md-6 p-5">
                <div id="carouselExample" class="carousel slide my-3">
                    @if ($article->images)
                        <div class="carousel-inner">
                            @foreach ($article->images as $image)
                                <div class="carousel-item @if ($loop->first) active @endif">
                                    <img src="{{ $image->getUrl(300, 300) }}" class="d-block w-100" alt="...">
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="https://picsum.photos/600/200 " class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="https://picsum.photos/600/200 " class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="https://picsum.photos/600/200 " class="d-block w-100" alt="...">
                            </div>
                        </div>
                    @endif
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">{{ __('ui.previous_article') }}</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">{{ __('ui.next_article') }}</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <x-footer />
</x-layout>
