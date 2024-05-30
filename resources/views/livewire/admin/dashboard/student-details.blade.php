  <div class="page-content-wrapper p-xxl-4 bg-transparent">

      <div class="row g-4 mb-5">

          <div class="col-md-4 col-xxl-3">
              <div class="card border bg-light">
                  <div class="card-body text-center">
                      <!-- Avatar Image -->
                      <div class="avatar avatar-xl flex-shrink-0 mb-3">
                          @if ($student->profile_picture == null)
                              <img class="avatar-img rounded-circle border border-3 border-primary"
                                  src="{{ asset('assets/images/avatar/p1.svg') }}" alt="" />
                          @else
                              <img class="avatar-img rounded-circle border border-3 border-primary"
                                  src="{{ $student->profile_picture }}" alt="" />
                          @endif
                      </div>
                      <h5 class="mb-2">
                          <span class="mb-0 small badge {{ $student->email_verified_at == null ? 'text-bg-secondary' : 'text-bg-success' }} ">
                              {{ $student->email_verified_at == null ? 'Unverified' : 'Verified' }}
                              <i class="fa-solid fa-star text-warning ms-1"></i>
                          </span>
                      </h5>
                  </div>
              </div>
          </div>

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
                                      <span class="h6 fw-normal ms-1 mb-0">{{ $student->first_name }}
                                          {{ $student->last_name }}</span>
                                  </li>


                                  <li class="list-group-item mb-3">
                                      <span>Mobile Number:</span>
                                      <span class="h6 fw-normal ms-1 mb-0">{{ $student->phone_number ?? 'Not provided' }}</span>
                                  </li>

                                  <li class="list-group-item mb-3">
                                      <span>Nationality: </span>
                                      <span class="h6 fw-normal ms-1 mb-0">{{ $student->nationality ?? 'Not provided' }}</span>
                                  </li>

                                  <li class="list-group-item mb-3">
                                      <span>Date of birth: </span>
                                      <span class="h6 fw-normal ms-1 mb-0">{{ $student->birth_day == null ? 'Not provided' : $student->birth_day->format('d F Y') }}</span>
                                  </li>

                              </ul>
                          </div>

                          <!-- Information item -->
                          <div class="col-md-6">
                              <ul class="list-group list-group-borderless">
                                  <li class="list-group-item mb-3">
                                      <span>Email ID:</span>
                                      <span class="h6 fw-normal ms-1 mb-0">{{ $student->email }}</span>
                                  </li>

                                  <li class="list-group-item mb-3">
                                      <span>Gender:</span>
                                      <span class="h6 fw-normal ms-1 mb-0">{{ $student->gender ?? 'Not provided' }}</span>
                                  </li>

                                  <li class="list-group-item mb-3">
                                      <span>Joining Date:</span>
                                      <span
                                          class="h6 fw-normal ms-1 mb-0">{{ $student->created_at->diffForHumans() }}</span>
                                  </li>
                              </ul>
                          </div>

                          <!-- Information item -->
                          <div class="col-12">
                              <ul class="list-group list-group-borderless">

                              </ul>
                          </div>
                      </div>
                  </div>
              </div>
              <!-- Personal info END -->
          </div>
      </div> <!-- Row END -->
      <hr>
      <!--  list START -->
      <div class="row g-4">
          <!-- Title -->
          <div class="col-12">
              <h4 class="mb-0">Booked Dormitory</h4>
          </div>
          @forelse ($student->bookings as $booking)
              <div class="col-lg-6">
                  <div class="card shadow p-3">
                      <div class="row g-4">
                          <!-- Card img -->
                          <div class="col-sm-3">
                              <img src="{{ $booking->room->dormitory->main_image }}" class="rounded-2"
                                  alt="Card image">
                          </div>

                          <!-- Card body -->
                          <div class="col-sm-9">
                              <div class="card-body position-relative d-flex flex-column p-0 h-100">

                                  <!-- Title -->
                                  <h5 class="card-title mb-0 me-5"><a
                                          href="hotel-detail.html">{{ $booking->room->dormitory->dorm_name }}</a></h5>
                                  <small><i class="bi bi-geo-alt me-2"></i>
                                      {{ Str::of($booking->room->dormitory->street_address)->limit(20) }} |
                                      {{ $booking->room->dormitory->regin }}, {{ $booking->room->dormitory->city }}
                                  </small>

                                  <!-- Price and Button -->
                                  <div class="d-flex justify-content-between align-items-center mt-3 mt-md-auto">
                                      <!-- Price -->
                                      <div class="d-flex align-items-center">
                                          <span class="fw-bold mb-0 me-1">Expiring: </span>
                                          <span class="mb-0 me-2">{{ $booking->end_date->format('d F Y') }}</span>
                                      </div>
                                      <!-- Button -->
                                      <a href="#" class="btn btn-sm btn-primary px-2 mb-0"><i
                                              class="bi bi-eye fa-fw me-1"></i>View details</a>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          @empty
          @endforelse

      </div>
      <!--  list END -->
  </div>
