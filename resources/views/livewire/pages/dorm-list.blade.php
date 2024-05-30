<div class="col-xl-8 col-xxl-9">
                    <div class="vstack gap-4">
                        @foreach ($ActiveDormitories as $activeDorm)
                            <!-- Card item START -->
                        <div class="card shadow p-2">
                            <div class="row g-0">
                                <!-- Card img -->
                                <div class="col-md-5">
                                    <img src="{{ asset(Storage::url($activeDorm->main_image)) }}" class="card-img rounded-2"
                                        alt="Card image">
                                </div>

                                <!-- Card body -->
                                <div class="col-md-7">
                                    <div class="card-body py-md-2 d-flex flex-column h-100 position-relative">

                                        <!-- Rating and buttons -->
                                        <div class="d-flex justify-content-between align-items-center">
                                            <ul class="list-inline mb-0">
                                                <li class="list-inline-item me-0 small"><i
                                                        class="fa-solid fa-star text-warning"></i></li>
                                                <li class="list-inline-item me-0 small"><i
                                                        class="fa-solid fa-star text-warning"></i></li>
                                                <li class="list-inline-item me-0 small"><i
                                                        class="fa-solid fa-star text-warning"></i></li>
                                                <li class="list-inline-item me-0 small"><i
                                                        class="fa-solid fa-star text-warning"></i></li>
                                                <li class="list-inline-item me-0 small"><i
                                                        class="fa-solid fa-star-half-alt text-warning"></i></li>
                                            </ul>

                                            <ul class="list-inline mb-0 z-index-2">
                                                <!-- Heart icon -->
                                                <li class="list-inline-item">
                                                    <a href="#" class="btn btn-sm btn-round btn-light"><i
                                                            class="fa-solid fa-fw fa-heart"></i></a>
                                                </li>
                                                <!-- Share icon -->
                                                <li class="list-inline-item dropdown">
                                                    <!-- Share button -->
                                                    <a href="#" class="btn btn-sm btn-round btn-light"
                                                        role="button" id="dropdownShare3" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        <i class="fa-solid fa-fw fa-share-alt"></i>
                                                    </a>
                                                    <!-- dropdown button -->
                                                    <ul class="dropdown-menu dropdown-menu-end min-w-auto shadow rounded"
                                                        aria-labelledby="dropdownShare3">
                                                        <li><a class="dropdown-item" href="#"><i
                                                                    class="fab fa-twitter-square me-2"></i>Twitter</a></li>
                                                        <li><a class="dropdown-item" href="#"><i
                                                                    class="fab fa-facebook-square me-2"></i>Facebook</a>
                                                        </li>
                                                        <li><a class="dropdown-item" href="#"><i
                                                                    class="fab fa-linkedin me-2"></i>LinkedIn</a></li>
                                                        <li><a class="dropdown-item" href="#"><i
                                                                    class="fa-solid fa-copy me-2"></i>Copy link</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>

                                        <!-- Title -->
                                        <h5 class="card-title mb-1"><a href="hotel-detail.html">Royal Beach Resort</a>
                                        </h5>
                                        <small><i class="bi bi-geo-alt me-2"></i>south campus, famagusta</small>
                                        <!-- Amenities -->
                                        <ul class="nav nav-divider mt-3">
                                            <li class="nav-item">Air Conditioning</li>
                                            <li class="nav-item">Wifi</li>
                                            <li class="nav-item">Kitchen</li>

                                            <li class="nav-item"><a href="#" class="mb-0 text-primary">More+</a>
                                            </li>
                                        </ul>



                                        <!-- Price and Button -->
                                        <div
                                            class="d-sm-flex justify-content-sm-between align-items-center mt-3 mt-md-auto">
                                            <!-- Button -->
                                            <div class="d-flex align-items-center">
                                                <h5 class="fw-bold mb-0 me-1">$3500</h5>

                                            </div>
                                            <!-- Price -->
                                            <div class="mt-3 mt-sm-0">
                                                <a href="hotel-detail.html" class="btn btn-sm btn-dark mb-0 w-100">Select
                                                    Room</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Card item END -->
                        @endforeach
                        <!-- Card item START -->
                        {{-- <div class="card shadow p-2">
                            <div class="row g-0">
                                <!-- Card img -->
                                <div class="col-md-5">
                                    <img src="assets/images/category/hotel/4by3/10.jpg" class="card-img rounded-2"
                                        alt="Card image">
                                </div>

                                <!-- Card body -->
                                <div class="col-md-7">
                                    <div class="card-body py-md-2 d-flex flex-column h-100">

                                        <!-- Rating and buttons -->
                                        <div class="d-flex justify-content-between align-items-center">
                                            <ul class="list-inline mb-0">
                                                <li class="list-inline-item me-0 small"><i
                                                        class="fa-solid fa-star text-warning"></i></li>
                                                <li class="list-inline-item me-0 small"><i
                                                        class="fa-solid fa-star text-warning"></i></li>
                                                <li class="list-inline-item me-0 small"><i
                                                        class="fa-solid fa-star text-warning"></i></li>
                                                <li class="list-inline-item me-0 small"><i
                                                        class="fa-solid fa-star text-warning"></i></li>
                                                <li class="list-inline-item me-0 small"><i
                                                        class="fa-solid fa-star-half-alt text-warning"></i></li>
                                            </ul>

                                            <ul class="list-inline mb-0 z-index-2">
                                                <!-- Heart icon -->
                                                <li class="list-inline-item">
                                                    <a href="#" class="btn btn-sm btn-round btn-light"><i
                                                            class="fa-solid fa-fw fa-heart"></i></a>
                                                </li>
                                                <!-- Share icon -->
                                                <li class="list-inline-item dropdown">
                                                    <!-- Share button -->
                                                    <a href="#" class="btn btn-sm btn-round btn-light"
                                                        role="button" id="dropdownShare2" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        <i class="fa-solid fa-fw fa-share-alt"></i>
                                                    </a>
                                                    <!-- dropdown button -->
                                                    <ul class="dropdown-menu dropdown-menu-end min-w-auto shadow rounded"
                                                        aria-labelledby="dropdownShare2">
                                                        <li><a class="dropdown-item" href="#"><i
                                                                    class="fab fa-twitter-square me-2"></i>Twitter</a></li>
                                                        <li><a class="dropdown-item" href="#"><i
                                                                    class="fab fa-facebook-square me-2"></i>Facebook</a>
                                                        </li>
                                                        <li><a class="dropdown-item" href="#"><i
                                                                    class="fab fa-linkedin me-2"></i>LinkedIn</a></li>
                                                        <li><a class="dropdown-item" href="#"><i
                                                                    class="fa-solid fa-copy me-2"></i>Copy link</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>

                                        <!-- Title -->
                                        <h5 class="card-title mb-1"><a href="hotel-detail.html">Ramen</a></h5>
                                        <small><i class="bi bi-geo-alt me-2"></i>on campus,famagusta</small>
                                        <!-- Amenities -->
                                        <ul class="nav nav-divider mt-3">
                                            <li class="nav-item">Air Conditioning</li>
                                            <li class="nav-item">Wifi</li>
                                            <li class="nav-item">Kitchen</li>

                                        </ul>

                                        <!-- List -->
                                        <ul class="list-group list-group-borderless small mb-0 mt-2">
                                            <li class="list-group-item d-flex text-danger p-0">
                                                <i class="bi bi-patch-check-fill me-2"></i>Non Refundable
                                            </li>
                                        </ul>

                                        <!-- Price and Button -->
                                        <div
                                            class="d-sm-flex justify-content-sm-between align-items-center mt-3 mt-md-auto">
                                            <!-- Button -->
                                            <div class="d-flex align-items-center">
                                                <h5 class="fw-bold mb-0 me-1">$3000</h5>

                                            </div>
                                            <!-- Price -->
                                            <div class="mt-3 mt-sm-0">
                                                <a href="{{ route('explore.single-dorm') }}"
                                                    class="btn btn-sm btn-dark mb-0 w-100">
                                                    See Details
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        <!-- Card item END -->



                        <!-- Card item START -->
                        {{-- <div class="card shadow p-2">
                            <div class="row g-0">
                                <!-- Card img -->
                                <div class="col-md-5">
                                    <img src="assets/images/category/hotel/4by3/10.jpg" class="card-img rounded-2"
                                        alt="Card image">
                                </div>

                                <!-- Card body -->
                                <div class="col-md-7">
                                    <div class="card-body py-md-2 d-flex flex-column h-100 position-relative">

                                        <!-- Rating and buttons -->
                                        <div class="d-flex justify-content-between align-items-center">
                                            <ul class="list-inline mb-0">
                                                <li class="list-inline-item me-0 small"><i
                                                        class="fa-solid fa-star text-warning"></i></li>
                                                <li class="list-inline-item me-0 small"><i
                                                        class="fa-solid fa-star text-warning"></i></li>
                                                <li class="list-inline-item me-0 small"><i
                                                        class="fa-solid fa-star text-warning"></i></li>
                                                <li class="list-inline-item me-0 small"><i
                                                        class="fa-solid fa-star text-warning"></i></li>
                                                <li class="list-inline-item me-0 small"><i
                                                        class="fa-solid fa-star-half-alt text-warning"></i></li>
                                            </ul>

                                            <ul class="list-inline mb-0 z-index-2">
                                                <!-- Heart icon -->
                                                <li class="list-inline-item">
                                                    <a href="#" class="btn btn-sm btn-round btn-light"><i
                                                            class="fa-solid fa-fw fa-heart"></i></a>
                                                </li>
                                                <!-- Share icon -->
                                                <li class="list-inline-item dropdown">
                                                    <!-- Share button -->
                                                    <a href="#" class="btn btn-sm btn-round btn-light"
                                                        role="button" id="dropdownShare5" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        <i class="fa-solid fa-fw fa-share-alt"></i>
                                                    </a>
                                                    <!-- dropdown button -->
                                                    <ul class="dropdown-menu dropdown-menu-end min-w-auto shadow rounded"
                                                        aria-labelledby="dropdownShare5">
                                                        <li><a class="dropdown-item" href="#"><i
                                                                    class="fab fa-twitter-square me-2"></i>Twitter</a></li>
                                                        <li><a class="dropdown-item" href="#"><i
                                                                    class="fab fa-facebook-square me-2"></i>Facebook</a>
                                                        </li>
                                                        <li><a class="dropdown-item" href="#"><i
                                                                    class="fab fa-linkedin me-2"></i>LinkedIn</a></li>
                                                        <li><a class="dropdown-item" href="#"><i
                                                                    class="fa-solid fa-copy me-2"></i>Copy link</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>

                                        <!-- Title -->
                                        <h5 class="card-title mb-1"><a href="hotel-detail.html">Prime Living</a>
                                        </h5>
                                        <small><i class="bi bi-geo-alt me-2"></i>On campus</small>
                                        <!-- Amenities -->
                                        <ul class="nav nav-divider mt-3">
                                            <li class="nav-item">Air Conditioning</li>
                                            <li class="nav-item">Wifi</li>
                                            <li class="nav-item">Kitchen</li>

                                        </ul>

                                        <!-- List -->
                                        <ul class="list-group list-group-borderless small mb-0 mt-2">
                                            <li class="list-group-item d-flex text-danger p-0">
                                                <i class="bi bi-patch-check-fill me-2"></i>Non Refundable
                                            </li>
                                        </ul>

                                        <!-- Price and Button -->
                                        <div
                                            class="d-sm-flex justify-content-sm-between align-items-center mt-3 mt-md-auto">
                                            <!-- Button -->
                                            <div class="d-flex align-items-center">
                                                <h5 class="fw-bold mb-0 me-1">$4000</h5>

                                            </div>
                                            <!-- Price -->
                                            <div class="mt-3 mt-sm-0">
                                                <a href="#" class="btn btn-sm btn-dark mb-0 w-100">Select Room</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        <!-- Card item END -->

                        <!-- Pagination -->
                        <nav class="d-flex justify-content-center" aria-label="navigation">
                            <ul class="pagination pagination-primary-soft d-inline-block d-md-flex rounded mb-0">
                                <li class="page-item mb-0"><a class="page-link" href="#" tabindex="-1"><i
                                            class="bi bi-caret-left"></i></a></li>
                                <li class="page-item mb-0"><a class="page-link" href="#">1</a></li>
                                <li class="page-item mb-0 active"><a class="page-link" href="#">2</a></li>
                                <li class="page-item mb-0"><a class="page-link" href="#">..</a></li>
                                <li class="page-item mb-0"><a class="page-link" href="#">6</a></li>
                                <li class="page-item mb-0"><a class="page-link" href="#"><i
                                            class="bi bi-caret-right"></i></a></li>
                            </ul>
                        </nav>

                    </div>
                </div>
