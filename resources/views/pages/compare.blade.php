@extends('layouts.main')

@section('style')

@endsection

@section('contents')
<!-- =======================
Main banner START -->
<section class="py-0">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="bg-light rounded-3 position-relative overflow-hidden p-4 p-xl-5">
					<div class="row g-4 align-items-center">
						<!-- Content -->
						<div class="col-lg-6">
							<!-- Title -->
							<h1 class="mb-3 fs-2">Compare Dormitories and choose the best</h1>
							<p class="mb-3">Expand knowledge by reading book Two before narrow not relied on how except moment myself Dejection assurance. </p>
							<a href="{{ route('explore') }}" class="btn btn-primary-soft mb-0">View all Dormitories<i class="bi bi-arrow-right fa-fw ms-2"></i></a>
						</div>

						<!-- Image -->
						<div class="col-lg-6">
							<img src="{{ asset('assets/images/element/compare.svg') }}" alt="">
						</div>
					</div> <!-- Row END -->
				</div>
			</div>
		</div>
	</div>
</section>
<!-- =======================
Main banner END -->

<!-- =======================
Compare listing START -->
<section>
	<div class="container">
		<div class="row">
			<div class="col-12">
				<!-- Table START -->
				<div class="table-responsive-xl">
					<table class="table table-compare align-middle">
						<!-- Head START -->
							<thead class="align-top">
								<tr>
									<th scope="col">
										<p class="h3">Compare Our Listing</p>
										<a href="#" class="btn btn-lg btn-primary btn-round mb-0">
											<i class="fa-solid fa-plus"></i>
										</a>
									</th>

									<th scope="col">
										<div class="card bg-transparent">
											<!-- Image -->
											<img src="{{ asset("assets/images/category/hotel/4by3/02.jpg") }}" class="rounded" alt="...">

											<!-- Card body START -->
											<div class="card-body px-0">
												<!-- Title -->
												<span class="h6"><a href="#">Courtyard by Marriott New York</a></span>
												<!-- Button and price -->
												<div class="d-sm-flex justify-content-between align-items-center mt-2">
													<span class="h6 text-success mb-0">$750</span>
													<a href="#" class="btn btn-sm btn-link mb-0 p-0">View Listing<i class="bi bi-arrow-right ms-2"></i></a>
												</div>
											</div>
										</div>
									</th>

									<th scope="col">
										<div class="card bg-transparent">
											<!-- Image -->
											<img src="{{ asset('assets/images/category/hotel/4by3/03.jpg') }}" class="rounded" alt="...">

											<!-- Card body START -->
											<div class="card-body px-0">
												<!-- Title -->
												<span class="h6"><a href="#">Club Quarters Hotel</a></span>
												<!-- Button and price -->
												<div class="d-sm-flex justify-content-between align-items-center mt-2">
													<span class="h6 text-success mb-0">$800</span>
													<a href="#" class="btn btn-sm btn-link mb-0 p-0">View Listing<i class="bi bi-arrow-right ms-2"></i></a>
												</div>
											</div>
										</div>
									</th>

									<th scope="col">
										<div class="card bg-transparent">
											<!-- Image -->
											<img src="{{ asset('assets/images/category/hotel/4by3/05.jpg') }}" class="rounded" alt="...">

											<!-- Card body START -->
											<div class="card-body px-0">
												<!-- Title -->
												<span class="h6"><a href="#">Pride moon Village Resort & Spa</a></span>
												<!-- Button and price -->
												<div class="d-sm-flex justify-content-between align-items-center mt-2">
													<span class="h6 text-success mb-0">$1000</span>
													<a href="#" class="btn btn-sm btn-link mb-0 p-0">View Listing<i class="bi bi-arrow-right ms-2"></i></a>
												</div>
											</div>
										</div>
									</th>
								</tr>
							</thead>
						<!-- Head END -->

						<!-- Body START -->
						<tbody class="border-top-0">
							<!-- Item -->
							<tr>
								<th scope="row"><span class="h6 mb-0">Rating</span></th>
								<td>
									<ul class="list-inline mb-0">
										<li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
										<li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
										<li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
										<li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
										<li class="list-inline-item"><i class="far fa-star text-warning"></i></li>
									</ul>
								</td>
								<td>
									<ul class="list-inline mb-0">
										<li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
										<li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
										<li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
										<li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
										<li class="list-inline-item"><i class="fas fa-star-half-alt text-warning"></i></li>
									</ul>
								</td>
								<td>
									<ul class="list-inline mb-0">
										<li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
										<li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
										<li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
										<li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
										<li class="list-inline-item"><i class="fas fa-star text-warning"></i></li>
									</ul>
								</td>
							</tr>

							<!-- Item -->
							<tr>
								<th scope="row"><span class="h6 mb-0">Floor area</span></th>
								<td>1700 sq.ft</td>
								<td>1500 sq.ft</td>
								<td>1650 sq.ft</td>
							</tr>

							<!-- Item -->
							<tr>
								<th scope="row"><span class="h6 mb-0">Bedroom</span></th>
								<td>3 Bedroom  4 Beds</td>
								<td>2 Bedroom  3 Beds</td>
								<td>1 Bedroom  2 Beds</td>
							</tr>

							<!-- Item -->
							<tr>
								<th scope="row"><span class="h6 mb-0">Bathroom</span></th>
								<td>2 Showers</td>
								<td>2 Showers 1 Bathtub</td>
								<td>1 Shower 1 Bathtub</td>
							</tr>

							<!-- Item -->
							<tr>
								<th scope="row"><span class="h6 mb-0">Swimming Pool</span></th>
								<td>
									<span class="h5 text-success mb-0"><i class="bi bi-check-lg"></i></span>
								</td>
								<td>
									<span class="h5 text-danger mb-0"><i class="bi bi-x-lg"></i></span>
								</td>
								<td>
									<span class="h5 text-danger mb-0"><i class="bi bi-x-lg"></i></span>
								</td>
							</tr>

							<!-- Item -->
							<tr>
								<th scope="row"><span class="h6 mb-0">Air conditioning</span></th>
								<td>
									<span class="h5 text-success mb-0"><i class="bi bi-check-lg"></i></span>
								</td>
								<td>
									<span class="h5 text-success mb-0"><i class="bi bi-check-lg"></i></span>
								</td>
								<td>
									<span class="h5 text-success mb-0"><i class="bi bi-check-lg"></i></span>
								</td>
							</tr>

							<!-- Item -->
							<tr>
								<th scope="row"><span class="h6 mb-0">Gym</span></th>
								<td>
									<span class="h5 text-danger mb-0"><i class="bi bi-x-lg"></i></span>
								</td>
								<td>
									<span class="h5 text-danger mb-0"><i class="bi bi-x-lg"></i></span>
								</td>
								<td>
									<span class="h5 text-success mb-0"><i class="bi bi-check-lg"></i></span>
								</td>
							</tr>

							<!-- Item -->
							<tr>
								<th scope="row"><span class="h6 mb-0">Internet</span></th>
								<td>
									<span class="h5 text-success mb-0"><i class="bi bi-check-lg"></i></span>
								</td>
								<td>
									<span class="h5 text-success mb-0"><i class="bi bi-check-lg"></i></span>
								</td>
								<td>
									<span class="h5 text-success mb-0"><i class="bi bi-check-lg"></i></span>
								</td>
							</tr>

							<!-- Item -->
							<tr>
								<th scope="row"><span class="h6 mb-0">Actions</span></th>
								<td>
									<button class="btn btn-sm btn-outline-primary mb-0">Remove</button>
								</td>
								<td>
									<button class="btn btn-sm btn-outline-primary mb-0">Remove</button>
								</td>
								<td>
									<button class="btn btn-sm btn-outline-primary mb-0">Remove</button>
								</td>
							</tr>

						</tbody>
						<!-- Body END -->
					</table>
				</div>
				<!-- Table END -->
			</div>
		</div><!-- Row END -->
	</div>
</section>
<!-- =======================
Compare listing END -->

@endsection
