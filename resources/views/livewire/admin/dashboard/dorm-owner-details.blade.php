  <div class="page-content-wrapper p-xxl-4 bg-transparent">

      @if (session()->has('message'))
          <div class="alert alert-success d-flex align-items-center rounded-3 mb-0" role="alert">
              <h4 class="mb-0 alert-heading"><i class="bi bi-check2-circle me-2"></i> </h4>
              <div class="ms-3">
                  <h6 class="mb-0 alert-heading">{{ session('message') }}</h6>
              </div>
          </div>
      @endif

      <!-- Counter START -->
      <div class="row g-4 mb-4 mt-3">
          <!-- Counter item -->
          <div class="col-lg-4">
              <div class="card card-body border border-primary bg-primary bg-opacity-10 border-opacity-25 p-4 h-100">
                  <div class="d-flex justify-content-between align-items-center">
                      <!-- Digit -->
                      <div>
                          <h3 class="mb-0 fw-bold">{{ $totalDorm }}</h3>
                          <span class="mb-0 h6 fw-light">Total Dormitories</span>
                      </div>
                  </div>
              </div>
          </div>

          <!-- Counter item -->
          <div class="col-lg-4">
              <div class="card card-body border border-warning bg-warning bg-opacity-10 border-opacity-25 p-4 h-100">
                  <div class="d-flex justify-content-between align-items-center">
                      <!-- Digit -->
                      <div>
                          <h3 class="mb-0 fw-bold">{{ $totalBookedDorm }}</h3>
                          <span class="mb-0 h6 fw-light">Booked Dormitories</span>
                      </div>
                  </div>
              </div>
          </div>

          <!-- Counter item -->
          <div class="col-lg-4">
              <div class="card card-body border border-success bg-success bg-opacity-10 border-opacity-25 p-4 h-100">
                  <div class="d-flex justify-content-between align-items-center">
                      <!-- Digit -->
                      <div>
                          <h3 class="mb-0 fw-bold">{{ $totalRooms }}</h3>
                          <span class="mb-0 h6 fw-light">Total Rooms</span>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <!-- Counter END -->

      <div class="row g-4 mb-5">
          <!-- Agent info START -->
          <div class="col-md-4 col-xxl-3">
              <div class="card bg-light">
                  <!-- Card body -->
                  <div class="card-body text-center">
                      <!-- Avatar Image -->
                      <div class="avatar avatar-xl flex-shrink-0 mb-3">
                          @if ($dormOwner->profile_picture == null)
                              <img class="avatar-img rounded-circle border border-3 border-primary"
                                  src="{{ asset('assets/images/avatar/p1.svg') }}" alt="" />
                          @else
                              <img class="avatar-img rounded-circle border border-3 border-primary"
                                  src="{{ $dormOwner->profile_picture }}" alt="" />
                          @endif
                      </div>

                      @if ($dormOwner->email_verified_at == null)
                          <h5>
                              <span class="btn btn-sm btn-primary mb-0 ms-3 px-2"
                                  wire:click='approvedDormOwner({{ $dormOwner->id }})'
                                  wire:confirm="Are you sure you want to verify this dormitory owner account?">
                                  Verify Account
                              </span>
                          </h5>
                      @else
                         <h5 class="mb-2">
                            <span class="mb-0 small badge text-bg-success">
                                {{ $dormOwner->email_verified_at == null ? 'Unverified' : 'Verified' }}
                                <i class="fa-solid fa-star text-warning ms-1"></i>
                            </span>
                          </h5>
                      @endif

                      </span>
                  </div>
              </div>
          </div>
          <!-- Agent info END -->

          <div class="col-md-8 col-xxl-9">
              <!-- Personal info START -->
              <div class="card shadow">
                  <!-- Card header -->
                  <div class="card-header border-bottom">
                      <h5 class="mb-0">Personal Information</h5>
                  </div>
                  <!-- Card body -->
                  <div class="card-body">
                      <div class="row">
                          <!-- Information item -->
                          <div class="col-md-6">
                              <ul class="list-group list-group-borderless">
                                  <li class="list-group-item mb-3">
                                      <span>Full Name:</span>
                                      <span class="h6 fw-normal ms-1 mb-0">{{ $dormOwner->first_name }}
                                          {{ $dormOwner->last_name }}</span>
                                  </li>

                                  <li class="list-group-item mb-3">
                                      <span>User Name:</span>
                                      <span class="h6 fw-normal ms-1 mb-0">not set</span>
                                  </li>

                                  <li class="list-group-item mb-3">
                                      <span>Mobile Number:</span>
                                      <span class="h6 fw-normal ms-1 mb-0">{{ $dormOwner->phone_number }}</span>
                                  </li>

                                  <li class="list-group-item mb-3">
                                      <span>Agent License:</span>
                                      <span class="h6 fw-normal ms-1 mb-0">258ED458962</span>
                                  </li>
                              </ul>
                          </div>

                          <!-- Information item -->
                          <div class="col-md-6">
                              <ul class="list-group list-group-borderless">
                                  <li class="list-group-item mb-3">
                                      <span>Email ID:</span>
                                      <span class="h6 fw-normal ms-1 mb-0">{{ $dormOwner->email }}</span>
                                  </li>

                                  <li class="list-group-item mb-3">
                                      <span>Gender:</span>
                                      <span class="h6 fw-normal ms-1 mb-0">Male</span>
                                  </li>

                                  <li class="list-group-item mb-3">
                                      <span>Joining Date:</span>
                                      <span
                                          class="h6 fw-normal ms-1 mb-0">{{ $dormOwner->created_at->diffForHumans() }}</span>
                                  </li>
                              </ul>
                          </div>

                          <!-- Information item -->
                          <div class="col-12">
                              <ul class="list-group list-group-borderless">
                                  <li class="list-group-item">
                                      <span>Description: </span>
                                      <p class="h6 fw-normal mb-0">...</p>
                                  </li>
                              </ul>
                          </div>
                      </div>
                  </div>
              </div>
              <!-- Personal info END -->
          </div>
      </div> <!-- Row END -->

      <!-- Hotel list START -->
      <div class="row g-4">
          <!-- Title -->
          <div class="col-12">
              <h4 class="mb-0">Dormitories listed</h4>
          </div>
          @foreach ($dorm as $dormitory)
              <!-- dorm item -->
              <div class="col-lg-6">
                  <div class="card shadow p-3">
                      <div class="row g-4">
                          <!-- Card img -->
                          <div class="col-md-3">
                              <img src="{{ $dormitory->main_image }}" class="rounded-2" alt="Card image">
                          </div>

                          <!-- Card body -->
                          <div class="col-md-9">
                              <div class="card-body position-relative d-flex flex-column p-0 h-100">

                                  <!-- Title -->
                                  <h5 class="card-title mb-0 me-5"><a
                                          href="{{ route('admin.single-dorm', $dormitory->slug) }}"
                                          target="_blank">{{ Str::of($dormitory->dorm_name)->limit(32) }}</a></h5>
                                  <small><i
                                          class="bi bi-geo-alt me-2"></i>{{ Str::of($dormitory->street_address)->limit(20) }}
                                      | {{ $dormitory->regin }}, {{ $dormitory->city }}</small>

                                  <!-- Price and Button -->
                                  <div class="d-sm-flex justify-content-sm-between align-items-center mt-3 mt-md-auto">
                                      <!-- Price -->
                                      <div class="d-flex align-items-center">
                                          <h6 class="fw-bold mb-0 me-1">
                                              {{ strtolower(str_replace('_', ' ', $dormitory->dorm_type)) }} | </h6>
                                          <span class="mb-0 me-2 badge {{ $dormitory->status == \App\Enums\DormStatus::APPROVED->name ? 'text-bg-success': 'text-bg-secondary' }}">Status:
                                              {{ strtolower($dormitory->status) }}</span>
                                      </div>
                                      <div class="hstack gap-2 mt-3 mt-sm-0">
                                          <a href="{{ route('admin.dormitory-details', $dormitory->id) }}"
                                              class="btn btn-sm btn-primary-soft px-2 mb-0"><i
                                                  class="bi bi-eye fa-fw"></i> View details</a>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          @endforeach
      </div>
      <!-- Hotel list END -->
  </div>
