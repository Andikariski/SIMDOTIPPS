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
