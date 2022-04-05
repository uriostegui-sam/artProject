<div class="flex flex-col flex-1 h-full overflow-hidden">
  <!-- Navbar -->
  <header class="flex-shrink-0 border-b">
    <div class="flex items-center justify-between p-2">
      <!-- Navbar left -->
      <div class="flex items-center space-x-3">
        <span class="p-2 text-xl font-semibold tracking-wider uppercase lg:hidden">
          <a href="{{ route('admin.dashboard') }}">MENU</a></span>
        <!-- Toggle sidebar button -->
        <button @click="toggleSidbarMenu()" class="p-2 rounded-md focus:outline-none focus:ring">
          <svg class="w-4 h-4 text-gray-600" :class="{'transform transition-transform -rotate-180': isSidebarOpen}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7" />
          </svg>
        </button>
      </div>

      <!-- Mobile search box -->
      <div x-show.transition="isSearchBoxOpen" class="fixed inset-0 z-10 bg-black bg-opacity-20" style="backdrop-filter: blur(14px); -webkit-backdrop-filter: blur(14px)">
        <div @click.away="isSearchBoxOpen = false" class="absolute inset-x-0 flex items-center justify-between p-2 bg-white shadow-md">
          <div class="flex items-center flex-1 px-2 space-x-2">
            <!-- search icon -->
            <span>
              <svg class="w-6 h-6 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
              </svg>
            </span>
            <input type="text" placeholder="Search" class="w-full px-4 py-3 text-gray-600 rounded-md focus:bg-gray-100 focus:outline-none" />
          </div>
          <!-- close button -->
          <button @click="isSearchBoxOpen = false" class="flex-shrink-0 p-4 rounded-md">
            <svg class="w-4 h-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
      </div>

      <!-- Desktop search box -->
      <div class="items-center hidden px-2 space-x-2 md:flex-1 md:flex md:mr-auto md:ml-5">
        <!-- search icon -->
        <span>
          <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
          </svg>
        </span>
        <form action="{{ route('admin.dashboard.rechercher') }}" method="GET">
          <input type="text" name="search" placeholder="{{__('Search')}}" class="focus:ring-[#006f7e] focus:border-[#006f7e] px-4 py-3 rounded-md hover:bg-gray-100 lg:max-w-sm md:py-2 md:flex-1 md:focus:bg-gray-100 md:focus:shadow md:focus:border" />
        </form>

      </div>

      <!-- Navbar right -->
      <div class="relative flex items-center space-x-3">
        <!-- Search button -->
        <button @click="isSearchBoxOpen = true" class="p-2 bg-gray-100 rounded-full md:hidden focus:outline-none focus:ring hover:bg-gray-200">
          <svg class="w-6 h-6 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
          </svg>
        </button>

        {{-- <div class="items-center hidden space-x-3 md:flex">
          <!-- Notification Button -->
          <div class="relative" x-data="{ isOpen: false }">
            <!-- red dot -->
            <div class="absolute right-0 p-1 bg-red-400 rounded-full animate-ping"></div>
            <div class="absolute right-0 p-1 bg-red-400 border rounded-full"></div>
            <button @click="isOpen = !isOpen" class="p-2 bg-gray-100 rounded-full hover:bg-gray-200 focus:outline-none focus:ring">
              <svg class="w-6 h-6 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
              </svg>
            </button>

            <!-- Dropdown card -->
            <div @click.away="isOpen = false" x-show.transition.opacity="isOpen" class="absolute w-48 max-w-md mt-3 transform bg-white rounded-md shadow-lg -translate-x-3/4 min-w-max">
              <div class="p-4 font-medium border-b">
                <span class="text-gray-800">Notification</span>
              </div>
              <ul class="flex flex-col p-2 my-2 space-y-1">
                <li>
                  <a href="#" class="block px-2 py-1 transition rounded-md hover:bg-gray-100">Link</a>
                </li>
                <li>
                  <a href="#" class="block px-2 py-1 transition rounded-md hover:bg-gray-100">Another Link</a>
                </li>
              </ul>
              <div class="flex items-center justify-center p-4 text-blue-700 underline border-t">
                <a href="#">See All</a>
              </div>
            </div>
          </div>

          <!-- Services Button -->
          <div x-data="{ isOpen: false }">
            <button @click="isOpen = !isOpen" class="p-2 bg-gray-100 rounded-full hover:bg-gray-200 focus:outline-none focus:ring">
              <svg class="w-6 h-6 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
              </svg>
            </button>

            <!-- Dropdown -->
            <div @click.away="isOpen = false" @keydown.escape="isOpen = false" x-show.transition.opacity="isOpen" class="absolute mt-3 transform bg-white rounded-md shadow-lg -translate-x-3/4 min-w-max">
              <div class="p-4 text-lg font-medium border-b">Web apps & services</div>
              <ul class="flex flex-col p-2 my-3 space-y-3">
                <li>
                  <a href="#" class="flex items-start px-2 py-1 space-x-2 rounded-md hover:bg-gray-100">
                    <span class="block mt-1">
                      <svg class="w-6 h-6 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path fill="#fff" d="M12 14l9-5-9-5-9 5 9 5z" />
                        <path fill="#fff" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                      </svg>
                    </span>
                    <span class="flex flex-col">
                      <span class="text-lg">Atlassian</span>
                      <span class="text-sm text-gray-400">Lorem ipsum dolor sit.</span>
                    </span>
                  </a>
                </li>
                <li>
                  <a href="#" class="flex items-start px-2 py-1 space-x-2 rounded-md hover:bg-gray-100">
                    <span class="block mt-1">
                      <svg class="w-6 h-6 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                      </svg>
                    </span>
                    <span class="flex flex-col">
                      <span class="text-lg">Slack</span>
                      <span class="text-sm text-gray-400">Lorem ipsum, dolor sit amet consectetur adipisicing elit.</span>
                    </span>
                  </a>
                </li>
              </ul>
              <div class="flex items-center justify-center p-4 text-blue-700 underline border-t">
                <a href="#">Show all apps</a>
              </div>
            </div>
          </div>

          <!-- Options Button -->
          <div class="relative" x-data="{ isOpen: false }">
            <button @click="isOpen = !isOpen" class="p-2 bg-gray-100 rounded-full hover:bg-gray-200 focus:outline-none focus:ring">
              <svg class="w-6 h-6 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
              </svg>
            </button>

            <!-- Dropdown card -->
            <div @click.away="isOpen = false" x-show.transition.opacity="isOpen" class="absolute w-40 max-w-sm mt-3 transform bg-white rounded-md shadow-lg -translate-x-3/4 min-w-max">
              <div class="p-4 font-medium border-b">
                <span class="text-gray-800">Options</span>
              </div>
              <ul class="flex flex-col p-2 my-2 space-y-1">
                <li>
                  <a href="#" class="block px-2 py-1 transition rounded-md hover:bg-gray-100">Link</a>
                </li>
                <li>
                  <a href="#" class="block px-2 py-1 transition rounded-md hover:bg-gray-100">Another Link</a>
                </li>
              </ul>
              <div class="flex items-center justify-center p-4 text-blue-700 underline border-t">
                <a href="#">See All</a>
              </div>
            </div>
          </div>
        </div>--}}

        <!-- avatar button -->
        <div class="relative" x-data="{ isOpen: false }">
          <button @click="isOpen = !isOpen" class="p-1 bg-gray-200 rounded-full focus:outline-none focus:ring text-4xl text-[#006f7e]">
            <i class="fas fa-users-cog"></i> </button>
          <!-- green dot -->
          <div class=" absolute right-0 p-1 bg-green-400 rounded-full bottom-3 animate-ping">
          </div>
          <div class="absolute right-0 p-1 bg-green-400 border border-white rounded-full bottom-3"></div>

          <!-- Dropdown card -->
          <div @click.away="isOpen = false" x-show.transition.opacity="isOpen" class="absolute mt-3 transform -translate-x-full bg-white rounded-md shadow-lg min-w-max">
            <div class="flex flex-col p-4 space-y-1 font-medium border-b">
              <span class="text-gray-800">{{ Auth::user()->name }}</span>
              <span class="text-sm text-gray-400">{{ Auth::user()->email }}</span>
            </div>
            <ul class="flex flex-col p-2 my-2 space-y-1">
              <li>
                <a href="{{ route('profile') }}" class="block px-2 py-1 transition rounded-md hover:bg-gray-100">Mon Profile</a>
              </li>
            </ul>
            <div class="flex items-center justify-center p-4 text-blue-700 underline border-t">

              <!-- Authentication -->
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="#" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                  {{ __('Se deconnecter') }}
                </a>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>