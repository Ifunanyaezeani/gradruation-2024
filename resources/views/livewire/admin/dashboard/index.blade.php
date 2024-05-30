  <div class="page-content-wrapper p-xxl-4 bg-transparent">

      <!-- Title -->
      <div class="row">
          <div class="col-12 mb-4 mb-sm-5">
              <div class="d-sm-flex justify-content-between align-items-center">
                  <h1 class="h3 mb-2 mb-sm-0">Dashboard</h1>
              </div>
          </div>
      </div>

      <!-- Counter boxes START -->
      <div class="row g-4 mb-5">
          <!-- Counter item -->
          <div class="col-md-6 col-xxl-3">
              <div class="card card-body bg-warning bg-opacity-10 border border-warning border-opacity-25 p-4 h-100">
                  <div class="d-flex justify-content-between align-items-center">
                      <!-- Digit -->
                      <div>
                          <h4 class="mb-0">{{ $totalDorm }}</h4>
                          <span class="h6 fw-light mb-0">Total Dormitories</span>
                      </div>
                      <!-- Icon -->
                      <div class="icon-lg rounded-circle bg-warning text-white mb-0"><i
                              class="fa-solid fa-hotel fa-fw"></i></div>
                  </div>
              </div>
          </div>

          <!-- Counter item -->
          <div class="col-md-6 col-xxl-3">
              <div class="card card-body bg-primary bg-opacity-10 border border-primary border-opacity-25 p-4 h-100">
                  <div class="d-flex justify-content-between align-items-center">
                      <!-- Digit -->
                      <div>
                          <h4 class="mb-0">{{ $totalRoom }}</h4>
                          <span class="h6 fw-light mb-0">Total Rooms</span>
                      </div>
                      <!-- Icon -->
                      <div class="icon-lg rounded-circle bg-primary text-white mb-0"><i
                              class="fa-solid fa-bed fa-fw"></i></div>
                  </div>
              </div>
          </div>

          <!-- Counter item -->
          <div class="col-md-6 col-xxl-3">
              <div class="card card-body bg-success bg-opacity-10 border border-success border-opacity-25 p-4 h-100">
                  <div class="d-flex justify-content-between align-items-center">
                      <!-- Digit -->
                      <div>
                          <h4 class="mb-0">{{ $totalDormOwner }}</h4>
                          <span class="h6 fw-light mb-0">Dormitory Owners</span>
                      </div>
                      <!-- Icon -->
                      <div class="icon-lg rounded-circle bg-success text-white mb-0"><i
                              class="fa-solid fa-hand-holding-dollar fa-fw"></i></div>
                  </div>
              </div>
          </div>

          <!-- Counter item -->
          <div class="col-md-6 col-xxl-3">
              <div class="card card-body bg-info bg-opacity-10 border border-info border-opacity-25 p-4 h-100">
                  <div class="d-flex justify-content-between align-items-center">
                      <!-- Digit -->
                      <div>
                          <h4 class="mb-0">{{ $totalStudent }}</h4>
                          <span class="h6 fw-light mb-0">total Students</span>
                      </div>
                      <!-- Icon -->
                      <div class="icon-lg rounded-circle bg-info text-white mb-0"><i
                              class="fa-solid fa-building-circle-check fa-fw"></i></div>
                  </div>
              </div>
          </div>
      </div>
      <!-- Counter boxes END -->


      <div class="row g-4 mb-5">
          <!-- Title -->
          <div class="col-12">
              <div class="d-flex justify-content-between">
                  <h4 class="mb-0">Latest Dormitories</h4>
                  <a href="{{ route('admin.dormitories') }}" wire:navigate class="btn btn-primary-soft mb-0">View
                      All</a>
              </div>
          </div>
          @forelse ($latestDorm as $dorm)
              <!-- dorm item -->
              <div class="col-lg-6">
                  <div class="card shadow p-3">
                      <div class="row g-4">
                          <!-- Card img -->
                          <div class="col-md-3">
                              <img src="{{ $dorm->main_image }}" class="rounded-2" alt="">
                          </div>

                          <!-- Card body -->
                          <div class="col-md-9">
                              <div class="card-body position-relative d-flex flex-column p-0 h-100">

                                  <!-- Title -->
                                  <h5 class="card-title mb-0 me-5"><a
                                          href="{{ route('admin.single-dorm', $dorm->slug) }}"
                                          target="_blank">{{ Str::of($dorm->dorm_name)->limit(32) }}</a></h5>
                                  <small><i
                                          class="bi bi-geo-alt me-2"></i>{{ Str::of($dorm->street_address)->limit(20) }}
                                      | {{ $dorm->regin }}, {{ $dorm->city }}</small>


                                  <div class="d-sm-flex justify-content-sm-between align-items-center mt-3 mt-md-auto">
                                      <div class="d-flex align-items-center">
                                          <h6 class="fw-bold mb-0 me-1">
                                              {{ strtolower(str_replace('_', ' ', $dorm->dorm_type)) }} | </h6>
                                          <span class="mb-0 me-2 badge {{ $dorm->status == \App\Enums\DormStatus::APPROVED->name ? 'text-bg-success': 'text-bg-secondary' }}">Status:
                                              {{ strtolower($dorm->status) }}</span>
                                      </div>
                                      <div class="hstack gap-2 mt-3 mt-sm-0">
											<a href="{{ route('admin.dormitory-details', $dorm->id) }}" class="btn btn-sm btn-primary-soft px-2 mb-0"><i class="bi bi-eye fa-fw"></i> View details</a>
										</div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          @empty
          @endforelse

      </div>

      <!-- Widget START -->
      <div class="row g-4">

          <!-- new students START -->
          <div class="col-lg-6 col-xxl-4">
              <div class="card shadow h-100">
                  <!-- Card header -->
                  <div class="card-header border-bottom d-flex justify-content-between align-items-center p-3">
                      <h5 class="card-header-title">New students</h5>
                      <a href="{{ route('admin.students') }}" wire:navigate class="btn btn-link p-0 mb-0">View all</a>
                  </div>

                  <!-- Card body START -->
                  <div class="card-body p-3">
                      @foreach ($recentStudent as $student)
                          <div class="d-flex justify-content-between align-items-center">
                              <!-- Avatar and info -->
                              <div class="d-sm-flex align-items-center mb-1 mb-sm-0">
                                  <!-- Avatar -->
                                  <div class="avatar avatar-md flex-shrink-0">
                                     @if ($student->profile_picture == null)
                                            <img class="avatar-img rounded-circle border border-3 border-primary"
                                                src="{{ asset('assets/images/avatar/p1.svg') }}" alt="" />
                                        @else
                                            <img class="avatar-img rounded-circle border border-3 border-primary"
                                                src="{{ $student->profile_picture }}" alt="" />
                                        @endif
                                  </div>
                                  <!-- Info -->
                                  <div class="ms-sm-2 mt-2 mt-sm-0">
                                      <h6 class="mb-1">{{ $student->first_name }} {{ $student->last_name }}</h6>
                                      <ul class="nav nav-divider small">
                                          <li class="nav-item">{{ $student->email }}</li>
                                      </ul>
                                  </div>
                              </div>
                              <!-- Button -->
                              <a href="{{ route('admin.student.details', $student->id) }}" class="btn btn-sm btn-light mb-0 ms-3 px-2">
                                <i class="fa-solid fa-chevron-right fa-fw"></i>
                            </a>
                          </div>

                          <hr><!-- Divider -->
                      @endforeach
                  </div>
                  <!-- Card body END -->
              </div>
          </div>
          <!-- new students END -->

          <!-- new dorm owners START -->
          <div class="col-lg-6 col-xxl-4">
              <div class="card shadow h-100">
                  <!-- Card header -->
                  <div class="card-header border-bottom d-flex justify-content-between align-items-center p-3">
                      <h5 class="card-header-title">New Dormitory Owners</h5>
                      <a href="{{ route('admin.dorm-owners') }}" wire:navigate class="btn btn-link p-0 mb-0">View
                          all</a>
                  </div>

                  <!-- Card body START -->
                  <div class="card-body p-3">
                      @foreach ($recentDormOwner as $dormOwner)
                          <!-- Arrival item -->
                          <div class="d-flex justify-content-between align-items-center">
                              <!-- Avatar and info -->
                              <div class="d-sm-flex align-items-center mb-1 mb-sm-0">
                                  <!-- Avatar -->
                                  <div class="avatar avatar-md flex-shrink-0">
                                        @if ($dormOwner->profile_picture == null)
                                            <img class="avatar-img rounded-circle border border-3 border-primary"
                                                src="{{ asset('assets/images/avatar/p1.svg') }}" alt="" />
                                        @else
                                            <img class="avatar-img rounded-circle border border-3 border-primary"
                                                src="{{ $dormOwner->profile_picture }}" alt="" />
                                        @endif
                                  </div>
                                  <!-- Info -->
                                  <div class="ms-sm-2 mt-2 mt-sm-0">
                                      <h6 class="mb-1">{{ $dormOwner->first_name }} {{ $dormOwner->last_name }}
                                      </h6>
                                      <ul class="nav nav-divider small">
                                          <li class="nav-item">{{ $dormOwner->email }}</li>
                                      </ul>
                                  </div>
                              </div>
                              <!-- Button -->
                              <a href="{{ route('admin.dorm-owner.details', $dormOwner->id) }}" class="btn btn-sm btn-light mb-0 ms-3 px-2">
                                <i class="fa-solid fa-chevron-right fa-fw"></i>
                            </a>
                          </div>

                          <hr><!-- Divider -->
                      @endforeach


                  </div>
                  <!-- Card body END -->
              </div>
          </div>
          <!-- new dorm owners END -->

          <!-- Reviews START -->
          <div class="col-lg-12 col-xxl-4">
              <div class="card shadow h-100">
                  <!-- Card header -->
                  <div class="card-header border-bottom d-flex justify-content-between align-items-center p-3">
                      <h5 class="card-header-title">Recent Reviews</h5>
                      <a href="#" class="btn btn-link p-0 mb-0">View all</a>
                  </div>

                  <!-- Card body START -->
                  <div class="card-body p-3">
                      @foreach ($recentReviews as $review)
                          <!-- Rooms item START -->
                          <div class="d-flex justify-content-between align-items-center">
                              <!-- Image and info -->
                              <div class="d-sm-flex align-items-center mb-1 mb-sm-0">
                                  <!-- Avatar -->
                                  <div class="flex-shrink-0">
                                      <img src="{{ $review->dormitory->main_image }}" class="rounded h-60px"
                                          alt="">
                                  </div>
                                  <!-- Info -->
                                  <div class="ms-sm-3 mt-2 mt-sm-0">
                                      <p class="mb-1"><strong><small>{{ $review->user->first_name }} {{ $review->user->last_name }}</small></strong></p>
                                      <ul class="list-inline smaller mb-0">
                                          @for ($i = 1; $i <= 5; $i++)
                                              <li class="list-inline-item me-0">
                                                  <i
                                                      class="fa{{ $i <= $review->rating ? '-solid' : '-regular' }} fa-star text-warning"></i>
                                              </li>
                                          @endfor
                                          <br>
                                          <li class="list-inline-item me-0"><strong>Dormitory:</strong> <small>{{ $review->dormitory->dorm_name }}</small></li>
                                      </ul>
                                  </div>
                              </div>
                          </div>
                          <!-- Rooms item END -->

                          <hr><!-- Divider -->
                      @endforeach
                  </div>
                  <!-- Card body END -->
              </div>
          </div>
          <!-- Reviews END -->
      </div>
      <!-- Widget END -->

  </div>
  <!-- Page main content END -->
