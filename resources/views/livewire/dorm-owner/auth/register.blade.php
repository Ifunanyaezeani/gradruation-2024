
<div>

    <h1 class="mb-2 h3">Own a dormitory? join now</h1>
    <p class="mb-0">Have an account?<a href="{{ route('dorm-owner.login') }}" wire:navigate> Log in</a></p>

    <!-- Form START -->
    <form class="mt-4 text-start needs-validation" wire:submit.prevent="registerDormOwner" novalidate>
        <div class="row mb-3">
            <!-- first name -->
            <div class="col-6">
                <label class="form-label">First Name</label>
                <input type="text" class="form-control @error('firstName') is-invalid @enderror"  wire:model='firstName'>
                @error('firstName') <span class="invalid-feedback"><small><i>{{ $message }}</i></small></span> @enderror
            </div>
            <!-- last name -->
            <div class="col-6">
                <label class="form-label">Last Name</label>
                <input type="text" class="form-control @error('lastName') is-invalid @enderror" wire:model='lastName'>
                @error('lastName') <span class="invalid-feedback"><small><i>{{ $message }}</i></small></span> @enderror
            </div>
        </div>
        <!-- Email -->
        <div class="mb-3">
            <label class="form-label">Enter email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" wire:model='email'>
            @error('email') <span class="invalid-feedback"><small><i>{{ $message }}</i></small></span> @enderror
        </div>
        <!-- Password -->
        <div class="mb-4 position-relative">
            <label class="form-label">Create password</label>
            <input class="form-control fakepassword @error('password') is-invalid @enderror" type="password" id="psw-input" wire:model='password'>
            <span class="p-0 mt-3 position-absolute top-50 end-0 translate-middle-y">
                <i class="p-2 cursor-pointer fakepasswordicon fas fa-eye-slash"></i>
            </span>
            @error('password') <span class="invalid-feedback position-absolute"><small><i>{{ $message }}</i></small></span> @enderror
        </div>
        <!-- terms -->
        <div class="mb-3">
            <input type="checkbox" class="form-check-input @error('terms') is-invalid @enderror" wire:model='terms' required>
            <label class="form-check-label">I accept the <a href="http://" wire:navigate>Terms and Conditions</a></label>
            @error('terms')
            <div class="invalid-feedback">
                You must accept our terms before submitting.
            </div>
            @enderror
        </div>
        <!-- Button -->
        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary mb-0 mt-2" wire:loading.attr="disabled">
                <span wire:loading.remove>Register</span>
                <span wire:loading wire:target="registerDormOwner" class="text-center">
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    <span class="visually-hidden">Loading...</span>
                </span>
            </button>
        </div>

        {{-- <!-- Divider -->
        <div class="my-4 position-relative">
            <hr>
            <p class="px-1 small position-absolute top-50 start-50 translate-middle bg-mode px-sm-2">Or sign in with</p>
        </div>

        <!-- Google and facebook button -->
        <div class="gap-3 vstack">
            <a href="#" class="mb-0 btn btn-white"><i class="fab fa-fw fa-google text-google-icon me-2"></i> Google</a>
        </div> --}}

        <!-- Copyright -->
        <div class="mt-3 text-center text-primary-hover"> Copyrights {{date('Y')}} {{config('app.name')}}.</div>
    </form>
    <!-- Form END -->
</div>


