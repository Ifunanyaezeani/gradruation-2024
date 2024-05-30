		<div class="page-content-wrapper p-xxl-4 bg-transparent">

			<!-- Title -->
			<div class="row">
				<div class="col-12 mb-5">
					<div class="d-sm-flex justify-content-between align-items-center">
						<h1 class="h3 mb-2 mb-sm-0">Bookings</h1>
						{{-- <div class="d-grid"><a href="#" class="btn btn-primary-soft mb-0"><i class="bi bi-plus-lg fa-fw"></i> Add booking</a></div> --}}
					</div>
				</div>
			</div>

            <div class="card shadow">

                <!-- Card body START -->
                <div class="card-body">
                    <!-- Table head -->
                    <div class="bg-light rounded p-3 d-none d-xxl-block">
                        <div class="row row-cols-6 g-4">
                            <div class="col"><h6 class="mb-0"></h6></div>
                            <div class="col"><h6 class="mb-0">Room Name</h6></div>
                            <div class="col"><h6 class="mb-0">Type</h6></div>
                            <div class="col"><h6 class="mb-0">Room Floor</h6></div>
                            <div class="col"><h6 class="mb-0">Amount</h6></div>
                            <div class="col"><h6 class="mb-0">Action</h6></div>
                        </div>
                    </div>
                    @forelse ($bookings as $booking)
                         <!-- Table data -->
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4 row-cols-xxl-6 g-2 g-sm-4 align-items-md-center border-bottom px-2 py-4">
                        <!-- Data item -->
                        <div class="col">
                            <div class="d-flex align-items-center">
                                <!-- Image -->
                                <div class="w-80px flex-shrink-0">
                                    <img src="{{ $booking->room->room_pictures[0] }}" class="rounded" alt="">
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <small class="d-block d-xxl-none">Room name:</small>
                            <h6 class="mb-0 fw-normal">{{ $booking->room->room_name }}</h6>
                        </div>

                        <!-- Data item -->
                        <div class="col">
                            <small class="d-block d-xxl-none">Room Type:</small>
                            <h6 class="mb-0 fw-normal">{{ strtolower($booking->room->room_type) }} room</h6>
                        </div>

                        <!-- Data item -->
                        <div class="col">
                            <small class="d-block d-xxl-none">status:</small>
                            <h6 class="mb-0 fw-normal {{ $this->statusCode($booking->booking_status) }}">{{ strtolower($booking->booking_status) }}</h6>
                        </div>

                        <!-- Data item -->
                        <div class="col">
                            <small class="d-block d-xxl-none">Date:</small>
                            <h6 class="text-dark mb-0">{{ $booking->created_at->diffForHumans() }}</h6>
                        </div>

                        <!-- Data item -->
                        <div class="col"><a href="{{ route('admin.booking-details', $booking->id) }}" class="btn btn-sm btn-light mb-0">View</a></div>
                    </div>
                    @empty

                    @endforelse

                </div>
                <!-- Card body END -->

                <!-- Card footer START -->
                <div class="card-footer pt-0">
                    <!-- Pagination and content -->
                    <div class="d-sm-flex justify-content-sm-between align-items-sm-center">
                        <!-- Content -->
                        <p class="mb-sm-0 text-center text-sm-start">Showing {{ $bookings->count() }} entries</p>
                        <!-- Pagination -->
                        {{ $bookings->links() }}
                    </div>
                </div>
                <!-- Card footer END -->
            </div>
		</div>
