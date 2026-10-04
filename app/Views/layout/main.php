<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'ERP App' ?></title>
    <!-- Tailwind CSS output -->
    <link href="<?= base_url('css/app.css') ?>" rel="stylesheet">
</head>
<body class="bg-gray-50 text-gray-900 antialiased font-sans">

    <div class="min-h-screen flex flex-col">
        <!-- Sidebar or Header can go here -->
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex justify-between items-center">
                <h1 class="text-3xl font-bold text-gray-900">
                    ERP Application
                </h1>
            </div>
        </header>

        <main class="flex-grow">
            <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
                <!-- Replace with your content -->
                <div class="px-4 py-6 sm:px-0">
                    <?= $this->renderSection('content') ?>
                </div>
                <!-- /End replace -->
            </div>
        </main>
        
        <footer class="bg-white border-t mt-auto">
            <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8 text-center text-sm text-gray-500">
                &copy; <?= date('Y') ?> Raputra ERP. All rights reserved.
            </div>
        </footer>
    </div>

</body>
</html>
