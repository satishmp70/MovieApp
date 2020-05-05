
<div class="relative mt-3 md:mt-0" x-data="{ isOpen: true }" @click.away="isOpen=false">
            <input wire:model.debounce.500ms="search" type="text" name="" id="" 
            class="bg-gray-800 rounded-full w-64 py-1 pl-8 px-4 text-sm focus:outline-none 
            focus:shadow-outline" placeholder="search"
            x-ref="search"
            @keydown.window="
            if(event.keyCode === 191){
                event.preventDefault();
                $refs.search.focus();
                }
            "
            @focus="isOpen = true"
            @keydown="isOpen = true"
            @keydown.escape.window="isOpen = false"
            @keydown.shift.tab="isOpen = false"
            >
                <div class="absolute top-0">
                        <svg xmlns="http://www.w3.org/2000/svg" 
                        xmlns:xlink="http://www.w3.org/1999/xlink" 
                        class="fill-current w-3 text-gray-500  mt-2 ml-2" viewBox="0 0 26 26" version="1.1">
                        <g id="surface1170400">
                        <path style=" stroke:none;fill-rule:nonzero;fill:rgb(100%,100%,100%);fill-opacity:1;" 
                        d="M 10 0.1875 C 4.578125 0.1875 0.1875 4.578125 0.1875 10 C 0.1875 15.421875 4.578125 19.8125 10 19.8125 C 12.289062 19.8125 14.394531 19.003906 16.0625 17.6875 L 16.9375 18.5625 C 16.570312 19.253906 16.699219 20.136719 17.28125 20.71875 L 21.875 25.34375 C 22.589844 26.058594 23.753906 26.058594 24.46875 25.34375 L 25.34375 24.46875 C 26.058594 23.753906 26.058594 22.589844 25.34375 21.875 L 20.71875 17.28125 C 20.132812 16.695312 19.253906 16.59375 18.5625 16.96875 L 17.6875 16.09375 C 19.011719 14.421875 19.8125 12.300781 19.8125 10 C 19.8125 4.578125 15.421875 0.1875 10 0.1875 Z M 10 2 C 14.417969 2 18 5.582031 18 10 C 18 14.417969 14.417969 18 10 18 C 5.582031 18 2 14.417969 2 10 C 2 5.582031 5.582031 2 10 2 Z M 4.9375 7.46875 C 4.421875 8.304688 4.125 9.289062 4.125 10.34375 C 4.125 13.371094 6.566406 15.8125 9.59375 15.8125 C 10.761719 15.8125 11.859375 15.433594 12.75 14.8125 C 12.511719 14.839844 12.246094 14.84375 12 14.84375 C 8.085938 14.84375 4.9375 11.695312 4.9375 7.78125 C 4.9375 7.675781 4.933594 7.574219 4.9375 7.46875 Z M 4.9375 7.46875 "/>
                        </g> </svg>
                </div>
                <div wire:loading class="spinner top-0 mx-4 mt-3 right-0"></div>
                @if (strlen($search) >= 2)
              <div class="z-50 absolute bg-gray-800 text-sm rounded w-64 mt-4" 
              x-show.transition.opacity="isOpen"
              >

              @if($searchResults->count() > 0)
                    <ul>
                    @foreach($searchResults as $result)
                    <li class="border-b border-gray-700">
                        <a href="{{route('movies.show',$result['id'])}}" 
                        class="block hover:bg-gray-700 px-3 py-3 flex items-center transition ease-in-out duration-150"
                        @if($loop->last) @keydown.tab.exact="isOpen=false" @endif
                        >
                        @if ($result['poster_path'])
                        <img src="https://image.tmdb.org/t/p/w92/{{ $result['poster_path'] }}" alt="" class="w-8">
                        @else

                        @endif
                        <span class="ml-4">{{$result['title']}}</span>
                        </a>
                    </li>
                        @endforeach
                    </ul>
                    @else
                     <div class="px-3 py-3">No results for "{{ $search }}"</div>
                  @endif
              </div>  
              @endif
</div>

