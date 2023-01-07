<x-layout>
    <x-panel>
        <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6 "> 
            <h1>Update {{$post->title}}</h1>
            <form method="post" action="{{route('update.post',['post'=>$post->id])}}" class="w-full max-w-lg  m-auto">
                @csrf
                @method('patch')
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="title">
                            Title
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="title" type="text" name="title" value="{{$post->title}}">
                    </div>
                </div>

                <div class="flex flex-wrap -mx-3 mb-6">
                    <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 " name="category_id">
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}" {{$category->id === $post->category->id ? 'selected' : ''}}>{{ ucwords($category->name) }}</option>
                    @endforeach
                    </select>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="excerpt">
                            Short description
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="excerpt" type="text" name="excerpt" value="{{$post->excerpt}}">
                    </div>
                </div>
            

                <div class="mb-4 w-full bg-gray-50 rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600">
                    
                    <div class="py-2 px-4 bg-white rounded-b-lg dark:bg-gray-800">
                        <label for="editor" class="sr-only">Update post</label>
                        <textarea id="editor" rows="8" class="block px-0 w-full text-sm text-gray-800 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400" name="body" required="">{{$post->body}}</textarea>
                    </div>
                </div>
                <button type="submit" class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
                    Update post
                </button>


            </form>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        </main>
    </x-panel>
</x-layout>