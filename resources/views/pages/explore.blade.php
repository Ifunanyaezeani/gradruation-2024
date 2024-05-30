@extends('layouts.main')

@section('contents')
    <section class="pt-0">
        <div class="container">
            <!-- Background image -->
            <div class="rounded-3 p-3 p-sm-5 bg-secondary">
                <!-- Banner title -->
                <div class="row my-2 my-xl-5 mb-3">
                    <div class="col-md-8 mx-auto">
                        <h1 class="text-center text-white">Explore Dormitries from EMU</h1>
                    </div>
                </div>
            </div>
            <!-- Offcanvas button for search -->
            <button class="btn btn-primary d-sm-none w-100 mb-0 mt-4" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasEditsearch" aria-controls="offcanvasEditsearch"><i
                    class="bi bi-search me-2"></i>Search Now</button>

            <!-- Search with offcanvas START -->
            <div class="offcanvas-sm offcanvas-top" tabindex="-1" id="offcanvasEditsearch"
                aria-labelledby="offcanvasEditsearchLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasEditsearchLabel">Search</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                        data-bs-target="#offcanvasEditsearch" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body p-2">
                    <div class="bg-light p-4 rounded w-100">
                        <form class="row g-4" action="{{ route('explore') }}" method="GET">
                            <!-- Check in -->
                            <div class="col">
                                <div class="form-control-border form-control-transparent form-fs-md">
                                    <label class="form-label">Search dormitories</label>
                                    <input type="text" class="form-control flatpickr" name="query" data-mode="range"
                                        placeholder="Search by name or location">
                                </div>
                            </div>

                            <!-- Button -->
                            <div class="col-md-6 col-lg-2 mt-md-auto">
                                <button type="submit" class="btn btn-lg btn-primary w-100 mb-0" href="#">
                                    Search <i class="bi bi-search fa-fw"></i>
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <section class="pt-0">
        <div class="container">

            <div class="row mb-4">
                <div class="col-12">
                    <div class="hstack gap-3 justify-content-between justify-content-md-end">
                        <button class="btn btn-primary-soft btn-primary-check mb-0 d-xl-none" type="button"
                            data-bs-toggle="offcanvas" data-bs-target="#offcanvasSidebar" aria-controls="offcanvasSidebar">
                            <i class="bi bi-funnel me-1"></i>filters
                        </button>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Left sidebar START -->
                <aside class="col-xl-4 col-xxl-3">
                    <!-- Responsive offcanvas body START -->
                    <div class="offcanvas-xl offcanvas-end" tabindex="-1" id="offcanvasSidebar"
                        aria-labelledby="offcanvasSidebarLabel">
                        <div class="offcanvas-header">
                            <h5 class="offcanvas-title" id="offcanvasSidebarLabel">Advance Filters</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                data-bs-target="#offcanvasSidebar" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('explore') }}" method="get">
                            <div class="offcanvas-body flex-column p-3 p-xl-0">
                                <div class="rounded-3 shadow">
                                    <!--  type START -->
                                    <div class="card card-body rounded-0 rounded-top p-4">
                                        <!-- Title -->
                                        <h6 class="mb-2">Dormitroy Type</h6>
                                        <div class="col-12">
                                            <!-- Checkbox -->
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="dorm_type[]"
                                                    value="all" id="Type1"
                                                    {{ in_array('all', request('dorm_type', [])) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="Type1">All</label>
                                            </div>
                                            <!-- Checkbox -->
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="dorm_type[]"
                                                    value="{{ App\Enums\DormType::ON_CAMPUS->name }}" id="Type2"
                                                    {{ in_array(App\Enums\DormType::ON_CAMPUS->name, request('dorm_type', [])) ? 'checked' : '' }}>
                                                <label class="form-check-label"
                                                    for="Type2">{{ App\Enums\DormType::ON_CAMPUS->value }}</label>
                                            </div>
                                            <!-- Checkbox -->
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="dorm_type[]"
                                                    value="{{ App\Enums\DormType::OFF_CAMPUS->name }}" id="Type3"
                                                    {{ in_array(App\Enums\DormType::OFF_CAMPUS->name, request('dorm_type', [])) ? 'checked' : '' }}>
                                                <label class="form-check-label"
                                                    for="Type3">{{ App\Enums\DormType::OFF_CAMPUS->value }}</label>
                                            </div>
                                        </div>

                                    </div>
                                    <!--  type END -->

                                    <hr class="my-0"> <!-- Divider -->

                                    <!-- Amenities START -->
                                    <div class="card card-body rounded-0 rounded-bottom p-4">
                                        <!-- Title -->
                                        <h6 class="mb-2">Amenities</h6>
                                        <!-- Amenities group -->
                                        <div class="col-12">
                                            <!-- Checkbox -->
                                            @foreach ($amenities as $amenity)
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="amenitiesType1">
                                                    <label class="form-check-label"
                                                        for="amenitiesType1">{{ $amenity->amenity_name }}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <!-- Amenities END -->
                                </div>
                            </div>
                            <!-- Buttons -->
                            <div class="d-flex justify-content-between p-2 p-xl-0 mt-xl-4">
                                <button class="btn btn-link p-0 mb-0">Clear all</button>
                                <button type="submit" class="btn btn-primary mb-0">Filter Result</button>
                            </div>
                        </form>

                    </div>
                    <!-- Responsive offcanvas body END -->
                </aside>
                <!-- Left sidebar END -->

                <!-- Main content START -->
                <div class="col-xl-8 col-xxl-9">
                    <div class="g-4 row">
                        @foreach ($ActiveDormitories as $activeDorm)
                            <div class="col-md-4">
                                <div class="card shadow p-2 pb-0 h-100">

                                    <img src="{{ $activeDorm->main_image }}" class="img-fluid rounded-2" alt="Card image"
                                        style="width: auto;">

                                    <!-- Card body START -->
                                    <div class="card-body px-3 pb-0">
                                        <h5 class="card-title"><a
                                                href="{{ route('explore.single-dorm', $activeDorm->slug) }}">{{ $activeDorm->dorm_name }}</a>
                                        </h5>

                                        <ul class="nav nav-divider mb-2 mb-sm-3">
                                            @if ($activeDorm->amenities->count() >= 1)
                                                <li class="nav-item"><small><b>With: </b>
                                                        {{ $activeDorm->amenities[0]->amenity_name }}</small></li>
                                                <li class="nav-item">
                                                    <small>and more ...</small></li>
                                            @endif

                                        </ul>
                                    </div>
                                    <span class="mx-5 mb-4 badge text-bg-info">{{ strtolower(str_replace('_', ' ', $activeDorm->dorm_type)) }} Dormitory</span>
                                    <!-- Card body END -->
                                    <div class="card-footer pt-0">
                                        {{-- <div class="d-sm-flex justify-content-sm-between align-items-center"> --}}
                                            <div class="mt-2 mt-sm-0">
                                                <a href="{{ route('explore.single-dorm', $activeDorm->slug) }}"
                                                    class="btn btn-sm btn-block btn-primary-soft mb-0 w-100">View Detail<i
                                                        class="bi bi-arrow-right ms-2"></i></a>
                                            </div>
                                        {{-- </div> --}}
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <!-- Pagination -->
                        {{ $ActiveDormitories->links() }}

                    </div>
                </div>

                <!-- Main content END -->
            </div> <!-- Row END -->
        </div>
    </section>
@endsection
