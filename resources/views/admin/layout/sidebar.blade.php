
@if(Auth::user()->type ==1)
<!-- {{-- For Large Devices --}} -->
<nav class="sidebar sidebar-lg bg-primary ">
    <div class="d-flex justify-content-center align-items-center mb-3 border-bottom border-white">
        <div class="navbar-header-logo pb-2">

           <a href="javascript:void(0)" class="text-white fs-4">Admin</a>

        </div>
    </div>
    @include('admin.layout.sidebarcommon')
</nav>
<!-- For Small Devices -->
<nav class="collapse collapse-horizontal sidebar sidebar-md bg-primary" id="sidebarcollapse">
    <div class="d-flex justify-content-between align-items-center mb-4 border-bottom border-white">

           <a href="javascript:void(0)" class="text-white fs-4">Admin</a>

        <button class="btn text-white" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarcollapse"
            aria-expanded="false" aria-controls="sidebarcollapse"><i class="fa-light fa-xmark"></i></button>
    </div>
    @include('admin.layout.sidebarcommon')
</nav>
@endif


@if(Auth::user()->type == 2)
<!-- {{-- For Large Devices --}} -->
<nav class="sidebar sidebar-lg">
    <div class="d-flex justify-content-center align-items-center mb-3 border-bottom border-white">
        <div class="navbar-header-logo pb-3">
            <a href="{{URL::to('/index')}}" class="text-white fs-4"><img src="{{ helper::image_path(helper::appdata('')->logo) }}" alt="" width="200"></a>
        </div>
    </div>
    @include('admin.layout.sidebarcommon')
</nav>
<!-- For Small Devices -->
<nav class="collapse collapse-horizontal sidebar sidebar-md" id="sidebarcollapse">
    <div class="d-flex justify-content-between align-items-center mb-4 border-bottom border-white">
        <div class="navbar-header-logo">
            <a href="{{URL::to('/index')}}" class="text-white fs-4"><img src="{{ helper::image_path(helper::appdata('')->logo) }}" alt="" width="200"></a>
        </div>
        <button style="margin-top: -100px;color: #fff" class="btn" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarcollapse"
            aria-expanded="false" aria-controls="sidebarcollapse"><i style="font-size: 30px" class="fa-light fa-xmark"></i></button>
    </div>
    @include('admin.layout.sidebarcommon')
</nav>
@endif
