{{-- <div class="col-12 col-md-3 d-flex justify-content-center">
    <div class="card" style="width: 18rem;">
        <img src="https://picsum.photos/200" class="card-img-top" alt="{{ $article->title }}">
        <div class="card-body">
            <h5 class="card-title">{{ $article->title }}</h5>
            <p class="card-text">{{ $article->price }} €</p>
            <p><a href="{{ route('article.categoryindex', $article->category)}}" class="">{{$article->category->name}}</a></p>
            <a href="{{ route('article.show', $article)}}" class="btn btn-primary">Vedi l'articolo</a>
            
        </div>
    </div>
</div> --}}
<div class="col-12 col-md-3 d-flex justify-content-center mb-4" data-aos="fade-right">
    <a href="{{ route('article.show', $article) }}">
        <div class="card" data-text="{{__('ui.dettaglio')}}">
             {{-- @dd($article->images) --}}
            {{-- <div class="image"></div> --}}
            <img src="{{$article->images->isEmpty() ? 'https://picsum.photos/200' : $article->images()->first()->getUrl(300,300) }}" class="image" alt="{{ $article->title }}">
            <span class="title">{{ $article->title }}</span>
            <span class="price">{{ $article->price }} €</span>
        </div>
    </a>
</div>



{{--  --}}
