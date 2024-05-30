<div class="container vstack gap-4">
    <!-- Title START -->
    <div class="row">
        <div class="col-12">
            <h3 class="fs-4 mb-0"><i class="bi bi-house fa-fw me-1"></i>Add amenities to <i
                    class="text-primary">({{ $dorm->dorm_name }})</i>
            </h3>
        </div>
    </div>

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

    <div class="row g-4">
        <div class="col-md-6">
            <div class="card border">
                <div class="card-header border-bottom">
                    <h5 class="card-header-title">Already added amenities</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- Full name -->
                        <div class="col-md-12 mb-3">
                            @forelse ($dorm->amenities as $amenity)
                                <a href="#" class="badge bg-success bg-opacity-10 text-success mb-2"
                                    wire:click='deleteAmenity({{ $amenity->id }})'
                                    wire:confirm="Are you sure you want to delete this amenity?">
                                    <i class="fa-solid fa-check-circle text-an me-2"></i>
                                    {{ $amenity->amenity_name }}
                                </a>&nbsp;
                            @empty
                                <p>No amenities has been added</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-5">
            <div class="card border">
                <div class="card-header border-bottom">
                    <h5 class="card-header-title">Select and add amenity</h5>
                </div>
                <div class="card-body">
                    <form wire:submit.prevent='save'>
                        <div class="row">
                            <!-- Amenities -->
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Amenities</label>
                                <select wire:model='amenityId'
                                    class="form-control @error('amenityId') is-invalid @enderror">
                                    <option>-- select amenities --</option>
                                    @foreach ($amenities as $amenity)
                                        <option value="{{ $amenity->id }}">{{ $amenity->amenity_name }}</option>
                                    @endforeach
                                </select>
                                @error('amenityId')
                                    <span
                                        class="invalid-feedback position-absolute"><small><i>{{ $message }}</i></small></span>
                                @enderror
                            </div>
                        </div>

                        <!-- Save button -->
                        <div class="d-flex justify-content-end mt-4">
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary mb-0 mt-2" wire:loading.attr="disabled">
                                    <span wire:loading.remove>Save</span>
                                    <span wire:loading wire:target="save" class="text-center">
                                        <span class="spinner-border spinner-border-sm" role="status"
                                            aria-hidden="true"></span>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
