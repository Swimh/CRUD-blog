
<header class="mx-auto mt-20 text-center">

    <div class="space-y-2 lg:space-y-0 lg:space-x-4 mt-8">
        <?php if(auth()->check()): ?>
        <!--  Add Post -->
        <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl">
            <button class="flex-1 py-2 pl-3 pr-9 text-sm font-semibold">
                <a href="post/add">Create a post</a>
            </button>
        </div>
        <!--  Add Category -->
        <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl">
            <button class="flex-1 py-2 pl-3 pr-9 text-sm font-semibold">
                <a href="<?php echo e(route('create.category'), true); ?>">Create a category</a>
            </button>
        </div>
        <?php endif; ?>
        <!--  Category -->    
        <div class="flex lg:inline-flex items-center bg-gray-100 rounded-xl dropdown">
            <button class="flex-1 py-2 pl-3 pr-9 text-sm font-semibold ">
                Categories
            </button>
            
            <div class="dropdown-content">
                <ul>
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>
                        <a href="categories/<?php echo e($category->slug, true); ?>"><?php echo e(ucfirst($category->name), true); ?></a>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>  
        </div>
        
        

        <!-- Search -->
        <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl px-3 py-2">
            <form method="GET" action="#">
                <input type="text" name="search" placeholder="Find something"
                       class="bg-transparent placeholder-black font-semibold text-sm">
            </form>
        </div>
    </div>
</header><?php /**PATH C:\laragon\www\blog\resources\views/_posts-header.blade.php ENDPATH**/ ?>