<div class="page-content-wrapper p-xxl-4 bg-transparent">

    <!-- Title -->
    <div class="row">
        <div class="col-12 mb-4 mb-sm-5">
            <div class="d-sm-flex justify-content-between align-items-center">
                <h1 class="h3 mb-3 mb-sm-0">System Setting</h1>
            </div>
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

    <div class="row g-3 align-items-center justify-content-between mb-5">
        <div class="col-md-12">
            <ul class="nav nav-tabs nav-bottom-line mb-3">
                <li class="nav-item"> <a class="nav-link active" data-bs-toggle="tab" href="#profile-t"> Profile </a>
                </li>
                <li class="nav-item"> <a class="nav-link" data-bs-toggle="tab" href="#tab-3-2"> Admins </a> </li>
                <li class="nav-item"> <a class="nav-link" data-bs-toggle="tab" href="#tab-3-3"> Dormitory </a> </li>
            </ul>
            <div class="tab-content">


                {{-- //
                ************************************************************************************************************
                //
                //
                ************************************************************************************************************
                //
                // //
                //
                ************************************************************************************************************
                //
                //
                ************************************************************************************************************
                // --}}
                <div class="tab-pane show active" id="profile-t">
                    <div class="row g-4">
                        <!-- Edit profile START -->
                        <div class="col-md-7">
                            <div class="card border">
                                <div class="card-header border-bottom">
                                    <h5 class="card-header-title">Edit Profile</h5>
                                </div>
                                <form class="card-body" wire:submit.prevent='saveProfile'>
                                    <!-- Profile picture -->
                                    <div class="mb-3">
                                        <label class="form-label">Profile picture</label>
                                        <!-- Avatar upload START -->
                                        <div class="d-flex align-items-center">
                                            <label class="position-relative me-4" for="uploadfile-1"
                                                title="Replace this pic">
                                                <!-- Avatar place holder -->
                                                <span class="avatar avatar-xl">
                                                    @if ($profilePicture)
                                                        <img id="uploadfile-1-preview"
                                                            class="avatar-img rounded-circle border border-white border-3 shadow"
                                                            src="{{ $profilePicture->temporaryUrl() }}"
                                                            alt="" />
                                                    @else
                                                        @if (Auth::user()->profile_picture == null)
                                                            <img id="uploadfile-1-preview"
                                                                class="avatar-img rounded-circle border border-white border-3 shadow"
                                                                src="{{ asset('assets/images/avatar/p1.svg') }}"
                                                                alt="" />
                                                        @else
                                                            <img id="uploadfile-1-preview"
                                                                class="avatar-img rounded-circle border border-white border-3 shadow"
                                                                src="{{ Auth::user()->profile_picture }}"
                                                                alt="" />
                                                        @endif
                                                    @endif
                                                </span>
                                            </label>
                                            <!-- Upload button -->
                                            <label class="btn btn-sm btn-primary-soft mb-0"
                                                for="uploadfile-1">Change</label>
                                            <input id="uploadfile-1" class="form-control d-none"
                                                wire:model='profilePicture' type="file">
                                        </div>
                                        <!-- Avatar upload END -->
                                    </div>
                                    <!-- Full name -->
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">First Name</label>
                                            <input type="text"
                                                class="form-control @error('firstName') is-invalid @enderror"
                                                placeholder="Name" wire:model='firstName' />
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Last Name</label>
                                            <input type="text"
                                                class="form-control @error('lastName') is-invalid @enderror"
                                                placeholder="Name" wire:model='lastName' />
                                        </div>
                                    </div>

                                    <!-- Email id -->
                                    <div class="mb-3">
                                        <label class="form-label">Email id</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            placeholder="Enter your email" wire:model='email' />
                                    </div>

                                    <!-- Save button -->
                                    <div class="d-flex justify-content-end mt-4">
                                        <button type="submit" class="btn btn-primary" wire:loading.attr='disabled'>
                                            <span wire:loading.remove>Save changes</span>
                                            <span wire:loading wire:target="saveProfile" class="text-center">
                                                <span class="spinner-border spinner-border-sm" role="status"
                                                    aria-hidden="true"></span>
                                            </span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- Edit profile END -->

                        <!-- Update Password START -->
                        <div class="col-md-5">
                            <div class="card border">
                                <div class="card-header border-bottom">
                                    <h5 class="card-header-title">Update Password</h5>
                                    <p class="mb-0 small">Your current email address is <span
                                            class="text-primary">{{ Auth::user()->email }}</span></p>
                                </div>
                                <!-- Card body START -->
                                <form class="card-body" wire:submit.prevent='changePassword'>
                                    <!-- Current password -->
                                    <div class="mb-3">
                                        <label class="form-label">Current password</label>
                                        <input class="form-control @error('currentPassword') is-invalid @enderror"
                                            type="password" placeholder="Enter current password"
                                            wire:model='currentPassword' />
                                        @error('currentPassword')
                                            <span
                                                class="invalid-feedback position-absolute"><small><i>{{ $message }}</i></small></span>
                                        @enderror
                                    </div>
                                    <!-- New password -->
                                    <div class="mb-3">
                                        <label class="form-label"> Enter new password</label>
                                        <input class="form-control @error('newPassword') is-invalid @enderror"
                                            type="password" placeholder="Enter new password"
                                            wire:model='newPassword' />
                                        @error('newPassword')
                                            <span
                                                class="invalid-feedback position-absolute"><small><i>{{ $message }}</i></small></span>
                                        @enderror
                                    </div>
                                    <!-- Confirm -->
                                    <div>
                                        <label class="form-label">Confirm new password</label>
                                        <input class="form-control @error('confirmPassword') @enderror"
                                            type="password" placeholder="Confirm new password"
                                            wire:model='confirmPassword' />
                                        @error('confirmPassword')
                                            <span
                                                class="invalid-feedback position-absolute"><small><i>{{ $message }}</i></small></span>
                                        @enderror
                                    </div>

                                    <div class="text-end mt-3">
                                        <button type="submit" class="btn btn-primary mb-0"
                                            wire:loading.attr="disabled">
                                            <span wire:loading.remove>Change Password</span>
                                            <span wire:loading wire:target="changePassword" class="text-center">
                                                <span class="spinner-border spinner-border-sm" role="status"
                                                    aria-hidden="true"></span>
                                            </span>
                                        </button>
                                    </div>
                                </form>
                                <!-- Card body END -->
                            </div>
                        </div>
                        <!-- Update Password END -->
                    </div>
                </div>

                {{-- //
                ************************************************************************************************************
                //
                //
                ************************************************************************************************************
                //
                // //
                //
                ************************************************************************************************************
                //
                //
                ************************************************************************************************************
                // --}}
                <div class="tab-pane" id="tab-3-2">
                    <div class="row g-4">


                        <div class="col-md-6">
                            <div class="card shadow h-100">
                                <!-- Card header -->
                                <div
                                    class="card-header border-bottom d-flex justify-content-between align-items-center p-3">
                                    <h5 class="card-header-title">All Admins</h5>
                                    <a href="{{ route('admin.dorm-owners') }}" wire:navigate
                                        class="btn btn-link p-0 mb-0">Add Admin</a>
                                </div>

                                <!-- Card body START -->
                                <div class="card-body p-3">
                                    @foreach ($admins as $admin)
                                        <!-- Arrival item -->
                                        <div class="d-flex justify-content-between align-items-center">
                                            <!-- Avatar and info -->
                                            <div class="d-sm-flex align-items-center mb-1 mb-sm-0">
                                                <!-- Avatar -->
                                                <div class="avatar avatar-md flex-shrink-0">
                                                    @if ($admin->profile_picture == null)
                                                        <img class="avatar-img rounded-circle"
                                                            src="{{ asset('assets/images/avatar/p1.svg') }}"
                                                            alt="" />
                                                    @else
                                                        <img class="avatar-img rounded-circle"
                                                            src="{{ $admin->profile_picture }}"
                                                            alt="" />
                                                    @endif
                                                </div>
                                                <!-- Info -->
                                                <div class="ms-sm-2 mt-2 mt-sm-0">
                                                    <h6 class="mb-1">
                                                        {{ $admin->first_name }}
                                                        {{ $admin->last_name }}
                                                    </h6>
                                                    <ul class="nav nav-divider small">
                                                        <li class="nav-item">{{ $admin->email }}</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- Button -->
                                            <a href="#" class="btn btn-sm btn-light mb-0 ms-3 px-2"><i
                                                    class="fa-solid fa-chevron-right fa-fw"></i></a>
                                        </div>

                                        <hr><!-- Divider -->
                                    @endforeach


                                </div>
                                <!-- Card body END -->
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card shadow">
                                <!-- Card header -->
                                <div class="card-header border-bottom">
                                    <h5 class="card-header-title">Add Admin</h5>
                                </div>

                                <!-- Card body START -->
                                <div class="card-body">
                                    <form class="row g-4 align-items-center" wire:submit.prevent='addAdmin'>

                                        <!-- Input item -->
                                        <div class="col-md-6">
                                            <label class="form-label">first name</label>
                                            <input
                                                type="text"
                                                class="form-control @error('newAdminFirstName') is-invalid @enderror"
                                                wire:model='newAdminFirstName'
                                            />
                                            @error('newAdminFirstName')
                                                <span class="invalid-feedback position-absolute"><small><i>{{ $message }}</i></small></span>
                                            @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label">last name</label>
                                            <input
                                                type="text"
                                                class="form-control @error('newAdminLastName') is-invalid @enderror"
                                                wire:model='newAdminLastName'
                                            />
                                            @error('newAdminLastName')
                                                <span class="invalid-feedback position-absolute"><small><i>{{ $message }}</i></small></span>
                                            @enderror
                                        </div>

                                        <div class="col-md-12">
                                            <label class="form-label">email</label>
                                            <input
                                                type="email"
                                                class="form-control @error('newAdminEmail') is-invalid @enderror"
                                                wire:model='newAdminEmail'
                                            />
                                            @error('newAdminEmail')
                                                <span class="invalid-feedback position-absolute"><small><i>{{ $message }}</i></small></span>
                                            @enderror
                                        </div>

                                        <div class="col-md-12">
                                            <div class="position-relative">
                                                <label class="form-label">password</label>
                                                <input
                                                    class="form-control fakepassword @error('newAdminPassword') is-invalid @enderror"
                                                    type="password"
                                                    id="psw-input"
                                                    wire:model="newAdminPassword"
                                                />
                                                <span
                                                    class="p-0 mt-3 position-absolute top-50 end-0 translate-middle-y">
                                                    <i
                                                        class="p-2 cursor-pointer fakepasswordicon fas fa-eye-slash"></i>
                                                </span>
                                                @error('newAdminPassword')
                                                    <span class="invalid-feedback position-absolute"><small><i>{{ $message }}</i></small></span>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Save button -->
                                        <div class="d-sm-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary mb-0" wire:loading.attr='disabled'>
                                                <span wire:loading.remove>Add Amenity</span>
                                                <span wire:loading wire:target="addAdmin" class="text-center">
                                                     <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                                </span>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                <!-- Card body END -->
                            </div>
                        </div>

                    </div>
                </div>


                {{-- //
                ************************************************************************************************************
                //
                //
                ************************************************************************************************************
                //
                // //
                //
                ************************************************************************************************************
                //
                //
                ************************************************************************************************************
                // --}}
                <div class="tab-pane" id="tab-3-3">
                    <div class="row g-4">

                        <div class="col-md-6">
                            <div class="card shadow">
                                <!-- Card header -->
                                <div class="card-header border-bottom">
                                    <h5 class="card-header-title">Amenities</h5>
                                </div>

                                <!-- Card body START -->
                                <div class="card-body">
                                    <form class="row g-4 align-items-center" wire:submit.prevent='saveAmenity'>

                                        <!-- Input item -->
                                        <div class="col-12">
                                            <label class="form-label">Amenity Name</label>
                                            <input type="text"
                                                class="form-control @error('amenity') is-invalid @enderror"
                                                placeholder="e.g 24/7 Electricity" wire:model='amenity' />
                                            @error('amenity')
                                                <span
                                                    class="invalid-feedback position-absolute"><small><i>{{ $message }}</i></small></span>
                                            @enderror
                                        </div>

                                        <!-- Save button -->
                                        <div class="d-sm-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary mb-0"
                                                wire:loading.attr='disabled'>
                                                <span wire:loading.remove>Add Amenity</span>
                                                <span wire:loading wire:target="saveAmenity" class="text-center">
                                                    <span class="spinner-border spinner-border-sm" role="status"
                                                        aria-hidden="true"></span>
                                                </span>
                                            </button>
                                        </div>

                                    </form>
                                </div>
                                <!-- Card body END -->
                            </div>
                        </div>

                        <div class="col-md-5">
                            <div class="card">
                                <div class="card-header">
                                    <h6 class="card-header-title"> All amenities</h6>
                                </div>
                                <div class="card-body">
                                    @forelse ($amenities as $amenity)
                                        <span class="badge bg-success bg-opacity-10 text-success mb-2"
                                            wire:click='deleteAmenity({{ $amenity->id }})'
                                            wire:confirm="Are you sure you want to delete this amenity?">
                                            <i class="fa-solid fa-check-circle text-an me-2"></i>
                                            {{ $amenity->amenity_name }}
                                        </span>&nbsp;
                                    @empty
                                        <p class="text-center">No amenity has been added</p>
                                    @endforelse

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
