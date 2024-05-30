<div class="page-content-wrapper p-xxl-4">

    <!-- Title -->
    <div class="row">
        <div class="col-12 mb-4 mb-sm-5">
            <h1 class="h3 mb-0">Reviews</h1>
        </div>
    </div>
    @if (session()->has('message'))
        <div class="alert alert-success mb-3">
            {{ session('message') }}
        </div>
    @endif

    <!-- Review box START -->
    <div class="row g-4 g-xl-5 mb-5">
        <!-- Growth -->
        <div class="col-md-6 col-lg-4">
            <div class="bg-light p-4 rounded text-center">
                <h6 class="fw-normal">Total Reviews</h6>
                <div class="d-flex align-items-center justify-content-center">
                    <h2 class="mb-0 me-2">{{ $totalReviews }}</h2>
                </div>
            </div>
        </div>

        <!-- Average rating -->
        <div class="col-md-6 col-lg-4">
            <div class="bg-light p-4 rounded text-center">
                <h6 class="fw-normal">Average Rating</h6>
                <div class="d-flex align-items-center justify-content-center">
                    <h2 class="mb-0 me-2">{{ $averageRating }}</h2>
                    <ul class="list-inline mb-0">
                        @for ($i = 1; $i <= 5; $i++)
                            <li class="list-inline-item me-0">
                                <i
                                    class="fa{{ $i <= $averageRating ? '-solid' : '-regular' }} fa-star text-warning"></i>
                            </li>
                        @endfor
                    </ul>
                </div>
            </div>
        </div>

        <!-- Progress bars -->
        <div class="col-lg-4">
            <div class="bg-light p-2 rounded">
                @foreach (range(5, 1) as $rating)
                    <div class="row gx-3 g-1 align-items-center mb-0">
                        <!-- Progress bar and Rating -->
                        <div class="col-9 col-sm-10">
                            <!-- Progress item -->
                            <div class="progress progress-sm bg-warning bg-opacity-15">
                                <div class="progress-bar bg-warning" role="progressbar"
                                    style="width: {{ $ratingDistribution->get($rating, 0) }}%"
                                    aria-valuenow="{{ $ratingDistribution->get($rating, 0) }}" aria-valuemin="0"
                                    aria-valuemax="100">
                                </div>
                            </div>
                        </div>
                        <!-- Percentage -->
                        <div class="col-3 col-sm-2 text-end">
                            <span
                                class=" fw-light mb-0"><small>{{ $ratingDistribution->get($rating, 0) }}%</small></span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Review box END -->

    <!-- Tab and select -->
    <div class="row g-4 justify-content-between align-items-center">
        <div class="col-lg-5">
            <!-- Tabs -->
            <ul class="nav nav-pills-shadow nav-responsive" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link mb-0 me-sm-2 active" data-bs-toggle="tab" href="#tab-1" aria-selected="true"
                        role="tab">All Reviews</a>
                </li>
            </ul>
        </div>

    </div>

    <!-- Reviews START -->
    <div class="vstack gap-4 mt-5">
        @forelse ($reviews as $review)
            <!-- Review item -->
            <div class="row g-3 g-lg-4">
                <div class="col-md-4 col-xxl-3">
                    <!-- Avatar and info -->
                    <div class="d-flex align-items-center">
                        <!-- Avatar -->
                        <div class="avatar avatar-xl me-2 flex-shrink-0">
                            @if ($review->user->profile_picture == null)
                                <img class="avatar-img rounded-circle border border-3 border-primary"
                                    src="{{ asset('assets/images/avatar/p1.svg') }}" alt="" />
                            @else
                                <img class="avatar-img rounded-circle border border-3 border-primary"
                                    src="{{ $review->user->profile_picture }}" alt="" />
                            @endif
                        </div>
                        <!-- Info -->
                        <div class="ms-2">
                            <h5 class="mb-1">{{ $review->user->first_name }} {{ $review->user->last_name }}</h5>
                            <p class="mb-0">Dated: {{ $review->created_at->format('d F Y') }}</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-8 col-xxl-9">
                    <!-- Rating -->
                    <ul class="list-inline mb-2">
                        @for ($i = 1; $i <= 5; $i++)
                            <li class="list-inline-item me-0">
                                <i
                                    class="fa{{ $i <= $review->rating ? '-solid' : '-regular' }} fa-star text-warning"></i>
                            </li>
                        @endfor
                    </ul>
                    <h6><span class="text-body fw-light">Review on:</span> <a href="{{ route('admin.single-dorm', $review->dormitory->slug) }}" target="_blank">{{ $review->dormitory->dorm_name }}</a></h6>
                    <p>
                        {{ $review->comment }}
                    </p>

                    <div class="d-flex justify-content-between align-items-center">
                        <div></div>
                        <button
                            type="button"
                            wire:click="deleteReview({{ $review->id }})"
                            wire:confirm="Are you sure you want to delete this student review?"
                            class="btn btn-sm btn-primary-soft"
                        >
                            <i class="bi bi-trash3 me-1"></i>Delete
                        </button>
                    </div>
                </div>
            </div>

            <hr class="m-0"> <!-- Divider -->
        @empty
        @endforelse



        <!-- Pagination START -->
        <div class="d-sm-flex justify-content-sm-between align-items-sm-center">
            <!-- Content -->
            <p class="mb-sm-0 text-center text-sm-start">Showing {{ $reviews->count() }} entries</p>
            <!-- Pagination -->
            {{ $reviews->links() }}
        </div>
        <!-- Pagination END -->
    </div>
    <!-- Reviews END -->

</div>
