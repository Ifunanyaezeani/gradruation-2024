  <div class="page-content-wrapper p-xxl-4 bg-transparent">

      <!-- Title -->
      <div class="row">
          <div class="col-12 mb-4 mb-sm-5">
              <div class="d-sm-flex justify-content-between align-items-center">
                  <h1 class="h3 mb-2 mb-sm-0">Dormitory details</h1>
              </div>
              <hr>
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

      <div class="row">

          <!-- Left side content START -->
          <div class="col-xl-7">
              <div class="vstack gap-5">

                  <div class="card shadow">
                      @if ($dormitory->status == \App\Enums\DormStatus::PENDING->name)
                          <div class="card-header border-bottom d-md-flex justify-content-md-between">
                              <h5>
                                  <span class="btn btn-sm btn-primary mb-0 ms-3 px-2"
                                      wire:click='approvedDorm({{ $dormitory->id }})'
                                      wire:confirm="Are you sure you want to approve this dormitory?">
                                      Approve Dormitory
                                  </span>
                              </h5>
                              <a href="{{ route('admin.single-dorm', $dormitory->slug) }}"
                                  class="btn btn-sm btn-light mb-0 ms-3 px-2"><i class="bi bi-eye"></i> preview</a>
                          </div>
                      @elseif ($dormitory->status == \App\Enums\DormStatus::APPROVED->name)
                          <div class="card-header border-bottom d-md-flex justify-content-md-between">
                              <h5>This Dormitory has been approved</h5>
                              <a href="{{ route('admin.single-dorm', $dormitory->slug) }}"
                                  class="btn btn-sm btn-light mb-0 ms-3 px-2"><i class="bi bi-eye"></i> preview</a>
                          </div>
                      @else
                          <div class="card-header border-bottom d-md-flex justify-content-md-between">
                              <h5>
                                  This Dormitory is in Draft
                              </h5>
                              <a href="{{ route('admin.single-dorm', $dormitory->slug) }}"
                                  class="btn btn-sm btn-light mb-0 ms-3 px-2"><i class="bi bi-eye"></i> preview</a>
                          </div>
                      @endif
                      <!-- Card body START -->
                      <div class="card-body p-4">
                          <!-- Card list START -->
                          <div class="card mb-4">
                              <div class="row align-items-center">
                                  <!-- Image -->
                                  <div class="col-sm-6 col-md-3">
                                      <img src="{{ $dormitory->main_image }}" class="card-img" alt="">
                                  </div>

                                  <!-- Card Body -->
                                  <div class="col-sm-6 col-md-9">
                                      <div class="card-body pt-3 pt-sm-0 p-0">
                                          <!-- Title -->
                                          <h5 class="card-title">{{ $dormitory->dorm_name }}
                                          </h5>
                                          <p class="small mb-2"><i class="bi bi-geo-alt me-2"></i>
                                              {{ Str::of($dormitory->street_address) }} | {{ $dormitory->regin }},
                                              {{ $dormitory->city }}
                                          </p>
                                          <ul class="list-inline mb-0">
                                              <li class="list-inline-item text-info ms-2 h6 small fw-bold mb-0">
                                                  {{ strtolower(str_replace('_', ' ', $dormitory->dorm_type)) }}</li>
                                          </ul>
                                      </div>
                                  </div>

                              </div>
                          </div>
                          <!-- Card list END -->

                          <!-- Information START -->
                          <div class="row g-4">
                              <!-- Item -->
                              <div class="col-lg-12">
                                  <div
                                      class="bg-light py-3 px-4 rounded-3 d-flex justify-content-between align-items-center">
                                      <div class="d-sm-flex align-items-center mb-1 mb-sm-0">
                                          <!-- Avatar -->
                                          <div class="avatar avatar-md flex-shrink-0">
                                              @if ($dormitory->owner->profile_picture == null)
                                                  <img class="avatar-img rounded-circle border border-3 border-primary"
                                                      src="{{ asset('assets/images/avatar/p1.svg') }}"
                                                      alt="" />
                                              @else
                                                  <img class="avatar-img rounded-circle border border-3 border-primary"
                                                      src="{{ $dormitory->owner->profile_picture }}" alt="" />
                                              @endif
                                          </div>
                                          <!-- Info -->
                                          <div class="ms-sm-2 mt-2 mt-sm-0">
                                              <h6 class="mb-1">{{ $dormitory->owner->first_name }}
                                                  {{ $dormitory->owner->last_name }}</h6>
                                          </div>

                                      </div>
                                      <a href="{{ route('admin.dorm-owner.details', $dormitory->owner->id) }}"
                                          class="btn btn-sm btn-light mb-0 ms-3 px-2">
                                          view owner <i class="fa-solid fa-chevron-right fa-fw"></i>
                                      </a>
                                  </div>
                              </div>
                          </div>
                          <!-- Information END -->
                      </div>
                      <!-- Card body END -->
                  </div>
                  <!-- Hotel information END -->
              </div>
          </div>
                  <div class="col-md-5">

            <div class=" p-0">
                @forelse ($dormitory->rooms as $room)
                    <div class="card-body pb-4 p-0">
                        <div class="vstack gap-4">

                            <!-- Room item START -->
                            <div class="card bg-transparent border p-3">
                                <div class="row g-4">
                                    <!-- Card img -->
                                    <div class="col-md-3 position-relative">
                                        <div class="tiny-slider arrow-round arrow-xs arrow-dark overflow-hidden rounded-2">
                                            <div class="tiny-slider-inner" data-autoplay="true" data-arrow="true"
                                                data-dots="false" data-items="1">
                                                @foreach ($room->room_pictures as $roomPicture)
                                                    <div><img src="{{ $roomPicture }}" alt="" class="img-fluid" style="height: 150px; width: auto; object-fit: contain;"></div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-7">
                                        <div class="card-body d-flex flex-column h-100 p-0">

                                            <h6 class="card-title text-primary">{{ $room->room_name }}</h6>

                                            <!-- Amenities -->
                                            <ul class="nav nav-divider mb-2">
                                                <li class="nav-item"><i class="fa-regular fa-square me-1"></i>capacity: {{ $room->capacity }}</li>
                                                <li class="nav-item"><i class="fa-solid fa-bed me-1"></i>{{ strtolower($room->room_type)  }} room</li>
                                            </ul>

                                            <p class="text-success mb-0">{{ $room->availability }}</p>

                                            <!-- Price and Button -->
                                            <div class="d-sm-flex justify-content-sm-between align-items-center mt-auto">
                                                <div class="d-flex align-items-center">
                                                    <h5 class="fw-bold mb-0 me-1">${{ $room->price }}</h5>
                                                    <span class="mb-0 me-2">/per year</span>
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

        </div>
      </div>

  </div>
