{{-- <header class="navbar bg-white rounded-1 shadow-sm pe-4 ps-3 d-flex justify-content-between align-items-center">
    <div class="d-flex align-items-center gap-4">
        <button class="btn btn-outline-primary-hover" @click="sidebarOpen = !sidebarOpen">
            <i class="bi bi-list text-dark fs-4"></i>
        </button>
    </div> --}}

    <!-- Kanan: nama + role + icon -->
    {{-- <div class="d-flex align-items-center gap-2">
        <!-- Nama user + deskripsi -->
        <div class="d-flex flex-column align-items-end me-2">
            <span class="fw-semibold text-dark">Hallo, {{ Auth::user()->name }}</span>
            @if (auth()->user()->is_admin)
                <small>Super Admin</small>
            @else
                <small class="text-muted">{{  Auth::user()->opd->kode_opd}}</small>
            @endif
        </div> --}}
    
        {{-- <x-popover placement="bottom" triggerClass="cursor-pointer">
            <x-slot name="trigger">
                <i class="bi bi-person-circle fs-2 text-dark"></i>
            </x-slot>

            <div class="flex flex-col">
                <a href="/profile" class="dropdown-item">Profile</a>
                <a href="/settings" class="dropdown-item">Settings</a>
                <hr>
                <form method="POST" action="{{ route('logout') }}" class="w-full dropdown-item">
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm w-100">
                        {{ __('Log Out') }}
                    </button>
                </form>
            </div>
        </x-popover>
    </div>
</header> --}}


<header class="header d-flex justify-content-between rounded-1 align-items-center ms-2 border border-end-light">
    <div class="d-flex align-items-center">
        <!-- Desktop Sidebar Toggle -->
        <button class="toggle-btn me-3 d-none d-md-block" @click="sidebarCollapsed = !sidebarCollapsed"
            title="Toggle Sidebar">
            <i class="bi bi-list"></i>
        </button>

        <!-- Mobile Menu Toggle -->
        <button class="toggle-btn me-3 d-md-none" @click="showSidebar = !showSidebar" title="Toggle Mobile Menu">
            <i class="bi bi-list"></i>
        </button>

        <div>
            <h5 class="mb-0" style="color:rgb(46, 46, 46)">{{ $pageTitle ?? 'Dashboard' }}</h5>
        </div>
    </div>

    <div class="d-flex align-items-center">
        <!-- User Profile Dropdown -->
        <div class="dropdown">
            <button class="btn bg-light dropdown-toggle text-dark" type="button" data-bs-toggle="dropdown">
                <i class="bi bi-person-circle me-2"></i>{{ auth()->user()->name ?? 'Admin' }}
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
                <li>
                    <a class="dropdown-item" href="#">
                        {{-- <i class="bi bi-gear me-2"></i> --}}
                        @if (auth()->user()->is_admin)
                        <h5>Super Admin</h5>
                        @else
                        <h6>{{  Auth::user()->opd->kode_opd}}</h6>
                        @endif
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="#">
                        <i class="bi bi-person me-2"></i>Profile
                    </a>
                </li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li>
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="dropdown-item">
                            <i class="bi bi-box-arrow-right me-2"></i>Logout
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</header>
