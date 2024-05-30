<div class="container vstack gap-4">
    <!-- Title START -->
    <div class="row">
        <div class="col-12 mt-4">
            <h6 class="mb-0"><i class="bi bi-house-door fa-fw me-1"></i>Dashboard</h6>
        </div>
    </div>
    <!-- Title END -->

    <livewire:student.auth.verify-email />

    <div class="bg-light rounded">
        <!-- Progress bar -->
        @php
            $completionPercentage = auth()->user()->profileCompletion();
        @endphp

        <div class="overflow-hidden">
        @if ($completionPercentage < 100)
        <h6>Complete Your Profile</h6>
        @else
            <h6>Your Profile is Complete!</h6>
        @endif
        <div class="progress progress-sm bg-success bg-opacity-10">
            <div class="progress-bar bg-success aos" role="progressbar" data-aos="slide-right" data-aos-delay="200"
                data-aos-duration="1000" data-aos-easing="ease-in-out" style="width: {{ $completionPercentage }}%"
                aria-valuenow="{{ $completionPercentage }}" aria-valuemin="0" aria-valuemax="100">
                <span class="progress-percent-simple h6 fw-light ms-auto">{{ $completionPercentage }}%</span>
            </div>
        </div>

        @if ($completionPercentage < 100)
            <p class="mb-0 mt-3">Please complete your student profile information to enjoy the best of the platform.
                <a href="{{ route('student.setting') }}">Click here to start</a></p>
        @else
            <p class="mb-0 mt-3">Your profile is complete! Thank you for providing all the necessary information. <a
                    href="{{ route('student.setting') }}">View or update your profile</a></p>
        @endif
    </div>

    <div class="alert alert-success alert-dismissible fade show my-3" role="alert">
        <!-- Title -->
        <div class="d-sm-flex align-items-center mb-3">
            <h5 class="alert-heading mb-0">👋🏽 Welcome {{ Auth::user()->first_name }}</h5>
        </div>

        <!-- Content -->
        <p class="mb-2">What woud you like to do? search for domitories, Compare dormitory prices, looking for roomies,
            etc</p>

    </div>

    <!-- Counter START -->
    <div class="row g-4">

        <!-- Earning item -->
        <div class="col-md-6 col-xl-6">
            <div class="card card-body border p-4 h-100">
                <h6 class="text-success">Explore Dormitories</h6>
                <small class="mb-2">Search & book a dorm with ease</small>
                <div class="mt-auto text-primary-hover"><a href="{{ route('explore') }}"
                        class="text-decoration-underline p-0 mb-0">Click here to procced</a></div>
            </div>
        </div>

        <!-- Booked Rooms item -->
        <div class="col-md-6 col-xl-6">
            <div class="card card-body border p-4 h-100">
                <h6 class="text-info">Student Forum</h6>
                <small class="mb-2">Quickly get a room mate on forum</small>
                <div class="mt-auto text-primary-hover"><a href="{{ route('student.forum') }}"
                        class="text-decoration-underline p-0 mb-0">Click here to procced</a></div>
            </div>
        </div>

    </div>

</div>
