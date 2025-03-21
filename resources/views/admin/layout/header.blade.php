<header id="header" class="page-topbar {{ session()->get('theme') == 'dark' ? 'dark-theme' : '' }}">
    <div
        class="navbar-header {{ Session::get('theme') == 'dark' ? 'dark-theme' : '' }} flex-end {{ helper::appdata('')->web_layout == 2 ? 'margin-0' : 'margin-right' }}">
        <button class="navbar-toggler d-lg-none d-md-block px-4" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarcollapse" aria-expanded="false" aria-controls="sidebarcollapse">
            <i class="fa-regular fa-bars fs-4"></i>
        </button>
        <div class="{{Auth::user()->type == 2 ? 'px-4' : 'px-2'}} d-flex align-items-center">

            <div class="dropwdown d-inline-block">
                <button class="btn header-item" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="{{ Auth::user()->image ? asset(Auth::user()->image) : asset('admin-assets/images/about/default.png') }}">
                    <span class="d-none d-xxl-inline-block d-xl-inline-block ms-1 {{ Session::get('theme') == 'dark' ? 'text-white' : '' }}">{{ Auth::user()->name }}</span>
                    <i class="fa-regular fa-angle-down d-none d-xxl-inline-block d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu box-shadow">
                    <a href="{{ Auth::user()->type == 1 ? URL::to('/admin/settings#editprofile') : URL::to('/edit-' . Auth::user()->slug) }}"
                        class="dropdown-item d-flex align-items-center">
                        <i class="fa-light fa-address-card fs-5 mx-2"></i>{{ trans('labels.profile') }}
                    </a>

                    <a href="{{ Auth::user()->type == 1 ? URL::to('/admin/logout') : URL::to('/logout') }}"
                        class="dropdown-item d-flex align-items-center">
                        <i class="fa-light fa-right-from-bracket fs-5 mx-2"></i>{{ trans('labels.logout') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>
