<div class="container vstack gap-4">
    <!-- Title START -->
    <div class="row">
        <div class="col-12 mt-4">
            <h6 class="mb-0"><i class="bi bi-journals fa-fw me-1"></i>My Dormitories</h6>
        </div>
    </div>
    <!-- Title END -->

    <div class="bg-transparent">

        <!-- Card body START -->
        <div class="card-body vstack gap-4">
            <!-- button -->
            <div class="d-flex justify-content-between">
                <a href="{{ route('explore') }}" class="btn btn-primary-soft mb-0">Explore Dorm</a>
            </div>

            @forelse ($bookedDorms as $booking)
                <div class="card border shadow p-2">
                    <div class="row g-0">
                        <!-- Card img -->
                        <div class="col-md-2">
                            <img src="{{ $booking->room->dormitory->main_image }}"
                                class="card-img rounded-2" alt="Card image">
                        </div>

                        <!-- Card body -->
                        <div class="col-md-9">
                            <div class="card-body py-md-2 d-flex flex-column h-100">

                                <!-- Rating and buttons -->
                                <div class="d-flex justify-content-between align-items-center">
                                    <span><small><strong>Room name/number:</strong> {{ $booking->room->room_name }}</small></span>
                                    <span class="badge bg-secondary text-light"><small><strong>Booking Status:</strong> {{ strtolower($booking->booking_status) }}</small></span>
                                </div>

                                <!-- Title -->
                                <h5 class="card-title mb-1"><a href="{{ route('explore.single-dorm', $booking->room->dormitory->slug) }}">{{ $booking->room->dormitory->dorm_name }}</a>
                                </h5>
                                <small><strong>Start date:</strong> {{ $booking->start_date->format('d F Y') }} | <strong>Expiry date:</strong> {{ $booking->end_date->format('d F Y') }}</small>

                                <!-- Price and Button -->
                                <div class="d-sm-flex justify-content-sm-between align-items-center mt-3 mt-md-auto">
                                    <!-- Button -->
                                    <div class="d-flex align-items-center">
                                        <h5 class="fw-bold mb-0 me-1">${{ $booking->room->price }}</h5>
                                        <span class="mb-0 me-2">/per year</span>
                                    </div>
                                    <!-- Price -->
                                    <div class="mt-3 mt-sm-0">
                                        <a href="{{ route('student.dormitory-detail', $booking->id) }}" class="btn btn-sm btn-dark w-100 mb-0" wire:navigate>
                                            View Room Details
                                        </a>
                                    </div>
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
                            <h6>You've not booked a room yet 😏</h6>
                            <p class="lead mb-2">You're going to see all your booked dormitory/rooms here, once you've
                                booked one.</p>
                            <a href="{{ route('explore') }}" class="btn btn-primary-soft mb-0">Book Now</a>
                        </div>
                    </div>
                </div>
            @endforelse




        </div>
        <!-- Card body END -->
    </div>

</div>
