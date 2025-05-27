<?php $__env->startSection("title"); ?>
داشبور کاربران
<?php $__env->stopSection(); ?>
<?php $__env->startSection("content"); ?>
<div class="container mx-auto p-4">
    <?php if(Auth::check()): ?>
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            خوش آمدید، <strong><?php echo e(Auth::user()->name); ?></strong>!
        </div>
    <?php endif; ?>

    <div class="bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-4">داشبورد کاربری</h1>
        <p>این صفحه مخصوص کاربران وارد شده است.</p>

        <!-- دکمه خروج -->
        <form method="POST" action="<?php echo e(route('logout')); ?>" class="mt-4">
            <?php echo csrf_field(); ?>
            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                خروج
            </button>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('leyout.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\My Projcts\coding\Boniad\back\Boniad\Boniad\resources\views/users/dashboard.blade.php ENDPATH**/ ?>