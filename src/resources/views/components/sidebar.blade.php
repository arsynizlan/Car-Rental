<!-- Menu -->
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ url('/dashboard') }}" class="app-brand-link">
            <h2 class="menu-text m-2 fw-bolder ms-2">Nikel Corp.</h2>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item {{ Request::segment(1) === 'dashboard' ? 'active' : '' }}">
            <a href="{{ route('dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Menu</span>
        </li>
        @role('Admin')
            <li class="menu-item {{ Request::segment(1) === 'cars' ? 'active' : '' }}">
                <a href="{{ route('cars.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bxs-car"></i>
                    <div data-i18n="Mobil">Mobil</div>
                </a>
            </li>

            <li class="menu-item {{ Request::segment(1) === 'bookings' ? 'active' : '' }}">
                <a href="{{ route('bookings.index') }}" class="menu-link">
                    <i class='menu-icon tf-icons bx bx-plus-circle'></i>
                    <div data-i18n="Pemesanan Mobil">Pemesanan Mobil</div>
                </a>
            </li>
            <li class="menu-item {{ Request::segment(1) === 'booking-histories' ? 'active' : '' }}">
                <a href="{{ route('booking-histories.index') }}" class="menu-link">
                    <i class='menu-icon tf-icons bx bx-history'></i>
                    <div data-i18n="Riwayat Pemesanan Mobil">Riwayat Pemesanan Mobil</div>
                </a>
            </li>

            <li class="menu-item {{ Request::segment(1) === 'service-histories' ? 'active' : '' }}">
                <a href="{{ route('service-histories.index') }}" class="menu-link">
                    <i class='menu-icon tf-icons bx bxs-calendar'></i>
                    <div data-i18n="Riwayat Service">Riwayat Service</div>
                </a>
            </li>
        @endrole
        @role('Responsible Person')
            <li class="menu-item {{ Request::segment(1) === 'approvals' ? 'active' : '' }}">
                <a href="{{ route('approvals.index') }}" class="menu-link">
                    <i class='menu-icon tf-icons bx bxs-edit'></i>
                    <div data-i18n="Permintaan Persetujuan">Permintaan Persetujuan</div>
                </a>
            </li>

            <li class="menu-item {{ Request::segment(1) === 'approval-histories' ? 'active' : '' }}">
                <a href="{{ route('approval-histories.index') }}" class="menu-link">
                    <i class='menu-icon tf-icons bx bx-history'></i>
                    <div data-i18n="Riwayat Persetujuan Saya">Riwayat Persetujuan Saya</div>
                </a>
            </li>
        @endrole

    </ul>
</aside>
<!-- / Menu -->
