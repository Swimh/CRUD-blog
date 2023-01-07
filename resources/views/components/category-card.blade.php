@props(['category'])
            <article
                class="bg-gray-100 border border-black border-opacity-5 rounded-xl">
                <div class="py-6 px-5 lg:flex">
                    <div class="flex-1 lg:mr-8" style="max-width: 400px;">
                        <img src="{{asset('/images/'.$category->image_name)}}" alt="Blog Category illustration" class="rounded-xl">
                    </div>

                    <div class="flex-1 flex flex-col">
                        <main class="mt-8 lg:mt-0">
                            <div class="space-x-2">
                                <h1
                                   class="text-3xl italic">{{ucfirst($category->name)}}</h1>
                            </div>
                        </main>
                    </div>
                    @if(auth()->check())
                    <div class="flex-1 flex flex-col">
                        <span class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold hover:bg-blue-100 text-right" style="width: fit-content;">
                            <a href="{{route('edit.category',['category'=>$category->id])}}">Update</a>
                        </span>
                                   
                        <form action="{{route('delete.category',['category'=>$category->id])}}"  method="post" class="flex flex-row-reverse">
                            @csrf
                            @method('delete')
                            <button class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold hover:bg-blue-100 text-right">
                                Delete
                            </button>
                        </form>
                    </div>
                    @endif
                </div>
            </article>