@extends('layouts.main')

@section('contents')
<section class="py-0">
	<div class="container">
		<div class="card border bg-light px-sm-5">
			<div class="row align-items-center g-4">
				<!-- Content -->
				<div class="col-sm-9">
					<div class="card-body">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb breadcrumb-dots mb-0">
								<li class="breadcrumb-item"><a href="{{ route('explore') }}"><i class="bi bi-house me-1"></i> Explore</a></li>
								<li class="breadcrumb-item">{{ $dorm->dorm_name }}</li>
								<li class="breadcrumb-item active">{{ $room->room_name }}</li>
							</ol>
						</nav>
						<h1 class="m-0 h2 card-title">Review & Confirm your Booking</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section>
	<div class="container">
		<div class="row g-4 g-lg-5">

			<!-- Left side content START -->
			<div class="col-xl-8">
				<div class="vstack gap-5">

					<div class="card shadow">
						<!-- Card header -->
						<div class="card-header p-4 border-bottom">
							<!-- Title -->
							<h3 class="mb-0"><i class="fa-solid fa-hotel me-2"></i>Dormitory Information</h3>
						</div>

						<!-- Card body START -->
						<div class="card-body p-4">
							<!-- Card list START -->
							<div class="card mb-4">
								<div class="row align-items-center">
									<!-- Image -->
									<div class="col-sm-6 col-md-3">
										<img src="{{ $dorm->main_image }}" class="card-img" alt="">
									</div>

									<!-- Card Body -->
									<div class="col-sm-6 col-md-9">
										<div class="card-body pt-3 pt-sm-0 p-0">
											<!-- Title -->
											<h5 class="card-title"><a href="#">{{ $dorm->dorm_name }}</a></h5>
											<p class="small mb-2"><i class="bi bi-geo-alt me-2"></i>
                                                {{ Str::of($dorm->street_address) }} | {{ $dorm->regin }}, {{ $dorm->city }}
                                            </p>
											<ul class="list-inline mb-0">
												<li class="list-inline-item text-info ms-2 h6 small fw-bold mb-0">{{ strtolower(str_replace("_", " ",$dorm->dorm_type)) }}</li>
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
										<h5 class="mb-1">{{ date('j F Y') }}</h5>
										<small><i class="bi bi-alarm me-1"></i>{{ (new DateTime('now', (new DateTimeZone(date_default_timezone_get()))))->format('g:i a') }}</small>
									</div>
								</div>

								<div class="col-lg-4">
									<div class="bg-light py-3 px-4 rounded-3">
										<h6 class="fw-light small mb-1">Check out (a year latter)</h6>
										<h5 class="mb-1">{{ (new DateTime())->modify('+1 year')->format('j F Y') }}</h5>
										<small><i class="bi bi-alarm me-1"></i>{{  (new DateTime('now', (new DateTimeZone(date_default_timezone_get()))))->format('g:i a') }}</small>
									</div>
								</div>

								<div class="col-lg-4">
									<div class="bg-light py-3 px-4 rounded-3">
										<h6 class="fw-light small mb-1">Rooms Capacity</h6>
										<h5 class="mb-1">{{ $room->capacity }}</h5>
										<small><i class="bi bi-brightness-high me-1"></i>{{ strtolower($room->room_type) }} room</small>
									</div>
								</div>
							</div>

							<!-- Card START -->
							<div class="card border mt-4">
								<!-- Card header -->
								<div class="card-header border-bottom d-md-flex justify-content-md-between">
									<h5 class="card-title mb-0">{{ $room->room_name }}</h5>
								</div>

								<!-- Card body -->
								<div class="card-body">
									<h6>Included Amenities</h6>
									<!-- List -->
									<ul class="list-group list-group-borderless mb-0">
                                        @foreach ($dorm->amenities as $amenity)
                                            <li class="list-group-item h6 fw-light d-flex mb-0"><i class="bi bi-patch-check-fill text-success me-2"></i>{{ $amenity->amenity_name }}</li>
                                        @endforeach
									</ul>
								</div>
							</div>
							<!-- Card END -->
						</div>
						<!-- Card body END -->
					</div>

					<!-- student detail START -->
					<div class="card shadow">
						<div class="card-header border-bottom p-4">
							<h4 class="card-title mb-0"><i class="bi bi-people-fill me-2"></i>Student Details</h4>
						</div>

						<div class="card-body p-4">
							<form class="row g-4">
								<!-- Input -->
								<div class="col-md-6">
									<label class="form-label">First Name</label>
									<input type="text" value="{{ Auth::user()->first_name }}" class="form-control form-control-lg" placeholder="{{ Auth::user()->first_name }}" disabled>
								</div>

								<!-- Input -->
								<div class="col-md-6">
									<label class="form-label">Last Name</label>
									<input type="text" value="{{ Auth::user()->last_name }}" class="form-control form-control-lg" placeholder="{{ Auth::user()->last_name }}" disabled>
								</div>

								<!-- Input -->
								<div class="col-md-6">
									<label class="form-label">Email id</label>
									<input type="email" value="{{ Auth::user()->email }}" class="form-control form-control-lg" placeholder="{{ Auth::user()->email }}" disabled>
									<div id="emailHelp" class="form-text">(Your booking voucher will be sent to this email)</div>
								</div>

								<!-- Input -->
								<div class="col-md-6">
									<label class="form-label">Mobile number</label>
									<input type="text" {{ Auth::user()->phone_number }} class="form-control form-control-lg" placeholder="{{ Auth::user()->phone_number }}" disabled>
                                    <div class="form-text">
                                        <small>
                                            ({{ Auth::user()->phone_number == null ? "Seems like you've not provided your mobile number. kindly go to your account and complete setup." : "" }})
                                        </small>
                                    </div>
								</div>
							</form>
						</div>
					</div>

					<!-- Payment Options START -->
					<div class="card shadow">
						<!-- Card header -->
						<div class="card-header border-bottom p-4">
							<!-- Title -->
							<h4 class="card-title mb-0"><i class="bi bi-wallet-fill me-2"></i>Payment Options</h4>
						</div>

						<!-- Card body START -->
						<div class="card-body p-4 pb-0">

							<!-- Accordion START -->
							<div class="accordion accordion-icon accordion-bg-light" id="accordioncircle">
								<!-- Credit or debit card START -->
								<div class="accordion-item mb-3">
									<h6 class="accordion-header" id="heading-1">
										<button class="accordion-button rounded collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-1" aria-expanded="true" aria-controls="collapse-1">
											<i class="bi bi-credit-card text-primary me-2"></i>	<span class="me-5">Credit or Debit Card</span>
										</button>
									</h6>
									<div id="collapse-1" class="accordion-collapse collapse" aria-labelledby="heading-1" data-bs-parent="#accordioncircle">
										<!-- Accordion body -->
										<div class="accordion-body">
											<div class="row g-3">
                                                <!-- Alert box START -->
												<div class="col-12">
													<div class="alert alert-warning alert-dismissible fade show my-3" role="alert">

														<!-- Title -->
														<div class="d-sm-flex align-items-center mb-3">
															<h5 class="alert-heading mb-0">Card payment coming soon</h5>
														</div>

														<!-- Content -->
														<p class="mb-2">
                                                            Hello! We wanted to inform you that card payments will be available soon. Keep an eye out for updates as we implement this new feature. Thank you for your patience!
                                                        </p>
													</div>
												</div>
												<!-- Alert box END -->
											</div>
										</div>
									</div>
								</div>
								<!-- Credit or debit card END -->

								<!-- banking START -->
								<div class="accordion-item mb-3">
									<h6 class="accordion-header" id="heading-2">
										<button class="accordion-button collapsed rounded" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-2" aria-expanded="false" aria-controls="collapse-2">
											<i class="bi bi-globe2 text-primary me-2"></i> <span class="me-5">Pay with Banking Transfer</span>
										</button>
									</h6>
									<div id="collapse-2" class="accordion-collapse collapse show" aria-labelledby="heading-2" data-bs-parent="#accordioncircle">
										<!-- Accordion body -->
										<div class="accordion-body">
                                            <div class="d-sm-flex justify-content-sm-between my-3">
												<h6 class="mb-2 mb-sm-0">Bank details:</h6>
											</div>

											<div class="row g-3 mt-1">
												<ul class="list-block mb-0">
													<li class="list-block-item">
														<label class="btn btn-light btn-primary-soft-check" for="option1">
															<Strong>Bank Name:</Strong> Bank of America
														</label>
													</li>
													<!-- Sale -->
													<li class="list-block-item">
														<label class="btn btn-light btn-primary-soft-check" for="option2">
															<strong>Acct. Number:</strong> 0909090990
														</label>
													</li>
													<!-- Buy -->
													<li class="list-block-item">
														<label class="btn btn-light btn-primary-soft-check" for="option3">
															<strong>Acct. Name</strong> datamaster project
														</label>
													</li>
												</ul>
                                                <p class="mb-1">In order to complete your book, you will transfer <span><strong>${{ $room->price }}</strong></span> to the above bank account</p>

                                                <div class="col-12">
													<div class="alert alert-warning alert-dismissible fade show my-3" role="alert">
														<div class="d-sm-flex align-items-center mb-3">
															<h5 class="alert-heading mb-0">Note: After Payment</h5>
														</div>
														<p class="mb-2">
                                                           once your've made payment to the above bank details, then you should finalize everything.
                                                           To ensure that your order is processed smoothly and promptly, we kindly ask you to confirm your booking.
                                                        </p>
													</div>
												</div>

												<!-- Button -->
												<div class="d-grid">
													<a href="{{ route('booking.confirm', [Auth::user()->id, $room->id, $dorm->id]) }}" class="btn btn-success mb-0">Confirm Booking</a>
												</div>

											</div>
											<!-- Form END -->
										</div>
									</div>
								</div>
								<!-- banking END -->
							</div>
							<!-- Accordion END -->
						</div>
					</div>
					<!-- Payment Options END -->
				</div>
			</div>
			<!-- Left side content END -->

			<!-- Right side content START -->
			<aside class="col-xl-4">
				<div class="row g-4">

					<!-- Price summary START -->
					<div class="col-md-6 col-xl-12">
						<div class="card shadow rounded-2">
							<!-- card header -->
							<div class="card-header border-bottom">
								<h5 class="card-title mb-0">Price Summary</h5>
							</div>

							<!-- Card body -->
							<div class="card-body">
								<ul class="list-group list-group-borderless">
									<li class="list-group-item d-flex justify-content-between align-items-center">
										<span class="h6 fw-light mb-0">Room Charges</span>
										<span class="fs-5">${{ $room->price }}</span>
									</li>
									<li class="list-group-item d-flex justify-content-between align-items-center">
										<span class="h6 fw-light mb-0">Taxes % Fees</span>
										<span class="fs-5">$0</span>
									</li>
								</ul>
							</div>

							<!-- Card footer -->
							<div class="card-footer border-top">
								<div class="d-flex justify-content-between align-items-center">
									<span class="h5 mb-0">Payable Now</span>
									<span class="h5 mb-0">${{ $room->price }}</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</aside>

		</div>
	</div>
</section>
@endsection
