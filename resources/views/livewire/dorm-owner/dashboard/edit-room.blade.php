<div class="container vstack gap-4">
    <!-- Title START -->
    <div class="row">
        <div class="col-12">
            <h3 class="fs-4 mb-0"><i class="bi bi-house fa-fw me-1"></i>Edit Room <i>({{ $room->room_name }})</i></h3>
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
                    <h5 class="card-header-title">Enter Room Details</h5>
                </div>
                <div class="card-body">
                    <form wire:submit.prevent='updateRoom'>
                        <div class="row">
                            <!-- Full name -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Room Name/Number</label>
                                <input type="text" class="form-control @error('roomName') is-invalid @enderror"
                                    placeholder="e.g room 23" wire:model='roomName' />
                                @error('roomName')
                                    <span
                                        class="invalid-feedback position-absolute"><small><i>{{ $message }}</i></small></span>
                                @enderror
                            </div>
                            <!-- Dorm type -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">type</label>
                                <select wire:model='roomType'
                                    class="form-control @error('roomType') is-invalid @enderror">
                                    <option value="">-- select room type --</option>
                                    @foreach (App\Enums\RoomType::cases() as $case)
                                        <option value="{{ $case->name }}">{{ Str::ucfirst($case->value) }}</option>
                                    @endforeach
                                </select>
                                @error('roomType')
                                    <span
                                        class="invalid-feedback position-absolute"><small><i>{{ $message }}</i></small></span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-4">
                            <!-- room capacity -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Capacity</label>
                                <input type="number" class="form-control @error('capacity') is-invalid @enderror"
                                    placeholder="e.g 2" wire:model='capacity' />
                                @error('capacity')
                                    <span
                                        class="invalid-feedback position-absolute"><small><i>{{ $message }}</i></small></span>
                                @enderror
                            </div>
                            <!-- room price -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">price</label>
                                <input type="number" class="form-control @error('price') is-invalid @enderror"
                                    placeholder="e.g 5000" wire:model='price' />
                                @error('price')
                                    <span
                                        class="invalid-feedback position-absolute"><small><i>{{ $message }}</i></small></span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Virtual tour URL (optional)</label>
                                <input type="text" class="form-control" placeholder="e.g. https://my.matterport.com/show/?m=Uoxs7zXDUZq" wire:model='vtu' />
                            </div>
                        </div>

                        <!-- room picture -->
                        <div class="mb-3 mt-4">
                            <label class="form-label">Room Pictures</label>
                            <div class="align-items-center">
                                @if ($roomPictures)
                                    <label class="position-relative me-4 d-flex" for="uploadfile-1" title="dorm image">
                                        @foreach ($newRoomPictures as $roomPicture)
                                            <span class="avatar avatar-xxxl">
                                                <img id="uploadfile-1-preview"
                                                    class="avatar-img rounded border border-white border-3 shadow"
                                                    src="{{ $roomPicture->temporaryUrl() }}" alt="" />
                                            </span>
                                        @endforeach
                                    </label>
                                @endif

                                <input id="uploadfile-1" class="form-control @error('newRoomPictures') is-invalid @enderror"
                                    wire:model='newRoomPictures' type="file" multiple />
                                @error('newRoomPictures.*')
                                    <br><span class="invalid-feedback"><small><i>{{ $message }}</i></small></span>
                                @enderror
                            </div>
                            <label class="form-label mt-4">Current Room Pictures</label>
                            <div class="align-items-center">
                                @if ($roomPictures)
                                    <label class="position-relative me-4" for="uploadfile-1" title="dorm image">
                                        @foreach ($roomPictures as $roomPicture)
                                            <span class="avatar avatar-xxxl">
                                                <img id="uploadfile-1-preview"
                                                    class="avatar-img rounded border border-white border-3 shadow"
                                                    src="{{ $roomPicture }}" alt="" />
                                            </span>
                                        @endforeach
                                    </label>
                                @endif
                            </div>
                        </div>

                        <!-- Save button -->
                        <div class="d-flex justify-content-end mt-4">
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary mb-0 mt-2" wire:loading.attr="disabled">
                                    <span wire:loading.remove>Update</span>
                                    <span wire:loading wire:target="updateRoom" class="text-center">
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
        {{-- <div class="col-md-6">

            <div class="card bg-transparent p-0">
                <!-- Card header -->
                <div
                    class="card-header bg-transparent border-bottom d-sm-flex justify-content-sm-between align-items-center p-0 pb-3">
                    <h4 class="mb-2 mb-sm-0">Rooms</h4>
                </div>
                @forelse ($dorm->rooms as $room)
                    <div class="card-body pt-4 p-0">
                        <div class="vstack gap-4">

                            <!-- Room item START -->
                            <div class="card shadow p-3">
                                <div class="row g-4">
                                    <!-- Card img -->
                                    <div class="col-md-4 position-relative">
                                        <div
                                            class="tiny-slider arrow-round arrow-xs arrow-dark overflow-hidden rounded-2">
                                            <div class="tiny-slider-inner" data-autoplay="true" data-arrow="true"
                                                data-dots="false" data-items="1">
                                                @foreach ($room->room_pictures as $roomPicture)
                                                    <div><img src="{{ $roomPicture }}" alt=""
                                                            class="img-fluid"
                                                            style="height: 150px; width: auto; object-fit: contain;">
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                       <!-- Button -->
                                        <a href="{{ $room->virtual_tour_url ?? 'https://my.matterport.com/show/?m=Uoxs7zXDUZq' }}" target="_blank" class="btn btn-link text-decoration-underline p-0 mb-0 mt-1"><i class="bi bi-eye-fill me-1"></i>Virtual tour</a>
                                    </div>

                                    <div class="col-md-7">
                                        <div class="card-body d-flex flex-column h-100 p-0">

                                            <h5 class="card-title text-primary">{{ $room->room_name }}</h5>

                                            <!-- Amenities -->
                                            <ul class="nav nav-divider mb-2">
                                                <li class="nav-item"><i
                                                        class="fa-regular fa-square me-1"></i>capacity:
                                                    {{ $room->capacity }}</li>
                                                <li class="nav-item"><i
                                                        class="fa-solid fa-bed me-1"></i>{{ strtolower($room->room_type) }}
                                                    room</li>
                                            </ul>

                                            <p class="text-success mb-0">{{ $room->availability }}</p>

                                            <!-- Price and Button -->
                                            <div
                                                class="d-sm-flex justify-content-sm-between align-items-center mt-auto">
                                                <div class="d-flex align-items-center">
                                                    <h5 class="fw-bold mb-0 me-1">${{ $room->price }}</h5>
                                                    <span class="mb-0 me-2">/per year</span>
                                                </div>
                                                <div class="mt-3 mt-sm-0">
                                                    <a href="#" class="btn btn-sm btn-info mb-0"
                                                        wire:click='editRoom'
                                                        wire:confirm="Are you sure you want to Edit this room? any booking rolated to this room will be edit also.">
                                                        Edit
                                                    </a>
                                                    <a href="#" class="btn btn-sm btn-danger mb-0"
                                                        wire:click='deleteRoom({{ $room->id }})'
                                                        wire:confirm="Are you sure you want to delete this room? any booking rolated to this room will be deleted also.">
                                                        Delete
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Room item END -->

                        </div>
                    </div>
                @empty
                @endforelse
                <!-- Card body END -->
            </div>

        </div> --}}
    </div>

</div>

