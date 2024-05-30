@extends('layouts.main')

@section('contents')

    <!-- ======================= Main banner START -->
    <section class="d-flex align-items-center" style="min-height: 70vh">
        <div class="container mx-auto z-index-9 position-relative">

            <div class="mb-5 row">
                <div class="mx-auto text-center col-xl-8">
                    <h4 class="display-6 mb-0">Find Your Perfect EMU Dorm with Ease</h4>
                    <p class="lead mt-4">
                       Our Dormitory Management System (DMS) streamlines your search for on- and off-campus housing.
                    </p>

                    <!-- Search START -->
                    <div class="col-xl-10 mx-auto mt-3">
                        <a class="btn btn-lg btn-primary mb-0" href="{{ route('explore') }}">Explore Dormitories Now</a>
                    </div>
                    <!-- Search END -->
                </div>
            </div> <!-- Row END -->
        </div>
    </section>
    <!-- ======================= Main banner START -->

@endsection
