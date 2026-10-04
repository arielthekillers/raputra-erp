<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Raputra ERP' ?></title>
    <!-- Tailwind CSS output -->
    <link href="<?= base_url('css/app.css') ?>" rel="stylesheet">
    <!-- Alpine.js untuk interaksi menu & dropdown (sangat ringan) -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <!-- Phosphor Icons (Sangat cocok untuk desain ERP modern) -->
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
</head>
<body class="bg-gray-50 text-gray-800 font-sans antialiased overflow-hidden" x-data="{ sidebarOpen: false }">

    <div class="flex h-screen w-full">
        
        <!-- Mobile Sidebar Overlay -->
        <div x-show="sidebarOpen" class="fixed inset-0 z-40 bg-gray-900/80 backdrop-blur-sm lg:hidden" x-transition.opacity @click="sidebarOpen = false"></div>

        <!-- Sidebar -->
        <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'" class="fixed inset-y-0 left-0 z-50 w-72 flex flex-col bg-slate-900 text-slate-300 transition-transform duration-300 lg:static lg:translate-x-0 shadow-2xl lg:shadow-none border-r border-slate-800">
            <!-- Sidebar Header -->
            <div class="flex items-center justify-between h-16 px-6 bg-slate-950 border-b border-slate-800 shrink-0">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center text-white font-bold shadow-lg shadow-blue-500/30">R</div>
                    <span class="text-xl font-bold text-white tracking-wide">Raputra<span class="text-blue-400">ERP</span></span>
                </div>
                <!-- Close Button (Mobile Only) -->
                <button @click="sidebarOpen = false" class="lg:hidden text-slate-400 hover:text-white">
                    <i class="ph ph-x text-2xl"></i>
                </button>
            </div>

            <!-- Sidebar Navigation -->
            <div class="flex-1 overflow-y-auto overflow-x-hidden p-4 space-y-1 custom-scrollbar">
                
                <!-- Main Dashboard -->
                <a href="<?= base_url() ?>" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-colors hover:bg-slate-800 hover:text-white <?= uri_string() == '' ? 'bg-blue-600/10 text-blue-400' : '' ?>">
                    <i class="ph ph-squares-four text-lg"></i>
                    <span>Dashboard</span>
                </a>

                <div class="pt-4 pb-2">
                    <p class="px-3 text-xs font-bold text-slate-500 uppercase tracking-wider">Modul ERP</p>
                </div>

                <!-- Modul Inventory (Dengan Submenu) -->
                <div x-data="{ open: <?= strpos(uri_string(), 'inventory') === 0 ? 'true' : 'false' ?> }">
                    <button @click="open = !open" class="w-full flex items-center justify-between gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-colors hover:bg-slate-800 hover:text-white <?= strpos(uri_string(), 'inventory') === 0 ? 'text-white' : '' ?>">
                        <div class="flex items-center gap-3">
                            <i class="ph ph-package text-lg"></i>
                            <span>Inventory</span>
                        </div>
                        <i class="ph ph-caret-down text-xs transition-transform duration-200" :class="open ? 'rotate-180' : ''"></i>
                    </button>
                    <div x-show="open" x-collapse>
                        <div class="pl-10 pr-3 py-1 mt-1 space-y-1 border-l-2 border-slate-800 ml-4">
                            <a href="<?= base_url('inventory') ?>" class="block px-3 py-2 rounded-md text-sm transition-colors hover:bg-slate-800 hover:text-white">Dashboard Inventory</a>
                            <a href="#" class="block px-3 py-2 rounded-md text-sm transition-colors hover:bg-slate-800 hover:text-white">Data Barang</a>
                            <a href="#" class="block px-3 py-2 rounded-md text-sm transition-colors hover:bg-slate-800 hover:text-white">Kategori</a>
                            <a href="#" class="block px-3 py-2 rounded-md text-sm transition-colors hover:bg-slate-800 hover:text-white">Stok Masuk/Keluar</a>
                        </div>
                    </div>
                </div>

                <!-- Modul Keuangan (Submenu) -->
                <div x-data="{ open: false }">
                    <button @click="open = !open" class="w-full flex items-center justify-between gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-colors hover:bg-slate-800 hover:text-white">
                        <div class="flex items-center gap-3">
                            <i class="ph ph-wallet text-lg"></i>
                            <span>Keuangan</span>
                        </div>
                        <i class="ph ph-caret-down text-xs transition-transform duration-200" :class="open ? 'rotate-180' : ''"></i>
                    </button>
                    <div x-show="open" x-collapse>
                        <div class="pl-10 pr-3 py-1 mt-1 space-y-1 border-l-2 border-slate-800 ml-4">
                            <a href="#" class="block px-3 py-2 rounded-md text-sm transition-colors hover:bg-slate-800 hover:text-white">Kas & Bank</a>
                            <a href="#" class="block px-3 py-2 rounded-md text-sm transition-colors hover:bg-slate-800 hover:text-white">Faktur Penjualan</a>
                            <a href="#" class="block px-3 py-2 rounded-md text-sm transition-colors hover:bg-slate-800 hover:text-white">Laporan Laba/Rugi</a>
                        </div>
                    </div>
                </div>

                <!-- Modul HRD (Submenu) -->
                <div x-data="{ open: false }">
                    <button @click="open = !open" class="w-full flex items-center justify-between gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-colors hover:bg-slate-800 hover:text-white">
                        <div class="flex items-center gap-3">
                            <i class="ph ph-users-three text-lg"></i>
                            <span>HRD</span>
                        </div>
                        <i class="ph ph-caret-down text-xs transition-transform duration-200" :class="open ? 'rotate-180' : ''"></i>
                    </button>
                    <div x-show="open" x-collapse>
                        <div class="pl-10 pr-3 py-1 mt-1 space-y-1 border-l-2 border-slate-800 ml-4">
                            <a href="#" class="block px-3 py-2 rounded-md text-sm transition-colors hover:bg-slate-800 hover:text-white">Pegawai</a>
                            <a href="#" class="block px-3 py-2 rounded-md text-sm transition-colors hover:bg-slate-800 hover:text-white">Penggajian</a>
                            <a href="#" class="block px-3 py-2 rounded-md text-sm transition-colors hover:bg-slate-800 hover:text-white">Absensi</a>
                        </div>
                    </div>
                </div>

                <div class="pt-4 pb-2">
                    <p class="px-3 text-xs font-bold text-slate-500 uppercase tracking-wider">Pengaturan</p>
                </div>

                <!-- Manajemen Pengguna -->
                <a href="<?= base_url('users') ?>" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-colors hover:bg-slate-800 hover:text-white <?= strpos(uri_string(), 'users') === 0 ? 'bg-blue-600/10 text-blue-400' : '' ?>">
                    <i class="ph ph-shield-check text-lg"></i>
                    <span>Manajemen Pengguna</span>
                </a>
                
                <!-- Konfigurasi Sistem -->
                <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-colors hover:bg-slate-800 hover:text-white">
                    <i class="ph ph-gear text-lg"></i>
                    <span>Konfigurasi Sistem</span>
                </a>
            </div>

            <!-- User Profile Area di Sidebar -->
            <div class="p-4 border-t border-slate-800 bg-slate-950 shrink-0">
                <div class="flex items-center gap-3">
                    <img src="https://ui-avatars.com/api/?name=Admin+ERP&background=random" alt="Avatar" class="w-10 h-10 rounded-full border border-slate-700">
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-white truncate">Administrator</p>
                        <p class="text-xs text-slate-400 truncate">Superadmin</p>
                    </div>
                    <button class="text-slate-400 hover:text-red-400 transition-colors" title="Logout">
                        <i class="ph ph-sign-out text-xl"></i>
                    </button>
                </div>
            </div>
        </aside>

        <!-- Main Content Wrapper -->
        <div class="flex-1 flex flex-col min-w-0 overflow-hidden bg-slate-50">
            
            <!-- Topbar (Header) -->
            <header class="h-16 bg-white border-b border-gray-200 flex items-center justify-between px-4 sm:px-6 z-10 shrink-0">
                <!-- Left: Menu Button & Breadcrumb -->
                <div class="flex items-center gap-4">
                    <button @click="sidebarOpen = true" class="lg:hidden p-2 -ml-2 rounded-md text-gray-500 hover:bg-gray-100 hover:text-gray-700">
                        <i class="ph ph-list text-2xl"></i>
                    </button>
                    
                    <nav class="hidden sm:flex" aria-label="Breadcrumb">
                        <ol class="flex items-center space-x-2 text-sm text-gray-500">
                            <li><a href="#" class="hover:text-blue-600 transition-colors"><i class="ph ph-house"></i></a></li>
                            <li><i class="ph ph-caret-right text-xs"></i></li>
                            <li><span class="text-gray-900 font-medium"><?= $title ?? 'Dashboard' ?></span></li>
                        </ol>
                    </nav>
                </div>

                <!-- Right: Actions -->
                <div class="flex items-center gap-2 sm:gap-4">
                    <!-- Global Search -->
                    <div class="relative hidden md:block">
                        <i class="ph ph-magnifying-glass absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                        <input type="text" placeholder="Pencarian cepat (Ctrl+K)" class="pl-10 pr-4 py-2 w-64 text-sm bg-gray-100 border-transparent rounded-full focus:bg-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all placeholder-gray-400">
                    </div>

                    <!-- Notification -->
                    <button class="relative p-2 rounded-full text-gray-500 hover:bg-gray-100 transition-colors">
                        <i class="ph ph-bell text-xl"></i>
                        <span class="absolute top-1.5 right-1.5 w-2 h-2 rounded-full bg-red-500 ring-2 ring-white"></span>
                    </button>
                </div>
            </header>

            <!-- Main Content Area -->
            <main class="flex-1 overflow-y-auto p-4 sm:p-6 lg:p-8">
                <div class="max-w-7xl mx-auto">
                    <!-- Alert / Flash Messages Placeholder -->
                    <!-- 
                    <div class="mb-6 bg-blue-50 border border-blue-200 text-blue-800 rounded-lg p-4 flex gap-3">
                        <i class="ph ph-info mt-0.5 text-lg"></i>
                        <div class="text-sm">Notifikasi sistem akan muncul di sini.</div>
                    </div> 
                    -->

                    <!-- Injected Content -->
                    <?= $this->renderSection('content') ?>
                </div>
            </main>
        </div>

    </div>

    <!-- Tambahan CSS Khusus untuk Scrollbar agar lebih cantik -->
    <style>
        .custom-scrollbar::-webkit-scrollbar {
            width: 5px;
        }
        .custom-scrollbar::-webkit-scrollbar-track {
            background: transparent;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background-color: #334155;
            border-radius: 10px;
        }
        /* Alpine x-collapse transition bug fix */
        [x-cloak] { display: none !important; }
    </style>
</body>
</html>
