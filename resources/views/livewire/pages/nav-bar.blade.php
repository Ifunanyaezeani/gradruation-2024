
 <nav class="navbar navbar-expand-xl bg-blur bg-light">
     <div class="container">
         <a class="navbar-brand" href="{{ route('index') }}" wire:navigate>
             <span class="navbar-brand-item"><Strong>Data Master</Strong></span>
         </a>
         <div id="google_translate_element"></div>

         @guest
             <ul class="flex-row nav align-items-center list-unstyled ms-xl-auto">
                 <li class="nav-item dropdown">
                     <div class="bg-dark bg-opacity-25 rounded-pill " id="profileDropdown" role="button"
                         data-bs-auto-close="outside" data-bs-display="static" data-bs-toggle="dropdown"
                         aria-expanded="false">
                         <div class="avatar align-middle">
                             <div class="avatar-img rounded-circle text-bg-dark">
                                <span class="position-absolute top-50 start-50 translate-middle fw-bold">
                                     <i class="bi bi-people"></i>
                                </span>
                            </div>
                         </div>
                         <span class="text-dark">Login Now</span>&nbsp;&nbsp;&nbsp;
                     </div>


                     <ul class="pt-3 shadow dropdown-menu dropdown-animation dropdown-menu-end"
                         aria-labelledby="profileDropdown">
                         <li>
                             <a class="dropdown-item" href="{{ route('login') }}" wire:navigate>
                                 As Student
                             </a>
                         </li>
                         <li>
                             <hr class="dropdown-divider">
                         </li>
                         <li>
                             <a class="dropdown-item" href="{{ route('dorm-owner.login') }}" wire:navigate>
                                 As Dormitory Owner
                             </a>
                         </li>

                     </ul>
                 </li>
             </ul>
         @endguest

         @auth('web')
             <ul class="flex-row nav align-items-center list-unstyled ms-xl-auto">
                 <li class="nav-item">
                     <a href="{{ Auth::guard()->check('web') ? route('student.dashboard') : route('dorm-owner.dashboard') }}"
                         wire:navigate>
                         <div class="bg-primary bg-opacity-25 rounded-pill " id="profileDropdown" role="button"
                             data-bs-auto-close="outside" data-bs-display="static" data-bs-toggle="dropdown"
                             aria-expanded="false">
                             <span class="avatar avatar-sm" href="#">
                                @if (Auth::user()->profile_picture == null)
                                    <img id="uploadfile-1-preview" class="avatar-img rounded-circle border border-3 border-primary"
                                        src="{{ asset('assets/images/avatar/p1.svg') }}" alt="" />
                                @else
                                    <img id="uploadfile-1-preview" class="avatar-img rounded-circle border border-3 border-primary"
                                        src="{{ Auth::user()->profile_picture }}" alt="" />
                                @endif
                             </span>
                             <span class="text-primary">Account</span>&nbsp;&nbsp;&nbsp;
                         </div>
                     </a>
                 </li>
             </ul>
         @endauth


     </div>
 </nav>
 <!-- Logo Nav END -->
