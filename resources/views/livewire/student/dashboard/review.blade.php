<div class="container vstack gap-4">
    <!-- Title START -->
    <div class="row">
        <div class="col-12 mt-4">
            <h6 class="mb-0"><i class="bi bi-star fa-fw me-1"></i>My Reviews</h6>
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

    <div class="row">
        <div class="col-12">
            <div class="rounded-3">
                @forelse ($reviews as $review)
                    <div class="card-body">

                        <div class="bg-light border rounded p-3">
                            <!-- Review item START -->
                            <div class="d-sm-flex justify-content-between">
                                <!-- Avatar image -->
                                <div class="d-sm-flex align-items-center mb-3">
                                    <div>
                                        <span class="me-3 small">{{ $review->created_at->diffForHumans() }}</span>
                                    </div>
                                </div>
                                <!-- Review star -->
                                <ul class="list-inline mb-2 mb-sm-0">
                                    <li class="list-inline-item me-0"><i class="fas fa-star text-warning"></i></li>
                                    <li class="list-inline-item me-0">{{ $review->rating }}</li>
                                </ul>
                            </div>

                            <!-- Content -->
                            <h6 class="fw-normal"><span class="text-body"><Strong>REVIEW ON:</Strong></span> {{ $review->dormitory->dorm_name }}</h6>
                            <p>{{ $review->comment }}</p>

                            <!-- Buttons and collapse -->
                            <div class="mt-3">
                                <!-- Buttons -->
                                <div class="d-flex align-items-center">
                                    <button
                                        class="btn btn-sm btn-primary-soft mb-0"
                                        role="button"
                                        wire:
                                        wire:click="deleteReview({{ $review->id }})"
                                        wire:confirm="Are you sure you want to delete this review?"
                                    >
                                        <i class="bi bi-trash me-1"></i>Delete
                                    </button>
                                </div>
                            </div>
                            <!-- Review item END -->
                        </div>
                    </div>
                @empty
                    <div class="bg-mode shadow p-4 rounded overflow-hidden">
                        <div class="row g-4 align-items-center">
                            <!-- Content -->
                            <div class="col-md-12">
                                <h6>You've got no reviews yet 😏</h6>
                                <p class="lead mb-2">You're going to see all your reviews and feedback here, once you've
                                    reviewed a dorm</p>
                            </div>
                        </div>
                    </div>
                @endforelse
                <div class="card-footer pt-0">

                </div>
                <!-- Card footer END -->
            </div>
        </div>
    </div>
</div>
