<nav class="navbar sidebar navbar-expand-xl navbar-light">
    <!-- Navbar brand for xl START -->
    <div class="d-flex align-items-center">
        <a class="navbar-brand" href="" wire:navigate>
             <span class="navbar-brand-item"><Strong>Data Master</Strong></span>
        </a>
    </div>
    <!-- Navbar brand for xl END -->

    <div class="offcanvas offcanvas-start flex-row custom-scrollbar h-100" data-bs-backdrop="true" tabindex="-1"
        id="offcanvasSidebar">
        <div class="offcanvas-body sidebar-content d-flex flex-column pt-4">

            <!-- Sidebar menu START -->
            <ul class="navbar-nav flex-column" id="navbar-sidebar">
                <!-- Menu item -->
                <li class="nav-item"><a href="{{ route('admin') }}" class="nav-link {{ $this->active_link(route('admin')) }}" wire:navigate>
                        Dashboard
                    </a></li>

                <!-- Title -->
                <li class="nav-item ms-2 my-2">Account Section</li>

                <!-- Menu item -->
                <li class="nav-item">
                    <a class="nav-link {{ $this->active_link(route('admin.students')) }}" href="{{ route('admin.students') }}" role="button"  wire:navigate>
                        Students
                    </a>
                </li>

                 <!-- Menu item -->
                <li class="nav-item">
                    <a class="nav-link {{ $this->active_link(route('admin.dorm-owners')) }}" href="{{ route('admin.dorm-owners') }}" role="button"  wire:navigate>
                         Dorm Owners
                    </a>
                </li>

                 <!-- Title -->
                <li class="nav-item ms-2 my-2">Service Section</li>

                  <!-- Menu item -->
                <li class="nav-item">
                    <a class="nav-link {{ $this->active_link(route('admin.dormitories')) }}" href="{{ route('admin.dormitories') }}" wire:navigate role="button">
                         Dormitories
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ $this->active_link(route('admin.bookings')) }}" href="{{ route('admin.bookings') }}" wire:navigate role="button">
                         Bookings
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ $this->active_link(route('admin.student-pair')) }}" href="{{ route('admin.student-pair') }}" wire:navigate role="button">
                         Student Pair
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ $this->active_link(route('admin.review')) }}" href="{{ route('admin.review') }}" wire:navigate role="button">
                         Reviews
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ $this->active_link(route('admin.calendar')) }}" href="{{ route('admin.calendar') }}" role="button">
                         Events
                    </a>
                </li>

                <!-- Title -->
                <li class="nav-item ms-2 my-2">Extra Section</li>
                <!-- Menu item -->
                <li class="nav-item">
                    <a class="nav-link {{ $this->active_link(route('admin.setting')) }}" href="{{ route('admin.setting') }}" wire:navigate>
                        System setting
                    </a>
                </li>
            </ul>
            <!-- Sidebar menu end -->

            <!-- Sidebar footer START -->
            <div class="d-flex align-items-center cursor-pointer justify-content-between text-primary-hover mt-auto p-3 navbar-nav nav-item">
                <a class="h6 fw-light mb-0 nav-link cursor-pointer" wire:click="logout" aria-label="Sign out">
                    <i class="bi bi-door-open-fill fa-fw me-2 cursor-pointer"></i> Log out
                </a>
            </div>
            <!-- Sidebar footer END -->

        </div>
    </div>
</nav>

