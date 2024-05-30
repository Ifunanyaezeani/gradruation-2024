<nav class="navbar top-bar navbar-light py-0 py-xl-3">
    <div class="container-fluid p-0">
        <div class="d-flex align-items-center w-100">

            <!-- Logo START -->
            <div class="d-flex align-items-center d-xl-none">
                <a class="navbar-brand" href="" wire:navigate>
                    <span class="navbar-brand-item"><Strong>Data Master</Strong></span>
                </a>
            </div>
            <!-- Logo END -->
            <div id="google_translate_element"></div>

            <!-- Toggler for sidebar START -->
            <div class="navbar-expand-xl sidebar-offcanvas-menu">
                <button class="navbar-toggler me-auto p-2" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasSidebar" aria-controls="offcanvasSidebar" aria-expanded="false"
                    aria-label="Toggle navigation" data-bs-auto-close="outside">
                    <i class="bi bi-list text-primary fa-fw" data-bs-target="#offcanvasMenu"></i>
                </button>
            </div>
            <!-- Toggler for sidebar END -->

            <!-- Top bar right START -->
            <ul class="nav flex-row align-items-center list-unstyled ms-xl-auto">
                <!-- Profile dropdown START -->
                <li class="nav-item ms-3">
                    <!-- Avatar -->
                    <a href="{{ route('admin.setting') }}" wire:navigate>
                        <div class="bg-primary bg-opacity-25 rounded-pill " id="profileDropdown" role="button"
                            data-bs-auto-close="outside" data-bs-display="static" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <span class="avatar avatar-sm" href="#">
                                @if (Auth::user()->profile_picture == null)
                                    <img class="avatar-img rounded-circle border border-3 border-primary"
                                        src="{{ asset('assets/images/avatar/p1.svg') }}" alt="" />
                                @else
                                    <img class="avatar-img rounded-circle border border-3 border-primary"
                                        src="{{ Auth::user()->profile_picture }}" alt="" />
                                @endif
                            </span>
                            <span class="text-primary">Admin Profile</span>&nbsp;&nbsp;&nbsp;
                        </div>
                    </a>

                    {{-- <ul class="dropdown-menu dropdown-animation dropdown-menu-end shadow pt-3"
                        aria-labelledby="profileDropdown">
                        <!-- Profile info -->
                        <li class="px-3 mb-3">
                            <div class="d-flex align-items-center">
                                <!-- Avatar -->
                                <div class="avatar me-3">
                                    <img class="avatar-img rounded-circle shadow"
                                        src="{{ asset('assets/images/avatar/avater.png') }}" alt="avatar">
                                </div>
                                <div>
                                    <a class="h6 mt-2 mt-sm-0" href="#">{{ Auth::user()->first_name }}
                                        {{ Auth::user()->last_name }}</a>
                                    <p class="small m-0 text-truncate" style="max-width: 150px;">
                                        {{ auth()->user()->email }}</p>
                                </div>
                            </div>
                        </li>

                        <!-- Links -->
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="" wire:navigate><i
                                    class="bi bi-person-circle fa-fw me-2"></i>Profile</a>
                        </li>
                        <li wire:click="logout">
                            <a class="dropdown-item bg-danger-soft-hover" href="#"><i
                                    class="bi bi-power fa-fw me-2"></i>Sign Out</a>
                        </li>
                    </ul> --}}
                </li>
                <!-- Profile dropdown END -->
            </ul>
            <!-- Top bar right END -->
        </div>
    </div>
</nav>
