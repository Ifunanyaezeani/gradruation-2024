
<div>
    <h1 class="mb-2 h3">Dormitory Owner</h1>

    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>error_message
    @endif
    @if (session()->has('error_message'))
        <div class="alert alert-danger">
            {{ session('error_message') }}
        </div>
    @endif

    <p class="mb-0">New?<a href="{{ route('dorm-owner.register') }}" wire:navigate> Create your dorm owner account</a></p>

    <!-- Form START -->
    <form class="mt-4 text-start needs-validation" wire:submit.prevent="attemptLogin" novalidate>
        <!-- Email -->
        <div class="mb-4">
            <label class="form-label">Enter email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" wire:model="email">
            @error('email') <span class="invalid-feedback position-absolute"><small><i>{{ $message }}</i></small></span> @enderror
        </div>
        <!-- Password -->
        <div class="mb-4 position-relative">
            <label class="form-label">Enter password</label>
            <input class="form-control fakepassword @error('password') is-invalid @enderror" type="password" id="psw-input" wire:model="password">
            <span class="p-0 mt-3 position-absolute top-50 end-0 translate-middle-y">
                <i class="p-2 cursor-pointer fakepasswordicon fas fa-eye-slash"></i>
            </span>
            @error('password') <span class="invalid-feedback position-absolute"><small><i>{{ $message }}</i></small></span> @enderror
        </div>
        <!-- Remember me -->
        <div class="mb-3 d-sm-flex justify-content-between">
            <div>
                <input type="checkbox" class="form-check-input" id="rememberCheck" wire:model="remember">
                <label class="form-check-label" for="remember"><small>Remember me?</small></label>
            </div>
            {{-- <a href="#" wire:navigate><small>Forgot password?</small></a> --}}
        </div>
        <!-- Button -->
        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary mb-0 mt-2" wire:loading.attr="disabled">
                <span wire:loading.remove>Login</span>
                <span wire:loading wire:target="attemptLogin" class="text-center">
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    <span class="visually-hidden">Loading...</span>
                </span>
            </button>
        </div>

        {{-- <!-- Divider -->
        <div class="my-4 position-relative">
            <hr>
            <p class="px-2 small bg-mode position-absolute top-50 start-50 translate-middle">Or sign in with</p>
        </div>

        <!-- Google and facebook button -->
        <div class="gap-3 vstack">
            <a href="#" class="mb-0 btn btn-white"><i class="fab fa-fw fa-google text-google-icon me-2"></i>Google</a>
        </div> --}}

        <!-- Copyright -->
        <div class="mt-3 text-center text-primary-hover"> Copyrights {{date('Y')}} {{config('app.name')}}.</div>
    </form>
    <!-- Form END -->
</div>
