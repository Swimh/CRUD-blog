<!doctype html>

<title>Laravel From Scratch Blog</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="app.css">


<body style="font-family: Open Sans, sans-serif">
    <section class="px-6 py-8">
        <nav class="md:flex md:justify-between md:items-center">
            <div>
                <a href="/" class="text-xs font-bold uppercase">Home Page</a>
            </div>

            <div class="mt-8 md:mt-0">
                <?php if(!auth()->check()): ?>
                    <a href="/register" class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">Register</a>
                    <a href="/login" class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">Log In</a>
                    
                <?php else: ?>
                    <span class="text-xs font-bold uppercase">Hello, <?php echo e(auth()->user()->name, true); ?>!</span>
                    <form action="/logout" method="post">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                            Log out
                        </button>
                    </form>
                    
                <?php endif; ?>
                
            </div>
        </nav>
        
        <?php echo e($slot, true); ?>


        <footer class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">
            <h5 class="text-3xl">Stay in touch with the latest posts</h5>
            <p class="text-sm mt-3">Promise to keep the inbox clean. No bugs.</p>
        </footer>
    </section>
</body><?php /**PATH C:\laragon\www\blog\resources\views/components/layout.blade.php ENDPATH**/ ?>