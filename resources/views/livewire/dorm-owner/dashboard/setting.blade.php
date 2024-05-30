<div class="container vstack gap-4">

    <!-- Title START -->
    <div class="row">
        <div class="col-12">
            <h1 class="fs-4 mb-0"><i class="bi bi-gear fa-fw me-1"></i>Settings</h1>
        </div>
    </div>
    <!-- Title END -->

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
                            <label class="position-relative me-4" for="uploadfile-1" title="Replace this pic">
                                <!-- Avatar place holder -->
                                <span class="avatar avatar-xl">
                                    @if ($profilePicture)
                                        <img id="uploadfile-1-preview"
                                            class="avatar-img rounded-circle border border-white border-3 shadow"
                                            src="{{ $profilePicture->temporaryUrl() }}" alt="" />
                                    @else
                                        @if (Auth::user()->profile_picture == null)
                                            <img id="uploadfile-1-preview"
                                                class="avatar-img rounded-circle border border-white border-3 shadow"
                                                src="{{ asset('assets/images/avatar/p1.svg') }}"
                                                alt="" />
                                        @else
                                            <img id="uploadfile-1-preview"
                                                class="avatar-img rounded-circle border border-white border-3 shadow"
                                                src="{{ Auth::user()->profile_picture }}" alt="" />
                                        @endif
                                    @endif
                                </span>
                            </label>
                            <!-- Upload button -->
                            <label class="btn btn-sm btn-primary-soft mb-0" for="uploadfile-1">Change</label>
                            <input id="uploadfile-1" class="form-control d-none" wire:model='profilePicture' type="file">
                        </div>
                        <!-- Avatar upload END -->
                    </div>
                    <!-- Full name -->
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">First Name</label>
                            <input
                                type="text"
                                class="form-control @error('firstName') is-invalid @enderror"
                                placeholder="Name"
                                wire:model='firstName'
                            />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Last Name</label>
                            <input
                                type="text"
                                class="form-control @error('lastName') is-invalid @enderror"
                                placeholder="Name"
                                wire:model='lastName'
                            />
                        </div>
                    </div>

                    <!-- Email id -->
                    <div class="mb-3">
                        <label class="form-label">Email id</label>
                        <input
                            type="email"
                            class="form-control @error('email') is-invalid @enderror"
                            placeholder="Enter your email"
                            wire:model='email'
                        />
                    </div>
                    <!-- Mobile number -->
                    <div class="mb-3">
                        <label class="form-label">Mobile number</label>
                        <input
                            type="text"
                            class="form-control"
                            placeholder="Enter your mobile number"
                            wire:model='phone'
                        />
                    </div>

                    <!-- Save button -->
                    <div class="d-flex justify-content-end mt-4">
                        <button type="submit" class="btn btn-primary" wire:loading.attr='disabled'>
                            <span wire:loading.remove>Save changes</span>
                            <span wire:loading wire:target="saveProfile" class="text-center">
                                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
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
                        <input
                            class="form-control @error('currentPassword') is-invalid @enderror"
                            type="password"
                            placeholder="Enter current password"
                            wire:model='currentPassword'
                        />
                        @error('currentPassword')
                            <span class="invalid-feedback position-absolute"><small><i>{{ $message }}</i></small></span>
                        @enderror
                    </div>
                    <!-- New password -->
                    <div class="mb-3">
                        <label class="form-label"> Enter new password</label>
                        <input
                            class="form-control @error('newPassword') is-invalid @enderror"
                            type="password"
                            placeholder="Enter new password"
                            wire:model='newPassword'
                        />
                        @error('newPassword')
                            <span class="invalid-feedback position-absolute"><small><i>{{ $message }}</i></small></span>
                        @enderror
                    </div>
                    <!-- Confirm -->
                    <div>
                        <label class="form-label">Confirm new password</label>
                        <input
                            class="form-control @error('confirmPassword') @enderror"
                            type="password"
                            placeholder="Confirm new password"
                            wire:model='confirmPassword'
                        />
                        @error('confirmPassword')
                             <span class="invalid-feedback position-absolute"><small><i>{{ $message }}</i></small></span>
                        @enderror
                    </div>

                    <div class="text-end mt-3">
                        <button type="submit" class="btn btn-primary mb-0" wire:loading.attr="disabled">
                            <span wire:loading.remove>Change Password</span>
                            <span wire:loading wire:target="changePassword" class="text-center">
                                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
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
