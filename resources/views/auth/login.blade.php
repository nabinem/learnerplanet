<x-guest-layout>
    <div class="card-body login-card-body">
        <p class="login-box-msg">Log in to your account</p>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="input-group mb-3">
                <div class="form-floating"> 
                    <input 
                        name="email"
                        id="loginEmail" 
                        type="email" 
                        class="form-control" 
                        value="{{ old('email') }}" 
                        required 
                        autofocus 
                        autocomplete="username" 
                        placeholder="Enter youe Email"
                    > 
                    <label for="loginEmail">Email</label> 
                </div>
                <div class="input-group-text"> <span class="bi bi-envelope"></span></div>
            </div>
            <div class="input-group mb-3">
                <div class="form-floating"> 
                    <input 
                        name="password"
                        id="loginPassword" 
                        type="password" 
                        class="form-control"
                        required 
                        autocomplete="current-password" 
                        placeholder="Password"
                    > 
                    <label for="loginPassword">Password</label> 
                </div>
                <div class="input-group-text"> <span class="bi bi-lock-fill"></span></div>
            </div>
            <div class="row mb-2">
                <div class="col d-inline-flex align-items-center">
                    <div class="form-check"> 
                        <input 
                            class="form-check-input" 
                            type="checkbox"
                            name="remember"
                            id="flexCheckDefault"
                        > 
                        <label class="form-check-label" for="flexCheckDefault">
                            Remember Me
                        </label> 
                    </div>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col">
                    <div class="d-grid gap-2"> 
                        <button type="submit" class="btn btn-primary">Sign In</button> 
                    </div>
                </div>
            </div>
        </form>
        <p class="mb-3 mt-1"> 
            <a href="{{ route('password.request') }}" class="text-deco-none">Forgot Password?</a> 
        </p>
        <div class="mb-2"> 
            Don't have an account? 
            <a href="{{ route('register') }}" class="text-center btn btn-outline-primary ms-2">
                Sign up
            </a> 
        </div>
    </div>
</x-guest-layout>