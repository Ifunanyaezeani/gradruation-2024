<ul class="flex-row nav align-items-center list-unstyled ms-xl-auto">
    <li class="nav-item">
        <div class="bg-primary bg-opacity-25 rounded-pill" id="profileDropdown" role="button" wire:click="logout">
            <span class="avatar avatar-sm" href="#">
                @if (Auth::user()->profile_picture == null)
                    <img class="avatar-img rounded-circle border border-3 border-primary"
                        src="{{ asset('assets/images/avatar/p1.svg') }}" alt="" />
                @else
                    <img class="avatar-img rounded-circle border border-3 border-primary"
                        src="{{ Auth::user()->profile_picture }}" alt="" />
                @endif
            </span>
            <span class="text-primary">Log out</span>&nbsp;&nbsp;&nbsp;
        </div>
    </li>
</ul>
