<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    

  <div class="py-4 px-4 mx-auto max-w-screen-xl  lg:px-6">
      <div class="mx-auto max-w-screen-md sm:text-center">

          <form action="/posts" method="GET">

            @if (request('category'))
            <input type="hidden" name="category" value="{{ request('category') }}">
            @endif

             @if (request('author'))
            <input type="hidden" name="author" value="{{ request('author') }}"> 
            @endif

              <div class="items-center mx-auto mb-3 space-y-4 max-w-screen-sm sm:flex sm:space-y-0">
                  <div class="relative w-full">
                      <label for="search" class="hidden mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Search</label>
                      <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                              <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"/></svg>
                      </div>
                      <input autocomplete="off" class="block p-3 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:rounded-none sm:rounded-l-lg focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Search" type="search" id="search" name="search">
                  </div>
                  <div>
                      <button type="submit" class="py-3 px-5 w-full text-sm font-medium text-white bg-blue-700 text-center  rounded-lg border border-gray-300 cursor-pointer   sm:rounded-none sm:rounded-r-lg hover:bg-primary-800 focus:ring-1 focus:ring-primary-100  dark:hover:bg-primary-500 dark:focus:ring-primary-100">Seacrh</button>
                  </div>
              </div>
            
          </form>
      </div>
  </div>

     <div class=" my-4 py-4 px-4  lg:py-4 max-w-screen-xl mx-auto lg:px-0 ">
    <div class="grid gap-6 md:grid-cols-2  lg:grid-cols-3">

@forelse( $posts as $post )

    {{-- <article class="py-8 max-w-screen-md border-b border-gray-300" >

       <a href="/posts/{{ $post ['slug'] }}" class=" hover:underline">
        <h2 class="mb-1 text-2xl tracking-tight font-bold text-gray-900">{{ $post ['title'] }}</h2></a>
       
        <div >
            By
            <a href="/authors/{{ $post->author->username }}" class=" text-base text-gray-500 hover:underline"> {{ $post->author->name }}</a> 
            in
            <a href="/categories/{{ $post->category->slug }}" class=" text-base text-gray-500 hover:underline">  {{ $post->category->name }} </a> 
            | {{ $post->created_at->diffForHumans() }}
        </div>
        
        <p class=" my-4 font-light">{{  Str::limit($post ['body'], 100) }}</p>
       <a href="/posts/{{ $post['slug'] }}" class="font-medium text-blue-500 hover:underline ">read more &raquo;</a>

    </article> --}}

      <!-- Post 1 -->
      <article class="flex flex-col justify-between p-6 rounded-lg border border-gray-200 shadow-md bg-white">
  <div>
    <div class="flex items-center gap-x-3 text-sm text-gray-500">

      <time >{{ $post->created_at->diffForHumans() }}</time>
      <a class="  hover:underline" href="/posts?category={{ $post->category->slug }}">
        <span class="px-3 py-1 bg-{{ $post->category->color }}-100 rounded-full text-xs font-medium text-gray-600">{{ $post->category->name }}</span>
      </a>
    </div>

    <h3 class=" hover:underline mt-4 text-xl font-semibold text-gray-900 hover:text-gray-700">
      <a href="/posts/{{ $post->slug }}">{{ $post ['title'] }}</a>
    </h3>
     <p class=" my-4 font-light">{{  Str::limit($post ['body'], 100) }}</p>
  </div>

  <!-- Footer flex: penulis di kiri, read more di kanan -->
  <div class="mt-6 flex items-center justify-between">
    <div class="flex items-center gap-x-3">
      <img class="w-10 h-10 rounded-full" src="https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
      <div class="text-sm">
        <a href="/posts?author={{ $post->author->username }}" class=" hover:underline">
<p class=" text-gray-900">{{ $post->author->name }}</p>
        
        </a>
        
      </div>
    </div>
    <a href="/posts/{{ $post->slug }}" class="font-medium text-blue-400 hover:underline text-sm">read more &raquo;</a>
  </div>
</article>

    @empty
    <div>
    <p class="font-semibold text-xl my-4">Articles not found !</p>
    <a href="/posts" class="block text-blue-600 hover:underline"> &laquo; Back to all posts</a>
    </div>
    @endforelse
      </div>
  </div>

   {{ $posts->links() }}


</x-layout>