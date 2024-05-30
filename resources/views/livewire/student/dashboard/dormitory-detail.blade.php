<div class="container vstack gap-4">
    <!-- Title START -->
    <div class="row">
        <div class="col-12 mt-4">
            <h6 class="mb-0"><i class="bi bi-journals fa-fw me-1"></i>Dormitory detail</h6>
        </div>
    </div>
    <!-- Title END -->

    <div class="bg-transparent">
        <div class="card shadow">
            <!-- Card header -->
            <div class="card-header p-4 border-bottom">
                <!-- Title -->
                <h4 class="mb-0"><i class="fa-solid fa-hotel me-2"></i>Dormitory Information</h4>
            </div>

            <!-- Card body START -->
            <div class="card-body p-4">
                <!-- Card list START -->
                <div class="card mb-4">
                    <div class="row align-items-center">
                        <!-- Image -->
                        <div class="col-sm-6 col-md-3">
                            <img src="{{ $booking->room->dormitory->main_image }}" class="card-img" alt="">
                        </div>

                        <!-- Card Body -->
                        <div class="col-sm-6 col-md-9">
                            <div class="card-body pt-3 pt-sm-0 p-0">
                                <!-- Title -->
                                <h5 class="card-title"><a href="#">{{ $booking->room->dormitory->dorm_name }}</a>
                                </h5>
                                <p class="small mb-2"><i class="bi bi-geo-alt me-2"></i>
                                    {{ Str::of($booking->room->dormitory->street_address) }} |
                                    {{ $booking->room->dormitory->regin }}, {{ $booking->room->dormitory->city }}
                                </p>
                                <ul class="list-inline mb-0">
                                    <li class="list-inline-item text-info ms-2 h6 small fw-bold mb-0">
                                        {{ strtolower(str_replace('_', ' ', $booking->room->dormitory->dorm_type)) }}
                                    </li>
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
                            <h5 class="mb-1">{{ $booking->start_date->format('d F Y') }}</h5>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="bg-light py-3 px-4 rounded-3">
                            <h6 class="fw-light small mb-1">Check out (a year later)</h6>
                            <h5 class="mb-1">{{ $booking->end_date->format('d F Y') }}</h5>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="bg-light py-3 px-4 rounded-3">
                            <h6 class="fw-light small mb-1">Rooms Capacity</h6>
                            <h5 class="mb-1">
                                {{ $booking->room->capacity }} | <small><i
                                        class="bi bi-brightness-high me-1"></i>{{ strtolower($booking->room->room_type) }}
                                    room</small>
                            </h5>

                        </div>
                    </div>
                </div>

                <!-- Card START -->
                <div class="card border mt-4">
                    <!-- Card header -->
                    <div class="card-header border-bottom d-md-flex justify-content-md-between">
                        <h5 class="card-title mb-0">{{ $booking->room->room_name }} | <small
                                class="text-success">${{ $booking->room->price }} / per year</small></h5>
                    </div>

                    <!-- Card body -->
                    <div class="card-body">
                        <h6>Included Amenities</h6>
                        <!-- List -->
                        <ul class="list-group list-group-borderless mb-0">
                            @foreach ($booking->room->dormitory->amenities as $amenity)
                                <li class="list-group-item h6 fw-light d-flex mb-0">
                                    <i
                                        class="bi bi-patch-check-fill text-success me-2"></i>{{ $amenity->amenity_name }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <!-- Card END -->
            </div>
            <!-- Card body END -->
        </div>
    </div>

    <div class="card shadow">
        <div class="card-header border-bottom p-4">
            <h4 class="card-title mb-0"><i class="bi bi-person-square me-2"></i>Dorm Owner Details</h4>
        </div>

        <div class="card-body p-4">
            <form class="row g-4">
                <!-- Input -->
                <div class="col-md-6">
                    <label class="form-label">First Name</label>
                    <input type="text" value="{{ $booking->room->dormitory->owner->first_name }}"
                        class="form-control form-control-lg"
                        placeholder="{{ $booking->room->dormitory->owner->first_name }}" disabled>
                </div>

                <!-- Input -->
                <div class="col-md-6">
                    <label class="form-label">Last Name</label>
                    <input type="text" value="{{ $booking->room->dormitory->owner->last_name }}"
                        class="form-control form-control-lg"
                        placeholder="{{ $booking->room->dormitory->owner->last_name }}" disabled>
                </div>

                <!-- Input -->
                <div class="col-md-6">
                    <label class="form-label">Email id</label>
                    <input type="email" value="{{ $booking->room->dormitory->owner->email }}"
                        class="form-control form-control-lg"
                        placeholder="{{ $booking->room->dormitory->owner->email }}" disabled>
                </div>

                <!-- Input -->
                <div class="col-md-6">
                    <label class="form-label">Mobile number</label>
                    <input type="text" {{ $booking->room->dormitory->owner->phone_number }}
                        class="form-control form-control-lg"
                        placeholder="{{ $booking->room->dormitory->owner->phone_number }}" disabled>
                </div>
            </form>
        </div>
    </div>

    @if ($booking->booking_status == App\Enums\BookingStatus::PENDING->name)
        <div class="card shadow">
            <!-- Card header -->
            <div class="card-header border-bottom p-4">
                <!-- Title -->
                <h4 class="card-title mb-0"><i class="bi bi-wallet-fill me-2"></i>Payment Options</h4>
            </div>

            <!-- Card body START -->
            <div class="card-body p-4 pb-0">

                <div class="bg-primary bg-opacity-10 rounded-3 mb-4 p-3">
                    <div class="d-md-flex justify-content-md-between align-items-center">
                        <!-- Image and title -->
                        <div class="d-sm-flex align-items-center mb-2 mb-md-0">
                            <div class="ms-sm-3 mt-2 mt-sm-0">
                                <p class="mb-0">You're only seeing this payment details because your booking is still
                                    pedding.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Accordion START -->
                <div class="accordion accordion-icon accordion-bg-light" id="accordioncircle">

                    <!-- banking START -->
                    <div class="accordion-item mb-3">
                        <h6 class="accordion-header" id="heading-2">
                            <button class="accordion-button collapsed rounded" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapse-2" aria-expanded="false" aria-controls="collapse-2">
                                <i class="bi bi-globe2 text-primary me-2"></i> <span class="me-5">Pay with Banking
                                    Transfer</span>
                            </button>
                        </h6>
                        <div id="collapse-2" class="accordion-collapse collapse show" aria-labelledby="heading-2"
                            data-bs-parent="#accordioncircle">
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
                                    <p class="mb-1">In order to complete your book, you will transfer
                                        <span><strong>${{ $booking->room->price }}</strong></span> to the above bank
                                        account
                                    </p>

                                    <div class="col-12">
                                        <div class="alert alert-warning alert-dismissible fade show my-3"
                                            role="alert">
                                            <div class="d-sm-flex align-items-center mb-3">
                                                <h5 class="alert-heading mb-0">Note: After Payment</h5>
                                            </div>
                                            <p class="mb-2">
                                                once your've made payment to the above bank details, then you should
                                                finalize everything.
                                                To ensure that your order is processed smoothly and promptly, we kindly
                                                ask
                                                you to confirm your booking.
                                            </p>
                                        </div>
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
    @elseif ($booking->booking_status == App\Enums\BookingStatus::CONFIRMED->name)
        <div class="card bg-transparent">
            <!-- Card header -->
            <div class="card-header border-bottom bg-transparent px-0 pt-0">
                <h3 class="card-title mb-0">Submit Review</h3>
            </div>

            <!-- Card body START -->
            <div class="card-body pt-4 p-0">
                <!-- Leave review START -->
                <form class="mb-5" wire:submit.prevent='postReview({{ $booking->room->dormitory->id }})'>
                    <!-- Rating -->
                    <div class="form-control-bg-light mb-3">
                        <select class="form-select" wire:model='rating'>
                            <option >--select star rating --</option>
                            <option value="5">★★★★★ (5/5)</option>
                            <option value="4">★★★★☆ (4/5)</option>
                            <option value="3">★★★☆☆ (3/5)</option>
                            <option value="2">★★☆☆☆ (2/5)</option>
                            <option value="1">★☆☆☆☆ (1/5)</option>
                        </select>
                    </div>
                    <!-- Message -->
                    <div class="form-control-bg-white mb-3">
                        <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Write your review" rows="3" wire:model='comment'></textarea>
                    </div>
                    <!-- Button -->
                    <button type="submit" class="btn btn-lg btn-primary mb-0" wire:loading.attr="disabled">
                        <span wire:loading.remove>
                            Post review
                            <i class="bi fa-fw bi-arrow-right ms-2"></i>
                        </span>
                        <span wire:loading wire:target="postReview({{ $booking->room->dormitory->id }})" class="text-center">
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        </span>
                    </button>
                </form>

            </div>
            <!-- Card body END -->
        </div>
    @endif



</div>
