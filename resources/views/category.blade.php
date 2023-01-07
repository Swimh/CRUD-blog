<x-layout>

    <section class="px-6 py-8">
    <div class="mt-8 md:mt-8">
        @if ($message = Session::get('success'))
        <div class="alert alert-info alert-block">
            <strong>{{ $message }}</strong>
        </div>
        @endif
    </div>
        <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        <x-category-card :category='$category'></x-category-card>

            @if ($category->posts->count())
                
            <div class="lg:grid lg:grid-cols-3">
                @foreach ($category->posts as $post)
                    
                <x-post-card :post="$post"/>
                    
                @endforeach
                
            </div>
            @else
                <p class="text-center">No posts yet. Check back later.</p>
                    
            @endif
        </main>
    </section>
</x-layout>




