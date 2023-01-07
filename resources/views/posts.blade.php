<x-layout>
    <div class="mt-8 md:mt-8">
        @if ($message = Session::get('success'))
        <div class="alert alert-info alert-block">
            <strong>{{ $message }}</strong>
        </div>
        @endif
    </div>
    <div class="mt-8 md:mt-8">
        @if ($message = Session::get('error'))
        <div class="alert alert-info alert-block">
            <strong>{{ $message }}</strong>
        </div>
        @endif
    </div>

    <div class="mt-8 md:mt-8">
        @if ($message = Session::get('info'))
        <div class="alert alert-info alert-block">
            <strong>{{ $message }}</strong>
        </div>
        @endif
    </div>
    <section class="px-6 py-8">
        @include('_posts-header') 

        <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
            @if ($posts->count())
            <x-featured-post :post="$posts[0]"/>
                
            <div class="lg:grid lg:grid-cols-3">
                @foreach ($posts->skip(1) as $post)
                    
                <x-post-card :post="$post"/>
                    
                @endforeach
                
            </div>
            @else
                <p class="text-center">No posts yet. Check back later.</p>
                    
            @endif

            {{$posts->links()}}
        </main>

    </section>
</x-layout>




