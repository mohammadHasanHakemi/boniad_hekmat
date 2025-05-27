<?php $__env->startSection("content"); ?>





    <main class="flex-1 p-8">
        <header class="bg-white shadow rounded-lg p-6 mb-8 flex items-center justify-between">
            <h1 class="text-2xl font-bold text-gray-800">لیست پزشکان</h1>
            
        </header>
        <div class="bg-white rounded-lg shadow p-6">
            <div class="overflow-x-auto">
                <table class="min-w-full">
                    <thead>
                        <tr class="bg-gray-50">
                            
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">نام درخواست کننده</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">توضیحات</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">نام کاربری</th>
                            
                        </tr>
                    </thead>
                
                    <tbody class="bg-white divide-y divide-gray-200">
                          <?php if($requests->isEmpty()): ?>
                            <p class="text-gray-600">شما هیچ درخواستی ندارید.</p>
                            <?php else: ?>
                        <?php $__currentLoopData = $requests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $request): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            
                            <td class="px-6 py-4 whitespace-nowrap">آقای <?php echo e($request->title); ?></td>
                            <td class="px-6 py-4 whitespace-nowrap"><?php echo e($request->description); ?></td>
                            <td class="px-6 py-4 whitespace-nowrap"><?php echo e($request->user->name); ?></td>
                            
                        </tr>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    
                    </tbody>
                </table>
            </div>
        </div>
    </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('leyout.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\My Projcts\coding\Boniad\back\Boniad\Boniad\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>