@include('partials.admin.layout.head')
{{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
{{-- @livewireScripts --}}


<body x-cloak x-data="{ sidebarCollapsed: $persist(false), showSidebar: false }" style="background-color:#fafafa">
        <!-- Sidebar -->
        @include('partials.admin.layout.sidebar')

        <!-- Main Content Area -->
       <div class="main-content" :class="{ 'expanded': sidebarCollapsed }">
            <!-- Header -->
            @include('partials.admin.layout.header')

            <!-- Main -->
            <main class="px-4 py-3 bg-white rounded-1 border m-2">
                {{ $slot }}
            </main>
        </div>
    {{-- Scripts --}}
   
    @stack('scripts') {{-- Tambahkan stack untuk JS khusus --}}
    @livewireScripts
</body>

</html>
