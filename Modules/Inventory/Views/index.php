<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<div class="bg-white shadow overflow-hidden sm:rounded-lg mb-6">
    <div class="px-4 py-5 sm:px-6">
        <h3 class="text-lg leading-6 font-medium text-gray-900">
            Modul Inventory
        </h3>
        <p class="mt-1 max-w-2xl text-sm text-gray-500">
            Ini adalah dashboard khusus untuk modul Inventory. Modul ini terisolasi dari modul lainnya.
        </p>
    </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <div class="bg-blue-50 p-6 rounded-lg shadow border border-blue-100">
        <h4 class="font-bold text-blue-800">Total Barang</h4>
        <p class="text-3xl font-extrabold text-blue-600 mt-2">1,204</p>
    </div>
    <div class="bg-green-50 p-6 rounded-lg shadow border border-green-100">
        <h4 class="font-bold text-green-800">Masuk Hari Ini</h4>
        <p class="text-3xl font-extrabold text-green-600 mt-2">42</p>
    </div>
    <div class="bg-red-50 p-6 rounded-lg shadow border border-red-100">
        <h4 class="font-bold text-red-800">Stok Menipis</h4>
        <p class="text-3xl font-extrabold text-red-600 mt-2">12</p>
    </div>
</div>
<?= $this->endSection() ?>
