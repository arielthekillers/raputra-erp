<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<div class="bg-white dark:bg-slate-800 shadow overflow-hidden sm:rounded-lg transition-colors duration-300">
    <div class="px-4 py-5 sm:px-6">
        <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-white">
            Dashboard ERP
        </h3>
        <p class="mt-1 max-w-2xl text-sm text-gray-500 dark:text-slate-400">
            Selamat datang di Sistem ERP Raputra. Ini adalah halaman kosong yang siap digunakan.
        </p>
    </div>
    <div class="border-t border-gray-200 dark:border-slate-700">
        <dl>
            <div class="bg-gray-50 dark:bg-slate-800/50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500 dark:text-slate-400">
                    Modul Tersedia
                </dt>
                <dd class="mt-1 text-sm text-gray-900 dark:text-slate-300 sm:mt-0 sm:col-span-2">
                    Belum ada modul yang terpasang.
                </dd>
            </div>
        </dl>
    </div>
</div>
<?= $this->endSection() ?>
