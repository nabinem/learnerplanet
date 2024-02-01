<x-guest-layout>
    <div class="card-body register-card-body">
        <p class="register-box-msg">
            Create an Account to be part of {{ config('app.name') }}
        </p>
        <form method="POST" action="{{ route('register') }}" id="registerForm">
            @csrf
            <div class="mb-3">
                <div class="input-group">
                    <div class="form-floating"> 
                        <input 
                            id="registerFirstName"
                            type="text"
                            name="first_name" 
                            class="form-control" 
                            placeholder="First Name"
                            maxlength="100"
                            value="{{ old('first_name') }}"
                        > 
                        <label for="registerFirstName">First Name</label> 
                    </div>
                    <div class="input-group-text"> 
                        <span class="bi bi-person"></span> 
                    </div>
                </div>
                @error('first_name')
                    <span class="form-text form-error">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <div class="input-group">
                    <div class="form-floating"> 
                        <input 
                            id="registerLastName"
                            type="text"
                            name="last_name" 
                            class="form-control" 
                            placeholder="Last Name"
                            value="{{ old('last_name') }}"
                            maxlength="100"
                        > 
                        <label for="registerLastName">Last Name</label> 
                    </div>
                    <div class="input-group-text"> 
                        <span class="bi bi-person"></span> 
                    </div>
                </div>
                @error('last_name')
                    <span class="form-text form-error">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <div class="input-group">
                    <div class="form-floating"> 
                        <input 
                            name="email"
                            id="registerEmail" 
                            type="email" 
                            class="form-control" 
                            placeholder="Email"
                            value="{{ old('email') }}"
                        > 
                        <label for="registerEmail">Email</label> 
                    </div>
                    <div class="input-group-text"> <span class="bi bi-envelope"></span></div>
                </div>
                @error('email')
                    <span class="form-text form-error">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <div class="input-group">
                    <div class="form-floating"> 
                        <input 
                            id="password" 
                            type="password" 
                            name="password"
                            class="form-control" 
                            placeholder="Password"
                        > 
                        <label for="registerPassword">Password</label> 
                    </div>
                    <div class="input-group-text"> <span class="bi bi-lock-fill"></span> </div>
                </div>
                @error('password')
                    <span class="form-text form-error">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <div class="input-group">
                    <div class="form-floating"> 
                        <input 
                            id="registerConfirmPassword" 
                            type="password" 
                            name="password_confirmation"
                            class="form-control" 
                            placeholder="Retype Password"
                        > 
                        <label for="registerConfirmPassword">Retype Password</label> 
                    </div>
                    <div class="input-group-text"> <span class="bi bi-lock-fill"></span> </div>
                </div>
                @error('password_confirmation')
                    <span class="form-text form-error">{{ $message }}</span>
                @enderror
            </div>
            <div class="row mb-3">
                <div class="checkbox-container">
                    <div class="col d-inline-flex align-items-center">
                        <div class="form-check"> 
                            <input class="form-check-input" type="checkbox" name="agree_terms" id="flexCheckDefault" /> 
                            <label class="form-check-label" for="flexCheckDefault">
                                I agree to the <a href="#" target="_blank">Terms of Service</a> 
                                    & 
                                <a href="#" target="_blank">Privacy Policy.</a>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <div class="d-grid gap-2"> 
                        <button type="submit" class="btn btn-primary" data-loading-text="Please Wait..">Sign Up</button> 
                    </div>
                </div>
            </div>
        </form>

        <p class="mb-0 mt-3"> 
            Already have a an Account?
            <a href="{{ route('login')}}" class="btn btn-outline-primary ms-2">
                LogIn
            </a> 
        </p>
    </div>

    @push('scripts')
        <script type="text/javascript">
            $(document).ready(function(){
                $('#registerForm').validate({
                    rules: {
                        "first_name": {required: true, minlength: 2},
                        "last_name": {required: true, minlength: 2},
                        "email": {required: true, email: true},
                        password: {required: true, minlength: 8},
                        password_confirmation: {equalTo: "#password"},
                        agree_terms: {required: true}
                    },
                    messages: {
                        agree_terms: 'You must agree to the Terms of Service & Privacy Policy',
                        password_confirmation: 'Passwords must match.'
                    },
                    submitHandler: function (form){
                        form.submit();
                        $(form).find("[type='submit']").button('loading');
                    }
                });
            });
        </script>
    @endpush

</x-guest-layout>
