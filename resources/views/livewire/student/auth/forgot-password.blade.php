
<div>
    <!-- Title -->
    <h1 class="mb-2 h3">Forgot Password</h1>

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

    <p class="mb-0">Provide us with your email and we will send you a password reset link</p>

    <!-- Form START -->
    <form class="mt-4 text-start needs-validation" wire:submit.prevent="sendResetLink" novalidate>
        <!-- Email -->
        <div class="mb-4">
            <label class="form-label">Enter email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" wire:model="email">
            @error('email') <span class="invalid-feedback position-absolute"><small><i>{{ $message }}</i></small></span> @enderror
        </div>

        <!-- Button -->
        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary mb-0 mt-2" wire:loading.attr="disabled">
                <span wire:loading.remove>submit</span>
                <span wire:loading wire:target="sendResetLink" class="text-center">
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    <span class="visually-hidden">Loading...</span>
                </span>
            </button>
        </div>

        <!-- Copyright -->
        <div class="mt-3 text-center text-primary-hover"> Copyrights {{date('Y')}} {{config('app.name')}}.</div>
    </form>
    <!-- Form END -->
</div>

