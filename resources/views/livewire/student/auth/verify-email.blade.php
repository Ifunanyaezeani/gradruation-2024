<div>
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    @if (is_null(Auth::user()->email_verified_at))
      <div class="border py-3 px-4 rounded">
            {{ __('Before proceeding, please check your email for a verification link.') }}
            {{ __('If you did not receive the email') }},
            <form class="d-inline" wire:submit.prevent="resendVerification({{ Auth::user()->id }})">
                <button type="submit" class="btn btn-link p-0 m-0 align-baseline">
                    {{ __('click here to request another') }}
                    <span wire:loading wire:target="resendVerification({{ Auth::user()->id }})" class="text-center">
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    </span>
                </button>.
            </form>
        </div>
     @endif
</div>
