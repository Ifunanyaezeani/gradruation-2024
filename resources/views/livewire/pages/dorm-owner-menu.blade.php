<div class="offcanvas-xl offcanvas-end mt-xl-3" tabindex="-1" id="dashboardMenu">
    <div class="offcanvas-header border-bottom p-3">
        <h5 class="offcanvas-title">Menu</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#dashboardMenu"
            aria-label="Close"></button>
    </div>
    <!-- Offcanvas body -->
    <div class="offcanvas-body p-3 p-xl-0">
        <!-- Nav item -->
        <div class="navbar navbar-expand-xl">
            <ul class="navbar-nav navbar-offcanvas-menu">

                <li class="nav-item"> <a class="nav-link {{ $this->active_link(route('dorm-owner.dashboard')) }}" href="{{ route('dorm-owner.dashboard') }}" wire:navigate>
                    <i class="bi bi-house-door fa-fw me-1"></i>Dashboard</a>
                </li>

                <li class="nav-item"> <a class="nav-link {{ $this->active_link(route('dorm-owner.dormitory')) }}" href="{{ route('dorm-owner.dormitory') }}" wire:navigate>
                    <i class="bi bi-journals fa-fw me-1"></i>Dormitories</a>
                </li>

                <li class="nav-item"> <a class="nav-link {{ $this->active_link(route('dorm-owner.booking')) }}" href="{{ route('dorm-owner.booking') }}" wire:navigate>
                    <i class="bi bi-bookmark-heart fa-fw me-1"></i>Bookings</a>
                </li>
                <li> <a class="nav-link {{ $this->active_link(route('dorm-owner.setting')) }}" href="{{ route('dorm-owner.setting') }}" wire:navigate>
                    <i class="bi bi-gear fa-fw me-1"></i>Settings</a>
                </li>
                <li><div id="google_translate_element"></div></li>

            </ul>
        </div>
    </div>
</div>
