<x-layout>
    

    <div class="container-fluid bg-login">

            <x-navbar />

        <div class="row justify-content-end align-items-center login-row">
        
            <div class="form-container-cus">

                @csrf
        
                <p class="registerTitle">{{ __('ui.login') }}</p>
        
                
                
                <form class="registerForm" method="POST" action="{{ route('login') }}">
        
                    @csrf
                    
                        
        
                    
                        <input type="email" class="registerInput @error('email') is-invalid @enderror" name="email" placeholder="email@email.com">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
        
                    
                        <input type="password" class="registerInput @error('password') is-invalid @enderror" name="password" placeholder="password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
        
                    
                    
                   
        
                    <button type="submit" class="registerForm-btn mt-3">{{ __('ui.login') }}</button>

                </form>

                <p class="sign-up-label">
                    {{ __('ui.not_have_account')}}<a href="{{ route('register') }}" class="sign-up-link">{{ __('ui.register') }}</a>
                </p>
        
                
            </div>
        </div>
                

        

       
    </div>
    

    
</x-layout>
