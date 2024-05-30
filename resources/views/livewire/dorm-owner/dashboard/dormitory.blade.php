<div class="container vstack gap-4">
    <!-- Title START -->
    <div class="row">
        <div class="col-12">
            <h1 class="fs-4 mb-0"><i class="bi bi-journals fa-fw me-1"></i>Dormitories</h1>
        </div>
    </div>
    <!-- Title END -->
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    @if (session()->has('error_message'))
        <div class="alert alert-danger">
            {{ session('error_message') }}
        </div>
    @endif

    <!-- Listing table START -->
    <div class="row">
        <div class="col-12">

            <div class="card border">
                <!-- Card header -->
                <div class="card-header border-bottom">
                    <h5 class="card-header-title">Current Dormitory List <span
                            class="badge bg-primary bg-opacity-10 text-primary ms-2">{{ $dormitories->count() }} Items</span></h5>
                </div>

                <!-- Card body START -->
                <div class="card-body vstack gap-3">
                    @forelse ($dormitories as $dormitory)
                    <!-- Listing item START -->
                    <div class="card border p-2">
                        <div class="row g-4">
                            <!-- Card img -->
                            <div class="col-md-3 col-lg-1">
                                <img src="{{ $dormitory->main_image }}" class="card-img rounded-2"
                                    alt="Card image">
                            </div>

                            <!-- Card body -->
                            <div class="col-md-9 col-lg-10">
                                <div class="card-body position-relative d-flex flex-column p-0 h-100">
                                    <!-- Title -->
                                    <h5 class="card-title mb-0 me-5"><a href="{{ route('dorm-owner.single-dorm', $dormitory->slug) }}" target="_blank">{{ $dormitory->dorm_name }}</a></h5>
                                    <small>
                                        <i class="bi bi-geo-alt me-2"></i>
                                        {{ Str::of($dormitory->street_address)->limit(20) }} | {{ $dormitory->regin }}, {{ $dormitory->city }}
                                    </small>

                                    <!-- Price and Button -->
                                    <div
                                        class="d-sm-flex justify-content-sm-between align-items-center mt-3 mt-md-auto">
                                        <!-- Button -->
                                        <div class="d-flex align-items-center">
                                            <h5 class="fw-bold mb-0 me-1"><small>{{ strtolower(str_replace('_', ' ', $dormitory->dorm_type)) }}</small> | </h5>
                                            <span class="mb-0 me-2 {{ $this->statusCode($dormitory->status) }}">Status: {{ strtolower($dormitory->status) }}</span>
                                        </div>
                                        <!-- Price -->
                                        <div class="hstack gap-2 mt-3 mt-sm-0">
                                            <a href="{{ route('dorm-owner.add-room', $dormitory->id) }}" class="btn btn-sm btn-success mb-0" wire:navigate>
                                                <i class="bi bi-building-add fa-fw me-1"></i>Manage Rooms
                                            </a>
                                            <a href="{{ route('dorm-owner.add-amenity', $dormitory->id) }}" class="btn btn-sm btn-info mb-0">
                                                <i class="bi bi-node-plus fa-fw me-1"></i>Amenity
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Listing item END -->
                    @empty

                    @endforelse
                    {{ $dormitories->links() }}
                </div>
                <!-- Card body END -->
            </div>
        </div>
    </div>
    <!-- Listing table END -->

</div>
