<div>
    <form wire:submit="store">
        <div class="form-group my-3">
            <label for="title">{{ __('ui.title') }}</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="inserisci il titolo" wire:model="title">
            @error('title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror   
        </div>

        <div class="form-group my-3">
            <label for="price">{{ __('ui.price') }}</label>
            <input type="number" class="form-control @error('price') is-invalid @enderror" name="price" placeholder="inserisci il prezzo"
                wire:model="price">
            @error('price')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group my-3">
            <label for="category">{{ __('ui.category') }}</label>
            <select id= "category" class="form-select" wire:model.defer="category">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ __("ui.$category->name")}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group my-3">
            
            <input type="file" class="form-control @error('temporary_images.*') is-invalid @enderror" name="images" placeholder="Img" wire:model.live="temporary_images" multiple>
            @error('temporary_images.*')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror   

        </div>
        @if(!empty($images))
            <div class="row">
                <div class="col-12">
                    <p>Photo preview:</p>
                    <div class="row border border-info">
                        @foreach($images as $key => $image)
                            <div class="col my-3">
                                <div class="img-preview mx-auto shadow rounded" style="background-image: url({{$image->temporaryUrl()}}) ; ">
                                </div>
                                <button type="button" class="btnReject text-center mt-2" wire:click="removeImage({{$key}})">Cancella</button>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif

        
        <div class="form-group my-3">
            <label for="description">{{ __('ui.description') }}</label>
            <textarea type="text" class="form-control @error('description') is-invalid @enderror" name="description" placeholder="inserisci la descrizione " rows="3"
                cols="50" wire:model="description"></textarea>
            @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>
        <div class="w-100 d-flex justify-content-center">
            <button type="submit" class="btn bg-sec text-white mt-3">{{ __('ui.save') }}</button>
        </div>
</div>
