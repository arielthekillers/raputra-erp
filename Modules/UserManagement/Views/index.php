<?= $this->extend('layout/main') ?>

<!-- Breadcrumb -->
<?= $this->section('breadcrumb') ?>
<li><i class="ph ph-caret-right text-xs"></i></li>
<li><span class="text-gray-900 dark:text-slate-200 font-medium">Manajemen Pengguna</span></li>
<?= $this->endSection() ?>

<!-- Judul -->
<?= $this->section('page_title') ?>
Manajemen Pengguna
<?= $this->endSection() ?>

<!-- Sub Judul -->
<?= $this->section('page_subtitle') ?>
Kelola data karyawan, hak akses (jabatan), dan foto profil mereka.
<?= $this->endSection() ?>

<!-- Tombol Tambah (Hanya Muncul Jika Punya Akses users.create) -->
<?= $this->section('page_actions') ?>
<?php if (auth()->user()->can('users.create')): ?>
<button x-data @click="$dispatch('open-modal-tambah')" class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-blue-700 transition-colors shadow-sm flex items-center gap-2">
    <i class="ph ph-plus-circle text-lg"></i>
    Tambah Pengguna
</button>
<?php endif; ?>
<?= $this->endSection() ?>

<!-- Konten Utama -->
<?= $this->section('content') ?>
<div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-100 dark:border-slate-800 overflow-hidden">
    
    <div class="overflow-x-auto">
        <table class="w-full text-left text-sm text-gray-600 dark:text-slate-300">
            <thead class="bg-gray-50 dark:bg-slate-900/50 text-gray-700 dark:text-slate-200 border-b border-gray-100 dark:border-slate-700">
                <tr>
                    <th class="px-6 py-4 font-semibold">Pengguna</th>
                    <th class="px-6 py-4 font-semibold">Email</th>
                    <th class="px-6 py-4 font-semibold">Jabatan (Role)</th>
                    <th class="px-6 py-4 font-semibold text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 dark:divide-slate-700/50">
                <?php if (empty($users)): ?>
                <tr>
                    <td colspan="4" class="px-6 py-8 text-center text-gray-500">
                        Belum ada data pengguna (akun) yang terdaftar.
                    </td>
                </tr>
                <?php else: ?>
                    <?php foreach ($users as $u): ?>
                    <tr class="hover:bg-gray-50 dark:hover:bg-slate-800/50 transition-colors">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <!-- Placeholder Foto Profil -->
                                <div class="w-10 h-10 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-bold">
                                    <?= strtoupper(substr($u->username, 0, 1)) ?>
                                </div>
                                <div class="font-medium text-gray-900 dark:text-slate-200">
                                    <?= esc($u->username) ?>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4"><?= esc($u->email ?? '-') ?></td>
                        <td class="px-6 py-4">
                            <?php 
                                $groups = $u->getGroups();
                                if (empty($groups)) {
                                    echo '<span class="px-2 py-1 bg-gray-100 dark:bg-slate-700 text-gray-600 dark:text-slate-400 rounded text-xs font-medium">Belum ada jabatan</span>';
                                } else {
                                    foreach ($groups as $g) {
                                        // Bisa dikasih warna spesifik berdasarkan role nanti
                                        echo '<span class="px-2 py-1 bg-blue-50 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400 border border-blue-100 dark:border-blue-800 rounded text-xs font-medium mr-1">' . esc($g) . '</span>';
                                    }
                                }
                            ?>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex justify-end gap-2">
                                <?php if (auth()->user()->can('users.edit')): ?>
                                <button class="text-emerald-600 hover:bg-emerald-50 dark:hover:bg-emerald-900/30 p-2 rounded-lg transition-colors" title="Ubah Peran & Data">
                                    <i class="ph ph-pencil-simple text-lg"></i>
                                </button>
                                <?php endif; ?>
                                
                                <?php if (auth()->user()->can('users.delete')): ?>
                                <button class="text-red-500 hover:bg-red-50 dark:hover:bg-red-900/30 p-2 rounded-lg transition-colors" title="Hapus Akun">
                                    <i class="ph ph-trash text-lg"></i>
                                </button>
                                <?php endif; ?>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Paginasi Tailwind -->
    <div class="px-6 py-4 border-t border-gray-100 dark:border-slate-800">
        <?= $pager->links() ?>
    </div>
