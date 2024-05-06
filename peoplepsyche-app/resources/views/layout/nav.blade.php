<div class="sidebar-nav col-md-12 col-lg-3 sticky">

    <!-- SIDEBAR TITLE -->
    <div class="sidebar-hdr d-flex flex-row justify-content-start align-items-center">
        <button class="sidebar-btn btn d-lg-none fs-4" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasResponsive" aria-controls="offcanvasResponsive"><i class="fa-solid fa-bars text-white"></i></button>
        <h3 class="hdr-title text-white" style="text-shadow: 3px 3px 3px black;">{{ config('app.name') }}</h3>
    </div>

    <!-- SIDEBAR MENU -->
    <div class="sidebar-items-nav row overflow-hidden">

        <!-- Using offcanvas for responsive sidebar menu -->
        <div class="sidebar-offcanv offcanvas-lg offcanvas-start" style="background-color: chocolate;" data-bs-scroll="true" tabindex="-1" id="offcanvasResponsive" aria-labelledby="offcanvasResponsiveLabel">

            <!-- SIDEBAR TITLE (COLLAPSED) -->
            <div class="offcanvas-header">
                <h3 class="offcanvas-title text-white" style="text-shadow: 3px 3px 3px black;" id="offcanvasResponsiveLabel">{{ config('app.name') }}</h3>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#offcanvasResponsive" aria-label="Close"></button>
            </div>

            <!-- SIDEBAR MENU ITEMS -->
            <div class="offcanvas-body">
                <div class="sidebar-itemlist justify-content-center align-items-center">
                    <ul style="list-style: none;">

                        {{-- Side menu bar contents --}}
                        @include('layout.nav-list')
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
