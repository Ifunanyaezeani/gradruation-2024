<div class="page-content-wrapper p-xxl-4 bg-transparent">

    <!-- Title -->
    <div class="row">
        <div class="col-12 mb-4 mb-sm-5">
            <div class="d-sm-flex justify-content-between align-items-center">
                <h1 class="h3 mb-3 mb-sm-0">Booking Details</h1>
            </div>
        </div>
    </div>

    @if (session()->has('message'))
        <div class="alert alert-success d-flex align-items-center rounded-3 mb-0" role="alert">
            <h4 class="mb-0 alert-heading"><i class="bi bi-check2-circle me-2"></i> </h4>
            <div class="ms-3">
                <h6 class="mb-0 alert-heading">{{ session('message') }}</h6>
            </div>
        </div>
    @endif

    <div class="row g-3 align-items-center justify-content-between mb-4">
        <div class="bg-transparent">
            <div class="card shadow">
                <!-- Card header -->
                <div class="card-header p-4 border-bottom">
                    <!-- Title -->
                    <h5 class="mb-0"><i class="fa-solid fa-hotel me-2"></i>Dormitory > Room / booking Information</h5>
                </div>

                <!-- Card body START -->
                <div class="card-body p-4">
                    <!-- Card list START -->
                    <div class="card mb-4">
                        <div class="row align-items-center">
                            <!-- Image -->
                            <div class="col-sm-6 col-md-2">
                                <img src="{{ $booking->room->dormitory->main_image }}" class="card-img" alt="">
                            </div>

                            <!-- Card Body -->
                            <div class="col-sm-6 col-md-9">
                                <div class="card-body pt-3 pt-sm-0 p-0">
                                    <!-- Title -->
                                    <h5 class="card-title"><a
                                            href="#">{{ $booking->room->dormitory->dorm_name }}</a>
                                    </h5>
                                    <p class="small mb-2"><i class="bi bi-geo-alt me-2"></i>
                                        {{ Str::of($booking->room->dormitory->street_address) }} |
                                        {{ $booking->room->dormitory->regin }}, {{ $booking->room->dormitory->city }}
                                    </p>
                                    <ul class="list-inline mb-0">
                                        <li class="list-inline-item text-info ms-2 h6 small fw-bold mb-0">
                                            {{ strtolower(str_replace('_', ' ', $booking->room->dormitory->dorm_type)) }}
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- Card list END -->

                    <div class="row g-4">
                        <!-- Item -->
                        <div class="col-lg-4">
                            <div class="bg-light py-3 px-4 rounded-3">
                                <h6 class="fw-light small mb-1">Check-in</h6>
                                <h5 class="mb-1">{{ $booking->start_date->format('d F Y') }}</h5>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="bg-light py-3 px-4 rounded-3">
                                <h6 class="fw-light small mb-1">Check out (a year latter)</h6>
                                <h5 class="mb-1">{{ $booking->end_date->format('d F Y') }}</h5>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="bg-light py-3 px-4 rounded-3">
                                <h6 class="fw-light small mb-1">Rooms Capacity</h6>
                                <h5 class="mb-1">
                                    {{ $booking->room->capacity }} | <small><i
                                            class="bi bi-brightness-high me-1"></i>{{ strtolower($booking->room->room_type) }}
                                        room</small>
                                </h5>

                            </div>
                        </div>
                    </div>

                    <!-- Card START -->
                    <div class="card border mt-4">
                        <!-- Card header -->
                        <div class="card-header border-bottom d-md-flex justify-content-md-between">
                            <h5 class="card-title mb-0">{{ $booking->room->room_name }} | <small
                                    class="text-success">${{ $booking->room->price }} / per year</small></h5>
                        </div>

                        <!-- Card body -->
                        <div class="card-body">
                            <h6>Included Amenities</h6>
                            <!-- List -->
                            <ul class="list-group list-group-borderless mb-0">
                                @foreach ($booking->room->dormitory->amenities as $amenity)
                                    <li class="list-group-item h6 fw-light d-flex mb-0">
                                        <i
                                            class="bi bi-patch-check-fill text-success me-2"></i>{{ $amenity->amenity_name }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="card-footer">
                            <div class="d-sm-flex align-items-center">
                                @if ($booking->booking_status == App\Enums\BookingStatus::CANCELED->name)
                                    <div class="mt-2 mt-sm-0">
                                    <span class="badge text-bg-primary w-100">
                                        This booking is no longer runing. it has been Canceled
                                    </span>
                                </div>
                                @else
                                    <div class="mt-2 mt-sm-0">
                                    <button class="btn btn-sm btn-danger-soft mb-0 w-100"
                                        wire:click='cancelBooking({{ $booking->id }})'
                                        wire:confirm="Are you sure you want cancel this booking?">
                                        Cancel Booking
                                    </button>
                                </div>
                                @endif

                            </div>
                        </div>
                    </div>
                    <!-- Card END -->
                </div>
                <!-- Card body END -->
            </div>
        </div>
    </div>


    <div class="card shadow">
        <div class="card-header border-bottom p-4">
            <h4 class="card-title mb-0"><i class="bi bi-person-square me-2"></i>Student Details</h4>
        </div>

        <div class="card-body p-4">
            <div class="mb-3">
                <!-- Avatar upload START -->
                <div class="d-flex align-items-center">
                    <label class="position-relative me-4" for="uploadfile-1" title="Replace this pic">
                        <!-- Avatar place holder -->
                        <span class="avatar avatar-xl">
                            @if ($booking->user->profile_picture == null)
                                <img id="uploadfile-1-preview"
                                    class="avatar-img rounded-circle border border-white border-3 shadow"
                                    src="{{ asset('assets/images/avatar/p1.svg') }}" alt="" />
                            @else
                                <img id="uploadfile-1-preview"
                                    class="avatar-img rounded-circle border border-white border-3 shadow"
                                    src="{{ $booking->user->profile_picture }}" alt="" />
                            @endif
                        </span>
                    </label>
                </div>
                <!-- Avatar upload END -->
            </div>
            <form class="row g-4">
                <!-- Input -->
                <div class="col-md-6">
                    <label class="form-label">First Name</label>
                    <input type="text" value="{{ $booking->user->first_name }}" class="form-control form-control-lg"
                        placeholder="{{ $booking->user->first_name }}" disabled>
                </div>

                <!-- Input -->
                <div class="col-md-6">
                    <label class="form-label">Last Name</label>
                    <input type="text" value="{{ $booking->user->last_name }}" class="form-control form-control-lg"
                        placeholder="{{ $booking->user->last_name }}" disabled>
                </div>

                <!-- Input -->
                <div class="col-md-6">
                    <label class="form-label">Email id</label>
                    <input type="email" value="{{ $booking->user->email }}" class="form-control form-control-lg"
                        placeholder="{{ $booking->user->email }}" disabled>
                </div>

                <!-- Input -->
                <div class="col-md-6">
                    <label class="form-label">Mobile number</label>
                    <input type="text" {{ $booking->user->phone_number }} class="form-control form-control-lg"
                        placeholder="{{ $booking->user->phone_number }}" disabled>
                </div>
            </form>
        </div>
    </div>

</div>