</div>

<!-- Modal Tambah Pengguna (Alpine.js) -->
<div id="modalTambah" x-data="{ open: false }" @open-modal-tambah.window="open = true" x-show="open" style="display: none;" class="relative z-50">
    <div x-show="open" x-transition.opacity class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm"></div>
    <div class="fixed inset-0 flex items-center justify-center p-4">
        <div x-show="open" 
             x-transition:enter="transition ease-out duration-200" 
             x-transition:enter-start="opacity-0 scale-95" 
             x-transition:enter-end="opacity-100 scale-100" 
             x-transition:leave="transition ease-in duration-150" 
             x-transition:leave-start="opacity-100 scale-100" 
             x-transition:leave-end="opacity-0 scale-95" 
             class="bg-white dark:bg-slate-800 rounded-xl shadow-xl w-full max-w-lg overflow-hidden border border-gray-100 dark:border-slate-700"
             @click.outside="open = false">
            
            <div class="px-6 py-4 border-b border-gray-100 dark:border-slate-700 flex justify-between items-center bg-gray-50 dark:bg-slate-900/50">
                <h3 class="font-semibold text-gray-900 dark:text-slate-100">Tambah Akun Pengguna Baru</h3>
                <button @click="open = false" class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300">
                    <i class="ph ph-x text-lg"></i>
                </button>
            </div>
            
            <form action="<?= base_url('users/store') ?>" method="POST">
                <?= csrf_field() ?>
                <div class="p-6 space-y-4">
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-slate-300 mb-1">Username</label>
                        <input type="text" name="username" required class="w-full rounded-lg border-gray-300 dark:border-slate-600 bg-white dark:bg-slate-700 text-gray-900 dark:text-slate-100 focus:ring-blue-500 focus:border-blue-500 px-4 py-2 outline-none border transition-colors shadow-sm" placeholder="Contoh: andi.finance">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-slate-300 mb-1">Email</label>
                        <input type="email" name="email" required class="w-full rounded-lg border-gray-300 dark:border-slate-600 bg-white dark:bg-slate-700 text-gray-900 dark:text-slate-100 focus:ring-blue-500 focus:border-blue-500 px-4 py-2 outline-none border transition-colors shadow-sm" placeholder="andi@perusahaan.com">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-slate-300 mb-1">Password</label>
                        <input type="password" name="password" required minlength="8" class="w-full rounded-lg border-gray-300 dark:border-slate-600 bg-white dark:bg-slate-700 text-gray-900 dark:text-slate-100 focus:ring-blue-500 focus:border-blue-500 px-4 py-2 outline-none border transition-colors shadow-sm" placeholder="Minimal 8 karakter">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-slate-300 mb-1">Jabatan (Hak Akses)</label>
                        <select name="group" required class="w-full rounded-lg border-gray-300 dark:border-slate-600 bg-white dark:bg-slate-700 text-gray-900 dark:text-slate-100 focus:ring-blue-500 focus:border-blue-500 px-4 py-2 outline-none border transition-colors shadow-sm">
                            <option value="">-- Pilih Jabatan --</option>
                            <?php foreach($available_groups as $groupKey => $groupInfo): ?>
                                <option value="<?= esc($groupKey) ?>"><?= esc($groupInfo['title']) ?> (<?= esc($groupInfo['description']) ?>)</option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                </div>
                <div class="px-6 py-4 border-t border-gray-100 dark:border-slate-700 bg-gray-50 dark:bg-slate-900/50 flex justify-end gap-3">
                    <button type="button" @click="open = false" class="px-4 py-2 rounded-lg text-sm font-medium text-gray-600 dark:text-slate-300 hover:bg-gray-200 dark:hover:bg-slate-600 transition-colors">Batal</button>
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-blue-700 transition-colors shadow-sm">Buat Akun</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
