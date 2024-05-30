<div class="container vstack gap-4">
    <!-- Title START -->
    <div class="row">
        <div class="col-12 mt-4">
            <h6 class="mb-0"><i class="bi bi-bookmark-heart fa-fw me-1"></i>Roomies</h6>
        </div>
    </div>
    <!-- Title END -->

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

    <div class="card border bg-transparent">
        <!-- Card header -->
        <div class="card-header bg-transparent border-bottom">
            <h4 class="card-header-title">My Room Mates</h4>
        </div>

        <!-- Card body START -->
        <div class="card-body p-0">

            <!-- Tabs -->
            <ul class="nav nav-tabs nav-bottom-line nav-responsive nav-justified">
                <li class="nav-item">
                    <a class="nav-link mb-0 active" data-bs-toggle="tab" href="#tab-1">Room mate request</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mb-0" data-bs-toggle="tab" href="#tab-3">Room mate</a>
                </li>
            </ul>

            <!-- Tabs content START -->
            <div class="tab-content p-2 p-sm-4" id="nav-tabContent">

                <!-- Tab content item START -->
                <div class="tab-pane fade show active" id="tab-1">
                    @forelse ($pair_requests as $roommatepairing)
                        <!-- Card item START -->
                        <div class="card border mb-4">
                            <!-- Card header -->
                            <div
                                class="card-header border-bottom d-md-flex justify-content-md-between align-items-center">
                                <!-- Icon and Title -->
                                <div class="d-flex align-items-center">
                                    <span class="avatar avatar-sm" href="#">
                                        @if ($roommatepairing->user->profile_picture == null)
                                            <img id="uploadfile-1-preview"
                                                class="avatar-img rounded-circle border border-3 border-primary"
                                                src="{{ asset('assets/images/avatar/p1.svg') }}" alt="" />
                                        @else
                                            <img id="uploadfile-1-preview"
                                                class="avatar-img rounded-circle border border-3 border-primary"
                                                src="{{ $roommatepairing->user->profile_picture }}" alt="" />
                                        @endif
                                    </span>
                                    <!-- Title -->
                                    <div class="ms-2">
                                        <h6 class="card-title mb-0">{{ $roommatepairing->user->first_name }}
                                            {{ $roommatepairing->user->last_name }}</h6>
                                        <ul class="nav nav-divider small">
                                            <li class="nav-item">Indecated interest to be your room mate</li>
                                            <li class="nav-item">
                                                <strong>Phone:</strong>{{ $roommatepairing->user->phone_number }}
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <!-- Button -->
                                <div class="mt-2 mt-md-0">
                                    <a href="#" class="btn btn-success-soft mb-0"
                                        wire:click="accept({{ $roommatepairing->id }})"
                                        wire:confirm="Are you sure you want to accpet this request?">
                                        Accept
                                    </a>
                                    <a href="#" class="btn btn-danger-soft mb-0"
                                        wire:click="decline({{ $roommatepairing->id }})"
                                        wire:confirm="Are you sure you want to decline this request?">
                                        Decline
                                    </a>
                                </div>
                            </div>

                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-sm-6 col-md-4">
                                        <span>Date of birth</span>
                                        <h6 class="mb-0">{{ $roommatepairing->user->birth_day == null ? "Not set" : $roommatepairing->user->birth_day->format('d F Y') }}</h6>
                                    </div>

                                    <div class="col-sm-6 col-md-4">
                                        <span>Nationality</span>
                                        <h6 class="mb-0">{{ $roommatepairing->user->nationality }}</h6>
                                    </div>

                                    <div class="col-md-4">
                                        <span>Gender</span>
                                        <h6 class="mb-0">{{ $roommatepairing->user->gender }}</h6>
                                    </div>
                                </div>
                            </div>
                            <!-- Card footer -->
                            <div class="card-footer">
                                <div class="row g-3">
                                    <div class="col-12">
                                        <div class="alert alert-warning d-flex align-items-center rounded-3 mb-0"
                                            role="alert">
                                            <h4 class="mb-0 alert-heading"><i
                                                    class="bi bi-exclamation-octagon-fill me-2"></i> </h4>
                                            <div class="ms-3">
                                                <h6 class="mb-0 alert-heading">
                                                    <strong>Security Notice:</strong>
                                                </h6>
                                                <p class="mb-0">
                                                    Before accepting this roommate request, please ensure that you have
                                                    communicated and are comfortable with the requester. Sharing a room
                                                    involves sharing personal space, so it is important to establish
                                                    clear
                                                    expectations and boundaries.
                                                </p>
                                                <p class="mb-0">
                                                    If you feel unsafe or unsure at any point, please reach out to our
                                                    support team for assistance.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Card item END -->
                    @empty

                        <div class="bg-mode shadow p-4 rounded overflow-hidden">
                            <div class="row g-4 align-items-center">
                                <!-- Content -->
                                <div class="col-md-12">
                                    <h6>Looks like you have no roommate</h6>
                                    <h4 class="mb-2">You're going to see all your roommates request here here</h4>
                                    <a href="{{ route('student.forum') }}" class="btn btn-primary-soft mb-0">Request
                                        roommate</a>
                                </div>
                            </div>
                        </div>
                    @endforelse


                </div>
                <!-- Tabs content item END -->

                <!-- Tab content item START -->
                <div class="tab-pane fade" id="tab-3">
                    @forelse ($room_mates as $roommate)
                        <div class="card border mb-4">
                            <!-- Card header -->
                            <div
                                class="card-header border-bottom d-md-flex justify-content-md-between align-items-center">
                                <!-- Icon and Title -->
                                @if (Auth::user()->id == $roommate->user->id)
                                    <div class="d-flex align-items-center">
                                        <span class="avatar avatar-sm" href="#">
                                            @if ($roommate->pair->profile_picture == null)
                                                <img id="uploadfile-1-preview"
                                                    class="avatar-img rounded-circle border border-3 border-primary"
                                                    src="{{ asset('assets/images/avatar/p1.svg') }}" alt="" />
                                            @else
                                                <img id="uploadfile-1-preview"
                                                    class="avatar-img rounded-circle border border-3 border-primary"
                                                    src="{{ $roommate->pair->profile_picture }}" alt="" />
                                            @endif
                                        </span>
                                        <!-- Title -->
                                        <div class="ms-2">
                                            <h6 class="card-title mb-0">{{ $roommate->pair->first_name }}
                                                {{ $roommate->pair->last_name }}</h6>
                                            <ul class="nav nav-divider small">
                                                <li class="nav-item">Your room mate</li>
                                                <li class="nav-item">
                                                    <strong>Phone:</strong>{{ $roommate->pair->phone_number }}
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                @else
                                    <div class="d-flex align-items-center">
                                        <span class="avatar avatar-sm" href="#">
                                            @if ($roommate->user->profile_picture == null)
                                                <img id="uploadfile-1-preview"
                                                    class="avatar-img rounded-circle border border-3 border-primary"
                                                    src="{{ asset('assets/images/avatar/p1.svg') }}"
                                                    alt="" />
                                            @else
                                                <img id="uploadfile-1-preview"
                                                    class="avatar-img rounded-circle border border-3 border-primary"
                                                    src="{{ $roommate->user->profile_picture }}" alt="" />
                                            @endif
                                        </span>
                                        <!-- Title -->
                                        <div class="ms-2">
                                            <h6 class="card-title mb-0">{{ $roommate->user->first_name }}
                                                {{ $roommate->user->last_name }}</h6>
                                            <ul class="nav nav-divider small">
                                                <li class="nav-item">Your room mate</li>
                                                <li class="nav-item">
                                                    <strong>Phone:</strong>{{ $roommate->user->phone_number }}
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                @endif


                                <!-- Button -->
                                <div class="mt-2 mt-md-0">
                                    @if ($roommate->room_mate_status != 'Canceled')
                                        <a href="#" class="btn btn-danger-soft mb-0"
                                            wire:click="cancel({{ $roommate->id }})"
                                            wire:confirm="Are you sure you want to Cancel Paring">
                                            Cancel Paring
                                        </a>
                                    @endif

                                </div>
                            </div>

                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-12">
                                        <div class="alert alert-warning d-flex align-items-center rounded-3 mb-0"
                                            role="alert">
                                            <h4 class="mb-0 alert-heading"><i
                                                    class="bi bi-exclamation-octagon-fill me-2"></i> </h4>
                                            @if ($roommate->room_mate_status == 'Canceled')
                                                <div class="ms-3">
                                                    <h6 class="mb-0 alert-heading">
                                                        <strong>Notice:</strong>
                                                    </h6>
                                                    @if (Auth::user()->id == $roommate->user->id)
                                                        <p class="mb-0">
                                                            Your roommate status has been canceled. You are no longer
                                                            paired with {{ $roommate->pair->first_name }}. If you wish
                                                            to request a new roommate, please click the "Request
                                                            Roommate" button.
                                                        </p>
                                                    @else
                                                        <p class="mb-0">
                                                            Your roommate status has been canceled. You are no longer
                                                            paired with {{ $roommate->user->first_name }}. If you wish
                                                            to request a new roommate, please click the "Request
                                                            Roommate" button.
                                                        </p>
                                                    @endif

                                                </div>
                                            @else
                                                <div class="ms-3">
                                                    <h6 class="mb-0 alert-heading">
                                                        <strong>Important:</strong>
                                                    </h6>
                                                    @if (Auth::user()->id == $roommate->user->id)
                                                        <p class="mb-0">
                                                            You are now paired with {{ $roommate->pair->first_name }}
                                                            as your roommate. If at any point
                                                            you feel uncomfortable or decide that you no longer wish to
                                                            share a
                                                            room, you can cancel your pairing.
                                                        </p>
                                                    @else
                                                        <p class="mb-0">
                                                            You are now paired with {{ $roommate->user->first_name }}
                                                            as your roommate. If at any point
                                                            you feel uncomfortable or decide that you no longer wish to
                                                            share a
                                                            room, you can cancel your pairing.
                                                        </p>
                                                    @endif

                                                </div>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="bg-mode shadow p-4 rounded overflow-hidden">
                            <div class="row g-4 align-items-center">
                                <!-- Content -->
                                <div class="col-md-12">
                                    <h6>Looks like you have no roommate</h6>
                                    <h4 class="mb-2">You're going to see all you roomate here</h4>
                                </div>
                            </div>
                        </div>
                    @endforelse


                </div>
                <!-- Tabs content item END -->
            </div>

        </div>
        <!-- Card body END -->
    </div>
</div>
