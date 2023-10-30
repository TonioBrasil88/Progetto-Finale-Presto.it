<x-layout>
    <x-navbar />

    <div class="container-fluid">
        <div class="row my-5 ">
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
            <div class="col-12 text-center">
                <h1>{{ $article_to_check ? __('ui.revisorAnnouncement') : __('ui.noRevisorAnnouncement') }} </h1>
            </div>
        </div>
    </div>

    @if ($article_to_check)
        <div class="container">
            <div class="row justify-content-center align-items-center showCus">
                <div class="col-12 col-md-6 p-5">
                    <h1 class="text-sec">{{ $article_to_check->title }}</h1>
                    <p ><span class="fw-bold text-sec ">{{ __('ui.price') }} :</span> <span class="priceCus">{{ $article_to_check->price }}<span class="text-yellow">€</span></span></p>
                    <p ><span class="fw-bold text-sec">{{ __('ui.description') }} :</span>  {{ $article_to_check->description }}</p>
                    <p ><span class="fw-bold text-sec">{{ __('ui.category') }} : </span> {{ $article_to_check->category->name }}</p>
                    <p ><span class="fw-bold text-sec">{{ __('ui.inserted_by') }} :</span> {{ $article_to_check->user->name }}</p>
                    <p class="fst-italic">{{ $article_to_check->created_at->diffForHumans() }}</p>

                    <div class="d-flex align-items-center justify-content-around mt-5">
                        <form class="mt-5" action="{{ route('revisor.reject_article', ['article' => $article_to_check]) }}"
                            method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btnReject">{{ __('ui.reject') }}</button>
                        </form>
                        <form class="mt-5"
                            action="{{ route('revisor.accept_article', ['article' => $article_to_check]) }}"
                            method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btnAccept">{{ __('ui.accept') }}</button>
                        </form>
                        

                        
                    </div>
                </div>


                <div class="col-12 col-md-6 p-5">
                    <div id="carobello" class="carousel slide my-3">
                        @if ($article_to_check->images)

                            <div class="carousel-inner">
                                @foreach ($article_to_check->images as $image)
                                    <div class="carousel-item @if ($loop->first) active @endif">
                                        <img src=" {{ $image->getUrl(300, 300) }}" class="d-block w-100" alt="..."
                                            id="{{ $image->id }}">
                                        <div class="d-flex pt-3 justify-content-between">
                                            <h5 class="me-5">
                                                Valori
                                            </h5>
                                            <p>Adulti : <span class="{{ $image->adult }}"></span></p>
                                            <p>Satira : <span class="{{ $image->spoof }}"></span></p>
                                            <p>Medicina : <span class="{{ $image->medical }}"></span></p>
                                            <p>Violenza : <span class="{{ $image->violence }}"></span></p>
                                            <p>Razzismo : <span class="{{ $image->racy }}"></span></p>
                                        </div>
                                        <div>
                                            <h5>
                                                Tags
                                            </h5>
                                            @if ($image->labels)
                                                @foreach ($image->labels as $label)
                                                    <p class="d-inline">{{ $label }}</p>
                                                @endforeach
                                            @endif
                                            

                                        </div>

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


                        <button class="carousel-control-prev" type="button" data-bs-target="#carobello"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">{{ __('ui.previous_article') }}</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carobello"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">{{ __('ui.next_article') }}</span>
                        </button>
                    </div>

                </div>
            </div>
        </div>
    @endif
    <div class="container-fluid pb-5">
        <div class="row mt-5">
            <div class="col-12 d-flex justify-content-center align-items-center">
                <span class="mx-3">{{ __('ui.undoMessage') }}</span>
                </span>
                <span>
                    <form class="mx-1" action="{{ route('revisor.undo_article') }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btnUndo">{{ __('ui.undo_article') }}</button>
                    </form>
                </span>
            </div>
        </div>
    </div>

</x-layout>
