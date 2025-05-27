<?php $__env->startSection('title'); ?>
    صفحه اصلی
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div
        class="flex flex-col gap-2 items-center justify-center w-full transition-opacity opacity-100 duration-750 lg:grow starting:opacity-0">
        <a href="<?php echo e(route('singup')); ?>">
            <button class="singbutton w-[115px] h-14 ">
                ثبت نام
                <div class="arrow-wrapper">
                    <div class="arrow"></div>

                </div>
            </button>
        </a>
        <a href="<?php echo e(route('roler')); ?>">
            <button class="singbutton w-[115px] h-14">
                ورود
                <div class="arrow-wrapper">
                    <div class="arrow"></div>

                </div>
            </button>
        </a>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('leyout.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\My Projcts\coding\Boniad\back\Boniad\Boniad\resources\views/welcome.blade.php ENDPATH**/ ?>