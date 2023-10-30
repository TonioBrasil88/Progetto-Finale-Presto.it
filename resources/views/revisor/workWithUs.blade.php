<x-layout>

        <div class="container-fluid bodyWork pb-5">
        <x-navbar />
            <div class="row">

                <div class="col-12 text-center">
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                </div>

            </div>

            <div class="row py-5 mx-0">
                <div class="col-12  text-center justify-content-center text-sec">
                    <h1>{{ __('ui.workwithus') }}</h1>
                </div>
            </div>

            <div class="row justify-content-center mediaWork"> 

                <div class="form-container-work col-12 col-md-6"> 

                    <form class="registerForm" action="{{route('revisor.addBodyToUser')}}" method="POST">

                        @csrf
                        @method('Patch')

                        <label for="body" class="form-label">{{ __('ui.workwithus_reason') }}</label>
                        <textarea type="text" class="registerInput @error('body') is-invalid @enderror" name="body" cols="30" rows="10"></textarea>
                        @error('body')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <div class="d-flex justify-content-center">
                            <button type="submit" class="registerForm-btn btn-lg my-2">{{ __('ui.save') }}</button>
                        </div>

                    </form>

                </div>

            </div>
        </div>

    <x-footer />

</x-layout>
