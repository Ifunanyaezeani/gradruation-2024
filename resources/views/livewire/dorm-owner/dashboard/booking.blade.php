<div class="container vstack gap-4">
    <!-- Title START -->
    <div class="row">
        <div class="col-12">
            <h1 class="fs-4 mb-0"><i class="bi bi-bookmark-heart fa-fw me-1"></i>Booked Dormitories</h1>
        </div>
    </div>
    <!-- Title END -->


    @if (session()->has('message'))
        <div class="alert alert-success d-flex align-items-center rounded-3 mb-0" role="alert">
            <h4 class="mb-0 alert-heading"><i class="bi bi-check2-circle me-2"></i> </h4>
            <div class="ms-3">
                <h6 class="mb-0 alert-heading">{{ session('message') }}</h6>
            </div>
        </div>
    @endif

    @if (session()->has('error_message'))
        <div class="alert alert-danger d-flex align-items-center rounded-3 mb-0" role="alert">
            <h4 class="mb-0 alert-heading"><i class="bi bi-x-circle me-2"></i> </h4>
            <div class="ms-3">
                <h6 class="mb-0 alert-heading">{{ session('error_message') }}</h6>
            </div>
        </div>
    @endif


    <!-- Booking table START -->
    <div class="row">
        <div class="col-12">
            <div class="card border">
                <!-- Card header START -->
                <div class="card-header border-bottom">
                    <h5 class="card-header-title">Booked rooms<span
                            class="badge bg-primary bg-opacity-10 text-primary ms-2">{{ count($bookings) }}</span></h5>
                </div>
                <!-- Card header END -->

                <!-- Card body START -->
                <div class="card-body">

                    <!-- dorm room list START -->
                    <div class="table-responsive border-0">
                        <table class="table align-middle p-4 mb-0 table-hover table-shrink">
                            <!-- Table head -->
                            <thead class="table-light">
                                <tr>
                                    <th scope="col" class="border-0 rounded-start">#</th>
                                    <th scope="col" class="border-0">Name</th>
                                    <th scope="col" class="border-0">Type</th>
                                    <th scope="col" class="border-0">Date</th>
                                    <th scope="col" class="border-0">Status</th>
                                    <th scope="col" class="border-0">Payment</th>
                                    <th scope="col" class="border-0 rounded-end">Action</th>
                                </tr>
                            </thead>

                            <!-- Table body START -->
                            <tbody class="border-top-0">
                                @foreach ($bookings as $room)
                                    <tr>
                                        <td>
                                            <h6 class="mb-0">DM-{{ $room->booking->id }}</h6>
                                        </td>
                                        <td>
                                            <h6 class="mb-0"><a href="#">{{ $room->room_name }}</a></h6>
                                        </td>
                                        <td> {{ $room->room_type }} room</td>
                                        <td>
                                            <h6 class="mb-0 fw-light">{{ $room->booking->created_at->format('d F Y') }}
                                            </h6>
                                        </td>
                                        <td>
                                            <div
                                                class="{{ $this->statusCode($room->booking->booking_status) }}"
                                            >
                                            {{ strtolower($room->booking->booking_status) }}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="{{ $this->paymentStatus($room->booking->booking_status) }}">
                                                {{ strtolower($room->booking->booking_status) }}</div>
                                        </td>
                                        <td>
                                            @if ($room->booking->booking_status == App\Enums\BookingStatus::CANCELED->name)
                                                <button class="btn btn-sm btn-light mb-0"
                                                    wire:confirm="This booking has been canceled">
                                                    View details
                                                </button>
                                            @else
                                                <a href="{{ route('dorm-owner.booking.details', $room->booking->id) }}"
                                                    class="btn btn-sm btn-light mb-0" wire:navigate>View details</a>
                                            @endif

                                        </td>
                                    </tr>
                                @endforeach
                                <!-- Table item -->

                            </tbody>
                            <!-- Table body END -->
                        </table>
                    </div>
                    <!-- Hotel room list END -->
                </div>
                <!-- Card body END -->
            </div>
        </div>
    </div>
    <!-- Booking table END -->

</div>
