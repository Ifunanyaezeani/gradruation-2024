<div class="container vstack gap-4">
    <!-- Title START -->
    <div class="row">
        <div class="col-12">
            <h1 class="fs-4 mb-0"><i class="bi bi-house-door fa-fw me-1"></i>Dashboard</h1>
        </div>
    </div>
    <!-- Title END -->

    <!-- Counter START -->
    <div class="row g-4">

        <!-- Earning item -->
        <div class="col-md-6 col-xl-4">
            <div class="card card-body border p-4">
                <h6>
                    Total Dormitories
                </h6>
                <h2 class="text-success">{{ $totalDorm }}</h2>
            </div>
        </div>

        <!-- Booked Rooms item -->
        <div class="col-md-6 col-xl-4">
            <div class="card card-body border p-4 h-100">
                <h6>Total Rooms</h6>
                <h2 class="text-info">{{ $totalRooms }}</h2>
            </div>
        </div>

        <!-- Available Rooms item -->
        <div class="col-md-6 col-xl-4">
            <div class="card card-body border p-4 h-100">
                <h6>Available Rooms</h6>
                <h2 class="text-warning">{{ $availableRooms }}</h2>
            </div>
        </div>

    </div>
    <!-- Counter END -->

    <!-- Booking table START -->
    <div class="row">
        <div class="col-12">
            <div class="card border rounded-3">
                <!-- Card header START -->
                <div class="card-header border-bottom">
                    <div class="d-sm-flex justify-content-between align-items-center">
                        <h5 class="mb-2 mb-sm-0">Booked dormitories</h5>
                    </div>
                </div>
                <!-- Card header END -->

                <!-- Card body START -->
                <div class="card-body">
                    {{-- <!-- Search and select START -->
                    <div class="row g-3 align-items-center justify-content-between mb-3">
                        <!-- Search -->
                        <div class="col-md-8">
                            <form class="rounded position-relative">
                                <input class="form-control pe-5" type="search" placeholder="Search"
                                    aria-label="Search">
                                <button class="btn border-0 px-3 py-0 position-absolute top-50 end-0 translate-middle-y"
                                    type="submit"><i class="fas fa-search fs-6"></i></button>
                            </form>
                        </div>
                    </div> --}}
                    <!-- Search and select END -->

                    <!-- Hotel room list START -->
                    <div class="table-responsive border-0">
                        <table class="table align-middle p-4 mb-0 table-hover table-shrink">
                            <!-- Table head -->
                            <thead class="table-light">
                                <tr>
                                    <th scope="col" class="border-0 rounded-start">#</th>
                                    <th scope="col" class="border-0">Dorm name</th>
                                    <th scope="col" class="border-0 rounded-end">Action</th>
                                </tr>
                            </thead>

                            <!-- Table body START -->
                            <tbody class="border-top-0">
                                <!-- Table item -->
                                @foreach ($bookedDormitories as $dorm)
                                    <tr>
                                        <td>
                                            <h6 class="mb-0">{{ $dorm->id }}</h6>
                                        </td>
                                        <td>
                                            <h6 class="mb-0"><a href="#">{{ $dorm->dorm_name }}</a></h6>
                                        </td>
                                        <td> <a href="{{ route('dorm-owner.single-dorm', $dorm->slug) }}" target="_blank" class="btn btn-sm btn-light mb-0">View</a> </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <!-- Table body END -->
                        </table>
                    </div>
                    <!-- Hotel room list END -->
                </div>
                <!-- Card body END -->
            </div>
        </div>
    </div>
    <!-- Booking table END -->
</div>
