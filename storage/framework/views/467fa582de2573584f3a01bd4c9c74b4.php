<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>داشبورد مدیریتی</title>
    <script src="<?php echo e(asset('assets/js/tail.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/chart.js')); ?>"></script>
    <style>
        body {
            font-family: 'Vazirmatn', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <aside class="bg-gray-800 w-64 min-h-screen p-4">
            <div class="text-white text-2xl font-bold mb-8">داشبورد</div>
            <nav>
                <ul class="space-y-2">
                    <li>
                        <a href="<?php echo e(route('admin.dashboard')); ?>" class="text-white block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 bg-gray-700">
                            صفحه اصلی
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <?php echo $__env->yieldContent('content'); ?>
    </div>
</body>
</html>
<?php /**PATH E:\My Projcts\coding\Boniad\back\Boniad\Boniad\resources\views/leyout/admin.blade.php ENDPATH**/ ?>