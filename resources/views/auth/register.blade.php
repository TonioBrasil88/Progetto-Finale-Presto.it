<x-layout>
   
    
    <div class="container-fluid bg-register ">
        <x-navbar />

        

        <div class="row justify-content-center register-row">

            <div class="form-container">

                @csrf

                <p class="registerTitle">{{ __('ui.register') }}</p>

                <form class="registerForm" method="POST" action="{{ route('register') }}">

                    @csrf

                    <input type="text" class="registerInput @error('name') is-invalid @enderror" name="name"
                        placeholder="Username">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <input type="email" class="registerInput @error('email') is-invalid @enderror" name="email"
                        placeholder="email@email.com">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror


                    <input type="password" class="registerInput @error('password') is-invalid @enderror" name="password"
                        placeholder="password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <input type="password"
                        class="registerInput @error('password_confirmation') is-invalid @enderror"
                        name="password_confirmation" placeholder="confirm password">
                    @error('password_confirmation')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <button type="submit" class="registerForm-btn my-4">{{ __('ui.account_create') }}</button>
                </form>

                <p class="sign-up-label">
                    {{ __('ui.have_account')}}<a href="{{ route('login') }}" class="sign-up-link">{{ __('ui.login') }}</a>
                </p>
            </div>

        </div>

    </div>












</x-layout>
