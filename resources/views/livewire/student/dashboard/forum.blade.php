<div class="container vstack gap-4">
    <!-- Title START -->
    <div class="row">
        <div class="col-12 mt-4">
            <h6 class="mb-0"><i class="bi bi-bookmark-heart fa-fw me-1"></i>Student Forum</h6>
        </div>
    </div>

    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    @if (session()->has('error_message'))
        <div class="alert alert-danger">
            {{ session('error_message') }}
        </div>
    @endif


    <div class="row">
        <form class="col-12" wire:submit.prevent='post'>

            <div class="card-body">
                <h6 class="card-header-title">Post Something <small><i>(like your search for room mate)</i></small></h6>
                <div class="mt-2 mb-1 d-sm-flex justify-content-between">
                    <div>
                        <input type="checkbox" class="form-check-input" wire:model="roomMate">
                        <label class="form-check-label">looking for a room mate?</label>
                    </div>
                </div>
                <div class="d-flex mt-3">
                    <textarea class="form-control mb-0" placeholder="e.g Hi, I'm {{ Auth()->user()->first_name }}" rows="2"
                        spellcheck="false" wire:model='message'></textarea>

                    <button class="btn btn-sm btn-primary-soft ms-2 px-4 mb-0 flex-shrink-0"
                        wire:loading.attr="disabled">
                        <span wire:loading.remove><i class="fas fa-paper-plane fs-5"></i></span>
                        <span wire:loading wire:target="post" class="text-center">
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        </span>
                    </button>

                </div>
            </div>
            <hr>

        </form>



    </div>

    @forelse ($chats as $chat)
    <div class="card card-body bg-transparent border">
        <div class="row g-3 g-lg-4">
             <div class="col-md-3">
                <!-- Avatar and info -->
                <div class="d-flex align-items-center">
                    <!-- Avatar -->
                    <div class="avatar avatar-sm me-2 flex-shrink-0">
                        @if ($chat->user->profile_picture == null)
                            <img id="uploadfile-1-preview"
                                class="avatar-img rounded-circle border border-3 border-primary"
                                src="{{ asset('assets/images/avatar/p1.svg') }}" alt="" />
                        @else
                            <img id="uploadfile-1-preview"
                                class="avatar-img rounded-circle border border-3 border-primary"
                                src="{{ $chat->user->profile_picture }}" alt="" />
                        @endif
                    </div>
                    <!-- Info -->
                    <div class="ms-2">
                        <h6 class="mb-0">{{ $chat->user->first_name }} {{ $chat->user->last_name }}</h6>
                        <span class="mb-0"><small>{{ $chat->created_at->diffForHumans() }}</small></span>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <p>{{ $chat->message }}</p>
                <!-- Button -->
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                    @if ($chat->is_roommate)
                        <button
                            href="#"
                            wire:click="interested({{ $chat->id }})"
                            wire:confirm="you are about to indicate interest to be {{ $chat->user->first_name }}'s room mate"
                            class="btn btn-sm btn-primary-soft mb-0"
                        >
                            Indicate interest
                        </button>
                    @endif
                    </div>
                    @if (Auth::user()->id == $chat->user_id)
                        <button
                            type="button"
                            class="btn btn-sm btn-danger-soft mb-0"
                            wire:click="delete({{ $chat->id }})"
                            wire:confirm="Are you sure you want to delete this post?"
                        >
                            <i class="bi bi-trash3 me-1"></i>Delete
                        </button>
                    @endif

                </div>
            </div>
        </div>
    </div>

    @empty
        <div class="row g-3 g-lg-4">
            <div class="col-12">
                <div class="bg-mode shadow p-4 rounded overflow-hidden">
                    <div class="row g-4 align-items-center">
                        <!-- Content -->
                        <div class="col-md-9">
                            <h6>No data yet 😏</h6>
                            <p class="lead mb-2">you're going to see all post form every students here</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforelse

    <div class="row g-3 g-lg-4">
        <div class="col-12">{{ $chats->links() }}</div>
    </div>

</div>
