<div>
    <!-- Title -->
    <h1 class="mb-2 h3">Rest Password</h1>

    @if (session()->has('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    @if (session()->has('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <!-- Form START -->
    <form class="mt-4 text-start needs-validation" wire:submit.prevent="resetPassword" novalidate>
        <!-- Email -->
        <div class="mb-4">
            <label class="form-label">Enter email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" wire:model="email">
            @error('email')
                <span class="invalid-feedback position-absolute"><small><i>{{ $message }}</i></small></span>
            @enderror
        </div>

        <!-- Password -->
        <div class="mb-4 position-relative">
            <label class="form-label">New Password</label>
            <input class="form-control fakepassword @error('password') is-invalid @enderror" type="password"
                id="psw-input" wire:model="password">
            <span class="p-0 mt-3 position-absolute top-50 end-0 translate-middle-y">
                <i class="p-2 cursor-pointer fakepasswordicon fas fa-eye-slash"></i>
            </span>
            @error('password')
                <span class="invalid-feedback position-absolute"><small><i>{{ $message }}</i></small></span>
            @enderror
        </div>

        <div class="mb-4 position-relative">
            <label class="form-label">Confirm Password</label>
            <input class="form-control fakepassword @error('password') is-invalid @enderror" type="password"
                id="psw-input" wire:model="password_confirmation">
            <span class="p-0 mt-3 position-absolute top-50 end-0 translate-middle-y">
                <i class="p-2 cursor-pointer fakepasswordicon fas fa-eye-slash"></i>
            </span>
            @error('password')
                <span class="invalid-feedback position-absolute"><small><i>{{ $message }}</i></small></span>
            @enderror
        </div>

        <!-- Button -->
        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary mb-0 mt-2" wire:loading.attr="disabled">
                <span wire:loading.remove>submit</span>
                <span wire:loading wire:target="resetPassword" class="text-center">
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    <span class="visually-hidden">Loading...</span>
                </span>
            </button>
        </div>

        <!-- Copyright -->
        <div class="mt-3 text-center text-primary-hover"> Copyrights {{ date('Y') }} {{ config('app.name') }}.</div>
    </form>
    <!-- Form END -->
</div>
