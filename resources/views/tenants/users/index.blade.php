<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Users
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{route('users.create')}}" title="تعديل" class="p-2 mx-2 text-white bg-green-500 rounded-md hover:bg-green-600">
                        Create User
                    </a>
                    <table class="min-w-full text-sm text-gray-500 lg:text-base" id="users-table" cellspacing="0">
                        <thead>
                            <tr class="h-12">
                                <th class="px-6 py-4 text-right">#</th>
                                <th class="px-6 py-4 text-right">User</th>
                                <th class="px-6 py-4 text-right">Email</th>
                                <th class="px-6 py-4 text-center"></th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($users as $user)
                            <tr class="text-gray-700">
                                <td class="px-6 py-4 text-right">
                                    {{$user->id}}
                                </td>

                                <td class="px-6 py-4 text-right">
                                    {{$user->name}}
                                </td>

                                <td class="px-6 py-4 text-right">
                                    {{$user->email}}
                                </td>

                                <td class="flex flex-row -mx-2 text-center">

                                    <a href="{{route('users.edit', $user->id)}}" title="تعديل" class="p-2 mx-2 text-white bg-yellow-500 rounded-md hover:bg-yellow-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path
                                            d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z">
                                        </path>
                                        <path fill-rule="evenodd"
                                            d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                            clip-rule="evenodd"></path>
                                        </svg>
                                    </a>
                                    <form action="{{route('users.destroy', $user->id)}}" method="post">
                                            @csrf {{ method_field('DELETE') }}
                                        <button type="submit" title="حذف" class="p-2 mx-2 text-white bg-red-500 rounded-md hover:bg-red-600">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </button>
                                    </form>

                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
