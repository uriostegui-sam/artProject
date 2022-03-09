<x-app-layout>
  <!-- component -->
  <div>
    <div class="flex h-screen overflow-y-hidden bg-white" x-data="setup()" x-init="$refs.loading.classList.add('hidden')">
      <!-- Loading screen -->
      <div x-ref="loading" class="fixed inset-0 z-50 flex items-center justify-center text-white bg-black bg-opacity-50" style="backdrop-filter: blur(14px); -webkit-backdrop-filter: blur(14px)">
        {{ __('Loading') }}.....
      </div>

      <div class="flex flex-col flex-1 h-full overflow-hidden">
        <!-- Main content -->
        <main class="flex-1 max-h-full p-5 overflow-hidden overflow-y-scroll mb-10">
          <!-- Main content header -->
          <div class="flex flex-col items-start justify-between pb-6 space-y-4 border-b lg:items-center lg:space-y-0 lg:flex-row">
            <h1 class="text-2xl font-semibold whitespace-nowrap">{{__('User Administration')}}</h1>

          </div>


          <!-- Table -->
          <div class="flex justify-between mt-4">
            <h3 class="mt-6 text-xl">{{__('Users')}}</h3>
            <a href="{{ route('admin.users.create') }}" class="p-2 pl-5 pr-5 bg-transparent border-2 border-[#006f7e] text-[#006f7e] text-lg rounded-lg hover:bg-[#006f7e] hover:text-gray-100 focus:border-4 focus:border-[#005d69]">
              {{__('Create a new user')}}</a>
          </div>
          <div class="flex flex-col mt-6">

            <x-success class="mb-6" />

            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
              <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8 mb-2">
                <div class="overflow-hidden border-b border-gray-200 rounded-md shadow-md">
                  <table class="min-w-full overflow-x-scroll divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                      <tr>
                        <th scope="col" class="px-6 py-3 text-lg font-medium tracking-wider text-left text-gray-500 uppercase">
                          @sortablelink('titre', 'Titre')
                        </th>
                        <th scope="col" class="px-6 py-3 text-lg font-medium tracking-wider text-left text-gray-500 uppercase">
                          @sortablelink('email', 'Email')
                        </th>
                        <th scope="col" class="px-6 py-3 text-lg font-medium tracking-wider text-left text-gray-500 uppercase">
                          @sortablelink('created_at', 'Date de creation')
                        </th>
                        <th scope="col" class="px-6 py-3 text-lg font-medium tracking-wider text-left text-gray-500 uppercase whitespace-nowrap">
                          @sortablelink('is_admin', 'Role')
                        </th>
                        <th scope="col" class="px-6 py-3 text-lg font-medium tracking-wider text-left text-gray-500 uppercase">
                          {{__('Edit')}}
                        </th>
                      </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                      @foreach ($users as $user)
                      <tr class="transition-all hover:bg-gray-100 hover:shadow-lg">
                        <td class="px-6 py-4 whitespace-nowrap">
                          <div class="text-lg font-medium text-gray-900"><a href="{{ route('admin.users.show', $user) }}">{{ $user->name }}</a></div>
                        </td>
                        <td class="px-6 py-4 text-gray-900 whitespace-nowrap"> {{ $user->email }}
                        </td>
                        <td class="px-6 py-4 text-gray-900 whitespace-nowrap"> {{ $user->created_at->format('d M Y') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                          @if ( $user->is_admin == 1)
                          <span class="inline-flex px-2 text-lg font-semibold leading-5 text-green-800 bg-green-100 rounded-full">
                            {{__('Admin')}}
                          </span>
                          @else
                          <span class="inline-flex px-2 text-lg font-semibold leading-5 text-red-800 bg-red-100 rounded-full">
                            {{__('User')}}
                          </span>
                          @endif
                        </td>
                        <td class="px-6 py-4 flex justify-start">

                          <a href="{{ route('admin.users.edit', $user) }}" class='bg-yellow-300 hover:bg-yellow-500 px-2 py-2 rounded'><i class="fas fa-edit"></i></a>
                          <a href="#" class="bg-red-500 ml-5 px-2 py-2 rounded hover:bg-red-800" onclick="event.preventDefault(); document.getElementById('form-{{$user->id}}').submit();">
                            <i class="fas fa-trash-alt"></i>
                            <form action="{{ route('admin.users.destroy', ['user'=>$user->id]) }}" method="post" id='form-{{$user->id}}'>
                              @csrf
                              @method('delete')
                            </form>
                          </a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                {!! $users->appends(Request::except('page'))->render() !!}
              </div>
            </div>
          </div>
        </main>
      </div>
    </div>
  </div>
</x-app-layout>