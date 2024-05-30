<div class="page-content-wrapper p-xxl-4">

    <!-- Title -->
    <div class="row">
        <div class="col-12 mb-4 mb-sm-5">
            <h1 class="h3 mb-0">Student Room Mate Pair</h1>
        </div>
    </div>
    @if (session()->has('message'))
        <div class="alert alert-success mb-3">
            {{ session('message') }}
        </div>
    @endif

    <!-- Tab and select -->
    <div class="row g-4 justify-content-between align-items-center">
        <div class="col-lg-5">
            <!-- Tabs -->
            <ul class="nav nav-pills-shadow nav-responsive" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link mb-0 me-sm-2 active" data-bs-toggle="tab" href="#tab-1" aria-selected="true"
                        role="tab">All Pairs</a>
                </li>
            </ul>
        </div>

    </div>

    <!-- Reviews START -->
    <div class="vstack gap-4 mt-5">
        @forelse ($room_mates as $roommatepairing)
            <!-- Card item START -->
            <div class="card border mb-3">
                <!-- Card header -->
                <div class="card-header border-bottom d-md-flex justify-content-center align-items-center">
                    <!-- Icon and Title -->
                    <a href="{{ route('admin.student.details', $roommatepairing->user->id) }}">
                        <div class="d-flex card card-body align-items-center">
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
                                <h6 class="card-title mb-0 text-center">{{ $roommatepairing->user->first_name }}
                                    {{ $roommatepairing->user->last_name }}</h6>
                                <ul class="nav nav-divider small">
                                    <li class="nav-item">
                                        <strong>Email:</strong>{{ $roommatepairing->user->email }}
                                    </li>
                                    <li class="nav-item">
                                        <strong>Phone:</strong>{{ $roommatepairing->user->phone_number }}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </a>

                    <a href="{{ route('admin.student.details', $roommatepairing->pair->id) }}">
                        <div class="card card-body d-flex align-items-center">
                            <span class="avatar avatar-sm" href="#">
                                @if ($roommatepairing->pair->profile_picture == null)
                                    <img id="uploadfile-1-preview"
                                        class="avatar-img rounded-circle border border-3 border-primary"
                                        src="{{ asset('assets/images/avatar/p1.svg') }}" alt="" />
                                @else
                                    <img id="uploadfile-1-preview"
                                        class="avatar-img rounded-circle border border-3 border-primary"
                                        src="{{ $roommatepairing->pair->profile_picture }}" alt="" />
                                @endif
                            </span>
                            <div class="ms-2">
                                <h6 class="card-title mb-0 text-center">{{ $roommatepairing->pair->first_name }}
                                    {{ $roommatepairing->pair->last_name }}</h6>
                                <ul class="nav nav-divider small">
                                    <li class="nav-item">
                                        <strong>Email:</strong>{{ $roommatepairing->pair->email }}
                                    </li>
                                    <li class="nav-item">
                                        <strong>Phone:</strong>{{ $roommatepairing->pair->phone_number }}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Card body -->
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-12">
                            <div class="alert alert-warning d-flex align-items-center rounded-3 mb-0" role="alert">
                                <h4 class="mb-0 alert-heading"><i class="bi bi-exclamation-octagon-fill me-2"></i> </h4>
                                <div class="ms-3">
                                    <h6 class="mb-0 alert-heading">
                                        <strong>Notice:</strong>
                                    </h6>
                                    <p class="mb-0">
                                        {{ $roommatepairing->pair->first_name }}
                                        {{ $roommatepairing->pair->last_name }} accepted
                                        {{ $roommatepairing->user->first_name }}
                                        {{ $roommatepairing->user->last_name }} to be their room mate. <br>
                                        <strong>current status is</strong> <span
                                            class="badge text-bg-info">{{ $roommatepairing->room_mate_status }}</span>
                                        <br>
                                        <strong>Dated:</strong>{{ $roommatepairing->created_at->format('d F Y') }} ----
                                        {{ $roommatepairing->updated_at->format('d F Y') }}
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
        <!-- Pagination START -->
        <div class="d-sm-flex justify-content-sm-between align-items-sm-center">
            <!-- Content -->
            <p class="mb-sm-0 text-center text-sm-start">Showing {{ $room_mates->count() }} entries</p>
            <!-- Pagination -->
            {{ $room_mates->links() }}
        </div>
        <!-- Pagination END -->
    </div>
    <!-- Reviews END -->

</div>
