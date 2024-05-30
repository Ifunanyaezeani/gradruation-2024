@extends('layouts.main')

@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/glightbox/css/glightbox.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/flatpickr/css/flatpickr.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/choices/css/choices.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/tiny-slider/tiny-slider.css') }}">
@endsection

@section('contents')

    <section class="py-0 pt-sm-5">
        <div class="container position-relative">
            <!-- Title and button START -->
            <div class="row mb-3">
                <div class="col-12">
                    <!-- Meta -->
                    <div class="d-lg-flex justify-content-lg-between mb-1">
                        <!-- Title -->
                        <div class="mb-2 mb-lg-0">
                            <h1 class="fs-2">{{ $dorm_details->dorm_name }} </h1>
                            <!-- Location -->
                            <p class="fw-bold mb-0">
                                <i class="bi bi-geo-alt me-2"></i>{{ Str::of($dorm_details->street_address) }} |
                                {{ $dorm_details->regin }}, {{ $dorm_details->city }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Title and button END -->
        </div>
    </section>

    <section class="card-grid pt-0">
        <div class="container">
            <div class="row g-2">
                <div class="col-md-12">
                    <a data-glightbox data-gallery="gallery" href="{{ $dorm_details->main_image }}">
                        <div class="card card-grid-lg card-element-hover card-overlay-hover overflow-hidden"
                            style="background-image:url({{ $dorm_details->main_image }}); background-position: center left; background-size: cover;">
                            <div class="hover-element position-absolute w-100 h-100">
                                <i
                                    class="bi bi-fullscreen fs-6 text-white position-absolute top-50 start-50 translate-middle bg-dark rounded-1 p-2 lh-1"></i>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="pt-0">
        <div class="container" data-sticky-container>

            <div class="row g-4 g-xl-5">
                <!-- Content START -->
                <div class="col-xl-7 order-1">
                    <div class="vstack gap-5">

                        <!-- About hotel START -->
                        <div class="card bg-transparent">
                            <!-- Card header -->
                            <div class="card-header border-bottom bg-transparent px-0 pt-0">
                                <h3 class="mb-0">About This Dormitory</h3>
                            </div>

                            <!-- Card body START -->
                            <div class="card-body pt-4 p-0">
                                <p class="mb-3">
                                    {{ $dorm_details->description }}
                                </p>
                            </div>
                            <!-- Card body END -->
                        </div>
                        <!-- About hotel START -->

                        <!-- Amenities START -->
                        <div class="card bg-transparent">
                            <!-- Card header -->
                            <div class="card-header border-bottom bg-transparent px-0 pt-0">
                                <h3 class="card-title mb-0">Amenities</h3>
                            </div>

                            <!-- Card body START -->
                            <div class="card-body pt-4 p-0">
                                <div class="row g-4">
                                    <!-- Services -->
                                    <div class="col-md-12">
                                        @foreach ($dorm_details->amenities as $amenity)
                                            <span class="badge bg-success bg-opacity-10 text-success">
                                                <i class="fa-solid fa-check-circle text-success me-2"></i>Dry cleaning
                                            </span>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <!-- Card body END -->
                        </div>
                        <!-- Amenities END -->

                        <!-- Room START -->
                        <div class="card bg-transparent" id="room-options">
                            <!-- Card header -->
                            <div class="card-header border-bottom bg-transparent px-0 pt-0">
                                <div class="d-sm-flex justify-content-sm-between align-items-center">
                                    <h3 class="mb-2 mb-sm-0">Rooms</h3>
                                </div>
                            </div>

                            <div class="card-body pt-4 p-0">
                                <div class="vstack gap-4">
                                    @forelse ($dorm_details->rooms as $room)
                                        <!-- Room item START -->
                                        <div class="card shadow p-3">
                                            <div class="row g-4">
                                                <!-- Card img -->
                                                <div class="col-md-3 position-relative">
                                                    <!-- Slider START -->
                                                    <div
                                                        class="tiny-slider arrow-round arrow-xs arrow-dark overflow-hidden rounded-2">
                                                        <div class="tiny-slider-inner" data-autoplay="true"
                                                            data-arrow="true" data-dots="false" data-items="1">
                                                            <!-- Image item -->
                                                            @foreach ($room->room_pictures as $picture)
                                                                <div><img src="{{ $picture }}"
                                                                        alt="{{ $room->room_name }}"></div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <!-- Slider END -->
                                                    <!-- Button -->
											        <a href="{{ $room->virtual_tour_url }}" target="_blank" class="btn btn-link text-decoration-underline p-0 mb-0 mt-1"><i class="bi bi-eye-fill me-1"></i>Virtual tour</a>
                                                </div>

                                                <!-- Card body -->
                                                <div class="col-md-7">
                                                    <div class="card-body d-flex flex-column h-100 p-0">

                                                        <!-- Title -->
                                                        <h5 class="card-title">{{ $room->room_name }}</h5>

                                                        <!-- Amenities -->
                                                        <ul class="nav nav-divider mb-2">
                                                            <li class="nav-item"><small>capacity:
                                                                    {{ $room->capacity }}</small></li>
                                                            <li class="nav-item"><small>{{ strtolower($room->room_type) }}
                                                                    room</small></li>
                                                        </ul>

                                                        <p class="text-success mb-0">{{ $room->availability }}</p>

                                                        <!-- Price and Button -->
                                                        <div
                                                            class="d-sm-flex justify-content-sm-between align-items-center mt-auto">
                                                            <!-- Button -->
                                                            <div class="d-flex align-items-center">
                                                                <h5 class="fw-bold mb-0 me-1">${{ $room->price }}</h5>
                                                                <span class="mb-0 me-2">/per year</span>
                                                            </div>
                                                            <!-- Price -->
                                                            <div class="mt-3 mt-sm-0">
                                                                @if ($room->availability == 'Booked')
                                                                    <button class="btn btn-sm btn-primary mb-0" disabled>
                                                                        Booked Already
                                                                    </button>
                                                                @else
                                                                    <a href="{{ route('booking.now', [$dorm_details->id, $room->id, $dorm_details->slug]) }}"
                                                                        class="btn btn-sm btn-primary mb-0">
                                                                        Book Now
                                                                    </a>
                                                                @endif

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Room item END -->
                                    @empty
                                    @endforelse

                                </div>
                            </div>
                            <!-- Card body START -->

                            <!-- Card body END -->
                        </div>
                        <!-- Room END -->


                        <div class="card alert alert-success bg-transparent">
                            <!-- Card header -->
                            <div class="card-header border-bottom bg-transparent px-0 pt-0">
                                <h3 class="mb-0 alert-heading">Dormitory Policies</h3>
                            </div>

                            <!-- Card body START -->
                            <div class="card-body pt-4 p-0">
                                <p>{{ $dorm_details->policy }}</p>
                            </div>
                        </div>

                        <!-- Review START -->
                        <div class="card bg-transparent">
                            <!-- Card header -->
                            <div class="card-header border-bottom bg-transparent px-0 pt-0">
                                <h3 class="card-title mb-0">Student Review</h3>
                            </div>

                            <!-- Card body START -->
                            <div class="card-body pt-4 p-0">
                                <!-- Progress bar and rating START -->
                                {{-- <div class="card bg-light p-4 mb-4">
                                    <div class="row g-4 align-items-center">
                                        <!-- Rating info -->
                                        <div class="col-md-4">
                                            <div class="text-center">
                                                <!-- Info -->
                                                <h2 class="mb-0">0.0</h2>
                                                <p class="mb-2">Based on 0 Reviews</p>
                                                <!-- Star -->
                                                <ul class="list-inline mb-0">
                                                    <li class="list-inline-item me-0"><i
                                                            class="fa-solid fa-star text-warning"></i></li>
                                                    <li class="list-inline-item me-0"><i
                                                            class="fa-solid fa-star text-warning"></i></li>
                                                    <li class="list-inline-item me-0"><i
                                                            class="fa-solid fa-star text-warning"></i></li>
                                                    <li class="list-inline-item me-0"><i
                                                            class="fa-solid fa-star text-warning"></i></li>
                                                    <li class="list-inline-item me-0"><i
                                                            class="fa-solid fa-star-half-alt text-warning"></i></li>
                                                </ul>
                                            </div>
                                        </div>

                                        <!-- Progress-bar START -->
                                        <div class="col-md-8">
                                            <div class="card-body p-0">
                                                <div class="row gx-3 g-2 align-items-center">
                                                    <!-- Progress bar and Rating -->
                                                    <div class="col-9 col-sm-10">
                                                        <!-- Progress item -->
                                                        <div class="progress progress-sm bg-warning bg-opacity-15">
                                                            <div class="progress-bar bg-warning" role="progressbar"
                                                                style="width: 0%" aria-valuenow="0" aria-valuemin="0"
                                                                aria-valuemax="100">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Percentage -->
                                                    <div class="col-3 col-sm-2 text-end">
                                                        <span class="h6 fw-light mb-0">0%</span>
                                                    </div>

                                                    <!-- Progress bar and Rating -->
                                                    <div class="col-9 col-sm-10">
                                                        <!-- Progress item -->
                                                        <div class="progress progress-sm bg-warning bg-opacity-15">
                                                            <div class="progress-bar bg-warning" role="progressbar"
                                                                style="width: 0%" aria-valuenow="0" aria-valuemin="0"
                                                                aria-valuemax="100">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Percentage -->
                                                    <div class="col-3 col-sm-2 text-end">
                                                        <span class="h6 fw-light mb-0">0%</span>
                                                    </div>

                                                    <!-- Progress bar and Rating -->
                                                    <div class="col-9 col-sm-10">
                                                        <!-- Progress item -->
                                                        <div class="progress progress-sm bg-warning bg-opacity-15">
                                                            <div class="progress-bar bg-warning" role="progressbar"
                                                                style="width: 0%" aria-valuenow="0" aria-valuemin="0"
                                                                aria-valuemax="100">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Percentage -->
                                                    <div class="col-3 col-sm-2 text-end">
                                                        <span class="h6 fw-light mb-0">0%</span>
                                                    </div>

                                                    <!-- Progress bar and Rating -->
                                                    <div class="col-9 col-sm-10">
                                                        <!-- Progress item -->
                                                        <div class="progress progress-sm bg-warning bg-opacity-15">
                                                            <div class="progress-bar bg-warning" role="progressbar"
                                                                style="width: 0%" aria-valuenow="0" aria-valuemin="0"
                                                                aria-valuemax="100">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Percentage -->
                                                    <div class="col-3 col-sm-2 text-end">
                                                        <span class="h6 fw-light mb-0">0%</span>
                                                    </div>

                                                    <!-- Progress bar and Rating -->
                                                    <div class="col-9 col-sm-10">
                                                        <!-- Progress item -->
                                                        <div class="progress progress-sm bg-warning bg-opacity-15">
                                                            <div class="progress-bar bg-warning" role="progressbar"
                                                                style="width: 0%" aria-valuenow="0" aria-valuemin="0"
                                                                aria-valuemax="100">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Percentage -->
                                                    <div class="col-3 col-sm-2 text-end">
                                                        <span class="h6 fw-light mb-0">0%</span>
                                                    </div>
                                                </div> <!-- Row END -->
                                            </div>
                                        </div>
                                        <!-- Progress-bar END -->

                                    </div>
                                </div> --}}
                                <div class="card bg-light p-4 mb-4">
                                    <div class="row g-4 align-items-center">
                                        <!-- Rating info -->
                                        <div class="col-md-4">
                                            <div class="text-center">
                                                <!-- Info -->
                                                <h2 class="mb-0">{{ number_format($averageRating, 1) }}</h2>
                                                <p class="mb-2">Based on {{ $totalReviews }} Reviews</p>
                                                <!-- Star -->
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

                                        <!-- Progress-bar START -->
                                        <div class="col-md-8">
                                            <div class="card-body p-0">
                                                @foreach (range(5, 1) as $rating)
                                                    <div class="row gx-3 g-2 align-items-center mb-2">
                                                        <!-- Progress bar and Rating -->
                                                        <div class="col-9 col-sm-10">
                                                            <!-- Progress item -->
                                                            <div class="progress progress-sm bg-warning bg-opacity-15">
                                                                <div class="progress-bar bg-warning" role="progressbar"
                                                                    style="width: {{ $ratingDistribution->get($rating, 0) }}%"
                                                                    aria-valuenow="{{ $ratingDistribution->get($rating, 0) }}"
                                                                    aria-valuemin="0" aria-valuemax="100">
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
                                        <!-- Progress-bar END -->
                                    </div>
                                </div>
                                <!-- Progress bar and rating END -->
                                @foreach ($reviews as $review)
                                    <!-- Review item START -->
                                    <div class="d-md-flex my-4">
                                        <!-- Avatar -->
                                        <div class="avatar avatar-lg me-3 flex-shrink-0">
                                            @if ($review->user->profile_picture == null)
                                                <img id="uploadfile-1-preview"
                                                    class="avatar-img rounded-circle border border-3 border-primary"
                                                    src="{{ asset('assets/images/avatar/p1.svg') }}" alt="" />
                                            @else
                                                <img id="uploadfile-1-preview"
                                                    class="avatar-img rounded-circle border border-3 border-primary"
                                                    src="{{ $review->user->profile_picture }}" alt="" />
                                            @endif
                                        </div>
                                        <!-- Text -->
                                        <div>
                                            <div class="d-flex mt-1 mt-md-0">
                                                <div>
                                                    <h6 class="me-3 mb-0">{{ $review->user->first_name }}
                                                        {{ $review->user->last_name }}</h6>
                                                    <!-- Info -->
                                                    <ul class="nav nav-divider small mb-2">
                                                        <li class="nav-item">{{ $review->created_at->diffForHumans() }}
                                                        </li>
                                                        <li class="nav-item">{{ $review->title }}</li>
                                                        <li class="nav-item">
                                                            @for ($i = 1; $i <= 5; $i++)
                                                                <span>
                                                                    <i
                                                                        class="fa{{ $i <= $review->rating ? '-solid' : '-regular' }} fa-star text-warning"></i>
                                                                </span>
                                                            @endfor
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <p class="mb-2">
                                                {{ $review->comment }}
                                            </p>
                                        </div>
                                    </div>
                                    <hr>
                                @endforeach
                            </div>
                            <!-- Card body END -->
                        </div>
                        <!-- Review END -->
                    </div>
                </div>
                <!-- Content END -->

                <aside class="col-xl-5 order-xl-2">
                    <div data-sticky data-margin-top="100" data-sticky-for="1199">

                        <div class="card card-body border">
                            <div class="d-sm-flex justify-content-sm-between align-items-center mb-3">
                                <h6 class="text-primary">
                                <Strong>{{ strtolower(str_replace('_', ' ', $dorm_details->dorm_type)) }} Dormitory</Strong>
                            </h6>
                            </div>
                            <div class="d-grid">
                                <a href="#room-options" class="btn btn-lg btn-primary-soft mb-0">View
                                    {{ $dorm_details->rooms->count() }} Rooms Options</a>
                            </div>
                        </div>
                        <!-- Book now END -->
                    </div>
                </aside>
                <!-- Right side content END -->
            </div> <!-- Row END -->
        </div>
    </section>

@endsection

@section('scripts')
    <script src="{{ asset('assets/vendor/choices/js/choices.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/tiny-slider/tiny-slider.js') }}"></script>
    <script src="{{ asset('assets/vendor/sticky-js/sticky.min.js') }}"></script>
@endsection
