{{-- <aside class="sidebar px-3 rounded-1 bg-white d-flex flex-column shadow-sm " x-cloak
    :class="{ 'collapsed': !sidebarOpen }" style="transition: all 0.3s ease;">
    <div class=""> --}}
        {{-- <h2 class="fs-5 mb-4">SIMDOTIPPS</h2> --}}
        {{-- <img src="{{ asset('assets/img/Logo.PNG') }}" alt="Logo SIMDOTIPPS" class="img-fluid" style="">
    </div>
    <nav class="nav flex-column">
        <ul class="nav nav-pils flex-column">

        
            <li class="nav-item">
                <a wire:navigate href="{{ route('dashboard') }}"
                class="nav-link rounded-1 d-flex align-items-center gap-1 {{ request()->routeIs('dashboard') ? 'bg-primary text-light' : 'bg-white text-dark' }}">
                <i class="bi bi-speedometer2 {{ request()->routeIs('dashboard') ? 'text-light' : 'text-dark' }}"></i>
                <span class="fs-6">Dashboard</span>
                </a>
            </li>
        
            <li class="nav-item">
                <a wire:navigate href="{{ route('subKegiatan') }}" class="nav-link text-dark rounded-1 d-flex align-items-center gap-1 {{ request()->routeIs('subKegiatan') ? 'bg-primary text-light' : 'bg-white text-dark' }}">
                <i class="bi bi-clipboard-check {{ request()->routeIs('subKegiatan') ? 'text-light' : 'text-dark' }}"></i>
                <span>Data Sub Kegiatan</span>
                </a>
            </li>
            
            <li class="nav-item" x-data="{ open: collapsed.orders }">
                <button
                    class="btn btn-toggle w-100 d-flex align-items-center justify-content-between nav-link text-dark"
                    @click="open = !open; saveState('orders', open)">
                    <span class="d-flex align-items-center gap-1">
                        <i class="bi bi-folder"></i>
                        <span>Data RAP</span>
                    </span>
                    <i class="bi bi-caret-right transition-transform duration-300"
                        :style="{ transform: open ? 'rotate(90deg)' : 'rotate(0deg)' }">
                    </i>
                </button>
                <div class="collapse" :class="{ 'show': open }">
                    <ul class="btn-toggle-nav list-unstyled ps-4 pb-2">
                        <li class="nav-item"><a class="nav-link text-dark" href="#"> <i
                                    class="bi bi-dot"></i>RAP Awal</a>
                        </li>
                        <li class="nav-item"><a class="nav-link text-dark" href="#"> <i
                                    class="bi bi-dot"></i>RAP Perubahan</a>
                        </li>
                    </ul>
                </div>
            </li>
        

        @if (Auth()->user()->is_admin == 1)
             <li class="nav-item">
                <a wire:navigate href="{{ route('operator') }}"
                    class="nav-link text-dark rounded-1 d-flex align-items-center gap-1 {{ request()->routeIs('operator') ? 'bg-primary text-light' : 'bg-white text-dark' }}">
                    <i class="bi bi-people {{ request()->routeIs('operator') ? 'text-light' : 'text-dark' }}"></i>
                    <span>Data Operator</span>
                </a>
            </li>
            
             <li class="nav-item">
                <a wire:navigate href="{{ route('opd') }}"
                    class="nav-link text-dark rounded-1 d-flex align-items-center gap-1 {{ request()->routeIs('opd') ? 'bg-primary text-light' : 'bg-white text-dark' }}">
                    <i class="bi bi-buildings {{ request()->routeIs('opd') ? 'text-light' : 'text-dark' }}"></i>
                    <span>Data OPD</span>
                </a>
            </li>
            @endif
        </ul>
    </nav>
</aside> --}}

