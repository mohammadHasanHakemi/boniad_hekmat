<?php $__env->startSection("content"); ?>





    <main class="flex-1 p-8">
        <header class="bg-white shadow rounded-lg p-6 mb-8 flex items-center justify-between">
            <h1 class="text-2xl font-bold text-gray-800">لیست درخواست های شما</h1>
            <a href="<?php echo e(route('user.addrequest')); ?>" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" /></svg>
                افزودن
            </a>
        </header>
        <div class="bg-white rounded-lg shadow p-6">
            <div class="overflow-x-auto">
                <table class="min-w-full">
                    <thead>
                        <tr class="bg-gray-50">
                            
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                            نام
                            </th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                             نام خانوادگی
                            </th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                            شماره تلفن
                            </th>
                            
                        </tr>
                    </thead>
                
                    <tbody class="bg-white divide-y divide-gray-200">
                          <?php if($requests->isEmpty()): ?>
                            <p class="text-gray-600">شما هیچ درخواستی ندارید.</p>
                            <?php else: ?>
                        <?php $__currentLoopData = $requests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $request): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            
                            <td class="px-6 py-4 whitespace-nowrap"> <?php echo e($request->name); ?></td>
                            <td class="px-6 py-4 whitespace-nowrap"><?php echo e($request->female); ?></td>
                            <td class="px-6 py-4 whitespace-nowrap"><?php echo e($request->phone); ?></td>

                            <td class="px-6 py-4 whitespace-nowrap flex items-center space-x-2 space-x-reverse">

                                <a href="<?php echo e(route('user.editrequest', ['id' => $request->id])); ?>" class="text-blue-600 hover:text-blue-800 ml-2" title="جزئیات">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0zm6 0a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                </a>
                                <a href="<?php echo e(route('user.deleterequest', ['id' => $request->id])); ?>"  class="text-red-600 hover:text-red-800" title="حذف">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                                </a>
                            </td>
                        </tr>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    
                    </tbody>
                </table>
            </div>
        </div>
    </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('leyout.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\My Projcts\coding\Boniad\back\Boniad\Boniad\resources\views/user/dashboard.blade.php ENDPATH**/ ?>