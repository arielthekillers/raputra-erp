<?= $this->extend('layout/main') ?>

<?= $this->section('page_title') ?>
Dashboard ERP
<?= $this->endSection() ?>

<?= $this->section('page_subtitle') ?>
Gambaran umum performa dan aktivitas perusahaan Anda hari ini.
<?= $this->endSection() ?>

<?= $this->section('breadcrumb') ?>
<li><i class="ph ph-caret-right text-xs"></i></li>
<li><span class="text-gray-900 dark:text-slate-200 font-medium">Dashboard</span></li>
<?= $this->endSection() ?>

<?= $this->section('page_actions') ?>
<button class="flex items-center gap-2 bg-white dark:bg-slate-800 border border-gray-300 dark:border-slate-700 text-gray-700 dark:text-slate-300 px-4 py-2 rounded-lg text-sm font-medium hover:bg-gray-50 dark:hover:bg-slate-700 transition-colors shadow-sm">
    <i class="ph ph-download-simple text-lg"></i>
    <span>Unduh Laporan</span>
</button>
<button class="flex items-center gap-2 bg-blue-600 border border-transparent text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-blue-700 transition-colors shadow-sm">
    <i class="ph ph-plus text-lg"></i>
    <span>Transaksi Baru</span>
</button>
<?= $this->endSection() ?>


<?= $this->section('content') ?>

<!-- Stats Cards -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6 mb-6">
    <!-- Card 1 -->
    <div class="bg-white dark:bg-slate-800 rounded-xl border border-gray-100 dark:border-slate-800 p-5 shadow-sm transition-colors">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-sm font-medium text-gray-500 dark:text-slate-400">Total Penjualan</h3>
            <div class="w-10 h-10 rounded-lg bg-blue-50 dark:bg-blue-500/10 flex items-center justify-center text-blue-600 dark:text-blue-400">
                <i class="ph ph-currency-circle-dollar text-xl"></i>
            </div>
        </div>
        <p class="text-2xl font-bold text-gray-900 dark:text-white">Rp 124.5 Juta</p>
        <div class="flex items-center gap-1 mt-2 text-sm">
            <i class="ph ph-trend-up text-emerald-500"></i>
            <span class="text-emerald-500 font-medium">+12.5%</span>
            <span class="text-gray-400 dark:text-slate-500 text-xs ml-1">dari bulan lalu</span>
        </div>
    </div>
    
    <!-- Card 2 -->
    <div class="bg-white dark:bg-slate-800 rounded-xl border border-gray-100 dark:border-slate-800 p-5 shadow-sm transition-colors">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-sm font-medium text-gray-500 dark:text-slate-400">Stok Menipis</h3>
            <div class="w-10 h-10 rounded-lg bg-orange-50 dark:bg-orange-500/10 flex items-center justify-center text-orange-600 dark:text-orange-400">
                <i class="ph ph-package text-xl"></i>
            </div>
        </div>
        <p class="text-2xl font-bold text-gray-900 dark:text-white">42 Item</p>
        <div class="flex items-center gap-1 mt-2 text-sm">
            <i class="ph ph-warning text-orange-500"></i>
            <span class="text-orange-500 font-medium">Butuh restock</span>
        </div>
    </div>

    <!-- Card 3 -->
    <div class="bg-white dark:bg-slate-800 rounded-xl border border-gray-100 dark:border-slate-800 p-5 shadow-sm transition-colors">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-sm font-medium text-gray-500 dark:text-slate-400">Karyawan Aktif</h3>
            <div class="w-10 h-10 rounded-lg bg-emerald-50 dark:bg-emerald-500/10 flex items-center justify-center text-emerald-600 dark:text-emerald-400">
                <i class="ph ph-users text-xl"></i>
            </div>
        </div>
        <p class="text-2xl font-bold text-gray-900 dark:text-white">156 Orang</p>
        <div class="flex items-center gap-1 mt-2 text-sm">
            <i class="ph ph-check-circle text-emerald-500"></i>
            <span class="text-gray-400 dark:text-slate-500 text-xs">Semua hadir hari ini</span>
        </div>
    </div>

    <!-- Card 4 -->
    <div class="bg-white dark:bg-slate-800 rounded-xl border border-gray-100 dark:border-slate-800 p-5 shadow-sm transition-colors">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-sm font-medium text-gray-500 dark:text-slate-400">Tugas Tertunda</h3>
            <div class="w-10 h-10 rounded-lg bg-red-50 dark:bg-red-500/10 flex items-center justify-center text-red-600 dark:text-red-400">
                <i class="ph ph-clipboard-text text-xl"></i>
            </div>
        </div>
        <p class="text-2xl font-bold text-gray-900 dark:text-white">8 Tugas</p>
        <div class="flex items-center gap-1 mt-2 text-sm">
            <span class="text-red-500 font-medium">Prioritas Tinggi</span>
        </div>
    </div>
</div>

<!-- Example Main Card Content -->
<div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-100 dark:border-slate-800 transition-colors overflow-hidden">
    <div class="px-6 py-5 border-b border-gray-100 dark:border-slate-700/50 flex items-center justify-between">
        <h3 class="text-base font-semibold text-gray-900 dark:text-white">
            Aktivitas Terbaru
        </h3>
        <button class="text-sm font-medium text-blue-600 dark:text-blue-400 hover:text-blue-700 dark:hover:text-blue-300">Lihat Semua</button>
    </div>
    <div class="p-6">
        <div class="text-center py-10">
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-gray-50 dark:bg-slate-800/50 mb-4">
                <i class="ph ph-empty text-3xl text-gray-400 dark:text-slate-500"></i>
            </div>
            <h3 class="text-sm font-medium text-gray-900 dark:text-white">Belum ada aktivitas</h3>
            <p class="mt-1 text-sm text-gray-500 dark:text-slate-400">Mulai gunakan modul ERP untuk melihat aktivitas di sini.</p>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
