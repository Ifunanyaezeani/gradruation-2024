<div class="container vstack gap-4">
    <!-- Title START -->
    <div class="row">
        <div class="col-12 mt-4">
            <h6 class="mb-0"><i class="bi bi-gear fa-fw me-1"></i>Settings</h6>
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


    <!-- Personal info START -->
    <div class="">
        <!-- Card header -->
        <div class="card-header border-bottom">
            <h5 class="card-header-title">Personal Information</h5>
        </div>

        <!-- Card body START -->
        <div class="card-body mt-5">
            <!-- Form START -->
            <form class="row g-3" wire:submit.prevent='saveProfile'>
                <!-- Profile photo -->
                <div class="col-12">
                    <label class="form-label">Upload your profile photo<span class="text-danger">*</span></label>
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
                                            src="{{ asset('assets/images/avatar/p1.svg') }}" alt="" />
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
                        <input id="uploadfile-1" class="form-control d-none" type="file" wire:model='profilePicture'>
                    </div>
                </div>

                <!-- Name -->
                <div class="col-md-6">
                    <label class="form-label">First Name<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" wire:model='firstName'
                        placeholder="Enter your full name">
                </div>

                <!-- Email -->
                <div class="col-md-6">
                    <label class="form-label">Last Name<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" wire:model='lastName' placeholder="Enter your email id">
                </div>

                <!-- Mobile -->
                <div class="col-md-6">
                    <label class="form-label">Mobile number<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="Enter your mobile number"
                        wire:model='phoneNumber'>
                </div>

                <!-- Nationality -->
                <div class="col-md-6">
                    <label class="form-label">Nationality<span class="text-danger">*</span></label>
                    <select class="form-select js-choice" wire:model='nationality'>
                        <option value="">Select your country</option>
                        <option value="USA">USA</option>
                        <option value="India">India</option>
                        <option value="UK">UK</option>
                    </select>
                </div>

                <!-- Date of birth -->
                <div class="col-md-6">
                    <label class="form-label">Date of Birth<span class="text-danger">*</span></label>
                    <input type="date" class="form-control flatpickr" placeholder="Enter date of birth"
                        wire:model='birthDay'>
                </div>

                <!-- Gender -->
                <div class="col-md-6">
                    <label class="form-label">Gender<span class="text-danger">*</span></label>
                    <select class="form-select js-choice" wire:model='gender'>
                        <option value="">--Select your gender--</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>

                <!-- Button -->
                <div class="col-12 text-end">
                    <button type="submit" class="btn btn-primary mb-0 mt-2" wire:loading.attr="disabled">
                        <span wire:loading.remove>Save Changes</span>
                        <span wire:loading wire:target="saveProfile" class="text-center">
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            <span class="visually-hidden">Loading...</span>
                        </span>
                    </button>
                </div>
            </form>
            <!-- Form END -->
        </div>
        <!-- Card body END -->
    </div>
    <!-- Personal info END -->

    <hr>

    <!-- Update email START -->
    <div class="">
        <!-- Card header -->
        <div class="card-header border-bottom">
            <h5 class="card-header-title">Update email</h5>
            <p class="mb-0">Your current email address is <span
                    class="text-primary">{{ Auth::user()->email }}</span>
            </p>
        </div>

        <!-- Card body START -->
        <div class="card-body mt-4">
            <form wire:submit.prevent='updateEmail'>
                <!-- Email -->
                <label class="form-label">Enter your new email id<span class="text-danger">*</span></label>
                <input type="email" class="form-control" placeholder="Enter your email id" wire:model='email'>

                <div class="text-end mt-3">
                    <button type="submit" class="btn btn-primary mb-0 mt-2" wire:loading.attr="disabled">
                        <span wire:loading.remove>Update Email</span>
                        <span wire:loading wire:target="updateEmail" class="text-center">
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            <span class="visually-hidden">Loading...</span>
                        </span>
                    </button>
                </div>
            </form>
        </div>
        <!-- Card body END -->
    </div>
    <!-- Update email END -->

    <hr>

    <!-- Update Password START -->
    <div class="">
        <!-- Card header -->
        <div class="card-header border-bottom">
            <h5 class="card-header-title">Update Password</h5>
        </div>

        <!-- Card body START -->
        <form class="card-body mt-4" wire:submit.prevent='changePassword'>
            <!-- Current password -->
            <div class="mb-3">
                <label class="form-label">Current password</label>
                <input class="form-control" type="password" placeholder="Enter current password" wire:model='currentPassword'>
                @error('currentPassword')
                        <span>{{ $message }}</span>
                @enderror
            </div>
            <!-- New password -->

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label"> Enter new password</label>
                    <div class="input-group">
                        <input class="form-control fakepassword" placeholder="Enter new password" type="password"
                            id="psw-input" wire:model='newPassword'>
                        <span class="input-group-text p-0 bg-transparent">
                            <i class="fakepasswordicon fas fa-eye-slash cursor-pointer p-2"></i>
                        </span>
                        @error('newPassword')
                        <span>{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <!-- Confirm -->
                <div class="col-md-6 mb-3">
                    <label class="form-label">Confirm new password</label>
                    <input class="form-control" type="password" placeholder="Confirm new password" wire:model='confirmPassword'>
                    @error('confirmPassword')
                        <span>{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-primary mb-0 mt-2" wire:loading.attr="disabled">
                        <span wire:loading.remove>Change Password</span>
                        <span wire:loading wire:target="changePassword" class="text-center">
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            <span class="visually-hidden">Loading...</span>
                        </span>
                    </button>
                {{-- <a href="#" class="btn btn-primary mb-0">Change Password</a> --}}
            </div>
        </form>
        <!-- Card body END -->
    </div>
    <!-- Update Password END -->
</div>
