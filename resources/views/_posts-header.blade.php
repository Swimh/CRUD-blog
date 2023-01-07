
<header class="mx-auto mt-20 text-center">

    <div class="space-y-2 lg:space-y-0 lg:space-x-4 mt-8">
        @if(auth()->check())
        <!--  Add Post -->
        <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl">
            <button class="flex-1 py-2 pl-3 pr-9 text-sm font-semibold">
                <a href="post/add">Create a post</a>
            </button>
        </div>
        <!--  Add Category -->
        <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl">
            <button class="flex-1 py-2 pl-3 pr-9 text-sm font-semibold">
                <a href="{{route('create.category')}}">Create a category</a>
            </button>
        </div>
        @endif
        <!--  Category -->    
        <div class="flex lg:inline-flex items-center bg-gray-100 rounded-xl dropdown">
            <button class="flex-1 py-2 pl-3 pr-9 text-sm font-semibold ">
                Categories
            </button>
            
            <div class="dropdown-content">
                <ul>
                    @foreach ($categories as $category)
                    <li>
                        <a href="categories/{{ $category->slug }}">{{ucfirst($category->name)}}</a>
                    </li>
                    @endforeach
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
</header>