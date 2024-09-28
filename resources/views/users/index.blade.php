<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ 'Usuários' }}
        </h2>
    </x-slot>




    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <section>
                        <header>
                            <div>
                                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                    {{ 'Listagem de Usuários' }}
                                </h2>

                                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                    {{ 'Listando todos os usuários cadastrados' }}
                                </p>
                            </div>

                            <div class="py-1 mb-4 mt-4">
                                <a href="{{ route('users.create') }}"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    <i class="fa-solid fa-plus" aria-hidden="true"></i> Cadastrar
                                </a>
                            </div>
                        </header>





                        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mt-6">
                            <x-alert />

                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-4">Nome:</th>
                                        <th scope="col" class="px-6 py-4">E-mail</th>
                                        <th scope="col" class="px-6 py-4">Nivel</th>
                                        <th scope="col" class="px-6 py-4">Ações</th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-600 text-sm font-light">
                                    @forelse ($users as $user)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <td class="px-6 py-4">{{ $user->name }}</td>
                                        <td class="px-6 py-4">{{ $user->email }}</td>
                                        <td class="px-6 py-4">{{ $user->level == '0'? 'Administrador' : 'Usuário' }}</td>
                                        <td class="px-6 py-4 flex space-x-3">
                                            <a href="{{ route('users.edit', $user->id) }}">

                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                                </svg>
                                            </a>

                                            <a href="{{ route('users.destroy', $user->id) }}" onclick="event.preventDefault(); document.getElementById('form-delete-{{$user->id}}').submit()">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                </svg>
                                            </a>
                                            <form action="{{route('users.destroy', $user->id)}}" id="form-delete-{{$user->id}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>

                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="100">Nenhum registro encontrado</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>

                        </div>

                        <div class="py-4">
                            {{ $users->links() }}
                        </div>








                    </section>






                </div>
            </div>
        </div>
    </div>










</x-app-layout>