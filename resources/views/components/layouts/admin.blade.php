@include('partials.admin.layout.head')
{{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
{{-- @livewireScripts --}}


<body x-cloak x-data="{ sidebarCollapsed: $persist(false), showSidebar: false }">
        <!-- Sidebar -->
        @include('partials.admin.layout.sidebar')

        <!-- Main Content Area -->
       <div class="main-content" :class="{ 'expanded': sidebarCollapsed }">
            <!-- Header -->
            @include('partials.admin.layout.header')

            <!-- Main -->
            <main class="px-4 py-3 bg-white rounded-1 shadow-sm">
                {{ $slot }}
            </main>
        </div>
    {{-- Scripts --}}
    <script>
        // function sidebarApp() {
        //     return {
        //         sidebarOpen: true,
        //         theme: localStorage.getItem("theme") || "light",
        //         collapsed: JSON.parse(
        //             localStorage.getItem("sidebarCollapse") || '{"orders":false}'
        //         ),
        //         init() {
        //             document.documentElement.setAttribute("data-bs-theme", this.theme);
        //         },
        //         toggleTheme() {
        //             this.theme = this.theme === "light" ? "dark" : "light";
        //             document.documentElement.setAttribute("data-bs-theme", this.theme);
        //             localStorage.setItem("theme", this.theme);
        //         },
        //         saveState(menu, value) {
        //             this.collapsed[menu] = value;
        //             localStorage.setItem(
        //                 "sidebarCollapse",
        //                 JSON.stringify(this.collapsed)
        //             );
        //         },
        //     };
        // }

        // lightbox.option({
        //     'resizeDuration': 200,
        //     'wrapAround': true,
        //     'showImageNumberLabel': true,
        //     'albumLabel': "Foto %1 dari %2"
        // });
    </script>
    @stack('scripts') {{-- Tambahkan stack untuk JS khusus --}}
    @livewireScripts
</body>

</html>
