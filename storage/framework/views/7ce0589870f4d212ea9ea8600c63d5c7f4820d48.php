<?php $attributes = $attributes->exceptProps(['category']); ?>
<?php foreach (array_filter((['category']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
            <article
                class="bg-gray-100 border border-black border-opacity-5 rounded-xl">
                <div class="py-6 px-5 lg:flex">
                    <div class="flex-1 lg:mr-8" style="max-width: 400px;">
                        <img src="<?php echo e(asset('/images/'.$category->image_name), true); ?>" alt="Blog Category illustration" class="rounded-xl">
                    </div>

                    <div class="flex-1 flex flex-col">
                        <main class="mt-8 lg:mt-0">
                            <div class="space-x-2">
                                <h1
                                   class="text-3xl italic"><?php echo e(ucfirst($category->name), true); ?></h1>
                            </div>
                        </main>
                    </div>
                    <?php if(auth()->check()): ?>
                    <div class="flex-1 flex flex-col">
                        <span class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold hover:bg-blue-100 text-right" style="width: fit-content;">
                            <a href="<?php echo e(route('edit.category',['category'=>$category->id]), true); ?>">Update</a>
                        </span>
                                   
                        <form action="<?php echo e(route('delete.category',['category'=>$category->id]), true); ?>"  method="post" class="flex flex-row-reverse">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('delete'); ?>
                            <button class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold hover:bg-blue-100 text-right">
                                Delete
                            </button>
                        </form>
                    </div>
                    <?php endif; ?>
                </div>
            </article><?php /**PATH C:\laragon\www\blog\resources\views/components/category-card.blade.php ENDPATH**/ ?>