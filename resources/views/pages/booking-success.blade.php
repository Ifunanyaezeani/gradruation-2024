@extends('layouts.main')

@section('contents')
    <section class="pt-4">
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-xl-8 mx-auto">

				<div class="card shadow">
					<!-- Image -->
					<img src="{{ $dorm->main_image }}" class="card-img-top rounded-top" alt="">

					<!-- Card body -->
					<div class="card-body text-center p-4">
						<!-- Title -->
						<h1 class="card-title fs-3">🎊 Congratulations! 🎊</h1>
						<p class="lead mb-3">Your dormitory has been booked</p>

						<!-- Second title -->
						<h5 class="text-primary mb-4">{{ $dorm->dorm_name }}</h5>

						<!-- List -->
						<div class="row justify-content-between text-start mb-4">
							<div class="col-lg-5">
								<ul class="list-group list-group-borderless">
									<li class="list-group-item d-sm-flex justify-content-between align-items-center">
										<span class="mb-0"><i class="bi bi-vr fa-fw me-2"></i>Booking ID:</span>
										<span class="h6 fw-normal mb-0">DM-{{ $booking->id }}</span>
									</li>
									<li class="list-group-item d-sm-flex justify-content-between align-items-center">
										<span class="mb-0"><i class="bi bi-person fa-fw me-2"></i>Booked by:</span>
										<span class="h6 fw-normal mb-0">{{ $booking->user->first_name }} {{ $booking->user->last_name }}</span>
									</li>
									<li class="list-group-item d-sm-flex justify-content-between align-items-center">
										<span class="mb-0"><i class="bi bi-wallet2 fa-fw me-2"></i>Payment Method:</span>
										<span class="h6 fw-normal mb-0">Bank Transfer</span>
									</li>
									<li class="list-group-item d-sm-flex justify-content-between align-items-center">
										<span class="mb-0"><i class="bi bi-currency-dollar fa-fw me-2"></i>Total Price:</span>
										<span class="h6 fw-normal mb-0">${{ $booking->room->price }}</span>
									</li>
								</ul>
							</div>

							<div class="col-lg-5">
								<ul class="list-group list-group-borderless">
									<li class="list-group-item d-sm-flex justify-content-between align-items-center">
										<span class="mb-0"><i class="bi bi-calendar fa-fw me-2"></i>Start Date:</span>
										<span class="h6 fw-normal mb-0">{{ $booking->start_date->format('d F Y') }}</span>
									</li>
									<li class="list-group-item d-sm-flex justify-content-between align-items-center">
										<span class="mb-0"><i class="bi bi-calendar fa-fw me-2"></i>Expiry Date:</span>
										<span class="h6 fw-normal mb-0">{{ $booking->end_date->format('d F Y') }}</span>
									</li>
									<li class="list-group-item d-sm-flex justify-content-between align-items-center">
										<span class="mb-0"><i class="bi bi-people fa-fw me-2"></i>Capacity:</span>
										<span class="h6 fw-normal mb-0">{{ $booking->room->capacity }}</span>
									</li>
								</ul>
							</div>
						</div>

						<!-- Button -->
						<div class="d-sm-flex justify-content-sm-end d-grid">
							<a href="{{ route('student.dormitory') }}" class="btn btn-primary mb-0">Proceed to bookings</a>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
</section>
@endsection
