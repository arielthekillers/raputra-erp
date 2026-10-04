# Panduan Pengembangan Raputra ERP (Antigravity Rules)

Ini adalah panduan utama (rules) yang **WAJIB** Anda (AI) baca dan ikuti di setiap sesi percakapan sebelum menulis kode apa pun untuk proyek Raputra ERP.

## 1. Perintah Wajib Saat Sesi Baru
Setiap kali sesi percakapan baru dimulai, Anda harus memastikan bahwa server dan *compiler* CSS berjalan di latar belakang (gunakan fitur `run_command` dengan `IsDaemon=true`):
- **Server CI4:** `php spark serve`
- **Tailwind Watcher:** `npm run dev:css` (Penting: harus selalu berjalan agar perubahan kelas CSS otomatis ter-build).

## 2. Struktur View & Template (Wajib Diikuti)
Semua halaman/View baru harus di-*extend* dari `layout/main` dan harus mendefinisikan *section* secara spesifik (TIDAK BOLEH *hardcode* header di dalam content).

**Template View Standar:**
```php
<?= $this->extend('layout/main') ?>

<!-- 1. Breadcrumb -->
<?= $this->section('breadcrumb') ?>
<li><i class="ph ph-caret-right text-xs"></i></li>
<li><span class="text-gray-900 dark:text-slate-200 font-medium">Nama Modul</span></li>
<?= $this->endSection() ?>

<!-- 2. Judul Utama -->
<?= $this->section('page_title') ?>
Kelola Data X
<?= $this->endSection() ?>

<!-- 3. Sub Judul (Opsional) -->
<?= $this->section('page_subtitle') ?>
Penjelasan singkat mengenai fungsi halaman ini.
<?= $this->endSection() ?>

<!-- 4. Tombol Aksi Kanan Atas -->
<?= $this->section('page_actions') ?>
<button class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-blue-700 transition-colors shadow-sm">
    Tambah Data X
</button>
<?= $this->endSection() ?>

<!-- 5. Konten Utama (Card/Table/Form) -->
<?= $this->section('content') ?>
<div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-100 dark:border-slate-800 p-6">
    <!-- Isi form atau tabel -->
</div>
<?= $this->endSection() ?>
```

## 3. Fitur UI/UX Global
Panggil fitur-fitur ini alih-alih membuat fungsi manual:

### Flash Messages (Notifikasi Melayang / Toast)
Sistem menggunakan `SweetAlert2` sebagai Toast otomatis di pojok kanan atas.
Di Controller, cukup panggil:
`return redirect()->to('/url')->with('success', 'Data berhasil disimpan!');`
(Mendukung key: `success`, `error`, `info`, `warning`).

### Konfirmasi Hapus / Aksi Berbahaya
JANGAN gunakan `alert()` atau `confirm()` standar peramban. Gunakan helper global JS `confirmAction()`:
```html
<button onclick="confirmAction('Yakin hapus?', 'Data X akan dihapus permanen!', 'Ya, Hapus', () => { window.location.href='/x/delete/1' })">
    Hapus
</button>
```

### CRUD Pop-Up (Modal)
Operasi CRUD form diusahakan menggunakan Pop-up/Modal. 
Gunakan kerangka **Alpine.js** (`x-data="{ open: false }"`) untuk membuat modal yang reaktif langsung di dalam View. JANGAN arahkan ke halaman (*page*) form terpisah bila bisa diselesaikan di dalam satu halaman manajemen utama.

### Paginasi (Pagination)
CodeIgniter 4 Pager sudah diatur *default* menggunakan `App\Views\Pagers\tailwind`.
Cukup panggil `$pager->links()` di View, desainnya sudah akan mengikuti *Tailwind* secara otomatis.

## 4. Helper Kustom
Sudah ter-*autoload* secara global via `BaseController`. Langsung panggil di *View* atau *Controller*.
- **`rupiah($angka, bool $with_symbol = true)`** -> Menghasilkan `Rp 5.000.000`
- **`tanggal_indo($date, bool $print_day = false)`** -> Menghasilkan `17 Agustus 2026` atau `Senin, 17 Agustus 2026`. Juga otomatis menampilkan jam jika *string* waktu dikirimkan.

## 5. Estetika (Wajib)
Selalu gunakan *Dark Mode Support* dengan prefix `dark:`. Gunakan warna-warna premium (*slate*, *emerald*, *blue*) dan perhatikan kerapian *padding*, *margin*, dan sudut `rounded-lg` atau `rounded-xl`. Gunakan ikon *Phosphor* (`ph ph-nama-ikon`) bukan *FontAwesome*.

## 6. Evolusi Aturan (Self-Updating)
Jika dalam proses pengerjaan pembuatan modul atau *coding* kita menemukan pola, konvensi (*ruleset*), alat, atau *helper* baru yang terbukti bekerja dengan baik namun **belum** terdaftar di panduan ini, Anda (AI) WAJIB mendaftarkannya secara otomatis ke dalam dokumen `GEMINI.md` ini agar panduan tetap *up-to-date*.

## 7. Aturan Git Commit
- Lakukan Git Commit sesuai dengan *Best Practice* (menggunakan pesan konvensi yang jelas seperti `fitur:`, `perbaikan:`, `refaktor:`).
- Gunakan **Bahasa Indonesia** untuk seluruh pesan *commit*.
- **PENTING:** JANGAN pernah melakukan proses *commit* secara otomatis sebelum ada instruksi/perintah eksplisit dari User. Kita menghindari sejarah *commit* yang terlalu kotor/banyak. Kumpulkan saja kodenya, dan hanya lakukan *commit* saat User bilang *"Silakan commit"*.
