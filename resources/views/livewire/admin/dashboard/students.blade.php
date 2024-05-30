<div class="page-content-wrapper p-xxl-4 bg-transparent">

			<!-- Title -->
			<div class="row">
				<div class="col-12 mb-4 mb-sm-5">
					<div class="d-sm-flex justify-content-between align-items-center">
						<h1 class="h3 mb-3 mb-sm-0">All Registered Students</h1>
					</div>
				</div>
			</div>

			{{-- <!-- Search START -->
			<div class="row g-3 align-items-center justify-content-between mb-5">
				<!-- Search -->
				<div class="col-md-8">
					<form class="rounded position-relative">
						<input class="form-control pe-5" type="search" placeholder="Search students" aria-label="Search">
						<button class="btn border-0 px-3 py-0 position-absolute top-50 end-0 translate-middle-y" type="submit"><i class="fas fa-search fs-6"></i></button>
					</form>
				</div>
			</div>
			<!-- Search  END --> --}}

			<!-- dorm-owners START -->
			<div class="row g-4">
                @forelse ($students as $student)
                    <!-- Card item -->
				<div class="col-md-6 col-lg-4 col-xxl-3">
					<div class="card border h-100">
						<div class="card-body text-center pb-0">
							<!-- Avatar Image -->
							<div class="avatar avatar-xl flex-shrink-0 mb-3">
                                @if ($student->profile_picture == null)
                                    <img class="avatar-img rounded-circle border border-3 border-primary"
                                        src="{{ asset('assets/images/avatar/p1.svg') }}" alt="" />
                                @else
                                    <img class="avatar-img rounded-circle border border-3 border-primary"
                                        src="{{ $student->profile_picture }}" alt="" />
                                @endif
							</div>
							<!-- Title -->
							<h5 class="mb-1">{{ $student->first_name }} {{ $student->last_name }}</h5>
							<small><i class="bi bi-envelope"></i> {{ $student->email }} </small>
							<!-- Info and rating -->
							<div class="d-flex justify-content-center mt-3">
								<span class="mb-0 small badge text-bg-secondary">{{ $student->email_verified_at == null ? "Unverified" :  "Verified"}}<i class="fa-solid fa-star text-warning ms-1"></i></span>
							</div>
						</div>
						<!-- card footer -->
						<div class="card-footer d-flex gap-3 align-items-center">
							<a href="{{ route('admin.student.details', $student->id) }}" wire:navigate class="btn btn-sm btn-primary-soft mb-0 w-100">Student detail</a>
						</div>
					</div>
				</div>
                @empty

                @endforelse
			</div>
			<!-- dorm-owners list END -->

			<!-- Pagination START -->
			<div class="d-sm-flex justify-content-sm-between align-items-sm-center mt-4">
				<!-- Content -->
				<p class="mb-sm-0 text-center text-sm-start">Showing {{ $students->count() }} entries</p>
				<!-- Pagination -->
                {{ $students->links() }}
			</div>
			<!-- Pagination END -->

		</div>

