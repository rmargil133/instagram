<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <?php echo e(__('Imagenes')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <section class="text-gray-600 body-font overflow-hidden">
        <div class="container px-5 py-24 mx-auto">
            <div class="-my-8 divide-y-2 divide-gray-100">
                <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="py-8 flex flex-wrap md:flex-nowrap">
                    <div style="display:inline-block; margin-left:0px">

                    <img src="<?php echo e($image->user->avatar); ?>" alt="" style="display:inline-block; width:50px;">
                        <span class="font-semibold title-font text-white"><?php echo e($image->user->name); ?></span>
                        <span class="font-semibold title-font text-white">  |  </span>
                        <span class="font-semibold title-font text-white-900"><?php echo e('@'); ?><?php echo e($image->user->nick); ?></span>
                    </div>
                    <div style="margin-top:50px">
                    <a href="<?php echo e(route("images.show", $image)); ?>">
                            <img class="leading-relaxed" src="<?php echo e($image->image_path); ?>">
                            </a>
                        <p class="font-semibold title-font text-white-900"><?php echo e('@'); ?><?php echo e($image->user->nick); ?>|<?php echo e($image->updated_at); ?></p>
                        <p class="font-semibold title-font text-white"><?php echo e($image->description); ?></p>
                    </div>
                    <div style="display:inline-block; margin-left:20px">
                        <span class="font-semibold title-font text-white"><?php echo e($image->comment_count); ?> Comentarios</span>
                        <span class="font-semibold title-font text-white"><?php echo e($image->like_count); ?> Likes</span>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php echo e($images->links()); ?>

            </div>
        </div>
    </section>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <?php echo e(__("You're logged in!")); ?>

                </div>
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH /var/www/html/resources/views/images/index.blade.php ENDPATH**/ ?>