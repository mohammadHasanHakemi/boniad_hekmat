<?php $__env->startSection("content"); ?>
        <!-- Main Content -->
        <main class="flex-1 p-8">
            <header class="bg-white shadow rounded-lg p-6 mb-8">
                <h1 class="text-2xl font-bold text-gray-800">فرم درخواست بورسیه</h1>
            </header>
            <div class="bg-white rounded-lg shadow p-6 max-w-xl mx-auto">
                <form method="Post" action="<?php echo e(route('user.storerequest')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="mb-4">
                        <label class="block text-gray-700 mb-2" for="name">نام</label>
                        <input id="name" name="name" type="text" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 mb-2" for="name">نام خانوادگی</label>
                        <input id="female" name="female" type="text" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 mb-2" for="name">شماره تماس</label>
                        <input id="phone" name="phone" type="text" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 mb-2" for="name">کد ملی</label>
                        <input id="nationalcode" name="nationalcode" type="text" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    <div class="flex justify-between">
                        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">ذخیره</button>
                        <a href="<?php echo e(route('user.dashboard')); ?>" class="bg-gray-300 text-gray-800 px-6 py-2 rounded hover:bg-gray-400 transition">انصراف</a>
                    </div>
                </form>
            </div>
        </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('leyout.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\My Projcts\coding\Boniad\back\Boniad\Boniad\resources\views/user/addrequest.blade.php ENDPATH**/ ?>