<div class="sidebar bg-white border border-end-light" :class="{ 'collapsed': sidebarCollapsed, 'show': showSidebar }">
    <div class=" d-flex flex-column align-items-center w-100 rounded-lg h-100 px-2 py-2">
        <div class="brand-wrapper px-2" style="">
            <div class="d-flex align-items-center">
                <a href="{{ route('dashboard') }}">
                    <div class="oveflow-hidden d-flex align-items-center justify-content-center"
                        style="height: 60px; width: auto" :class="{ 'me-2': !sidebarCollapsed }">
                        <div class="d-flex align-items-center justify-content-center my-3">
                            <img src="{{ asset('assets/img/Logo.PNG') }}" alt="Logo SIMDOTIPPS" class="img-fluid logo-simdoti" style="max-width: 260px;">
                        </div>
                    </div>
                </a>
                {{-- <p class="fw-semibold fs-5 text-dark" x-show="!sidebarCollapsed">BAPPERIDA
                    PPS</p> --}}
            </div>
            <button class="btn btn-outline-dark" x-show="showSidebar" type="button" @click="showSidebar = false">
                <i class="bi bi-x fw-2"></i>
            </button>
        </div>

        <ul class="sidebar-nav">
            <li class="nav-item">
                <a wire:navigate href="{{ route('dashboard') }}"
                    class="sidebar-nav-link rounded-1 d-flex align-items-center gap-1 {{ request()->routeIs('dashboard') ? 'bg-primary text-light' : 'bg-white text-dark' }}"
                    :class="{ 'justify-content-center': sidebarCollapsed }">
                    <i
                        class="bi bi-speedometer2 {{ request()->routeIs('dashboard') ? 'text-light' : 'text-dark' }}"></i>
                    <span class="fs-6" x-show="!sidebarCollapsed">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a wire:navigate href="{{ route('subKegiatan') }}"
                    class="sidebar-nav-link text-dark rounded-1 d-flex align-items-center gap-1 {{ request()->routeIs('subKegiatan') ? 'bg-primary text-light' : 'bg-white text-dark' }}"
                    :class="{ 'justify-content-center': sidebarCollapsed }">
                    <i
                        class="bi bi-journal-text {{ request()->routeIs('subKegiatan') ? 'text-light' : 'text-dark' }}"></i>
                    <span x-show="!sidebarCollapsed">Sub Kegiatan</span>
                </a>
            </li>
            @if (Auth()->user()->is_admin == 1)
            <li class="sidebar-nav-item">
                <a wire:navigate href="{{ route('operator') }}"
                    class="sidebar-nav-link text-dark rounded-1 d-flex align-items-center gap-1 {{ request()->routeIs('operator') ? 'bg-primary text-light' : 'bg-white text-dark' }}"
                    :class="{ 'justify-content-center': sidebarCollapsed }">
                    <i
                        class="bi bi-clipboard-check {{ request()->routeIs('operator') ? 'text-light' : 'text-dark' }}"></i>
                    <span x-show="!sidebarCollapsed">Operator</span>
                </a>
            </li>
            <li class="nav-item">
                <a wire:navigate href="{{ route('opd') }}"
                    class="sidebar-nav-link text-dark rounded-1 d-flex align-items-center gap-1 {{ request()->routeIs('opd') ? 'bg-primary text-light' : 'bg-white text-dark' }}"
                    :class="{ 'justify-content-center': sidebarCollapsed }">
                    <i
                        class="bi bi-diagram-2 {{ request()->routeIs('opd') ? 'text-light' : 'text-dark' }}"></i>
                    <span x-show="!sidebarCollapsed">Data OPD</span>
                </a>
            </li>
            @endif
            {{-- <li class="nav-item">
                <a wire:navigate href="{{ route('admin.jabatan.index') }}"
                    class="sidebar-nav-link text-dark rounded-1 d-flex align-items-center gap-1 {{ request()->routeIs('admin.jabatan.*') ? 'bg-primary text-light' : 'bg-white text-dark' }}"
                    :class="{ 'justify-content-center': sidebarCollapsed }">
                    <i
                        class="bi bi-person-vcard {{ request()->routeIs('admin.jabatan.*') ? 'text-light' : 'text-dark' }}"></i>
                    <span x-show="!sidebarCollapsed">Jabatan</span>
                </a>
            </li> --}}
            <li class="nav-item" x-data="{ open: false }">
                <!-- Parent link (dropdown trigger) -->
                <a href="#" @click.prevent="open = !open"
                    class="sidebar-nav-link text-dark rounded-1 d-flex align-items-center justify-content-between gap-1 {{ request()->routeIs('admin.rap.*') ? 'bg-primary text-light' : 'bg-white text-dark' }}"
                    :class="{ 'justify-content-center': sidebarCollapsed }">
                    <div class="d-flex align-items-center gap-1">
                        <i
                            class="bi bi-cash-stack {{ request()->routeIs('admin.rap.*') ? 'text-light' : 'text-dark' }}"></i>
                        <span x-show="!sidebarCollapsed">RAP</span>
                    </div>
                    <i class="bi" :class="open ? 'bi-chevron-up' : 'bi-chevron-down'"
                        x-show="!sidebarCollapsed"></i>
                </a>

                <!-- Dropdown menu -->
                <ul class="list-unstyled ps-4 mt-1" x-show="open && !sidebarCollapsed" x-transition
                    style="display: none;">
                    {{-- <li>
                        <a wire:navigate href="{{ route('admin.rap.index', ['type' => 'awal']) }}"
                            class="d-block py-1 text-decoration-none {{ request()->get('type') === 'awal' ? 'fw-bold text-primary' : 'text-dark' }}">
                            RAP Awal
                        </a>
                    </li>
                    <li>
                        <a wire:navigate href="{{ route('admin.rap.index', ['type' => 'perubahan']) }}"
                            class="d-block py-1 text-decoration-none {{ request()->get('type') === 'perubahan' ? 'fw-bold text-primary' : 'text-dark' }}">
                            RAP Perubahan
                        </a>
                    </li> --}}
                </ul>
            </li>

        </ul>
    </div>
</div>
